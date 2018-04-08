<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{-- <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet"> --}}
     <link href="{{ asset('css/Monthpicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  
    <nav class="navbar topNav">
        <div class="container">
            <ul class="ml-auto">
                <li class="TopNavLink" ><i class="fas fa-wifi"></i> (671) 888-8888</li>
                <li class="TopNavLink" ><i class="far fa-envelope"></i> information@iconnectguam.com</li>
            </ul>
        </div>
    </nav>
<div class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-light middleNav">
      <div class="container">
        <a href="/">
          <img class="HeaderLogo" src="{{ asset('images/iconnect-logo.png') }}" >
        </a>
         {{--  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button> --}}

           <button class="navCollapseBtn d-lg-none d-xl-none">
             <i class="fas fa-bars"></i>
          </button>



          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              
              <li class="nav-item">
                <a class="nav-link" id="goToMobileAcount">MY MOBILE ACCOUNT</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link " id="goToLTEAccount">MY LTE ACCOUNT</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " id="goToContactsPage">CONNECT WITH US</a>
              </li>
              <li class="nav-item ">
                <button class="btn BuyLoadBtn" id="buyLoad"> BUY LOAD</button>
              </li>
            </ul>
            
          </div>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light navBottom d-none d-lg-block">
      <div class="container">
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#NavbottomContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

          <div class="collapse navbar-collapse" id="NavbottomContent">
            <ul class="navbar-nav ml-auto">
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  VALUE MOBILE
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Mobile App</a>
                  <a class="dropdown-item" href="#">My Account</a>
                  <a class="dropdown-item" href="#">Sign Up Now</a>
                </div>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  iPHONE
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="buy_iphonex">Buy iPhone X</a>
                  <a class="dropdown-item" href="showiphonex">iPhone X</a>
                  <a class="dropdown-item" href="#">iPhone 8 and iPhone 8 Plus</a>
                  <a class="dropdown-item" href="#">iPhone Comparison</a>
                </div>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  MIFI
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">My LTE Account</a>
                  <a class="dropdown-item" href="lte_true_4g">About iConnect LTE True 4G</a>
                  <a class="dropdown-item" href="#">iConnect E-Load</a>
                  <a class="dropdown-item" href="#">LTE Postpaid Plans</a>
                  <a class="dropdown-item" href="#">Coverage Map</a>
                  <a class="dropdown-item" href="#">FAQs</a>
                  <a class="dropdown-item" href="#">About iConnect LTE True 4G</a>
                  <a class="dropdown-item" href="#">How to Reload LTE Prepaid</a>
                </div>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  MOBILE
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">My Mobile Account</a>
                  <a class="dropdown-item" href="#">Mobile App</a>
                  <a class="dropdown-item" href="#">Advanced Phones</a>
                  <a class="dropdown-item" href="#">About iConnect Advanced</a>
                  <a class="dropdown-item" href="#">iConnect E-Load</a>
                  <a class="dropdown-item" href="#">Postpaid Plans</a>
                  <a class="dropdown-item" href="#">Prepaid Plans</a>
                  <a class="dropdown-item" href="#">Coverage Map</a>
                  <a class="dropdown-item" href="#">How to Reload Advanced Prepaid</a>
                </div>
              </li>

               <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  2 WAY RADIOS
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">About iConnect Push-To-Talk</a>
                  <a class="dropdown-item" href="#">PTT Postpaid Plans</a>
                  <a class="dropdown-item" href="#">Long Distance Rates</a>
                  <a class="dropdown-item" href="#">Coverage Map</a>
                  <a class="dropdown-item" href="#">FAQs</a>
                </div>
              </li>

              <li class="nav-item">
                <a class="nav-link dropdown-toggle" id="goToContactsPage">MOBILE APP</a>
              </li>

               <li class="nav-item">
                <a class="nav-link dropdown-toggle" id="goToContactsPage">EVENTS & PROMOS APP</a>
              </li>

               <li class="nav-item">
                <a class="nav-link dropdown-toggle" id="goToContactsPage">SUPPORT</a>
              </li>

               <li class="nav-item">
                <a class="nav-link dropdown-toggle" id="goToContactsPage">SAIPAN</a>
              </li>

            </ul>
          </div>
        </div>{{-- container --}}
    </nav>

    </div>

    {{-- hidden side nav --}}
    <div class="sideNav d-lg-none d-xl-none d-none">
        <div class="SideNavCommandDiv">
            <i class="fas fa-times"></i>
        </div>
        <br/>
       <ul>
         <li>HOME</li>
         <li>MY MOBILE ACCOUNT</li>
         <li>MY LTE ACCOUNT</li>
         <li>CONNECT WITH US</li>
         <li>VALUE MOBILE</li>
         <li>IPHONE</li>
         <li>MIFI</li>
         <li>HMOBILE</li>
         <li>2 WAY RADIOS</li>
         <li>MOBILE APP</li>
         <li>EVENTS & PROMOSE</li>
         <li>SUPPORT</li>
         <li>SAIPAN</li>
       </ul>
    </div>

    <div class="backdrop d-lg-none d-xl-none "></div>
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light navBottom">
        <div class="container">
            <img class="HeaderLogo" src="{{ asset('images/iconnect-logo.png') }}" >
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse-collapse" id="navbarText">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item NavItem NavLinkHomePage">
                <a class="nav-link" id="goToHomePage">HOME</a>
              </li>
              <li class="nav-item NavItem NavLinkEventsPage">
                <a class="nav-link" id="goToEventsPage">EVENTS AND PROMOS</a>
              </li>
              <li class="nav-item NavItem NavLinkContactsPage">
                <a class="nav-link" id="goToContactsPage">CONTACTS</a>
              </li>
              <li class="nav-item">
                <button class="btn BuyLoadBtn" id="buyLoad"> BUY LOAD</button>
              </li>
            </ul>
           
          </div>
        </div>
    </nav> --}}

    <div id="app">
         @yield('content')
    </div>

    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <ul>
                <li class="ListHeader">MIFI</li>
                <li>My LTE Account</li>
                <li>About iConnect LTE True 4G</li>
                <li>iConnect E-Load</li>
                <li>LTE Postpaid Plans</li>
                <li>Coverage Map</li>
                <li>FAQs</li>
                <li>How to Reload LTE Prepaid</li>
            </ul>
          </div>

          <div class="col-lg-3">
            <ul>
                <li class="ListHeader">MOBILE</li>
                <li>My Mobile Acccount</li>
                <li>Advanced Phones</li>
                <li>About iConnect Advanced</li>
                <li>iConnect E-Load</li>
                <li>Postpaid Plans</li>
                <li>Prepaid Plans</li>
                <li>Coverage Map</li>
                <li>Mobile App</li>
                <li>iPhone X</li>
                <li>iPhone 8 and 8 Plus</li>
                <li>iPhone Comparison</li>
                <li>How to Reload Advance Prepaid</li>
            </ul>
          </div>

          <div class="col-lg-3">
            <ul>
                <li class="ListHeader">2 WAY RADIOS</li>
                <li>About iConnect Push-to-Talk</li>
                <li>PTT Postpaid Plans</li>
                <li>Long Distance Rates</li>
                <li>Coverage Map</li>
                <li>FAQs</li>
            </ul>
          </div>

          <div class="col-lg-3">
            <ul>
                <li class="ListHeader">SEE ALSO</li>
                <li>Biling FAQ</li>
                <li>Postpaid Terms and Conditions</li>
                <li>Prepaid Terms and Conditions</li>
                <li>Acceptable Use Policy</li>
                <li>App Policy</li>
                <li>How to Reload</li>
                <li>Work with Us</li>
                <li>Site Map</li>
            </ul>
          </div>
          
            <div class="col-lg-12 bottomFooter">
              <hr>

              <ul>
                <li>HOME</li>
                <li>LTE TRUE 4G</li>
                <li>ADVANCED</li>
                <li>PUSH-TO-TALK</li>
                <li>EVENTS & PROMOS</li>
                <li>MY ACCOUNT</li>
                <li>SUPPORT</li>
                <li>ABOUT US</li>
                <li>CONNECT WITH US</li>
                <li>TERMS AND CONDITIONS</li>
              </ul>

               <p>© 2017. CHOICEPHONE LLC. ALL RIGHTS RESERVED</p> 
            </div>
          </div>
         </div>
       
    </div>

    <!-- script -->
     <script type="text/javascript"  src="{{ asset('js/plugins/fontawesome-5-0-9.js') }}"></script>
     <script type="text/javascript"  src="{{ asset('js/plugins/jquery.js') }}"></script>

     <script type="text/javascript" src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/plugins/jquery.cookie.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/plugins/jquery-ui.min.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/plugins/MonthPicker.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/plugins/sweetalert.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/plugins/xcript-v1.0.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/service.js') }}"></script>
     <script type="text/javascript"  src="{{ asset('js/global.js') }}"></script>
      <script type="text/javascript">
        $(document).ready(function() {
            $.xcript.library();
        });
    </script>
    @section('script')
    @show
</body>
</html>
