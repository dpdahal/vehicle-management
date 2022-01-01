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
                                <i class="fa fa-edit"></i> Update Welcome Page </h2>
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
                                    <form action="{{route('admin-welcome-page.update',$welcomeData->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        @method('PATCH')
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="date"> Date: <a href=""
                                                                                        style="color: red;">{{$errors->first('date')}}</a></label>
                                                            <input type="text" name="date"
                                                                   class="form-control"
                                                                   value="{{$welcomeData->date}}" id="date">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="status">Type Status</label>
                                                            <select name="status" id="status" class="form-control">
                                                                <option value="1"  {{$welcomeData->status=='1' ? "checked":""}}>Public</option>
                                                                <option value="2"  {{$welcomeData->status=='0' ? "checked":""}}>Draft</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="title">Title <a href=""
                                                                                style="color: red;">*{{$errors->first('title')}}</a></label>
                                                    <input type="text" name="title" id="title" value="{{$welcomeData->title}}"
                                                           class="form-control">

                                                </div>
                                                <div class="form-group">
                                                    <label for="slug">Slug <a href=""
                                                                              style="color: red;">{{$errors->first('slug')}}</a></label>
                                                    <input type="text" name="slug" id="slug"
                                                         value="{{$welcomeData->slug}}"  class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                @if($welcomeData->image)
                                                    <img src="{{url($welcomeData->image)}}"
                                                         id="image_show" style="width: 90%;height: 150px;" alt="">
                                                @else
                                                    <img src="{{url('backend/icons/uploadimage.png')}}"
                                                         id="image_show" alt=""
                                                         style="width: 90%;height: 150px;">
                                                @endif

                                                <div class="choose_file">
                                                    <span><i class="fa fa-upload"></i> Upload Image</span>
                                                    <input name="image" type="file" id="change_image">
                                                </div>
                                                <a style="color: red;">{{$errors->first('image')}}</a>


                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label for="meta_keywords">Meta Keywords</label> <br>
                                            <input type="text" name="meta_keywords" value="{{$welcomeData->meta_keywords,old('meta_keywords')}}"
                                                   data-role="tagsinput"  class="form-control" id="meta_keywords">
                                        </div>

                                        <div class="form-group">
                                            <label for="meta_description">Meta Description</label>
                                            <br>
                                            <textarea name="meta_description" id="meta_description"
                                                      style="resize: none;"
                                                      class="form-control"
                                                      rows="4">{{$welcomeData->meta_description}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="summary">Summary: *
                                                <a style="color: red;">{{$errors->first('summary')}}</a>
                                            </label>
                                            <br>
                                            <textarea name="summary" id="summary"
                                                      class="form-control"
                                                      rows="4">{{$welcomeData->summary}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Details</label>
                                            <textarea name="description" id="description"
                                                      class="form-control">{{$welcomeData->description}}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-plus"></i> Update Welcome Page
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




