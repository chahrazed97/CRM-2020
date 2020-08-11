<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\EventRequest;
use App\Http\Requests\EventUpdateRequest;
use App\services\EventService;
use Illuminate\Support\Facades\Session;
use App\event;

class EventListController extends Controller
{
    protected $EventService;

    protected $nbrPerPage = 4; 

    public function __construct(EventService $EventService)
    {
		$this->EventService = $EventService;
	}

	public function index()
	{
		$events = $this->EventService->getPaginate($this->nbrPerPage);
		$links = $events->render();

		return view('crm.tasks.calendarList', compact('events', 'links'));
	}

	public function create()
	{
		return view('create');
	}

	public function store(EventRequest $request)
	{
		$event = $this->EventService->store($request->all());

		return redirect('events')->withOk("L'evenement " . $event->event_name . " a été créé.");
	}

	public function show($id)
	{
		$event = $this->EventService->getById($id);

		return view('show',  compact('user'));
	}

	public function edit($id)
	{
		$event = $this->EventService->getById($id);

		return view('edit',  compact('event'));
	}

	public function update(EventUpdateRequest $request, $id)
	{
		
		$this->EventService->update($id, $request->all());
		
		return redirect('eventList')->withOk("L'event " . $request->input('event_name') . " a été modifié.");
	}

	public function destroy($id)
	{
		$this->EventService->destroy($id);

		return back();
	}
}
