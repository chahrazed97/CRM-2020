<?php

namespace App\models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    protected $table = 'Evenement';
    protected $fillable = [
        'titre', 'date', 'localisation', 'description', 'admin_id', 'deleted_at', 
    ];

    public function user() 
	{
		return $this->belongsTo('App\User');
    }
    
    function newEvent()
    {
        $newEvent = self::whereDate('created_at', '=', Carbon::today())->where('status', '=', 'non_partagé')->count();
        return $newEvent;
    }

    function newEvents()
    {
        $newEvent = self::whereDate('created_at', '=', Carbon::today())->where('status', '=', 'non_partagé')->get();
        return $newEvent;
    }
}
