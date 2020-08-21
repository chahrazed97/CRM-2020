<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messg extends Model
{
    protected $table = 'messgs';
    protected $fillable = [
        'msg'];
}
