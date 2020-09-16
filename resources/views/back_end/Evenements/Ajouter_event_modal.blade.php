<!-- Modal -->
<div class="modal fade" id="ModalLong">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <!-- form -->
                <div class="col-12">
                    <form class="card" action="{{ route('admin.ajouter.evenement') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="card-body">
                            <div class="modal-header">
                                <h5 class="modal-title">Ajouter un évenement </h5>   
                            </div>

                            <div class="form-group">
                                <label for="titre" class="col-form-label">Titre</label>
                                <input class="form-control form-control-lg" type="text" name="titre" placeholder="donner un titre" id="titre" min="3" pattern="[-a-zA-Z0-9 \S]+">
                                <small class="help-block" id="titre_err" style="color : red;"></small>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="date" class="col-form-label">date/heure</label>
                                        <input class="form-control" type="datetime-local" name="date" placeholder="entrer la date et l'heure" id="date"  required>
                                        <small class="help-block" id="date_err" style="color : red;"></small>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="localisation" class="col-form-label">Localisation</label>
                                        <input class="form-control" type="text" name="localisation" placeholder="entrer la localisation" id="localisation" required>
                                        <small class="help-block" id="localisation_err" style="color : red;"></small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-form-label">Description</label>
                                <input class="form-control form-control-lg" type="text" name="description" placeholder="donner une description" id="description" min="3">
                                <small class="help-block" id="description_err" style="color : red;"></small>
                            </div>

            
                            <div class="modal-footer">
                                <a class="left" data-dismiss="modal" href="{{ URL::previous() }}"><i class="fa fa-hand-o-left"></i>Retour</a>
                                <button type="" id="sub_event" onclick="myFunctionEvent()" class="btn btn-rounded btn- btn-sm right">Ajouter</buttom>
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
function myFunctionEvent() {
    var titre = document.getElementById('titre');
    var date = document.getElementById("date");
    var localisation = document.getElementById("localisation");
    var description = document.getElementById("description");
  
    if (!titre.checkValidity()) {
        document.getElementById("titre_err").innerHTML = titre.validationMessage;
    }
    if (!date.checkValidity()) {
        document.getElementById("date_err").innerHTML = date.validationMessage;
    }
    if (!localisation.checkValidity()) {
        document.getElementById("localisation_err").innerHTML = localisation.validationMessage;
    }
    if (!description.checkValidity()) {
        document.getElementById("description_err").innerHTML = description.validationMessage;
    }else{
        document.getElementById("sub_event").type = "submit";
        } 
    } 
</script>