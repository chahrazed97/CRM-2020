<div class="page-header">
    <a class="lien-ch mr-2" data-toggle="tooltip" data-placement="left" title="Programmer une activité avec ce client"><button class="btn btn-rounded btn- btn-xs" type="button" data-toggle="modal" data-target="#ModalLong">Programmer une activité</button></a>
    <a class="lien-ch mr-2" href="" data-toggle="tooltip" data-placement="left" title="Envoyer e-mail"><button class="btn btn-rounded btn- btn-xs"><i class="fa fa-envelope"></i></button></a>
    <a class="lien-ch " href="" data-toggle="tooltip" data-placement="left" title="effectuer un appel"><button class="btn btn-rounded btn- btn-xs"><i class="fa fa-phone"></i></button></a>
</div>
@include('front_office.MesClients.ajouterActiviteClient_modal')
<ul class="timeline">
  @foreach ( $activite_all as $activite )
  @if ( $activite->organisateur == 'client')
  <?php $inverted = "timeline-inverted";
        $emetteur = $client->nom.' '.$client->prenom. ':'; ?>
  @else
  <?php $inverted = "";
        $emetteur = "Vous:" ?>
  @endif
  <li class="{{ $inverted }}">
    @if ( $activite->type_act == 'phone' )
    <?php $icon = "phone"; ?>
    @else
    <?php $icon = "envelope"; ?>
    @endif
    <div class="timeline-badge"><i class="fa fa-{{ $icon }}"></i></div>
    <div class="timeline-panel">
      <div class="timeline-heading">
        <small>{{ $emetteur }}</small>
        <h6 class="timeline-title">{{ $activite->titre }}</h6>
        <p><small class="text-muted"><i class="fa fa-time"></i>{{ $activite->date_act }}</small></p>
      </div>
      <div class="timeline-body">
        {{ $activite->type_act }}
      </div>
    </div>
  </li>
  @endforeach
  <li class="timeline-inverted">
    <div class="timeline-badge warning"><i class="fa fa-credit-card"></i></div>
    <div class="timeline-panel">
      <div class="timeline-heading">
        <h4 class="timeline-title">Mussum ipsum cacilds</h4>
      </div>
      <div class="timeline-body">
        <p></p>
      </div>
    </div>
  </li>

       
  <!-- exemple -->      
  <li>
    <div class="timeline-badge info"><i class="fa fa-envelope"></i></div>
    <div class="timeline-panel">
      <div class="timeline-heading">
        <h4 class="timeline-title">Mussum ipsum cacilds</h4>
      </div>
      <div class="timeline-body">
        <p>.</p>
        <hr>
        <div class="btn-group">
          <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-phone"></i> <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </div>
      </div>
    </div>
  </li>
  <!--exemple fin -->

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
