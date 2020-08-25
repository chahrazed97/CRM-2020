<?php

namespace App\models;
use Carbon\Carbon;
use DB;

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
        $newPromo = self::whereDate('created_at', '=', Carbon::today())->where('status', '=', 'non_partagé')->count();
        return $newPromo;
    }

    function newPromos()
    {
        $newPromo = self::whereDate('created_at', '=', Carbon::today())->where('status', '=', 'non_partagé')->get();
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

    public function nbrVente()
    {
        $nbr_vente = DB::table('commande')
        ->join('commande_produit', 'commande.id', '=', 'commande_produit.commande_id')
        ->join('produit', 'produit.id', '=', 'Commande_produit.produit_id' )
        ->where('commande.date_comm', '>=', $this->start_date)
        ->where('commande.date_comm', '<=', $this->end_date)
        ->where('produit.type', '=', $this->Produit->type)
        ->count();
        return $nbr_vente;
    }
}
