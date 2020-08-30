<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Employees;
use App\models\messageEmp;
use App\models\messageAdmin;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\User;
use Auth;

class OurTeamController extends Controller
{
   
    public function __construct()
    {
      
    }

    public function index()
    {
      $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

      $employee = Employees::where('id', '!=', $employe->id)->select('id', 'nom', 'prenom', 'email', 'phone', 'role');
      $admin = User::where('id', '=', 1)->select('id', 'nom', 'prenom', 'email', 'phone', 'role');
      $membres = $admin->union($employee)->get();
      
      return view('front_office.Our_team.membres_equipe', compact('membres'));
    }

    public function EnvoyerMsg($id, $role)
    {
      $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

      if ( $role !== 'admin'){
          $msgEmp = new messageEmp();
          $msgEmp->message = $_POST['msg'];
          $msgEmp->date_msg = Carbon::now();
          $msgEmp->send_emp_id = $employe->id;
          $msgEmp->receiv_emp_id = $id;
          $msgEmp->save();
          if (Session::has('msgEmp')){
            $msgs_des_emp =  Session::get('msgEmp');
            foreach ($msgs_des_emp as $msg_emp){
               $msg_emp->answered = "yes";
               $msg_emp->save();
            }
            Session::forget('msgEmp');
          }
        
      }else{
          $msgAdmin = new messageAdmin();
          $msgAdmin->message = $_POST['msg'];
          $msgAdmin->date_msg = Carbon::now();
          $msgAdmin->send_emp_id = $employe->id;
          $msgAdmin->receiv_admin_id = $id;
          $msgAdmin->save();
      }
      return redirect()->back()->with("ok", "Votre message a bien été envoyé.");
    }
}
