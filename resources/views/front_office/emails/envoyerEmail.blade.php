@if(session()->has('ok'))
	<div class="alert alert-success alert-dismissible">{!! session()->get('ok') !!}</div>
@endif


<a href="{{ route('send.email') }}">Envoyer</a>