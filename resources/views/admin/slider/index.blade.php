@extends('admin.layout.app')
@section('title','Slider')

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
                    <a href="{{ route('admin.slider.create') }}" class="btn btn-primary">Add New</a>
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">All Slider <span class="badge badge-info display-4">{{ $sliders->count()}}</span></h4>
                        </div>
                        <div class="card-content table-responsive">
                            <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                <thead class="text-primary">
                                <th>ID</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Created At</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($sliders as $key=>$slider)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img src="{{ url('storage/slider/'.$slider->image) }}" alt="{{ $slider->title }}" class="img-fluid" style="width: 80px; height:60px;" srcset=""></td>

                                            <td>{{ $slider->title }}</td>
                                            <td>{{ $slider->sub_title }}</td>
                                            <td>{{ $slider->created_at->toFormattedDateString() }}</td>
                                            <td>
                                                <a href="{{ route('admin.slider.edit',$slider->id) }}" class="btn btn-info btn-sm">Edit</a>

                                                <form id="delete-form-{{ $slider->id }}" action="{{ route('admin.slider.destroy',$slider->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $slider->id }}').submit();
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
    var table = $('#example2').DataTable( {
        fixedHeader: true
    } );
} );
</script>
@endpush
