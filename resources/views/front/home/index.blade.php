@extends('front.layouts.main')

@section('title')
Intercert Indonesia | {{ $node->title }}
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
              {{-- <i class="{{ $wC->keyword }}"></i> --}}
              <img src="{{ url( Storage::url($wC->path) ) }}" style="margin-bottom: 15px;">
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

@endsection
