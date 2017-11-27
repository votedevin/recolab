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
<link href="css/reset.css" rel="stylesheet"/>
<link href="css/style.css" rel="stylesheet"/>
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
 




            <div class="controls">
              <button type="button" class="control" data-filter="all">All</button>
              <button type="button" class="control" data-toggle=".red"></button>
              <button type="button" class="control" data-toggle=".blue">Blue</button>
              <button type="button" class="control" data-toggle=".pink">Pink</button>
              
            </div>
            <div class="container">
              <div class="mix green"></div>
              <div class="mix green">55555555</div>
              <div class="mix blue"></div>
              <div class="mix pink"></div>
              <div class="mix green"></div>
              <div class="mix blue"></div>
              <div class="mix pink"></div>
              <div class="mix blue"></div>

              <div class="gap"></div>
              <div class="gap"></div>
              <div class="gap"></div>
            </div>



  
    <!-- END Main container -->

@include('layouts.footer')
    <a class="scroll-top" href="#"><i class="fa fa-angle-up"></i></a>
@include('layouts.script')
</body>

<script src="js/mixitup.min.js"></script>

<script>
  var containerEl = document.querySelector('.container');

  var mixer = mixitup(containerEl);
</script>
<!-- <script>
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
</script> -->
</html>
