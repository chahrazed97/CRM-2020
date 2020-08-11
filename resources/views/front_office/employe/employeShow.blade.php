@extends('layouts.base')
@section('title', 'List employes/ show employe')
@section('content')

<div class="main-content-inner">
                <div class="card-area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 mt-5">
                            <div class="card card-bordered">
                                <h4>Informations sur l'employe {{  $employe->full_name }}</h4>
                                <div class="card-body">
                                   
                                    <p class="card-text">Name: {{$employe->full_name}}</p>
                                    <p class="card-text">Email: {{$employe->email}}</p>
                                    <p class="card-text">Phone: {{$employe->phone}}</p>
                                    <p class="card-text">job: {{$employe->job}}</p>
                                    <p class="card-text">note: {{$employe->note}}</p>
                                    <p class="card-text">assigned client: {{$employe->full_name}}</p>
                                   
                                        
                                </div>
                            </div>
                        </div>

                         <!-- Links And Buttons start -->
                    <div class="col-md-6 mt-5">
                        <div class="card">
                            <div class="card-body">
                               
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action active">
                                        Activities
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                                    <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
                                    <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                                    <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Links And Buttons end -->
</div>
</div>
</div>

@endsection