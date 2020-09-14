@extends('admin.layout.app')

@section('title','Coupon')

@push('css')

@endpush

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
           <a class="btn btn-warning" href="{{ route('admin.coupon.index') }}">BACK</a>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add coupon</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form role="form" id="basic-form" method="POST" action="{{ route('admin.coupon.store') }}"  novalidate="novalidate" enctype="multipart/form-data">
                  @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="code">Code</label>
                    <input type="text" name="code" class="form-control"  placeholder="Coupon code" >
                  </div>
                  <div class="form-group">
                    <label for="discount">Discount</label>
                    <input type="text" name="discount"  class="form-control"  placeholder="Discount" >
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

  $("#basic-form").validate({

      rules:{
        code:{
            required: true,
        },
        discount:{
            required: true,
        }
      },
  });
});
</script>
@endpush
