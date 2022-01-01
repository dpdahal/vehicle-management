@extends('frontend.master.master')
@section('content')
    <main class="main">
        <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17">
            <div class="container">
                <div class="form-box">
                    <div class="form-tab">
                        <h1>Verification</h1>
                        @include('backend.layouts.message')
                        <div class="tab-content">
                            <div id="signin-2">
                                <form action="{{route('buyer-verification')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="criteria" value="{{$username}}">
                                    <div class="form-group">
                                        <label for="verification"> Verification Code</label>
                                        <input type="text" name="verification_code"
                                               id="verification"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary">Verification</button>
                                    </div>
                                </form>


                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .container -->
        </div><!-- End .login-page section-bg -->
    </main><!-- End .main -->
@endsection
