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
                            <h2><i class="fa fa-plus"></i> Add Contact Info </h2>
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
                                    <form action="{{route('admin-contact-info.store')}}" method="post">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="categories">Select Types:
                                                        <a style="color: red;">{{$errors->first('contact_type_id')}}</a>
                                                    </label>
                                                    <select class="form-control" name="contact_type_id"
                                                            id="categories">
                                                        <option value="" readonly>---Select Types ---</option>
                                                        @foreach ($contactType as $type)
                                                            <option value="{{$type->id}}"
                                                                {{ old('contact_type_id') == $type->id ? 'selected' : '' }}>
                                                                {{ucfirst($type->title)}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="title">Title <a href=""
                                                                                style="color: red;">*{{$errors->first('title')}}</a></label>
                                                    <input type="text" name="title" id="title" value="{{old('title')}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="address">Address <a href=""
                                                                                    style="color: red;">{{$errors->first('address')}}</a></label>
                                                    <input type="text" name="address" id="address"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone">Phone <a href=""
                                                                                style="color: red;">{{$errors->first('phone')}}</a></label>
                                                    <input type="text" name="phone" id="phone"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="mobile">Mobile <a href=""
                                                                                  style="color: red;">{{$errors->first('mobile')}}</a></label>
                                                    <input type="text" name="mobile" id="mobile"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email <a href=""
                                                                                style="color: red;">{{$errors->first('email')}}</a></label>
                                                    <input type="text" name="email" id="email"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="website">Website <a href=""
                                                                                    style="color: red;">{{$errors->first('website')}}</a></label>
                                                    <input type="text" name="website" id="website"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fax">Fax <a href=""
                                                                            style="color: red;">{{$errors->first('fax')}}</a></label>
                                                    <input type="text" name="fax" id="fax"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-success"><i
                                                            class="fa fa-plus"></i> Add ContactInfo
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




