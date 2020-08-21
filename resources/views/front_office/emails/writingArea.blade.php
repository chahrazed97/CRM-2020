
<form action="{{ route('envoie.msg') }}" method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor"></textarea>
<button type="submit">Envoyer</button>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'summary-ckeditor', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
</script>
</form>
