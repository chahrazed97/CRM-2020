<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\MessgClient;
use App\models\clients;
use App\Messg;
use DB;

class mesConversationsController extends Controller
{
    public function index()
    {
        $destination_client = DB::table('messgs')
        ->select('destination', DB::raw('count(id) as client_count'))
        ->groupBy('destination')
        ->get();
        return view('front_office.mesConversations.mesConversations_list', compact('destination_client'));
    }

    public function conversationClient(clients $client)
    {
        $client = clients::where('email', '=', $client->email)->first();
        $activite_cl= MessgClient::where('clients_id', '=', $client->id )->select('id', 'destination', 'subject', 'msg', 'created_at');
        $activite_emp= Messg::where('employee_id', '=', 1)->where('destination', '=', $client->email)->orwhere('destination', '=', 'tout_le_monde')->select('id', 'destination', 'subject', 'msg', 'created_at');  
        $activite_all = $activite_cl->unionAll($activite_emp)->latest()->get();
        return view('front_office.mesConversations.conversation_client', compact('activite_all', 'client'));
    }

    public function destroy($email_destroy)
    {
        $msg_emp = Messg::where('destination', '=', $email_destroy)->get;   
        foreach ( $msg_emp as $msg ){
            $msg->delete();
        }
		return redirect()->back()->with('ok', '1 conversation supprimée !');
    }
}
