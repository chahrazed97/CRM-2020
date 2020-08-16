<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\EmployeUpdateRequest;
use App\Http\Requests\AjouterEmployeRequest;
use App\Http\Controllers\Controller;
use App\models\Employees;

class EmployeController extends Controller
{
    public function __construct()
    {
       
    }

    public function index()
    {
      $employees = Employees::All();
      
      return view('back_end.Employees.employe', compact('employees'));
    }

    public function update(EmployeUpdateRequest $request,Employees $employe)
    {
       
        $nom = $request->get('nom');
        $prenom = $request->get('prenom');
        $phone = $request->get('phone');
        $email = $request->get('email');
        $role = $request->get('role');
    
        $employe->nom = $nom;
        $employe->prenom = $prenom;
        $employe->phone = $phone;
        $employe->email = $email;
        $employe->role = $role;
        $employe->is_active = 1;
        $employe->admin_id = 1;
            
        $employe->save();
        return redirect()->back()->with("ok", "L'employe " . $employe->nom.' '.$employe->prenom . " a bien été modifié.");

    
    }

    public function storeEmploye(AjouterEmployeRequest $request)
    {
        $nom = $request->get('nom');
        $prenom = $request->get('prenom');
        $phone = $request->get('phone');
        $email = $request->get('email');
        $role = $request->get('role');

        $employe = new Employees();
        $employe->nom = $nom;
        $employe->prenom = $prenom;
        $employe->phone = $phone;
        $employe->email = $email;
        $employe->role = $role;
            
        $employe->save();
        return redirect()->back()->with("ok", "L'employe " . $employe->nom.' '.$employe->prenom . " a bien été créé.");
    }

    public function destroy(Employees $employe)
	{
		$employe->delete();
		return redirect()->back()->with('ok', 'Cet employe a bien été supprimé !');
	}
}
