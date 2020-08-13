<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Employees;
use App\models\messageEmp;
use App\models\messageAdmin;
use App\User;

class OurTeamController extends Controller
{
   
    public function __construct()
    {
      
    }

    public function index()
    {
      $employee = Employees::select('nom', 'prenom', 'email', 'phone', 'role');
      $admin = User::select('nom', 'prenom', 'email', 'phone', 'role');
      $membres = $admin->union($employee)->get();
      
      return view('front_office.Our_team.membres_equipe', compact('membres'));
    }

    public function EnvoyerMsg($membre)
    {
      if ( $membre->role !== 'admin'){
          $msgEmp = new messageEmp();
          $msgEmp->message = $_POST['msg'];
          $msgEmp->date_msg = Carbon::now();
          $msgEmp->send_emp_id = 1;
          $msgEmp->receiv_emp_id = $membre->id;
          $msgEmp->save();
        
      }else{
          $msgAdmin = new messageAdmin();
          $msgAdmin->message = $_POST['msg'];
          $msgAdmin->date_msg = Carbon::now();
          $msgAdmin->send_emp_id = 1;
          $msgAdmin->receiv_admin_id = $membre->id;
          $msgAdmin->save();
      }
      return redirect()->back()->with("ok", "Votre message a bien été envoyé.");
    }
}
