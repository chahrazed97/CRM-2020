<?php

namespace App\services;

use App\models\Employees;

class EmployesService
{

    protected $employe;

    public function __construct(Employees $employe)
	{
		$this->employe = $employe;
	}

	private function save(Employees $employe, Array $inputs)
	{
		$employe->full_name = $inputs['full_name'];
		$employe->phone = $inputs['phone'];	
        $employe->email = $inputs['email'];
        $employe->job = $inputs['job'];
		$employe->note = $inputs['note'];
		$employe->client_id = 1 ;
		$employe->admin_id = 1 ;
        $employe->is_active = 1;	

		$employe->save();
	}

	public function getPaginate($n)
	{
		return $this->employe->paginate($n);
	}

	public function store(Array $inputs)
	{
		$employe = new $this->employe;		
		

		$this->save($employe, $inputs);

		return $employe;
	}

	public function getById($id)
	{
		return $this->employe->findOrFail($id);
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