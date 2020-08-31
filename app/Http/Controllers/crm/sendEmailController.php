<?php

namespace App\Http\Controllers\crm;

use Mail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Messg;
use App\models\clients;
use App\models\Produit;
use App\models\Prospect;
use App\models\Promotion;
use App\models\Evenement;
use App\models\Reclamation;
use App\models\Activite;
use App\models\Employees;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Carbon\carbon;
use DB;
use Auth;

class sendEmailController extends Controller
{
    protected $messg;
    public function __construct()
    {
        $this->middleware('auth');
        $this->messg = new Messg();
    }

    public function index($client_id, $prospect_id, $produit_id, $promo_id, $event_id, $reclam_id, $activite_id, $type)
    {
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

        //tout les emails
        $email_client = clients::where('employee_id', '=', $employe->id)->select('email');
        $email_prospect = Prospect::where('employee_id', '=', $employe->id)->select('email');
        $tt_email = $email_client->unionAll($email_prospect)->get();

        if ($client_id !== '0'){
        $client = clients::where('id', '=', $client_id)->first();
        $top_produit = $client->ProduitPrefere($client->id);
        }else{
            $client = 0;
            $top_produit = 0;
        }

        if ($prospect_id !== '0'){
            $prospect = Prospect::where('id', '=', $prospect_id)->first();
            }else{
                $prospect = 0;
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
        return view('front_office.emails.writingArea', compact('client', 'top_produit', 'prospect', 'produit', 'promo', 'event', 'reclam', 'activite', 'type', 'tt_email'));
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
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

        $mssg = $_POST['summary-ckeditor'];
        $envoie = $_POST['envoyer'];
        if ( $envoie == 'Envoyer' ){
            $email_dest =  $_POST['destination'];
        }
        if ( $envoie == 'Envoyer à tout le monde' ){
            $email_dest =  'tout_le_monde';
        }
        if ( $envoie == 'Envoyer à tout les clients' ){
            $email_dest =  'tout_les_clients';
        }
        if ( $envoie == 'Envoyer à tout les prospects' ){
            $email_dest =  'tout_les_prospects';
        }
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
        $mesg->employee_id = $employe->id;

        $mesg->save();
        return redirect::to('email');
    }

    public function sendEmail()
    {
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

        //recuperer tout les emails
        $clients_email= clients::where('employee_id', '=', $employe->id)->select('email');
        $prospects_email= Prospect::where('employee_id', '=', $employe->id)->select('email');  
        $emails = $clients_email->unionAll($prospects_email)->get();
        //recuperer le dernier msg 
        $dernier_msg = Messg::where('employee_id', '=', $employe->id)->latest()->first();

       //envoyer a tout le monde
        if ( $dernier_msg->destination == 'tout_le_monde' ){
            $destination = $emails;
            foreach($destination as $dest){
                Mail::send('front_office.emails.envoyerEmail', ['dernier_msg' => $dernier_msg], function ($m) use ($dest) {
                    $m->from('khoudichahrazed@gmail.com', 'CRM 2020');
               
                    $m->to($dest->email);
                });
            }
        }
        //envoyer a tout les clients
        if ( $dernier_msg->destination == 'tout_les_clients' ){
            $destination = $clients_email->get();
            foreach($destination as $dest){
                Mail::send('front_office.emails.envoyerEmail', ['dernier_msg' => $dernier_msg], function ($m) use ($dest) {
                    $m->from('khoudichahrazed@gmail.com', 'CRM 2020');
               
                    $m->to($dest->email);
                });
            }
        }
         //envoyer a tout les prospect
         if ( $dernier_msg->destination == 'tout_les_prospects' ){
            $destination = $prospects_email->get();
            foreach($destination as $dest){
                Mail::send('front_office.emails.envoyerEmail', ['dernier_msg' => $dernier_msg], function ($m) use ($dest) {
                    $m->from('khoudichahrazed@gmail.com', 'CRM 2020');
               
                    $m->to($dest->email);
                });
            }
        }
        else{
            $destination = $dernier_msg->destination;
            Mail::send('front_office.emails.envoyerEmail', ['dernier_msg' => $dernier_msg], function ($m) use ($destination) {
                $m->from('khoudichahrazed@gmail.com', 'CRM 2020');
           
                $m->to($destination);
            });
        }
      
            if (count(Mail::failures()) > 0) {
                return redirect()->back()->with("ok", "echec, message non envoyé");
            } else {
                if ( $dernier_msg->table !== 'clients_contact' and $dernier_msg->table !== 'clients_anniv' and $dernier_msg->table !== 'prospect_contact' )
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
                    $activite->employee_id = $employe->id;
                    $activite->clients_id = $dernier_msg->table_id;

                    $activite->save();

                    if (Session::get('nbrClient') !== 0){
                        $nbrClient = Session::get('nbrClient');
                        for($i = 0; $i < $nbrClient; $i++){
                            $msg_client = Session::get('msgClient'.$i);
                            if($msg_client->clients_id == $dernier_msg->table_id){
                            $msg_client->answered = "yes";
                            $msg_client->save(); 
                            Session::forget('msgClient'.$i);
                        }
                    }
                    }
                    return redirect()->back()->with("ok", "Envoyé avec succès!");
                }

                if ($dernier_msg->table == 'prospect_contact')
                {
                    if (Session::get('nbrProspect') !== 0){
                        $nbrProspect = Session::get('nbrProspect');
                        for($i = 0; $i < $nbrProspect; $i++){
                            $msg_prospect = Session::get('msgProspect'.$i);
                            if($msg_prospect->prospect_id == $dernier_msg->table_id){
                            $msg_prospect->answered = "yes";
                            $msg_prospect->save(); 
                            Session::forget('msgProspect'.$i);
                        }
                    }
                    }
                    return redirect()->back()->with("ok", "Envoyé avec succès!");
                }
               
                   return redirect('/')->with("ok", "Envoyé avec succès!");
                
            }
        }
}

