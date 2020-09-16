<!-- Modal -->
<div class="modal fade" id="ModalLong">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <!-- form -->
                <div class="col-12">
                    <form class="card" action="{{ route('admin.ajouter.employe') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="card-body">
                            <div class="modal-header">
                                <h5 class="modal-title">Ajouter un employe </h5>   
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nom" class="col-form-label">Nom</label>
                                        <input class="form-control" type="text" name="nom" placeholder="entrez le nom" id="nom" min="3" pattern="[a-zA-Z \s]+" required>
                                        <small class="help-block" id="nom_err" style="color : red;"></small>

                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="prenom" class="col-form-label">Prénom</label>
                                        <input class="form-control" type="text" name="prenom" placeholder="entrez le prenom" id="prenom" min="3" pattern="[a-zA-Z \s]+" required>
                                        <small class="help-block" id="prenom_err" style="color : red;"></small>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="phone" class="col-form-label">Téléphone</label>
                                        <input class="form-control" type="number" name="phone" placeholder="entrez le numero du téléphone" id="phone" pattern="" required>
                                        <small class="help-block" id="phone_err" style="color : red;"></small>

                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email" class="col-form-label">E-mail</label>
                                        <input class="form-control" type="email" name="email" placeholder="entrez l'email" id="email" required>
                                        <small class="help-block" id="email_err" style="color : red;"></small>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="fonction" class="col-form-label">Fonction</label>
                                <input class="form-control form-control-lg" type="text" name="role" placeholder="entrez la fonction du l'employe" id="fonction" min="3" pattern="[a-zA-Z \s]+" required>
                                <small class="help-block" id="fonction_err" style="color : red;"></small>

                            </div>

                            <div class="modal-footer">
                                <a class="left" data-dismiss="modal" href="{{ URL::previous() }}"><i class="fa fa-hand-o-left"></i>Retour</a>
                                <button type="" id="sub_emp" onclick="myFunctionEMP()" class="btn btn-rounded btn- btn-sm right">Ajouter</buttom>
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
function myFunctionEMP() {
    var nom = document.getElementById('nom');
    var prenom = document.getElementById("prenom");
    var phone = document.getElementById("phone");
    var email = document.getElementById("email");
    var fonction = document.getElementById("fonction");
  
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
    if (!fonction.checkValidity()) {
        document.getElementById("fonction_err").innerHTML = fonction.validationMessage;
    }else{
        document.getElementById("sub_emp").type = "submit";
        } 
    } 
</script>