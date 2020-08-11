<?php

namespace App\services;

use App\event;

class EventService
{

    protected $event;

    public function __construct(event $event)
	{
		$this->event = $event;
	}

	private function save(event $event, Array $inputs)
	{
		$event->event_name = $inputs['event_name'];
		$event->start_date = $inputs['start_date'];	
		$event->end_date = $inputs['end_date'];	

		$event->save();
	}

	public function getPaginate($n)
	{
		return $this->event->paginate($n);
	}

	public function store(Array $inputs)
	{
		$event = new $this->event;		
		

		$this->save($event, $inputs);

		return $event;
	}

	public function getById($id)
	{
		return $this->event->findOrFail($id);
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