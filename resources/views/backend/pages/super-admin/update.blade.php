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
                            <h2><i class="fa fa-edit"></i> Update Info</h2>
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
                                    <form action="{{route('super-admin.update',$adminUser->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row">
                                            <div class="col-md-8">
                                                <input type="hidden" name="criteria" value="{{$adminUser->id}}">
                                                <div class="form-group">
                                                    <label for="name">Name : <a
                                                            style="color: red;">{{$errors->first('name')}}</a></label>
                                                    <input type="text" name="name" value="{{$adminUser->name}}"
                                                           id="name"
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="username">Username: <a
                                                            style="color: red;">{{$errors->first('username')}}</a></label>
                                                    <input type="text" name="username" id="username"
                                                           value="{{$adminUser->username}}"
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email: <a
                                                            style="color: red;">{{$errors->first('email')}}</a></label>
                                                    <input type="text" name="email" id="email"
                                                           value="{{$adminUser->email}}"
                                                           class="form-control ">
                                                </div>

                                                <div class="form-group">
                                                    <label for="gender">Gender:
                                                        <a style="color: red;">{{$errors->first('gender')}}</a>
                                                    </label>
                                                    <select name="gender" id="gender"
                                                            class="form-control">
                                                        <option
                                                            value="male" {{$adminUser->gender=="female" ? "selected":""}}>
                                                            Male
                                                        </option>
                                                        <option
                                                            value="female" {{$adminUser->gender=="female" ? "selected":""}}>
                                                            Female
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    @if($adminUser->image)
                                                        <img src="{{url($adminUser->image)}}"
                                                             id="image_show" alt="Profile Picture"
                                                             style="margin-top: 23px;width: 100%;height: 200px;">
                                                    @else
                                                        <img src="{{url('backend/icons/profile.png')}}"
                                                             class="" id="image_show" alt="Profile Picture"
                                                             style="margin-top: 23px;height: 200px;">
                                                    @endif

                                                    <div class="choose_file">
                                                        <span><i class="fa fa-upload"></i> Change Image</span>
                                                        <input name="image" type="file" id="change_image">
                                                    </div>
                                                    <a style="color: red;">{{$errors->first('image')}}</a>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button class="btn btn-primary">
                                                    <i class="fa fa-plus"></i> Update Record
                                                </button>
                                            </div>
                                        </div>


                                    </form>
                                </div>

                                <div class="col-md-12">
                                    <hr>
                                    <a href="{{route('super-admin.index')}}" class="btn-sm btn-info">
                                        <i class="fa fa-hand-o-left"></i> Back</a>
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
