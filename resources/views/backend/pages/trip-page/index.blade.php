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
                            <h2><i class="fa fa-eye"></i> Trip Page Lists </h2>
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
                                    <div class="col-md-12">
                                        @include('backend.layouts.message')
                                    </div>
                                    <div class="row">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Sn</th>
                                                <th>Title</th>
                                                <th>Cost</th>
                                                <th>Trip Mode</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($tripPageData as $key=>$tripPage)

                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>
                                                        {{$tripPage->title}}
                                                    </td>
                                                    <td>
                                                        {{$tripPage->tripCost->cost}}
                                                        {{$tripPage->tripCost->getVehicleType->type}}
                                                    </td>
                                                    <td>
                                                        {{$tripPage->trip_mode}}
                                                    </td>
                                                    <td>
                                                        @if($tripPage->image)
                                                            <img src="{{url($tripPage->image)}}"
                                                                 alt="" width="40" height="40">
                                                        @endif
                                                        <hr>

                                                        <a href="{{route('trip-gallery-image').'/'.$tripPage->id}}"
                                                           class="btn-sm btn-success">
                                                            Total {{$tripPage->tripGallery()->count()}} images</a>

                                                    </td>

                                                    <td>
                                                        <form action="{{route('admin-trip-page.destroy',$tripPage->id)}}"
                                                              method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <a href="{{route('admin-trip-page.show',$tripPage->id)}}"
                                                               class="btn-sm btn-info"><i
                                                                    class="fa fa-eye"></i></a>
                                                            <a href="{{route('admin-trip-page.edit',$tripPage->id)}}"
                                                               class="btn-sm btn-primary" title="edit">
                                                                <i class="fa fa-edit"></i></a>
                                                            <button class="btn-sm btn-danger" title="Delete">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




