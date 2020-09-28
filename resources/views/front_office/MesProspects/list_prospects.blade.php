@extends('layouts.squelette')
@section('CRMaccueil_CSS')
<link rel="stylesheet" href="{{asset('CSS_bootsnipp/activite_dashboard.css')}}">
 <!-- Start datatable css -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection
@section('titre', 'Liste prospects')

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
                    <div class="data-tables datatable-primary">
                        <table id="dataTable2">
                            <thead class="text-capitalize">
                                <tr>
                                    <th data-priority="1">Nom complet</th>
                                    <th>Date naissance</th>
                                    <th>Téléphone</th>
                                    <th>E-mail</th>
                                    <th>Adresse</th>
                                    <th>Pays</th>
                                    <th>Code postale</th>
                                    <th>Situation de famille</th>
                                    <th>Nombre d'enfant</th>
                                    <th>Niveau d'étude</th>
                                    <th>Profile Professionnel</th>
                                    <th>Niveau de salaire</th>
                                    <th>Activité péféré</th>
                                    <th>Voyageur</th>
                                    <th data-priority="3">Score</th>
                                    <th data-priority="2"></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($prospects as $prospect)
                                <tr>
                                    <td>{{ $prospect->nom. ' '.$prospect->prenom }}</td>
                                    <td>{{ $prospect->date_naissance }}</td>
                                    <td>{{ $prospect->phone }}</td>
                                    <td>{{ $prospect->email }}</td>
                                    <td>{{ $prospect->adresse }}</td>
                                    <td>{{ $prospect->pays }}</td>
                                    <td>{{ $prospect->code_postal }}</td>
                                    <td>{{ $prospect->situation_famille }}</td>
                                    <td>{{ $prospect->nbr_enfant }}</td>
                                    <td>{{ $prospect->niveau_etude }}</td>
                                    <td>{{ $prospect->profile_professionnel }}</td>
                                    <td>{{ $prospect->niveau_salaire }}</td>
                                    <td>{{ $prospect->activite_prefere }}</td>
                                    <td><?php if($prospect->Voyageur == 0 ){
                                         echo 'Non';
                                    }else{
                                        echo 'Oui';
                                    }
                                    ?></td>
                                    <td>
                                        @for ($i = 0; $i < $prospect->scoreProspect() ; $i++)
                                       <span class="fa fa-star checkedStart"></span>
                                       @endfor
                                       <?php $noScore = 5 - $prospect->scoreProspect(); ?>
                                       @for ($i = 0; $i < $noScore ; $i++)
                                       <span class="fa fa-star"></span>
                                       @endfor
                                    </td>
                                    <td><a class="lien-client" href="{{ route('historique.prospect', ['prospect' => $prospect]) }}"  title="voir l'historique de ce prospect"><i class="fa fa-database"></i></a></td>
                                    
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