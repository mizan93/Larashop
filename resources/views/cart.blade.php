@extends('layouts.app')

@section('content')
@section('title', 'cart')

    <section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
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
                        @foreach ($products as $product)
                        <tr>
							<td class="cart_description">
								<p><a href="">{{ $product->name }} </a></p>
								<p>Code: {{ $product->code }}</p>
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
                                    {{-- $@php
                                     $sum=$product->price * $product->quantity ;
                                     echo $sum;
                                @endphp --}}
                                {{ $product->price }}
                                {{  Cart::session(auth()->id())->get($product->id)->getPriceSum() }}
                                </p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{ route('cart.remove',$product->id) }}"><i class="fa fa-times"></i></a>
							</td>
                        </tr>
                        @endforeach
					</tbody>
				</table>
			</div>
		</div>
    </section>
    <section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping &amp; Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$59</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$61</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
