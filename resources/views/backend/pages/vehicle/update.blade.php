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
                            <h2><i class="fa fa-car"></i> Update Vehicle
                                <a class="btn-sm btn-primary" href="{{route('manage-vehicle.index')}}">
                                    <i class="fa fa-hand-o-left"></i> Back</a>

                            </h2>
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
                                    <form action="{{route('manage-vehicle.update',$vehicleData->id)}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label for="capacity">Capacity:
                                                <a style="color: red;text-decoration: none;">
                                                    {{$errors->first('capacity')}}
                                                </a>
                                            </label>
                                            <input type="text" name="capacity" class="form-control"
                                                   id="capacity"
                                                   value="{{$vehicleData->capacity}}">
                                        </div>


                                        <div class="form-group">
                                            <label for="model">Model:
                                                <a style="color: red;text-decoration: none;">
                                                    {{$errors->first('model')}}
                                                </a>
                                            </label>
                                            <input type="text" name="model" class="form-control" id="model"
                                                   value="{{$vehicleData->model}}">
                                        </div>


                                        <div class="form-group">
                                            <label for="color">Color:
                                                <a style="color: red;text-decoration: none;">
                                                    {{$errors->first('color')}}
                                                </a>
                                            </label>
                                            <input type="text" name="color" class="form-control" id="color"
                                                   value="{{$vehicleData->color}}">
                                        </div>


                                        <div class="form-group">
                                            <label for="vehicle_type">Types:
                                                <a style="color: red;text-decoration: none;">
                                                    {{$errors->first('vehicle_type')}}
                                                </a>
                                            </label>
                                            <select name="vehicle_type" id="vehicle_type" class="form-control">
                                                <option value="{{$vehicleData->getVehicleTypes->type}}" selected readonly>
                                                    {{$vehicleData->getVehicleTypes->type}}
                                                </option>
                                                @foreach($vehicleTypeData as $vType)
                                                    <option
                                                        value="{{$vType->id}}" {{old('vehicle_type')==$vType->id?"selected":""}}>{{$vType->type}}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <button class="btn btn-success">
                                                <i class="fa fa-plus"></i> Update Vehicle
                                            </button>
                                        </div>
                                    </form>

                                    <hr>

                                    <a href="{{route('manage-vehicle.index')}}"
                                       class="btn btn-primary">
                                        <i class="fa fa-hand-o-left"></i> Back </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
