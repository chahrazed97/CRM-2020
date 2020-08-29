<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class MessgProspect extends Model
{
    protected $table = 'messg_prospects';
    protected $fillable = [ 'destination', 'subject', 'msg', 'prospect_id'
        ];

    public function Prospect() 
    {
        return $this->belongsTo('App\models\Prospect');
    }
}
