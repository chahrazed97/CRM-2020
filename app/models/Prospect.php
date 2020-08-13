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
}
