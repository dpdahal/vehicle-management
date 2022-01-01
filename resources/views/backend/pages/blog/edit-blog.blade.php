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
                            <h2><i class="fa fa-edit"></i> Update Blog </h2>
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
                                    <form action="{{route('admin-blog.update',$blogData->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="date">News Date
                                                                <a href=""
                                                                   style="color: red;">{{$errors->first('date')}}</a>
                                                            </label>
                                                            <input type="text" name="date"
                                                                   class="form-control form-control-sm"
                                                                   value="{{$blogData->date}}" id="date">
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
                                                                    value="1" {{ $blogData->status == '1' ? 'selected' : '' }}>
                                                                    Public
                                                                </option>
                                                                <option
                                                                    value="0" {{$blogData->status == '0' ? 'selected' : '' }}>
                                                                    Draft
                                                                </option>

                                                            </select>


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Title: <a href=""
                                                                                 style="color: red;">{{$errors->first('title')}}</a></label>
                                                    <input type="text" name="title" id="title"
                                                           value="{{$blogData->title}}"
                                                           class="form-control form-control-sm">

                                                </div>
                                                <div class="form-group">
                                                    <label for="slug">Slug <a href=""
                                                                              style="color: red;">{{$errors->first('slug')}}</a></label>
                                                    <input type="text" name="slug" id="slug"
                                                           value="{{$blogData->slug}}"
                                                           class="form-control form-control-sm">

                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                @if($blogData->image)
                                                    <img src="{{url($blogData->image)}}"
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
                                            <label for="meta_title">Meta Title</label> <br>
                                            <input type="text" name="meta_title" value="{{$blogData->meta_title}}"
                                                   class="form-control" id="meta_title">
                                        </div>


                                        <div class="form-group">
                                            <label for="meta_description">Meta Description</label>
                                            <textarea name="meta_description" id="meta_description"
                                                      style="resize: none;" class="form-control"
                                                      rows="4"> {{$blogData->meta_description}}</textarea>
                                        </div>


                                        <div class="form-group">
                                            <label for="description">Details</label>
                                            <br>
                                            <textarea name="description" id="description"
                                                      class="form-control">
                                                    {{$blogData->description}}
                                                </textarea>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn-sm btn-success"><i
                                                    class="fa fa-newspaper-o"></i> Update Blog
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




