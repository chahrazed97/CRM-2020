@extends('layouts.squelette')
@section('CRMaccueil_CSS')
<link rel="stylesheet" href="{{asset('CSS_bootsnipp/activite_dashboard.css')}}">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
 <!-- Start datatable css -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
@endsection

@section('contenu')
<div class="main-content-inner">
@if(session()->has('ok'))
	<div class="alert alert-success alert-dismissible">{!! session()->get('ok') !!}</div>
@endif
    <div class="row">
     
    <!-- start mes activite calender + list -->
    
    <div class="col-lg-12 mt-1">
        <div class="card">
            <div class="card-body">
                <nav>
                    <div class="row">
                    <div class="nav nav-tabs col-10" id="nav-tab" role="tablist">
                        
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Mon calendrier</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Ma liste d'activités</a>
                    
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-rounded btn- btn-xs right" data-toggle="modal" data-target="#exampleModalLong">Ajouter une activité</button>
                        @include('front_office.MesActivites.ajouter_activite_modal')
                    </div>
                    </div>
                </nav>
                <div class="tab-content mt-3" id="nav-tabContent">
                    <!-- calendar -->
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                            {!! $calendar->calendar() !!}
                            </div>
                        </div>
                    </div>
                    <!-- end calendar -->

                    <!-- list activites -->
                    
                    <div class="col-12 fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        @include('front_office.MesActivites.list_activites')
                    </div>
                    
                    <!-- end list activites -->
                    
                </div>
            </div>
        </div>
    </div>
                    
    <!-- end mes activite calendar + list -->

    </div>
</div>
@endsection
@section('scriptCalendar')

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
<!-- Fullcalendar -->
<script src=//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js></script>
<script src=//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js></script>
<script src=//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js></script>
{!! $calendar->script() !!}
@endsection