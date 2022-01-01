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
                            <h2><i class="fa fa-car"></i> Mange Vehicle </h2>
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
                                    <form action="{{route('manage-vehicle.store')}}" method="post">
                                        @csrf
                                        @method('post')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="capacity">Capacity:
                                                        <a style="color: red;text-decoration: none;">
                                                            {{$errors->first('capacity')}}
                                                        </a>
                                                    </label>
                                                    <input type="text" name="capacity" class="form-control"
                                                           id="capacity"
                                                           value="{{old('capacity')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="model">Model:
                                                        <a style="color: red;text-decoration: none;">
                                                            {{$errors->first('model')}}
                                                        </a>
                                                    </label>
                                                    <input type="text" name="model" class="form-control" id="model"
                                                           value="{{old('model')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="color">Color:
                                                        <a style="color: red;text-decoration: none;">
                                                            {{$errors->first('color')}}
                                                        </a>
                                                    </label>
                                                    <input type="text" name="color" class="form-control" id="color"
                                                           value="{{old('color')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="vehicle_type">Types:
                                                        <a style="color: red;text-decoration: none;">
                                                            {{$errors->first('vehicle_type')}}
                                                        </a>
                                                    </label>
                                                    <select name="vehicle_type" id="vehicle_type" class="form-control">
                                                        <option value="" selected readonly>---Select Types---</option>
                                                        @foreach($vehicleTypeData as $vType)
                                                            <option
                                                                value="{{$vType->id}}" {{old('vehicle_type')==$vType->id?"selected":""}}>{{$vType->type}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button class="btn btn-success">
                                                        <i class="fa fa-plus"></i> Add Vehicle
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="col-md-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>S.n</th>
                                            <th>Capacity</th>
                                            <th>Model</th>
                                            <th>Color</th>
                                            <td>Type</td>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($vehicleData as $key=>$vehicle)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$vehicle->capacity}}</td>
                                                <td>{{$vehicle->model}}</td>
                                                <td>{{$vehicle->color}}</td>
                                                <td>{{$vehicle->getVehicleTypes->type}}</td>
                                                <td>
                                                    <form method="POST"
                                                          action="{{route('manage-vehicle.destroy',[$vehicle->id])}}">

                                                        <a href="{{route('manage-vehicle.edit',$vehicle->id)}}"
                                                           class="btn-sm btn-success">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn-sm btn-danger"><i
                                                                class="fa fa-trash"
                                                                onclick="return confirm('are you sure');"></i>
                                                            Delete
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
