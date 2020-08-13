<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'prenom', 'email', 'phone', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function clients() 
    {
        return $this->hasMany('App\models\clients');
    }

    public function prospects() 
    {
        return $this->hasMany('App\models\Prospect');
    }

    public function employes() 
    {
        return $this->hasMany('App\models\Employees');
    }

    public function Evenements() 
    {
        return $this->hasMany('App\models\Evenement');
    }

    public function actionsMarketings() 
    {
        return $this->hasMany('App\models\actionMarketing');
    }

}
