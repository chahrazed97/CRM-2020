@extends('layouts.squelette')
@section('CRMaccueil_CSS')
<link rel="stylesheet" href="{{asset('CSS_bootsnipp/activite_dashboard.css')}}">
 
@endsection
@section('titre', 'Mes activités')

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<!-- Start datatable js -->

@endsection

@section('contenu')
<div class="main-content-inner">
@if(session()->has('ok'))
	<div class="alert alert-success alert-dismissible">{!! session()->get('ok') !!}</div>
@endif
<div class="alert alert-success alert-dismissible hidden">
                You are now registered, you can login.
</div>
    <div class="row">
<button type="button" class="btn btn-rounded btn- btn-xs right" data-toggle="modal" data-target="#exampleModalLong">Ajouter une activité</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
            <form id="ajouterActivite" action="{{ url('accueil/creer') }}" method="post" class="card">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="card-body">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter une activité</h5>   
            </div>
            
            <b class="text-muted mb-3 mt-4 d-block">Type d'activité:</b>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" checked id="customRadio4" name="type" value="e-mail" class="custom-control-input">
                <label class="custom-control-label" for="customRadio4">E-mail</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadio5" name="type" value="appel" class="custom-control-input">
                <label class="custom-control-label" for="customRadio5">Appel téléphonique</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadio6" name="type" value="rendez-vous" class="custom-control-input">
                <label class="custom-control-label" for="customRadio6">Rendez-vous</label>
            </div>

            <div class="form-group">
                <label for="example-text-input" class="col-form-label">Titre</label>
                <div class="form-group">
                    <input class="form-control" type="text" name="titre" placeholder="Ajouter un titre" id="example-text-input" value="{{ old('titre') }}">
                    <small class="help-block" style="color : red;"></small>
                </div>
	
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="example-date-input" class="col-form-label">Date</label>
                        <div class="form-group">
                            <input class="form-control" type="date" name="date" placeholder="Ajouter une date" id="example-date-input"  value="{{ old('date') }}">
                            <small class="help-block" style="color : red;"></small>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="example-time-input" class="col-form-label">Heure</label>
                        <div class="form-group">
                            <input class="form-control" type="time" name="heure" placeholder="Donner l'horaire" id="example-time-input"  value="{{ old('heure') }}">
                            <small class="help-block" style="color : red;"></small>
                        </div>
	
                    </div>
                </div>
            </div>
            <button type="submit" id="ok">Envoyer</button>
            </form>
            </div>
        </div>
    </div>
</div>

<script>

$(function(){

$('#ok').click(function() {
    $('#exampleModalLong').modal();
});

$(document).on('submit', '#ajouterActivite', function(e) {  
    e.preventDefault();
     
    $('input+small').text('');
    $('input').parent().removeClass('has-error');
     
    $.ajax({
        method: $(this).attr('method'),
        url: $(this).attr('action'),
        data: $(this).serialize(),
        dataType: "json"
    })
    .done(function(data) {
        $('.alert-success').removeClass('hidden');
        $('#exampleModalLong').modal('hide');
    })
    .fail(function(data) {
        $.each(data.responseJSON, function (key, value) {
            var input = '#ajouterActivite input[name=' + key + ']';
            $(input + '+small').text(value);
            $(input).parent().addClass('has-error');
        });
    });
});

})

</script>
</div>
</div>
@endsection