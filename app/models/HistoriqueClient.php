<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class HistoriqueClient extends Model
{
    protected $table = 'HistoriqueClient';
    protected $fillable = [
        'titre', 'type_act', 'date_act', 'compte_rendu', 'clients_id', 'deleted_at', 
    ];

    public function clients() 
	{
		return $this->belongsTo('App\models\clients');
	}
}
