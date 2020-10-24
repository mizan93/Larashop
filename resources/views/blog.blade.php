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
                    @foreach ($blogs as $blog)
                    <div class="single-blog-post">
                        <h3>{{ $blog->blog_title }}</h3>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-user"></i> {{ $blog->writer_name }}</li>
                                <li><i class="fa fa-clock-o"></i> {{ date('h:i A', strtotime($blog->created_at)) }}</li>
                                <li><i class="fa fa-calendar"></i> {{ $blog->created_at->toFormattedDateString() }}</li>
                            </ul>
                            
                        </div>
                        <a href="{{ route('blog.single',$blog->id) }}">
                            <img src="{{ url('storage/blog/'.$blog->image )}}" class="img-fluid" alt="">
                        </a>
                        <p>{{ Str::limit(strip_tags($blog->description), 150, '...') }}</p>               
             <a class="btn btn-primary" href="{{ route('blog.single',$blog->id) }}">Read More</a>
                    </div>
                    @endforeach
                    <div class="pagination-area">
                        {!! $blogs->links() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
