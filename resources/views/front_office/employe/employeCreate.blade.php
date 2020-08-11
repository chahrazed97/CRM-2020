@extends('layouts.base')
@section('title', 'create employe')
@section('content')
<div class="col-sm-offset-4 col-sm-4">
		<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Création d'un employe</div>
			<div class="panel-body"> 
				<div class="col-sm-12">
					{!! Form::open(['route' => 'employe.store', 'class' => 'form-horizontal panel']) !!}	
					<div class="form-group {!! $errors->has('full_name') ? 'has-error' : '' !!}">
						{!! Form::text('full_name', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
						{!! $errors->first('full_name', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('phone') ? 'has-error' : '' !!}">
						{!! Form::number('phone', null, ['class' => 'form-control', 'placeholder' => 'phone number']) !!}
						{!! $errors->first('phone', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
						{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
						{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('job') ? 'has-error' : '' !!}">
						{!! Form::text('job', null, ['class' => 'form-control', 'placeholder' => 'job']) !!}
						{!! $errors->first('job', '<small class="help-block">:message</small>') !!}
					</div>
                    <div class="form-group {!! $errors->has('note') ? 'has-error' : '' !!}">
						{!! Form::text('note', null, ['class' => 'form-control', 'placeholder' => 'note']) !!}
						{!! $errors->first('note', '<small class="help-block">:message</small>') !!}
					</div>
					
					{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
    </div>
@endsection