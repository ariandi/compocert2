@extends('front.layouts.main')

@section('title')
WCS Indonesia | Certification Body
@endsection

@section('keywords')
Home
@endsection

@section('description')
Home
@endsection

@section('css')
@endsection

@section('js')
  <script>
    $(document).ready(function(){
     
    });
  </script>
@endsection


@section('content')

  <div id="about" class="section md-padding">
    <!-- Container -->
    <div class="container">
      <!-- Row -->
      <div class="row">
        <!-- Section header -->
        <div class="section-header text-center">
          <h2 class="title">{{ $website->title }}</h2>
        </div>
        <!-- /Section header -->

        @foreach($websiteChild as $wC)
          <div class="col-md-4">
            <div class="about">
              <i class="{{ $wC->keyword }}"></i>
              <h3>{{ $wC->title }}</h3>
              <p>{{ $wC->description }}</p>
              <a href="#">Read more</a>
            </div>
          </div>
        @endforeach

      </div>
      <!-- /Row -->
    </div>
    <!-- /Container -->
  </div>


      

  <div id="service" class="section md-padding" style="background: #ccc7c7">
    <!-- Container -->
    <div class="container">
      <!-- Row -->
      <div class="row">

        <!-- Section header -->
        <div class="section-header text-center">
          <h2 class="title">{{ $whatWeOffer->title }}</h2>
        </div>
        <!-- /Section header -->

        @foreach( $whatWeOfferChild as $wwoc )
          <div class="col-md-4 col-sm-6">
            <div class="service">
              <i class="fa fa-diamond"></i>
              <h3>{{ $wwoc->title }}</h3>
              <p>{{ substr(strip_tags( $wwoc->content1 ), 0, 75) }}...</p>
              <a href="{{ url($wwoc->alias) }}">Read More</a>
            </div>
          </div>
        @endforeach

      </div>
      <!-- /Row -->
    </div>
    <!-- /Container -->
  </div>

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

@endsection
