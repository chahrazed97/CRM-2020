<div class="col-12">
    <form class="card" action="{{ route('accueil.activite.modifier', ['activite' => $activite]) }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="card-body">
            <div class="modal-header">
                <h5 class="modal-title">Modifier l'activité {{ $activite->titre }} </h5>   
            </div>
            
            <b class="text-muted mb-3 mt-4 d-block">Type d'activité :</b>
            <div class="custom-control custom-radio custom-control-inline">
                @if($activite->type_activite == 'e-mail')
                <input type="radio" checked id="customRadio4" name="type" value="e-mail" class="custom-control-input" checked>
                @else
                <input type="radio" checked id="customRadio4" name="type" value="e-mail" class="custom-control-input">
                @endif
                <label class="custom-control-label" for="customRadio4">E-mail</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                @if($activite->type_activite == 'appel')
                <input type="radio" id="customRadio5" name="type" value="appel" class="custom-control-input" checked>
                @else
                <input type="radio" id="customRadio5" name="type" value="appel" class="custom-control-input">
                @endif
                <label class="custom-control-label" for="customRadio5">Appel téléphonique</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                @if($activite->type_activite == 'rendez_vous')
                <input type="radio" id="customRadio6" name="type" value="rendez-vous" class="custom-control-input" checked>
                @else
                <input type="radio" id="customRadio6" name="type" value="rendez-vous" class="custom-control-input">
                @endif
                <label class="custom-control-label" for="customRadio6">Rendez-vous</label>
            </div>

            <div class="form-group">
                <label for="example-text-input" class="col-form-label">Titre</label>
                <input class="form-control" type="text" name="titre" value="{{ $activite->titre }}" id="example-text-input">
                <small class="help-block" style="color : red;"></small>
	
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="example-date-input" class="col-form-label">Date</label>
                        <input class="form-control" type="date" name="date" value="{{ (new Carbon\Carbon($activite->date_act))->format('Y-m-d') }}" id="example-date-input">
                        <small class="help-block" style="color : red;"></small>
	
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="example-time-input" class="col-form-label">Heure</label>
                        <input class="form-control" type="time" name="heure" value="{{ (new Carbon\Carbon($activite->date_act))->format('H:i') }}" id="example-time-input">
                        <small class="help-block" style="color : red;"></small>
	
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-form-label">Selection client</label>   
                <select class="custom-select" name="client">
                    <option value="{{ $activite->clients->id }}" selected="selected">{{ $activite->clients->nom.' '.$activite->clients->prenom }}</option>
                    @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->nom.' '.$client->prenom }}</option>
                    @endforeach
                
                </select>
                <small class="help-block" style="color : red;"></small>
                
            </div>

            <div class="form-group">
                <label for="example-text-input-lg" class="col-form-label">Description</label>
                <input class="form-control form-control-lg" type="text" name="description" value="{{ $activite->description }}" id="example-text-input-lg">
                <small class="help-block" style="color : red;"></small>
	
            </div>

            <div class="form-group">
                <label class="col-form-label">Status</label>   
                <select class="custom-select" name="status">
                    <option value="{{ $activite->status }}" selected="selected">{{ $activite->status }}</option>
                    <option value="planifié">Planifié</option>
                    <option value="terminé">Terminé</option>
                </select>
                <small class="help-block" style="color : red;"></small>
            </div>
            <div class="modal-footer">
                <a class="left" data-dismiss="modal" href="{{ URL::previous() }}"><i class="fa fa-hand-o-left"></i>Retour</a>
                <button type="submit" class="btn btn-rounded btn- btn-sm right">Modifier</buttom>
            </div>
        </div>
    </form>
</div>
