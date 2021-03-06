@extends('admin.layout.app')
@section('title','Coupon')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.bootstrap4.min.css">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-left">
                    <a href="{{ route('admin.coupon.create') }}" class="btn btn-primary">Add New</a>
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">All coupon <span class="badge badge-info display-4">{{ $coupons->count()}}</span></h4>
                        </div>
                        <div class="card-content table-responsive">
                            <table id="example3" class="table table-striped table-bordered" style="width:100%">
                                <thead class="text-primary">
                                <th>ID</th>
                                <th>Code</th>
                                <th>Discount</th>
                                <th>Created At</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($coupons as $key=>$coupon)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $coupon->code }}</td>
                                            <td>{{ $coupon->discount }}</td>
                                            <td>{{ $coupon->created_at->toFormattedDateString() }}</td>
                                            <td>
                                                <a href="{{ route('admin.coupon.edit',$coupon->id) }}" class="btn btn-info btn-sm">Edit</a>

                                                <form id="delete-form-{{ $coupon->id }}" action="{{ route('admin.coupon.destroy',$coupon->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure to delete this coupon?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $coupon->id }}').submit();
                                                }else {
                                                    event.preventDefault();
                                                        }"><i class="material-icons"></i>Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script src="https:////cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
   $(document).ready(function() {
    var table = $('#example3').DataTable( {
        fixedHeader: true
    } );
} );
</script>
@endpush
