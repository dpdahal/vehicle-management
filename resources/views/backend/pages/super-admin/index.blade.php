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
                            <h2><i class="fa fa-users"></i> Users List
                                <a href="{{route('super-admin.create')}}" class="btn-info btn-sm">
                                    <i class="fa fa-hand-o-right"></i>
                                    Add User</a>

                            </h2>
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
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($adminUserData as $key=>$adminUser)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$adminUser->name}}</td>
                                            <td>{{$adminUser->username}}</td>
                                            <td>{{$adminUser->email}}</td>
                                            <td>{{$adminUser->gender}}</td>
                                            <td>
                                                <form action="{{route('admin-status-update')}}" method="post">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="criteria" value="{{$adminUser->id}}">
                                                    @if($adminUser->status==1)
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
                                                @if($adminUser->image)
                                                    <img src="{{url($adminUser->image)}}"
                                                         width="30" alt="">
                                                @endif
                                            </td>
                                            <td>

                                                <form method="POST"
                                                      action="{{route('super-admin.destroy',[$adminUser->id])}}">
                                                    <a href="{{route('super-admin.show',$adminUser->slug)}}"
                                                       class="btn-sm btn-warning">
                                                        <i class="fa fa-eye"></i>
                                                    </a> <a href="{{route('super-admin.edit',$adminUser->slug)}}"
                                                            class="btn-sm btn-success">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn-sm btn-danger"><i
                                                            class="fa fa-trash"
                                                            onclick="return confirm('are you sure');"></i>
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

@endsection
