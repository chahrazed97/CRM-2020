<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\updateActionMarketingRequest;
use App\Http\Controllers\Controller;
use App\models\actionMarketing;

class actionMarketingController extends Controller
{
    public function index()
    {
      $action_marketing = actionMarketing::All();
      return view('back_end.actionMarketing.actions_marketing', compact('action_marketing'));

    }

    public function updateActionMarketing(updateActionMarketingRequest $request, actionMarketing $action)
    {
        $action_mark = $request->get('action');
        $action->action_marketing = $action_mark;
        $action->save();
        return redirect()->back()->with("ok", "L'action markenting du segment  " . $action->segment . " a bien été modifié.");

    }
}
