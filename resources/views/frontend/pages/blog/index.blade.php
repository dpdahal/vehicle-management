@extends('frontend.master.master')
@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
                        </ol>
                    </div>
                </div>

            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="dashboard">
                <div class="container">
                    <div class="row">
                        @foreach($blogData as $blog)
                            <div class="col-md-8">
                                <h1><a href="{{route('blog').'/'.$blog->slug}}">{{$blog->title}}</a></h1>
                                <p>
                                    {!! $blog->description !!}
                                </p>
                            </div>
                            <div class="col-md-4">
                                @if($blog->image)
                                    <img src="{{url($blog->image)}}" class="img-responsive img-thumbnail" alt="">
                                @else
                                    @include('lib.image-not-found')
                                @endif
                            </div>
                        @endforeach


                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .dashboard -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
