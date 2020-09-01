<div class="col-12">
    <form id="ajouterActivite" class="card" action="{{ url('accueil/creer') }}" method="post">
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
                <div class="form-group">
                    <input class="form-control" type="text" name="titre" placeholder="Ajouter un titre" id="example-text-input" value="{{ old('titre') }}">
                    <small class="help-block" style="color : red;"></small>
                </div>
	
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="example-date-input" class="col-form-label">Date</label>
                        <div class="form-group">
                            <input class="form-control" type="date" name="date" placeholder="Ajouter une date" id="example-date-input"  value="{{ old('date') }}">
                            <small class="help-block" style="color : red;"></small>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="example-time-input" class="col-form-label">Heure</label>
                        <div class="form-group">
                            <input class="form-control" type="time" name="heure" placeholder="Donner l'horaire" id="example-time-input"  value="{{ old('heure') }}">
                            <small class="help-block" style="color : red;"></small>
                        </div>
	
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-form-label">Selection client</label>
                <div class="form-group">   
                <select class="custom-select" name="client">
                    <option selected="selected">Ajouter un client</option>
                    <?php 
                    
                    $employe= App\models\Employees::where('nom', '=', Auth::user()->nom)->where('prenom', '=', Auth::user()->prenom )->where('email', '=', Auth::user()->email )->where('phone', '=', Auth::user()->phone )->where('role', '=', Auth::user()->role )->first();
                    $clients = App\models\clients::where('employee_id', '=', $employe->id)->get();
                    ?>
                    @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->nom.' '.$client->prenom }}</option>
                    @endforeach
                
                </select>
                <small class="help-block"></small>
                </div>
            </div>

            <div class="form-group">
                <label for="example-text-input-lg" class="col-form-label" >Description</label>
                <input class="form-control form-control-lg" type="text" name="description" placeholder="Ajouter une description"  value="{{ old('description') }}" id="example-text-input-lg">
                <small class="help-block"></small>
            </div>
            <div class="modal-footer">
                <a class="left" data-dismiss="modal" href="{{ URL::previous() }}"><i class="fa fa-hand-o-left"></i>Retour</a>
                <button type="submit" id="sub" class="btn btn-rounded btn- btn-sm right">Créer</buttom>
            </div>
        </div>
    </form>
</div>


