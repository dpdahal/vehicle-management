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
                                Category Details
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
                                <div class="col-md-8">
                                    <h2><a href="">Title: {{$categoryData->title}}</a></h2>
                                    <h2><a href="">Slug: {{$categoryData->slug}}</a></h2>
                                    <p>Meta Description:
                                        {!! $categoryData->meta_description !!}
                                    </p>
                                    <p> Description:
                                        {!! $categoryData->description !!}
                                    </p>

                                </div>
                                <div class="col-md-4">
                                    <img src="{{url('uploads/category/'.$categoryData->image)}}"
                                         class="img-fluid" alt="">
                                </div>
                                <div class="col-md-12">
                                    <a href="{{route('category.index')}}"
                                       class="btn btn-success">Goto main page</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
