@extends('layouts.squelette')
@section('CRMaccueil_CSS')
<link rel="stylesheet" href="{{asset('CSS_bootsnipp/activite_dashboard.css')}}">
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
@endsection
@section('titre', 'Mes conversation client')
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
            <!--search button -->
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search .." title="rechercher une conversation">
            <!-- end search button -->
            <div class="table-responsive">
                <table class="dbkit-table" >
                    <tbody id="body">
                    <?php $error = 'aucune conversation trouvée'; ?>
                    @if (!empty($destination_client))
                        @foreach ( $destination_client as $destination_cl )
                            @if ( $destination_cl->destination !== 'tout_le_monde' and $destination_cl !== 'tout_les_clients' and $destination_cl !== 'tout_les_prospects')
                            <?php $client = App\models\clients::where('email', '=', $destination_cl->destination )->first();
                              if ($client !== NULL){
                                 
                            $nom_complet = $client->nom.' '.$client->prenom; ?>
                            <tr class="heading-tr mt-1" style="background-color :rgba(145, 13, 233, 0.075); height: 50px;">
                                <td><a href="{{ route('conversation.client', ['client' => $client]) }}">{{ $nom_complet }} <br><cite><small>{{ $client->email }}</small></cite></a></td>
                                <td><a href="{{ route('conversation.client.supprimer', ['email_destroy' => $destination_cl->destination]) }}"><i class="fa fa-trash-o right"></i></a></td>  
                            </tr>
                              <?php } ?>
                            @endif
                        @endforeach
                    @else
                    {{ $error }}
                    @endif
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
<script>
function myFunction() {
    var input, filter, body, tr, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    body = document.getElementById("body");
    tr = body.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        a = tr[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
}
</script>
@endsection