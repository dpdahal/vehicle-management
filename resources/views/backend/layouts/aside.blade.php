@section('aside')
    <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="{{route('dashboard')}}"
                   class="site_title"><i class="fa fa-dashboard"></i>
                    <span>VMS</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
                <div class="profile_pic">
                    @if(Auth::guard('admin')->user()->image)
                        <img src="{{url(Auth::guard('admin')->user()->image)}}" alt="..."
                             class="img-circle profile_img">
                    @endif
                </div>
                <div class="profile_info">
                    <span>Welcome,</span>
                    <h2>{{Auth::guard('admin')->user()->username}}</h2>
                </div>
            </div>
            <!-- /menu profile quick info -->

            <br/>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <h3>General</h3>
                    <ul class="nav side-menu">
                        <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i> Dashboard</a></li>

                        <li><a><i class="fa fa-users"></i> Super Admin <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('super-admin.create')}}">Add Admin</a></li>
                                <li><a href="{{route('super-admin.index')}}">Super Admin</a></li>

                            </ul>
                        </li>

                        <li><a><i class="fa fa-users"></i> Driver <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('driver.create')}}">Add Admin</a></li>
                                <li><a href="{{route('driver.index')}}">Driver</a></li>

                            </ul>
                        </li>


                        <li><a><i class="fa fa-flag"></i> Manage City <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('admin-city.create')}}"> Add City</a></li>
                                <li><a href="{{route('admin-city.index')}}">Show City</a></li>

                            </ul>
                        </li>


                        <li><a><i class="fa fa-car"></i> Manage Vehicle <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('manage-vehicle-type.create')}}"> Add Vehicle Type</a></li>
                                <li><a href="{{route('manage-vehicle-type.index')}}">Vehicle Type</a></li>
                                <li><a href="{{route('manage-vehicle.index')}}">Vehicle</a></li>


                            </ul>
                        </li>
                        <li><a href="{{route('destination-rate.index')}}"><i class="fa fa-map-marker"></i> Destination
                                Rate </a></li>

                        <li><a><i class="fa fa-newspaper-o"></i> Trip Page <span
                                    class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('admin-trip-page.create')}}">Add page</a></li>
                                <li><a href="{{route('admin-trip-page.index')}}">Show pages</a></li>

                            </ul>
                        </li>

                        <li><a><i class="fa fa-newspaper-o"></i> Blogs <span
                                    class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('admin-blog.create')}}">Add Blog</a></li>
                                <li><a href="{{route('admin-blog.index')}}">Show Blog</a></li>

                            </ul>
                        </li>


                        <li><a href="{{route('admin-customer-list')}}"><i class="fa fa-users"> </i> Customer List</a>
                        </li>
                        <li><a href="{{route('setting')}}"><i class="glyphicon glyphicon-cog"> </i> Website Setting</a>
                        </li>


                    </ul>
                </div>


            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
                <a href="" data-toggle="tooltip" data-placement="top" title="Settings">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{route('admin-logout')}}">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
            </div>
            <!-- /menu footer buttons -->
        </div>
    </div>
@endsection
