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
                            <h2><i class="fa fa-plus"></i> Edit Contact </h2>
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
                                    <form action="{{route('admin-contact-info.update',$contactInfo->id)}}" method="post">
                                        {{csrf_field()}}
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label for="categories">Select Types:
                                                <a style="color: red;">{{$errors->first('contact_type_id')}}</a>
                                            </label>
                                            <select class="form-control form-control-sm" name="contact_type_id"
                                                    id="categories">
                                                <option value="{{$contactInfo->contactType->id}}" readonly>
                                                    {{$contactInfo->contactType->title}}
                                                </option>
                                                @foreach ($contactType as $type)
                                                    <option value="{{$type->id}}"
                                                        {{ old('contact_type_id') == $type->id ? 'selected' : '' }}>
                                                        {{ucfirst($type->title)}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="title">Title <a href=""
                                                                        style="color: red;">*{{$errors->first('title')}}</a></label>
                                            <input type="text" name="title" id="title" value="{{$contactInfo->title}}"
                                                   class="form-control form-control-sm">

                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address <a href=""
                                                                            style="color: red;">{{$errors->first('address')}}</a></label>
                                            <input type="text" name="address" id="address"
                                                 value="{{$contactInfo->address}}"  class="form-control form-control-sm">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone <a href=""
                                                                        style="color: red;">{{$errors->first('phone')}}</a></label>
                                            <input type="text" name="phone" id="phone"
                                                value="{{$contactInfo->phone}}"   class="form-control form-control-sm">
                                        </div>
                                        <div class="form-group">
                                            <label for="mobile">Mobile <a href=""
                                                                          style="color: red;">{{$errors->first('mobile')}}</a></label>
                                            <input type="text" name="mobile" id="mobile"
                                                 value="{{$contactInfo->mobile}}"  class="form-control form-control-sm">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email <a href=""
                                                                        style="color: red;">{{$errors->first('email')}}</a></label>
                                            <input type="text" name="email" id="email"
                                                value="{{$contactInfo->email}}"   class="form-control form-control-sm">
                                        </div>
                                        <div class="form-group">
                                            <label for="website">Website <a href=""
                                                                            style="color: red;">{{$errors->first('website')}}</a></label>
                                            <input type="text" name="website" id="website"
                                               value="{{$contactInfo->website}}"    class="form-control form-control-sm">
                                        </div>
                                        <div class="form-group">
                                            <label for="fax">Fax <a href=""
                                                                    style="color: red;">{{$errors->first('fax')}}</a></label>
                                            <input type="text" name="fax" id="fax"
                                                  value="{{$contactInfo->fax}}" class="form-control form-control-sm">
                                        </div>


                                        <div class="form-group">
                                            <button type="submit" class="btn-sm btn-success"><i
                                                    class="fa fa-plus"></i> Update ContactInfo
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




