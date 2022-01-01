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
                            <h2><i class="fa fa-flag"></i> Add City </h2>
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

                                    <form action="{{route('admin-city.store')}}" method="post"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="date"> Date: <a href=""
                                                                                        style="color: red;">{{$errors->first('date')}}</a></label>
                                                            <input type="text" name="date"
                                                                   class="form-control"
                                                                   value="{{old('date',date('Y-m-d'))}}" id="date">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="status"> Status:
                                                                <a style="color: red;">{{$errors->first('status')}}</a>
                                                            </label>
                                                            <select name="status" id="status"
                                                                    class="form-control">
                                                                <option value="" selected readonly>--- Select Status
                                                                    ---
                                                                </option>
                                                                <option
                                                                    value="1" {{ old('status') == '1' ? 'selected' : '' }}>
                                                                    Public
                                                                </option>
                                                                <option
                                                                    value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                                                                    Draft
                                                                </option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="status"> Is Footer:
                                                                <a style="color: red;">{{$errors->first('is_footer')}}</a>
                                                            </label>
                                                            <select name="is_footer" id="status"
                                                                    class="form-control">
                                                                <option
                                                                    value="1" {{ old('is_footer') == '0' ? 'selected' : '' }}>
                                                                    No
                                                                </option>
                                                                <option
                                                                    value="0" {{ old('is_footer') == '1' ? 'selected' : '' }}>
                                                                    Yes
                                                                </option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="title">City Name <a href=""
                                                                                    style="color: red;">*{{$errors->first('city_name')}}</a></label>
                                                    <input type="text" name="city_name" id="title"
                                                           value="{{old('city_name')}}"
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="slug">City Slug <a href=""
                                                                                   style="color: red;">*{{$errors->first('city_slug')}}</a></label>
                                                    <input type="text" name="city_slug" id="slug"
                                                           value="{{old('city_slug')}}"
                                                           class="form-control">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="image">Image
                                                        <a href=""
                                                           style="color: red;">{{$errors->first('image')}}</a></label>
                                                    <br>
                                                    <input type="file" name="image"
                                                           id="consultancy_logo"
                                                           class="btn btn-default">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="video">Video
                                                        <a href=""
                                                           style="color: red;">{{$errors->first('video')}}</a></label>

                                                    <input type="text" name="video"
                                                           id="video"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="meta_title">Meta title</label> <br>
                                            <input type="text" name="meta_title"
                                                   value="{{old('meta_title')}}"
                                                   class="form-control" id="meta_title">
                                        </div>

                                        <div class="form-group">
                                            <label for="meta_description">Meta Description</label>
                                            <br>
                                            <textarea name="meta_description" id="meta_description"
                                                      style="resize: none;"
                                                      class="form-control"
                                                      rows="4">{{old('meta_description')}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="description_id">Details</label>
                                            <textarea name="description" id="description_id"
                                                      class="form-control">{{old('description')}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn-sm btn-success"><i
                                                    class="fa fa-plus"></i> Add City
                                            </button>
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






