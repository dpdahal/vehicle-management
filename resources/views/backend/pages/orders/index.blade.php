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
                            <h2><i class="fa fa-money"></i> Manage Orders List</h2>
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
{{--                                <div class="col-md-12">--}}
{{--                                    <form action="{{route('driver.store')}}" method="post">--}}
{{--                                        @csrf--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="from">From:--}}
{{--                                                    <a style="color: red;text-decoration: none;">--}}
{{--                                                        {{$errors->first('from')}}--}}
{{--                                                    </a>--}}
{{--                                                </label>--}}
{{--                                                <select name="from" id="from" class="form-control">--}}

{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="to">To:--}}
{{--                                                    <a style="color: red;text-decoration: none;">--}}
{{--                                                        {{$errors->first('to')}}--}}
{{--                                                    </a>--}}
{{--                                                </label>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="cost">Cost:--}}
{{--                                                    <a style="color: red;text-decoration: none;">--}}
{{--                                                        {{$errors->first('cost')}}--}}
{{--                                                    </a>--}}
{{--                                                </label>--}}
{{--                                                <input type="number" name="cost" class="form-control" id="cost"--}}
{{--                                                       value="{{old('cost')}}">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="vehicle_type">Vehicle Type:--}}
{{--                                                    <a style="color: red;text-decoration: none;">--}}
{{--                                                        {{$errors->first('vehicle_type')}}--}}
{{--                                                    </a>--}}
{{--                                                </label>--}}
{{--                                                <select name="vehicle_type" id="vehicle_type"--}}
{{--                                                        class="form-control">--}}


{{--                                                </select>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="col-md-12">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <button class="btn btn-success">--}}
{{--                                                    <i class="fa fa-money"></i> Add Driver--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </form>--}}

{{--                                </div>--}}
                                <div class="col-md-12">
                                    <hr>
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>S.n</th>
                                            <th>Trip Date</th>
                                            <th>Trip Name</th>
                                            <th>Cost</th>
                                            <th>Customer Name</th>
                                            <th>Vehicle Type</th>
                                               <th>status</th>
                                               <th>Payment</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $key=>$odata)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$odata->id}}</td>

                                                <td>{{$odata->trip->title}} </td>
                                                <td>{{$odata->trip->tripCost->cost}} </td>
                                                <td>{{$odata->customers->full_name}}</td>


                                                <td>{{$odata->trip->tripCost->getVehicleType->type}}</td>
                                                <td id="statusBtn">
                                                 <p>{{$odata->status}}</p>  
                                                    <select name="statuschange" style="display: none"  data-key="{{$odata->id}}">
                                                        <option value="pending">pending</option>
                                                        <option value="booked">booked</option>
                                                        <option value="not_confirmed">not confirmed</option>
                                                    </select>
                                                </td>
                                                <td id="paymentStatusBtn">
                                                 <p>{{$odata->payment_status}}</p>  
                                                 <select name="paymentstatuschange" style="display: none"  data-key="{{$odata->id}}">
                                                    <option value="pending">pending</option>
                                                    <option value="booked">booked</option>
                                                    <option value="not_confirmed">not confirmed</option>
                                                </select> 
                                                </td>
                                                <td>

{{--                                                    <form method="POST"--}}
{{--                                                          action="{{route('driver.destroy',[$ddata->id])}}">--}}

{{--                                                        <a href="{{route('driver.edit',$ddata->id)}}"--}}
{{--                                                           class="btn-sm btn-success">--}}
{{--                                                            <i class="fa fa-edit"></i>--}}
{{--                                                        </a>--}}
{{--                                                        @csrf--}}
{{--                                                        @method('delete')--}}
{{--                                                        <button class="btn-sm btn-danger"><i--}}
{{--                                                                class="fa fa-trash"--}}
{{--                                                                onclick="return confirm('are you sure');"></i>--}}

{{--                                                        </button>--}}
{{--                                                    </form>--}}
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
