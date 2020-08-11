<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\clientRequest;
use App\Http\Requests\clientUpdateRequest;

use App\services\ClientService;

class ClientController extends Controller
{
    protected $ClientService;

    protected $nbrPerPage = 4;

    public function __construct(ClientService $ClientService)
    {
		$this->ClientService = $ClientService;
	}

	public function index()
	{
		$clients = $this->ClientService->getPaginate($this->nbrPerPage);
		$links = $clients->render();

		return view('crm.client.clientList', compact('clients', 'links'));
	}

	public function create()
	{
		return view('crm.client.clientCreate');
	}

	public function store(clientRequest $request)
	{
		$client = $this->ClientService->store($request->all());

		return redirect('client')->withOk("Le client " . $client->full_name . " a été créé.");
	}

	public function show($id)
	{
		$client = $this->ClientService->getById($id);

		return view('crm.client.clienShow',  compact('client'));
	}

	public function edit($id)
	{
		$client = $this->ClientService->getById($id);

		return view('edit',  compact('client'));
	}

	public function update(clientUpdateRequest $request, $id)
	{
		$this->ClientService->update($id, $request->all());
		
		return redirect('client')->withOk("Le client " . $request->input('name') . " a été modifié.");
	}

	public function destroy($id)
	{
		$this->ClientService->destroy($id);

		return back();
	}

}
