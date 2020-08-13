 <!-- Modal -->
 <div class="modal fade" id="ModalLong">
    <div class="modal-dialog">
        <form  action="{{ route('Envoyer.msg', ['membre' => $membre]) }}"  method="post" class="modal-content">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-body">
                <textarea type="text" class="form-control" rows="5" name="msg" placeholder="Rédigez votre message" required></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary left" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </form>
    </div>
</div>