@extends('layouts.squelette')
@section('contenu')
<div class="row">
<div class="col-4">
    
</div>
<div class="col-8">
<form class="card-body">
<select onchange="textarea1.style.fontSize = this.value;">
     <option value="11px" selected="selected">11px</option>
     <option value="12px">12px</option>
     <option value="14px">14px</option>
     <option value="16px">16px</option>
     <option value="18px">18px</option>
     <option value="20px">20px</option>
</select>
<select id ="ddl" onchange="textarea1.style.fontFamily  = this.value;">
     <option value="" selected="selected">normal</option>
     <option value="Montserrat">Montserrat</option>
     <option value="sans-serif">sans-serif</option>
     <option value="Open Sans">Open Sans</option>
</select>
<select onchange="textarea1.style.color = this.value;">
     <option value="#111111" selected="selected">Black</option>
     <option value="#ff0000">red</option>
     <option value="#00ff00 ">green</option>
     <option value="#226dca">blue</option>
     <option value="#8811c5">violet</option>
</select>
<select id ="ddl" onchange="textarea1.style.textAlign  = this.value;">
     <option value="" selected="selected">normal</option>
     <option value="center">center</option>
</select>
     
<select id ="ddl" onchange="textarea1.style.textDecoration  = this.value;">
     <option value="" selected="selected">non souligné</option>
     <option value="underline">souligné</option>
</select>
<select id ="ddl" onchange="textarea1.style.fontStyle  = this.value;">
     <option value="normal" selected="selected">non italic</option>
     <option value="italic">italic</option>
</select>
<select id ="ddl" onchange="textarea1.style.fontWeight  = this.value;">
     <option value="" selected="selected">normal</option>
     <option value="bold">bold</option>
</select>
</br>
<textarea id="textarea1" cols="92" rows="15" tabindex="101" data-min-length=""></textarea></br>
<button type ="submit">Envoyer</button>
<button type="reset">Annuler</button>
</form>
</div>
</div>

               
@endsection