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
                            <h2><i class="fa fa-edit"></i> Update Gallery Types   </h2>
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
                                    <form action="{{route('gallery-types.update',$galleryTypes->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="date">News Date
                                                                <a href="" style="color: red;">{{$errors->first('date')}}</a>
                                                            </label>
                                                            <input type="text" name="date" class="form-control form-control-sm"
                                                                   value="{{$galleryTypes->date}}" id="date">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">News Status</label>
                                                            <div class="form-group form-group-sm">
                                                                <div class="btn-group" data-toggle="buttons">
                                                                    <label class="btn btn-primary btn-sm active">
                                                                        <input type="radio" name="status"
                                                                               value="{{$galleryTypes->status}}"
                                                                            {{$galleryTypes->status==1 ? 'checked':''}}>
                                                                        Publish
                                                                    </label>
                                                                    <label class="btn btn-primary btn-sm">
                                                                        <input type="radio" name="status"
                                                                               value="{{$galleryTypes->status}}"
                                                                            {{$galleryTypes->status==0 ? 'checked':''}}> Draft
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Title: <a href=""
                                                                                 style="color: red;">{{$errors->first('title')}}</a></label>
                                                    <input type="text" name="title" id="title" value="{{$galleryTypes->title}}"
                                                           class="form-control form-control-sm">

                                                </div>
                                                <div class="form-group">
                                                    <label for="slug">Slug <a href=""
                                                                              style="color: red;">{{$errors->first('slug')}}</a></label>
                                                    <input type="text"  name="slug" id="slug"
                                                           value="{{$galleryTypes->slug}}" class="form-control form-control-sm">

                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                @if($galleryTypes->image)
                                                    <img src="{{url($galleryTypes->image)}}"
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
                                            <label for="meta_description">Meta Description</label>
                                            <textarea name="meta_description" id="meta_description" style="resize: none;"   class="form-control" rows="4">
                                                {{$galleryTypes->meta_description}}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="summary">Summary: *
                                                <a style="color: red;">{{$errors->first('summary')}}</a>
                                            </label>
                                            <br>
                                            <textarea name="summary" id="summary"
                                                      class="form-control"
                                                      rows="4">{{$galleryTypes->summary}}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Details</label>
                                            <br>
                                            <textarea name="description" id="description"
                                                      class="form-control">
                                                    {{$galleryTypes->description}}
                                                </textarea>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn-sm btn-success"><i
                                                    class="fa fa-image"></i> Update Gallery Types
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




