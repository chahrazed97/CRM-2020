<div class="card" style="background-color :rgba(145, 13, 233, 0.075) ;">
   <div class="card-body">
   @if ( $type == 'clients_contact' )
   <?php $id_type = $client->id; ?>
   @endif
   @if ( $type == 'produit')
   <?php $id_type = $produit->id; ?>
   Le produit </b> {{ $produit->nom }}</b> est ajouté au stock</br>
   <b>Type : </b>{{ $produit->type }}</br> 
   <b>Prix :</b> {{ $produit->prix }}
   @endif

   @if ( $type == 'clients')
   <?php $id_type = $client->id; ?>
   <b>{{ $client->nom. ' '.$client->prenom }} </b>est un nouveau client</br>
   <b>Adresse :</b> {{ $client->adresse }}</br>
   </b>E-mail :</b> {{ $client->email }}
   @endif

   @if ( $type == 'clients_anniv')
   <?php $id_type = $client->id; ?>
   Aujourd'hui c'est l'Anniversaire de client <b>{{ $client->nom.' '.$client->prenom }}</b></br>
   <b>E-mail : </b> {{ $client->email }}</br>
   <b>Client depuis :</b> {{ (new Carbon\Carbon($client->created_at))->format("d-M-Y") }}</br>
   <b>Produit préféré :</b>
    @foreach ( $top_produit as $top_prod )
        {{ $top_prod }} , 
    @endforeach
   @endif

   @if ( $type == 'promotion')
   <?php $id_type = $promo->id; ?>
   Une nouvelle promotion est programmée</br>
   <b>date début :</b> {{ $promo->start_date }}</br>
   <b>date fin : </b>{{ $promo->end_date }}</br>
   <b>Produit concerné : </b>{{ $promo->Produit->nom }}</br>
   <b>Pourcentage de réduction : </b>{{ '-'.$promo->pourcetage }}
   @endif

   @if ( $type == 'evenement')
   <?php $id_type = $event->id; ?>
   Un nouveau événement est programmé pour <b>{{  (new Carbon\Carbon($event->date))->format("d-M-Y") }}</b> à <b> {{ (new Carbon\Carbon($event->date))->format("H:i") }}</b></br>
   <b>Localisation :</b> {{ $event->localisation }}
   @endif

   @if ( $type == 'reclamation')
   <?php $id_type = $reclam->id; ?>
   Le client <b>{{ $reclam->clients->nom.' '.$reclam->clients->prenom }}</b> a réclamé , le {{  (new Carbon\Carbon($reclam->date_rec))->format("d-M-Y") }}</br>
   <b>La réclamation : </b></br>
   {{ $reclam->description }}
   @endif

   @if ( $type == 'activites')
   <?php $id_type = $activite->id; ?>
   Vous avez programé une activité de type <b>E-mail</b>,</br>
   <b>Titre : </b> {{ $activite->titre }}
   <b>Le client concerné : </b>{{ $activite->clients->nom.' '.$activite->clients->prenom }}, son e-mail : {{ $activite->clients->email }}
   @endif
   </div>
   </div>