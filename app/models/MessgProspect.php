<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class MessgProspect extends Model
{
    protected $table = 'messg_prospects';
    protected $fillable = [ 'destination', 'subject', 'msg', 'prospect_id'
        ];

    public function Prospect() 
    {
        return $this->belongsTo('App\models\Prospect');
    }

    public function newMessagProspect()
    {
        $id_prospects = array();
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();
        $prospects_id = Prospect::where('employee_id', '=', $employe->id)->select('id')->get();
        foreach($prospects_id as $prospect_id){
            $id_prospects[] = $prospect_id->id;
        }

        $new_msgProspect = self::whereIn('prospect_id', $id_prospects)->where('answered', '=', 'no')->count();
        return $new_msgProspect;
    }

    public function newMessagProspects()
    {
        $id_prospects = array();
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();
        $prospects_id = Prospect::where('employee_id', '=', $employe->id)->select('id')->get();
        foreach($prospects_id as $prospect_id){
            $id_prospects[] = $prospect_id->id;
        }

        $new_msgProspect = self::whereIn('prospect_id', $id_prospects)->where('answered', '=', 'no')->latest()->get();
        return $new_msgProspect;
    }
}
