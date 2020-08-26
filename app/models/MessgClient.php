<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class MessgClient extends Model
{
    protected $table = 'messg_clients';
    protected $fillable = [ 'destination', 'subject', 'msg', 'clients_id'
        ];

    public function clients() 
    {
        return $this->belongsTo('App\models\clients');
    }
}
