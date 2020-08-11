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
       
           if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password'), 'admin' => $request->get('admin')])) {
            
              return Redirect::to('accueil');
            } else {
              Session::flash('message-error', 'Wrong email or password!');
              return Redirect::to('login');
                  }
    }

    

    public function logout()
    {
        Session::flash('message-success', 'You have been logged out form system.');
        Auth::logout();
        return Redirect::to('login');
    }

}
