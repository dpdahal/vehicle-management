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
                                <i class="fa fa-lock"></i> Change Password</h2>
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
                                    <form action="{{route('admin-password-change')}}" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="password">Old Password: <a
                                                    style="color: red;">{{$errors->first('old_password')}}</a></label>
                                            <input type="password" name="old_password" id="password"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password: <a
                                                    style="color: red;">{{$errors->first('password')}}</a></label>
                                            <input type="password" name="password" id="password"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm Password: <a
                                                    style="color: red;">{{$errors->first('password_confirmation')}}</a></label>
                                            <input type="password" name="password_confirmation"
                                                   id="password_confirmation"
                                                   class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <button class="btn-sm btn-success">
                                                <i class="fa fa-unlock"></i> Change Password</button>
                                        </div>

                                    </form>
                                    <hr>
                                    <a href="{{route('dashboard')}}" class="btn btn-primary">
                                        <i class="fa fa-hand-o-right"></i> Goto home</a>
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
