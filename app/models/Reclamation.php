<?php

namespace App\models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    protected $table = 'Reclamation';
    protected $fillable = [
        'description', 'date_rec', 'clients_id', 'deleted_at',
    ];

    public function clients() 
	{
		return $this->belongsTo('App\models\clients');
    }
    
    function newReclamation()
    {
        $newReclam = self::whereDate('created_at', '=', Carbon::today())->where('status', '=', 'non_répondu')->count();
        return $newReclam;
    }
    function newReclamations()
    {
        $newReclam = self::whereDate('created_at', '=', Carbon::today())->where('status', '=', 'non_répondu')->get();
        return $newReclam;
    }
}
