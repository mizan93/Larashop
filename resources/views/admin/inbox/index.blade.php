@extends('admin.layout.app')
@section('title','inbox')

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
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">All Message <span class="badge badge-info display-4">{{ $inbox->count()}}</span>
                                 Seen <span class="badge badge-info display-4">{{ $seen}}
                                </span>
                                Unseen <span class="badge badge-info display-4">{{ $unseen}}</span>  </h4>
                        </div>
                        <div class="card-content table-responsive">
                            <table id="example3" class="table table-striped table-bordered" style="width:100%">
                                <thead class="text-primary">
                                <th>ID</th>
                                <th>Status</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>subject</th>
                                <th>Message</th>
                                <th>Created At</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($inbox as $key=>$inbox)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>

                                            <td>{{ $inbox->status }}</td>
                                            <td>{{ $inbox->name }}</td>
                                            <td>{{ $inbox->email }}</td>
                                            <td>{{ $inbox->subject }}</td>
                                            <td>{{  Str::limit(strip_tags($inbox->message), 150, '...')  }}</td>
                                            <td>{{ $inbox->created_at->toFormattedDateString() }}</td>
                                            <td>
                                                <a href="{{ route('admin.inbox.show',$inbox->id) }}" class="btn btn-info btn-sm">view</a>

                                                <form id="delete-form-{{ $inbox->id }}" action="{{ route('admin.inbox.destroy',$inbox->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $inbox->id }}').submit();
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
