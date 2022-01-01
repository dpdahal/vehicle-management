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
                            <h2><i class="fa fa-users"></i> Users List</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                            </div>
                            <div class="row">

                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>S.n</th>
                                        <th>Full Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($userData as $key=>$user)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$user->full_name}}</td>
                                            <td>{{$user->username}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->gender}}</td>
                                            <td>
                                                @if($user->status==1)
                                                    <button name="active" class="btn-xs btn-success">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                @else
                                                    <button name="inactive" class="btn-xs btn-warning">
                                                        <i class="fa fa-times"></i></button>
                                                @endif
                                            </td>
                                            <td>
                                                @if($user->image)
                                                    <img src="{{url($user->image)}}"
                                                         width="30" alt="">
                                                @endif
                                            </td>
                                            <td>

                                                    <a href="{{route('admin-customer-details',$user->id)}}"
                                                       class="btn-sm btn-warning">
                                                        <i class="fa fa-eye"></i>
                                                    </a> <a href=""
                                                            class="btn-sm btn-success">
                                                        <i class="fa fa-edit"></i>
                                                    </a>


                                                <a href="" class="btn-sm btn-warning">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>

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

@endsection
