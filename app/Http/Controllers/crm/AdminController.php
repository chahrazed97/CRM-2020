<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\services\AdminService;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
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

}
