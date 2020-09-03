<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\models\clients;
use App\models\Prospect;
use App\models\Promotion;
use App\models\Produit;
use App\models\actionMarketing;
use Carbon\Carbon;


class dashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $nbr_client = clients::All()->count();
        $nbr_prospect = Prospect::All()->count();
        $promo_enCours = Promotion::where('start_date', '<', Carbon::today())->where('end_date', '>', Carbon::today())->count();
        $action_marketing = actionMarketing::All();
        $clients_location = clients::select('pays')->get();
        //top 10 produits
        $produits = Produit::All();
        $produit_nbrvent = array();
        foreach ($produits as $produit){
            $produit_nbrvent[$produit->nom] = $produit->NbrFoisAcheter();
        }
        arsort($produit_nbrvent);// Tri du tableau par valeur
        $dix_top_produit = array_slice($produit_nbrvent, 0, 10);

        //Top 10 promo
        $promotions = Promotion::All();
        $promo_nbrvent = array();
        foreach ($promotions as $promotion){
            $promo_nbrvent[$promotion->titre] = $promotion->nbrVente();
        }
        arsort($promo_nbrvent);// Tri du tableau par valeur
        $dix_top_promo = array_slice($promo_nbrvent, 0, 10);
        return view('back_end.index.index', compact('action_marketing', 'dix_top_produit', 'dix_top_promo', 'clients_location', 'nbr_client', 'nbr_prospect', 'promo_enCours'));
    }
}
