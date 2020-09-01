<div class="col-12 mt-1">
    <form id="lienForm" action="{{ route('accueil.lien.ajouter') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
            <div class="col-12">
                <div class="form-group ">
                    <label for="example-date-input" class="col-form-label">Titre</label>
                    <div class="form-group has-error">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-tag"></i></div>
                            </div>
                            <input class="form-control" type="text" name="titre" placeholder="ajouter un titre au lien" value="{{ old('titre') }}" id="example-date-input">
                           
                        </div>
                    </div>
                </div>
                <small class="help-block" style="color : red;"></small>
            </div>

            <div class="col-12">
                <div class="form-group ">
                    <label for="example-date-input" class="col-form-label">Lien</label>
                    <div class="form-group has-error">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-globe"></i></div>
                            </div>
                            <input class="form-control" type="text" name="url" placeholder="https://example.com" value="{{ old('url') }}" id="example-date-input" required>
                            
                        </div>
                    </div>
                </div>
                <small class="help-block" style="color : red;"></small>
            </div>

            <button type="submit" class="btn btn-rounded btn- btn-sm right">Ajouter</buttom>
        
    </form>
</div>

<script>

$(function(){

    $(document).on('submit', '#lienForm', function(e) {  
        e.preventDefault();
         
        $('input+small').text('');
        $('input').parent().removeClass('has-error');
         
        $.ajax({
            method: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json"
        })
        .done(function(data) {
            $('.alert-success').removeClass('hidden');
            $('#dropdown-menu').modal('hide');
        })
        .fail(function(data) {
            $.each(data.responseJSON, function (key, value) {
                var input = '#lienForm input[name=' + key + ']';
                $(input + '+small').text(value);
                $(input).parent().addClass('has-error');
            });
        });
    });

})

</script>


            