
@extends('layouts.squelette')
@section('CRMaccueil_CSS')
<link rel="stylesheet" href="{{asset('CSS_bootsnipp/activite_dashboard.css')}}">
<link rel="stylesheet" href="{{asset('CSS_bootsnipp/email_template1.css')}}">
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
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
<form action="{{ route('send.email') }}" method="get">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
    <label for="example-text-input" class="col-form-label">To :</label>
    <div class="form-group {!! $errors->has('titre') ? 'has-error' : '' !!}">
        <input class="form-control" type="email" name="destination" placeholder="Exemple@email.com" id="example-text-input" required>
        {{ $errors->first('destination', '<small class="help-block">:message</small>') }}
    </div>
</div>
<textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor" required>
@if(isset($_GET['bouton']))
@include('front_office.emails.'.$_GET['bouton'])
@endif
</textarea>
<input class="btn btn-rounded btn-secondary mb-3 mt-2 mr-2 right" type="submit" value="Envoyer">



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
