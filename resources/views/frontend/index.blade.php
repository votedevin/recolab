<!DOCTYPE html>

<html lang="en">
<title>Index</title>

@include('layouts.style')
  <body>
  @include('layouts.topbar')

    <!-- Header -->
    <header class="header fadeout header-inverse pb-0 h-halfscreen" style="background-image: linear-gradient(to bottom, #243949 0%, #517fa4 100%);">
      <canvas class="constellation"></canvas>

      <div class="container">
        <div class="row h-half">
          <div class="col-12 text-center align-self-center">
            <h1 class="fs-50 fw-600 lh-15 hidden-sm-down">Built for <span class="text-primary" data-type="Authors, Startups, Entrepreneurs, SaaS, WebApps"></span></h1>
            <h1 class="fs-35 fw-600 lh-15 hidden-md-up">Built for<br><span class="text-primary" data-type="Authors, Startups, Entrepreneurs, SaaS, WebApps"></span></h1>
            <br>
            <p class="fs-20 hidden-sm-down"><strong>TheSaaS</strong> is an elegant, modern and fully customizable SaaS and WebApp template</p>
            <p class="fs-16 hidden-md-up"><strong>TheSaaS</strong> is an elegant, modern and fully customizable SaaS and WebApp template</p>

            <br>
            
            <form class="form-inline form-glass form-round justify-content-center" action="" method="post" target="_blank">
              <div class="input-group" style="width: 50%">
                <span class="input-group-addon"><i class="fa fa-search" style="font-size: 20px;"></i></span>
                <input type="text" class="form-control" placeholder="Search ..." style="font-size: 20px;">
              </div>
            </form>
          </div>

          <div class="col-12 align-self-end text-center pb-70">
            <!-- <a class="scroll-down-2 scroll-down-inverse" href="#" data-scrollto="section-demo"><span></span></a> -->
          </div>
        </div>
      </div>
    </header>
    <!-- END Header -->

    <!-- Main container -->
    <main class="main-content">

      <section class="section overflow-hidden" id="section-demo" style="padding-top: 0;">
        <div class="container">
          <div data-provide="shuffle" id="shuffle">
            <div class="row text-center">
            <button id="searchbutton" class="btn btn-round btn-white" style="font-size: 20px;border: 0;"><i class="fa fa-sliders"></i> Filter</button>
            </div>
            <div class="text-center gap-multiline-items-2" id="filter_button" data-shuffle="filter">
              <button class="btn btn-w-md btn-outline btn-round btn-info active" data-shuffle="button">All</button>
              <button class="btn btn-w-md btn-outline btn-round btn-info" data-shuffle="button" data-group="bag">Bag</button>
              <button class="btn btn-w-md btn-outline btn-round btn-info" data-shuffle="button" data-group="box">Box</button>
              <button class="btn btn-w-md btn-outline btn-round btn-info" data-shuffle="button" data-group="book">Book</button>
              <button class="btn btn-w-lg btn-outline btn-round btn-info" data-shuffle="button" data-group="bottle">Bottle</button>
            </div>
            
            <br><br>

          <div class="row gap-y text-center"  data-shuffle="list">
            
             @foreach($entites as $entity)
            <div class="col-12 col-md-6 col-lg-4" data-shuffle="item" data-groups="box">
              <a class="portfolio-1">
                <div class="shadow-2 hover-shadow-5 card-block" alt="demo helpato landing" style="height: 255px; background-color:  #2196F3;">
                  <h3><strong>{{$entity->name}}</strong></h3>
                  <button class="btn btn-xs btn-round btn-primary" style="color: white;font-weight: 900;font-size: 15px;">Type</button>
                  <p class="card-text" style="color: white;font-weight: 600;">{{str_limit($entity->description, 100)}}</p>
                  
                </div>
                <!-- <div class="portfolio-details" style="height: 100%;">
                  <div class="row" style="height: 60%;margin:0; ">
                    <div class="col-md-6" style="padding-top: 17%; background-color: #FFD180;">
                      <h5>Facets</h5>
                    </div>
                    <div class="col-md-6" style="padding-top: 17%; background-color: #1DE9B6;">
                      <h5>Entities</h5>
                    </div>
                  </div>
                  <div class="text-center" style="height: 20%; background-color: #00bcd4;padding-top: 2%;">
                    <h5>Links</h5>
                  </div>
                  <div class="text-center" style="height: 20%; background-color: #009495;padding-top: 2%;">
                    <h5>More Details</h5>
                  </div>
                </div> -->
              </a>
              <p><strong>Trello</strong></p>
            </div>
            @endforeach
          </div>


        </div>
      </section>

    </main>
    <!-- END Main container -->

@include('layouts.footer')
    <a class="scroll-top" href="#"><i class="fa fa-angle-up"></i></a>
@include('layouts.script')
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('#filter_button').toggle();
  $('#searchbutton').click(function() {
    $('#filter_button').toggle();
  });
});
</script>
</html>
