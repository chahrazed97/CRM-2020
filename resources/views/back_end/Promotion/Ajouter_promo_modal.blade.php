<!-- Modal -->
<div class="modal fade" id="ModalLong">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <!-- form -->
                <div class="col-12">
                    <form class="card" action="{{ route('admin.ajouter.promotion') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="card-body">
                            <div class="modal-header">
                                <h5 class="modal-title">Ajouter une promotion </h5>   
                            </div>

                            <div class="form-group">
                                <label for="example-text-input-lg" class="col-form-label">Titre</label>
                                <input class="form-control form-control-lg" type="text" name="titre" placeholder="donner un titre" id="example-text-input-lg">
                                {!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-date-input" class="col-form-label">Start date</label>
                                        <input class="form-control" type="date" name="start_date" placeholder="entrer la date début" id="example-date-input">
                                        {!! $errors->first('start_date', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-time-input" class="col-form-label">End date</label>
                                        <input class="form-control" type="date" name="end_date" placeholder="entrer la date fin " id="example-time-input">
                                        {!! $errors->first('end_date', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-date-input" class="col-form-label">Produit de la promo</label>
                                        <select class="custom-select" name="produit">
                                            <option selected="selected">Choisir un produit</option>
                                            @foreach($produits as $produit)
                                            <option value="{{ $produit->id }}">{{ $produit->type }}</option>
                                            @endforeach
                                         </select>
                                        {!! $errors->first('produit', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-time-input" class="col-form-label">pourcentage</label>
                                        <input class="form-control" type="number" name="pourcentage" placeholder=" donner un poucentage " id="example-time-input">
                                        {!! $errors->first('pourcentage', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <a class="left" data-dismiss="modal" href="{{ URL::previous() }}"><i class="fa fa-hand-o-left"></i>Retour</a>
                                <button type="submit" class="btn btn-rounded btn- btn-sm right">Ajouter</buttom>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end form -->
            </div>
        </div>
    </div>
</div>