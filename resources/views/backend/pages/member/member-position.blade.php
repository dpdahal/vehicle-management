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
                            <h2><i class="fa fa-plus"></i> Manage Member
                            </h2>
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
                                    <form action="{{route('member-position.store')}}" method="post"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="position">Position <a href=""
                                                                        style="color: red;">*{{$errors->first('position')}}</a></label>
                                            <input type="text" name="position" id="position" value="{{old('position')}}"
                                                   class="form-control">

                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success"><i
                                                    class="fa fa-plus"></i> Add Member Position
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Position</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($memberPositionData as $key=>$mp)

                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$mp->position}}</td>

                                                <td>
                                                    <form action="{{route('member-position.destroy',$mp->id)}}"
                                                          method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="{{route('member-position.edit',$mp->id)}}"
                                                           class="btn-sm btn-primary" title="edit">
                                                            <i class="fa fa-edit"></i></a>
                                                        <button class="btn-sm btn-danger" title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




