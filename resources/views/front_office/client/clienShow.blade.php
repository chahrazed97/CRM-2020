@extends('layouts.base')
@section('title', 'List client/ show client')
@section('content')

<div class="main-content-inner">
                <div class="card-area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 mt-5">
                            <div class="card card-bordered">
                                <h4>Informations sur le client {{  $client->full_name }}</h4>
                                <div class="card-body">
                                   
                                    <p class="card-text">Name: {{$client->full_name}}</p>
                                    <p class="card-text">Email: {{$client->email}}</p>
                                    <p class="card-text">Phone: {{$client->phone}}</p>
                                    <p class="card-text">budget: {{$client->budget}}</p>
                                    <p class="card-text">section: {{$client->section}}</p>
                                    <p class="card-text">location: {{$client->location}}</p>
                                    <p class="card-text">country: {{$client->country}}</p>
                                    <p class="card-text">city: {{$client->city}}</p>
                                    <p class="card-text">zip: {{$client->zip}}</p>
                                        
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