@extends('layouts.app')

@section('content')
@section('title', 'priceRange')
	<section>
		<div class="container">products
			<div class="row">
				<div class="col-sm-3">
					{{-- @include('layouts.sidebar') --}}
				</div>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center"><b>{{$products->count()}} result bettwen {{ $minval }} to {{ $maxval }} price</b></h2>
                        @if ($products->count()>0)
						@foreach ($products as $product)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<a href="{{ route('details',$product->slug) }}" >

								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{ url('storage/product/'.$product->image)}}" alt="" />
											<p>Name: {{$product->name}}</h2>

											<p>Code: {{$product->code}}</h2>
											<p>Price: $ {{$product->price}}</h2>
											<p>details: {!! Str::limit($product->description, 20, '...') !!}
										</div>

								</div>
								</a>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="{{ $product->id }}" class="btn btn-default add-to-cart"><i class="fa fa-plus-square"></i>Add to wishlis</a></li>
										<li><a href="{{ route('add.cart',$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
                        @else
                            <h2>Not Found</h2>
                        @endif
					</div><!--features_items-->





				</div>
			</div>
		</div>
	</section>

@endsection
