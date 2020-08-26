<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Messg;

class Activite extends Model
{
    protected $table = 'Activites';
    protected $fillable = [
        'titre', 'type_activite', 'status', 'date_act', 'description', 'employee_id', 'clients_id', 'deleted_at', 
    ];

    public function Employees() 
	{
		return $this->belongsTo('App\models\Employees');
    }
    
    public function clients() 
	{
		return $this->belongsTo('App\models\clients');
    }
    
    public function ActiviteAujourdHui()
    {
        $activitePourAuj = self::whereDate('date_act', '=', Carbon::today())->where('status', '=', 'planifié')->paginate(5);
        return $activitePourAuj;
    }

    public function EmailOuvert()
    {
        $email_ouvert = self::whereDate('date_act', '=', Carbon::today())->where('type_activite', '=', 'e-mail')->where('status', '=', 'planifié')->count();
        return $email_ouvert;
    }

    public function EmailTermine()
    {
        $email_termine = self::whereDate('date_act', '=', Carbon::today())->where('type_activite', '=', 'e-mail')->where('status', '=', 'terminé')->count();
        return $email_termine;
    }

    public function AppelOuvert()
    {
        $appel_ouvert = self::whereDate('date_act', '=', Carbon::today())->where('type_activite', '=', 'appel')->where('status', '=', 'planifié')->count();
        return $appel_ouvert;
    }

    public function AppelTermine()
    {
        $appel_termine = self::whereDate('date_act', '=', Carbon::today())->where('type_activite', '=', 'appel')->where('status', '=', 'terminé')->count();
        return $appel_termine;
    }

    public function RendezVousOuvert()
    {
        $rendezVous_ouvert= self::whereDate('date_act', '=', Carbon::today())->where('type_activite', '=', 'rendez-vous')->where('status', '=', 'planifié')->count();
        return $rendezVous_ouvert;
    }

    public function RendezVousTermine()
    {
        $rendezVous_termine = self::whereDate('date_act', '=', Carbon::today())->where('type_activite', '=', 'rendez-vous')->where('status', '=', 'terminé')->count();
        return $rendezVous_termine;
    }

    
    public function ExtraireMsg($id)
    {
        $msg = Messg::where('table', '=', 'activites')->where('table_id', '=', $id)->first();
        return $msg;
    }

}
