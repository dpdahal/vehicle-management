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
                                <i class="fa fa-eye"></i> My Profile</h2>
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
                                    <div class="col-md-4">
                                        @if($adminData->image)
                                            <img src="{{url($adminData->image)}}"
                                                 class="img-fluid" alt="Profile Picture">
                                        @endif
                                    </div>
                                    <div class="col-md-8">
                                        <table width="100%" cellpadding="10">
                                            <tr>
                                                <th width="20%">Name:</th>
                                                <td>{{ucfirst($adminData->name)}}</td>
                                            </tr>
                                            <tr>
                                                <th>Username:</th>
                                                <td>{{$adminData->username}}</td>
                                            </tr>
                                            <tr>
                                                <th>Email:</th>
                                                <td>{{$adminData->email}}</td>
                                            </tr>
                                            <tr>
                                                <th>Gender:</th>
                                                <td>{{ucfirst($adminData->gender)}}</td>
                                            </tr>
                                            <tr>
                                                <th>Status:</th>
                                                <td>
                                                    @if($adminData->status==1)
                                                        <button class="btn-xs btn-success">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                    @else
                                                        <button class="btn-xs btn-warning">
                                                            <i class="fa fa-times"></i></button>

                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Created At:</th>
                                                <td>{{$adminData->created_at}}</td>
                                            </tr>
                                            <tr>
                                                <th>Updated At:</th>
                                                <td>{{$adminData->updated_at}}</td>
                                            </tr>
                                        </table>

                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <hr>

                                    <a href="{{route('super-admin.index')}}" class="btn-info btn-sm">
                                        <i class="fa fa-hand-o-right"></i>
                                        Back to Home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
