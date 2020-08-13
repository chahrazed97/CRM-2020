<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Prospect;

class ProspectsController extends Controller
{
    public function __construct()
    {
      
    }

    public function index()
    {
      $prospects = Prospect::All();
      
      return view('front_office.MesProspects.list_prospects', compact('prospects'));
    }
}
