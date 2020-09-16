<!-- Modal -->
<div class="modal fade" id="ModalLong">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <!-- form -->
                <div class="col-12">
                    <form class="card" action="{{ route('admin.ajouter.promotion') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="card-body">
                            <div class="modal-header">
                                <h5 class="modal-title">Ajouter une promotion </h5>   
                            </div>

                            <div class="form-group">
                                <label for="titre" class="col-form-label">Titre</label>
                                <input class="form-control form-control-lg" type="text" name="titre" placeholder="donner un titre" id="titre" min="3" pattern="[-a-zA-Z0-9 \S]+">
                                <small class="help-block" id="titre_err" style="color : red;"></small>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="start_date" class="col-form-label">Start date</label>
                                        <input class="form-control" type="date" name="start_date" placeholder="entrer la date début" id="start_date" required>
                                        <small class="help-block" id="start_err" style="color : red;"></small>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="end_date" class="col-form-label">End date</label>
                                        <input class="form-control" type="date" name="end_date" placeholder="entrer la date fin " id="end_date" required>
                                        <small class="help-block" id="end_err" style="color : red;"></small>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="produit" class="col-form-label">Produit de la promo</label>
                                        <select class="custom-select" id="produit" name="produit">
                                            <option selected="selected">Choisir un produit</option>
                                            @foreach($produits as $produit)
                                            <option value="{{ $produit->id }}">{{ $produit->nom }}</option>
                                            @endforeach
                                         </select>
                                         <small class="help-block" id="produit_err" style="color : red;"></small>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="pourcentage" class="col-form-label">pourcentage</label>
                                        <input class="form-control" type="number" name="pourcentage" placeholder=" donner un poucentage " id="pourcentage" required>
                                        <small class="help-block" id="pourcentage_err" style="color : red;"></small>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <a class="left" data-dismiss="modal" href="{{ URL::previous() }}"><i class="fa fa-hand-o-left"></i>Retour</a>
                                <button type="" id="sub_promo" onclick="myFunctionPromo()" class="btn btn-rounded btn- btn-sm right">Ajouter</buttom>
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
function myFunctionPromo() {
    var titre = document.getElementById('titre');
    var start_date = document.getElementById("start_date");
    var end_date = document.getElementById("end_date");
    var produit = document.getElementById("produit");
    var pourcentage = document.getElementById("pourcentage");
  
    if (!titre.checkValidity()) {
        document.getElementById("titre_err").innerHTML = titre.validationMessage;
    }
    if (!start_date.checkValidity()) {
        document.getElementById("start_err").innerHTML = start_date.validationMessage;
    }
    if (!end_date.checkValidity()) {
        document.getElementById("end_err").innerHTML = end_date.validationMessage;
    }
    if (!produit.checkValidity()) {
        document.getElementById("produit_err").innerHTML = produit.validationMessage;
    }
    if (!pourcentage.checkValidity()) {
        document.getElementById("pourcentage_err").innerHTML = pourcentage.validationMessage;
    }else{
        document.getElementById("sub_promo").type = "submit";
        } 
    } 
</script>