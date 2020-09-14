@extends('admin.layout.app')

@section('title', 'Product')
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
        <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Add New</a>
        <div class="card">
            <div class="card-header" data-background-color="purple">
                <h4 class="title">All Product <span class="badge badge-info display-4">{{ $products->count()}}</span></h4>
            </div>
            <div class="card-content table-responsive">
<table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead class="text-primary">
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Code</th>
                        <th>Price</th>
                        <th>description</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($products as $key=>$product)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td><img src="{{ url('storage/product/'.$product->image) }}" alt="{{ $product->name }}" class="img-fluid" style="width: 80px; height:60px;" srcset=""></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->cat->cat_name }}</td>
                            <td>{{ $product->brand->name }}</td>
                            <td>{{ $product->code }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{!! Str::limit($product->description, 10, '...')  !!}</td>
                            <td>{{ $product->created_at->toFormattedDateString() }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Option
                                    </button>
                                    <div class="dropdown-menu"aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item" href="{{ route('admin.product.show',$product->id) }}">view</a>
                                      <a class="dropdown-item" href="{{ route('admin.product.edit',$product->id) }}">edit</a>
                                     <form id="delete-form-{{ $product->id }}"  action="{{ route('admin.product.destroy',$product->id) }}" style="display: none;" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a class="dropdown-item" href="#" onclick="if(confirm('Are you sure to delete this product?')){
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $product->id }}').submit();
                                }else {
                                    event.preventDefault();
                                        }">delete</a>
                                    </div>
                                  </div>


                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  </div>
@endsection
@push('js')
<script src="https:////cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
   $(document).ready(function() {
    var table = $('#example').DataTable( {
        fixedHeader: true
    } );
} );
</script>
@endpush
