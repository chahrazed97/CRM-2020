<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\events;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use View;
use Validator;
use Calendar;
class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $events = events::get();
       $events_list = [];
       foreach ($events as $key => $event){
           $events_list[] = Calendar::event(
               $task->name,
               true,
               new \DateTime('2020-06-12'),
               new \DateTime('2020-06-12')

               /*new \DateTime($task->date_start)
               new \DateTime($task->end_date.' +1 day') */
           );
       }
       $calendar_details = Calendar::addEvents($events_list);
       return view('crm.Tasks.Calander', compact('calendar_details') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $event= new events;
        $event->event_name = $request['event_name'];
        $event->start_date = $request['start_date'];
        $event->end_date = $request['end_date'];
        $event->save();
        \Session::flash('Success', 'Task added successfully.');
        return Redirect::to('/events');
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

}
