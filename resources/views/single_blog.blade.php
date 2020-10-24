@extends('layouts.app')
@section('title','home')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
               @include('layouts.sidebar')
            </div>
            <div class="col-sm-9">
                <div class="blog-post-area">
                    <h2 class="title text-center">Latest From our Blog</h2>
                    <div class="single-blog-post">
                        <h3>{{ $blog->blog_title }}</h3>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-user"></i> {{ $blog->writer_name }}</li>
                                <li><i class="fa fa-clock-o"></i> {{ date('h:i A', strtotime($blog->created_at)) }}</li>
                                <li><i class="fa fa-calendar"></i> {{ $blog->created_at->toFormattedDateString() }}</li>
                            </ul>
                            
                        </div>
                        <div class="mb-2" style="margin-bottom:15px;">
                            <img src="{{ url('storage/blog/'.$blog->image )}}" class="img-fluid " alt="">

                        </div>
                      
                        <p> {{  strip_tags($blog->description) }}</p>               
                    
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
