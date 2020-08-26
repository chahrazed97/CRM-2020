<div class="page-header">
    <a class="lien-ch mr-2" data-toggle="tooltip" data-placement="left" title="Programmer une activité avec ce client"><button class="btn btn-rounded btn- btn-xs" type="button" data-toggle="modal" data-target="#ModalLong">Programmer une activité</button></a>
    <a class="lien-ch mr-2" href="{{ route('index.emails', [ 'client_id' => $client->id,  'produit_id' => 0, 'promo_id' => 0, 'event_id' => 0, 'reclam_id' => 0, 'activite_id' => 0, 'type' => 'clients_contact' ]) }}" data-toggle="tooltip" data-placement="left" title="Envoyer e-mail"><button class="btn btn-rounded btn- btn-xs"><i class="fa fa-envelope"></i></button></a>
    <a class="lien-ch " href="" data-toggle="tooltip" data-placement="left" title="effectuer un appel"><button class="btn btn-rounded btn- btn-xs"><i class="fa fa-phone"></i></button></a>
</div>
@include('front_office.MesClients.ajouterActiviteClient_modal')
<ul class="timeline">
<?php $i= 0; ?>
  @foreach ( $activite_all as $activite_ll )
 <?php $i = $i + 1; ?>
  @if ( $activite_ll->destination == 'CRM 2020')
  <?php $inverted = "timeline-inverted";
        $emetteur = $client->nom.' '.$client->prenom. ':'; ?>
  @else
  <?php $inverted = "";
        $emetteur = "Vous:";
        ?>
  @endif
  <li class="{{ $inverted }}">
    <?php $icon = "envelope"; ?>
    <div class="timeline-badge"><i class="fa fa-{{ $icon }}"></i></div>
    <a class="timeline-panel" data-toggle="modal" data-target="#ModalLong{{ $i }}">
      <div class="timeline-heading">
        <small>{{ $emetteur }}</small>
        <h6 class="timeline-title">{{ $activite_ll->subject }}</h6>
        <p><small class="text-muted"><i class="fa fa-time"></i>{{ $activite_ll->created_at }}</small></p>
      </div>
      <div class="timeline-body">
      </div>
    </a>
  
  <!-- Modal -->
<div class="modal fade" id="ModalLong{{ $i }}">
  <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
     <b>Object : {{ $activite_ll->subject }}</b></br>
     <b>A : </b>{{ $activite_ll->destination }}
     </div>
      <?php echo '<div class="modal-body">'.
       $activite_ll->msg;
      '</div>'
      ?>
      <div class="modal-footer">
      <a class="right" data-dismiss="modal" href="{{ URL::previous() }}"><i class="fa fa-hand-o-left"></i>Retour</a>
      </div>
    </div>
  </div>
</div>
  <!-- modal fin -->
  </li>
  @endforeach
       
</ul>
<div class="row">
  <div class="col-7">  
    <form class="" action="{{ route('Client.ajouter.commentaire', ['client'=> $client]) }}" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="card-body">
        <textarea type="text" class="form-control" rows="5" name="comment" placeholder=" commenter ce client" required ></textarea>
        <button type="submit" class="btn btn-rounded btn- btn-sm right mt-1">Créer</buttom>
      </div> 
    </form>
  </div>
  <div class="card col-5">
    <div class="card-body">
       @if ( $commentaire !== NULL )
      <h6><i class="fa fa-bookmark"></i>Mon commentaire précedant :</h6>
      <span class="mt-2">{{ $commentaire->description }}</span>
      <small class="right">{{ $commentaire->date_comm }}</small>
      @else
      <small class="center">Vous n'avez fait aucun commentaire </small>
      @endif
    </div>
  </div>
</div>
