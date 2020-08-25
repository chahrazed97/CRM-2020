<?php

namespace App\models;
use Carbon\Carbon;
use DB;

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
        $newProduct = self::whereDate('created_at', '=', Carbon::today())->where('status', '=', 'non_partagé')->count();
        return $newProduct;
    }
    
    function newProducts()
    {
        $newProduct = self::whereDate('created_at', '=', Carbon::today())->where('status', '=', 'non_partagé')->get();
        return $newProduct;
    }

    public function NbrFoisAcheter()
    {
        $nbr_fois = DB::table('commande_produit')->where('produit_id', '=', $this->id )->count();
        return $nbr_fois;
    }

}
