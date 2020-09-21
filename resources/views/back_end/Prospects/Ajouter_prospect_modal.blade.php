<!-- Modal -->
<div class="modal fade" id="ModalLong">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <!-- form -->
                <div class="col-12">
                    <form class="card" action="{{ route('admin.ajouter.prospect') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="card-body">
                            <div class="modal-header">
                                <h5 class="modal-title">Ajouter un prospect</h5>   
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nom" class="col-form-label">Nom</label>
                                        <input class="form-control" type="text" name="nom" placeholder="entrez le nom" id="nom" minlength="3" maxlength="50" pattern="[a-zA-Z \s]+" required>
                                        <small class="help-block" id="nom_err" style="color : red;"></small>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="prenom" class="col-form-label">Prénom</label>
                                        <input class="form-control" type="text" name="prenom" placeholder="entrez le prenom" id="prenom" minlength="3" maxlength="50" pattern="[a-zA-Z \s]+"  required>
                                        <small class="help-block" id="prenom_err" style="color : red;"></small>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="phone" class="col-form-label">Téléphone</label>
                                        <input class="form-control" type="number" name="phone" minlength="9" maxlength="11" placeholder="entrez le numero du téléphone" id="phone">
                                        <small class="help-block" id="phone_err" style="color : red;"></small>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email" class="col-form-label">E-mail</label>
                                        <input class="form-control" type="email" name="email" placeholder="entrez l'email" id="email">
                                        <small class="help-block" id="email_err" style="color : red;"></small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="date" class="col-form-label">Date de naissance</label>
                                <input class="form-control form-control-lg" type="date" name="date_naissance" placeholder="entrez la fonction du l'employe" id="date">
                                <small class="help-block" id="date_err" style="color : red;"></small>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="adresse" class="col-form-label">Adresse</label>
                                        <input class="form-control" type="text" name="adresse" placeholder="entrez l'adresse" id="adresse">
                                        <small class="help-block" id="adresse_err" style="color : red;"></small>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="pays" class="col-form-label">Pays</label>
                                        <input class="form-control" type="text" name="pays" placeholder="entrez le pays" id="pays">
                                        <small class="help-block" id="pays_err" style="color : red;"></small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="zip" class="col-form-label">Code postal</label>
                                <input class="form-control form-control-lg" type="number" name="code_postal" placeholder="entrez le code postal" id="zip">
                                <small class="help-block" id="zip_err" style="color : red;"></small>
                            </div>

                            <div class="modal-footer">
                                <a class="left" data-dismiss="modal" href="{{ URL::previous() }}"><i class="fa fa-hand-o-left"></i>Retour</a>
                                <button type="" id="sub_pros" onclick="myFunctionPROS()" class="btn btn-rounded btn- btn-sm right">Ajouter</buttom>
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
function myFunctionPROS() {
    var nom = document.getElementById('nom');
    var prenom = document.getElementById("prenom");
    var phone = document.getElementById("phone");
    var email = document.getElementById("email");
    var date = document.getElementById("date");
    var adresse = document.getElementById("adresse");
    var pays = document.getElementById("pays");
    var zip = document.getElementById("zip");
  
    if (!nom.checkValidity()) {
        document.getElementById("nom_err").innerHTML = nom.validationMessage;
    }
    if (!prenom.checkValidity()) {
        document.getElementById("prenom_err").innerHTML = prenom.validationMessage;
    }
    if (!phone.checkValidity()) {
        document.getElementById("phone_err").innerHTML = phone.validationMessage;
    }
    if (!email.checkValidity()) {
        document.getElementById("email_err").innerHTML = email.validationMessage;
    }
    if (!date.checkValidity()) {
        document.getElementById("date_err").innerHTML = date.validationMessage;
    }
    if (!adresse.checkValidity()) {
        document.getElementById("adresse_err").innerHTML = adresse.validationMessage;
    }
    if (!pays.checkValidity()) {
        document.getElementById("pays_err").innerHTML = pays.validationMessage;
    }
    if (!zip.checkValidity()) {
        document.getElementById("zip_err").innerHTML = zip.validationMessage;
    }else{
        document.getElementById("sub_emp").type = "submit";
        } 
    } 
</script>