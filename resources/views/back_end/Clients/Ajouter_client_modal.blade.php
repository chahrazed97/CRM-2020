<!-- Modal -->
<div class="modal fade" id="ModalLong">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <!-- form -->
                <div class="col-12">
                    <form class="card" action="{{ route('admin.ajouter.client') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="card-body">
                            <div class="modal-header">
                                <h5 class="modal-title">Ajouter un client </h5>   
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nom" class="col-form-label">Nom</label>
                                        <input class="form-control" type="text" name="nom" placeholder="entrez le nom" id="nom"  minlength="3" maxlength="50" pattern="[a-zA-Z \s]+" required>
                                        <small class="help-block" id="nom_err" style="color : red;"></small>

                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="prenom" class="col-form-label">Prénom</label>
                                        <input class="form-control" type="text" name="prenom" placeholder="entrez le prenom" id="prenom"  minlength="3" maxlength="50" pattern="[a-zA-Z \s]+" required>
                                        <small class="help-block" id="prenom_err" style="color : red;"></small>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="phone" class="col-form-label">Téléphone</label>
                                        <input class="form-control" type="number" name="phone" minlength="9" maxlength="11" placeholder="entrez le numero du téléphone" id="phone">
                                        <small class="help-block" id="prenom_err" style="color : red;"></small>

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
                                        <small class="help-block" id="adress_err" style="color : red;"></small>

                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Pays</label>
                                        <div class="form-group">   
                                            <select class="custom-select" id="pays" name="pays">
                                                <option selected="selected">Selectionner un pays</option>
                                                @foreach($tt_pays as $pays)
                                                <option value="{{ $pays->id }}">{{ $pays->pays}}</option>
                                                @endforeach
                
                                            </select>
                                            <small class="help-block" id="pays_err" style="color : red;"></small>

                                        </div>
                                    </div>
                                    <!--<div class="form-group">
                                        <label for="example-time-input" class="col-form-label">Pays</label>
                                        <input class="form-control" type="text" name="pays" placeholder="entrez le pays" id="example-time-input">
                                        {!! $errors->first('pays', '<small class="help-block">:message</small>') !!}
                                    </div>-->
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="zip" class="col-form-label">Code postal</label>
                                <input class="form-control form-control-lg" type="number" name="code_postal" placeholder="entrez le code postal" id="zip">
                                <small class="help-block" id="zip_err" style="color : red;"></small>

                            </div>

                            <div class="form-group">
                                <label for="metier" class="col-form-label">métier</label>
                                <input class="form-control form-control-lg" type="text" name="metier" placeholder="entrez le métier" id="metier">
                                <small class="help-block" id="metier_err" style="color : red;"></small>

                            </div>
                            
                            <div class="form-group has-error">
                            <label class="col-form-label">Suivi par</label>
                            <div class="form-group {{ $errors->has('employe') ? 'has-error' : '' }}">   
                            <select class="custom-select" name="employe">
                                <option selected="selected">Selectionner un employe</option>
                                @foreach($employes as $employe)
                                <option value="{{ $employe->id }}">{{ $employe->nom.' '.$employe->prenom }}</option>
                                @endforeach
                            </select>
                            <small class="help-block" id="emp_err" style="color : red;"></small>

                            </div>
                           </div>

                            <div class="modal-footer">
                                <a class="left" data-dismiss="modal" href="{{ URL::previous() }}"><i class="fa fa-hand-o-left"></i>Retour</a>
                                <button type="" id="sub_cl" onclick="myFunctionCL()" class="btn btn-rounded btn- btn-sm right">Ajouter</buttom>
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
function myFunctionCL() {
    var nom = document.getElementById('nom');
    var prenom = document.getElementById("prenom");
    var phone = document.getElementById("phone");
    var email = document.getElementById("email");
    var date = document.getElementById("date");
    var adresse = document.getElementById("adresse");
    var pays = document.getElementById("pays");
    var zip = document.getElementById("zip");
    var metier = document.getElementById("metier");
  
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
    }
    if (!metier.checkValidity()) {
        document.getElementById("metier_err").innerHTML = metier.validationMessage;
    }else{
        document.getElementById("sub_cl").type = "submit";
        } 
    } 
</script>