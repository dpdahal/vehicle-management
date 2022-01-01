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
                            <h2><i class="fa fa-plus"></i> Add Trip </h2>
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
                                    <form action="{{route('admin-trip-page.store')}}" method="post"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        <div class="form-group">
                                            <label for="title">Title
                                                <a href="" style="color: red;">*
                                                    {{$errors->first('title')}}
                                                </a>
                                            </label>
                                            <input type="text" name="title" id="title"
                                                   value="{{old('title')}}"
                                                   class="form-control">

                                        </div>

                                        <div class="form-group">
                                            <label for="slug">Slug
                                                <a href=""
                                                   style="color: red;">{{$errors->first('slug')}}</a></label>
                                            <input type="text" name="slug" id="slug"
                                                   value="{{old('slug')}}"
                                                   class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="trip_cost">Trip Cost:
                                                <a href="" style="color: red;">
                                                    {{$errors->first('trip_cost')}}
                                                </a>
                                            </label>

                                            <select name="trip_cost" id="trip_cost"
                                                    class="form-control">
                                                <option value="" selected readonly>---Select Trip Cost---</option>
                                                @foreach($destinationCost as $dCost)
                                                    <option
                                                        value="{{$dCost->id}}">{{$dCost->destinationFullTitle()}}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="start_from"> Date:
                                                        <a href=""
                                                           style="color: red;">{{$errors->first('start_from')}}</a>
                                                    </label>
                                                    <input type="text" name="start_from"
                                                           class="form-control"
                                                           value="{{old('start_from')}}" id="start_from">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="ends_at"> Ends at:
                                                        <a href="" style="color: red;">
                                                            {{$errors->first('ends_at')}}
                                                        </a>
                                                    </label>
                                                    <input type="text" name="ends_at"
                                                           class="form-control"
                                                           value="{{old('ends_at')}}" id="ends_at">

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
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="trip_mode">Trip mode </label>
                                                    <select name="trip_mode" id="trip_mode"
                                                            class="form-control">
                                                        <option value="one_way">One Way</option>
                                                        <option value="round">Round</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="image">Image <a href=""
                                                                                style="color: red;">{{$errors->first('image')}}</a></label><br>
                                                    <input type="file" name="image" id="image"
                                                           class="btn-sm btn-default">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="package_image_name">Package Gallery</label> <br>
                                                    <input type="file" name="package_image_name[]"
                                                           id="package_image_name"
                                                           multiple class="btn btn-default">
                                                </div>

                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label for="meta_keywords">Meta Keywords</label> <br>
                                            <input type="text" name="meta_keywords"
                                                   value="{{old('meta_keywords','travel,trekking,tours')}}"
                                                   data-role="tagsinput" class="form-control" id="meta_keywords">
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
                                                    class="fa fa-plus"></i> Add Trip
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




