<!-- Modal -->
<div class="modal fade" id="ModalLong{{ $action->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <!-- form -->
                <div class="col-12">
                    <form class="card" action="{{ route('admin.modifier.actionMarketing', ['action' => $action]) }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="card-body">
                            <div class="modal-header">
                                <h5 class="modal-title">Modifier l'action marketing du segment {{ $action->segment }} </h5>   
                            </div>

                            <div class="form-group col-12">
                                <label for="action" class="col-form-label">Action Marketing</label>
                                <textarea id="action" name="action" cols="50" rows="10" tabindex="101" data-min-length="" minlength="5" required>{{ $action->action_marketing }}</textarea>
                                <small class="help-block" id="action_err" style="color : red;"></small>
                            </div>

                            
                            <div class="modal-footer">
                                <a class="left" data-dismiss="modal" href="{{ URL::previous() }}"><i class="fa fa-hand-o-left"></i>Retour</a>
                                <button type="" id="sub_act" onclick="myFunctionAction()" class="btn btn-rounded btn- btn-sm right">Modifier</buttom>
                            </div>
                        </div>
                        <script>
                            function myFunctionAction() {
                                var action = document.getElementById('action');
                         
                                if (!action.checkValidity()) {
                                document.getElementById("action_err").innerHTML = action.validationMessage;
                                }else{
                                document.getElementById("sub_act").type = "submit";
                                } 
                            } 
                        </script>
                    </form>
                </div>
                <!-- end form -->
            </div>
        </div>
    </div>
</div>