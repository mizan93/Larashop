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
                <h3 class="card-title">Edit coupon</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm" method="POST" action="{{ route('admin.coupon.update',$coupon->id) }}"  novalidate="novalidate" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                <div class="card-body">
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Code</label>
                    <input type="text" name="code" value="{{ $coupon->code }}" class="form-control"  placeholder="Coupon code">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Discount</label>
                    <input type="text" name="discount" value="{{ $coupon->discount }}" class="form-control"  placeholder="Discount">
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
