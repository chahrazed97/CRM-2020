@extends('layouts.base')
@section('title', 'Calendar')
@section('content')
<div class="container">
@if(session()->has('ok'))
		<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
    @endif
    <div class="panel panel-primary">
        <div class="panel-heading">Tasks Calendar</div>
        <div class="panel-body">
            {!! Form::open(array('route'=> 'eventList.store', 'method'=>'POST', 'files'=>'true')) !!}
            {{ csrf_field() }}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @elseif (Session::has('warnning'))
                         <div class="alert alert-danger">{{ Session::get('warnning') }}</div>
                    @endif
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        {!! Form::label('event_name', 'Task name:') !!}
                        <div class="">
                            {!! Form::text('event_name', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('event_name', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>


                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        {!! Form::label('start_date', 'Start date:') !!}
                        <div class="">
                            {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('start_date', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>




                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        {!! Form::label('end_date', 'End date:') !!}
                        <div class="">
                            {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('end_date', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>

               

                <div class="col-xs-1 col-sm-1 col-md-1 text-center"> &nbsp;<br/>
                {!! Form::submit('Add Task', ['class'=>'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">My tasks details</div>
        <div class="panel-body">
            
        {!! $calendar->calendar() !!}
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $calendar->script() !!}
@endsection
