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
                            <h2><i class="fa fa-money"></i> Manage Destination Cost</h2>
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
                                    <form action="{{route('destination-rate.store')}}" method="post">
                                        @csrf
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="from">From:
                                                    <a style="color: red;text-decoration: none;">
                                                        {{$errors->first('from')}}
                                                    </a>
                                                </label>
                                                <select name="from" id="from" class="form-control">
                                                    @foreach($cityData as $city)
                                                        <option value="{{$city->id}}">{{$city->city_name}}</option>
                                                    @endforeach
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
                                                <select name="to" id="to" class="form-control">
                                                    @foreach($cityData as $city)
                                                        <option value="{{$city->id}}">{{$city->city_name}}</option>
                                                    @endforeach
                                                </select>
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
                                                    @foreach($vehicleTypeData as $vType)
                                                        <option value="{{$vType->id}}">{{$vType->type}}</option>

                                                    @endforeach

                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button class="btn btn-success">
                                                    <i class="fa fa-money"></i> Add Destination Rate
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
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Cost</th>
                                            <th>Vehicle Type</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($destinationRateData as $key=>$dRate)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$dRate->fromName->city_name}}</td>
                                                <td>{{$dRate->toName->city_name}} </td>
                                                <td>{{$dRate->cost}} </td>
                                                <td>
                                                    {{$dRate->getVehicleType->type}}

                                                </td>

                                                <td>

                                                    <form method="POST"
                                                          action="{{route('destination-rate.destroy',[$dRate->id])}}">

                                                        <a href="{{route('destination-rate.edit',$dRate->id)}}"
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
