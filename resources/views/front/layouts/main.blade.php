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




  <!--====================================================
                      CONTACT HOME
  ======================================================-->
  <div class="overlay-contact-h"></div>
  <section id="contact-h" class="bg-parallax contact-h-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="contact-h-cont">
            <h3 class="cl-white">{{ Menus::getNodeWithImg(['NodeID' => 38])->title }}</h3><br>
            <form action="{{ route('comments.store') }}" method="post">
              @csrf
              <div class="form-group cl-white">
                <label for="name">Your Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter name" name="name" required> 
              </div>  
              <div class="form-group cl-white">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required> 
              </div>  
              <div class="form-group cl-white">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" aria-describedby="subjectHelp" placeholder="Enter subject" name="subject" required> 
              </div>  
              <div class="form-group cl-white">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3" required name="message"></textarea>
              </div>  
              <button class="btn btn-general btn-white" role="button"><i fa fa-right-arrow></i>GET CONVERSATION</button>
            </form>
          </div>
        </div>
      </div>
    </div>         
  </section> 

  <!--====================================================
                         NEWS
  ======================================================-->
  <section id="comp-offer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 col-sm-6  desc-comp-offer wow fadeInUp" data-wow-delay="0.2s">
          <h2>Latest News</h2>
          <div class="heading-border-light"></div> 
          <button class="btn btn-general btn-green" role="button">See More</button>
        </div>

        @foreach (Menus::getNavbar(['NodeID' => 29, 'limit' => 3]) as $element)
          <div class="col-md-3 col-sm-6 desc-comp-offer wow fadeInUp" data-wow-delay="0.4s">
            <div class="desc-comp-offer-cont">
              <div class="thumbnail-blogs">
                  <div class="caption">
                    <i class="fa fa-chain"></i>
                  </div>
                  <img src="{{ url(Storage::url($element->medianode1)) }}" class="img-fluid" alt="...">
              </div>
              <h3>{{ $element->title }}</h3>
              <p class="desc">{!! $element->content4 !!}</p>
              <a href="{{ $element->alias }}"><i class="fa fa-arrow-circle-o-right"></i> Learn More</a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!--====================================================
                        FOOTER
  ======================================================--> 
      <footer> 
          <div id="footer-s1" class="footer-s1">
            <div class="footer">
              <div class="container">
                <div class="row">
                  <!-- About Us -->
                  <div class="col-md-3 col-sm-6 ">
                    <div><img src="{{ url(Storage::url(Menus::getNodeWithImg(['NodeID' => 33])->medianode1)) }}" alt="" class="img-fluid"></div>
                    <ul class="list-unstyled comp-desc-f">
                       <li>{!! Menus::getNodeWithImg(['NodeID' => 33])->content1 !!}</li> 
                    </ul><br> 
                  </div>
                  <!-- End About Us -->

                  <!-- Recent News -->
                  <div class="col-md-3 col-sm-6 ">
                    <div class="heading-footer"><h2>Useful Links</h2></div>
                    <ul class="list-unstyled link-list">
                      @foreach ( Menus::getNavbar(['NodeID' => 1]) as $elfoot )
                        <li>
                          @if ( count(Menus::getNavbar(['NodeID' => $elfoot->id])) > 0 )
                            <a href="{{ Menus::getNavbar(['NodeID' => $elfoot->id])[0]->alias }}">{{ $elfoot->title }}</a>
                          @else
                            <a href="{{ $elfoot->alias }}">{{ $elfoot->title }}</a>
                          @endif
                          <i class="fa fa-angle-right"></i>
                        </li>
                      @endforeach 
                    </ul>
                  </div>
                  <!-- End Recent list -->

                  <!-- Recent Blog Entries -->
                  <div class="col-md-3 col-sm-6 ">
                    <div class="heading-footer"><h2>Recent Post Entries</h2></div>
                    <ul class="list-unstyled thumb-list">
                      @foreach (Menus::getNavbar(['NodeID' => 29, 'limit' => 2]) as $element)
                        <li>
                          <div class="overflow-h">
                            <a href="{{ Url('/'.$element->alias) }}">{{ $element->title }}.</a>
                            <small>{{ date('d M, Y', strtotime($element->created_at)) }}</small>
                          </div>
                        </li>
                      @endforeach
                    </ul>
                  </div>
                  <!-- End Recent Blog Entries -->

                  <!-- Latest Tweets -->
                  <div class="col-md-3 col-sm-6">
                    <div class="heading-footer"><h2>Get In Touch</h2></div>
                    <address class="address-details-f">
                      {!! str_replace("</p>", "", str_replace("<p>", "", App\Entities\Admin\Company::find(1)->DeliveryCondition))  !!}<br />
                      Phone: {{  App\Entities\Admin\Company::find(1)->phone1 }} <br>
                      Fax: {{  App\Entities\Admin\Company::find(1)->phone2 }} <br>
                      Email: <a href="mailto:{{ App\Entities\Admin\Company::find(1)->Email }}">{{ App\Entities\Admin\Company::find(1)->Email }}</a>
                    </address>  
                    <ul class="list-inline social-icon-f top-data">
                      <li><a href="#" target="_empty"><i class="fa top-social fa-facebook"></i></a></li>
                      <li><a href="#" target="_empty"><i class="fa top-social fa-twitter"></i></a></li>
                      <li><a href="#" target="_empty"><i class="fa top-social fa-google-plus"></i></a></li> 
                    </ul>
                  </div>
                  <!-- End Latest Tweets -->
                </div>
              </div><!--/container -->
            </div> 
          </div>

          <div id="footer-bottom">
              <div class="container">
                  <div class="row">
                      <div class="col-md-12">
                          <div id="footer-copyrights">
                              <p>Copyrights &copy; 2018 All Rights Reserved by WCS Indonesia. 
                              @foreach (Menus::getNavbar(['NodeID' => 33, 'limit' => 2]) as $term)
                              <a href="{{ $term->alias }}">{{ $term->title }}</a> 
                              {{-- <a href="#">Terms of Services</a> --}}
                              @endforeach
                              </p>
                          </div>
                      </div> 
                  </div>
              </div>
          </div>
          <a href="#home" id="back-to-top" class="btn btn-sm btn-green btn-back-to-top smooth-scrolls hidden-sm hidden-xs" title="home" role="button">
              <i class="fa fa-angle-up"></i>
          </a>
      </footer>

      <!--Global JavaScript -->
      <script src="{{ asset('theme/js/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('theme/js/popper/popper.min.js') }}"></script>
      <script src="{{ asset('theme/js/bootstrap/bootstrap.min.js') }}"></script>
      <script src="{{ asset('theme/js/wow/wow.min.js') }}"></script>
      <script src="{{ asset('theme/js/owl-carousel/owl.carousel.min.js') }}"></script>

      <!-- Plugin JavaScript -->
      <script src="{{ asset('theme/js/jquery-easing/jquery.easing.min.js') }}"></script> 
      <script src="{{ asset('theme/js/custom.js') }}"></script> 

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
