<!-- Modal -->
<div class="modal fade" id="ModalLong{{ $prospect->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <!-- form -->
                <div class="col-12">
                    <form class="card" action="{{ route('admin.modifier.prospect', ['prospect' => $prospect]) }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="card-body">
                            <div class="modal-header">
                                <h5 class="modal-title">Modifier prospect</h5>   
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-date-input" class="col-form-label">Nom</label>
                                        <input class="form-control" type="text" name="nom" value="{{ $prospect->nom }}" id="example-date-input">
                                        {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-time-input" class="col-form-label">Prénom</label>
                                        <input class="form-control" type="text" name="prenom" value="{{ $prospect->prenom }}" id="example-time-input">
                                        {!! $errors->first('prenom', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-date-input" class="col-form-label">Téléphone</label>
                                        <input class="form-control" type="number" minlength="9" maxlength="11" name="phone" value="{{ $prospect->phone }}" id="example-date-input">
                                        {!! $errors->first('phone', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-time-input" class="col-form-label">E-mail</label>
                                        <input class="form-control" type="email" name="email" value="{{ $prospect->email }}" id="example-time-input">
                                        {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="example-text-input-lg" class="col-form-label">Date de naissance</label>
                                <input class="form-control form-control-lg" type="date" name="date_naissance" value="{{ $prospect->date_naissance }}" id="example-text-input-lg">
                                {!! $errors->first('date_naissance', '<small class="help-block">:message</small>') !!}
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-date-input" class="col-form-label">Adresse</label>
                                        <input class="form-control" type="text" name="adresse" value="{{ $prospect->adresse }}" id="example-date-input">
                                        {!! $errors->first('adresse', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-time-input" class="col-form-label">Pays</label>
                                        <input class="form-control" type="text" name="pays" value="{{ $prospect->pays }}" id="example-time-input">
                                        {!! $errors->first('pays', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="example-text-input-lg" class="col-form-label">Code postal</label>
                                <input class="form-control form-control-lg" type="number" name="code_postal" value="{{ $prospect->code_postal }}" id="example-text-input-lg">
                                {!! $errors->first('code_postal', '<small class="help-block">:message</small>') !!}
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