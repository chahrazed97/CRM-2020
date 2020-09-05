<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\messageEmp;
use App\models\Employees; 
use DB;
use Auth;

class equipeConversationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

        $tt_msgs = messageEmp::where('send_emp_id', '=', $employe->id)->orwhere('receiv_emp_id', '=', $employe->id)->get();
        $membre_equipe_id = array();
        foreach($tt_msgs as $msg){
            if($msg->send_emp_id == $employe->id){
             $membre_equipe_id[] = $msg->receiv_emp_id;
            }else{
                $membre_equipe_id[] = $msg->send_emp_id;
            }
        }
        $sender_emp = array_count_values($membre_equipe_id);
        return view('front_office.mesConversations.EquipeConversation.equipeConversation_list', compact('sender_emp'));
    }

    
    public function conversationEmploye(Employees $employe)
    {
        $employe_user= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

        $msg_envoye = messageEmp::where('send_emp_id', '=', $employe_user->id )->where('receiv_emp_id', '=', $employe->id);
        $msg_recu = messageEmp::where('receiv_emp_id', '=', $employe_user->id )->where('send_emp_id', '=', $employe->id);

        $msg_all = $msg_envoye->unionAll($msg_recu)->latest()->get();
        return view('front_office.mesConversations.EquipeConversation.conversation_employe', compact('msg_all'));
    }

    public function suppConversation(Employees $employe)
    {
        $employe_user= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

        $msg_emp = messageEmp::where('send_emp_id', '=', $employe->id)->where('receiv_emp_id','=', $employe_user->id)->get();   
        foreach ( $msg_emp as $msg ){
            $msg->delete();
        }
		return redirect()->back()->with('ok', '1 conversation supprimée !');
    }

}
