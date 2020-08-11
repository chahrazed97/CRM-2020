@extends('layouts.base')
@section('title', 'Activités Dashboard')
@section('content')
<div class="container">
<div class="row">
        <h4 class="page-header"><div class="crush">Mes activités</div></h4>
</div>
@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
<div class="row">
    <div class="col-md-3">
        <div class="card"> <img class="img-fluid" src="http://grafreez.com/wp-content/temp_demos/river/img/politics.jpg" alt="">
                <div class="card-img-overlay"> <span class="badge badge-pill badge-danger">News</span> </div>
                <div class="card-body">
            <div class="news-title">
                    <h2 class=" title-small"><a href="#">Syria war: Why the battle for Aleppo matters</a></h2>
                  </div>
            <p class="card-text"><small class="text-time"><em>3 mins ago</em></small></p>
          </div>
    </div>
</div>
<div class="col-md-3">
        <div class="card"> <img class="img-fluid" src="http://grafreez.com/wp-content/temp_demos/river/img/politics.jpg" alt="">
                <div class="card-img-overlay"> <span class="badge badge-pill badge-danger">News</span> </div>
                <div class="card-body">
            <div class="news-title">
                    <h2 class=" title-small"><a href="#">Syria war: Why the battle for Aleppo matters</a></h2>
                  </div>
            <p class="card-text"><small class="text-time"><em>3 mins ago</em></small></p>
          </div>
    </div>
</div>

<div class="col-md-3">
        <div class="card"> <img class="img-fluid" src="http://grafreez.com/wp-content/temp_demos/river/img/politics.jpg" alt="">
                <div class="card-img-overlay"> <span class="badge badge-pill badge-danger">News</span> </div>
                <div class="card-body">
            <div class="news-title">
                    <h2 class=" title-small"><a href="#">Syria war: Why the battle for Aleppo matters</a></h2>
                  </div>
            <p class="card-text"><small class="text-time"><em>3 mins ago</em></small></p>
          </div>
    </div>
</div>
<div class="col-md-3">
        <div class="card"> <img class="img-fluid" src="http://grafreez.com/wp-content/temp_demos/river/img/politics.jpg" alt="">
                <div class="card-img-overlay"> <span class="badge badge-pill badge-danger">News</span> </div>
                <div class="card-body">
            <div class="news-title">
                    <h2 class=" title-small"><a href="#">Syria war: Why the battle for Aleppo matters</a></h2>
                  </div>
            <p class="card-text"><small class="text-time"><em>3 mins ago</em></small></p>
          </div>
    </div>
</div>
<div class="col-md-3">
        <div class="card"> <img class="img-fluid" src="http://grafreez.com/wp-content/temp_demos/river/img/politics.jpg" alt="">
                <div class="card-img-overlay"> <span class="badge badge-pill badge-danger">News</span> </div>
                <div class="card-body">
            <div class="news-title">
                    <h2 class=" title-small"><a href="#">Syria war: Why the battle for Aleppo matters</a></h2>
                  </div>
            <p class="card-text"><small class="text-time"><em>3 mins ago</em></small></p>
          </div>
    </div>
</div>
</div>

              
</div>
   

    <div class="row">
        <div class="col-md-7">
        
            <div class="table-responsive">
            
                <table class="table table-sm table-hover">
                  <thead class="thead-default">
                  
                    <tr class="add-category-row">
                      <th style="width: 30px;">
                         
                      </th>
                      
                     
                      <th colspan="2">Mes activités pour aujoud'hui 
                      <button class="btn-view-fund btn btn-default btn-xs  pull-right" type="button" data-toggle="modal" data-target="#AjoutModal">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                      </button>  
                      <!-- Modal -->
<div class="modal fade" id="AjoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Appel/email</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Rendez_vous</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active text-align form-new" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Ajouter un appel</h3>
                            <div class="row register-form">
                                <div class="col-md-12">
                                <form class="needs-validation" novalidate="" action="{{ URL::to('test.store' ) }}" method="put">
                                    <div class="form-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Titre</label>
                                                    <input type="text" name="titre" class="form-control" placeholder="Ajouter un titre" value=""/>
                                                     {!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
                                                </div>
                                           </div>

                                           <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input type="date" name="date" class="form-control" placeholder="Choisir une date" value=""/>
                                                     {!! $errors->first('date', '<small class="help-block">:message</small>') !!}
                                                </div>
                                           </div>

                                           <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Heure</label>
                                                    <input type="time" name="time" class="form-control" placeholder="Choisir l'heure" value=""/>
                                                     {!! $errors->first('time', '<small class="help-block">:message</small>') !!}
                                                </div>
                                           </div>

                                           <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Recepteur</label>
                                                    <input list="browsers" class="form-control" name="client" placeholder="Choisir un client" value=""/>
                                                    <datalist id="browsers">
                                                   
                                                    @foreach ($clientlist as $clients)
                                                   
                                                    <option value="{!! $clients->id !!}"></option>
                                                    @endforeach
                                                    </datalist>
                                                    {!! $errors->first('client', '<small class="help-block">:message</small>') !!}
                                                </div>
                                           </div>

                                           <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <input type="text" name="description" class="form-control" placeholder="Ajouter une description" value=""/>
                                                     {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
                                                </div>
                                           </div>

                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show text-align form-new" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <h3  class="register-heading">Rendez_vous</h3>
                            <div class="row register-form">
                            <div class="col-md-12">
                                    <form method="post">
                                    <div class="form-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Titre</label>
                                                    <input type="text" name="titre2" class="form-control" placeholder="Ajouter un titre" value=""/>
                                                     {!! $errors->first('titre2', '<small class="help-block">:message</small>') !!}
                                                </div>
                                           </div>

                                           <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input type="date" name="date2" class="form-control" placeholder="Choisir une date" value=""/>
                                                     {!! $errors->first('date2', '<small class="help-block">:message</small>') !!}
                                                </div>
                                           </div>

                                           <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Heure</label>
                                                    <input type="time" name="time2" class="form-control" placeholder="Choisir l'heure" value=""/>
                                                     {!! $errors->first('time2', '<small class="help-block">:message</small>') !!}
                                                </div>
                                           </div>

                                           <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Recepteur</label>
                                                    <input list="browsers" class="form-control" name="client2" placeholder="Choisir un client" value=""/>
                                                    <datalist id="browsers">
                                                    
                                                   
                                                    @foreach ($clientlist as $clients) 
                                                    
                                                    <option value="{!! $clients->nom !!}"></option>
                                                    @endforeach
                                                    </datalist>
                                                    {!! $errors->first('client2', '<small class="help-block">:message</small>') !!}
                                                </div>
                                           </div>

                                           <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <input type="text" name="description2" class="form-control" placeholder="Ajouter une description" value=""/>
                                                     {!! $errors->first('description2', '<small class="help-block">:message</small>') !!}
                                                </div>
                                           </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
                      </th>
                      
                      <th style="width: 70px;"></th>
                        
                    </tr>
                </thead>

                <tbody>

                @foreach ($activites as $activite)
                    <tr>
                        <td>
                            <button class="btn-view-fund btn btn-default btn-xs  pull-left" type="button" data-toggle="modal" data-target="#exampleModal">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </button>   
                            <!--**********MODAL MODIER ACTIVITE*****************-->
                            <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modier l'activité</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
            
                <div class="note">
                    <p>Modifier l'activité</p>
                </div>
                <form class="needs-validation" novalidate="" action="{{ URL::to('test/'.$activite->id.'/update' ) }}" method="put">
                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Titre</label>
                                <input type="text" name="titre" class="form-control" placeholder="{{ $activite->titre }}" value=""/>
                                {!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div class="form-group">
                             
                                <label>Type activités</label>
                                
                                <select id="ddl" class="form-control" name="type">
                                <option value="" disabled selected hidden>{{ $activite->type_activite }}</option>
                                <option value="email">Envoyer e_mail</option>
                                <option value="appel">appel</option>
                                <option value="rendez-vous">Rendez_vous</option>
                                
                                </select>
                                {!! $errors->first('type', '<small class="help-block">:message</small>') !!}
                               
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                 <label>Date</label>
                                 <?php $date=$activite->date_act;
                                $date = new DateTime($date);
                                $date1 = $date->format("d-M-Y"); ?>
                                <input placeholder="{{ $date1 }}" class="form-control" type="text" name="date" onfocus="(this.type='date')" id="date">
                                {!! $errors->first('date', '<small class="help-block">:message</small>') !!}
                                
                            </div>
                            <div class="form-group">
                            <label>Heure</label>
                            <?php $date2 = $date->format("H:i"); ?>
                            <input placeholder="{{ $date2 }}" class="form-control" type="text" name="heure" onfocus="(this.type='time')" id="date">
                            {!! $errors->first('heure', '<small class="help-block">:message</small>') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                 <label>
                                 @if ( $activite->type_activite == 'rendez-vous')
                                 client Invité
                                 @else
                                 Recepteur
                                 @endif</label>
                                 <?php $client = App\models\Activite::find($activite->id)->clients; ?>
                                <input list="browsers" class="form-control" name="client" placeholder="{{ $client->nom }}" value=""/>
                                <datalist id="browsers">
                                

                                 @foreach ($clientlist as $clients) {
                              
                                <option value="{!! $clients->id !!}">{!! $clients->nom !!}</option>
                                @endforeach
                                </datalist>
                                {!! $errors->first('client', '<small class="help-block">:message</small>') !!}
                            </div>
                            @if ( $activite->type_activite == 'rendez-vous' )
                            <div class="form-group">
                            <label>Localisation</label>
                                <input type="text" class="form-control" name="localisation" id="inputToDisplay" placeholder="Confirm Password *" value="" style="display:none"/>
                                {!! $errors->first('localisation', '<small class="help-block">:message</small>') !!}
                            </div>
                            @endif
                        </div>
                    </div>
                   
                </div>
            </div>
       
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
      </form>
    </div>
  </div>
</div>
                            <!--************FIN MODAL MODIFIER ACTIVITE*************** -->
                        </td>

                        <td colspan="2">{!! $activite->titre !!}</br>{!! $activite->type_activite !!}, {!! $activite->date_act !!}</td>
                        <td style="text-align: right;">
                            <button class="btn-view-fund btn btn-default btn-xs" type="button" data-toggle="modal" data-target="#{!! $activite->id !!}">
                                <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                            </button> 
                            <!-- MODAL ACTIVITE DETAILLE -->
<div class="modal fade" id="{!! $activite->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{!! $activite->titre !!}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="tile">
                    <div class="wrapper">
                        <div class="header">{!! $activite->titre !!}</div>

                       

                        <div class="dates">
                            <div class="start">
                                <strong>STARTS</strong>{!! $date1 !!}
                                <span></span>
                            </div>
                            <div class="ends">
                                <strong>Heure</strong>{!! $date2 !!}
                            </div>
                        </div>

                        <div class="stats">

                            <div>
                                <?php $employe = App\models\Activite::find($activite->id)->Employees; ?>
                                <strong>Organisateur</strong>{!! $employe->nom.' '.$employe->prenom !!}
                            </div>

                            <div>
                                
                                <strong>L'invité</strong>{!! $client->nom.' '.$client->prenom !!}</br>
                                @if ( $activite->type_activite == 'appel')
                                    <p>{!! $client->phone !!}</p>
                                
                                @elseif ( $activite->type_activite == 'email')
                                    <p>{!! $client->email !!}</p>
                                @endif
                            </div>

                            <div>
                                <strong>
                                @if ( $activite->type_activite == 'appel')
                                <a href="#">Appler</a>
                                @elseif ( $activite->type_activite == 'email')
                                <a href="#">Envoyer l'e-mail</a>
                                @else
                                localisation
                                @endif
                                </strong>
                            </div>

                        </div>

                      

                        <div class="footer">
                        <div class="row">
                        
                            @if ( $activite->type_activite == 'rendez-vous')
                            <a href="#" class="Cbtn Cbtn-primary">Marquer comme terminé</a>
                            @endif
                            <a href="#" class="Cbtn Cbtn-primary">Modifier</a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['test/destroy', $activite->id]]) !!}
									          {!! Form::submit('Annuler', ['class' => 'btn btn-danger', 'onclick' => 'return confirm(\'etes vous sur de vouloir supprimer cet activité ?\')']) !!}
								            {!! Form::close() !!}
                            
                            
                        </div>
                        </div>
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

                            <button class="btn-view-fund btn btn-default btn-xs" type="button">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </button>     
                        </td>
                    </tr>
                @endforeach  
                   
               
 

                  
                </tbody>
                </table>
    
            </div>
        </div>
        <div class="col-md-5">
        <div class="search-list">
                <h4>Résumé d'aujourd'hui</h4>
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>ouvert</th>
                            <th>Terminé</th>
                        </tr>
                    </thead>
                    <tbody>
                       <!--where(DATE('date_act'), '=', NOW())-->
                        <!-- select type_activite, count(id) as activite_count from activites where DATE(date_act) = CURRENT_DATE() group by type_activite -->
                        <?php
                        
                        use Carbon\Carbon;
                        $rendez_vou_planifie = App\models\Activite::
                        select('type_activite', DB::raw('count(id) as activite_count'))
                        ->whereDate('date_act', '=', Carbon::today()->toDateString())
                        ->where('type_activite','=', 'rendez_vous')
                        ->where('status', '=', 'planifié')
                        ->groupBy('type_activite')
                        ->get();
                        $activite1 = $rendez_vou_planifie ;

                        $rendez_vous_termine = App\models\Activite::
                        select('type_activite', DB::raw('count(id) as activite_count'))
                        ->whereDate('date_act', '=', Carbon::today()->toDateString())
                        ->where('type_activite','=', 'rendez_vous')
                        ->where('status', '=', 'terminé')
                        ->groupBy('type_activite')
                        ->get();
                        $activite2 = $rendez_vous_termine ;
                        ?>
                        
                        

                    <tr>
                        <td>Rendez_vous</td>
                        <td></td>
                        <td></td>
                    </tr>

                      
                   
                    </tbody>
                </table>

            </div>
            <div class="card mt-3 tab-card">
        <div class="card-header tab-card-header">
          <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Mes Liens rapides</a>
            </li>
           
          </ul>
        </div>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
            <h5 class="card-title">Lien 1</h5>
           
            <a href="#" class="btn btn-primary">Ajouter un lien</a>              
          </div>
         

            </div>
    </div>    
        
    
</div>




@endsection
@section('script')
<script>
        var select = document.getElementById( "ddl" )
        select.addEventListener( "change", function ( e )
        {
            var input = document.getElementById( "inputToDisplay" )
 
            if ( e.target.value == "rendez-vous" )
                input.style.display = "inline-block"
               
            else
                input.style.display = "none"
        } )
    </script>
@endsection