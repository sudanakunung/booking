        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ url('/dashboard') }}" class="site_title"><i class="fa fa-paw"></i> <span>Kamartamu</span></a>
            </div>

            <div class="clearfix"></div>

            <br /><br>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">

                @if($user->is_admin == "yes")
                <ul class="nav side-menu">
                  <li><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
                  <li><a href="#"><i class="fa fa-building-o"></i> Property</a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/dashboard/property') }}"> List</a></li>
                      <li><a href="{{ url('/dashboard/facility') }}"> Facility</a></li>
                      <li><a href="{{ url('/dashboard/city') }}"> City</a></li>
                    </ul>
                  </li>
                  
                  <li><a href="{{ url('/dashboard/booking') }}"><i class="fa fa-calendar"></i> Booking</a></li>
                  <li><a href="{{ url('/dashboard/change-password') }}"><i class="fa fa-key"></i> Change Password</a></li>
                </ul>
                @else
                <ul class="nav side-menu">
                  <li><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
                  <li><a href="{{ url('/garden') }}"><i class="fa fa-image"></i> Gardens Photos</a></li>
                  <li><a href="{{ url('/dashboard/profile') }}"><i class="fa fa-user"></i> Profile</a></li>
                  <li><a href="{{ url('/dashboard/change-password') }}"><i class="fa fa-key"></i> Change Password</a></li>
                </ul>
                @endif
              </div>

            </div>
            <!-- /sidebar menu -->
          </div>
        </div>