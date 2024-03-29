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
<style type="text/css">
  .panel-primary {
      border-color: #337ab7 !important;
  }
  .panel-group .panel {
      margin-bottom: 0;
      border-radius: 4px;
  }
  .panel-group .panel+.panel {
      margin-top: 5px;
  }
  .panel {
      margin-bottom: 20px;
      background-color: #fff;
      border: 1px solid transparent;
      border-radius: 4px;
      -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
      box-shadow: 0 1px 1px rgba(0,0,0,.05);
  }
  .panel-primary>.panel-heading {
      color: #fff;
      background-color: #337ab7;
      border-color: #337ab7;
  }
  .panel-group .panel-heading {
      border-bottom: 0;
  }
  .panel-heading {
      padding: 10px 15px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 3px;
      border-top-right-radius: 3px;
  }
  .panel-body {
      padding: 15px;
  }
  .notif > p {
    margin-top: 0px;
    margin-bottom: 0px;
  }
  .cert-img-show{
    padding: 15px;
    border: 1px dashed #ccc;
    background: #5eadeb;
  }
  .cert-active{
    text-align: center;
    background: #4643438c;
    font-size: 32px;
    padding-top: 5px;
    color: #fff;
    margin-bottom: 0px;
    font-weight: 600;
  }
</style>
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

          <div class="blog-content">

              @if (\Session::has('success'))
                <div class="alert alert-success notif">
                    <p>{{ Session::get('success') }}</p>
                </div><br />
              @endif

              @if (\Session::has('failed'))
                <div class="alert alert-danger notif">
                    <p>{{ Session::get('failed') }}</p>
                </div><br />
              @endif

              <div class="comment-box-sn">
                <div class="panel panel-primary">
                  <div class="panel-heading">Certificate Check</div>
                  <div class="panel-body">
                    {!! Form::open(['route'=> ['certificates.show-front', $node->id] , 'method' => 'GET', 'files'=>true]) !!}
                      <input type="text" name="company_name" placeholder="Fill your company name" class="form-control" value="{{ $cert->company_name }}"><br>
                      <input type="text" name="certificate_no" placeholder="Certificate nomor" class="form-control" value="{{ $cert->certificate_no }}"><br>
                      <button class="btn btn-general btn-green" style="width: 100%;" type="submit">Check</button>
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>

              @if (Session::has('success'))
                <div class="cert-img-show">
                  <div class="cert-active">Active</div>
                  <a href="{{ url(Storage::url($cert->file)) }}">
                    <img src="{{ url(Storage::url($cert->file)) }}"
                    title="{{ $cert->certificate_no }}" class="img-responsive"
                    style="display: block;
                            margin-left: auto;
                            margin-right: auto;
                            max-width: 100%;" />
                  </a>
                </div>
              @endif

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
