<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    protected $table = 'events';
    protected $fillable = [
        'event_name', 'start_date', 'end_date'
    ];
}
