<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\event;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use View;
use Validator;
use Calendar;

class EventController extends Controller
{
    public function index()
    {

        $events = [];
        $data = event::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->event_name,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
	                [
	                    'color' => '#f05050',
	                    'url' => 'pass here url and any route',
	                ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);
        return view('crm.Tasks.Calander', compact('calendar'));
    }



        /*     test some thing else   */
      /* $events = event::get();
       $events_list = [];
       foreach ($events as $key => $event){
           $events_list[] = Calendar::event(
               $event->event_name,
               true,

               new \DateTime($event->date_start),
               new \DateTime($event->end_date.' +1 day') 
           );
       }
       $calendar_details = Calendar::addEvents($events_list);
       return view('crm.Tasks.Calander', compact('calendar_details') ); */
       
    

    public function addEvent(Request $request)
    {
        $validator= Validator::make($request->all(), [
            'event_name' => 'required',
            'start_date ' =>'required',
            'end_date' =>'required',
            
            
        ]);

        if($validator->fails()){
            \Session::flash('warnning', 'Please entre the valid details');
            return Redirect::to('/events')->withInput()->withErrors($validator);
        }
        
        $event= new event;
        $event->event_name = $request['event_name'];
        $event->start_date = $request['start_date'];
        $event->end_date = $request['end_date'];
        $event->save();
        \Session::flash('success', 'Task added successfully.');
        return Redirect::to('/events');
        
      
    }

}
