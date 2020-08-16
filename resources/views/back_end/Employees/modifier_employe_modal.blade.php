<!-- Modal -->
<div class="modal fade" id="ModalLong{{ $employe->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <!-- form -->
                <div class="col-12">
                    <form class="card" action="{{ route('admin.modifier.employe', ['employe' => $employe]) }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="card-body">
                            <div class="modal-header">
                                <h5 class="modal-title">Modifier l'employe {{ $employe->nom.' '.$employe->prenom }} </h5>   
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-date-input" class="col-form-label">Nom</label>
                                        <input class="form-control" type="text" name="nom" value="{{ $employe->nom }}" id="example-date-input">
                                        {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-time-input" class="col-form-label">Prénom</label>
                                        <input class="form-control" type="text" name="prenom" value="{{ $employe->prenom }}" id="example-time-input">
                                        {!! $errors->first('prenom', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-date-input" class="col-form-label">Téléphone</label>
                                        <input class="form-control" type="number" name="phone" value="{{ $employe->phone }}" id="example-date-input">
                                        {!! $errors->first('phone', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-time-input" class="col-form-label">E-mail</label>
                                        <input class="form-control" type="email" name="email" value="{{ $employe->email }}" id="example-time-input">
                                        {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="example-text-input-lg" class="col-form-label">Fonction</label>
                                <input class="form-control form-control-lg" type="text" name="role" value="{{ $employe->role }}" id="example-text-input-lg">
                                {!! $errors->first('role', '<small class="help-block">:message</small>') !!}
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