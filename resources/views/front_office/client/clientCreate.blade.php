@extends('layouts.base')
@section('content')

	<div class="col-sm-offset-4 col-sm-4">
		<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Création d'un utilisateur</div>
			<div class="panel-body"> 
				<div class="col-sm-12">
					{!! Form::open(['route' => 'client.store', 'class' => 'form-horizontal panel']) !!}	
					<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
						{!! Form::text('full_name', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
						{!! $errors->first('full_name', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
						{!! Form::number('phone', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
						{!! $errors->first('phone', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
						{!! Form::number('budget', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
						{!! $errors->first('budget', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
						{!! Form::text('section', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
						{!! $errors->first('section', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
						{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
						{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
						{!! Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
						{!! $errors->first('location', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
						{!! Form::number('zip', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
						{!! $errors->first('zip', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
						{!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
						{!! $errors->first('city', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
						{!! Form::text('country', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
						{!! $errors->first('country', '<small class="help-block">:message</small>') !!}
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
                        
                      