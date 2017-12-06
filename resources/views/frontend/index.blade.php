<!DOCTYPE html>

<html lang="en">
<title>Index</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
@include('layouts.style')
<style>
  .jscroll-loading{
    text-align: center;
  }
  .hover-shadow-5:hover, .portfolio-2 img:hover {
    box-shadow: 0 0 45px rgba(0, 0, 0, 0.5);
  } 
</style>
  <body>
  @include('layouts.topbar')

    <!-- Header -->
    <header class="header header-inverse bg-fixed" style="background-image: url(images/bg-laptop.jpg)" data-overlay="8">
      <div class="container text-center">
        <div class="row">
          <div class="col-12 col-lg-8 offset-lg-2">
            <h1>{{$posts->title}}</h1>
            <br>
            <p class="fs-18 opacity-70">{!! $posts->body  !!}</p>
            <br>
            <form class="form-inline form-glass form-round justify-content-center" action="/search_find" method="post">
              <div class="input-group" style="width: 70%">
                <span class="input-group-addon"><i class="fa fa-search" style="font-size: 20px;"></i></span>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" class="form-control" placeholder="Search ..." style="font-size: 20px;" name="find"/>
              </div>
            </form>
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
            <div class="text-center gap-multiline-items-2" id="filter_button" style="display: none;">
              <a href="/" class="btn btn-outline btn-danger entity_type">All</a>
              @foreach($entity_types as $entity_type)
                <a href="type_{{$entity_type->type}}" class="btn btn-outline btn-info">{{$entity_type->type}}</a>
              @endforeach
              @foreach($facet_types as $facet_type)
              <a href="type_{{$facet_type->type}}" class="btn btn-outline btn-success">{{$facet_type->type}}</a>
              @endforeach
              @foreach($resource_types as $resource_type)
              <a href="type_{{$resource_type->type}}" class="btn btn-outline btn-warning">{{$resource_type->type}}</a>
              @endforeach

            </div>
            
            <br><br>
          <div class="infinite-scroll">  
            <div class="row gap-y text-center">
            
               @foreach($entities as $key => $entity)
                <div class="col-12 col-md-6 col-lg-4"  data-aos="fade-up" data-aos-delay="0">
                    <div class="shadow-2 card-block p-0" alt="demo helpato landing" style="height: 270px;border: 5px solid #0facf3;">
                      <div class="row m-0">
                        <div class="col-sm-12 p-0">
                          <a href="type_{{$entity->type}}" class="btn btn-outline btn-primary m-0 w-full"  style="border-radius: 0;">{{$entity->type}}</a>
                        </div>
                      </div>
                      <h3 style="font-size: 20px; padding: 5%;"><strong>{{str_limit($entity->name,50)}}</strong></h3>
                      <hr style="color: white;font-weight: 900;font-size: 13px;background-image: linear-gradient(to bottom, #b5b9bf 0%, #b5b9bf 100%); margin-left: 10px;margin-right: 10px; height: 1px; margin: 1rem;"></hr>
                      <p class="card-text">{{str_limit($entity->description, 80)}}</p>
                      <div class="row" style="position: absolute;top: 245px;left: 30px;width: 91%;">
                        <div class="col-sm-6 p-0 text-left"> 
                            @if($entity->website!='')
                              <a href="//{{$entity->website}}" target="_blank" class="btn btn-sm btn-outline btn-primary p-5" style="width: 25%;margin-right: -5px;"><img src="images/49479-200.png" width="26" height="26"></a>
                            @endif
                            @if($entity->get_involved!='')
                              <a class="btn btn-sm btn-outline btn-primary p-5" href="//{{$entity->get_involved}}" style="width:25%;"><img src="images/engage-involved-join-participate-share-37d5c530994f0c8a-512x512.png" width="26" height="26"></a>
                            @endif
                            @if($entity->rss!='')
                              <a class="social-rss btn btn-sm btn-outline btn-primary p-5" href="//{{$entity->rss}}" style="width: 25%;"><i class="fa fa-rss"></i></a>
                            @endif
                            @if($entity->twitter!='')
                              <a class="btn btn-sm btn-outline btn-primary social-twitter p-5" href="//{{$entity->twitter}}"  style="width: 25%;"><i class="fa fa-twitter"></i></a>
                            @endif
                        </div>
                        <div class="col-sm-6 p-0">
                          <a class="btn btn-outline btn-primary m-0 w-full" href="/entity_{{$entity->name}}">Read more</a>
                        </div>
                      </div>
                    </div> 

                </div>
                @endforeach
                @foreach($facets as $key => $facet)
                <div class="col-12 col-md-6 col-lg-4"  data-aos="fade-up" data-aos-delay="0">
                    <div class="shadow-2 hover-shadow-5 card-block  p-0" alt="demo helpato landing" style="height: 270px; border: 5px solid #46da60;">
                      <div class="row m-0">
                        <div class="col-sm-12 p-0">
                          <a href="type_{{$facet->type}}" class="btn btn-outline btn-success m-0 w-full"  style="border-radius: 0;">{{$facet->type}}</a>
                        </div>
                      </div>
                      <h3 style="font-size: 20px; padding: 5%;"><strong>{{str_limit($facet->name,50)}}</strong></h3>
                      <hr style="color: white;font-weight: 900;font-size: 13px;background-image: linear-gradient(to bottom, #b5b9bf 0%, #b5b9bf 100%); margin-left: 10px;margin-right: 10px; height: 1px; margin: 1rem;"></hr>
                      <p class="card-text">{{str_limit($facet->description, 80)}}</p>
                        <div class="row" style="position: absolute;top: 245px;left: 30px;width: 91%;">
                          <div class="col-sm-6 p-0"></div>
                          <div class="col-sm-6 p-0">
                            <a class="btn btn-outline btn-success m-0 w-full" href="/facet_{{$facet->id}}">Read more</a>
                          </div>
                        </div>
                    </div> 
                </div>
                @endforeach
                @foreach($resources as $key => $resource)
                @if($resource->id!='')
                <div class="col-12 col-md-6 col-lg-4"  data-aos="fade-up" data-aos-delay="0">
                  <div class="shadow-2 hover-shadow-5 card-block p-0" alt="demo helpato landing" style="height: 270px;border: 5px solid #ffbe00;">
                    <div class="row m-0">
                      <div class="col-sm-12 p-0">
                        <a href="type_{{$resource->type}}" class="btn btn-outline btn-warning m-0 w-full"  style="border-radius: 0;">{{$resource->type}}</a>
                      </div>
                    </div>
                    <h3 style="font-size: 20px;padding: 5%;"><strong>{{str_limit($resource->name, 50)}}</strong></h3>
                    <hr style="color: white;font-weight: 900;font-size: 13px;background-image: linear-gradient(to bottom, #b5b9bf 0%, #b5b9bf 100%); margin-left: 10px;margin-right: 10px; height: 1px; margin: 1rem;"></hr>
                    <p class="card-text">{{str_limit($resource->description, 80)}}</p>
                    <div class="row" style="position: absolute;top: 245px;left: 30px;width: 91%;">
                      <div class="col-sm-6 p-0  text-left">
                        @if($resource->link!='')
                          <a href="//{{$resource->link}}" target="_blank" class="btn btn-sm btn-outline btn-warning p-5" style="width: 25%;margin-right: -5px;"><img src="images/49479-200.png" width="26" height="26"></a>
                        @endif
                      </div>
                      <div class="col-sm-6 p-0">
                        <a class="btn btn-outline btn-warning m-0 w-full" href="/resource_{{$resource->name}}">Read more</a>
                      </div>
                    </div> 
                  </div>
                </div>
                @endif
                @endforeach
                <!--  -->
                <div class="row text-center">
                  <ul class="pagination">
                  {{ $entities->links() }}
                  {{ $facets->links() }}
                  {{ $resources->links() }}
                  </ul>
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
  $('#searchbutton').click(function() {
    $('#filter_button').toggle();
  });
});
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
