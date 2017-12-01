<!DOCTYPE html>

<html lang="en">
<title>Index</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
@include('layouts.style')
<link href="https://raw.githubusercontent.com/kartik-v/bootstrap-star-rating/master/css/star-rating.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
  .jscroll-loading{
    text-align: center;
  }
  .hover-shadow-5:hover, .portfolio-2 img:hover {
    box-shadow: 0 0 45px rgba(0, 0, 0, 0.5);
  }
  .fa-star {
    color: orange;
  }
  code{
    background-color: palegoldenrod;
  }
  h3{
    font-family: "Open Sans";
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
            <div class="text-center gap-multiline-items-2" id="filter_button" data-shuffle="filter">
              <button class="btn btn-outline btn-info active" data-shuffle="button">All</button>
              @foreach($entity_types as $entity_type)
              <button class="btn btn-outline btn-info" data-shuffle="button" data-group="{{$entity_type->type}}">{{$entity_type->type}}</button>
              @endforeach
            </div>
            <br>
            <br>
          </div>  
          <div class="row">
            <div class="col-12 col-lg-8">
              <div class="bg-lighter p-20">
                <h3><strong>{{$entity->name}} </strong>@if($entity->abbreviation!='')({{$entity->abbreviation}})@endif</h3>
                <code><strong>{{$entity->type}}</strong></code>
                <div class="row pl-20">
                @foreach($facets as $facet)
                  <p style="display: inline;">{{$facet->facets_name}}, </p>
                @endforeach
                </div>
                <div class="row" style="padding-top: 10px;padding-left: 20px;"> 
                  @if($entity->website!='')
                    <a href="//{{$entity->website}}" target="_blank" class="btn btn-sm btn-circular btn-success" style="margin-right: 3px;"><img src="images/49479-200.png" width="30" height="30"></a>
                  @endif
                  @if($entity->get_involved!='')
                    <a class="btn btn-sm btn-circular btn-warning" href="//{{$entity->get_involved}}" style="margin-right: 3px;"><img src="images/engage-involved-join-participate-share-37d5c530994f0c8a-512x512.png" width="30" height="30"></a></i></a>
                  @endif
                  @if($entity->rss!='')
                    <a class="social-rss btn btn-sm btn-circular btn-danger" href="//{{$entity->rss}}" style="margin-right: 3px;"><i class="fa fa-rss"></i></a>
                  @endif
                  @if($entity->twitter!='')
                    <a class="btn btn-sm btn-circular btn-primary social-twitter" href="//{{$entity->twitter}}" style="margin-right: 3px;"><i class="fa fa-twitter"></i></a>
                  @endif
                </div>
                <hr>
                <p><strong>Description</strong> - {{$entity->description}}</p>
                <hr>
                <p><strong>Usability</strong> - @for($i=1; $i<=$entity->usability; $i++)
                  <span class="fa fa-star" data-rating="{{$i}}"></span>
                @endfor</p>
                <p><strong>Maintenance</strong> - {{$entity->status}}</p>
                <hr>
                <p><strong>Geographic Research</strong></p>
                <p>{{$entity->locations}} {{$entity->geographic_reach}}</p>
                <hr>
                <p><strong>Additional Info</strong></p>
              </div>
              <div class="bg-lighter p-20 mt-20">
                <h3>Meta</h3>
                <div class="row">
                  <div class="col-sm-6">
                    <p><strong>Date Added</strong> - {{$entity->date_added}}</p>
                    <p><strong>Date Updated</strong> - </p>
                    <p><strong>Source</strong> - {{$entity->source}}</p>
                    <p><strong>Source Date Added</strong> - {{$entity->source_date_added}}</p>
                  </div>
                  <div class="col-sm-6">
                    <p><strong>Slug</strong> - {{$entity->slug}}</p>
                    <p><strong>IID</strong> - {{$entity->iid}}</p>
                    <p><strong>UID</strong> - {{$entity->uid}}</p>
                  </div>
                </div>
              </div>
            </div>
            @php
            $images=explode(',', $entity->images_url);
            @endphp

            <div class="col-12 col-lg-4">
              <div class="bg-lighter p-20 mb-20">
                <div class="w3-content w3-display-container">
                  @foreach($images as $image)
                  <img class="mySlides" src="{{$image}}" style="width:100%">
                  @endforeach
                  <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
                </div>
              </div>

              <div class="bg-lighter p-20">
                <p class="text-center"><strong>Entities</strong></p>
                @foreach($sub_entities as $sub_entity)
                  <p>{{$sub_entity->entity_name}} - {{$sub_entity->entity_type}}</p>
                @endforeach
              <hr>

                <p class="text-center"><strong>Facets</strong></p>
                  @foreach($sub_facets as $sub_facet)
                    <p>{{$sub_facet->facets_name}} - {{$sub_facet->facets_type}}</p>
                  @endforeach
              <hr>

                <p class="text-center"><strong>Resources</strong></p>
                  @foreach($sub_resources as $sub_resource)
                    <p>{{$sub_resource->resources_name}} - {{$sub_resource->resources_type}}</p>
                  @endforeach
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- END Main container -->
    <a class="scroll-top" href="#"><i class="fa fa-angle-up"></i></a>
@include('layouts.script')
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/config.js"></script>
<script src="js/jquery.jscroll.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('#filter_button').toggle();
  $('#searchbutton').click(function() {
    $('#filter_button').toggle();
  });
});
</script>
<script>
      
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

</script>
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>
</html>
