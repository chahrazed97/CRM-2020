@extends('layouts.squelette')
@section('CRMaccueil_CSS')
<link rel="stylesheet" href="{{asset('CSS_bootsnipp/timeline.css')}}">
<link rel="stylesheet" href="{{asset('CSS_bootsnipp/activite_dashboard.css')}}">
@section('titre', 'Mes conversations collaborateur')
@endsection
@section('contenu')
<div class="main-content-inner">
@if(session()->has('ok'))
	<div class="alert alert-success alert-dismissible">{!! session()->get('ok') !!}</div>
@endif
    <div class="row">
       
        <!-- start timeline-->
        <div class="col-xl-3 col-ml-8 col-lg-8 mt-5">
        <ul class="timeline">
        <?php $i= 0; ?>
        @foreach ( $msg_all as $msg )
        <?php $i = $i + 1; 
            $employe = App\models\Employees::where('id', '=', $msg->send_emp_id)->first();
        ?>
            @if ( $msg->send_emp_id !== 1)
            <?php $inverted = "timeline-inverted";
                  $emetteur = $employe->nom.' '.$employe->prenom. ':'; ?>
            @else
            <?php $inverted = "";
                  $emetteur = "Vous:";
            ?>
            @endif
            <li class="{{ $inverted }}">
                <?php $icon = "envelope"; ?>
                <div class="timeline-badge"><i class="fa fa-{{ $icon }}"></i></div>
                <a class="timeline-panel" data-toggle="modal" data-target="#ModalLong{{ $i }}">
                    <div class="timeline-heading">
                        <small>{{ $emetteur }}</small>
                        <h6 class="timeline-title">{{ $msg->message }}</h6>
                        <p><small class="text-muted right"><i class="fa fa-time"></i>{{ $msg->created_at }}</small></p>
                    </div>
                   <div class="timeline-body">
                   </div>
                </a>
            </li>
           @endforeach
       </ul>
    </div>
    <!-- end timeline -->

    <!-- info employe -->
<div class="col-xl-3 col-ml-4 col-lg-4 mt-5">
    <div class="card">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $employe->nom.' '.$employe->prenom }}</h5>
                </div>
                <p class="mb-1">
                    <b><i class="fa fa-envelope"></i>E-mail :</b> {{ $employe->email }}</br>
                    <b><i class="fa fa-phone"></i>Téléphone :</b> {{ $employe->phone }}</br>
                    <b><i class="fa fa-map-marker"></i>Fonction :</b> {{ $employe->role }}</br>
                </p>    
            </a>
        </div>
        <!-- end info employe -->
    </div>

   <!-- envoyer msg -->
   <form  action="{{ route('Envoyer.msg', ['id' => $employe->id, 'role' => $employe->role]) }}"  method="post" class="modal-content">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="modal-body">
            <textarea type="text" class="form-control" rows="5" name="msg" placeholder="{{ 'Envoyer à '.$employe->nom.' '.$employe->prenom.' un message...' }}" required></textarea>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </form>
    <!-- fin msg -->
</div>
</div>
</div>
@endsection