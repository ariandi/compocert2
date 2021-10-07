<!-- home wrapper -->
<div class="home-wrapper">
  <div class="container">
    <div class="row">

      <!-- home content -->
      <div class="col-md-10 col-md-offset-1">
        <div class="home-content">
          <h1 class="white-text">{{ App\Entities\Admin\Node::find(37)->title }}</h1>
          <p class="white-text">{{ App\Entities\Admin\Node::find(37)->description }}</p>
          <a class="white-btn" href="{{ url('certificate') }}">Certificate Check</a>
          <button class="main-btn">Learn more</button>
        </div>
      </div>
      <!-- /home content -->

    </div>
  </div>
</div>
<!-- /home wrapper -->
