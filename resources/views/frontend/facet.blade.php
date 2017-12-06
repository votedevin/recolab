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
                <h3><strong>{{$facet->name}}</strong>  <code style="font-size: initial;">{{$facet->type}}</code></h3>
                <p>{{$facet->description}}</p>
              </div>
            </div>

            <div class="col-12 col-lg-4">

              <div class="bg-lighter p-20">
                <p class="text-center"><strong>Entities</strong></p>
                @foreach($sub_entities as $sub_entity)
                  @if($sub_entity->entity_name!='')
                  <p><a href="/entity_{{$sub_entity->entity_name}}" style="color: #0facf3;">{{$sub_entity->entity_name}}</a> <code>{{$sub_entity->entity_type}}</code></p>
                  @endif
                @endforeach
              <hr>

                <p class="text-center"><strong>Facets</strong></p>
                  @foreach($sub_facets as $sub_facet)
                    @if($sub_facet->facets_name!='')
                    <p><a href="facet_{{$sub_facet->facets_id}}" style="color: #0facf3;">{{$sub_facet->facets_name}}</a> <code>{{$sub_facet->facets_type}}</code></p>
                    @endif
                  @endforeach
              <hr>

                <p class="text-center"><strong>Resources</strong></p>
                 @foreach($sub_resources as $sub_resource)
                    @if($sub_resource->resources_name!='')
                      <p><a href="resource_{{$sub_resource->resources_name}}" style="color: #0facf3;">{{$sub_resource->resources_name}}</a> <code>{{$sub_resource->resources_type}}</code></p>
                    @endif
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
</html>
