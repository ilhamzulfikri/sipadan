<!DOCTYPE html>
<html lang="en" class="loading">
<!-- BEGIN : Head-->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Sistem Informasi Pengadaan">
  <meta name="keywords" content="Sistem Informasi Pengadaan">
  <meta name="author" content="SIPADAN">
  <title>Sistem Informasi Pengadaan</title>
  <link rel="apple-touch-icon" sizes="60x60" href="app-assets/img/ico/apple-icon-60.png">
  <link rel="apple-touch-icon" sizes="76x76" href="app-assets/img/ico/apple-icon-76.png">
  <link rel="apple-touch-icon" sizes="120x120" href="app-assets/img/ico/apple-icon-120.png">
  <link rel="apple-touch-icon" sizes="152x152" href="app-assets/img/ico/apple-icon-152.png">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/img/ico/favicon.ico')}}">
  <link rel="shortcut icon" type="image/png" href="{{asset('app-assets/img/ico/favicon-32.png')}}">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-touch-fullscreen" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <!-- font icons-->
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/feather/style.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/simple-line-icons/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/perfect-scrollbar.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/prism.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/chartist.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickadate/pickadate.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/switchery.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/selects/select2.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/selectize/selectize.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/selectize/selectize.default.css')}}">
  
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}"> 

  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/selectize/selectize.css')}}">

  <!-- Page plugins -->
  <link rel="stylesheet" href="{{ asset('app-assets/vendors/js/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('app-assets/vendors/js/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('app-assets/vendors/js/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">

  <style type="text/css">
    .table td{ position:relative;}
    .table tr{ position:relative;}
    .table {
     overflow-x: inherit;
   }
 </style>

 <style type="text/css">
  .preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background-color: #fff;
  }
  .preloader .loading {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
    font: 14px arial;
  }
</style>



<!-- END VENDOR CSS-->
<!-- BEGIN APEX CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/app.css') }}">
<!-- END APEX CSS-->
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/wizard.css') }}">
<!-- END Page Level CSS-->
</head>
<!-- END : Head-->

<!-- BEGIN : Body-->
<body data-col="2-columns" class=" 2-columns ">
  <!-- CEK LOGIN -->

  @if(!Session::get('login'))
  <meta http-equiv="refresh" content="0; url=login">
  @endif

  <div class="preloader">
    <div class="loading">
     <div class="spinner-grow text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-grow text-success" role="status">
      <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-grow text-danger" role="status">
      <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-grow text-warning" role="status">
      <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-grow text-info" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
</div>


<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="wrapper">


  <!-- main menu-->
  <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
  <div data-active-color="white" data-background-color="man-of-steel" data-image="app-assets/img/sidebar-bg/01.jpg" class="app-sidebar">
    <!-- main menu header-->
    <!-- Sidebar Header starts-->
    <div class="sidebar-header">
      <div class="logo clearfix"><a href="{{ url('beranda') }}" class="logo-text float-left">
        <div class="logo-img"><img src="{{asset('app-assets/img/logo.png')}}"/></div><span class="text align-middle">SIPADAN</span></a><a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"><i data-toggle="expanded" class="toggle-icon ft-toggle-right"></i></a><a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-x"></i></a></div>
      </div>
      <!-- Sidebar Header Ends-->
      <!-- / main menu header-->
      <!-- main menu content-->
      <div class="sidebar-content">
        <div class="nav-container">
          <ul id="main-menu-navigation" data-menu="menu-navigation" data-scroll-to-active="true" class="navigation navigation-main">
            <li class=" nav-item"><a href="{{ url('beranda') }}"><i class="ft-home"></i><span data-i18n="" class="menu-title">BERANDA</span></a>
              <li class="has-sub nav-item"><a href="#"><i class="ft-user"></i><span data-i18n="" class="menu-title">MANBAG</span></a>
                <ul class="menu-content">
                  <li><a href="{{ url('notadinas') }}" class="menu-item">Nota Dinas</a>
                  </li>
                  <li><a href="{{ url('addendum') }}" class="menu-item">Addendum</a>
                  </li>
                  <li><a href="{{ url('spbj') }}" class="menu-item">SPBJ</a>
                  </li>
                </ul>
              </li>

              <li class="has-sub nav-item"><a href="#"><i class="ft-clipboard"></i><span data-i18n="" class="menu-title">RENDAN</span></a>
                <ul class="menu-content">   
                  <li><a href="{{ url('rks') }}" class="menu-item">RKS</a>
                  </li>
                </ul>
              </li>



              <li class="has-sub nav-item"><a href="#"><i class="ft-layers"></i><span data-i18n="" class="menu-title">LAKDAN</span></a>
                <ul class="menu-content">
                  <li><a href="{{ url('prosespengadaan') }}" class="menu-item">Proses Pengadaan</a>
                  </li>
                  <li><a href="{{ url('inputkontrak') }}" class="menu-item">Input Kontrak</a>
                  </li>
                </ul>
              </li>

              
              <li class="has-sub nav-item"><a href="#"><i class="ft-bar-chart-2"></i><span data-i18n="" class="menu-title">KSA</span></a>
                <ul class="menu-content">
                  <li><a href="{{ url('tagihan') }}" class="menu-item">Proses Tagihan</a>
                  </li>
                </ul>
              </li>
              
              <li class=" nav-item"><a href="{{ url('monitoring') }}"><i class="ft-book"></i><span data-i18n="" class="menu-title">MONITORING</span></a>
              </li>
              <!--
              <li class=" nav-item"><a href="monitoring"><i class="ft-book"></i><span data-i18n="" class="menu-title">Monitoring</span></a>
              </li>
            -->
            @if(Session::get('bidang') == 'LAKDAN')
            <li class="has-sub nav-item"><a href="#"><i class="ft-settings"></i><span data-i18n="" class="menu-title">PENGATURAN</span></a>
              <ul class="menu-content">
                <li><a href="{{ url('user') }}" class="menu-item">User</a>
                </li>
              </ul>
            </li>
            @endif
              <!--
              <li class=" nav-item"><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/documentation"><i class="ft-book"></i><span data-i18n="" class="menu-title">Documentation</span></a>
              </li>
              <li class=" nav-item"><a href="https://pixinvent.ticksy.com/"><i class="ft-life-buoy"></i><span data-i18n="" class="menu-title">Support</span></a>
              </li>
              <li class=" nav-item"><a href="versi"><i class="ft-life-buoy"></i><span data-i18n="" class="menu-title">Versi</span></a>
              </li>-->
            </ul>
          </div>
        </div>
        <!-- main menu content-->
        <div class="sidebar-background"></div>
        <!-- main menu footer-->
        <!-- include includes/menu-footer-->
        <!-- main menu footer-->
      </div>
      <!-- / main menu-->

      <!-- Navbar (Header) Starts-->
      <nav class="navbar navbar-expand-lg navbar-light bg-faded header-navbar">
        <div class="container-fluid">
          <div class="navbar-header">

            <button type="button" class="navbar-form btn btn-raised btn-primary mr-1 mb-1 btn-sm"><i class="fa fa-user-o"></i> {{strtoupper(Session::get('ap'))}} </button>
            <button type="button" class="navbar-form btn btn-raised btn-primary mr-1 mb-1 btn-sm"><i class="fa fa-user-o"></i> {{strtoupper(Session::get('bidang'))}} </button>
            
            <button type="button" class="navbar-form btn btn-raised btn-primary mr-1 mb-1 btn-sm" data-toggle="popover" data-content="Unit UPI : {{strtoupper(Session::get('upi'))}} <br/> Bidang : {{strtoupper(Session::get('bidang'))}}" data-trigger="hover"  data-html="true" data-original-title="Info User"><i class="fa fa-user-o"></i> {{strtoupper(Session::get('nama'))}} </button>

            <button type="button" data-toggle="collapse" class="navbar-toggle d-lg-none float-left"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><span class="d-lg-none navbar-right navbar-collapse-toggle"><a aria-controls="navbarSupportedContent" href="javascript:;" class="open-navbar-container black"><i class="ft-more-vertical"></i></a></span>
            <!--
            <form role="search" class="navbar-form navbar-right mt-1">
              <div class="position-relative has-icon-right">
                <input type="text" placeholder="Search" class="form-control round"/>
                <div class="form-control-position"><i class="ft-search"></i></div>
              </div>
            </form>
          -->
          
        </div>

        <div class="navbar-container">
          <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav">

              <li class="nav-item d-none d-lg-block"><a id="navbar-fullscreen" href="javascript:;" class="nav-link apptogglefullscreen" data-toggle="popover" data-content="Klik tombol ini untuk menampilkan layar fullscreen"
                data-trigger="hover" data-original-title="Fullscreen"><i class="ft-maximize font-medium-3 blue-grey darken-4"></i>
                <p class="d-none">fullscreen</p></a></li>

                <li class="nav-item">
                  <a href="{{ url('logout') }}" class="nav-link"  data-toggle="popover" data-content="Klik tombol ini untuk logout dari SIPADAN"
                  data-trigger="hover" data-original-title="Logout"><i class="ft-power font-medium-3 danger darken-4"></i></a>
                </li>
              </ul>
            </div>
          </div>

        </div>
      </nav>
      <!-- Navbar (Header) Ends-->

      @yield('konten')

    </div>
  </div>
  <!-- END : End Main Content-->

  <!-- BEGIN : Footer-->
  <footer class="footer footer-static footer-light">
    <p class="clearfix text-muted text-sm-center px-2"><span>Copyright  &copy; 2020 <a href="#" id="pixinventLink" class="text-bold-800 primary darken-2">SIPADAN</a> UP3 Subulussalam. </span></p>
  </footer>
  <!-- End : Footer-->

</div>

</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<!-- START Notification Sidebar-->
<aside id="notification-sidebar" class="notification-sidebar d-none d-sm-none d-md-block"><a class="notification-sidebar-close"><i class="ft-x font-medium-3"></i></a>
  <div class="side-nav notification-sidebar-content">
    <div class="row">
      <div class="col-12 mt-1">
        <ul class="nav nav-tabs">
          <li class="nav-item"><a id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#activity-tab" aria-expanded="true" class="nav-link active">Activity</a></li>
          <li class="nav-item"><a id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#chat-tab" aria-expanded="false" class="nav-link">Chat</a></li>
          <li class="nav-item"><a id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#settings-tab" aria-expanded="false" class="nav-link">Settings</a></li>
        </ul>
        <div class="tab-content px-1 pt-1">
          <div id="activity-tab" role="tabpanel" aria-expanded="true" aria-labelledby="base-tab1" class="tab-pane active">
            <div id="activity" class="col-12 timeline-left">
              <h6 class="mt-1 mb-3 text-bold-400">RECENT ACTIVITY</h6>
              <div id="timeline" class="timeline-left timeline-wrapper">
                <ul class="timeline">
                  <li class="timeline-line"></li>
                  <li class="timeline-item">
                    <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-purple bg-lighten-1"><i class="ft-shopping-cart"></i></span></div>
                    <div class="col s9 recent-activity-list-text"><a href="#" class="deep-purple-text medium-small">just now</a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jim Doe Purchased new equipments for zonal office.</p>
                    </div>
                  </li>
                  <li class="timeline-item">
                    <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-info bg-lighten-1"><i class="fa fa-plane"></i></span></div>
                    <div class="col s9 recent-activity-list-text"><a href="#" class="cyan-text medium-small">Yesterday</a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Your Next flight for USA will be on 15th August 2015.</p>
                    </div>
                  </li>
                  <li class="timeline-item">
                    <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-success bg-lighten-1"><i class="ft-mic"></i></span></div>
                    <div class="col s9 recent-activity-list-text"><a href="#" class="green-text medium-small">5 Days Ago</a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Natalya Parker Send you a voice mail for next conference.</p>
                    </div>
                  </li>
                  <li class="timeline-item">
                    <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-warning bg-lighten-1"><i class="ft-map-pin"></i></span></div>
                    <div class="col s9 recent-activity-list-text"><a href="#" class="amber-text medium-small">1 Week Ago</a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jessy Jay open a new store at S.G Road.</p>
                    </div>
                  </li>
                  <li class="timeline-item">
                    <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-red bg-lighten-1"><i class="ft-inbox"></i></span></div>
                    <div class="col s9 recent-activity-list-text"><a href="#" class="deep-orange-text medium-small">2 Week Ago</a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">voice mail for conference.</p>
                    </div>
                  </li>
                  <li class="timeline-item">
                    <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-cyan bg-lighten-1"><i class="ft-mic"></i></span></div>
                    <div class="col s9 recent-activity-list-text"><a href="#" class="brown-text medium-small">1 Month Ago</a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Natalya Parker Send you a voice mail for next conference.</p>
                    </div>
                  </li>
                  <li class="timeline-item">
                    <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-amber bg-lighten-1"><i class="ft-map-pin"></i></span></div>
                    <div class="col s9 recent-activity-list-text"><a href="#" class="deep-purple-text medium-small">3 Month Ago</a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jessy Jay open a new store at S.G Road.</p>
                    </div>
                  </li>
                  <li class="timeline-item">
                    <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-grey bg-lighten-1"><i class="ft-inbox"></i></span></div>
                    <div class="col s9 recent-activity-list-text"><a href="#" class="grey-text medium-small">1 Year Ago</a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">voice mail for conference.</p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div id="chat-tab" aria-labelledby="base-tab2" class="tab-pane">
            <div id="chatapp" class="col-12">
              <h6 class="mt-1 mb-3 text-bold-400">RECENT CHAT</h6>
              <div class="collection border-none">
                <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-12.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Elizabeth Elliott</h4><span class="medium-small float-right blue-grey-text text-lighten-3">5.00 AM</span>
                    </div>
                    <p class="text-muted font-small-3">Thank you</p>
                  </div>
                </div>
                <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-6.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Mary Adams</h4><span class="medium-small float-right blue-grey-text text-lighten-3">4.14 AM</span>
                    </div>
                    <p class="text-muted font-small-3">Hello Boo</p>
                  </div>
                </div>
                <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-11.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Caleb Richards</h4><span class="medium-small float-right blue-grey-text text-lighten-3">9.00 PM</span>
                    </div>
                    <p class="text-muted font-small-3">Keny !</p>
                  </div>
                </div>
                <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-18.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">June Lane</h4><span class="medium-small float-right blue-grey-text text-lighten-3">4.14 AM</span>
                    </div>
                    <p class="text-muted font-small-3">Ohh God</p>
                  </div>
                </div>
                <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-1.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Edward Fletcher</h4><span class="medium-small float-right blue-grey-text text-lighten-3">5.15 PM</span>
                    </div>
                    <p class="text-muted font-small-3">Love you</p>
                  </div>
                </div>
                <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-2.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Crystal Bates</h4><span class="medium-small float-right blue-grey-text text-lighten-3">8.00 AM</span>
                    </div>
                    <p class="text-muted font-small-3">Can we</p>
                  </div>
                </div>
                <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-3.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Nathan Watts</h4><span class="medium-small float-right blue-grey-text text-lighten-3">9.53 PM</span>
                    </div>
                    <p class="text-muted font-small-3">Great!</p>
                  </div>
                </div>
                <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-15.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Willard Wood</h4><span class="medium-small float-right blue-grey-text text-lighten-3">4.20 AM</span>
                    </div>
                    <p class="text-muted font-small-3">Do it</p>
                  </div>
                </div>
                <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-19.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Ronnie Ellis</h4><span class="medium-small float-right blue-grey-text text-lighten-3">5.30 PM</span>
                    </div>
                    <p class="text-muted font-small-3">Got that</p>
                  </div>
                </div>
                <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-14.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Gwendolyn Wood</h4><span class="medium-small float-right blue-grey-text text-lighten-3">4.34 AM</span>
                    </div>
                    <p class="text-muted font-small-3">Like you</p>
                  </div>
                </div>
                <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-13.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Daniel Russell</h4><span class="medium-small float-right blue-grey-text text-lighten-3">12.00 AM</span>
                    </div>
                    <p class="text-muted font-small-3">Thank you</p>
                  </div>
                </div>
                <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-22.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Sarah Graves</h4><span class="medium-small float-right blue-grey-text text-lighten-3">11.14 PM</span>
                    </div>
                    <p class="text-muted font-small-3">Okay you</p>
                  </div>
                </div>
                <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-9.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Andrew Hoffman</h4><span class="medium-small float-right blue-grey-text text-lighten-3">7.30 PM</span>
                    </div>
                    <p class="text-muted font-small-3">Can do</p>
                  </div>
                </div>
                <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-20.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Camila Lynch</h4><span class="medium-small float-right blue-grey-text text-lighten-3">2.00 PM</span>
                    </div>
                    <p class="text-muted font-small-3">Leave it</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="settings-tab" aria-labelledby="base-tab3" class="tab-pane">
            <div id="settings" class="col-12">
              <h6 class="mt-1 mb-3 text-bold-400">GENERAL SETTINGS</h6>
              <ul class="list-unstyled">
                <li>
                  <div class="togglebutton">
                    <div class="switch"><span class="text-bold-500">Notifications</span>
                      <div class="float-right">
                        <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                          <input id="notifications1" checked="checked" type="checkbox" class="custom-control-input">
                          <label for="notifications1" class="custom-control-label"></label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <p>Use checkboxes when looking for yes or no answers.</p>
                </li>
                <li>
                  <div class="togglebutton">
                    <div class="switch"><span class="text-bold-500">Show recent activity</span>
                      <div class="float-right">
                        <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                          <input id="recent-activity1" checked="checked" type="checkbox" class="custom-control-input">
                          <label for="recent-activity1" class="custom-control-label"></label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                </li>
                <li>
                  <div class="togglebutton">
                    <div class="switch"><span class="text-bold-500">Notifications</span>
                      <div class="float-right">
                        <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                          <input id="notifications2" type="checkbox" class="custom-control-input">
                          <label for="notifications2" class="custom-control-label"></label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <p>Use checkboxes when looking for yes or no answers.</p>
                </li>
                <li>
                  <div class="togglebutton">
                    <div class="switch"><span class="text-bold-500">Show recent activity</span>
                      <div class="float-right">
                        <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                          <input id="recent-activity2" type="checkbox" class="custom-control-input">
                          <label for="recent-activity2" class="custom-control-label"></label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                </li>
                <li>
                  <div class="togglebutton">
                    <div class="switch"><span class="text-bold-500">Show your emails</span>
                      <div class="float-right">
                        <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                          <input id="show-emails" type="checkbox" class="custom-control-input">
                          <label for="show-emails" class="custom-control-label"></label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <p>Use checkboxes when looking for yes or no answers.</p>
                </li>
                <li>
                  <div class="togglebutton">
                    <div class="switch"><span class="text-bold-500">Show Task statistics</span>
                      <div class="float-right">
                        <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                          <input id="show-stats" type="checkbox" class="custom-control-input">
                          <label for="show-stats" class="custom-control-label"></label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</aside>
<!-- END Notification Sidebar-->
<!-- Theme customizer Starts-->
<div class="customizer border-left-blue-grey border-left-lighten-4 d-none d-sm-none d-md-block"><a id="customizer-toggle-icon" class="customizer-toggle bg-danger"><i class="ft-settings font-medium-4 fa fa-spin white align-middle"></i></a>
  <div data-ps-id="df6a5ce4-a175-9172-4402-dabd98fc9c0a" class="customizer-content p-3 ps-container ps-theme-dark">
    <h4 class="text-uppercase mb-0 text-bold-400">Theme Customizer</h4>
    <p>Customize & Preview in Real Time</p>
    <hr>
    <!-- Layout Options-->
    <h6 class="text-center text-bold-500 mb-3 text-uppercase">Layout Options</h6>
    <div class="layout-switch ml-4">
      <div class="custom-control custom-radio d-inline-block custom-control-inline light-layout">
        <input id="ll-switch" type="radio" name="layout-switch" checked class="custom-control-input">
        <label for="ll-switch" class="custom-control-label">Light</label>
      </div>
      <div class="custom-control custom-radio d-inline-block custom-control-inline dark-layout">
        <input id="dl-switch" type="radio" name="layout-switch" class="custom-control-input">
        <label for="dl-switch" class="custom-control-label">Dark</label>
      </div>
      <div class="custom-control custom-radio d-inline-block custom-control-inline transparent-layout">
        <input id="tl-switch" type="radio" name="layout-switch" class="custom-control-input">
        <label for="tl-switch" class="custom-control-label">Transparent</label>
      </div>
    </div>
    <hr>
    <!-- Sidebar Options Starts-->
    <h6 class="text-center text-bold-500 mb-3 text-uppercase sb-options">Sidebar Color Options</h6>
    <div class="cz-bg-color sb-color-options">
      <div class="row p-1">
        <div class="col"><span style="width:20px; height:20px;" data-bg-color="pomegranate" class="gradient-pomegranate d-block rounded-circle"></span></div>
        <div class="col"><span style="width:20px; height:20px;" data-bg-color="king-yna" class="gradient-king-yna d-block rounded-circle"></span></div>
        <div class="col"><span style="width:20px; height:20px;" data-bg-color="ibiza-sunset" class="gradient-ibiza-sunset d-block rounded-circle"></span></div>
        <div class="col"><span style="width:20px; height:20px;" data-bg-color="flickr" class="gradient-flickr d-block rounded-circle"></span></div>
        <div class="col"><span style="width:20px; height:20px;" data-bg-color="purple-bliss" class="gradient-purple-bliss d-block rounded-circle"></span></div>
        <div class="col"><span style="width:20px; height:20px;" data-bg-color="man-of-steel" class="gradient-man-of-steel d-block rounded-circle"></span></div>
        <div class="col"><span style="width:20px; height:20px;" data-bg-color="purple-love" class="gradient-purple-love d-block rounded-circle"></span></div>
      </div>
      <div class="row p-1">
        <div class="col"><span style="width:20px; height:20px;" data-bg-color="black" class="bg-black d-block rounded-circle"></span></div>
        <div class="col"><span style="width:20px; height:20px;" data-bg-color="white" class="bg-grey d-block rounded-circle"></span></div>
        <div class="col"><span style="width:20px; height:20px;" data-bg-color="primary" class="bg-primary d-block rounded-circle"></span></div>
        <div class="col"><span style="width:20px; height:20px;" data-bg-color="success" class="bg-success d-block rounded-circle"></span></div>
        <div class="col"><span style="width:20px; height:20px;" data-bg-color="warning" class="bg-warning d-block rounded-circle"></span></div>
        <div class="col"><span style="width:20px; height:20px;" data-bg-color="info" class="bg-info d-block rounded-circle"></span></div>
        <div class="col"><span style="width:20px; height:20px;" data-bg-color="danger" class="bg-danger d-block rounded-circle"></span></div>
      </div>
    </div>
    <!-- Sidebar Options Ends-->
    <!-- Transparent Layout Bg color Options-->
    <h6 class="text-center text-bold-500 mb-3 text-uppercase tl-color-options d-none">Background Colors</h6>
    <div class="cz-tl-bg-color d-none">
      <div class="row p-1">
        <div class="col"><span style="width:20px; height:20px;" data-bg-color="hibiscus" class="bg-hibiscus d-block rounded-circle"></span></div>
        <div class="col"><span style="width:20px; height:20px;" data-bg-color="bg-purple-pizzazz" class="bg-purple-pizzazz d-block rounded-circle"></span></div>
        <div class="col"><span style="width:20px; height:20px;" data-bg-color="bg-blue-lagoon" class="bg-blue-lagoon d-block rounded-circle"></span></div>
        <div class="col"><span style="width:20px; height:20px;" data-bg-color="bg-electric-viloet" class="bg-electric-violet d-block rounded-circle"></span></div>
        <div class="col"><span style="width:20px; height:20px;" data-bg-color="bg-protage" class="bg-portage d-block rounded-circle"></span></div>
        <div class="col"><span style="width:20px; height:20px;" data-bg-color="bg-tundora" class="bg-tundora d-block rounded-circle"></span></div>
      </div>
    </div>
    <!-- Transparent Layout Bg color Ends-->
    <hr>
    <!-- Sidebar BG Image Starts-->
    <h6 class="text-center text-bold-500 mb-3 text-uppercase sb-bg-img">Sidebar Bg Image</h6>
    <div class="cz-bg-image row sb-bg-img">
      <div class="col-sm-2 mb-3"><img src="app-assets/img/sidebar-bg/01.jpg" width="90" class="rounded sb-bg-01"></div>
      <div class="col-sm-2 mb-3"><img src="app-assets/img/sidebar-bg/02.jpg" width="90" class="rounded sb-bg-02"></div>
      <div class="col-sm-2 mb-3"><img src="app-assets/img/sidebar-bg/03.jpg" width="90" class="rounded sb-bg-03"></div>
      <div class="col-sm-2 mb-3"><img src="app-assets/img/sidebar-bg/04.jpg" width="90" class="rounded sb-bg-04"></div>
      <div class="col-sm-2 mb-3"><img src="app-assets/img/sidebar-bg/05.jpg" width="90" class="rounded sb-bg-05"></div>
      <div class="col-sm-2 mb-3"><img src="app-assets/img/sidebar-bg/06.jpg" width="90" class="rounded sb-bg-06"></div>
    </div>
    <!-- Transparent BG Image Ends-->
    <div class="tl-bg-img d-none">
      <h6 class="text-center text-bold-500 text-uppercase">Background Images</h6>
      <div class="cz-tl-bg-image row">
        <div class="col-sm-3"><img src="app-assets/img/gallery/bg-glass-1.jpg" width="90" class="rounded bg-glass-1 selected"></div>
        <div class="col-sm-3"><img src="app-assets/img/gallery/bg-glass-2.jpg" width="90" class="rounded bg-glass-2"></div>
        <div class="col-sm-3"><img src="app-assets/img/gallery/bg-glass-3.jpg" width="90" class="rounded bg-glass-3"></div>
        <div class="col-sm-3"><img src="app-assets/img/gallery/bg-glass-4.jpg" width="90" class="rounded bg-glass-4"></div>
      </div>
    </div>
    <!-- Transparent BG Image Ends    -->
    <hr>
    <!-- Sidebar BG Image Toggle Starts-->
    <div class="togglebutton toggle-sb-bg-img">
      <div class="switch"><span>Sidebar Bg Image</span>
        <div class="float-right">
          <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
            <input id="sidebar-bg-img" type="checkbox" checked class="custom-control-input cz-bg-image-display">
            <label for="sidebar-bg-img" class="custom-control-label"></label>
          </div>
        </div>
      </div>
      <hr>
    </div>
    <!-- Sidebar BG Image Toggle Ends-->
    <!-- Compact Menu Starts-->
    <div class="togglebutton">
      <div class="switch"><span>Compact Menu</span>
        <div class="float-right">
          <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
            <input id="cz-compact-menu" type="checkbox" class="custom-control-input cz-compact-menu">
            <label for="cz-compact-menu" class="custom-control-label"></label>
          </div>
        </div>
      </div>
    </div>
    <!-- Compact Menu Ends-->
    <hr>
    <!-- Sidebar Width Starts-->
    <div>
      <label for="cz-sidebar-width">Sidebar Width</label>
      <select id="cz-sidebar-width" class="custom-select cz-sidebar-width float-right">
        <option value="small">Small</option>
        <option value="medium" selected="">Medium</option>
        <option value="large">Large</option>
      </select>
    </div>
    <!-- Sidebar Width Ends-->
  </div>
</div>
<!-- Theme customizer Ends-->
<!-- BEGIN VENDOR JS-->
<script src="{{ asset('app-assets/vendors/js/core/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('app-assets/vendors/js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('app-assets/vendors/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('app-assets/vendors/js/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('app-assets/vendors/js/prism.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('app-assets/vendors/js/jquery.matchHeight-min.js') }}" type="text/javascript"></script>
<script src="{{ asset('app-assets/vendors/js/screenfull.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('app-assets/vendors/js/pace/pace.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('app-assets/js/popover.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->

<script src="{{ asset('app-assets/vendors/js/chartist.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('app-assets/vendors/js/jquery.steps.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('app-assets/vendors/js/pickadate/picker.js') }}" type="text/javascript"></script>
<script src="{{ asset('app-assets/vendors/js/pickadate/picker.date.js') }}" type="text/javascript"></script>
<script src="{{ asset('app-assets/vendors/js/pickadate/picker.time.js') }}" type="text/javascript"></script>
<script src="{{ asset('app-assets/vendors/js/pickadate/legacy.js') }}" type="text/javascript"></script>
<script src="{{ asset('pp-assets/vendors/js/jquery.validate.min.js') }}" type="text/javascript"></script>    
<!-- END PAGE VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS--
    <script src="{{ asset('app-assets/vendors/js/datatable/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/datatable/dataTables.buttons.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/datatable/buttons.flash.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/datatable/jszip.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/datatable/pdfmake.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/datatable/vfs_fonts.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/datatable/buttons.html5.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/datatable/buttons.print.min.js') }}" type="text/javascript"></script>
  -->
  <!-- Optional JS -->
  <script src="{{ asset('app-assets/vendors/js/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('app-assets/vendors/js/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{ asset('app-assets/vendors/js/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{ asset('app-assets/vendors/js/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{ asset('app-assets/vendors/js/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{ asset('app-assets/vendors/js/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
  <script src="{{ asset('app-assets/vendors/js/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{ asset('app-assets/vendors/js/datatables.net-select/js/dataTables.select.min.js')}}"></script>
  <script src="{{ asset('app-assets/vendors/js/switchery.min.js')}}"></script>
  <script src="{{ asset('app-assets/vendors/js/select/selectize.min.js')}}"></script>

  <script src="{{ asset('app-assets/vendors/js/select/select2.full.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/select/form-select2.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/select/form-selectize.js')}}" type="text/javascript"></script>


  <!-- END PAGE VENDOR JS-->
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN APEX JS-->
  <script src="{{ asset('app-assets/js/app-sidebar.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/notification-sidebar.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/customizer.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/dashboard1.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/dashboard2.js') }}" type="text/javascript"></script>
  <!-- END APEX JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{ asset('app-assets/js/jquery.mask.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/sweet-alerts.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/wizard-steps.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/basic-inputs.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/disable-input.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/components-modal.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/switch.min.js') }}" type="text/javascript"></script>

  
  
  <script src="{{ asset('app-assets/js/data-tables/datatable-advanced.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/data-tables/datatable-basic.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/data-tables/datatable-styling.js') }}" type="text/javascript"></script>
  

  <script type="text/javascript">
    $('.pickadate').pickadate({
      format: 'yyyy-mm-dd',
      formatSubmit: 'yyyy-mm-dd',
      hiddenPrefix: 'prefix__',
      hiddenSuffix: '__suffix'
    })
  </script>
  
  <script type="text/javascript">
    $('#unit').selectize({
      create: true,
      sortField: 'text'
    });
  </script>

  <script type="text/javascript">
    $('.date').datepicker({  
     format: 'dd-mm-yyyy',
     dateFormat : 'dd-mm-yyyy'
   });  

 </script>


 <script type="text/javascript">
  $(document).ready(function() {
    if( $('#metode').val() == 'Pengadaan Langsung' || $('#metode').val() == 'Penunjukan Langsung')  {
      $('#vendor').prop( "disabled", false );
    } else {       
      $('#vendor').prop("disabled", true );
      $('#vendor').val("").change();
    }
  });
  $('#metode').change(function() {
    if( $(this).val() == 'Pengadaan Langsung' || $('#metode').val() == 'Penunjukan Langsung') {
      $('#vendor').prop( "disabled", false );
    } else {       
      $('#vendor').prop("disabled", true );
      $('#vendor').val("").change();
    }
  });                      
</script>

<script type="text/javascript">
  $(document).ready(function(){
                // Format mata uang.
                $( '.uang' ).mask('000.000.000.000', {reverse: true});
                $("form").submit(function(){
                  $( '.uang' ).unmask();
                });
              })
            </script>
            <!-- END PAGE LEVEL JS-->

            <script>
              $(document).ready(function(){
                $(".preloader").fadeOut();
              })
            </script>

            <script>
              $(document).ready(function(){
                $('#uruttgl').DataTable({
                  destroy: true,
                  "order": [[1, "desc"]]
                });
              });
            </script>

            <script type="text/javascript">
              $('#mycheckbox').change(function() {
                $('#mycheckboxdiv').toggle();
              });
            </script>


            
          </body>
          <!-- END : Body-->
          </html>