<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AjouterActiviteRequest;
use App\Http\Controllers\Controller;
use App\models\clients;
use App\models\Activite;
use App\models\Commande;
use App\models\actionMarketing;
use App\models\MessgClient;
use App\models\Commentaire;
use App\Messg;
use Carbon\Carbon;


class clientsController extends Controller 
{
    protected $client;
    protected $commande;

    public function __construct()
    {
      $this->commande = new Commande(); 
      $this->client = new clients();
    }

    public function index()
    {
      $clients = clients::All();
      
      return view('front_office.MesClients.list_clients', compact('clients'));
    }

    public function HistoriqueClient(clients $client, $scorecheck, $scoreNocheck)
    {
        //timeline conversation
        $activite_cl= MessgClient::where('clients_id', '=', $client->id )->select('id', 'destination', 'subject', 'msg', 'created_at');
        $activite_emp= Messg::where('employee_id', '=', 1)->where('destination', '=', $client->email)->orwhere('destination', '=', 'tout_le_monde')->select('id', 'destination', 'subject', 'msg', 'created_at');  
        $activite_all = $activite_cl->unionAll($activite_emp)->latest()->get();
        
        //dernier commentaire
        $commentaire = Commentaire::where('clients_id', '=', $client->id)->latest()->first();
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
        return view('front_office.MesClients.historique_client', compact('client', 'scorecheck', 'scoreNocheck', 'action_marketing', 'commande_cl', 'activite_all', 'commentaire', 'top_produit', 'top_modePayement', 'panier_moyen'));
    }

    public function StoreActiviteClient(AjouterActiviteRequest $request, clients $client)
    {
        $type = $request->get('type');
        $titre = $request->get('titre');
        $date = $request->get('date');
        $time = $request->get('heure');
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
        $activite->clients_id = $client->id;
        $activite->description = $description;
        $activite->save();
        return redirect()->back()->with("ok", "L'activité " . $activite->titre . " a bien été créée.");
    }

    public function storeComment(Clients $client)
    {
        $commentaire= new Commentaire();
        $commentaire->description = $_POST['comment'];
        $commentaire->date_comm = Carbon::now();
        $commentaire->clients_id = $client->id;
        $commentaire->employee_id = 1;
        $commentaire->save();
        return redirect()->back()->with("ok", "Votre commentaire sur le client". $client->nom.' '.$client->prenom ."a bien été enregistrer.");
    }

    
}
