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
                            <h2><i class="fa fa-edit"></i> Update Vehicle Type </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                                    <form action="{{route('manage-vehicle-type.update',$vehicleTypeData->id)}}"
                                          method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="title">Type:
                                                        <a style="color: red;text-decoration: none;">
                                                            {{$errors->first('type')}}
                                                        </a>
                                                    </label>
                                                    <input type="text" name="type" class="form-control" id="title"
                                                           value="{{$vehicleTypeData->type}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="date"> Date: <a href=""
                                                                                style="color: red;">{{$errors->first('date')}}</a></label>
                                                    <input type="text" name="date" class="form-control"
                                                           value="{{$vehicleTypeData->date}}" id="date">

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
                                                            value="1" {{ $vehicleTypeData->status == '1' ? 'selected' : '' }}>
                                                            Public
                                                        </option>
                                                        <option
                                                            value="0" {{ $vehicleTypeData->status == '0' ? 'selected' : '' }}>
                                                            Draft
                                                        </option>

                                                    </select>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Title <a href=""
                                                                        style="color: red;">*{{$errors->first('title')}}</a></label>
                                            <input type="text" name="title" id="title"
                                                   value="{{$vehicleTypeData->title}}"
                                                   class="form-control">

                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Slug <a href=""
                                                                      style="color: red;">{{$errors->first('slug')}}</a></label>
                                            <input type="text" name="slug" id="slug"
                                                   value="{{$vehicleTypeData->slug}}" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="image">Image:
                                                <a style="color: red;">{{$errors->first('image')}}</a>
                                            </label>
                                            <br>
                                            <input name="image" class="btn btn-default" type="file" id="image">
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_keywords">Meta Keywords</label> <br>
                                            <input type="text" name="meta_keywords"
                                                   value="{{$vehicleTypeData->meta_keywords}}"
                                                   data-role="tagsinput" class="form-control" id="meta_keywords">
                                        </div>

                                        <div class="form-group">
                                            <label for="meta_description">Meta Description</label>
                                            <br>
                                            <textarea name="meta_description" id="meta_description"
                                                      style="resize: none;"
                                                      class="form-control"
                                                      rows="4">{{$vehicleTypeData->meta_description}}</textarea>
                                        </div>


                                        <div class="form-group">
                                            <label for="description_id">Details</label>
                                            <br>
                                            <textarea name="description" id="description_id"
                                                      class="form-control">{{$vehicleTypeData->description}}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn-sm btn-success"><i
                                                    class="fa fa-plus"></i> Update Vehicle Type
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

@endsection
