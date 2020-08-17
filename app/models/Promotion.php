<?php

namespace App\models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'Promotion';
    protected $fillable = [
        'titre', 'start_date', 'end_date', 'produit_id', 'pourcentage_promo', 'deleted_at', 
    ];

    public function Produit() 
	{
		return $this->belongsTo('App\models\Produit');
    }

    function newPromo()
    {
        $newPromo = self::whereDate('created_at', '=', Carbon::today())->count();
        return $newPromo;
    }
}
