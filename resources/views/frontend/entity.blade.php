<!DOCTYPE html>

<html lang="en">
<title>Index</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
@include('layouts.style')
<link href="https://raw.githubusercontent.com/kartik-v/bootstrap-star-rating/master/css/star-rating.min.css" rel="stylesheet">
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
  a{
    color: #0facf3 !important;
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
            
            <form class="form-inline form-glass form-round justify-content-center" action="/search_find" method="post">
              <div class="input-group" style="width: 50%">
                <span class="input-group-addon"><i class="fa fa-search" style="font-size: 20px;"></i></span>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" class="form-control" placeholder="Search ..." style="font-size: 20px;" name="find"/>
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
              <a href="/" class="btn btn-outline btn-danger entity_type">All</a>
              @foreach($entity_types as $entity_type)
              <a href="type_{{$entity_type->type}}" class="btn btn-outline btn-info entity_type">{{$entity_type->type}}</a>
              @endforeach
              @foreach($facet_types as $facet_type)
              <a href="type_{{$facet_type->type}}" class="btn btn-outline btn-success entity_type">{{$facet_type->type}}</a>
              @endforeach
              @foreach($resource_types as $resource_type)
              <a href="type_{{$resource_type->type}}" class="btn btn-outline btn-warning entity_type">{{$resource_type->type}}</a>
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
                  <a href="/facet_{{$facet->facets_id}}" style="display: inline;">{{$facet->facets_name}}, </a>
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
                @if($entity->locations!='')
                  @foreach($locations as $location)
                    <p style="display: inline;">{{$location->name}}: {{$location->address}}</p>
                  @endforeach
                @endif
                <p style="display: inline;">{{$entity->geographic_reach}}</p>
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
              @if($entity->images_url!='')
              <div class="bg-lighter p-20 mb-20">

                <div class="slideshow-container">
                  @foreach($images as $image)
                  @if($image!='')
                  <div class="mySlides fade" style="opacity: 1;">
                    
                    <img src="{{$image}}" style="width:100%">
                  </div>
                  @endif
                  @endforeach

                </div>
                  <br>

                <div style="text-align:center">
                  @foreach($images as $key => $image)
                    @if($image!='')
                    <span class="dot" onclick="currentSlide({{ $key + 1}})"></span> 
                    @endif
                  @endforeach
                </div>

              </div>
              @endif
              <div class="bg-lighter p-20">
                <p class="text-center"><strong>Entities</strong></p>             
                  @foreach($sub_entities as $sub_entity)
                    @if($sub_entity->entity_name!='')
                      <p><a href="/entity_{{$sub_entity->entity_name}}" style="color: #0facf3;">{{$sub_entity->entity_name}}</a> - <code>{{$sub_entity->entity_type}}</code></p>
                    @endif
                  @endforeach             
              <hr>

                <p class="text-center"><strong>Facets</strong></p>
                  @foreach($sub_facets as $sub_facet)
                    @if($sub_facet->facets_name!='')
                      <p><a href="facet_{{$sub_facet->facets_id}}" style="color: #0facf3;">{{$sub_facet->facets_name}}</a> - <code>{{$sub_facet->facets_type}}</code></p>
                    @endif
                  @endforeach
              <hr>

                <p class="text-center"><strong>Resources</strong></p>
                  @foreach($sub_resources as $sub_resource)
                    @if($sub_resource->resources_name!='')
                      <p><a href="resource_{{$sub_resource->resources_name}}" style="color: #0facf3;">{{$sub_resource->resources_name}}</a> - <code>{{$sub_resource->resources_type}}</code></p>
                    @endif
                  @endforeach
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- END Main container -->
    <a class="scroll-top" href="#"><i class="fa fa-angle-up" style="color: white;"></i></a>
@include('layouts.script')
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
</html>
