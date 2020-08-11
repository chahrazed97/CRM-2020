<?php

namespace App\services;

use App\models\clients;

class clientService
{

    protected $client;

    public function __construct(clients $client)
	{
		$this->client = $client;
	}

	private function save(clients $client, Array $inputs)
	{

        $client->full_name = $inputs['full_name'];
		$client->phone = $inputs['phone'];
		$client->budget = 'budget'; 
		$client->section = 'section';
        $client->email = $inputs['email'];
        $client->location = 'location';
        $client->zip = $inputs['zip'];
        $client->city = $inputs['city'];
		$client->country = $inputs['country']; 
		$client->is_active=0;
		$client->admin_id=1;

    
		$client->save();
	}

	public function getPaginate($n)
	{
		return $this->client->paginate($n);
	}

	public function store(Array $inputs)
	{
		$client = new $this->client;		

		$this->save($client, $inputs);

		return $client;
	}

	public function getById($id)
	{
		return $this->client->findOrFail($id);
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