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
            {!! $node->content1 !!}
          </div>

          <div>
            <form action="{{ route('comments.store-front') }}" method="post">
              @csrf
              <div class="row con-form">
                <div class="col-md-4">
                  <input type="text" name="name" placeholder="Full Name" class="form-control" required>
                </div>
                <div class="col-md-4">
                  <input type="text" name="email" placeholder="Email" class="form-control" name="email" required>
                </div>
                <div class="col-md-4">
                  <input type="text" name="subject" placeholder="Subject" class="form-control" required>
                </div>
                <div class="col-md-12"><textarea name="message" id="" placeholder="Message" style="padding: 15px;" required></textarea></div>
                <div class="col-md-12 sub-but"><button class="btn btn-general btn-white" role="button">Send</button></div>
              </div>
            </form>
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
          <h3 class="title">Address</h3>
          <div class="widget-category">
            <div class="contact-p1-cont2">
              <address class="address-details-f">
                {!! str_replace("</p>", "", str_replace("<p>", "", App\Entities\Admin\Company::find(1)->DeliveryCondition))  !!}<br />
                Phone: {{  App\Entities\Admin\Company::find(1)->phone1 }} <br>
                Fax: {{  App\Entities\Admin\Company::find(1)->phone2 }} <br>
                Email: {{ App\Entities\Admin\Company::find(1)->Email }}
              </address>
            </div>
          </div>
        </div>
        <!-- /Category -->

      </aside>
      <!-- /Aside -->

      <div class="col-md-12">
          <div id="map">
            <div class="map-responsive">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3781286227627!2d106.81791161476907!3d-6.213760395501839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f401bd149845%3A0xfab22c8daef828ee!2sMayapada+Tower%2C+Jl.+Jend.+Sudirman+No.Kav.28%2C+RT.4%2FRW.2%2C+Kuningan%2C+Karet%2C+Kecamatan+Setiabudi%2C+Kota+Jakarta+Selatan%2C+Daerah+Khusus+Ibukota+Jakarta+12920!5e0!3m2!1sen!2sid!4v1538155980831" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
      </div>

    </div>
    <!-- /Row -->

  </div>
  <!-- /Container -->

</div>
<!-- /Blog -->

@endsection
