<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class actionMarketing extends Model
{
    protected $table = 'actionmarketing';
    protected $fillable = ['titre', 'segment', 'description', 'action_maketing', 'admin_id'
    ];

    public function user() 
	{
		return $this->belongsTo('App\User');
    }
}
