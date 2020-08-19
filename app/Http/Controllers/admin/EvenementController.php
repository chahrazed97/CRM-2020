<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AjouterEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\models\Evenement;

class EvenementController extends Controller
{
    public function index()
    {
        $evenements = Evenement::All();     
        return view('back_end.Evenements.list_evenement', compact('evenements'));
    }

    public function storeEvenement(AjouterEventRequest $request)
    {
        $titre = $request->get('titre');
        $date = $request->get('date');
        $localisation = $request->get('localisation');
        $description = $request->get('description');

        $evenement = new Evenement();
        $evenement->titre = $titre;
        $evenement->date = $date;
        $evenement->localisation = $localisation;
        $evenement->description = $description;
        $evenement->admin_id = 1;
            
        $evenement->save();
        return redirect()->back()->with("ok", "L'evenement " . $evenement->titre. " a bien été créé.");

    }

    public function updateEvenement(UpdateEventRequest $request, Evenement $evenement)
    {   
        $titre = $request->get('titre');
        $date = $request->get('date');
        $localisation = $request->get('localisation');
        $description = $request->get('description');

        $evenement->titre = $titre;
        $evenement->date = $date;
        $evenement->localisation = $localisation;
        $evenement->description = $description;
            
        $evenement->save();
        return redirect()->back()->with("ok", "L'evenement " . $evenement->titre. " a bien été modifée.");



    }

    public function destroy(Evenement $evenement)
    {
        $evenement->delete();
		return redirect()->back()->with('ok', "L'evenement a bien été supprimée !");
    }
}
