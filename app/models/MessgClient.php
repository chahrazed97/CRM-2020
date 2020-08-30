<?php

namespace App\models;
use Auth;

use Illuminate\Database\Eloquent\Model;

class MessgClient extends Model
{
    protected $table = 'messg_clients';
    protected $fillable = [ 'destination', 'subject', 'msg', 'clients_id'
        ];

    public function clients() 
    {
        return $this->belongsTo('App\models\clients');
    }

    public function newMessagClient()
    {
        $id_clients = array();
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();
        $clients_id = clients::where('employee_id', '=', $employe->id)->select('id')->get();
        foreach($clients_id as $client_id){
            $id_clients[] = $client_id->id;
        }

        $new_msgClient = self::whereIn('clients_id', $id_clients)->where('answered', '=', 'no')->count();
        return $new_msgClient;
    }

    public function newMessagClients()
    {
        $id_clients = array();
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();
        $clients_id = clients::where('employee_id', '=', $employe->id)->select('id')->get();
        foreach($clients_id as $client_id){
            $id_clients[] = $client_id->id;
        }

        $new_msgClient = self::whereIn('clients_id', $id_clients)->where('answered', '=', 'no')->latest()->get();
        return $new_msgClient;
    }
}
