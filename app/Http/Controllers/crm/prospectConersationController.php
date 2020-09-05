<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Employees;
use App\models\Prospect;
use App\models\MessgProspect;
use App\Messg;
use DB;
use Auth;

class prospectConersationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

        $destination_prospect = DB::table('messgs')
        ->select('destination', DB::raw('count(id) as client_count'))
        ->where('employee_id', '=', $employe->id)
        ->whereIn('table', ['prospect', 'prospect_contact'])
        ->groupBy('destination')
        ->get();
        return view('front_office.mesConversations.ProspectConversation.conversationProspect_list', compact('destination_prospect'));
    }

    public function conversationProspect(Prospect $prospect)
    {
        
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

        $activite_pr= MessgProspect::where('prospect_id', '=', $prospect->id )->select('id', 'destination', 'subject', 'msg', 'created_at');
        $activite_emp= Messg::where('employee_id', '=', $employe->id)->whereIn('destination', [$prospect->email, 'tout_le_monde', 'tout_les_prospects'])->select('id', 'destination', 'subject', 'msg', 'created_at');  
        $activite_all = $activite_pr->unionAll($activite_emp)->latest()->get();
        return view('front_office.mesConversations.ProspectConversation.conversation_prospect', compact('activite_all', 'prospect'));

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
