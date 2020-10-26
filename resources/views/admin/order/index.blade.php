@extends('admin.layout.app')

@section('title', 'Order')
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
        {{-- <a href="{{ route('admin.order.create') }}" class="btn btn-primary">Add New</a> --}}
        <div class="card">
            <div class="card-header" data-background-color="purple">
                <h4 class="title">
                    All order <span class="badge badge-info display-4">{{ $orders->count()}}</span>
                    Pending <span class="badge badge-info display-4">{{ $pending->count()}}</span>
                    Processing <span class="badge badge-info display-4">{{ $processing->count()}}</span>
                    Completed <span class="badge badge-info display-4">{{ $completed->count()}}</span>
                    Canceled <span class="badge badge-info display-4">{{ $canceled->count()}}</span>
                </h4>
            </div>
            <div class="card-content table-responsive">
<table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead class="text-primary">
                        <th>ID</th>
                        <th>Status</th>
                        <th>Grant total</th>
                        <th>Item </th>
                        <th>Paid status</th>
                        <th>name</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>Adress</th>

                        <th>Created At</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($orders as $key=>$order)
                        <tr>
                            {{-- <td>{{ $key + 1 }}</td> --}}
                            {{-- <td><img src="{{ url('storage/order/'.$order->image) }}" alt="{{ $order->name }}" class="img-fluid" style="width: 80px; height:60px;" srcset=""></td> --}}
                            <td>{{ $order->id }}</td>
                            <td>
                                @if ($order->status=='processing')
                                <p>processing</p>
                                @elseif($order->status=='completed')
                                <p>completed</p>
                                @elseif($order->status=='canceled')
                                <p>canceled</p>
                                @else
                               <p>pending</p>
                                @endif

                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Status change to
                                    </button>
                                    <div class="dropdown-menu"aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item" href="{{ route('admin.order.processing',$order->id) }}">processing</a>
                                      <a class="dropdown-item" href="{{ route('admin.order.completed',$order->id) }}">completed</a>
                                      <a class="dropdown-item" href="{{ route('admin.order.canceled',$order->id) }}">canceled</a>
                                    </div>
                                </div>
                                </td>
                            <td>{{ $order->grand_total }}</td>
                            <td>{{ $order->item_count }}</td>
                            <td>{{ $order->is_paid }},{{ $order->payment_method }}</td>

                            <td>{{ $order->name }}</td>
                            <td>{{ $order->user->email }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->address }},{{ $order->city }}-{{ $order->zipcode }}</td>
                            <td>{{ $order->created_at->toFormattedDateString() }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Option
                                    </button>
                                    <div class="dropdown-menu"aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item" href="{{ route('admin.order.show',$order->id) }}">view</a>
                                      {{-- <a class="dropdown-item" href="{{ route('admin.order.edit',$order->id) }}">edit</a> --}}
                                     <form id="delete-form-{{ $order->id }}"  action="{{ route('admin.order.destroy',$order->id) }}" style="display: none;" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a class="dropdown-item" href="#" onclick="if(confirm('Are you sure to delete this order?')){
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $order->id }}').submit();
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
