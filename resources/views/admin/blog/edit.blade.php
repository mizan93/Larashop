@extends('admin.layout.app')

@section('title','blog')

@push('css')

@endpush

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
           <a class="btn btn-warning" href="{{ route('admin.blog.index') }}">BACK</a>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add blog</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm" method="POST" action="{{ route('admin.blog.update',$blog->id) }}"  novalidate="novalidate" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')

                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Writer name</label>
                      <input type="text" name="writer_name" class="form-control" value="{{ $blog->writer_name }}" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Blog Title</label>
                      <input type="text" name="blog_title" class="form-control" value="{{ $blog->blog_title }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Image</label>
                      <input type="file" name="image" class="form-control" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Image</label>
                   <textarea class="custom-control-label description" name="description">
                    {{ $blog->description }}</textarea>       
             </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
    </div><!-- /.container-fluid -->
  </div>
@endsection

@push('js')
<script src="{{ asset('admin/tinymce/tinymce.js') }}"></script>
    <script>
    tinymce.init({
        selector:'textarea.description',

    });
</script>
<script>
    $(document).ready(function() {
  $("#quickForm").validate({
      rules:{
        writer_name:{
            required: true,
        },
        blog_title:{
            required: true,
        },
        description:{
            required: true,
        },
      },
  });
});
</script>
@endpush
