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
                                <i class="fa fa-eye"></i> Show Banner </h2>
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
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>S.n</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($bannerData as $key=>$banner)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$banner->title}}</td>
                                                <td>
                                                    <form action="{{route('update-banner-status')}}" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="criteria" value="{{$banner->id}}">
                                                        @if($banner->status==1)
                                                            <button name="active" class="btn-xs btn-success">
                                                                <i class="fa fa-check"></i>
                                                            </button>
                                                        @else
                                                            <button name="inactive" class="btn-xs btn-warning">
                                                                <i class="fa fa-times"></i></button>
                                                        @endif
                                                    </form>
                                                </td>
                                                <td>
                                                    @if($banner->image)
                                                        <img src="{{url($banner->image)}}" width="40"
                                                             alt="">
                                                    @endif
                                                </td>
                                                <td>
                                                    <form action="{{route('admin-banner.destroy',$banner->id)}}"
                                                          method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="{{route('admin-banner.show',$banner->id)}}"
                                                           class="btn-sm btn-info"><i
                                                                class="fa fa-eye"></i></a>
                                                        <a href="{{route('admin-banner.edit',$banner->id)}}"
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
@endsection




