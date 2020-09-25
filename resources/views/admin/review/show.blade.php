@extends('admin.layout.app')

@section('title', 'Review')
@push('css')

@endpush

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
           <a class="btn btn-warning" href="{{ route('admin.review.index') }}">BACK</a>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">View Review</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="mx-4 py-4">
                <p>Product Name: {{ $review->product_name }}</p>
              
                <p>Product Code: {{ $review->product_code }}</p>
                  <p> Name: {{ $review->name }}</p>
                <p>  Email: {{ $review->email }}</p>
                <p>Comment: {!! $review->comment !!}</p>
              </div>

             
            </div>
            <!-- /.card -->
            </div>
    </div><!-- /.container-fluid -->
  </div>
@endsection
@push('js')

@endpush
