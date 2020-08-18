@extends('layouts.squelette')
@section('CRMaccueil_CSS')
<link rel="stylesheet" href="{{asset('CSS_bootsnipp/our_team.css')}}">
 
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

@endsection

@section('contenu')
<div class="main-content-inner">
@if(session()->has('ok'))
	<div class="alert alert-success alert-dismissible">{!! session()->get('ok') !!}</div>
@endif
    <div class="row">
    <!-- Team -->
        <section id="team" class="col-12 mt-4">
            <div class=" col-lg-12 mt-2">
                <h6 class="section-title h1">notre équipe</h6>
                <div class="row">
                @foreach ( $membres as $membre)
                <!-- Team member -->
                    <div class="col-4" mt-5">
                        <div class="image-flip" >
                            <div class="mainflip flip-0">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p><img class=" img-fluid" src="{{ asset('img/employe.png') }}"></p>
                                            <h4 class="card-title">{{ $membre->nom.' '.$membre->prenom }}</h4>
                                            <p class="card-text">{{ $membre->role }}</p>
                                            <a href="https://www.fiverr.com/share/qb8D02" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="backside col-12">
                                    <div class="card">
                                        <div class="card-body text-center mt-4">
                                        <h4 class="card-title">{{ $membre->nom.' '.$membre->prenom }}</h4>
                                        <p class="card-text"><b>E-mail : </b>{{ $membre->email }}</br>
                                                            <b>Télephone :</b>{{ $membre->phone }}</br>
                                                            <b>Fonction :</b>{{ $membre->role }} </p>
                                        <button class="btn btn-rounded btn- btn-sm right mt-1" data-toggle="modal" data-target="#ModalLong{{ $membre->phone }}">contacter</button>
                                        <!-- Modal -->
                                        
                                       </div>
                                    </div>
                                </div>
                            </div>
                       </div>
                   </div>
                <!-- ./Team member -->
                <!--modal contacter-->
                @include('front_office.Our_team.contacter_employe_modal')
                @endforeach
                
            </div>
        </div>
    </section>
    <!-- Team -->
   
</div>
</div>
@endsection