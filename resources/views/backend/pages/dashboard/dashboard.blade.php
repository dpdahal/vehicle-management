@extends('backend.master.master')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>
                                <i class="fa fa-dashboard"></i> Dashboard

                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('backend.layouts.message')
                                </div>
                                <div class="col-md-12">
                                    <a href="{{route('admin-city.index')}}">
                                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                                            <div class="tile-stats">
                                                <div class="icon"><i class="fa fa-flag"></i></div>
                                                <div class="count">{{$totalCity}}</div>
                                                <h3>Total Cities </h3>

                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{route('admin-customer-list')}}">
                                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                                            <div class="tile-stats">
                                                <div class="icon"><i class="fa fa-users"></i></div>
                                                <div class="count">{{$totalCustomers}}</div>
                                                <h3>Total Customers </h3>

                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{route('admin-blog.index')}}">
                                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                                            <div class="tile-stats">
                                                <div class="icon"><i class="fa fa-newspaper-o"></i></div>
                                                <div class="count">{{$totalBlog}}</div>
                                                <h3>Total Blog </h3>

                                            </div>
                                        </div>
                                    </a>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
