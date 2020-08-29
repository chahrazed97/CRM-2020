<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Auth;

class Prospect extends Model
{
    protected $table = 'prospect';
    protected $fillable = [
        'nom', 'prenom', 'phone', 'email', 'adresse', 'code_postal', 'date_naissance', 'pays', 'status', 'employee_id', 'deleted_at',
    ];

    public function HistoriqueProspect() 
    {
        return $this->hasMany('App\models\HistoriqueProspect');
    }

    public function Employees() 
	{
		return $this->belongsTo('App\models\Employees', 'employee_id');
    }

    public function user() 
	{
		return $this->belongsTo('App\User');
    }
    
    function newProspect()
    {
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

        $newPros = self::where('employee_id', '=' , $employe->id)->whereDate('created_at', '=', Carbon::today())->where('status', '!=', 'terminé')->count();
        return $newPros;
    }

    function newProspects()
    {
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

        $newPros = self::where('employee_id', '=' , $employe->id)->whereDate('created_at', '=', Carbon::today())->where('status', '!=', 'terminé')->get();
        return $newPros;
    }

    function scoreProspect()
    {
        $nbr_activite = HistoriqueProspect::where('prospect_id', '=', $this->id)->count();
        if ( $nbr_activite >= 20 ){
            $score= 5;
        }else{
            if ( $nbr_activite >= 15 && $nbr_activite < 20){
                $score = 4;
            }else{
                if ( $nbr_activite >=10 && $nbr_activite < 15 ){
                    $score = 3;
                }else{
                    if ( $nbr_activite >= 5 && $nbr_activite < 10 ){
                        $score = 2;
                    }else{
                        if( $nbr_activite < 5 ){
                            $score = 1;
                        }
                    }
                }
            }
        }
        return $score;
    }
}
