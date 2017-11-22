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
            
            <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0" data-shuffle="item" data-groups="box">
              <a class="portfolio-1" href="demo-helpato.html">
                <img class="shadow-2 hover-shadow-5" src="assets/img/demo-helpato-sm.jpg" alt="demo helpato landing">
                <div class="portfolio-details" style="height: 100%;">
                    <div class="row" style="height: 60%;">
                      <div class="col-md-6" style="padding-top: 20%">
                        <h5>Facets</h5>
                      </div>
                      <div class="col-md-6" style="padding-top: 20%">
                        <h5>Entities</h5>
                      </div>
                    </div>
                    <div class="text-center" style="height: 20%;">
                      <h5>Links</h5>
                    </div>
                    <div class="text-center" style="height: 20%;"><h5>More Details</h5></div>
                  </div>
              </a>
              <p><strong>Helpato</strong></p>
            </div>


            <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="150" data-shuffle="item" data-groups="book">
              <p><a href="demo-trello.html"><img class="shadow-2 hover-shadow-5" src="assets/img/demo-trello-sm.jpg" alt="demo helpato landing"></a></p>
              <p><strong>Trello</strong></p>
            </div>


            <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300" data-shuffle="item" data-groups="box">
              <p><a href="demo-gmail.html"><img class="shadow-2 hover-shadow-5" src="assets/img/demo-gmail-sm.jpg" alt="demo helpato landing"></a></p>
              <p><strong>Gmail</strong></p>
            </div>


            <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0" data-shuffle="item" data-groups="bottle">
              <p><a href="demo-skype.html"><img class="shadow-2 hover-shadow-5" src="assets/img/demo-skype-sm.jpg" alt="demo helpato landing"></a></p>
              <p><strong>Skype</strong></p>
            </div>


            <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="150" data-shuffle="item" data-groups="bottle">
              <p><a href="demo-github.html"><img class="shadow-2 hover-shadow-5" src="assets/img/demo-github-sm.jpg" alt="demo github landing"></a></p>
              <p><strong>GitHub</strong></p>
            </div>


            <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300" data-shuffle="item" data-groups="bag">
              <p><a href="demo-app.html"><img class="shadow-2 hover-shadow-5" src="assets/img/demo-app-sm.jpg" alt="demo app landing"></a></p>
              <p><strong>Mobile App</strong></p>
            </div>


            <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0" data-shuffle="item" data-groups="bottle">
              <p><a href="demo-bootstrap.html"><img class="shadow-2 hover-shadow-5" src="assets/img/demo-bootstrap-sm.jpg" alt="demo bootstrap landing"></a></p>
              <p><strong>Bootstrap</strong></p>
            </div>


            <div class="col-12 col-md-6 col-lg-4 hidden-sm-down" data-aos="fade-up" data-aos-delay="150" data-shuffle="item" data-groups="book">
              <p><a href="demo-slack.html"><img class="shadow-2 hover-shadow-5" src="assets/img/demo-slack-sm.jpg" alt="demo slack landing"></a></p>
              <p><strong>Slack</strong></p>
            </div>


            <div class="col-12 col-md-6 col-lg-4 hidden-sm-down" data-aos="fade-up" data-aos-delay="300" data-shuffle="item" data-groups="book">
              <p><a href="demo-zendesk.html"><img class="shadow-2 hover-shadow-5" src="assets/img/demo-zendesk-sm.jpg" alt="demo zendesk landing"></a></p>
              <p><strong>Zendesk</strong></p>
            </div>

          </div>


        </div>
      </section>

    </main>
    <!-- END Main container -->

@include('layouts.footer')
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
