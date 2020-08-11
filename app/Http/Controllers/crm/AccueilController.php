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
use Carbon\Carbon;
use DB;

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
		
	}

	public function index()
	{
		$activites  = $this->activite->ActiviteAujourdHui();
		$email_ouvert= $this->activite->EmailOuvert();
		$email_termine= $this->activite->EmailTermine();
		$appel_ouvert= $this->activite->AppelOuvert();
		$appel_termine= $this->activite->AppelTermine();
		$rendezVous_ouvert= $this->activite->RendezVousOuvert();
		$rendezVous_termine= $this->activite->RendezVousTermine();
		$liens = lienRapide::All();
		$new_client = $this->clients->newClient();
		$new_event = $this->evenement->newEvent();
		$new_product = $this->produit->newProduct();
		$new_promo = $this->promotion->newPromo();
		$new_reclam = $this->reclamation->newReclamation();
		
		return view('front_office.accueil.CRMaccueil', compact('activites', 'email_ouvert', 'email_termine', 'appel_ouvert', 'appel_termine', 'rendezVous_ouvert', 'rendezVous_termine', 'liens', 'new_client', 'new_event', 'new_product', 'new_promo', 'new_reclam'));
	}
	
	public function ajaxModifier(Activite $activite)
	{
		$clients = clients::All();
		return view('front_office.accueil.modifier_activite', compact('activite', 'clients'));
	}

 
  public function storeActivite(AjouterActiviteRequest $request)
  {
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
	$activite->employee_id = 1;
	$activite->clients_id = $client_id;
	$activite->description = $description;
	$activite->save();
	return redirect()->back()->with("ok", "L'activité " . $activite->titre . " a bien été créée.");
  }

  public function storeLien(AjouterLienRequest $request)
  {

    $titre = $request->get('titre');
    $url = $request->get('url');

    $lien = new lienRapide();
    $lien->titre = $titre;
	$lien->lien = $url;
	$lien->employee_id = 1;
	
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
		$date_tt= $date.' '.$time;
		if(!isset($titre)){
			$titre= $type;
		}	

		$activite->titre = $titre;
		$activite->type_activite = $type;
		$activite->date_act = $date_tt;
		$activite->employee_id = 1;
		$activite->clients_id = $client_id;
		$activite->description = $description;
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
