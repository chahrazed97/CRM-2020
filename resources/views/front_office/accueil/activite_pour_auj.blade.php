<div class="col-xl-8 col-lg-7 col-md-12 mt-5">
    <div id="ajaxdiv" class="card rad">
        <div class="card-body">

            <div class="d-flex justify-content-between mb-4">
                <h4 class="header-title mb-0">Mes activités pour aujourd'hui</h4>
                <select class="custome-select border-0 pr-3">
                    <option selected="">Today</option>
                    <option value="7days">Last 7 Days</option>
                </select>
                <a class="lien-ch"><button id="B1" class="btn btn-rounded btn- btn-xs"><i class="fa fa-plus"></i></button></a>
            </div>

            <div id="accordion5" class="according accordion-s2 gradiant-bg">
                @foreach ( $activites as $activite )
                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#{{ $activite->id }}">{{ $activite->titre }}<small><cite>{{ $activite->type_activite.', '.$activite->date_act }}</cite></small></a>  
                    </div>
                    <div id="{{ $activite->id }}" class="collapse modif{{ $activite->id }}" data-parent="#accordion5">
                        <div class="card-body">
                            <!-- informations sur l'activité start -->
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="well well-sm">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-11">
                                            <h4>Titre : {{ $activite->titre }}</h4>
                                            <small><cite>{{ $activite->type_activite }},</cite></small>
                                            <p><i class="fa fa-user"></i>Récepteur :{{ $activite->clients->nom.' '.$activite->clients->prenom }}
                                                <small><cite>
                                                 @if ( $activite->type_activite == 'e-mail' )
                                                <i class="fa fa-envelope"></i>{{ $activite->clients->email }}
                                                 @else ( $activite->type_activite == 'appel')
                                                 <i class="fa fa-phone"></i>{{ $activite->clients->phone }}
                                                 @endif
                                                </cite></small>
                                                <i class="fa fa-calendar-o"></i>Date : {{ (new Carbon\Carbon($activite->date_act))->format("d-M-Y") }} <br />
                                                <i class="fa fa-clock-o"></i>Heure : {{ (new Carbon\Carbon($activite->date_act))->format("H:i") }}<br/>
                                                <i class="fa fa-sticky-note-o"></i>Description : {{ $activite->description }}</p>
                                        </div>
                                        <div class="col-sm-6 col-md-1">
                                            <div class="row">
                                                <a class="lien-ch" href="{{ route('accueil.activite.terminer', ['activite' => $activite]) }}" data-toggle="tooltip" data-placement="left" title="Effectuer l'activité"><button class="btn btn-rounded btn- btn-sm"><i class="fa fa-send"></i></button></a>
                                                <a class="lien-ch" href="{{ route('accueil.activite.terminer', ['activite' => $activite]) }}" title="Marquer comme terminé" ><button class="btn btn-rounded btn- btn-sm" onclick= "return confirm('Etes vous sur de vouloir marquer cet activité comme terminée?')" ><i class="fa fa-check-square-o"></i></button></a>
                                                <a class="lien-ch"><button id="modif{{ $activite->id }}" class="btn btn-rounded btn- btn-sm" title="modifier l'activité"><i class="fa fa-pencil-square-o"></i></button></a>
                                                <a class="lien-ch" href="{{ route('accueil.activite.annuler', ['activite' => $activite]) }}" title="Annuler l'activité"><button class="btn btn-rounded btn- btn-sm" onclick= "return confirm('Etes vous sur de vouloir supprimer cet activité ?')"><i class="fa fa-trash-o"></i></button></a>
                                            </div>
                                               
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--informations sur l'activité end-->
                        </div>
                    </div>
                </div>
                
                @endforeach
            </div>
        </div>
    </div>
                
    <div class="pagination_area pull-right mt-5">
        <ul>
            <li>{{ $activites->links() }}</li>
        </ul>
    </div>
    
</div>
@section('ajax2')
@foreach ( $activites as $activite )
    <script>
        $(document).ready(function(){
            $("#modif{{ $activite->id }}").click(function(){
                $(".modif{{ $activite->id }}").load("{{ route('modifier.activite', ['activite' => $activite]) }}");
             });
        });
    </script>
@endforeach
@endsection
