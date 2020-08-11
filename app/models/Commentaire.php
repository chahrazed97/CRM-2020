<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $table = 'Commentaire';
    protected $fillable = [
        'description', 'date_comm', 'clients_id', 'employee_id', 'deleted_at', 
    ];

    public function Employees() 
	{
		return $this->belongsTo('App\models\Employees');
    }
    
    public function clients() 
	{
		return $this->belongsTo('App\models\clients');
	}
}
