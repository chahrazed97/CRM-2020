@extends('layouts.squelette')
@section('CRMaccueil_CSS')
<link rel="stylesheet" href="{{asset('CSS_bootsnipp/activite_dashboard.css')}}">
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
@endsection

@section('contenu')
<div class="main-content-inner">
@if(session()->has('ok'))
	<div class="alert alert-success alert-dismissible">{!! session()->get('ok') !!}</div>
@endif
    <div class="row">
    <!-- list conversations -->
    <!-- order list area start -->
    <div class=" card mt-5">
                    <div class="card-body">
                        <h4 class="header-title">Todays Order List</h4>
                        <div class="table-responsive">
                            <table class="dbkit-table" >
                                <tbody>
                                    @foreach ( $destination_client as $destination_cl )
                                    <?php $client = App\models\clients::where('email', '=', $destination_cl->destination )->first();
                                    $nom_complet = $client->nom.' '.$client->prenom; ?>
                                    <tr class="heading-td" style="background-color :rgba(145, 13, 233, 0.075) ;">
                                        <td><a href="{{ route('conversation.client', ['client' => $client]) }}">{{ $nom_complet }} <br><cite><small>{{ $client->email }}</small></cite></a></td>
                                        <td><a href="{{ route('conversation.supprimer', ['email_destroy' => $destination_cl->destination]) }}"><i class="fa fa-trash-o right"></i></a></td>  
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination_area pull-right mt-5">
                            <ul>
                                <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- order list area end -->
    <!-- fin list conversations -->
    </div>
</div>
@endsection