@extends('layouts.base')
@section('title', 'Calendar List')
@section('content')

<div class="container">
    @if(session()->has('ok'))
		<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
    @endif

    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Data Table Primary</h4>
                                <div class="data-tables datatable-primary">
                                <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                                        <thead>
            <tr>
                <th>Event name</th>
                <th>Start date</th>
                <th>End date</th>
                <th>Edit</th>
                <th>Delete</th>
               
            </tr>
        </thead>
        <tbody>
        @foreach ($events as $event)
            <tr>
              
                <td>{!! $event->event_name !!}</td>
                <td>{!! $event->start_date !!}</td>
                <td>{!! $event->end_date !!}</td>
                <td> <!-- Large modal -->
<button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target=".bd-example-modal-lg">Modifier
                                </button>
                                <div class="modal fade bd-example-modal-lg">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">edit event</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="col-12">
                                <div class="card mt-5">
                                    <div class="card-body">
                                    <form class="needs-validation" needs-validation="" action="{{ URL::to('eventList/'.$event->id.'/update' ) }}" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                   
                                    
                                       
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
                            <!-- Server side end -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                            </form>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Large modal modal end --> </td>
               <!-- <td>{!! link_to_route('eventList.edit', 'Modifier', [$event->id], ['class' => 'btn btn-warning btn-block']) !!}</td> -->
                <td>{!! Form::open(['method' => 'DELETE', 'route' => ['eventList.destroy', $event->id]]) !!}
									{!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet event ?\')']) !!}
								{!! Form::close() !!}
	            </td>
            </tr>
        @endforeach
           
        </tbody>

        <tfoot>
            <tr>
                <th>Event name</th>
                <th>Start date</th>
                <th>End date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </tfoot>
    </table>
</div>
</div>
</div>

@endsection