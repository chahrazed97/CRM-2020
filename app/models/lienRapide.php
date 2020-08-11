<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class lienRapide extends Model
{
    protected $table = 'lienRapide';
    protected $fillable = [
        'titre', 'lien', 'employee_id', 'deleted_at', 
    ];

    public function Employees() 
	{
		return $this->belongsTo('App\models\Employees');
    }

}
