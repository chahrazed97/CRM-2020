<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Prospect extends Model
{
    protected $table = 'prospect';
    protected $fillable = [
        'nom', 'prenom', 'phone', 'email', 'adresse', 'code_postal', 'date_naissance', 'pays', 'status', 'deleted_at',
    ];

    public function HistoriqueProspect() 
    {
        return $this->hasMany('App\models\HistoriqueProspect');
    }

    public function user() 
	{
		return $this->belongsTo('App\User');
    }
    
    function newProspect()
    {
        $newPros = self::whereDate('created_at', '=', Carbon::today())->get();
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
