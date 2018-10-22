<!--
author: Ariandi Nugraha
author Email: db_duabelas@yahoo.com
-->

<!DOCTYPE html>
<html lang="en">
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="@yield('keywords')">
  <meta name="description" content="@yield('description')">
  <meta name="author" content="Ariandi Nugraha">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" href="{{ asset('images/wcs-bahanicon.ico') }}">

  <title>@yield('title')</title>

  <!-- Global Stylesheets -->
  
  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

  <link href="{{ asset('theme/css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('theme/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('theme/css/owl.carousel.css') }}">
  <link rel="stylesheet" href="{{ asset('theme/css/owl.theme.default.css') }}">
  <link rel="stylesheet" href="{{ asset('theme/css/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}">
  @yield('css')

</head>

<body id="page-top">

  <!--====================================================
                         HEADER
  ======================================================--> 
  <!-- Header -->
  <header id="home">
      <!-- Background Image -->
      <div class="bg-img" style="background-image: url({{ asset('theme/img/background1.jpg') }});">
        <div class="overlay"></div>
      </div>
      <!-- /Background Image -->

      <!-- Nav -->
      <nav id="nav" class="navbar nav-transparent">
        <div class="container">

          <div class="navbar-header">
            <!-- Logo -->
            <div class="navbar-brand">
              <a href="/">
                <img class="logo" src="{{ asset('theme/img/logo.png') }}" alt="logo">
                <img class="logo-alt" src="{{ asset('theme/img/logo-alt.png') }}" alt="logo">
              </a>
            </div>
            <!-- /Logo -->

            <!-- Collapse nav button -->
            <div class="nav-collapse">
              <span></span>
            </div>
            <!-- /Collapse nav button -->
          </div>

          <!--  Main navigation  -->
          <ul class="main-nav nav navbar-nav navbar-right">
            @foreach ( Menus::getNavbar(['NodeID' => 1]) as $element )
              @if( count(Menus::getNavbar(['NodeID' => $element->id])) > 0 )
                <li class="has-dropdown">
                  <a href="#">{{ $element->title }}</a> 
                  <ul class="dropdown">
                    @foreach ( Menus::getNavbar(['NodeID' => $element->id]) as $element2 )
                      <li>
                        <a href="{{ Url('/'.$element2->alias) }}">
                          {{ $element2->title }}
                        </a>
                      </li>
                    @endforeach
                  </ul>
                </li>
              @else
                <li>
                  <a href="{{ Url('/'.$element->alias) }}">{{ $element->title }}</a>
                </li>
              @endif
            @endforeach
            {{-- <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#portfolio">Portfolio</a></li>
            <li><a href="#service">Services</a></li>
            <li><a href="#pricing">Prices</a></li>
            <li><a href="#team">Team</a></li>
            <li class="has-dropdown"><a href="#blog">Blog</a>
              <ul class="dropdown">
                <li><a href="blog-single.html">blog post</a></li>
              </ul>
            </li>
            <li><a href="#contact">Contact</a></li> --}}
          </ul>
          <!-- /Main navigation -->

        </div>
      </nav>
      <!-- /Nav -->
      @if(Route::currentRouteName() == 'front.home')
        @include('front.layouts.headerimg')
      @endif

    </header>
    <!-- /Header -->

  @yield('content')





  <div id="contact" class="section md-padding">

    <!-- Container -->
    <div class="container">

      <!-- Row -->
      <div class="row">

        <!-- Section-header -->
        <div class="section-header text-center">
          <h2 class="title">Get in touch</h2>
        </div>
        <!-- /Section-header -->

        <!-- contact -->
        <div class="col-sm-4">
          <div class="contact">
            <i class="fa fa-phone"></i>
            <h3>Phone</h3>
            <p>{{  App\Entities\Admin\Company::find(1)->phone1 }}</p>
          </div>
        </div>
        <!-- /contact -->

        <!-- contact -->
        <div class="col-sm-4">
          <div class="contact">
            <i class="fa fa-envelope"></i>
            <h3>Email</h3>
            <p>{{ App\Entities\Admin\Company::find(1)->Email }}">{{ App\Entities\Admin\Company::find(1)->Email }}</p>
          </div>
        </div>
        <!-- /contact -->

        <!-- contact -->
        <div class="col-sm-4">
          <div class="contact">
            <i class="fa fa-map-marker"></i>
            <h3>Address</h3>
            <p>{!! str_replace("</p>", "", str_replace("<p>", "", App\Entities\Admin\Company::find(1)->DeliveryCondition))  !!}</p>
          </div>
        </div>
        <!-- /contact -->

        <!-- contact form -->
        <div class="col-md-8 col-md-offset-2">
          <form action="{{ route('comments.store') }}" method="post">
            @csrf
            <input type="text" class="input" placeholder="Name" name="name" required>
            <input type="email" class="input" placeholder="Email" name="email" required>
            <input type="text" class="input" placeholder="Subject" name="subject" required>
            <textarea class="input" placeholder="Message" required name="message"></textarea>
            <button class="main-btn">Send message</button>
          </form>
        </div>
        <!-- /contact form -->

      </div>
      <!-- /Row -->

    </div>
    <!-- /Container -->

  </div>




  <footer id="footer" class="sm-padding bg-dark">

    <!-- Container -->
    <div class="container">

      <!-- Row -->
      <div class="row">

        <div class="col-md-12">

          <!-- footer logo -->
          <div class="footer-logo">
            <a href="index.html"><img src="{{ url('theme/img/logo-alt.png') }}" alt="logo"></a>
          </div>
          <!-- /footer logo -->

          <!-- footer follow -->
          <ul class="footer-follow">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
          </ul>
          <!-- /footer follow -->

          <!-- footer copyright -->
          <div class="footer-copyright">
            <p>Copyright © 2018. All Rights Reserved. Designed by <a href="#">Ariandi Nugraha</a></p>
          </div>
          <!-- /footer copyright -->

        </div>

      </div>
      <!-- /Row -->

    </div>
    <!-- /Container -->

  </footer>

  <div id="back-to-top" style="display: block;"></div>

  <div id="preloader" style="display: none;">
    <div class="preloader">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <!-- jQuery Plugins -->
  <script type="text/javascript" src="{{ asset('theme/js/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('theme/js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('theme/js/owl.carousel.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('theme/js/jquery.magnific-popup.js') }}"></script>
  <script type="text/javascript" src="{{ asset('theme/js/main.js') }}"></script>

  @if (\Session::has('success-message'))
    <script src="{{ asset('js/bootstrap-notify.min.js') }}"></script>
    <script type="text/javascript">
      $.notify({
        title: '<strong>Success!</strong>',
        message: 'Success send meesage to us.'
      },{
        type: 'success'
      });
    </script>
  @endif
  
  @yield('js')

</body>
</html>
