<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class HistoriqueProspect extends Model
{
    protected $table = 'HistoriqueProspect';
    protected $fillable = [
        'titre', 'type_act', 'date_act', 'compte_rendu', 'prospect_id', 'deleted_at', 
    ];

    public function Prospect() 
	{
		return $this->belongsTo('App\models\Prospect');
	}
}
