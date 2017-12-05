    <!-- Topbar -->
    <nav class="topbar topbar-inverse topbar-expand-md topbar-sticky">
      <div class="container">
        
        <div class="topbar-left">
          <button class="topbar-toggler">&#9776;</button>
          <a class="topbar-brand" href="/">
            <!-- <img class="logo-default" src="assets/img/logo.png" alt="logo">
            <img class="logo-inverse" src="assets/img/logo-light.png" alt="logo"> -->
            <p class="fs-30 hidden-sm-down" style="color:#ffffff;"><strong>base.recola.org</strong></p>
          </a>
        </div>


        <div class="topbar-right">
          <ul class="topbar-nav nav">
            @foreach($menus as $menu)
              <li class="nav-item"><a class="nav-link" href="{{$menu->menu_link}}">{{$menu->menu_label}}</a></li>
            @endforeach
          </ul>
        </div>

      </div>
    </nav>
    <!-- END Topbar -->