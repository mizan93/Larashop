@extends('layouts.app')

@section('content')
@section('title', 'cart')

    <section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Checkout</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td>Name</td>
							<td>Price</td>
							<td>Quantity</td>
							<td>Total</td>
                            <td>Action</td>
						</tr>
					</thead>
					<tbody>
                        @if ($products->count()>0)
                        @foreach ($products as $product)
                        <tr>
							<td class="cart_description">
								<p>{{ $product->name }}</p>
							</td>

							<td class="cart_price">
								<p>${{ $product->price }}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{ route('update.cart',$product->id) }}" >

                                    <input class="cart_quantity_input" type="number" name="quantity" value="{{ $product->quantity }}" autocomplete="off" size="2">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">

                                 ${{  Cart::session(auth()->id())->get($product->id)->getPriceSum() }}
                                </p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{ route('cart.remove',$product->id) }}"><i class="fa fa-times"></i></a>
							</td>
                        </tr>
                        @endforeach
                        @else
                        <tr><h2>Cart is empty</h2>
                        </tr>
                        @endif

                    </tbody>

                </table>

            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="heading text-center">
                        <h3>----Your account----</h3>
                    </div>
                    <div class="total_area" >
                        <ul>
                            <li>Cart Sub Total <span>${{ Cart::session(auth()->id())->getSubTotal() }}</span></li>
                            <li>Eco Tax <span>Free</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>${{ Cart::session(auth()->id())->getTotal() }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="heading text-center">
                        <h3>----Shipping information----</h3>
                    </div>
                    <div class="signup-form"><!--sign up form-->
                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf
                            <input type="text" name="name" placeholder="Name">
                            <input type="number" name="phone" placeholder="phone">
                            <input type="text" name="address" placeholder="address">
                            <input type="text" name="city" placeholder="city">
                            <input type="number" name="zipcode" placeholder="zipcode">
                            <textarea type="text" name="notes" placeholder="notes (optional)" rows="5"></textarea>
                            <h3>Payment Option</h3>
                            
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="payment_method" id="" value="cash_on_delivary">
                                    Cash                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="payment_method" id="" value="paypal" >
                                    Paypal                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Place Order</button>
                        </form>
                    </div>
                </div>

            </div>

		</div>
    </section>

@endsection
@push('js')

<script>
    $(document).ready(function() {
  $("#quickForm").validate({

      rules:{
        name:{
            required: true,
        },

        phone:{
            required: true,
            email: true
        },
		address:{
            required: true,
        },
        city:{
            required: true,
        },
        zipcode:{
            required: true,
        },

      },
      messages:{
          name: "Please specify your name",
          phone: "Please specify your phone",
          address: "Please specify your address",
          city: "Please specify your address"
          zipcode: "Please specify your zipcode"
      }


  });
});
</script>
@endpush
