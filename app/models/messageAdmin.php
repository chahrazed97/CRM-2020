<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class messageAdmin extends Model
{
    protected $table = 'messagesAdmin';
    protected $fillable = [
        'date_msg', 'message', 'send_emp_id', 'receiv_admin_id', 'deleted_at', 
    ];

}
