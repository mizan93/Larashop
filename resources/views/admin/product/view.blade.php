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
                <h3 class="card-title">View Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="mx-4 py-4">
                <p>Product Name: {{ $product->name }}</p>
                @foreach ($product->brand as $brand)
                <p>Brand Name: {{ $brand->name }}</p>

                @endforeach
                @foreach ($product->cat as $cat)
                <p>Category Name: {{ $cat->cat_name }}</p>

                @endforeach
                <p>Product Code: {{ $product->code }}</p>
                <p> Product price: $ {{ $product->price }}</p>
               <label for="">Image: </label> <img src="{{ url('storage/product/'.$product->image) }}" style="widows: 500px; height:350px;" class="img-fluid" alt="{{ $product->name }}">
                <p>Details: {!! $product->description !!}</p>
              </div>

              {{-- <form role="form" id="quickForm" method="POST" action="{{ route('admin.product.update',$product->id) }}"  novalidate="novalidate" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control"  placeholder="Product name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Code</label>
                    <input type="text" name="code" value="{{ $product->code }}" class="form-control"  placeholder="Product Code">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Price</label>
                    <input type="passwtextord" name="price" value="{{ $product->price }}" class="form-control"  placeholder="Product price">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" name="image" class="form-control"  >
                  </div>
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea class="custom-control-label description" name="description">{{ $product->description }}</textarea>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form> --}}
            </div>
            <!-- /.card -->
            </div>
    </div><!-- /.container-fluid -->
  </div>
@endsection
@push('js')
{{-- <script src="{{ asset('admin/tinymce/tinymce.js') }}"></script>
    <script>
    tinymce.init({
        selector:'textarea.description',

    });
</script> --}}
@endpush
