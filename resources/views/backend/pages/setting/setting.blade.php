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
                                <i class="glyphicon glyphicon-cog"></i> Company Setting </h2>
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
                                </div>
                                <div class="col-md-12">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-md-8">
                                                <input type="hidden" name="company_id"
                                                       value="{{$settingData->id}}">
                                                <div class="form-group">
                                                    <label for="name"> name
                                                        <a style="color: red;">{{$errors->first('company_name')}}</a></label>
                                                    <input type="text" name="company_name" id="name"
                                                           value="{{$settingData->company_name}}"
                                                           class="form-control form-control-sm">
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="company_email"> Email</label>
                                                            <input type="text" name="company_email" id="company_email"
                                                                   value="{{$settingData->company_email}}"
                                                                   class="form-control form-control-sm">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="address"> Address</label>
                                                            <input type="text" name="company_address"
                                                                   id="company_address"
                                                                   value="{{$settingData->company_address}}"
                                                                   class="form-control form-control-sm">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="company_phone"> Phone</label>
                                                            <input type="text" name="company_phone" id="company_phone"
                                                                   value="{{$settingData->company_phone}}"
                                                                   class="form-control form-control-sm">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="company_mobile"> Mobile </label>
                                                            <input type="text" name="company_mobile" id="company_mobile"
                                                                   value="{{$settingData->company_mobile}}"
                                                                   class="form-control form-control-sm">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="company_fax"> Fax </label>
                                                            <input type="text" name="company_fax" id="company_fax"
                                                                   value="{{$settingData->company_fax}}"
                                                                   class="form-control form-control-sm">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="company_post_box"> Company Post Box </label>
                                                            <input type="text" name="company_post_box"
                                                                   id="company_post_box"
                                                                   value="{{$settingData->company_post_box}}"
                                                                   class="form-control form-control-sm">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <img
                                                        src="{{url('uploads/logo/'.$settingData->company_logo)}}"
                                                        class="img-fluid" id="image_show" alt="Profile Picture"
                                                        style="margin-top: 23px;">
                                                    <div class="choose_file">
                                                        <span><i class="fa fa-upload"></i> Upload Logo</span>
                                                        <input name="logo" type="file" id="change_image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="keywords"> keywords</label> <br>
                                                    <input type="text" name="meta_keywords" id="keywords"
                                                           value="{{$settingData->meta_keywords}}"
                                                           data-role="tagsinput"  class="form-control form-control-sm">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description"> Description</label>
                                                    <textarea name="meta_description"
                                                              id="description"
                                                              class="form-control">{{$settingData->meta_description}}</textarea>
                                                </div>

                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button class="btn-sm btn-success">
                                                        <i class="fa fa-edit"></i> Update Setting
                                                    </button>
                                                </div>
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
@endsection




