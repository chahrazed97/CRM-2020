<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\MessgClient;
use App\models\clients;
use App\models\Employees;
use App\Messg;
use DB;
use Auth;

class mesConversationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

        $destination_client = DB::table('messgs')
        ->select('destination', DB::raw('count(id) as client_count'))
        ->where('employee_id', '=', $employe->id)
        ->where('table', '!=', 'prospect')
        ->orwhere('table', '!=', 'prospect_contact')
        ->groupBy('destination')
        ->get();
        return view('front_office.mesConversations.mesConversations_list', compact('destination_client'));
    }

    public function conversationClient(clients $client)
    {
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

        $activite_cl= MessgClient::where('clients_id', '=', $client->id )->select('id', 'destination', 'subject', 'msg', 'created_at');
        $activite_emp= Messg::where('employee_id', '=', $employe->id)->whereIn('destination', [$client->email, 'tout_le_monde', 'tout_les_clients'])->select('id', 'destination', 'subject', 'msg', 'created_at');  
        $activite_all = $activite_cl->unionAll($activite_emp)->latest()->get();
        return view('front_office.mesConversations.conversation_client', compact('activite_all', 'client'));
    }

    public function suppConversation($email_destroy)
    {
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

        $msg_emp = Messg::where('employee_id', '=', $employe->id)->where('destination', '=', $email_destroy)->get();   
        foreach ( $msg_emp as $msg ){
            $msg->delete();
        }
		return redirect()->back()->with('ok', '1 conversation supprimée !');
    }
}
