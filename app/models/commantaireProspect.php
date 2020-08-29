<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class commantaireProspect extends Model
{
    protected $table = 'commentaire_prospects';
    protected $fillable = [
        'description', 'date_comm', 'prospect_id', 'employee_id', 'deleted_at', 
    ];

    public function Employees() 
	{
		return $this->belongsTo('App\models\Employees');
    }
    
    public function Prospect() 
	{
		return $this->belongsTo('App\models\Prospect');
	}
}
