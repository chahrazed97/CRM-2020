<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    protected $table = 'pays';
    protected $fillable = [ 'pays', 'latitude', 'logitude'];

    public function clients() 
    {
        return $this->hasMany('App\models\clients');
    }
}
