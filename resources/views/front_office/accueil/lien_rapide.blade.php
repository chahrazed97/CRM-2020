<div class=" bell-notify-box lien-box">
    <span class="notify-title">Liens rapides
        
            <button class="btn btn-rounded btn- btn-xs right" type="button" data-toggle="dropdown">
                <i class="fa fa-plus"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @include('front_office.accueil.ajouter_lien')
            </div>
        
    </span>
    <div class="bell-notify-box notify-box">
       <ul class="list-group list-group-flush">
           @foreach ($liens as $lien)
            <li class="list-group-item">
                <div class="row">
                    <div class="col-7">
                        <a href="{{ $lien->lien }}"><i class="fa fa-tag" ></i>{{ $lien->titre }}<small><cite>{{ $lien->lien }}</cite></small></a>
                    </div>
                    <div class="col-4">
                        <a href="{{ route('accueil.lien.annuler', ['lien' => $lien]) }}" class="lien-ch"><button class="btn btn-rounded btn- btn-xs right" onclick= "return confirm('Etes vous sur de vouloir supprimer ce lien ?')"><i class="fa fa-trash"></i></button></a>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
       
    </div>

</div>
