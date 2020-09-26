<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parametreScore extends Model
{
    protected $table = 'parametre_scores';
    protected $fillable = [ 'parametre', 'score4', 'score3', 'score2', 'score1'
        ];

}
