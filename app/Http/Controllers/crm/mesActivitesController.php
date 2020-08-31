<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\activite;
use App\models\clients;
use App\models\Evenement;
use App\models\Promotion;
use App\models\Employees;
use Calendar;
use Auth;

class mesActivitesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

        $events = [];
        $activites = activite::where('employee_id', '=', $employe->id)->get();
        if($activites->count()) {
            foreach ($activites as $key => $value) {
                $events[] = Calendar::event(
                    $value->titre,
                    true,
                    new \DateTime($value->date_act),
                    new \DateTime($value->date_act.' +1 day'),
                    null,
                    // Add color and link on event
	                [
	                    'color' => 'blueviolet',
	                   // 'url' => url('MesActivites/#'.$value->id),
                    ]
                   
                );
            }
        }
        $evenements = Evenement::all();
        if($evenements->count()) {
            foreach ($evenements as $key => $value) {
                $events[] = Calendar::event(
                    $value->titre,
                    true,
                    new \DateTime($value->date),
                    new \DateTime($value->date.' +1 day'),
                    null,
                    // Add color and link on event
	                [
	                    'color' => '#f05050',
	                   // 'url' => url('MesActivites/#'.$value->id),
                    ]
                   
                );
            }
        }

        $promotions = Promotion::all();
        if($promotions->count()) {
            foreach ($promotions as $key => $value) {
                $events[] = Calendar::event(
                    $value->titre,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
	                [
	                    'color' => 'yellow',
	                   // 'url' => url('MesActivites/#'.$value->id),
                    ]
                   
                );
            }
        }
        $calendar = Calendar::addEvents($events);
        $clients = clients::All();
        return view('front_office.MesActivites.mesActivites', compact('calendar', 'clients', 'activites'));
    }
}
