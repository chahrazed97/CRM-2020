<!-- Modal -->
<div class="modal fade" id="ModalLong{{ $evenement->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <!-- form -->
                <div class="col-12">
                    <form class="card" action="{{ route('admin.modifier.evenement', ['evenement' => $evenement]) }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="card-body">
                            <div class="modal-header">
                                <h5 class="modal-title">Ajouter un évenement </h5>   
                            </div>

                            <div class="form-group">
                                <label for="example-text-input-lg" class="col-form-label">Titre</label>
                                <input class="form-control form-control-lg" type="text" name="titre" value="{{ $evenement->titre }}" id="titre">
                                <small class="help-block" id="titre_err" style="color : red;"></small>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-date-input" class="col-form-label">date/heure</label>
                                        <input class="form-control" type="datetime-local" name="date" value="{{ $evenement->date }}" id="date">
                                        <small class="help-block" id="date_err" style="color : red;"></small>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-time-input" class="col-form-label">Localisation</label>
                                        <input class="form-control" type="text" name="localisation" value="{{ $evenement->localisation }}" id="localisation">
                                        <small class="help-block" id="localisation_err" style="color : red;"></small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="example-text-input-lg" class="col-form-label">Description</label>
                                <input class="form-control form-control-lg" type="text" name="description" value="{{ $evenement->description }}" id="description">
                                <small class="help-block" id="description_err" style="color : red;"></small>
                            </div>

            
                            <div class="modal-footer">
                                <a class="left" data-dismiss="modal" href="{{ URL::previous() }}"><i class="fa fa-hand-o-left"></i>Retour</a>
                                <button type="" id="sub_eventM" onclick="myFunctionEventM()" class="btn btn-rounded btn- btn-sm right">Modifier</buttom>
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
function myFunctionEventM() {
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
        document.getElementById("sub_eventM").type = "submit";
        } 
    } 
</script>