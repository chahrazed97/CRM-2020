<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class tasks extends Model
{
    protected $fillable = ['name', 'employee_id', 'duration', 'is_active', 'completed', 'admin_id', 'deleted_at'];
   
    public function employees()
    {
        return $this->belongsTo(Employees::class, 'employee_id');
    }

}
