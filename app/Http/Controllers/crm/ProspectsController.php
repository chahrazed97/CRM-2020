<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Prospect;
use App\models\Employees;
use App\models\MessgProspect;
use App\models\commantaireProspect;
use App\Messg;
use Carbon\carbon;
use Auth;

class ProspectsController extends Controller
{
  protected $prospect;
    public function __construct()
    {
     $this->prospect = new Prospect(); 
    }

    public function index()
    {
      $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

      $prospects = Prospect::where('employee_id', '=', $employe->id)->get();
      $score = $this->prospect->scoreProspect();
      
      return view('front_office.MesProspects.list_prospects', compact('prospects','score'));
    }

    public function HistoriqueProspect(Prospect $prospect)
    {
      $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

      //timeline conversation
      $activite_prosp= MessgProspect::where('prospect_id', '=', $prospect->id )->select('id', 'destination', 'subject', 'msg', 'created_at');
      $activite_emp= Messg::where('employee_id', '=', $employe->id)->whereIn('destination', [$prospect->email, 'tout_le_monde', 'tout_les_prospects'])->select('id', 'destination', 'subject', 'msg', 'created_at');  
      $activite_all = $activite_prosp->unionAll($activite_emp)->latest()->get();
       
      //dernier commentaire
      $commentaire = commantaireProspect::where('employee_id', '=', $employe->id)->where('prospect_id', '=', $prospect->id)->latest()->first();
      return view('front_office.MesProspects.historique_prospect', compact('prospect','activite_all', 'commentaire'));

    }

    public function storeComment(Prospect $prospect)
    {
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

        $commentaire= new commantaireProspect();
        $commentaire->description = $_POST['comment'];
        $commentaire->date_comm = Carbon::now();
        $commentaire->prospect_id = $prospect->id;
        $commentaire->employee_id = $employe->id;
        $commentaire->save();
        return redirect()->back()->with("ok", "Votre commentaire sur le prospect". $prospect->nom.' '.$prospect->prenom ."a bien été enregistrer.");
    }
}
