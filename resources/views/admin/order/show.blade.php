@extends('admin.layout.app')

@section('title', 'Order')
@push('css')

@endpush

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
           <a class="btn btn-warning" href="{{ route('admin.order.index') }}">BACK</a>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">View order</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="mx-4 py-4">
                <p>order Name: {{ $order->name }}</p>
                @foreach ($order->brand as $brand)
                <p>Brand Name: {{ $brand->name }}</p>

                @endforeach
                @foreach ($order->cat as $cat)
                <p>Category Name: {{ $cat->cat_name }}</p>

                @endforeach
                <p>order Code: {{ $order->code }}</p>
                <p> order price: $ {{ $order->price }}</p>
               <label for="">Image: </label> <img src="{{ url('storage/order/'.$order->image) }}" style="widows: 500px; height:350px;" class="img-fluid" alt="{{ $order->name }}">
                <p>Details: {!! $order->description !!}</p>
              </div>


            </div>
            <!-- /.card -->
            </div>
    </div><!-- /.container-fluid -->
  </div>
@endsection
@push('js')

@endpush
