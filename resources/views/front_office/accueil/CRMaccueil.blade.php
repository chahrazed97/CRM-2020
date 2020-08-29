@extends('layouts.squelette')
@section('CRMaccueil_CSS')
<link rel="stylesheet" href="{{asset('CSS_bootsnipp/activite_dashboard.css')}}">
@endsection
@section('titre', 'Home')

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
@endsection

@section('contenu')
<div class="main-content-inner">
@if(session()->has('ok'))
	<div class="alert alert-success alert-dismissible">{!! session()->get('ok') !!}</div>
@endif
    <div class="row">
    <!--notification -->
    @include('front_office.accueil.notification')
    <!-- end notification -->

    <!-- activite pour aujourd'hui + résumé d'aujourd'hui -->
   
        <div class="row">
            <div class="col-xl-3 col-ml-8 col-lg-8 mt-5">
            <!-- activite pour aujourd'hui start -->
             @include('front_office.accueil.activite_pour_auj')
            <!-- activite pour aujourd'hui end -->
            </div>
            <div class="col-xl-3 col-ml-4 col-lg-4 mt-5">
            <!-- résumé d'aujourd'hui start -->
            @include('front_office.accueil.resume_auj')
            <!-- résumé d'aujoud'hui end --> 

            <!-- liens rapides start -->
            @include('front_office.accueil.lien_rapide')
            <!-- liens rapides end -->    
            </div>
           
        </div> 
    
                    
<!-- end Activite pour aujoud'hui + résumé d'aujourd'hui -->
</div>
</div>
@endsection

@section('ajax')
<script>
$(document).ready(function(){
    $("#B1").click(function(){
       $("#ajaxdiv").load("{{ route('ajouter.activite') }}");
    });
});
</script>
@endsection