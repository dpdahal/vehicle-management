@extends('frontend.master.master')
@section('content')
    <main class="main">
        <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17">
            <div class="container">
                <div class="form-box">
                    <div class="form-tab">
                        <h1>Password reset</h1>
                        @include('backend.layouts.message')
                        <div class="tab-content">
                            <div id="signin-2">
                                <form action="{{route('forgot-password')}}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="email">Email *
                                            <a style="color: red;">{{$errors->first('email')}}</a></label>
                                        <input type="text" class="form-control" id="email" name="email"
                                               value="{{old('email')}}" placeholder="Enter your email">
                                    </div><!-- End .form-group -->
                                    <div class="form-group">
                                        <button class="btn btn-success">Send</button>
                                    </div><!-- End .form-group -->

                                </form>

                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .container -->
        </div><!-- End .login-page section-bg -->
    </main><!-- End .main -->
@endsection
