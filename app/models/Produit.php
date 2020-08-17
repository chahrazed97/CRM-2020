<?php

namespace App\models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table = 'Produit';
    protected $fillable = [
        'ref_produit', 'type', 'prix', 'taux_tva', 'commande_id', 'deleted_at', 
    ];

    public function commande()
	{
		return $this->belongsToMany('App\models\Commande');
    } 
    
    public function Promotion() 
    {
        return $this->hasMany('App\models\Promotion');
    }

    function newProduct()
    {
        $newProduct = self::whereDate('created_at', '=', Carbon::today())->count();
        return $newProduct;
    }

}
