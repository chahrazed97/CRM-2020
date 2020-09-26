<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\updateActionMarketingRequest;
use App\Http\Controllers\Controller;
use App\models\actionMarketing;
use App\parametreScore;

class actionMarketingController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    public function index()
    {
      $recence = parametreScore::where('parametre', '=', 'recence')->first();
      $frequence = parametreScore::where('parametre', '=', 'frequence')->first();
      $montant = parametreScore::where('parametre', '=', 'montant')->first();
      $action_marketing = actionMarketing::All();
      return view('back_end.actionMarketing.actions_marketing', compact('action_marketing', 'recence', 'frequence', 'montant'));

    }

    public function updateActionMarketing(updateActionMarketingRequest $request, actionMarketing $action)
    {
        $action_mark = $request->get('action');
        $action->action_marketing = $action_mark;
        $action->save();
        return redirect()->back()->with("ok", "L'action markenting du segment  " . $action->segment . " a bien été modifié.");

    }

    public function updateParametres(Request $request)
    {
      //recence
      $r5 = $request->get('r5');
      $r4_2 = $request->get('r4_2');
      $r2_1 = $request->get('r2_1');
      $r1 = $request->get('r1');

      if($r4_2 <= $r5 or $r2_1 <= $r4_2 or $r1 <= $r2_1){
        return redirect()->back()->with("err", "Veuillez vérifier les intervales des jours entrés du paramétre Récence, une échelle de 1 à 5 est utilisée, 5 est le meilleur score, 1 est le score le moins bon.");
      }

      $recence = parametreScore::where('parametre', '=', 'recence')->first();

      $recence->score4 = $r5;
      $recence->score3 = $r4_2;
      $recence->score2 = $r2_1;
      $recence->score1 = $r1;
      $recence->save();
      //frequence
      $f5 = $request->get('f5');
      $f4_1 = $request->get('f4_1');
      $f3_1 = $request->get('f3_1');
      $f2_1 = $request->get('f2_1');

      if($f5 <= $f4_1 or $f4_1 <= $f3_1 or $f3_1 <= $f2_1){
        return redirect()->back()->with("err", "Veuillez vérifier les intervales d'interactions entrés du paramétre Fréquence, une échelle de 1 à 5 est utilisée, 5 est le meilleur score, 1 est le score le moins bon.");
      }


      $frequence = parametreScore::where('parametre', '=', 'frequence')->first();
      $frequence->score4 = $f5;
      $frequence->score3 = $f4_1;
      $frequence->score2 = $f3_1;
      $frequence->score1 = $f2_1;
      $frequence->save();
      
      //montant
      $m5 = $request->get('m5');
      $m4_1 = $request->get('m4_1');
      $m3_1 = $request->get('m3_1');
      $m2_1 = $request->get('m2_1');

      if($m5 <= $m4_1 or $m4_1 <= $m3_1 or $m3_1 <= $m2_1){
        return redirect()->back()->with("err", "Veuillez vérifier les intervales entrés du paramétre Montant, une échelle de 1 à 5 est utilisée, 5 est le meilleur score, 1 est le score le moins bon.");
      }
 
      $montant = parametreScore::where('parametre', '=', 'montant')->first();
      $montant->score4 = $m5;
      $montant->score3 = $m4_1;
      $montant->score2 = $m3_1;
      $montant->score1 = $m2_1;
      $montant->save();
      

      return redirect()->back()->with("ok", "Les paramétres du scoring RFM ont bien été modifiés");

    }
}
