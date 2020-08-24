<!--Nouveau produit -->
@if ( $new_product !== 0)
<div class="col-md-4 mt-2 mb-3">
    <div class="card">
        <div class="seo-fact sbg1">
        <span class="badge badge-pill badge-danger">Nouveau</span>
            <div class="p-4 d-flex justify-content-between align-items-center">
                <div class="seofct-icon">
                    <i class="fa fa-bell-o"></i>
                </div>
                <div class="seofct-icon">
                {{ $new_product }}
                @if( $new_product == 1 )
                 Nouveau produit est ajouté au stock
                @else
                 Nouveaux Produits sont ajoutés au stock
                @endif
                </div>
            </div>
            <a data-toggle="modal" data-target="#Modalproduct"><i class="fa fa-angle-double-right right"></i><cite class="right">Plus d'informations ici</cite></a>
            <!-- Modal -->
            <div class="modal fade" id="Modalproduct">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title">Produit ajouté au stock</h6>   
                        </div>
                        <div class="modal-body">
                            <!-- list produits -->
                            <ul class="list-group">
                                @foreach( $new_products as $new_product )
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $new_product->nom }}
                                    <a href="{{ route('index.emails', ['client_id' => 0 , 'produit_id' => $new_product->id, 'promo_id' => 0, 'event_id' => 0, 'reclam_id' => 0, 'activite_id' => 0, 'type' => 'nv_produit' ]) }}" class=""><span class="badge badge-primary badge-pill">Faire découvrir ce produit aux clients</span></a>
                                </li>
                                @endforeach
                            </ul>
                            <!-- list clients end -->
                        </div>
                        <div class="modal-footer">
                            <a class="right" data-dismiss="modal" href="{{ URL::previous() }}"><i class="fa fa-hand-o-left"></i>Retour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- fin nouveau client -->

<!-- nouveau client -->
@if ( $new_client !== 0)
<div class="col-md-4 mt-2 mb-3">
    <div class="card">
        <div class="seo-fact sbg2">
        <span class="badge badge-pill badge-danger">Nouveau</span>
            <div class="p-4 d-flex justify-content-between align-items-center">
                <div class="seofct-icon">
                    <i class="fa fa-bell-o"></i>
                </div>
                <div class="seofct-icon">
                @if( $new_client == 1 )
                 Vous avez un ouveau client
                @else
                 Vous avez {{ $new_client }} Nouveaux clients
                @endif 
                </div>
            </div>
            <a data-toggle="modal" data-target="#Modalclient"><i class="fa fa-angle-double-right right"></i><cite class="right">Plus d'informations ici</cite></a>
            <!-- Modal -->
            <div class="modal fade" id="Modalclient">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title">Nouveau client</h6>   
                        </div>
                        <div class="modal-body">
                            <!-- list produits -->
                            <ul class="list-group">
                                @foreach( $new_clients as $new_client )
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $new_client->nom.' '.$new_client->prenom }}
                                    <a href="{{ route('index.emails', ['client_id' => $new_client->id,  'produit_id' => 0, 'promo_id' => 0, 'event_id' => 0, 'reclam_id' => 0, 'activite_id' => 0, 'type' => 'nv_client'  ]) }}" class=""><span class="badge badge-primary badge-pill">Envoyer lui un bienvenue</span></a>
                                </li>
                                @endforeach
                            </ul>
                            <!-- list clients end -->
                        </div>
                        <div class="modal-footer">
                            <a class="right" data-dismiss="modal" href="{{ URL::previous() }}"><i class="fa fa-hand-o-left"></i>Retour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- fin nouveau client -->

<!-- anniversaire client -->
@if ( $birthday_today !== 0)
<div class="col-md-4 mt-2 mb-3">
    <div class="card">
        <div class="seo-fact sbg1">
        <span class="badge badge-pill badge-danger">Nouveau</span>
            <div class="p-4 d-flex justify-content-between align-items-center">
                <div class="seofct-icon">
                    <i class="fa fa-bell-o"></i>
                </div>
                <div class="seofct-icon">
                @if( $birthday_today == 1 )
                 Aujourd'hui c'est l'anniversaire d'un client
                @else
                 Aujourd'hui c'est l'anniversaire de {{ $birthday_today }} clients
                @endif
                </div>
            </div>
            @if ( $birthday_today == 1 )
              @foreach( $birthday_clients as $birth_client )
               <?php
                if ($birth_client->scoreClient() !== 0)
                {
                    $scorecheck = 10 - ($birth_client->scoreClient());
                    $scoreNocheck = 9 - $scorecheck;
                }else{
                    $scorecheck = 0;
                    $scoreNocheck = 9;
                    }  
               ?>
            <a href="{{ route('historique.client', ['client' => $birth_client , 'scorecheck' => $scorecheck , 'scoreNocheck' => $scoreNocheck ]) }}" class=""><i class="fa fa-angle-double-right right"></i><cite class="right">Offre d'anniversaire</cite></a>
               @endforeach
            @else
            <a data-toggle="modal" data-target="#Modalbirth" class=""><i class="fa fa-angle-double-right right"></i><cite class="right">Offre d'anniversaire</cite></a>
            <!-- Modal -->
            <div class="modal fade" id="Modalbirth">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title">C'est le jour d'nniversaire de {{ $birthday_today }} clients </h6>   
                        </div>
                        <div class="modal-body">
                            <!-- list clients -->
                            <ul class="list-group">
                                @foreach( $birthday_clients as $birth_client )
                                <?php
                                    if ($birth_client->scoreClient() !== 0)
                                    {
                                        $scorecheck = 10 - ($birth_client->scoreClient());
                                        $scoreNocheck = 9 - $scorecheck;
                                    }else{
                                        $scorecheck = 0;
                                        $scoreNocheck = 9;
                                        }  
                                ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $birth_client->nom.' '.$birth_client->prenom }}
                                    <a href="{{ route('historique.client', ['client' => $birth_client , 'scorecheck' => $scorecheck , 'scoreNocheck' => $scoreNocheck ]) }}" class=""><span class="badge badge-primary badge-pill">Voir plus d'informations sur ce client</span></a></br>
                                    <a href="{{ route('index.emails', ['client_id' => $birth_client->id,  'produit_id' => 0, 'promo_id' => 0, 'event_id' => 0, 'reclam_id' => 0, 'activite_id' => 0, 'type' => 'anniv' ]) }}" class=""><span class="badge badge-primary badge-pill">Envoyer lui une offre d'anniversaire</span></a>

                                </li>
                                @endforeach
                            </ul>
                            <!-- list clients end -->
                        </div>
                        <div class="modal-footer">
                            <a class="right" data-dismiss="modal" href="{{ URL::previous() }}"><i class="fa fa-hand-o-left"></i>Retour</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endif
<!-- fin anniversaire client -->

<!-- promotion -->
@if ( $new_promo !== 0)
<div class="col-md-4 mt-2 mb-3">
    <div class="card">
        <div class="seo-fact sbg4">
        <span class="badge badge-pill badge-danger">Nouveau</span>
            <div class="p-4 d-flex justify-content-between align-items-center">
                <div class="seofct-icon">
                    <i class="fa fa-bell-o"></i>
                </div>
                <div class="seofct-icon">
                {{ $new_promo }}
                @if( $new_promo == 1 )
                 Nouvelle promotion est ajoutée
                @else
                 Nouvelles promotions sont ajoutées
                @endif
                </div>
               
            </div>
            <a data-toggle="modal" data-target="#Modalpromo"><cite>Plus d'informations ici</cite></a>
               <!-- Modal -->
               <div class="modal fade" id="Modalpromo">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title">Nouvelle Promotion</h6>   
                        </div>
                        <div class="modal-body">
                            <!-- list promos -->
                            <ul class="list-group">
                                @foreach( $new_promos as $new_promo )
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $new_promo->titre }}</br>
                                    {{ 'Start date : '.$new_promo->start_date }}</br>
                                    {{ 'End date : '.$new_promo->end_date }}</br>
                                    {{ 'Produit concerné : '.$new_promo->Produit->type }}</br>
                                    {{ 'Pourcentage de la promo : '.$new_promo->pourcetage_promo. '%' }}
                                    <a href="{{ route('index.emails', ['client_id' => 0,  'produit_id' => 0, 'promo_id' => $new_promo->id, 'event_id' => 0, 'reclam_id' => 0, 'activite_id' => 0, 'type' => 'nv_promo'  ]) }}" class=""><span class="badge badge-primary badge-pill">Offrir cette promotion aux clients</span></a>
                                </li>
                                @endforeach
                            </ul>
                            <!-- list clients end -->
                        </div>
                        <div class="modal-footer">
                            <a class="right" data-dismiss="modal" href="{{ URL::previous() }}"><i class="fa fa-hand-o-left"></i>Retour</a>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>
@endif
<!-- fin promotion -->

<!-- evenement -->
@if ( $new_event !== 0)
<div class="col-md-4 mt-2 mb-3">
    <div class="card">
        <div class="seo-fact sbg2">
        <span class="badge badge-pill badge-danger">Nouveau</span>
            <div class="p-4 d-flex justify-content-between align-items-center">
                <div class="seofct-icon">
                    <i class="fa fa-bell-o"></i>
                </div>
                <div class="seofct-icon">
                {{ $new_event }}
                @if( $new_event == 1 )
                 Nouveau evenement est programmé
                @else
                 Nouveaux evenements sont programmés
                @endif
                </div>
            </div>
            <a data-toggle="modal" data-target="#Modalevent"><cite>Plus d'information ici</cite></a>
               <!-- Modal -->
               <div class="modal fade" id="Modalevent">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title">Nouveau événement</h6>   
                        </div>
                        <div class="modal-body">
                            <!-- list clients -->
                            <ul class="list-group">
                                @foreach( $new_events as $new_event )
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $new_event->titre }}</br>
                                    {{ 'Date : '.(new Carbon\Carbon($new_event->date))->format("d-M-Y").'  à : '.(new Carbon\Carbon($new_event->date))->format("H:i") }}</br>
                                    {{ 'Localisation : '.$new_event->localisation }}</br>
                                    {{ 'Description : '.$new_event->description }}
                                    <a href="{{ route('index.emails', ['client_id' => 0,  'produit_id' => 0, 'promo_id' => 0, 'event_id' => $new_event->id, 'reclam_id' => 0, 'activite_id' => 0, 'type' => 'nv_event' ]) }}"><span class="badge badge-primary badge-pill">Partager aux clients</span></a>
                                </li>
                                @endforeach
                            </ul>
                            <!-- list clients end -->
                        </div>
                        <div class="modal-footer">
                            <a class="right" data-dismiss="modal" href="{{ URL::previous() }}"><i class="fa fa-hand-o-left"></i>Retour</a>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>
@endif
<!-- fin evenement -->

<!-- reclamation -->
@if ( $new_reclam !== 0)
<div class="col-md-4 mt-2 mb-3">
    <div class="card">
        <div class="seo-fact sbg3">
        <span class="badge badge-pill badge-danger">Nouveau</span>
            <div class="p-4 d-flex justify-content-between align-items-center">
                <div class="seofct-icon">
                    <i class="fa fa-bell-o"></i>
                </div> 
                <div class="seofct-icon">
                {{ $new_reclam }}
                @if( $new_reclam == 1 )
                 Nouvelle réclamation 
                @else
                 Nouvelles réclamations
                @endif
                </div>
                
            </div>
            <a data-toggle="modal" data-target="#Modalreclam"><cite>Plus d'informations ici</cite>
            <!-- Modal -->
            <div class="modal fade" id="Modalreclam">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title">Nouvelle réclamation</h6>   
                        </div>
                        <div class="modal-body">
                            <!-- list clients -->
                            <ul class="list-group">
                                @foreach( $new_reclams as $new_reclam )
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $new_reclam->clients->nom.' '.$new_reclam->clients->prenom }}</br>
                                    {{ 'Reclamation : '.$new_reclam->description }}
                                    <a href="{{ route('index.emails', ['client_id'=> 0 ,  'produit_id' => 0, 'promo_id' => 0, 'event_id' => 0, 'reclam_id' => $new_reclam->id, 'activite_id' => 0, 'type' => 'nv_reclam' ]) }}"><span class="badge badge-primary badge-pill">Répondre</span></a>
                                </li>
                                @endforeach
                            </ul>
                            <!-- list clients end -->
                        </div>
                        <div class="modal-footer">
                            <a class="right" data-dismiss="modal" href="{{ URL::previous() }}"><i class="fa fa-hand-o-left"></i>Retour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- fin reclamation -->
