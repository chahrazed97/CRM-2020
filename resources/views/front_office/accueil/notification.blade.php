<!-- seo fact area start -->

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
            <a href="" class=""><i class="fa fa-angle-double-right right"></i><cite class="right">Faire la publicité</cite></a>
        </div>
    </div>
</div>
@endif

@if ( $new_client !== 0)
<div class="col-md-4 mt-2 mb-3">
    <div class="card">
        <div class="seo-fact sbg1">
        <span class="badge badge-pill badge-danger">Nouveau</span>
            <div class="p-4 d-flex justify-content-between align-items-center">
                <div class="seofct-icon">
                    <i class="fa fa-bell-o"></i>
                </div>
                <div class="seofct-icon">
                {{ $new_client }}
                @if( $new_product == 1 )
                 Nouveau client
                @else
                 Nouveaux clients
                @endif
                </div>
            </div>
            <a href="" class=""><i class="fa fa-angle-double-right right"></i><cite class="right">Contacter</cite></a>
        </div>
    </div>
</div>
@endif

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
                {{ $birthday_today }}
                @if( $birthday_today == 1 )
                 Aujourd'hui c'est l'anniversaire d'un client
                @else
                 Aujourd'hui c'est l'anniversaire de {{ $birthday_today }} clients
                @endif
                </div>
            </div>
            <a href="" class=""><i class="fa fa-angle-double-right right"></i><cite class="right">Contacter</cite></a>
        </div>
    </div>
</div>
@endif

@if ( $new_promo !== 0)
<div class="col-md-4 mt-2 mb-3">
    <div class="card">
        <div class="seo-fact sbg2">
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
            <a href=""><cite>Plus d'informations ici</cite></a>
            <a href="" class=""><i class="fa fa-angle-double-right right"></i><cite class="right">Faire la publicité</cite></a>
        </div>
    </div>
</div>
@endif

@if ( $new_event !== 0)
<div class="col-md-4 mt-2 mb-3">
    <div class="card">
        <div class="seo-fact sbg3">
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
            <a href=""><cite>Plus d'information ici</cite></a>
            <a href="" class=""><i class="fa fa-angle-double-right right"></i><cite class="right">Faire la publicité</cite></a>
        </div>
    </div>
</div>
@endif

@if ( $new_reclam !== 0)
<div class="col-md-4 mt-2 mb-3">
    <div class="card">
        <div class="seo-fact sbg4">
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
            <a href=""><cite>Plus d'informations ici</cite>
            <a href="" class=""><i class="fa fa-angle-double-right right"></i><cite class="right">Répondre</cite></a>
        </div>
    </div>
</div>
@endif
<!-- seo fact area end -->
