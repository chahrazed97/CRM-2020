<div class="col-12 mt-1">
    <form id="lienForm" action="{{ route('accueil.lien.ajouter') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
            <div class="col-12">
                <div class="form-group ">
                    <label for="example-date-input" class="col-form-label">Titre</label>
                    <div class="form-group has-error">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-tag"></i></div>
                            </div>
                            <input class="form-control" type="text" id="titre" name="titre" placeholder="ajouter un titre au lien" value="{{ old('titre') }}" id="example-date-input" min="3">
                           
                        </div>
                    </div>
                </div>
                <small class="help-block" id="titre_err" style="color : red;"></small>
            </div>

            <div class="col-12">
                <div class="form-group ">
                    <label for="example-date-input" class="col-form-label">Lien</label>
                    <div class="form-group has-error">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-globe"></i></div>
                            </div>
                            <input class="form-control" type="text" id="lien" name="url" placeholder="https://example.com" value="{{ old('url') }}" id="example-date-input" pattern="" required>
                            
                        </div>
                    </div>
                </div>
                <small class="help-block" id="lien_err" style="color : red;"></small>
            </div>

            <button type="" id="sub_lien" onclick="myFunctionLien()" class="btn btn-rounded btn- btn-sm right">Ajouter</buttom>
        
    </form>
</div>

<script>
function myFunctionLien() {
  var titre = document.getElementById('titre');
  var lien = document.getElementById("lien");
 
  
  if (!titre.checkValidity()) {
    document.getElementById("titre_err").innerHTML = titre.validationMessage;
  }
  if (!lien.checkValidity()) {
    document.getElementById("lien_err").innerHTML = date.validationMessage;
  } else{
    document.getElementById("sub_lien").type = "submit";
  } 
} 


</script>


            