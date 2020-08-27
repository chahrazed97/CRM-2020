@extends('layouts.squelette_admin')
@section('CRMaccueil_CSS')
<link rel="stylesheet" href="{{asset('CSS_bootsnipp/activite_dashboard.css')}}">
 <!-- Start datatable css -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection
@section('titre', 'Liste clients')

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
        <!--start list clients -->
        <div class="col-12 mt-1">
            <div class="card">
                <div class="card-body">
                <a class=" right" title="Ajouter un client"><button class="btn btn-rounded btn- btn-xs" data-toggle="modal" data-target="#ModalLong">Ajouter Client</button></a>
                @include('back_end.Clients.Ajouter_client_modal')
                    <div class="data-tables datatable-primary">
                        <table id="dataTable2" class="text-center">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>Nom complet</th>
                                    <th>Date naissance</th>
                                    <th>Téléphone</th>
                                    <th>E-mail</th>
                                    <th>Adresse</th>
                                    <th>Pays</th>
                                    <th>Code postale</th>
                                    <th>métier</th>
                                    <th>Score</th>
                                    <th></th>
                                    <th></th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                <tr>
                                    <td>{{ $client->nom. ' '.$client->prenom }}</td>
                                    <td>{{ $client->date_naissance }}</td>
                                    <td>{{ $client->phone }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->adresse }}</td>
                                    <td>{{ $client->pays }}</td>
                                    <td>{{ $client->code_postal }}</td>
                                    <td>{{ $client->metier }}</td>
                                    <td>
                                            <?php
                                              if ($client->scoreClient() !== 0)
                                              {
                                              $scorecheck = 10 - ($client->scoreClient());
                                              $scoreNocheck = 9 - $scorecheck;
                                              }else{
                                                  $scorecheck = 0;
                                                  $scoreNocheck = 9;
                                              }  
                                            ?>
                                       @for ($i = 0; $i < $scorecheck ; $i++)
                                       <span class="fa fa-star checkedStart"></span>
                                       @endfor
                                    
                                       @for($j = 0; $j < $scoreNocheck; $j++)
                                       <span class="fa fa-star"></span>
                                       @endfor
                                    </td>
                                    <td><a class="lien-client" href="{{ route('admin.historique.client', ['client' => $client , 'scorecheck' => $scorecheck, 'scoreNocheck' => $scoreNocheck]) }}"  title="voir l'historique de ce client"><i class="fa fa-database"></i></a></td>
                                    <!-- start dropdawn buttons -->
                                    
                                       <td> <button class="btn btn-rounded btn- btn-xs" type="button" data-toggle="dropdown">
                                            <i class="fa fa-angle-double-down"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="lien-ch"><button type="button" class="btn btn-rounded btn- btn-xs" title="modifier l'activité" data-toggle="modal" data-target="#ModalLong{{ $client->id }}"><i class="fa fa-pencil-square-o"></i></button></a>
                                            <a class="lien-ch" href="{{ route('admin.supprimer.client', ['client' => $client]) }}" title="Supprimer l'employe"><button class="btn btn-rounded btn- btn-xs" onclick= "return confirm('Etes vous sur de vouloir supprimer ce client ?')"><i class="fa fa-trash-o"></i></button></a>         
                                        </div>
                                            </td>
                                    
                                        @include('back_end.Clients.modifier_client_modal')
                                    
                                    <!-- end dropdawn buttons -->
                                </tr>
                                @endforeach
                            </tbody>
                           <!--<tfooter>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start Date</th>
                                    <th>salary</th>
                                </tr>
                            </tfooter>-->
                        </table>
                   </div>
                </div>
            </div>
        </div> 
        <!-- end list clients -->

    </div>
</div>
@endsection