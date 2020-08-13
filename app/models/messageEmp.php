<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class messageEmp extends Model
{
    protected $table = 'messagesEmpl';
    protected $fillable = [
        'date_msg', 'message', 'send_emp_id', 'receiv_emp_id', 'deleted_at', 
    ];
}
