<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messg extends Model
{
    protected $table = 'messgs';
    protected $fillable = [ 'destination', 'msg', 'admin_id', 'deleted_at'
        ];

        public function user() 
        {
            return $this->belongsTo('App\User');
        }
}
