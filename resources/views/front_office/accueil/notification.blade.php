<div class="row">
@foreach ( $new_client as $client )
<div class="col-md-3">
    <div class="card ">
        <div class="card-img-overlay"> <span class="badge badge-pill badge-danger">News</span> </div><br>
        <div class="card-body">
            <div class="news-title">
                <h2 class=" title-small"><a href="#">{{ $client->nom }}: Why the battle for Aleppo matters</a></h2>
            </div>
            <p class="card-text"><small class="text-time"><em>3 mins ago</em></small></p>
        </div>
    </div>
</div>
@endforeach

@foreach ( $new_event as $event )
<div class="col-md-3">
    <div class="card ">
        <div class="card-img-overlay"> <span class="badge badge-pill badge-danger">News</span> </div><br>
        <div class="card-body">
            <div class="news-title">
                <h2 class=" title-small"><a href="#">{{ $event->titre }}: Why the battle for Aleppo matters</a></h2>
            </div>
            <p class="card-text"><small class="text-time"><em>3 mins ago</em></small></p>
        </div>
    </div>
</div>
@endforeach

@foreach ( $new_promo as $promo )
<div class="col-md-3">
    <div class="card ">
        <div class="card-img-overlay"> <span class="badge badge-pill badge-danger">News</span> </div><br>
        <div class="card-body">
            <div class="news-title">
                <h2 class=" title-small"><a href="#">{{ $promo->titre }}: Why the battle for Aleppo matters</a></h2>
            </div>
            <p class="card-text"><small class="text-time"><em>3 mins ago</em></small></p>
        </div>
    </div>
</div>
@endforeach

@foreach ( $new_reclam as $reclam )
<div class="col-md-3">
    <div class="card ">
        <div class="card-img-overlay"> <span class="badge badge-pill badge-danger">News</span> </div><br>
        <div class="card-body">
            <div class="news-title">
                <h2 class=" title-small"><a href="#">{{ $reclam->description }}: Why the battle for Aleppo matters</a></h2>
            </div>
            <p class="card-text"><small class="text-time"><em>3 mins ago</em></small></p>
        </div>
    </div>
</div>
@endforeach

@foreach ( $new_product as $product )
<div class="col-md-3">
    <div class="card ">
        <div class="card-img-overlay"> <span class="badge badge-pill badge-danger">News</span> </div><br>
        <div class="card-body">
            <div class="news-title">
                <h2 class=" title-small"><a href="#">{{ $product->red_prod }}: Why the battle for Aleppo matters</a></h2>
            </div>
            <p class="card-text"><small class="text-time"><em>3 mins ago</em></small></p>
        </div>
    </div>
</div>
@endforeach
</div>
