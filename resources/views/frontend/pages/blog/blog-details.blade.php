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
                        <div class="col-md-8">
                            <h1><a href="{{route('blog').'/'.$blogData->slug}}">{{$blogData->title}}</a></h1>
                            @if($blogData->image)
                                <img src="{{url($blogData->image)}}" alt="" class="img-responsive">
                            @endif
                            <p>
                                {!! $blogData->description !!}
                            </p>
                        </div>
                        <div class="col-md-4">
                            <h1>Latest Blog</h1>

                            <ul>
                                @foreach($relatedBlogData as $rBlog)
                                <li><a href="{{route('blog').'/'.$rBlog->slug}}">{{$rBlog->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <!-- Comments Part Start -->
                            <div id="comments">
                                @include('frontend.pages.blog.blog-comment-display', ['comments' => $blogData->comments, 'post_id' => $blogData->id])

                                <h4>Add comment</h4>
                                <form method="post" action="{{ route('blog-comment')}}">
                                    @csrf
                                    <div class="form-group">
                                        <textarea class="form-control" name="body"></textarea>
                                        <input type="hidden" name="blogs_id" value="{{ $blogData->id }}"/>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-color">Add Comment</button>
                                    </div>
                                </form>
                            </div>
                            <!-- Comments Part End -->
                        </div>


                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .dashboard -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
