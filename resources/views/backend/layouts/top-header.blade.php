@section('top-header')
    <!-- top navigation -->
    <div class="top_nav">
        <div class="nav_menu">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                    <li class="nav-item dropdown open" style="padding-left: 15px;">
                        <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                           id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                            @if(Auth::guard('admin')->user()->image)
                                <img src="{{url(Auth::guard('admin')->user()->image)}}" alt="">
                            @endif
                            {{Auth::guard('admin')->user()->username}}
                        </a>
                        <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item"
                               href="{{route('super-admin.show',Auth::guard('admin')->user()->slug)}}"> Profile</a>

                            <a class="dropdown-item" href="{{route('admin-password-change')}}">
                                <span>Change Password</span>
                            </a>
                            <a class="dropdown-item" href="{{route('admin-logout')}}"><i
                                    class="fa fa-sign-out pull-right"></i> Log
                                Out</a>
                        </div>
                    </li>

                    {{--                    @include('backend.notification.show')--}}

                </ul>
            </nav>
        </div>
    </div>
    <!-- /top navigation -->
@endsection
