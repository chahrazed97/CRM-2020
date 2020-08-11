<?php
namespace App\services;

use App\models\Activite;

class ActiviteDashboardService
{

    protected $activite;

    public function __construct()
	{
		$this->activite = new Activite();
	}
    private function save(Activite $activite, Array $inputs)
	{

        $activite->titre = $inputs['titre'];
		$activite->type_activite =isset($inputs['type']);	
		$activite->clients_id = $inputs['client'];
		$activite->employees_id = 1 ;
		//$activite->status = $inputs['status'];
		$date_tt=$inputs['date'].' '.$inputs['time'];
		$activite->date_act = $date_tt;
		//$activite->description = $inputs['description'];
    
		$activite->save();
	}
    public function getPaginate($n)
	{
		return $this->activite->paginate($n);
	}

	public function store(Array $inputs)
	{
		$activite = new $this->activite;		

		$this->save($activite, $inputs);

		return $activite;
	}
    public function getById($id)
	{
		return $this->activite->findOrFail($id);
	}

	public function update($id, Array $inputs)
	{
		$this->save($this->getById($id), $inputs);
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}
}