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
                <h4>Customer details:</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">{{ $order->name }}</td>
                            <td> {{ $order->user->email  }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->address }}, {{ $order->city }}, {{ $order->zipcode }}.</td>
                            <td>{{ $order->notes }}</td>
                        </tr>

                    </tbody>
                </table>
                <h4>Product details:</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>code</th>
                            <th>price</th>
                            <th>qty</th>
                            <th>Total</th>
                            <th>Order date</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($order->items as $item)
                        <tr>
                            <td scope="row">{{ $item->name }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->pivot->price2 }}</td>
                            <td>{{ $item->pivot->quantity2 }}</td>
                            <td>@php
 echo $item->pivot->price2 * $item->pivot->quantity2
                            @endphp</td>

                            <td>{{ $item->created_at->toFormattedDateString() }}</td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>
                <h5>Grand Total: {{ $order->grand_total }}</h5>
                <h4>Order details:</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order Id</th>
                            <th>Status</th>
                            <th>Payment</th>
                            <th>Payment method</th>
                            <th>Order date</th>


                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td scope="row">{{ $order->id }}</td>
                            <td>{{ $order->status }}</td>
                            <td>@if ($order->is_paid==false)
                                <p>unpaid</p>
                                @else
                               <p>paid</p>
                            @endif</td>
                            <td>
                                  {{ $order->payment_method }}</td>

                            <td>{{ $order->created_at->toFormattedDateString() }}</td>

                        </tr>


                    </tbody>
                </table>



            </div>
            <!-- /.card -->
            </div>
    </div><!-- /.container-fluid -->
  </div>
@endsection
@push('js')

@endpush
