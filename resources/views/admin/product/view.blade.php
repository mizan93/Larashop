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

              
            </div>
            <!-- /.card -->
            </div>
    </div><!-- /.container-fluid -->
  </div>
@endsection
@push('js')

@endpush
