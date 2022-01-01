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
                            <h2><i class="fa fa-eye"></i>
                                Contact Info Details
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
                                    <h2><a href="">Title: {{$contactInfoData->title}}</a></h2>
                                    <h2><a href="">Address: {{$contactInfoData->address}}</a></h2>
                                    <h2><a href="">Phone: {{$contactInfoData->phone}}</a></h2>
                                    <h2><a href="">Mobile: {{$contactInfoData->mobile}}</a></h2>
                                    <h2><a href="">Email: {{$contactInfoData->email}}</a></h2>
                                    <h2><a href="">Website: {{$contactInfoData->website}}</a></h2>
                                    <h2><a href="">Fax: {{$contactInfoData->fax}}</a></h2>


                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <a href="{{route('admin-contact-info.index')}}"
                                       class="btn btn-success">
                                        <i class="fa fa-hand-o-left"></i> Goto main page</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
