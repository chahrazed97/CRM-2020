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
                                <input class="form-control form-control-lg" type="text" name="titre" value="{{ $evenement->titre }}" id="example-text-input-lg">
                                {!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-date-input" class="col-form-label">date/heure</label>
                                        <input class="form-control" type="datetime-local" name="date" value="{{ $evenement->date }}" id="example-date-input">
                                        {!! $errors->first('date', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-time-input" class="col-form-label">Localisation</label>
                                        <input class="form-control" type="text" name="localisation" value="{{ $evenement->localisation }}" id="example-time-input">
                                        {!! $errors->first('localisation', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="example-text-input-lg" class="col-form-label">Description</label>
                                <input class="form-control form-control-lg" type="text" name="description" value="{{ $evenement->description }}" id="example-text-input-lg">
                                {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
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