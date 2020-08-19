<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AjouterPromotionRequest;
use App\Http\Requests\UpdatePromotionRequest;
use App\Http\Controllers\Controller;
use App\models\Promotion;
use App\models\Produit;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::All(); 
        $produits = Produit::All();     
        return view('back_end.Promotion.list_promotion', compact('promotions', 'produits'));
    }

    public function storePromotion(AjouterPromotionRequest $request)
    {
        $titre = $request->get('titre');
        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');
        $pourcentage = $request->get('pourcentage');
        $produit_id = $request->get('produit');
       

        $promotion = new Promotion();
        $promotion->titre = $titre;
        $promotion->start_date = $start_date;
        $promotion->end_date = $end_date;
        $promotion->pourcetage_promo = $pourcentage;
        $promotion->produit_id = $produit_id;
            
        $promotion->save();
        return redirect()->back()->with("ok", "La promotion " . $promotion->titre. " a bien été créé.");

    }

    public function updatePromotion(UpdatePromotionRequest $request, Promotion $promotion)
    {
        $titre = $request->get('titre');
        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');
        $pourcentage = $request->get('pourcentage');
        $produit_id = $request->get('produit');
    
        $promotion->titre = $titre;
        $promotion->start_date = $start_date;
        $promotion->end_date = $end_date;
        $promotion->pourcetage_promo = $pourcentage;
        $promotion->produit_id = $produit_id;
            
        $promotion->save();
        return redirect()->back()->with("ok", "La promotion " . $promotion->titre. " a bien été modifée.");


    }

    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
		return redirect()->back()->with('ok', "La promotion a bien été supprimée !");
    }
}
