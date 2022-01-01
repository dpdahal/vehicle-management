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
                                <i class="fa fa-plus"></i> Add User <a href="{{route('super-admin.index')}}" class="btn-info btn-sm">
                                    <i class="fa fa-hand-o-right"></i>
                                    Show Users</a></h2>
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
                                    <form action="{{route('super-admin.store')}}" method="post"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Name : <a
                                                                    style="color: red;">{{$errors->first('name')}}</a></label>
                                                            <input type="text" name="name" value="{{old('name')}}"
                                                                   id="name"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="username">Username: <a
                                                                    style="color: red;">{{$errors->first('username')}}</a></label>
                                                            <input type="text" name="username" id="username"
                                                                   value="{{old('username')}}"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="email">Email: <a
                                                                    style="color: red;">{{$errors->first('email')}}</a></label>
                                                            <input type="text" name="email" id="email"
                                                                   value="{{old('email')}}"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="date">Date of birth : <a
                                                                    style="color: red;">{{$errors->first('date')}}</a></label>
                                                            <input type="text" name="date_of_birth"
                                                                   value="{{old('date_of_birth',date('Y-m-d'))}}"
                                                                   id="date"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="password">Password: <a
                                                                    style="color: red;">{{$errors->first('password')}}</a></label>
                                                            <input type="password" name="password" id="password"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="password_confirmation">Confirm Password: <a
                                                                    style="color: red;">{{$errors->first('password_confirmation')}}</a></label>
                                                            <input type="password" name="password_confirmation"
                                                                   id="password_confirmation"
                                                                   class="form-control">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="phone">Phone: <a
                                                                    style="color: red;">{{$errors->first('phone')}}</a></label>
                                                            <input type="text" name="phone" id="phone"
                                                                   value="{{old('phone')}}"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="gender">Gender:<a
                                                                style="color: red;">{{$errors->first('gender')}}</a>
                                                        </label>
                                                        <select name="gender" id="gender"
                                                                class="form-control">
                                                            <option value="" readonly>---Select Gender---</option>
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <img src="{{url('backend/icons/uploadimage.png')}}"
                                                         id="image_show" alt=""
                                                         style="width: 90%;height: 200px;margin-top: 25px;">
                                                    <div class="choose_file">
                                                        <span><i class="fa fa-upload"></i> Upload Image</span>
                                                        <input name="image" type="file" id="change_image">
                                                    </div>
                                                    <a style="color: red;">{{$errors->first('image')}}</a>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button class="btn btn-success">
                                                    <i class="fa fa-plus"></i> Add Record</button>
                                            </div>
                                        </div>

                                    </form>
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
