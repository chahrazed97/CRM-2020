<!-- Modal -->
<div class="modal fade" id="ModalLong{{ $promotion->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <!-- form -->
                <div class="col-12">
                    <form class="card" action="{{ route('admin.modifier.promotion', ['promotion' => $promotion]) }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="card-body">
                            <div class="modal-header">
                                <h5 class="modal-title">Modifier la promotion {{ $promotion->titre }} </h5>   
                            </div>

                            <div class="form-group">
                                <label for="example-text-input-lg" class="col-form-label">Titre</label>
                                <input class="form-control form-control-lg" type="text" name="titre" value="{{ $promotion->titre }}" id="example-text-input-lg">
                                {!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-date-input" class="col-form-label">Start date</label>
                                        <input class="form-control" type="date" name="start_date" value="{{ $promotion->end_date }}" id="example-date-input">
                                        {!! $errors->first('start_date', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-time-input" class="col-form-label">End date</label>
                                        <input class="form-control" type="date" name="end_date" value="{{ $promotion->end_date }}" id="example-time-input">
                                        {!! $errors->first('end_date', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-date-input" class="col-form-label">Produit de la promo</label>
                                        <select class="custom-select" name="produit">
                                            <option value="{{ $promotion->produit_id }}" selected="selected">{{ $promotion->Produit->type }}</option>
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
                                        <input class="form-control" type="number" name="pourcentage" value="{{ $promotion->pourcetage_promo }}" id="example-time-input">
                                        {!! $errors->first('pourcentage', '<small class="help-block">:message</small>') !!}
                                    </div>
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