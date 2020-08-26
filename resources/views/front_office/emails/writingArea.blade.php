
@extends('layouts.squelette')
@section('CRMaccueil_CSS')
<link rel="stylesheet" href="{{asset('CSS_bootsnipp/activite_dashboard.css')}}">
<link rel="stylesheet" href="{{asset('CSS_bootsnipp/email_template1.css')}}">
<link rel="stylesheet" href="{{asset('CSS_bootsnipp/timeline.css')}}">

@endsection
@section('contenu')
<div class="main-content-inner">
@if(session()->has('ok'))
	<div class="alert alert-success alert-dismissible">{!! session()->get('ok') !!}</div>
@endif

    <div class="row">
    <div class="col-4 mt-5">
   
        <form class="card-body" action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
       
            <button  id="B1" type="submit" class="btn btn-outline-primary btn-lg btn-block"  value="nvProduit_template" name="bouton">Nouveau produit email template</button>
            <button id="B2" type="submit" class="btn btn-outline-success btn-lg btn-block" value="template_bienvenue" name="bouton">Email de bienvenue template</button>
            <button  id="B3" type="submit" class="btn btn-outline-danger btn-lg btn-block" value="offreAnniv_template" name="bouton">Anniversaire client email template
            <button  id="B4" type="submit" class="btn btn-outline-warning btn-lg btn-block" value="promotion_template" name="bouton">Nouvelle promotion email template</button>
            <button  id="B5" type="submit" class="btn btn-outline-secondary btn-lg btn-block" value="rappelPromotion_template" name="bouton">Rappel promotion email template
            <button  id="B6" type="button" class="btn btn-outline-dark btn-lg btn-block" value="" name="bouton">Nouveau evenement email template</button>

           </div>
        </form>
 
    <div class="col-8 mt-5">
    <!--info sur l'email -->
    <div class="card" style="background-color :rgba(145, 13, 233, 0.075) ;">
   <div class="card-body">
   @if ( $type == 'clients_contact' )
   <?php $id_type = $client->id; ?>
   @endif
   @if ( $type == 'produit')
   <?php $id_type = $produit->id; ?>
   Le produit </b> {{ $produit->nom }}</b> est ajouté au stock</br>
   <b>Type : </b>{{ $produit->type }}</br> 
   <b>Prix :</b> {{ $produit->prix }}
   @endif

   @if ( $type == 'clients')
   <?php $id_type = $client->id; ?>
   <b>{{ $client->nom. ' '.$client->prenom }} </b>est un nouveau client</br>
   <b>Adresse :</b> {{ $client->adresse }}</br>
   </b>E-mail :</b> {{ $client->email }}
   @endif

   @if ( $type == 'clients_anniv')
   <?php $id_type = $client->id; ?>
   Aujourd'hui c'est l'Anniversaire de client <b>{{ $client->nom.' '.$client->prenom }}</b></br>
   <b>E-mail : </b> {{ $client->email }}</br>
   <b>Client depuis :</b> {{ (new Carbon\Carbon($client->created_at))->format("d-M-Y") }}</br>
   <b>Produit préféré :</b>
    @foreach ( $top_produit as $top_prod )
        {{ $top_prod }} , 
    @endforeach
   @endif

   @if ( $type == 'promotion')
   <?php $id_type = $promo->id; ?>
   Une nouvelle promotion est programmée</br>
   <b>date début :</b> {{ $promo->start_date }}</br>
   <b>date fin : </b>{{ $promo->end_date }}</br>
   <b>Produit concerné : </b>{{ $promo->Produit->nom }}</br>
   <b>Pourcentage de réduction : </b>{{ '-'.$promo->pourcetage }}
   @endif

   @if ( $type == 'evenement')
   <?php $id_type = $event->id; ?>
   Un nouveau événement est programmé pour <b>{{  (new Carbon\Carbon($event->date))->format("d-M-Y") }}</b> à <b> {{ (new Carbon\Carbon($event->date))->format("H:i") }}</b></br>
   <b>Localisation :</b> {{ $event->localisation }}
   @endif

   @if ( $type == 'reclamation')
   <?php $id_type = $reclam->id; ?>
   Le client <b>{{ $reclam->clients->nom.' '.$reclam->clients->prenom }}</b> a réclamé , le {{  (new Carbon\Carbon($reclam->date_rec))->format("d-M-Y") }}</br>
   <b>La réclamation : </b></br>
   {{ $reclam->description }}
   @endif

   @if ( $type == 'activites')
   <?php $id_type = $activite->id; ?>
   Vous avez programé une activité de type <b>E-mail</b>,</br>
   <b>Titre : </b> {{ $activite->titre }}
   <b>Le client concerné : </b>{{ $activite->clients->nom.' '.$activite->clients->prenom }}, son e-mail : {{ $activite->clients->email }}
   @endif
   </div>
   </div>
    <!--info sur l'email end-->

<form action="{{ route('rediger.email', ['type' => $type, 'id_type' => $id_type]) }}" method="POST">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
    @if ( $client !== 0 )
    <?php $email = $client->email; ?>
    @else
    <?php $email = ""; ?>
    @endif
    
    <div class="form-group {!! $errors->has('titre') ? 'has-error' : '' !!}">
        <input class="form-control" type="email" name="destination" value="{{ $email }}" placeholder="A" id="example-email-input" required>
        {{ $errors->first('destination', '<small class="help-block">:message</small>') }}
    </div>
</div>

<div class="form-group">
    @if ( isset($_GET['bouton']) )
      @if ( $_GET['bouton'] == "nvProduit_template" )
      <?php $objet = "Nouveauté"; ?>
      @endif
      @if ( $_GET['bouton'] == "template_bienvenue" )
      <?php $objet = "Bienvenue"; ?>
      @endif
      @if ( $_GET['bouton'] == "offreAnniv_template" )
      <?php $objet = "Promo Anniversaire"; ?>
      @endif
      @if ( $_GET['bouton'] == "promotion_template" )
      <?php $objet = "Promotion"; ?>
      @endif
      @if ( $_GET['bouton'] == "rappelPromotion_template" )
      <?php $objet = "Rappel promotion"; ?>
      @endif
     
    @else
    <?php $objet = ""; ?>
    @endif
    <div class="form-group {!! $errors->has('titre') ? 'has-error' : '' !!}">
        <input class="form-control" type="text" name="objet" value="{{ $objet }}" placeholder="Objet" id="example-text-input" required>
        {{ $errors->first('objet', '<small class="help-block">:message</small>') }}
    </div>
</div>
<textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor" required>
@if(isset($_GET['bouton']))
@include('front_office.emails.'.$_GET['bouton'])
@endif
</textarea>
<input class="btn btn-rounded btn-secondary mb-3 mt-2 mr-2 right" type="submit" value="Envoyer">
<a class="left" data-dismiss="modal" href="{{ URL::previous() }}"><i class="fa fa-hand-o-left"></i>Retour</a>




<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'summary-ckeditor', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
</script>
</form>
</div>
</div>
</div>
@endsection
