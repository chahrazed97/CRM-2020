<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AjouterClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\models\Prospect;

class ProspectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $prospects = Prospect::All();
      
        return view('back_end.Prospects.list_prospect', compact('prospects'));
    }

    public function storeProspect(AjouterClientRequest $request)
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

        $prospect = new Prospect();
        $prospect->nom = $nom;
        $prospect->prenom = $prenom;
        $prospect->phone = $phone;
        $prospect->email = $email;
        $prospect->date_naissance = $date_naissance;
        $prospect->adresse = $code_postal;
        $prospect->pays = $pays;
        $prospect->code_postal = $code_postal;
        $prospect->admin_id = 1;
        $prospect->status = 'active';
            
        $prospect->save();
        return redirect()->back()->with("ok", "Le prospect " . $prospect->nom.' '.$prospect->prenom . " a bien été créé.");

    }

    public function destroy(Prospect $prospect)
	{
		$prospect->delete();
		return redirect()->back()->with('ok', "Le prospect a bien été supprimé !");
    }
    
    public function updateProspect(UpdateClientRequest $request, Prospect $prospect)
    {
        $nom = $request->get('nom');
        $prenom = $request->get('prenom');
        $phone = $request->get('phone');
        $email = $request->get('email');
        $date_naissance = $request->get('date_naissance');
        $adresse = $request->get('adresse');
        $pays = $request->get('pays');
        $code_postal = $request->get('code_postal');

        $prospect->nom = $nom;
        $prospect->prenom = $prenom;
        $prospect->phone = $phone;
        $prospect->email = $email;
        $prospect->date_naissance = $date_naissance;
        $prospect->adresse = $code_postal;
        $prospect->pays = $pays;
        $prospect->code_postal = $code_postal;
        
        $prospect->save();
        return redirect()->back()->with("ok", "Le prospect " . $prospect->nom.' '.$prospect->prenom . " a bien été modifié.");
    }
}
