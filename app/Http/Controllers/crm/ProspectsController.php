<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Prospect;

class ProspectsController extends Controller
{
  protected $prospect;
    public function __construct()
    {
     $this->prospect = new Prospect(); 
    }

    public function index()
    {
      $prospects = Prospect::All();
      $score = $this->prospect->scoreProspect();
      
      return view('front_office.MesProspects.list_prospects', compact('prospects','score'));
    }
}
