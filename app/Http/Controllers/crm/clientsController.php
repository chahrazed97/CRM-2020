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


class clientsController extends Controller 
{
    protected $client;
    protected $commande;

    public function __construct()
    {
      $this->commande = new Commande(); 
    }

    public function index()
    {
      $clients = clients::All();
      
      return view('front_office.MesClients.list_clients', compact('clients'));
    }

    public function HistoriqueClient(clients $client, $scorecheck, $scoreNocheck)
    {
        $test = $this->commande->listProduit($client->id);
        if ( $scorecheck == 0 ){
            $segment = 9;
        }else{
        $segment = 10 - $scorecheck;
        }
        $action_marketing = actionMarketing::where('segment', '=', $segment)->first(); 
        return view('front_office.MesClients.historique_client', compact('client', 'scorecheck', 'scoreNocheck', 'action_marketing', 'test'));
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
}
