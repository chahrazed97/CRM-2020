<?php

namespace App\models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $table = 'Commande';
    protected $fillable = [
        'num_comm', 'date_comm', 'mode_payement', 'clients_id', 'deleted_at', 
    ];

    public function clients() 
	{
		return $this->belongsTo('App\models\clients');
    }
    
    public function produit()
	{
		return $this->belongsToMany('App\models\Produit');
    } 

    public function facture()
   {
        return $this->hasOne('App\models\Facture', 'commande_id');
   }
    
    function newCommande()
    {
        $newComm = self::whereDate('created_at', '=', Carbon::today())->get();
        return $newComm;
    }

}
