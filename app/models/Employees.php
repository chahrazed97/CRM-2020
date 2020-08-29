<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{

    protected $table = 'employees';
    protected $fillable = [
        'nom', 'prenom', 'phone', 'email', 'role', 'is_active', 'admin_id', 'deleted_at', 
    ];
    public function Activite() 
    {
        return $this->hasMany('App\models\Activite');
    }

    public function commentaire() 
    {
        return $this->hasMany('App\models\Commentaire');
    }

    public function clients() 
    {
        return $this->hasMany('App\models\clients', 'employee_id');
    }

    public function Prospect() 
    {
        return $this->hasMany('App\models\Prospect', 'employee_id');
    }

    public function user() 
	{
		return $this->belongsTo('App\User');
    }
    
    public function lienRapide() 
    {
        return $this->hasMany('App\models\lienRapide');
    }

}
