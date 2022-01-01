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
                            <h2><i class="fa fa-plus"></i> Add Galley </h2>
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
                                    {{$errors}}
                                    <form action="{{route('admin-gallery.store')}}" method="post"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="gallery_type_id">Select Types:
                                                                <a style="color: red;">{{$errors->first('gallery_type_id')}}</a>
                                                            </label>
                                                            <select class="form-control form-control-sm"
                                                                    name="gallery_type_id"
                                                                    id="gallery_type_id">
                                                                <option value="" readonly>---Select Types ---
                                                                </option>
                                                                @foreach ($galleryTypesData as $types)
                                                                    <option value="{{$types->id}}"
                                                                        {{ old('gallery_type_id') == $types->id ? 'selected' : '' }}>
                                                                        {{ucfirst($types->title)}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="date"> Date: <a href=""
                                                                                        style="color: red;">{{$errors->first('date')}}</a></label>
                                                            <input type="text" name="date"
                                                                   class="form-control form-control-sm"
                                                                   value="{{old('date',date('Y-m-d'))}}" id="date">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for=""> Status</label>
                                                            <div class="form-group">
                                                                <div class="btn-group" data-toggle="buttons">
                                                                    <label class="btn btn-primary btn-sm active">
                                                                        <input type="radio" name="status" value="1"
                                                                            {{old('status')==1 ? "checked":""}}>
                                                                        Publish
                                                                    </label>
                                                                    <label class="btn btn-primary btn-sm">
                                                                        <input type="radio" name="status" value="0"
                                                                            {{old('status')==0 ? "checked":""}}> Draft
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="title">Title <a href=""
                                                                                style="color: red;">*{{$errors->first('title')}}</a></label>
                                                    <input type="text" name="title" id="title" value="{{old('title')}}"
                                                           class="form-control form-control-sm">

                                                </div>
                                                <div class="form-group">
                                                    <label for="slug">Slug <a href=""
                                                                              style="color: red;">{{$errors->first('slug')}}</a></label>
                                                    <input type="text" name="slug" id="slug"
                                                           value="{{old('slug')}}" class="form-control form-control-sm">
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <img src="{{url('backend/icons/uploadimage.png')}}"
                                                         id="image_show" alt=""
                                                         style="width: 90%;height: 200px;">
                                                    <div class="choose_file">
                                                        <span><i class="fa fa-upload"></i> Upload Image</span>
                                                        <input name="image" type="file" id="change_image">
                                                    </div>
                                                    <a style="color: red;">{{$errors->first('image')}}</a>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label for="photos">Photos: <span>Upload multiple photos</span> <a href=""
                                                                                                               style="color: red;">{{$errors->first('photos')}}</a></label>
                                            <br>
                                            <input type="file" name="photos[]" id="photos"
                                                   multiple class="btn btn-default">
                                        </div>


                                        <div class="form-group">
                                            <label for="description_id">Details</label>
                                            <br>
                                            <textarea name="description" id="description_id"
                                                      class="form-control">{{old('description')}}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn-sm btn-success"><i
                                                    class="fa fa-image"></i> Add Gallery types
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




