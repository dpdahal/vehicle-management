@extends('frontend.master.master')

@section('content')
    <div class="user-register">
        <div class="container">
            <div class="row">


                <div class="col-md-12">
                    <h1>Create Your Account</h1>
                </div>
                @include('backend.layouts.message')
                <form action="{{route('register')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="full_name">Name: <a
                                style="color: red;">{{$errors->first('full_name')}}</a></label>
                        <input type="text" name="full_name" id="full_name"
                               value="{{old('full_name')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="username">Username: <a
                                style="color: red;">{{$errors->first('username')}}</a></label>
                        <input type="text" name="username" id="username"
                               value="{{old('username')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email: <a
                                style="color: red;">{{$errors->first('email')}}</a></label>
                        <input type="text" name="email" id="email"
                               value="{{old('email')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:<a
                                style="color: red;">{{$errors->first('gender')}}</a>
                        </label>
                        <select name="gender" id="gender"
                                class="form-control">
                            <option value="" readonly>---Select Gender---</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone: <a
                                style="color: red;">{{$errors->first('phone')}}</a></label>
                        <input type="text" name="phone" id="phone"
                               value="{{old('phone')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile: <a
                                style="color: red;">{{$errors->first('mobile')}}</a></label>
                        <input type="text" name="mobile"
                               value="{{old('mobile')}}" id="mobile" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password: <a
                                style="color: red;">{{$errors->first('password')}}</a></label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">Register</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
