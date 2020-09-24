@extends('admin.layout.app')

@section('title','Slider')

@push('css')

@endpush

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
           <a class="btn btn-warning" href="{{ route('admin.slider.index') }}">BACK</a>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Slider</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm" method="POST" action="{{ route('admin.slider.update',$slider->id) }}"  novalidate="novalidate" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')

                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" name="title" class="form-control" value="{{ $slider->title }}" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Sub Title</label>
                      <input type="text" name="sub_title" class="form-control" value="{{ $slider->sub_title }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Image</label>
                      <input type="file" name="image" class="form-control" >
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
<script>
    $(document).ready(function() {
  $("#quickForm").validate({
      rules:{
        title:{
            required: true,
        },
        sub_title:{
            required: true,
        },
      },
  });
});
</script>
@endpush
