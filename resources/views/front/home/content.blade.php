@extends('front.layouts.main')

@section('title')
Madu Pay | {{ $node->title }}
@endsection

@section('subtitle')
{{ $node->title }}
@endsection

@section('parent')
{{ $parent }}
@endsection

@section('keywords')
$node->keyword
@endsection

@section('description')
$node->description
@endsection

@section('css')
{{-- <link rel="stylesheet" href="{{ asset('theme/css/about.css') }}"> --}}
@endsection

@section('js')
  <script>
    $(document).ready(function(){

    });
  </script>
@endsection


@section('content')

<!-- Blog -->
<div id="blog" class="section md-padding" style="padding-top: 50px;">

  <!-- Container -->
  <div class="container">

    <!-- Row -->
    <div class="row">

      <!-- Main -->
      <main id="main" class="col-md-9">
        <div class="blog">
          <div class="blog-img" style="border: 1px solid;border-radius: 10px;">
            @if( isset($node->getImages) )
              <img
                  class="img-responsive"
                  src="{{ url(Storage::url($node->getImages->path)) }}"
                  alt=""
                  style="max-width: 100%;margin: auto">
            @endif

          </div>
          <div class="blog-content">
            {{-- <ul class="blog-meta">
              <li><i class="fa fa-user"></i>John doe</li>
              <li><i class="fa fa-clock-o"></i>18 Oct</li>
              <li><i class="fa fa-comments"></i>57</li>
            </ul> --}}
            {!! $node->content1 !!}
          </div>


        </div>
      </main>
      <!-- /Main -->


      <!-- Aside -->
      <aside id="aside" class="col-md-3">

        <!-- Search -->
        <div class="widget">
          <div class="widget-search">
            <input class="search-input" type="text" placeholder="search">
            <button class="search-btn" type="button"><i class="fa fa-search"></i></button>
          </div>
        </div>
        <!-- /Search -->

        <!-- Category -->
        <div class="widget">
          <h3 class="title">{{ $parent }}</h3>
          <div class="widget-category">
            @foreach($aside as $a)
              <a href="{{url($a->alias)}}">{{ $a->title }}</a>
            @endforeach
          </div>
        </div>
        <!-- /Category -->

      </aside>
      <!-- /Aside -->

    </div>
    <!-- /Row -->

  </div>
  <!-- /Container -->

</div>
<!-- /Blog -->

@endsection
