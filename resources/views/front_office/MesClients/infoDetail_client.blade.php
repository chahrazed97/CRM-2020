<!-- Custom Content start -->
<div class="">
    <div class="card-body">
        <h4 class="header-title"><i class="fa fa-puzzle-piece"></i>Informations détaillées</h4>
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
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
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
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
                    <p class="mb-1"><b>{{$action_marketing->titre}}</b></br>
                                       {{ $action_marketing->description }}</br>
                                       <b>Action Marketing:</b> </br>
                                       {{ $action_marketing->action_marketing }}
                    </p>
                    
                </a>
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <p class="mb-1"><b>Produit préféré :</b></br>
                                    <b>Mode de payement préféré :</b></br>
                                    <b>Panier moyen : </b>
                    </p>
                </a>
            </div>
    </div>
</div>
<!-- Custom Content end -->