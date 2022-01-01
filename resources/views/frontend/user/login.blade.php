@extends('frontend.master.master')
@section('content')
    <div class="login-page">
        <div class="container">
            <div class="row">
                @include('backend.layouts.message')

                <div class="col-md-6">
                    <form action="{{route('login')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="username">Username *
                                <a style="color: red;">{{$errors->first('username')}}</a></label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div><!-- End .form-group -->

                        <div class="form-group">
                            <label for="password">Password *
                                <a style="color: red;">{{$errors->first('password')}}</a>
                            </label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div><!-- End .form-group -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                <span>LOG IN</span>
                                <i class="icon-long-arrow-right"></i>

                            </button>
                            <label><input type="checkbox" name="remember_me"> Remember Me</label>
                            <a href="{{route('forgot-password')}}" class="forgot-link pull-right">Forgot Your
                                Password?</a>

                        </div>

                        <div class="">
                            <div class="form-group">

                            </div>

                            <div class="custom-control custom-checkbox ">

                            </div><!-- End .custom-checkbox -->


                        </div><!-- End .form-footer -->
                    </form>
                    <div class="form-choice">
                        <p class="text-center">or sign in with</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="{{route('login.redirect','google')}}" class="btn btn-login btn-g">
                                    <i class="icon-google"></i>
                                    Login With Google
                                </a>
                            </div><!-- End .col-6 -->
                            <div class="col-sm-6">
                                <a href="{{route('login.redirect','facebook')}}"
                                   class="btn btn-login btn-f">
                                    <i class="icon-facebook-f"></i>
                                    Login With Facebook
                                </a>
                            </div><!-- End .col-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .form-choice -->
                </div>
            </div>
        </div>
    </div>

@endsection
