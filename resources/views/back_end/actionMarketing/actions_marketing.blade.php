@extends('layouts.squelette_admin')
@section('CRMaccueil_CSS')
<link rel="stylesheet" href="{{asset('CSS_bootsnipp/activite_dashboard.css')}}">
@endsection
@section('contenu')
<div class="main-content-inner">
@if(session()->has('ok'))
	<div class="alert alert-success alert-dismissible">{!! session()->get('ok') !!}</div>
@endif
    <div class="row">
<!-- Progress Table start -->
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Table actions marketing</h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-center">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">Segment</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action marketing</th>
                                <th scope="col">Nbr client appartenant a ce segment</th>
                                <th scope="col">status</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $action_marketing as $action )
                            <tr>
                                <th scope="row">{{ $action->segment }}</th>
                                <td>{{ $action->titre }}</td>
                                <td>{{ $action->description }}</td>
                                <td>{{ $action->action_marketing }}</td>
                                <td>{{ $action->nbrClientParSegment() }}</td>
                                <td>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar" role="progressbar" style="width:{{ round($action->pourcentageClientParSegment(), 2) }}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    {{ round($action->pourcentageClientParSegment(), 2) }}%
                                </td>
                                <td>
                                    <ul class="d-flex justify-content-center">
                                        <li class="mr-3"><a href="#" class="text-secondary" data-toggle="modal" data-target="#ModalLong{{ $action->id }}"><i class="fa fa-edit"></i></a></li>
                                    </ul>
                                    @include('back_end.actionMarketing.modifier_actionMarketing_modal')
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Progress Table end -->
</div>
</div>
@endsection