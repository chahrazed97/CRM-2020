<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Employees;
use App\models\messageEmp;
use App\models\messageAdmin;
use Carbon\Carbon;
use App\User;

class OurTeamController extends Controller
{
   
    public function __construct()
    {
      
    }

    public function index()
    {
      $employee = Employees::select('id', 'nom', 'prenom', 'email', 'phone', 'role');
      $admin = User::select('id', 'nom', 'prenom', 'email', 'phone', 'role');
      $membres = $admin->union($employee)->get();
      
      return view('front_office.Our_team.membres_equipe', compact('membres'));
    }

    public function EnvoyerMsg($id, $role)
    {
      if ( $role !== 'admin'){
          $msgEmp = new messageEmp();
          $msgEmp->message = $_POST['msg'];
          $msgEmp->date_msg = Carbon::now();
          $msgEmp->send_emp_id = 1;
          $msgEmp->receiv_emp_id = $id;
          $msgEmp->save();
        
      }else{
          $msgAdmin = new messageAdmin();
          $msgAdmin->message = $_POST['msg'];
          $msgAdmin->date_msg = Carbon::now();
          $msgAdmin->send_emp_id = 1;
          $msgAdmin->receiv_admin_id = $id;
          $msgAdmin->save();
      }
      return redirect()->back()->with("ok", "Votre message a bien été envoyé.");
    }
}
