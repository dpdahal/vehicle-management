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
                            <h2><i class="fa fa-image"></i> Add Trip Gallery Images</h2>
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
                            </div>
                            <div class="row">
                                @foreach($tripGalleryData as $gallery)
                                    <div class="col-md-55">
                                        <div class="thumbnail">
                                            <div class="image view view-first">
                                                <img style="width: 100%; display: block;"
                                                     src="{{url($gallery->image_name)}}"
                                                     alt="image"/>
                                                <div class="mask">
                                                    <div class="tools tools-bottom">
                                                        <a href="{{route('trip-gallery-edit-images').'/'.$gallery->id}}"><i
                                                                class="fa fa-pencil"></i></a>
                                                        <a href="{{route('trip-gallery-image-delete').'/'.$gallery->id}}"
                                                           title="Delete Gallery Image"><i class="fa fa-times"></i></a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach


                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{route('trip-gallery-add-images')}}" method="post"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="image">Select Image:
                                                <a style="color: red;">{{$errors->first('images')}}</a>
                                            </label><br>
                                            <input type="hidden" name="package_id" value="{{$packageId}}">
                                            <input type="file" name="images[]" multiple class="btn btn-default">

                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success">
                                                <i class="fa fa-plus"></i> Add Image
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
    <!-- /page content -->
@endsection




