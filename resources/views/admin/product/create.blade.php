@extends('admin.layout.app')

@section('title', 'Product')
@push('css')

@endpush

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
           <a class="btn btn-warning" href="{{ route('admin.product.index') }}">BACK</a>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm" method="POST" action="{{ route('admin.product.store') }}"  novalidate="novalidate" enctype="multipart/form-data">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control"  placeholder=" name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Code</label>
                    <input type="text" name="code" class="form-control"  placeholder="Product Code">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Price</label>
                    <input type="passwtextord" name="price" class="form-control"  placeholder="Product price">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Category</label>
                  <select name="category"  class="form-control">
                    <option >Select a category</option>
                    @foreach($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                    @endforeach
                  </select>
                </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Brand</label>
                  <select name="brand" class="form-control">
                    <option >Select a brand</option>
                    @foreach($brands as $b)
                    <option value="{{$b->id}}">{{$b->name}}</option>
                    @endforeach
                  </select>
                </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Image</label><br>
                    <input type="file" name="image"  >
                  </div>
                  <div class="form-group ">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea class="form-control description" name="description"></textarea>
                    </div>
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
        name:{
            required: true,
        },
        code:{
            required: true,
        },
        price:{
            required: true,
        },
        category:{
            required: true,
        },
        brand:{
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
