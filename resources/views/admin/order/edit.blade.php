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
                  <form action="{{ route('admin.order.update',$order->id) }}" method="post">
                      @csrf
                      @method('GET')

                <h4>Customer details:</h4>
                <table class="table">
                        <tr>
                            <td> <label >Name:</label></td>
                           <td> <input type="text" name="name" value="{{ $order->name }}"> </td>
                        </tr>
                        <tr>
                            <td> <label >Phone:</label></td>
                           <td> <input type="number" name="phone" value="{{ $order->phone }}"> </td>
                        </tr>
                        <tr>
                            <td> <label >Adress:</label></td>
                           <td> <input type="text" name="address" value="{{ $order->address }}"> </td>
                        </tr>
                        <tr>
                            <td> <label >City:</label></td>
                           <td> <input type="text" name="city" value="{{ $order->city }}"> </td>
                        </tr>
                        <tr>
                            <td> <label >Zipcode:</label></td>
                           <td> <input type="text" name="zipcode" value="{{ $order->zipcode }}"> </td>
                        </tr>
                        <tr>
                            <td> <label >Notes (optional):</label></td>
                           <td> <textarea type="text" name="notes" rows="4" >{{ $order->notes }}</textarea>
                         </td>
                        </tr>
                        <tr>
                            <td>           <a class="btn btn-warning" href="{{ route('admin.order.index') }}">BACK</a>
                            </td>
                            <td><button type="submit" class="btn btn-primary" >Update</button></td>
                        </tr>
                </table>
                <h4>Product details:</h4>
                <table class="table">
                    @foreach ($order->items as $order)
                    <tbody>
                        <tr>
                            <td> <label >Name:</label></td>
                            <td> <input type="text" name="name" value="{{ $order->name }}"> </td>

                        </tr>
                        <tr> <td> <label >Code:</label></td>
                            <td> <input type="text" name="code" value="{{ $order->code }}"> </td>
                        </tr>
                        <tr> <td> <label >Quantity:</label></td>
                            <td> <input type="text" name="code" value="{{ $order->pivot->quantity2 }}"> </td>
                        </tr>
                        <tr> <td> <label >Price:</label></td>
                            <td> <input type="text" name="code" value="{{ $order->pivot->price2 }}"> </td>
                        </tr>
                    </tbody>
                        @endforeach

                        <tr>
                            <td>
                                 <a class="btn btn-warning" href="{{ route('admin.order.index') }}">BACK</a>
                            </td>
                            <td><button type="submit" class="btn btn-primary" >Update</button></td>
                        </tr>
                </table>



            </form>
            </div>
            <!-- /.card -->
            </div>
    </div><!-- /.container-fluid -->
  </div>
@endsection
@push('js')

@endpush
