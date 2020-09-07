@extends('layouts.squelette_admin')
@section('CRMaccueil_CSS')
<link rel="stylesheet" href="{{asset('CSS_bootsnipp/activite_dashboard.css')}}">
 <!-- Start datatable css -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection
@section('titre', 'Promotion')
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
                    <a class=" right" title="Ajouter un prospect"><button class="btn btn-rounded btn- btn-xs" data-toggle="modal" data-target="#ModalLong">Ajouter Promotion</button></a>
                    @include('back_end.Promotion.Ajouter_promo_modal')
                    <div class="data-tables datatable-primary">
                        <table id="dataTable2" class="text-center">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>Titre</th>
                                    <th>Start date</th>
                                    <th>End date</th>
                                    <th>Pourcentage promo</th>
                                    <th>Le produit de la promo</th>
                                    <th>status</th>
                                    <th>nombre de vente</th>
                                    <th></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($promotions as $promotion)
                                <tr>
                                    <td>{{ $promotion->titre }}</td>
                                    <td>{{ $promotion->start_date }}</td>
                                    <td>{{ $promotion->end_date }}</td>
                                    <td>-{{ $promotion->pourcetage_promo }}%</td>
                                    <td>{{ $promotion->Produit->nom }}</td>
                                    <td>{{ $promotion->StatusPromo() }}</td>
                                    @if ( $promotion->StatusPromo() !== "Planifiée"  )
                                    <td>{{ $promotion->nbrVente() }}</td>
                                    @else
                                    <td>/</td>
                                    @endif
                                    <!-- start dropdawn buttons -->
                                    
                                    <td> <button class="btn btn-rounded btn- btn-xs" type="button" data-toggle="dropdown">
                                            <i class="fa fa-angle-double-down"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="lien-ch"><button type="button" class="btn btn-rounded btn- btn-xs" title="modifier la promotion" data-toggle="modal" data-target="#ModalLong{{ $promotion->id }}"><i class="fa fa-pencil-square-o"></i></button></a>
                                            <a class="lien-ch" href="{{ route('admin.supprimer.promotion', ['promotion' => $promotion]) }}" title="Supprimer la promotion"><button class="btn btn-rounded btn- btn-xs" onclick= "return confirm('Etes vous sur de vouloir supprimer cette promotion ?')"><i class="fa fa-trash-o"></i></button></a>         
                                        </div>
                                    </td>
                                    
                                        @include('back_end.Promotion.modifier_promo_modal')
                                    
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