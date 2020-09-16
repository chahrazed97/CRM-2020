<!-- Modal -->
<div class="modal fade" id="ModalLong{{ $promotion->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <!-- form -->
                <div class="col-12">
                    <form class="card" action="{{ route('admin.modifier.promotion', ['promotion' => $promotion]) }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="card-body">
                            <div class="modal-header">
                                <h5 class="modal-title">Modifier la promotion {{ $promotion->titre }} </h5>   
                            </div>

                            <div class="form-group">
                                <label for="titreM" class="col-form-label">Titre</label>
                                <input class="form-control form-control-lg" type="text" name="titre" id="titreM" value="{{ $promotion->titre }}" min="3" pattern="[-a-zA-Z0-9 \S]+">
                                <small class="help-block" id="titreM_err" style="color : red;"></small>

                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="start_dateM" class="col-form-label">Start date</label>
                                        <input class="form-control" type="date" id="start_dateM" name="start_date" value="{{ $promotion->start_date }}" required>
                                        <small class="help-block" id="startM_err" style="color : red;"></small>

                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="end_dateM" class="col-form-label">End date</label>
                                        <input class="form-control" type="date" name="end_date" value="{{ $promotion->end_date }}" id="end_dateM" required>
                                        <small class="help-block" id="endM_err" style="color : red;"></small>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="produitM" class="col-form-label">Produit de la promo</label>
                                        <select class="custom-select" name="produit" id="produitM" required>
                                            <option value="{{ $promotion->produit_id }}" selected="selected">{{ $promotion->Produit->nom }}</option>
                                            @foreach($produits as $produit)
                                            <option value="{{ $produit->id }}">{{ $produit->nom }}</option>
                                            @endforeach
                                         </select>
                                         <small class="help-block" id="produitM_err" style="color : red;"></small>

                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="pourcentageM" class="col-form-label">pourcentage</label>
                                        <input class="form-control" type="number" id="pourcentageM" name="pourcentage" value="{{ $promotion->pourcetage_promo }}" required>
                                        <small class="help-block" id="pourcentageM_err" style="color : red;"></small>

                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <a class="left" data-dismiss="modal" href="{{ URL::previous() }}"><i class="fa fa-hand-o-left"></i>Retour</a>
                                <button type="" id="sub_promoM" onclick="myFunctionPromoM()" class="btn btn-rounded btn- btn-sm right">Modifier</buttom>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end form -->
            </div>
        </div>
    </div>
</div>
<script>
function myFunctionPromoM() {
    var titre_m = document.getElementById('titreM');
    var start_date_m = document.getElementById("start_dateM");
    var end_date_m = document.getElementById("end_dateM");
    var produit_m = document.getElementById("produitM");
    var pourcentage_m = document.getElementById("pourcentageM");
  
    if (!titre_m.checkValidity()) {
        document.getElementById("titreM_err").innerHTML = titre_m.validationMessage;
    }
    if (!start_date_m.checkValidity()) {
        document.getElementById("startM_err").innerHTML = start_date_m.validationMessage;
    }
    if (!end_date_m.checkValidity()) {
        document.getElementById("endM_err").innerHTML = end_date_m.validationMessage;
    }
    if (!produit_m.checkValidity()) {
        document.getElementById("produitM_err").innerHTML = produit_m.validationMessage;
    }
    if (!pourcentage_m.checkValidity()) {
        document.getElementById("pourcentageM_err").innerHTML = pourcentage_m.validationMessage;
    }else{
        document.getElementById("sub_promoM").type = "submit";
        } 
    } 
</script>