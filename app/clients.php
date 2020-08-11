<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    protected $table = 'clients';
    protected $fillable = [
        'full_name', 'phone', 'budget', 'section', 'email', 'location', 'zip', 'city', 'country', 'is_active', 'admin_id', 
    ];
}
