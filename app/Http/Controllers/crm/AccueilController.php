<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ActiviteUpdateRequest;
use App\Http\Requests\AjouterActiviteRequest;
use App\Http\Requests\AjouterLienRequest;
use App\Http\Controllers\Controller;
use App\models\clients;
use App\models\Activite;
use App\models\lienRapide;
use App\models\Promotion;
use App\models\Evenement;
use App\models\Produit;
use App\models\Reclamation;
use App\models\Employees;
use App\models\Prospect;
use App\models\MessgClient;
use App\models\MessgProspect;
use App\models\messageEmp;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use DB;
use Auth;

class AccueilController extends Controller
{
   

    protected $clients;

    public function __construct()
    {
	$this->clients = new clients();
	$this->activite = new activite();
	$this->promotion = new Promotion();
	$this->evenement = new Evenement();
	$this->produit = new Produit();
	$this->reclamation = new Reclamation();
	$this->prospect = new Prospect();
	$this->mssgClient = new MessgClient();
	$this->mssgProspect = new MessgProspect();
	$this->mssgEmp = new messageEmp();
	$this->middleware('auth');
	$this->middleware('ajax', ['only' => 'test']);
	}

	public function index()
	{
		$employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

		$activites  = $this->activite->ActiviteAujourdHui();
		$email_ouvert= $this->activite->EmailOuvert();
		$email_termine= $this->activite->EmailTermine();
		$appel_ouvert= $this->activite->AppelOuvert();
		$appel_termine= $this->activite->AppelTermine();
		$rendezVous_ouvert= $this->activite->RendezVousOuvert();
		$rendezVous_termine= $this->activite->RendezVousTermine();
		$liens = lienRapide::where('employee_id', '=', $employe->id)->get();
		$clients = clients::where('employee_id', '=', $employe->id)->get();
		//notification
		$new_client = $this->clients->newClient();
		$new_clients = $this->clients->newClients();
		$new_prospect = $this->prospect->newProspect();
		$new_prospects = $this->prospect->newProspects();
		$new_event = $this->evenement->newEvent();
		$new_events = $this->evenement->newEvents();
		$new_product = $this->produit->newProduct();
		$new_products = $this->produit->newProducts();
		$new_promo = $this->promotion->newPromo();
		$new_promos = $this->promotion->newPromos();
		$new_reclam = $this->reclamation->newReclamation();
		$new_reclams = $this->reclamation->newReclamations();
		$birthday_today = $this->clients->isBirthday();
		$birthday_clients = $this->clients->isBirthdayClients();

		//notification menu bar
		 $new_msgClient = $this->mssgClient->newMessagClients();
		 $nbr_msgClient = $this->mssgClient->newMessagClient();
		 $new_msgProspect = $this->mssgProspect->newMessagProspects();
		 $nbr_msgProspect = $this->mssgProspect->newMessagProspect();
		 $new_msgEmp = $this->mssgEmp->newMsgEmps();
		 $nbr_msgEmp = $this->mssgEmp->newMsgEmp();
        
		 if ($nbr_msgClient !== 0){
			 $i = 0;
			 foreach ($new_msgClient as $msgClient){
				 Session::put('msgClient'.$i, $msgClient);
				 $i = $i+1;
			 }
		 } 
		 Session::put('nbrClient', $nbr_msgClient);

		 if ($nbr_msgProspect !== 0){
			$i = 0;
			foreach ($new_msgProspect as $msgProspect){
				Session::put('msgProspect'.$i, $msgProspect);
				$i = $i+1;
			}
		} 
		 Session::put('nbrProspect', $nbr_msgProspect);

		 
		 if ($nbr_msgEmp !== 0){
			$i = 0;
			foreach ($new_msgEmp as $msgEmp){
				Session::put('msgEmp'.$i, $msgEmp);
				$i = $i+1;
			}
		} 
		 Session::put('nbrEmp', $nbr_msgEmp);
		 
		
		return view('front_office.accueil.CRMaccueil', compact('activites', 'email_ouvert', 'email_termine', 'appel_ouvert', 'appel_termine', 'rendezVous_ouvert', 'rendezVous_termine', 'liens', 'new_client', 'new_clients',  'new_event', 'new_events', 'new_product', 'new_products', 'new_promo', 'new_promos', 'new_reclam', 'new_reclams', 'birthday_today', 'birthday_clients', 'new_prospect', 'new_prospects'));
	}
	
	public function ajaxModifier(Activite $activite)
	{
		$employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

		$clients = clients::where('employee_id', '=', $employe->id);
		return view('front_office.accueil.modifier_activite', compact('activite', 'clients'));
	}

 
  public function storeActivite(Request $request)
  {
	$employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

	$type = $request->get('type');
	$titre = $request->get('titre');
	$date = $request->get('date');
	$time = $request->get('heure');
	$client_id = $request->get('client');
	$description = $request->get('description');
	$date_tt= $date.' '.$time;
	if(!isset($titre)){
		$titre= $type;
	}

	$activite = new Activite();
	$activite->titre = $titre;
	$activite->type_activite = $type;
	$activite->date_act = $date_tt;
	$activite->employee_id = $employe->id;
	$activite->clients_id = $client_id;
	$activite->description = $description;
	$activite->save();
	//return response()->json()->withCallback();

	//return response()->json(['ok'=>'Data is successfully added']);
	return redirect()->back()->with("ok", "L'activité " . $activite->titre . " a bien été créée.");
  }

  public function storeLien(AjouterLienRequest $request)
  {
	$employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

    $titre = $request->get('titre');
    $url = $request->get('url');

    $lien = new lienRapide();
    $lien->titre = $titre;
	$lien->lien = $url;
	$lien->employee_id = $employe->id;
	
	$lien->save();
	return redirect()->back()->with("ok", "Le lien " . $lien->titre . " a bien été créé.");
  }

 
  public function updateActivite(ActiviteUpdateRequest $request, Activite $activite)
	{
		$type = $request->get('type');
		$titre = $request->get('titre');
		$date = $request->get('date');
		$time = $request->get('heure');
		$client_id = $request->get('client');
		$description = $request->get('description');
		$status = $request->get('status');
		$date_tt= $date.' '.$time;
		if(!isset($titre)){
			$titre= $type;
		}	

		$activite->titre = $titre;
		$activite->type_activite = $type;
		$activite->date_act = $date_tt;
		$activite->clients_id = $client_id;
		$activite->description = $description;
		$activite->status = $status;
		$activite->save();
		return redirect()->back()->with("ok", "L'activité " . $activite->titre . " a bien été modifiée.");

	} 

	public function marquerCommeTermine(Activite $activite){
		$activite->status = "terminé";
		$activite->save();
		return redirect()->back()->with("ok", "L'activité " . $activite->titre . " a été marquée comme terminée.");

	}

    public function destroy(Activite $activite)
	{
		$activite->delete();
		return redirect()->back()->with('ok', 'Cet activité a bien été supprimé !');
	}

	public function destroyLien(lienRapide $lien)
	{
		$lien->delete();
		return redirect()->back()->with('ok', 'Le lien a bien été supprimé !');
	}

}
