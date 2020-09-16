 <!-- Modal -->
 <div class="modal fade" id="ModalLong{{ $membre->phone }}">
    <div class="modal-dialog">
        <form  action="{{ route('Envoyer.msg', ['id' => $membre->id, 'role' => $membre->role]) }}"  method="post" class="modal-content">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-body">
                <textarea type="text" id="contacter" class="form-control" rows="5" name="msg" placeholder="Rédigez votre message" required></textarea>
                <small id="contacter_err" class="help-block" style="color : red;"></small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary left" data-dismiss="modal">Annuler</button>
                <button type="" id="sub_contact" onclick="myFunction()" class="btn btn-primary">Envoyer</button>
            </div>
        </form>
    </div>
</div>
<script>
function myFunction() {
  var contacter = document.getElementById('contacter');

  if (!contacter.checkValidity()) {
    document.getElementById("contacter_err").innerHTML = date.validationMessage;
  } else{
    document.getElementById("sub_contact").type = "submit";
  } 
} 
</script>