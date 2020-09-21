@extends('layouts.squelette')
@section('CRMaccueil_CSS')
<link rel="stylesheet" href="{{asset('CSS_bootsnipp/timeline.css')}}">
<link rel="stylesheet" href="{{asset('CSS_bootsnipp/activite_dashboard.css')}}">
@endsection
@section('titre', 'Historique client')
@section('contenu')
<div class="main-content-inner">
@if(session()->has('ok'))
	<div class="alert alert-success alert-dismissible">{!! session()->get('ok') !!}</div>
@endif
@if(session()->has('err'))
	<div class="alert alert-danger alert-dismissible">{!! session()->get('err') !!}</div>
@endif
    <div class="row">
        <!-- start timeline-->
        
        <div class="col-xl-3 col-ml-8 col-lg-8 mt-5">
            @include('front_office.MesClients.timeline_conversation')
        </div>
        <!-- end timeline -->

        <!-- -->
        <div class="col-xl-3 col-ml-4 col-lg-4 mt-5">
            @include('front_office.MesClients.infoDetail_client')
            @include('front_office.MesClients.timeline_achat')
        </div>
        <!-- -->
    </div>
</div>
@endsection