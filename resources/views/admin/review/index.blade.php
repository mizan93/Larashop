@extends('admin.layout.app')
@section('title','Review')

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
                    {{-- <a href="{{ route('admin.review.create') }}" class="btn btn-primary">Add New</a> --}}
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            {{-- <h4 class="title">All review <span class="badge badge-info display-4">{{ $reviews->count()}}</span></h4> --}}
                        </div>
                        <div class="card-content table-responsive">
                            <table id="example3" class="table table-striped table-bordered" style="width:100%">
                                <thead class="text-primary">
                                <th>ID</th>
                                <th>Product name</th>
                                <th>Product code</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Comment</th>

                                <th>Created At</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($reviews as $key=>$review)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $review->product_name }}</td>
                                            <td>{{ $review->product_code }}</td>
                                            <td>{{ $review->name }}</td>
                                            <td>{{ $review->email }}</td>
                                            <td>{{ Str::limit($review->comment, 30, '...')  }}</td>
                                            <td>{{ $review->created_at->toFormattedDateString() }}</td>
                                            <td>
                                                <a href="{{ route('admin.review.show',$review->id) }}" class="btn btn-info btn-sm">view</a>

                                                {{-- <form id="delete-form-{{ $review->id }}" action="{{ route('admin.review.destroy',$review->id) }}" style="display: none;" method="POST"> --}}
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $review->id }}').submit();
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
