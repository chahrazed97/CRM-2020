<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    protected $fillable = [
        'event_name', 'start_date', 'end_date'
    ];
}
