<!-- Modal -->
<div class="modal fade" id="ModalLong{{ $client->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <!-- form -->
                <div class="col-12">
                    <form class="card" action="{{ route('admin.modifier.client', ['client' => $client]) }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="card-body">
                            <div class="modal-header">
                                <h5 class="modal-title">Modifier un client </h5>   
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-date-input" class="col-form-label">Nom</label>
                                        <input class="form-control" type="text" name="nom" value="{{ $client->nom }}" id="example-date-input">
                                        {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-time-input" class="col-form-label">Prénom</label>
                                        <input class="form-control" type="text" name="prenom" value="{{ $client->prenom }}" id="example-time-input">
                                        {!! $errors->first('prenom', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-date-input" class="col-form-label">Téléphone</label>
                                        <input class="form-control" type="number" name="phone" value="{{ $client->phone }}" id="example-date-input">
                                        {!! $errors->first('phone', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-time-input" class="col-form-label">E-mail</label>
                                        <input class="form-control" type="email" name="email" value="{{ $client->email }}" id="example-time-input">
                                        {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="example-text-input-lg" class="col-form-label">Date de naissance</label>
                                <input class="form-control form-control-lg" type="date" name="date_naissance" value="{{ $client->date_naissance }}" id="example-text-input-lg">
                                {!! $errors->first('date_naissance', '<small class="help-block">:message</small>') !!}
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-date-input" class="col-form-label">Adresse</label>
                                        <input class="form-control" type="text" name="adresse" value="{{ $client->adresse }}" id="example-date-input">
                                        {!! $errors->first('adresse', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Pays</label>
                                        <div class="form-group">   
                                            <select class="custom-select" name="pays">
                                                <option value="{{ $client->pays_id }}" selected="selected">{{ $client->pays }}</option>
                                                @foreach($tt_pays as $pays_cl)
                                                <option value="{{ $pays_cl->id }}">{{ $pays_cl->pays}}</option>
                                                @endforeach
                
                                            </select>
                                            <small class="help-block"></small>
                                        </div>
                                    </div>
                                    <!--<div class="form-group">
                                        <label for="example-time-input" class="col-form-label">Pays</label>
                                        <input class="form-control" type="text" name="pays" value="{{ $client->pays }}" id="example-time-input">
                                        {!! $errors->first('pays', '<small class="help-block">:message</small>') !!}
                                    </div>-->
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="example-text-input-lg" class="col-form-label">Code postal</label>
                                <input class="form-control form-control-lg" type="number" name="code_postal" value="{{ $client->code_postal }}" id="example-text-input-lg">
                                {!! $errors->first('code_postal', '<small class="help-block">:message</small>') !!}
                            </div>

                            <div class="form-group">
                                <label for="example-text-input-lg" class="col-form-label">métier</label>
                                <input class="form-control form-control-lg" type="text" name="metier" value="{{ $client->metier }}" id="example-text-input-lg">
                                {!! $errors->first('metier', '<small class="help-block">:message</small>') !!}
                            </div>

                            <div class="form-group has-error">
                            <label class="col-form-label">Suivi par</label>
                            <div class="form-group {{ $errors->has('employe') ? 'has-error' : '' }}">   
                            <select class="custom-select" name="employe">
                                <option value="{{ $client->Employees->id }}" selected="selected">{{ $client->Employees->nom.' '.$client->Employees->prenom }}</option>
                                @foreach($employes as $employe)
                                <option value="{{ $employe->id }}">{{ $employe->nom.' '.$employe->prenom }}</option>
                                @endforeach
                            </select>
                           {!! $errors->first('employe', '<small class="help-block">:message</small>') !!}
                            </div>
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