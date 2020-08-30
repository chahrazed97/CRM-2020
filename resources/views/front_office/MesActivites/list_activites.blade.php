<!-- Primary table start -->
<div class="col-12 mt-1">
    <div class="card">
        <div class="card-body">
            <div class="data-tables datatable-primary">
                <table id="dataTable2" class="text-center">
                    <thead class="text-capitalize">
                        <tr>
                            <th>Titre</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Client concerné</th>
                            <th>status</th>
                            <th>Description</th>
                            <th></th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $activites as $activite )
                        <tr id="{{ $activite->id }}">
                            <td>{{ $activite->titre }}</td>
                            <td>{{ $activite->type_activite }}</td>
                            <td>{{ (new Carbon\Carbon($activite->date_act))->format("d-M-Y") }}</td>
                            <td>{{ (new Carbon\Carbon($activite->date_act))->format("H:i") }}</td>
                            <td>{{ $activite->clients->nom.' '.$activite->clients->prenom }}</td>
                            @if ( $activite->status == 'planifié' )
                            <?php $color = 'red'; ?>
                            @else
                            <?php $color = 'green'; ?>
                            @endif
                            <td style="color: {{ $color }}">{{ $activite->status }}</td>
                            <td>{{ $activite->description }}</td>
                            <!-- start dropdawn buttons -->
                            <td>
                                <button class="btn btn-rounded btn- btn-xs" type="button" data-toggle="dropdown">
                                    <i class="fa fa-angle-double-down"></i>
                                </button>
                                <div class="dropdown-menu">
                                @if ( $activite->type_activite == 'e-mail' )
                                                <a class="lien-ch" href="{{ route('index.emails', ['client_id' => 0, 'prospect_id' => 0,  'produit_id' => 0, 'promo_id' => 0, 'event_id' => 0, 'reclam_id' => 0, 'activite_id' => $activite->id, 'type' => 'activites']) }}" data-toggle="tooltip" data-placement="left" title="Effectuer l'activité"><button class="btn btn-rounded btn- btn-sm"><i class="fa fa-send"></i></button></a>
                                            @endif
                                    <a class="lien-ch" href="{{ route('accueil.activite.terminer', ['activite' => $activite]) }}" title="Marquer comme terminé" ><button class="btn btn-rounded btn- btn-xs" onclick= "return confirm('Etes vous sur de vouloir marquer cet activité comme terminée?')" ><i class="fa fa-check-square-o"></i></button></a>
                                    <a class="lien-ch"><button type="button" class="btn btn-rounded btn- btn-xs" title="modifier l'activité" data-toggle="modal" data-target="#ModalLong{{ $activite->id }}"><i class="fa fa-pencil-square-o"></i></button></a>
                                    <a class="lien-ch" href="{{ route('accueil.activite.annuler', ['activite' => $activite]) }}" title="Annuler l'activité"><button class="btn btn-rounded btn- btn-xs" onclick= "return confirm('Etes vous sur de vouloir supprimer cet activité ?')"><i class="fa fa-trash-o"></i></button></a>         
                                </div>
                                @include('front_office.MesActivites.modifier_activite_modal')
                            </td>
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
                   