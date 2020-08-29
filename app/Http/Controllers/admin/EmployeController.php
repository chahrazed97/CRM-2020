<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\EmployeUpdateRequest;
use App\Http\Requests\AjouterEmployeRequest;
use App\Http\Controllers\Controller;
use App\models\Employees;
use App\models\clients;
use App\models\Prospect;
use Illuminate\Support\Facades\Hash;
use App\User;

class EmployeController extends Controller
{
    public function __construct()
    {
       
    }

    public function index()
    {
      $employees = Employees::All();
      $client_nonSuivi = clients::where('employee_id', '=', 0)->get();
      $prospect_nonSuivi = Prospect::where('employee_id', '=', 0)->get();
      return view('back_end.Employees.employe', compact('employees', 'client_nonSuivi', 'prospect_nonSuivi'));
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
            

        $employe_user = User::where('nom', '=', $employe->nom)->where('prenom', '=', $employe->prenom)->where('phone', '=', $employe->phone)->where('email', '=', $employe->email)->where('role', '=', $employe->role)->first();
        $employe_user->nom = $nom;
        $employe_user->prenom = $prenom;
        $employe_user->email = $email;
        $employe_user->phone = $phone;
        $employe_user->role = $role;

        $employe_user->save();
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
        $employe->is_active = 1;
        $employe->admin_id = 1;

        $employe_user = new User();
        $employe_user->nom = $nom;
        $employe_user->prenom = $prenom;
        $employe_user->email = $email;
        $employe_user->phone = $phone;
        $employe_user->role = $role;
        $employe_user->password =  Hash::make('chouchou');
        
       
        $employe_user->save();
        $employe->save();

        return redirect()->back()->with("ok", "L'employe " . $employe->nom.' '.$employe->prenom . " a bien été créé.");
    }

    public function destroy(Employees $employe)
	{
        $employe_user = User::where('nom', '=', $employe->nom)->where('prenom', '=', $employe->prenom)->where('phone', '=', $employe->phone)->where('email', '=', $employe->email)->where('role', '=', $employe->role)->first();

        $employe->delete();
        $employe_user->delete();
		return redirect()->back()->with('ok', "L'employe a bien été supprimé !");
    }

    
}
