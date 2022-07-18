<?php 
    $ustilasateur = $this->session->get_userdata();  
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title><?php echo $titre; ?></title>
    <link rel="apple-touch-icon" href="theme-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="theme-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets2/theme-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets2/theme-assets/css/app-lite.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets2/theme-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>assets2/theme-assets/css/core/colors/palette-gradient.css">
  </head>

  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="collapse navbar-collapse show" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-block d-md-none"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="avatar avatar-online"><img src="<?php echo base_url() ;?>assets2/theme-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i></span></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="arrow_box_right"><a class="dropdown-item" href="#"><span class="avatar avatar-online"><img src="<?php echo base_url() ;?>assets2/theme-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><span class="user-name text-bold-700 ml-1"><?php echo $ustilasateur['nom']; ?></span></span></a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="<?php echo base_url('UserController/logout'); ?>"><i class="ft-power"></i> Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="<?php echo base_url() ;?>assets2/theme-assets/images/backgrounds/02.jpg">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">       
                <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html"><img class="brand-logo" alt="Chameleon admin logo" src="<?php echo base_url() ;?>assets2/theme-assets/images/logo/logo.png"/>
                    <h3 class="brand-text">EASYPARK</h3></a>
                </li>
                <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
            </ul>
        </div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="<?php echo base_url('DatyController')?>" ><i class="ft-home"></i><span class="menu-title" data-i18n="">Gestion DateHeure</span></a></li>
                <li class=" nav-item"><a href="<?php echo base_url('PlaceController')?>" ><i class="ft-home"></i><span class="menu-title" data-i18n="">Gestion Place</span></a></li>
                <li class=" nav-item"><a href="<?php echo base_url('ParkingController')?>" ><i class="ft-book"></i><span class="menu-title" data-i18n="">Parking</span></a></li>
                <li class=" nav-item"><a href="<?php echo base_url('PorteFeuilleController')?>" ><i class="ft-credit-card"></i><span class="menu-title" data-i18n="">Porte Feuille</span></a></li>
                <li class=" nav-item"><a href="<?php echo base_url('TarifController')?>" ><i class="la la-dollar"></i><span class="menu-title" data-i18n="">Tarif</span></a></li>
                <li class=" nav-item"><a href="<?php echo base_url('PlaceController/statistique')?>" ><i class="ft-pie-chart"></i><span class="menu-title" data-i18n="">Statistique</span></a></li>
            </ul>
        </div>
        <div class="navigation-background"></div>
    </div>

    <?php if(isset($page)) { 
         include($page); 
    } ?>
    
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
        <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">2022  &copy; Copyright <a class="text-bold-800 grey darken-2" href="https://themeselection.com" target="_blank">ThemeSelection</a></span></div>
    </footer>
    <script src="<?php echo base_url() ;?>assets2/canvasjs.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ;?>assets2/theme-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ;?>assets2/theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ;?>assets2/theme-assets/js/core/app-lite.js" type="text/javascript"></script>
  </body>
</html>