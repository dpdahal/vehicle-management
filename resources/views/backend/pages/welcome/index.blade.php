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
                            <h2><i class="fa fa-eye"></i>  Show Welcome Page
                                <a href="{{route('admin-welcome-page.create')}}" class="btn-sm btn-success">
                                    <i class="fa fa-hand-o-right"></i>Add Welcome Page</a>
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
                                    <div class="col-md-12">
                                        @include('backend.layouts.message')
                                    </div>
                                    <div class="row">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>S.n</th>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($welcomeData as $key=>$welcome)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>
                                                        <a href="{{route('admin-welcome-page.show',$welcome->id)}}">{{$welcome->title}}</a>
                                                    </td>
                                                    <td>
                                                        @if($welcome->image)
                                                            <img src="{{url($welcome->image)}}"
                                                                 style="width: 30px;" alt="">
                                                        @endif
                                                    </td>

                                                    <td>
                                                        {{$welcome->created_at->diffForHumans()}}

                                                    </td>
                                                    <th>
                                                        <form action="{{route('admin-welcome-page.destroy',$welcome->id)}}"
                                                              method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <a href="{{route('admin-welcome-page.show',$welcome->id)}}"
                                                               class="btn-sm btn-info">
                                                                <i class="fa fa-eye"></i>
                                                            </a>

                                                            <a href="{{route('admin-welcome-page.edit',$welcome->id)}}"
                                                               class="btn-sm btn-primary" title="edit">
                                                                <i class="fa fa-edit"></i></a>
                                                            <button class="btn-sm btn-danger" title="Delete">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>

                                                    </th>
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
