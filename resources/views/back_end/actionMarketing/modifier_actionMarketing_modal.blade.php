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
                                <label for="textarea1" class="col-form-label">Action Marketing</label>
                                <textarea id="textarea1" name="action" cols="50" rows="10" tabindex="101" data-min-length="">{{ $action->action_marketing }}</textarea>
                                {!! $errors->first('action', '<small class="help-block">:message</small>') !!}
                            </div>

                            
                            <div class="modal-footer">
                                <a class="left" data-dismiss="modal" href="{{ URL::previous() }}"><i class="fa fa-hand-o-left"></i>Retour</a>
                                <button type="submit" class="btn btn-rounded btn- btn-sm right">Modifier</buttom>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end form -->
            </div>
        </div>
    </div>
</div>