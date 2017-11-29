<!DOCTYPE html>

<html lang="en">
<title>Index</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
@include('layouts.style')
<style>
  .jscroll-loading{
    text-align: center;
  } 
</style>
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
            <div class="text-center gap-multiline-items-2 controls" id="filter_button" data-shuffle="filter">
              <button class="btn btn-outline btn-info active">All</button>
              @foreach($entity_types as $entity_type)
              <button class="btn btn-outline btn-info entity_type" class="control" data-group="{{$entity_type->type}}">{{$entity_type->type}}</button>
              @endforeach
            </div>
            
            <br><br>
          <div class="infinite-scroll">  
          <div class="row gap-y text-center"  data-shuffle="list">
          
             @foreach($entites as $entity)
              <div class="col-12 col-md-6 col-lg-4" data-shuffle="item" data-groups="{{$entity->type}}">
                <a class="portfolio">
                  <div class="shadow-2 hover-shadow-5 card-block" alt="demo helpato landing" style="height: 255px; background-image: linear-gradient(rgb(135, 224, 253) 0%, rgb(83, 203, 241) 40%, rgb(5, 171, 224) 100%);">
                    <h3><strong>{{$entity->name}}</strong></h3>
                    <button class="btn btn-xs btn-round btn-warning" style="color: white;font-weight: 900;font-size: 13px;background-image: linear-gradient(rgb(241, 231, 103) 0%, rgb(254, 182, 69) 100%);">{{$entity->type}}</button>
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
              </div>
              <div class="col-12 col-md-6 col-lg-4" data-shuffle="item" data-groups="{{$entity->type}}">
                <a class="portfolio">
                  <div class="shadow-2 hover-shadow-5 card-block" alt="demo helpato landing" style="height: 255px; background-image: linear-gradient(rgb(135, 224, 253) 0%, rgb(83, 203, 241) 40%, rgb(5, 171, 224) 100%);">
                    <h3><strong>{{$entity->name}}</strong></h3>
                    <button class="btn btn-xs btn-round btn-warning" style="color: white;font-weight: 900;font-size: 13px;background-image: linear-gradient(rgb(241, 231, 103) 0%, rgb(254, 182, 69) 100%);">{{$entity->type}}</button>
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
              </div>
              @endforeach
              <!--  -->
              <div class="row text-center">
                <ul class="pagination">
                {{ $entites->links() }}
                </ul>
              </div>

          </div>
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
<script src="js/config.js"></script>
<script src="js/jquery.jscroll.js"></script>
<script src="js/mixitup.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('#filter_button').toggle();
  $('#searchbutton').click(function() {
    $('#filter_button').toggle();
  });
});
</script>
<script>
  var containerEl = document.querySelector('.container');

  var mixer = mixitup(containerEl);
</script>
<script>
    $('ul.pagination').hide();
    $(function() {
      $('.infinite-scroll').jscroll({
          autoTrigger: true,
          loadingHtml: '<img class="center-block" src="images/loader.gif" alt="Loading..." />',
          padding: 0,
          nextSelector: '.pagination li.active + li a',
          contentSelector: 'div.infinite-scroll',
          callback: function() {
              $('ul.pagination').remove();
          }
      });
      
        // $('.entity_type').on("click", function(){
        //   $.ajax({
        //     type: "GET",
        //     url : './entitytype',
        //     data: {
        //       entity_type: $(this).text()
        //     },
        //     success: function(result){
        //       $('html').html(result);
        //     }
        //   });
        // });
    });
</script>
</html>