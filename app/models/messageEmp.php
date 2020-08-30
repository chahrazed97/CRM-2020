<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class messageEmp extends Model
{
    protected $table = 'messagesEmpl';
    protected $fillable = [
        'date_msg', 'message', 'answered', 'send_emp_id', 'receiv_emp_id', 'deleted_at', 
    ];

    public function newMsgEmp()
    {
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();
        
        $new_msgEmp = self::where('receiv_emp_id', '=', $employe->id)->where('answered', '=', 'no')->count();
        return $new_msgEmp;
    }

    public function newMsgEmps()
    {
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();
        
        $new_msgEmp = self::where('receiv_emp_id', '=', $employe->id)->where('answered', '=', 'no')->latest()->get();
        return $new_msgEmp;
    }
}
