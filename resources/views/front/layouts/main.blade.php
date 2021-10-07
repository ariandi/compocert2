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

  <link rel="shortcut icon" href="{{ asset('logo/logointercet.png') }}">

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
  <header id="{{ (Route::currentRouteName() == 'front.home') ? 'home' : 'content' }}">
      <div id="headlink"></div>
      @if(Route::currentRouteName() == 'front.home')
        <!-- Background Image -->
        <div class="bg-img" style="background-image: url({{ asset('theme/img/background1.jpg') }});">
          <div class="overlay"></div>
        </div>
        <!-- /Background Image -->
      @endif

      <!-- Nav -->
      <nav id="nav" class="navbar {{ (Route::currentRouteName() == 'front.home') ? 'nav-transparent' : '' }}">
        <div class="container">

          <div class="navbar-header">
            <!-- Logo -->
            <div class="navbar-brand">
              <a href="/">
                <img class="logo" src="{{ asset('logo/logointercet.png') }}" alt="logo">
                <img class="logo-alt" src="{{ asset('logo/logointercet.png') }}" alt="logo">
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
                <li class="has-dropdown {{ $parent_data->id == $element->id ? 'active' : '' }}">
                  <a>{{ $element->title }}</a>
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
                <li class="{{ $element->id == $node->id ? 'active' : '' }}">
                  <a href="{{ Url('/'.$element->alias) }}">
                      {{ $element->title }}
                  </a>
                </li>
              @endif
            @endforeach
          </ul>
          <!-- /Main navigation -->

        </div>
      </nav>
      <!-- /Nav -->
      @if(Route::currentRouteName() == 'front.home')
        @include('front.layouts.headerimg')
      @else
        {{-- @include('front.layouts.header', ['title' => @yield('subtitle')]) --}}
        <!-- header wrapper -->
        <div class="header-wrapper sm-padding bg-grey">
          <div class="container">
            <h2>@yield('subtitle')</h2>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="/">@yield('parent')</a></li>
              <li class="breadcrumb-item active">@yield('subtitle')</li>
            </ul>
          </div>
        </div>
        <!-- /header wrapper -->
      @endif

    </header>
    <!-- /Header -->

  @yield('content')


  <div id="numbers" class="section sm-padding">

    <!-- Background Image -->
    <div class="bg-img" style="background-image: url({{ url('theme/img/background2.jpg') }});">
      <div class="overlay"></div>
    </div>
    <!-- /Background Image -->

    <!-- Container -->
    <div class="container">

      <!-- Row -->
      <div class="row">

        <!-- number -->
        <div class="col-sm-3 col-xs-6">
          <div class="number">
            <i class="fa fa-users"></i>
            <h3 class="white-text"><span class="counter">451</span></h3>
            <span class="white-text">Happy clients</span>
          </div>
        </div>
        <!-- /number -->

        <!-- number -->
        <div class="col-sm-3 col-xs-6">
          <div class="number">
            <i class="fa fa-trophy"></i>
            <h3 class="white-text"><span class="counter">12</span></h3>
            <span class="white-text">Awards won</span>
          </div>
        </div>
        <!-- /number -->

        <!-- number -->
        <div class="col-sm-3 col-xs-6">
          <div class="number">
            <i class="fa fa-coffee"></i>
            <h3 class="white-text"><span class="counter">154</span>K</h3>
            <span class="white-text">Cups of Coffee</span>
          </div>
        </div>
        <!-- /number -->

        <!-- number -->
        <div class="col-sm-3 col-xs-6">
          <div class="number">
            <i class="fa fa-file"></i>
            <h3 class="white-text"><span class="counter">45</span></h3>
            <span class="white-text">Projects completed</span>
          </div>
        </div>
        <!-- /number -->

      </div>
      <!-- /Row -->

    </div>
    <!-- /Container -->
  </div>




  <!-- Blog -->
  <div id="blog" class="section md-padding bg-grey">

    <!-- Container -->
    <div class="container">

      <!-- Row -->
      <div class="row">

        <!-- Section header -->
        <div class="section-header text-center">
          <h2 class="title">Lates news</h2>
        </div>
        <!-- /Section header -->

        <!-- blog -->
        @foreach( Menus::getNavbar(['NodeID' => 29]) as $latesNews )
        <div class="col-md-4">
          <div class="blog">
            <div class="blog-img">
              <img class="img-responsive" src="{{ asset( url(Storage::url($latesNews->medianode4)) ) }}" alt="">
            </div>
            <div class="blog-content">
              <ul class="blog-meta">
                <li><i class="fa fa-user"></i>Intercert Admin</li>
                <li><i class="fa fa-clock-o"></i>{{ date('d M y', strtotime($latesNews->created_at)) }}</li>
              </ul>
              <h3>{{ $latesNews->title }}</h3>
              <p>{!! strip_tags(substr($latesNews->content4, 0, 125)) !!}</p>
              <a href="{{ url($latesNews->alias) }}">Read more</a>
            </div>
          </div>
        </div>
        @endforeach
        <!-- /blog -->

      </div>
      <!-- /Row -->

    </div>
    <!-- /Container -->

  </div>
  <!-- /Blog -->





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
            <p>{{ App\Entities\Admin\Company::find(1)->Email }}</p>
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
