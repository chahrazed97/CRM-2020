<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\messageEmp;
use App\models\Employees; 
use DB;

class equipeConversationController extends Controller
{
    public function index()
    {
        $sender_emp = DB::table('messagesempl')
        ->select('send_emp_id', DB::raw('count(id) as empl_count'))
        ->where('receiv_emp_id', '=', 1)
        ->groupBy('send_emp_id')
        ->get();
        return view('front_office.mesConversations.EquipeConversation.equipeConversation_list', compact('sender_emp'));
    }

    
    public function conversationEmploye(Employees $employe)
    {
        $msg_envoye = messageEmp::where('send_emp_id', '=', 1 );
        $msg_recu = messageEmp::where('receiv_emp_id', '=', 1 );

        $msg_all = $msg_envoye->unionAll($msg_recu)->latest()->get();
        return view('front_office.mesConversations.EquipeConversation.conversation_employe', compact('msg_all'));
    }

    public function destroy(Employees $employe)
    {
        $msg_emp = messageEmp::where('send_emp_id', '=', $employe->id)->where('receiv_emp_id','=',1)->get();   
        foreach ( $msg_emp as $msg ){
            $msg->delete();
        }
		return redirect()->back()->with('ok', '1 conversation supprimée !');
    }

}
