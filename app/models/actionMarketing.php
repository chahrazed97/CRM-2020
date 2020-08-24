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

    public function nbrClientParSegment()
    {
        $clients = clients::All();
        $nbr_client_seg = 0;
        foreach ( $clients as $client )
        {
            if ($client->scoreClient() == $this->segment )
            {
                $nbr_client_seg = $nbr_client_seg + 1;
            }
        }
        return  $nbr_client_seg;
    }

    public function pourcentageClientParSegment()
    { 
        $nbr_total_client = clients::All()->count();
        
        $pourcentage_client_seg = ( $this->nbrClientParSegment() * 100 )/$nbr_total_client;
        return $pourcentage_client_seg;
    }
}
