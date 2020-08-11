<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $table = 'Facture';
    protected $fillable = [
        'num_fac', 'date_fac', 'commande_id', 'deleted_at', 
    ];

    public function commande() 
	{
		return $this->belongsTo('App\models\Commande');
    }
}
