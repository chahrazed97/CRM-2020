<?php

namespace App\models;
use Carbon\Carbon;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    protected $table = 'Reclamation';
    protected $fillable = [
        'description', 'date_rec', 'clients_id', 'deleted_at',
    ];

    public function clients() 
	{
		return $this->belongsTo('App\models\clients');
    }
    
    function newReclamation()
    {
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();
        $client_emp = array();
        foreach ( $employe->clients as $client ){
            $client_emp[] = $client->id;
        }
        if(empty($client_emp)){
            $newReclam = 0;
        }else{
        $newReclam = self::whereIn('clients_id', $client_emp)->whereDate('created_at', '=', Carbon::today())->where('status', '=', 'non_répondu')->count();
        }
        return $newReclam;
    }
    function newReclamations()
    {
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();
        $client_emp = array();
        foreach ( $employe->clients as $client ){
            $client_emp[] = $client->id;
        }
        
        $newReclam = self::whereIn('clients_id', $client_emp)->whereDate('created_at', '=', Carbon::today())->where('status', '=', 'non_répondu')->get();
        return $newReclam;
    }
}
