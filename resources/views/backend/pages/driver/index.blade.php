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
                            <h2><i class="fa fa-money"></i> Manage Driver List</h2>
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
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{route('driver.store')}}" method="post">
                                        @csrf
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="from">From:
                                                    <a style="color: red;text-decoration: none;">
                                                        {{$errors->first('from')}}
                                                    </a>
                                                </label>
                                                <select name="from" id="from" class="form-control">
                                                   
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="to">To:
                                                    <a style="color: red;text-decoration: none;">
                                                        {{$errors->first('to')}}
                                                    </a>
                                                </label>
                                              
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cost">Cost:
                                                    <a style="color: red;text-decoration: none;">
                                                        {{$errors->first('cost')}}
                                                    </a>
                                                </label>
                                                <input type="number" name="cost" class="form-control" id="cost"
                                                       value="{{old('cost')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="vehicle_type">Vehicle Type:
                                                    <a style="color: red;text-decoration: none;">
                                                        {{$errors->first('vehicle_type')}}
                                                    </a>
                                                </label>
                                                <select name="vehicle_type" id="vehicle_type"
                                                        class="form-control">
                                                 

                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button class="btn btn-success">
                                                    <i class="fa fa-money"></i> Add Driver
                                                </button>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>S.n</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>phone / Mobile</th>
                                            <th>Image</th>
                                            <th>Citizenship Number</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($driverData as $key=>$ddata)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$ddata->full_name}}</td>
                                                <td>{{$ddata->email}} </td>
                                                <td>{{$ddata->gender}} </td>
                                                <td>
                                                    {{$ddata->phone}} , {{$ddata->mobile}}
                                                </td>
                                                <td>
                                                 <img src="{{$ddata->image || '/uploads/admins/admin.png'}}" alt="" srcset="">
                                                </td>   
                                                
                                                <td>{{$ddata->citizen_number}}</td>
                                                <td>

                                                    <form method="POST"
                                                          action="{{route('driver.destroy',[$ddata->id])}}">

                                                        <a href="{{route('driver.edit',$ddata->id)}}"
                                                           class="btn-sm btn-success">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn-sm btn-danger"><i
                                                                class="fa fa-trash"
                                                                onclick="return confirm('are you sure');"></i>

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
