<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CRM 2020</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.min.css')}}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    @yield('CRMaccueil_CSS')
    <!-- others css -->
    <link rel="stylesheet" href="{{asset('assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/default-css.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @yield('ajax') 
    @yield('ajax2')
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.html"><img src="{{ asset('assets/images/icon/logo.png')}}" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="{{ route('CRMaccueil') }}" aria-expanded="true"><i class="fa fa-home"></i><span>Home</span></a>
                                
                            </li>
                            <li>
                                <a href="{{ route('MesActivites') }}" aria-expanded="true"><i class="fa fa-calendar-check-o"></i><span>Mes activités</span></a>
                            </li>
                            <li>
                                <a href="{{ route('Clients') }}" aria-expanded="true"><i class="fa fa-user-plus"></i><span>Clients</span></a>
                            </li>
                            <li>
                                <a href="{{ route('Prospects') }}" aria-expanded="true"><i class="fa fa-user"></i><span>Prospects</span></a>
                                
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-comments-o"></i><span>Mes conversations</span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route('mesConversation') }}">Concersations client</a></li>
                                    <li><a href="{{ route('Conversation.prospect') }}">conversations prospect</a></li>
                                    <li><a href="{{ route('Conversation.equipe') }}">conversations équipe</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('OurTeam') }}" aria-expanded="true"><i class="fa fa-users"></i><span>Mon équipe</span></a>
                            </li>
                           <li><a href="javascript:void(0)" class="offset2"  aria-expanded="true"><i class="fa fa-cogs"></i><span >Paramétres compte</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
                    <!-- profile info & task notification  ti-bell dropdown-toggle-->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            <li class="dropdown">
                            <?php  
                                $nbr_clients = Session::get('nbrClient');
                                $nbr_prospects = Session::get('nbrProspect');
                                        
                                $nbr_totale = $nbr_clients + $nbr_prospects;
                            ?>
                                <i class="ti-bell dropdown-toggle" data-toggle="dropdown"><span>{{ $nbr_totale }}</span></i>
                                <div class="dropdown-menu notify-box nt-enveloper-box">
                                    <span class="notify-title">Vous avez {{ $nbr_totale }} e-mail(s)</span>
                                    <div class="nofity-list">
                                    @for ($i=0; $i< $nbr_clients; $i++)
                                     @if (Session::has('msgClient'.$i)){
                                      <?php $msg_client = Session::get('msgClient'.$i); ?>
                                        <a href="{{ route('conversation.client', [ 'client' => $msg_client->clients ]) }}" class="notify-item">
                                        <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                            <div class="notify-text">
                                                <p>De: {{ $msg_client->clients->nom.' '.$msg_client->clients->prenom }}</p>
                                                <span class="msg">{{ $msg_client->subject }}</span>
                                                <span>{{ $msg_client->created_at }}</span>
                                            </div>
                                        </a>
                                     
                                      @endif
                                    @endfor
                                    
                                    @for ($i=0; $i< $nbr_prospects; $i++)
                                     @if (Session::has('msgProspect'.$i)){
                                      <?php $msg_prospect = Session::get('msgProspect'.$i); ?>
                                        <a href="{{ route('conversation.prospect', [ 'prospect' => $msg_prospect->Prospect ]) }}" class="notify-item">
                                        <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                            <div class="notify-text">
                                                <p>De: {{ $msg_prospect->Prospect->nom.' '.$msg_prospect->Prospect->prenom }}</p>
                                                <span class="msg">{{ $msg_prospect->subject }}</span>
                                                <span>{{ $msg_prospect->created_at }}</span>
                                            </div>
                                        </a>
                                     
                                      @endif
                                    @endfor
                                    </div>
                                </div>
                            </li>
                            <?php  
                                $nbr_emps = Session::get('nbrEmp');
                            ?>
                            <li class="dropdown">
                                <i class="fa fa-envelope-o dropdown-toggle" data-toggle="dropdown"><span>{{ $nbr_emps }}</span></i>
                                <div class="dropdown-menu notify-box nt-enveloper-box">
                                    <span class="notify-title">Vous avez {{ $nbr_emps }} message(s)</span>
                                    <div class="nofity-list">
                                    @for ($i = 0; $i<$nbr_emps; $i++)
                                      @if (Session::has('msgEmp'.$i)){ 
                                        <?php $msg_Emp = Session::get('msgEmp'.$i);
                                              $employe = App\models\Employees::where('id', '=', $msg_Emp->send_emp_id)->first();  ?>
                                        <a href="{{ route('conversation.employe', ['employe' => $employe]) }}" class="notify-item">
                                        <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                            <div class="notify-text">
                                                <p>De: {{ $employe->nom.' '.$employe->prenom }}</p>
                                                <span class="msg">{{ $msg_Emp->msg }}</span>
                                                <span>{{ $msg_Emp->created_at }}</span>
                                            </div>
                                        </a>
                                      @endif 
                                    @endfor
                                    </div>
                                </div>
                            </li>
                            <li class="settings-btn">
                                <i class="ti-settings"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">@yield('titre')</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="{{asset('assets/images/author/avatar.png')}}" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->nom.' '.Auth::user()->prenom }}<i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                
                                <a class="dropdown-item" href="{{ route('logout') }}">Déconnecter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
        
        
                <!-- contenu ici -->
                 @yield('contenu')
                <!-- end contenu -->
           
        </div>
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Master Informatique 2020 Ummto.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    <div class="offset-area">
        <div class="offset2 offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            <li><a class="active" data-toggle="tab" href="#activity">Profile</a></li>
            <li><a data-toggle="tab" href="#settings">Paramétres</a></li>
        </ul>
        <div class="offset-content tab-content">
            <div id="activity" class="tab-pane fade in show active">
                <div class="recent-activity">
                    <!-- profile -->
                    <div class="card-body text-center">
                        <p><img class=" img-fluid" src="{{ asset('img/employe.png') }}"></p>
                        <h4 class="card-title">{{ Auth::user()->nom.' '.Auth::user()->prenom }}</h4>
                
                    <p class="card-text"><b>Mon e-mail :</b> {{ Auth::user()->email }}</p>
                    <p class="card-text"><b>Mon numéro :</b> {{ Auth::user()->phone }}</p>
                    <p class="card-text"><b>Ma fonction :</b> {{ Auth::user()->role }}</p>
                </div>
                    <!-- end profile -->
                </div>
            </div>
            <div id="settings" class="tab-pane fade">
                <div class="offset-settings">
                    <h4>Paramétre général</h4>
                    <div class="settings-list">
                       <!-- parametre -->
                       <form class="card-body" action="{{ route('login.update') }}" method="post">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-12">
                                <div class="form-group ">
                                    <label for="example-date-input" class="col-form-label">changer numéro de téléphone</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                            </div>
                                            <input class="form-control" type="text" name="phone" placeholder="" value="{{ Auth::user()->phone }}" id="example-date-input" required>
                                        </div>
                                    </div>
                                </div>
                                <small class="help-block" style="color : red;"></small>
                            </div>
                            <div class="col-12">
                                <div class="form-group ">
                                    <label for="example-date-input" class="col-form-label">changer e-mail</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                                            </div>
                                            <input class="form-control" type="text" name="email" placeholder="" value="{{ Auth::user()->email }}" id="example-date-input" required>
                                        </div>
                                    </div>
                                </div>
                                <small class="help-block" style="color : red;"></small>
                            </div>
                            <div class="col-12">
                                <div class="form-group ">
                                    <label for="example-date-input" class="col-form-label">changer mot de passe</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-unlock-alt"></i></div>
                                            </div>
                                            <input class="form-control" type="password" name="old_psw" placeholder="mot de passe actuelle" value="" id="example-date-input">
                                        </div>
                                    </div>
                                </div>
                                <small class="help-block" style="color : red;"></small>
                            </div>
                            <div class="col-12">
                                <div class="form-group ">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-unlock-alt"></i></div>
                                            </div>
                                            <input class="form-control" type="password" name="new_psw" placeholder="nouveau mot de passe" value="" id="example-date-input" >
                                        </div>
                                    </div>
                                </div>
                                <small class="help-block" style="color : red;"></small>
                            </div>
                            <div class="col-12">
                                <div class="form-group ">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-unlock-alt"></i></div>
                                            </div>
                                            <input class="form-control" type="password" name="confirm_new_psw" placeholder="confirmer nouveau mot de passe" value="" id="example-date-input" >
                                        </div>
                                    </div>
                                </div>
                                <small class="help-block" style="color : red;"></small>
                            </div>
                            <button type="submit" class="btn btn-rounded btn- btn-sm right">Changer</buttom>
                        </form>
                       <!-- fin parametre -->
                    </div>
                </div>
            </div>
            <!-- fin test contenu -->
        </div>  
    </div>    

     <!-- jquery latest version -->
    <script src="{{asset('assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slicknav.min.js')}}"></script>
  
    @yield('javascript') 
    @yield('script')
    <!-- others plugins -->
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>

  @yield('scriptCalendar')
  @yield('scripts')

</body>

</html>
