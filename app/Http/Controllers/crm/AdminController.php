<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\changerParametreRequest;
use App\services\AdminService;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\models\Employees;
use App\User;
use View;
use Auth;

class AdminController extends Controller
{
    private $adminService;

    public function __construct()
    {
        $this->adminService = new AdminService();
    }

    public function showLoginForm()
    {
        return View::make('admin.index');
    }

    public function processLoginAdmin(Request $request)
    {
        //TODO validation request
       
           if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
               $isAdmin = $request->get('admin');
              if (isset($isAdmin)){
                if(Auth::user()->role == 'admin'){
                    return Redirect::to('admin/home');
                }else{
                    Session::flash('message-error', "Vous n'avez pas accés à l'espace administrateur");
                    return Redirect::to('login');
                }
            }
              if(isset($isAdmin) == false ){
                if(Auth::user()->role == 'admin'){
                    Session::flash('message-error', "Vous n'avez pas accés à la partie font office du CRM");
                    return Redirect::to('login');
              }else{
                  return Redirect::to('/');
              }
            }
              
            } else {
              Session::flash('message-error', 'e-mail ou mot de passe incorrecte!');
              return Redirect::to('login');
            }
    
}

    

    public function logout()
    {
        Session::flash('message-success', 'Vous etes déconnecté.');
        Auth::logout();
        return Redirect::to('login');
    }
    
    public function changerParametres()
    {
        $employe_user = Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom)->where('phone', '=', Auth::user()->phone)->where('email', '=', Auth::user()->email)->where('role', '=',Auth::user()->role)->first();
        //$user = User::where('id', '=', Auth::user()->id)->first();
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $old_psw = $_POST['old_psw'];
        $new_psw = $_POST['new_psw'];
        $confirm_new_psw = $_POST['confirm_new_psw'];

        Auth::user()->phone = $phone;
        Auth::user()->email = $email;
        if ($employe_user !== NULL){
        $employe_user->phone = $phone;
        $employe_user->email = $email; 
        $employe_user->save();
        }
        
        if(isset($old_psw) and isset($new_psw) and isset($confirm_new_psw)){
            if(bcrypt($old_psw) == Auth::user()->password){
            Auth::user()->password =  bcrypt($new_psw);
            }else{
                return redirect()->back()->with('ok','Mot de passe incorrecte!');
            }
          
        }
      
        Auth::user()->save();
       
        return redirect()->back()->with('ok','Modifications enregistrées!');
    }
}
