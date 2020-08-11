<div class="modal fade" id="ModalLong">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-12">
                    <form class="card" action="{{ route('AjouterActivite.client', [ 'client' => $client]) }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="card-body">
                                <div class="modal-header">
                                    <h5 class="modal-title">Ajouter une activité</h5>   
                                </div>
            
                                <b class="text-muted mb-3 mt-4 d-block">Type d'activité:</b>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" checked id="customRadio4" name="type" value="e-mail" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio4">E-mail</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadio5" name="type" value="appel" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio5">Appel téléphonique</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadio6" name="type" value="rendez-vous" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio6">Rendez-vous</label>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Titre</label>
                                    <div class="form-group {!! $errors->has('titre') ? 'has-error' : '' !!}">
                                        <input class="form-control" type="text" name="titre" placeholder="Ajouter un titre" id="example-text-input">
                                        {{ $errors->first('titre', '<small class="help-block">:message</small>') }}
                                    </div>
	
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="example-date-input" class="col-form-label">Date</label>
                                            <div class="form-group {!! $errors->has('date') ? 'has-error' : '' !!}">
                                                <input class="form-control" type="date" name="date" placeholder="Ajouter une date" id="example-date-input">
                                                {{ $errors->first('date', '<small class="help-block">:message</small>') }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="example-time-input" class="col-form-label">Heure</label>
                                            <div class="form-group {{ $errors->has('heure') ? 'has-error' : '' }}">
                                                <input class="form-control" type="time" name="heure" placeholder="Donner l'horaire" id="example-time-input">
                                                {{ $errors->first('heure', '<small class="help-block">:message</small>') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input-lg" class="col-form-label">Description</label>
                                    <input class="form-control form-control-lg" type="text" name="description" placeholder="Ajouter une description" id="example-text-input-lg">
                                </div>
                                <div class="modal-footer">
                                    <a class="left" data-dismiss="modal" href="{{ URL::previous() }}"><i class="fa fa-hand-o-left"></i>Retour</a>
                                    <button type="submit" class="btn btn-rounded btn- btn-sm right">Créer</buttom>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
