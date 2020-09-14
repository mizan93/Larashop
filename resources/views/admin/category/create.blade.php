@extends('admin.layout.app')

@section('title','Category')

@push('css')

@endpush

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
           <a class="btn btn-warning" href="{{ route('admin.category.index') }}">BACK</a>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm" method="POST" action="{{ route('admin.category.store') }}"  novalidate="novalidate" enctype="multipart/form-data">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="cat_name" class="form-control"  placeholder=" name">
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
        cat_name:{
            required: true,
        },
      },
  });
});
</script>
@endpush
