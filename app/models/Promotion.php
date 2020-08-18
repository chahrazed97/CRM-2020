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

    function newPromos()
    {
        $newPromo = self::whereDate('created_at', '=', Carbon::today())->get();
        return $newPromo;
    }

    public function StatusPromo()
    {
        $today = Carbon::today();
        if ($this->start_date > $today)
        {
            $status = 'Planifiée';
        }
        if ($this->end_date < $today)
        {
            $status = 'Terminée';
        }
        if ($this->start_date < $today &&  $this->end_date > $today)
        {
            $status = 'En cours';
        }
        return $status;
    }
}
