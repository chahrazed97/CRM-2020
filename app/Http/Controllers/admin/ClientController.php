<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AjouterClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\models\Commande;
use App\models\clients;
use App\models\Employees;
use App\models\HistoriqueClient;
use App\models\Activite;
use App\models\Commentaire;
use App\models\actionMarketing;

class ClientController extends Controller
{
    protected $client;
    protected $commande;

    public function __construct()
    {
         $this->middleware('auth');
      $this->commande = new Commande(); 
      $this->client = new clients();
    }

    public function index()
    {
      $clients = clients::All();
      $employes = Employees::All();
      
      return view('back_end.Clients.list_client', compact('clients', 'employes'));
    }

    public function HistoriqueClient(clients $client, $scorecheck, $scoreNocheck)
    {

        //dernier commentaire
        $commentaire = Commentaire::where('clients_id', '=', $client->id)->latest()->get();
        //comportement d'achat
        $commande_cl = Commande::where('clients_id', '=', $client->id)->latest()->get();  
        //info sur le score
        if ( $scorecheck == 0 ){
            $segment = 9;
        }else{
        $segment = 10 - $scorecheck;
        }
        $action_marketing = actionMarketing::where('segment', '=', $segment)->first(); 
        //produit préferé
        $top_produit = $this->client->ProduitPrefere($client->id);
        //mode payement préferé
        $top_modePayement = $this->client->modePayementPrefere($client->id);
        //panier moyen
        $panier_moyen = $this->client->PanierMoyen($client->id);
        return view('back_end.Clients.historique_client', compact('client', 'scorecheck', 'scoreNocheck', 'action_marketing', 'commande_cl', 'activite_all', 'commentaire', 'top_produit', 'top_modePayement', 'panier_moyen'));
    }

    public function storeClient(AjouterClientRequest $request)
    {
        $nom = $request->get('nom');
        $prenom = $request->get('prenom');
        $phone = $request->get('phone');
        $email = $request->get('email');
        $date_naissance = $request->get('date_naissance');
        $adresse = $request->get('adresse');
        $pays = $request->get('pays');
        $code_postal = $request->get('code_postal');
        $metier = $request->get('metier');
        $employe_id = $request->get('employe');

        $client = new clients();
        $client->nom = $nom;
        $client->prenom = $prenom;
        $client->phone = $phone;
        $client->email = $email;
        $client->date_naissance = $date_naissance;
        $client->adresse = $code_postal;
        $client->pays = $pays;
        $client->code_postal = $code_postal;
        $client->metier = $metier;
        $client->admin_id = 1;
        $client->employee_id = $employe_id;
        $client->status = 'active';
            
        $client->save();
        return redirect()->back()->with("ok", "Le client " . $client->nom.' '.$client->prenom . " a bien été créé.");
    }

    public function destroy(clients $client)
	{
		$client->delete();
		return redirect()->back()->with('ok', "Le client a bien été supprimé !");
    }
    
    public function updateClient(UpdateClientRequest $request, clients $client)
    {
        $nom = $request->get('nom');
        $prenom = $request->get('prenom');
        $phone = $request->get('phone');
        $email = $request->get('email');
        $date_naissance = $request->get('date_naissance');
        $adresse = $request->get('adresse');
        $pays = $request->get('pays');
        $code_postal = $request->get('code_postal');
        $metier = $request->get('metier');
        $employe_id =  $request->get('employe');

        $client->nom = $nom;
        $client->prenom = $prenom;
        $client->phone = $phone;
        $client->email = $email;
        $client->date_naissance = $date_naissance;
        $client->adresse = $code_postal;
        $client->pays = $pays;
        $client->code_postal = $code_postal;
        $client->metier = $metier;
        $client->employee_id = $employe_id;
        
        $client->save();
        return redirect()->back()->with("ok", "Le client " . $client->nom.' '.$client->prenom . " a bien été modifié.");
    }
}
