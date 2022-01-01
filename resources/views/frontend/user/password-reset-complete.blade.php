
@extends('frontend.master.master')
@section('content')
    <main class="main">
        <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17">
            <div class="container">
                <div class="form-box">
                    <div class="form-tab">
                        <h1>Login in</h1>
                        @include('backend.layouts.message')
                        <div class="tab-content">
                            <div id="signin-2">
                                @include('backend.layouts.message')
                                <form action="" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="criteria" value="{{$criteria}}">
                                    <div class="form-group">
                                        <label for="password">Password: <a
                                                style="color: red;">{{$errors->first('password')}}</a></label>
                                        <input type="password" name="password" id="password"
                                               class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password: <a
                                                style="color: red;">{{$errors->first('password_confirmation')}}</a></label>
                                        <input type="password" name="password_confirmation"
                                               id="password_confirmation"
                                               class="form-control form-control-sm">
                                    </div>
                                    <button class="btn btn-success">Reset</button>
                                </form>

                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .container -->
        </div><!-- End .login-page section-bg -->
    </main><!-- End .main -->
@endsection
