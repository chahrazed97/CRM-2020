<!-- Custom Content start -->
<div class="card">
    <div class="card-body">
        <h4 class="card-title"><i class="fa fa-puzzle-piece"></i>Informations détaillées</h4>
            <div class="list-group">
                <a class="list-group-item list-group-item-action flex-column align-items-start" style="background-color: rgba(169, 169, 169, 0.219); box-shadow: 10px 10px 5px #aaaaaa;">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $client->nom.' '.$client->prenom }}</h5>
                    </div>
                    <p class="mb-1"><b><i class="fa fa-envelope"></i>E-mail :</b> {{ $client->email }}</br>
                                    <b><i class="fa fa-phone"></i>Téléphone :</b> {{ $client->phone }}</br>
                                    <b><i class="fa fa-street-view"></i>Adresse :</b> {{ $client->adresse }}</br>
                                    <b><i class="fa fa-map-marker"></i>Pays :</b> {{ $client->pays }}</br>
                                    <b><i class="fa fa-history"></i>Client depuis :</b> {{ (new Carbon\Carbon($client->created_at))->format("d-M-Y") }}
                    </p>    
                    
                </a>
                <a class="list-group-item list-group-item-action flex-column align-items-start mt-2" style="background-color: #ffcdf45d; box-shadow: 10px 10px 5px #aaaaaa;">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">
                        @for ($i = 0; $i < $scorecheck ; $i++)
                            <span class="fa fa-star checkedStart"></span>
                        @endfor
                        @for($j = 0; $j < $scoreNocheck; $j++)
                            <span class="fa fa-star"></span>
                        @endfor
                        </h5>
                    </div>
                    <p class="mb-1 text-center"><b>{{$action_marketing->titre}}</b></br>
                                       {{ $action_marketing->description }}</br>
                                       <b><i class="ti-target mr-2"></i> Action Marketing:</b> </br>
                                       {{ $action_marketing->action_marketing }}
                    </p>
                    
                </a>
                <a class="list-group-item list-group-item-action flex-column align-items-start mt-2" style="background-color:rgba(0, 0, 255, 0.048); box-shadow: 10px 10px 5px #aaaaaa;">
                    <p class="mb-1"><b><i class="ti-package mr-2"></i>Produit préféré :</b></br>
                                     @foreach ( $top_produit as $top_prod )
                                     {{ $top_prod }}</br>
                                     @endforeach
                                    <b><i class="fa fa-credit-card mr-2"></i> Mode de payement préféré :</b></br>
                                    @foreach ( $top_modePayement as $top_pay  )
                                    {{ $top_pay }}</br>
                                    @endforeach
                                    <b><i class="ti-shopping-cart"></i>Panier moyen : </b> {{ $panier_moyen. ' DA' }}</br>
                                    <b><i class="fa fa-bullhorn mr-2"></i> nombre de participation aux promo</b> : {{ $client->NbrReponsePromo() }} fois
                    </p>
                </a>
            </div>
    </div>
</div>

<!-- Custom Content end -->