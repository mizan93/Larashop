@extends('layouts.app')

@section('content')
@section('title', 'cart')

    <section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active"> Cart</li>
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
                        <tr><h2>Cart is empty right now.</h2>
                        </tr>
                        @endif

                    </tbody>

                </table>
                <div>
                    <a href="{{ route('products') }}" class="btn btn-primary">Continue Shopping</a>
                </div>
            </div>

		</div>
    </section>
    <section id="do_action">
		<div class="container">

			<div class="row">
				<div class="col-sm-6">
                        <label for="">Coupon Code (if any)</label>
                        {{-- <form action="{{ route('coupon.code') }}"> --}}
                        <div class="input-group">
                            <input type="text" class="form-control" name="coupon_code" id="coupon_id" >
                            <button type="submit" class="btn btn-primary fld-btn"
                             id="coupon_btn">Get Discount</button>
                        </div>
                    </form>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>${{ Cart::session(auth()->id())->getSubTotal() }}</span></li>
							<li>Eco Tax <span>Free</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>${{ Cart::session(auth()->id())->getTotal() }}</span></li>
						</ul>
							<a class="btn btn-default check_out" href="{{ route('checkout') }}">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
@push('js')
<script>
    // $(document).ready(function () {
    //     $('#coupon_btn').click(function () {
    //         var coupon_id = $('#coupon_id').val();
    //         $.ajax({
    //             url: "{{ url('/checkCoupon') }}",
    //             data: "code=" + coupon_id,
    //             success: function (response) {
    //                 alert(response);
    //             }
    //         });

    //     });
    // });
</script>
@endpush
