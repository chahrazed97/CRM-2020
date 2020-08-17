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
        <!-- start commentaires-->
        <div class="col-xl-3 col-ml-4 col-lg-4 mt-5">
            @include('back_end.Clients.commentaire')
        </div>
        <!-- end comentaires -->

        <!-- start comportement d'achat-->
        <div class="col-xl-3 col-ml-4 col-lg-4 mt-5">
            @include('back_end.Clients.comportement_achat')
        </div>
        <!-- end comportement d'achat -->
        <!-- start infodetail -->
        <div class="col-xl-3 col-ml-4 col-lg-4 mt-5">
           @include('back_end.Clients.info_detail')
        </div>
        <!-- end comportement d'achat -->
    </div>
</div>
@endsection