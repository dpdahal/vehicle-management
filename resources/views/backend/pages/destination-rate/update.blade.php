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
                            <h2><i class="fa fa-edit"></i> Update Destination Cost</h2>
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
                                    <form action="{{route('destination-rate.update',$destinationRateData->id)}}"
                                          method="post">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label for="from">From:
                                                <a style="color: red;text-decoration: none;">
                                                    {{$errors->first('from')}}
                                                </a>
                                            </label>
                                            <input type="text" name="from" class="form-control" id="from"
                                                   value="{{$destinationRateData->from}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="to">To:
                                                <a style="color: red;text-decoration: none;">
                                                    {{$errors->first('to')}}
                                                </a>
                                            </label>
                                            <input type="text" name="to" class="form-control" id="to"
                                                   value="{{$destinationRateData->to}}">
                                        </div>


                                        <div class="form-group">
                                            <label for="cost">Cost:
                                                <a style="color: red;text-decoration: none;">
                                                    {{$errors->first('cost')}}
                                                </a>
                                            </label>
                                            <input type="number" name="cost" class="form-control" id="cost"
                                                   value="{{$destinationRateData->cost}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="vehicle_type">Vehicle Type:
                                                <a style="color: red;text-decoration: none;">
                                                    {{$errors->first('vehicle_type')}}
                                                </a>
                                            </label>
                                            <select name="vehicle_type[]" id="vehicle_type"
                                                    multiple="multiple"
                                                    class="form-control js-example-basic-multiple">
                                                @foreach($destinationRateData->destinationRateTypes as $dtD)
                                                    <option value="{{$dtD->id}}"
                                                            readonly selected>{{$dtD->type}}</option>
                                                @endforeach
                                                @foreach($vehicleTypeData as $vType)
                                                    <option value="{{$vType->id}}">{{$vType->type}}</option>

                                                @endforeach

                                            </select>

                                        </div>



                                        <div class="form-group">
                                            <button class="btn btn-success">
                                                <i class="fa fa-edit"></i> Update Destination Rate
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
