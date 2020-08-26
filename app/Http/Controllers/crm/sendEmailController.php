<?php

namespace App\Http\Controllers\crm;

use Mail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Messg;
use App\models\clients;
use App\models\Produit;
use App\models\Promotion;
use App\models\Evenement;
use App\models\Reclamation;
use App\models\Activite;
use Illuminate\Support\Facades\Redirect;
use Carbon\carbon;
use DB;

class sendEmailController extends Controller
{
    protected $messg;
    public function __construct()
    {
        $this->messg = new Messg();
    }
    

    public function index($client_id, $produit_id, $promo_id, $event_id, $reclam_id, $activite_id, $type)
    {
        if ($client_id !== '0'){
        $client = clients::where('id', '=', $client_id)->first();
        $top_produit = $client->ProduitPrefere($client->id);
        }else{
            $client = 0;
            $top_produit = 0;
        }

        if ($produit_id !== '0'){
            $produit = Produit::where('id', '=', $produit_id)->first();
            }else{
                $produit = 0;
            }

        if ($promo_id !== '0'){
            $promo = Promotion::where('id', '=', $promo_id)->first();
            }else{
                $promo = 0;
            }

        if ($event_id !== '0'){
            $event = Evenement::where('id', '=', $event_id)->first();
                }else{
                    $event = 0;
                }

        if ($reclam_id !== '0'){
            $reclam = Reclamation::where('id', '=', $reclam_id)->first();
                }else{
                    $reclam = 0;
                }

        if ($activite_id !== '0'){
            $activite = Activite::where('id', '=', $activite_id)->first();
                }else{
            $activite = 0;
            }
        return view('front_office.emails.writingArea', compact('client', 'top_produit', 'produit', 'promo', 'event', 'reclam', 'activite', 'type'));
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
      
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();
      
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
      
            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenametostore);
 
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/'.$filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
             
            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

    public function redigerEmail($type, $id_type)
    {
      
        $email_dest = $_POST['destination'];
        $mssg = $_POST['summary-ckeditor'];
        if ( isset($_POST['objet']) ){
        $objet = $_POST['objet'];
        }else{
            $objet = 'Nom entreprise';
        }
        $mesg = new Messg();
        $mesg->destination = $email_dest;
        $mesg->subject = $objet;
        $mesg->msg = $mssg;
        $mesg->table = $type;
        $mesg->table_id = $id_type;
        $mesg->employee_id = 1;

        $mesg->save();
        return redirect::to('email');
    }

    public function sendEmail()
    {
        $dernier_msg = Messg::latest()->first();
       
            Mail::send('front_office.emails.envoyerEmail', ['dernier_msg' => $dernier_msg], function ($m) use ($dernier_msg) {
                $m->from('khoudichahrazed@gmail.com', 'CRM 2020');

                $m->to($dernier_msg->destination);
            });
           
            if (count(Mail::failures()) > 0) {
                return redirect()->back()->with("ok", "echec, message non envoyé");
            } else {
                if ( $dernier_msg->table !== 'clients_contact' and $dernier_msg->table !== 'clients_anniv' )
                {
                    $notif_table = DB::table($dernier_msg->table)
                    ->where('id', '=', $dernier_msg->table_id)
                    ->update(['status' => 'terminé']);
                }
                if ($dernier_msg->table == 'clients_contact')
                {
                    $activite = new Activite();
                    $activite->titre = $dernier_msg->subject;
                    $activite->type_activite = 'e-mail';
                    $activite->status = 'terminé';
                    $activite->date_act = carbon::today();
                    $activite->description = '';
                    $activite->organisateur = 'employe';
                    $activite->employee_id = 1;
                    $activite->clients_id = $dernier_msg->table_id;

                    $activite->save();
                    return redirect()->back()->with("ok", "Envoyé avec succès!");
                }
               
                   return redirect('/')->with("ok", "Envoyé avec succès!");
                
            }
    }
}
