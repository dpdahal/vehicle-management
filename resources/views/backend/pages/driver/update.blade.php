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
                            <h2><i class="fa fa-edit"></i> Update Driver</h2>
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
                                    <form action="{{route('driver.update',$driverData->id)}}"
                                          method="post">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label for="from">Full Name:
                                                <a style="color: red;text-decoration: none;">
                                                    {{$errors->first('full_name')}}
                                                </a>
                                            </label>
                                            <input type="text" name="full_name" class="form-control" id="full_name"
                                                   value="{{$driverData->full_name}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="to">Email:
                                                <a style="color: red;text-decoration: none;">
                                                    {{$errors->first('email')}}
                                                </a>
                                            </label>
                                            <input type="text" name="email" class="form-control" id="email"
                                                   value="{{$driverData->email}}">
                                        </div>


                                        <div class="form-group">
                                            <label for="cost">Gender:
                                                <a style="color: red;text-decoration: none;">
                                                    {{$errors->first('gender')}}
                                                </a>
                                            </label>
                                          <input type="radio" name="gender" id="male" value="male"  {{  ($driverData->gender === 'male'  ? ' checked' : '') }}> Male
                                          <input type="radio" name="gender" id="female" value="female"  {{  ($driverData->gender === 'female'  ? ' checked' : '') }}> FeMale
                                        </div>

                                        <div class="form-group">
                                            <label for="vehicle_type">phone:
                                                <a style="color: red;text-decoration: none;">
                                                    {{$errors->first('phone')}}
                                                </a>
                                            </label>
                                           <input type="text" name="phone" id="phone" class="form-control" value="{{$driverData->phone}}">

                                        </div>
                                        <div class="form-group">
                                            <label for="vehicle_type">Mobile:
                                                <a style="color: red;text-decoration: none;">
                                                    {{$errors->first('mobile')}}
                                                </a>
                                            </label>
                                           <input type="text" name="mobile" id="mobile" class="form-control" value="{{$driverData->mobile}}">

                                        </div>
                                        <div class="form-group">
                                            <label for="vehicle_type">Citizen Number:
                                                <a style="color: red;text-decoration: none;">
                                                    {{$errors->first('citizen_number')}}
                                                </a>
                                            </label>
                                           <input type="text" name="citizen_number" id="citizen_number" class="form-control" value="{{$driverData->citizen_number}}">

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
