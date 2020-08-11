<div class="col-12 mt-1">
    <form class="" action="{{ route('accueil.lien.ajouter') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
            <div class="col-12">
                <div class="form-group">
                    <label for="example-date-input" class="col-form-label">Titre</label>
                    <div class="form-group {!! $errors->has('titre') ? 'has-error' : '' !!}">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-tag"></i></div>
                            </div>
                            <input class="form-control" type="text" name="titre" placeholder="ajouter un titre au lien" id="example-date-input">
                            {{ $errors->first('titre', "<small class='help-block'>:message</small>") }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="example-date-input" class="col-form-label">Lien</label>
                    <div class="form-group {!! $errors->has('lien') ? 'has-error' : '' !!}">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-globe"></i></div>
                            </div>
                            <input class="form-control" type="url" name="url" placeholder="https://example.com" id="example-date-input">
                            {{ $errors->first('lien', '<small class="help-block">:message</small>') }}
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-rounded btn- btn-sm right">Ajouter</buttom>
        
    </form>
</div>

            