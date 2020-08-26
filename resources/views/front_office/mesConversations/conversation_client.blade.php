@extends('layouts.squelette')
@section('CRMaccueil_CSS')
<link rel="stylesheet" href="{{asset('CSS_bootsnipp/timeline.css')}}">
<link rel="stylesheet" href="{{asset('CSS_bootsnipp/activite_dashboard.css')}}">

@endsection
@section('contenu')
<div class="main-content-inner">
@if(session()->has('ok'))
	<div class="alert alert-success alert-dismissible">{!! session()->get('ok') !!}</div>
@endif
    <div class="row">
       
        <!-- start timeline-->
        <div class="col-xl-3 col-ml-8 col-lg-8 mt-5">
        <div class="page-header">
            <a class="lien-ch mr-2" data-toggle="tooltip" data-placement="left" title="Programmer une activité avec ce client"><button class="btn btn-rounded btn- btn-xs" type="button" data-toggle="modal" data-target="#ModalLong">Programmer une activité</button></a>
            <a class="lien-ch mr-2" href="{{ route('index.emails', [ 'client_id' => $client->id,  'produit_id' => 0, 'promo_id' => 0, 'event_id' => 0, 'reclam_id' => 0, 'activite_id' => 0, 'type' => 'clients_contact' ]) }}" data-toggle="tooltip" data-placement="left" title="Envoyer e-mail"><button class="btn btn-rounded btn- btn-xs"><i class="fa fa-envelope"></i></button></a>
            <a class="lien-ch " href="" data-toggle="tooltip" data-placement="left" title="effectuer un appel"><button class="btn btn-rounded btn- btn-xs"><i class="fa fa-phone"></i></button></a>
         </div>
         @include('front_office.MesClients.ajouterActiviteClient_modal')
        <ul class="timeline">
        <?php $i= 0; ?>
        @foreach ( $activite_all as $activite_ll )
        <?php $i = $i + 1; ?>
            @if ( $activite_ll->destination == 'CRM 2020')
            <?php $inverted = "timeline-inverted";
                  $emetteur = $client->nom.' '.$client->prenom. ':'; ?>
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
                        <h6 class="timeline-title">{{ $activite_ll->subject }}</h6>
                        <p><small class="text-muted"><i class="fa fa-time"></i>{{ $activite_ll->created_at }}</small></p>
                    </div>
                   <div class="timeline-body">
                   </div>
                </a>
  
                <!-- Modal -->
               <div class="modal fade" id="ModalLong{{ $i }}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <b>Object : {{ $activite_ll->subject }}</b></br>
                                <b>A : </b>{{ $activite_ll->destination }}
                            </div>
                            <?php echo '<div class="modal-body">'.
                            $activite_ll->msg;
                            '</div>'
                            ?>
                            <div class="modal-footer">
                                <a class="right" data-dismiss="modal" href="{{ URL::previous() }}"><i class="fa fa-hand-o-left"></i>Retour</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal fin -->
            </li>
           @endforeach
       </ul>
    </div>
    <!-- end timeline -->

    <!-- info client -->
    <div class="col-xl-3 col-ml-4 col-lg-4 mt-5">
    <div class="card">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $client->nom.' '.$client->prenom }}</h5>
                </div>
                <p class="mb-1">
                    <b><i class="fa fa-envelope"></i>E-mail :</b> {{ $client->email }}</br>
                    <b><i class="fa fa-phone"></i>Téléphone :</b> {{ $client->phone }}</br>
                    <b><i class="fa fa-street-view"></i>Adresse :</b> {{ $client->adresse }}</br>
                    <b><i class="fa fa-map-marker"></i>Pays :</b> {{ $client->pays }}</br>
                    <b><i class="fa fa-history"></i>Client depuis :</b> {{ (new Carbon\Carbon($client->created_at))->format("d-M-Y") }}
                </p>    
            </a>
        </div>
        <!-- end info client -->
    </div>
</div>
@endsection