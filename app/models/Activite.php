<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Messg;
use App\models\Employees;
use Auth;

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
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

        $activitePourAuj = self::where('employee_id', '=', $employe->id )->whereDate('date_act', '=', Carbon::today())->where('status', '=', 'planifié')->paginate(5);
        return $activitePourAuj;
    }

    public function EmailOuvert()
    {
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

        $email_ouvert = self::where('employee_id', '=', $employe->id)->whereDate('date_act', '=', Carbon::today())->where('type_activite', '=', 'e-mail')->where('status', '=', 'planifié')->count();
        return $email_ouvert;
    }

    public function EmailTermine()
    {
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

        $email_termine = self::where('employee_id', '=', $employe->id)->whereDate('date_act', '=', Carbon::today())->where('type_activite', '=', 'e-mail')->where('status', '=', 'terminé')->count();
        return $email_termine;
    }

    public function AppelOuvert()
    {
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

        $appel_ouvert = self::where('employee_id', '=', $employe->id)->whereDate('date_act', '=', Carbon::today())->where('type_activite', '=', 'appel')->where('status', '=', 'planifié')->count();
        return $appel_ouvert;
    }

    public function AppelTermine()
    {
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

        $appel_termine = self::where('employee_id', '=', $employe->id)->whereDate('date_act', '=', Carbon::today())->where('type_activite', '=', 'appel')->where('status', '=', 'terminé')->count();
        return $appel_termine;
    }

    public function RendezVousOuvert()
    {
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

        $rendezVous_ouvert= self::where('employee_id', '=',  $employe->id)->whereDate('date_act', '=', Carbon::today())->where('type_activite', '=', 'rendez-vous')->where('status', '=', 'planifié')->count();
        return $rendezVous_ouvert;
    }

    public function RendezVousTermine()
    {
        $employe= Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();

        $rendezVous_termine = self::where('employee_id', '=', $employe->id)->whereDate('date_act', '=', Carbon::today())->where('type_activite', '=', 'rendez-vous')->where('status', '=', 'terminé')->count();
        return $rendezVous_termine;
    }

    
    public function ExtraireMsg($id)
    {
        $msg = Messg::where('table', '=', 'activites')->where('table_id', '=', $id)->first();
        return $msg;
    }

}
