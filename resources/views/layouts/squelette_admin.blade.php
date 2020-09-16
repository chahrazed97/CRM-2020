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
                    <h4><a href="{{ route('admin.home') }}" style="color: white;">CRM Solution</a></h4>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="{{ route('admin.home') }}" aria-expanded="true"><i class="ti-dashboard"></i><span>Tableau de bord</span></a>
                                
                            </li>
                            <li>
                                <a href="{{ route('list.clients') }}" aria-expanded="true"><i class="fa fa-user-plus"></i><span>Clients</span></a>
                            </li>
                            <li>
                                <a href="{{ route('list.prospects') }}" aria-expanded="true"><i class="fa fa-user"></i><span>Prospects</span></a>
                            </li>
                            <li>
                                <a href="{{ route('Employees') }}" aria-expanded="true"><i class="fa fa-users"></i><span>Employes</span></a> 
                            </li>
                            <li>
                                <a href="{{ route('list.produits') }}" aria-expanded="true"><i class="fa fa-cubes"></i><span>Produits</span></a>
                            </li>
                            <li>
                                <a href="{{ route('list.promotions') }}" aria-expanded="true"><i class="fa fa-bullhorn"></i><span>Promotions</span></a>
                            </li>
                            <li><a href="{{ route('list.evenements') }}"><i class="fa fa-object-group"></i> <span>Evénements</span></a></li>
                            <li><a href="{{ route('list.actionMarketing') }}"><i class="ti-target"></i> <span>Actions marketings</span></a></li>
                            <li>
                            <li><a href="javascript:void(0)" class="offset2"  aria-expanded="true"><i class="fa fa-cogs"></i><span >Paramétres compte</span></a></li>
                            </li>
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
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            
                           <!-- <li class="dropdown">
                                <i class="fa fa-envelope-o dropdown-toggle" data-toggle="dropdown"><span>3</span></i>
                                <div class="dropdown-menu notify-box nt-enveloper-box">
                                    <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                                    <div class="nofity-list">
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb">
                                                <img src="assets/images/author/author-img1.jpg" alt="image">
                                            </div>
                                            <div class="notify-text">
                                                <p>Aglae Mayer</p>
                                                <span class="msg">Hey I am waiting for you...</span>
                                                <span>3:15 PM</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb">
                                                <img src="assets/images/author/author-img2.jpg" alt="image">
                                            </div>
                                            <div class="notify-text">
                                                <p>Aglae Mayer</p>
                                                <span class="msg">When you can connect with me...</span>
                                                <span>3:15 PM</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb">
                                                <img src="assets/images/author/author-img3.jpg" alt="image">
                                            </div>
                                            <div class="notify-text">
                                                <p>Aglae Mayer</p>
                                                <span class="msg">I missed you so much...</span>
                                                <span>3:15 PM</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb">
                                                <img src="assets/images/author/author-img4.jpg" alt="image">
                                            </div>
                                            <div class="notify-text">
                                                <p>Aglae Mayer</p>
                                                <span class="msg">Your product is completely Ready...</span>
                                                <span>3:15 PM</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb">
                                                <img src="assets/images/author/author-img2.jpg" alt="image">
                                            </div>
                                            <div class="notify-text">
                                                <p>Aglae Mayer</p>
                                                <span class="msg">Hey I am waiting for you...</span>
                                                <span>3:15 PM</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb">
                                                <img src="assets/images/author/author-img1.jpg" alt="image">
                                            </div>
                                            <div class="notify-text">
                                                <p>Aglae Mayer</p>
                                                <span class="msg">Hey I am waiting for you...</span>
                                                <span>3:15 PM</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb">
                                                <img src="assets/images/author/author-img3.jpg" alt="image">
                                            </div>
                                            <div class="notify-text">
                                                <p>Aglae Mayer</p>
                                                <span class="msg">Hey I am waiting for you...</span>
                                                <span>3:15 PM</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li> -->
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
                            <h4 class="page-title pull-left"> @yield('titre') </h4>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="{{ asset('assets/images/author/avatar.png') }}" alt="avatar">
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
                                            <input class="form-control" type="text"id="phone" name="phone" placeholder="" value="{{ Auth::user()->phone }}" id="example-date-input" min="9" max="11" required>
                                        </div>
                                    </div>
                                </div>
                                <small class="help-block" id="phone_err" style="color : red;"></small>
                            </div>
                            <div class="col-12">
                                <div class="form-group ">
                                    <label for="example-date-input" class="col-form-label">changer e-mail</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                                            </div>
                                            <input class="form-control" type="text" id="email" name="email" placeholder="" value="{{ Auth::user()->email }}" id="example-date-input" required>
                                        </div>
                                    </div>
                                </div>
                                <small class="help-block" id="email_err" style="color : red;"></small>
                            </div>
                            <div class="col-12">
                                <div class="form-group ">
                                    <label for="example-date-input" class="col-form-label">changer mot de passe</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-unlock-alt"></i></div>
                                            </div>
                                            <input class="form-control" type="password" id="old_psw" name="old_psw" placeholder="mot de passe actuelle" value="" id="example-date-input">
                                        </div>
                                    </div>
                                </div>
                                <small class="help-block" id="old_err" style="color : red;"></small>
                            </div>
                            <div class="col-12">
                                <div class="form-group ">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-unlock-alt"></i></div>
                                            </div>
                                            <input class="form-control" type="password" id="new_psw" name="new_psw" placeholder="nouveau mot de passe" value="" id="example-date-input" >
                                        </div>
                                    </div>
                                </div>
                                <small class="help-block" id="new_err" style="color : red;"></small>
                            </div>
                            <div class="col-12">
                                <div class="form-group ">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-unlock-alt"></i></div>
                                            </div>
                                            <input class="form-control" type="password" id="confirm_new_psw" name="confirm_new_psw" placeholder="confirmer nouveau mot de passe" value="" id="example-date-input" >
                                        </div>
                                    </div>
                                </div>
                                <small class="help-block" id="confirm_err" style="color : red;"></small>
                            </div>
                            <button type="" id="sub_compte" onclick="myFunction()" class="btn btn-rounded btn- btn-sm right">Changer</buttom>
                            <script>
                            function myFunction() {
                                var phone = document.getElementById('phone');
                                var email = document.getElementById("email");
                                var old_psw = document.getElementById("old_psw");
                                var new_psw = document.getElementById("new_psw");
                                var confirm_new_psw = document.getElementById("confirm_new_psw");
 
  
                                if (!phone.checkValidity()) {
                                document.getElementById("phone_err").innerHTML = phone.validationMessage;
                                }
                                if (!email.checkValidity()) {
                                document.getElementById("email_err").innerHTML = email.validationMessage;
                                }
                                if (!old_psw.checkValidity()) {
                                document.getElementById("old_err").innerHTML = old_psw.validationMessage;
                                }
                                if (!new_psw.checkValidity()) {
                                document.getElementById("new_err").innerHTML = new_psw.validationMessage;
                                }
                                if (!confirm_new_psw.checkValidity()) {
                                document.getElementById("confirm_err").innerHTML = confirm_new_psw.validationMessage;
                                } else{
                                document.getElementById("sub_compte").type = "submit";
                                } 
                            } 
                            </script>
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
    @yield('chart')
    @yield('script')

    <!-- others plugins -->
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>

</body>

</html>
