<!-- timeline area start -->
<div class="card">
    <div class="card-body">
        <h4 class="header-title">Comportement d'achat</h4>
        <div class="timeline-area">
            @foreach ( $commande_cl as $commande )
            <div class="timeline-task">
                <div class="icon bg3">
                    <i class="fa fa-credit-card"></i>
                </div>
                <div class="tm-title">
                    <h4>Date d'achat</h4>
                    <span class="time"><i class="ti-time"></i>{{ $commande->date_comm }}</span>
                </div>
                <p><b>Produit acheté</b><br>
                @foreach ( $commande->produit as $produit )
                {{ $produit->ref_prod }}</br>
                @endforeach
                </p>
            </div>
            @endforeach                       
        </div>
   </div>
</div>
                    
<!-- timeline area end -->