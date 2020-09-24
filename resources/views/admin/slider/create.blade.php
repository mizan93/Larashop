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
              <form role="form" id="quickForm" method="POST" action="{{ route('admin.slider.store') }}"  novalidate="novalidate" enctype="multipart/form-data">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" class="form-control"  placeholder=" name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sub Title</label>
                    <input type="text" name="sub_title" class="form-control"  placeholder=" name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <input type="file" name="image" class="form-control"  placeholder=" name">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
        image:{
            required: true,
        },
      },
  });
});
</script>
@endpush
