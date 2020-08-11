<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployesRequest;
use App\Http\Requests\EmployesUpdateRequest;

use App\services\EmployesService;

class EmployesController extends Controller
{
    protected $EmployesService;

    protected $nbrPerPage = 4;

    public function __construct(EmployesService $EmployesService)
    {
		$this->EmployesService = $EmployesService;
	}

	public function index()
	{
		$employes = $this->EmployesService->getPaginate($this->nbrPerPage);
		$links = $employes->render();

		return view('crm.employe.employeList', compact('employes', 'links'));
	}

	public function create()
	{
		return view('crm.employe.employeCreate');
	}

	public function store(EmployesRequest $request)
	{
		$employe = $this->EmployesService->store($request->all());

		return redirect('employe')->withOk("L'employe " . $employe->full_name . " a été créé.");
	}

	public function show($id)
	{
		$employe = $this->EmployesService->getById($id);

		return view('crm.employe.employeShow',  compact('employe'));
	}

	public function edit($id)
	{
		$employe = $this->EmployesService->getById($id);

		return view('edit',  compact('employe'));
	}

	public function update(EmployesUpdateRequest $request, $id)
	{
		$this->EmployesService->update($id, $request->all());
		
		return redirect('employe')->withOk("L'employe " . $request->input('full_name') . " a été modifié.");
	}

	public function destroy($id)
	{
		$this->EmployesService->destroy($id);

		return back();
	}

}
