<!-- COMMENTAIRE start -->
<div class="card">
    <div class="card-body">
        <h4 class="header-title">Commentaires sur le client {{ $client->nom.' '.$client->prenom }}</h4>
        <div class="list-group">
            @foreach ($commentaire as $comment)
            <a class="list-group-item list-group-item-action flex-column align-items-start">
               
                <p class="mb-1">{{ $comment->description }}</p>
                <small>{{ $comment->date_comm }}</small>
            </a>
            @endforeach
        </div>
    </div>
</div>
<!-- COMMENTAIRE end -->