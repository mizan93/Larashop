@extends('layouts.app')
@section('title','home')

@section('content')
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($sliders as $slider)
                        <li data-target="#slider-carousel" data-slide-to="{{ ($loop->index) }}" class="{{ ($loop->first) ? 'active' : '' }}"></li>

                        @endforeach
                    </ol>

                    <div class="carousel-inner">
                        @foreach ($sliders as $slider)
                        <div class="item {{ ($loop->first) ? 'active' : '' }}">

                            <div class="col-sm-6">
                                <h1>LARASHOP(ecommerce)</h1>
                                <h2>{{ $slider->title }}</h2>
                                <p>{{ $slider->sub_title }}</p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ url('storage/slider/'.$slider->image) }}" class="girl img-responsive" alt="">
                                {{-- <img src="images/home/pricing.png" class="pricing" alt=""> --}}
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
                    @include('layouts.sidebar')
				</div>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						@foreach ($products as $product)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<a href="{{ route('details',$product->slug) }}" >

								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{ url('storage/product/'.$product->image)}}" alt="" />
											<p> {{$product->name}}</p>
											<p>Code: {{$product->code}}</p>
											<p>${{$product->price}}</p>
											<p>{!! Str::limit($product->description, 20, '...') !!}</p>
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
					</div><!--features_items-->



					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>

						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
                                    @foreach ($randomProducts as $product)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
                                                <a href="{{ route('details',$product->slug) }}">
												<div class="productinfo text-center">
                                                    <img src="{{ url('storage/product/'.$product->image)}}" alt="{{ $product->name }}" class="img-fluid"/>
													<h2>${{ $product->price }}</h2>
                                                    <p>{{ $product->name }}</p>
                                                </a>
													<a href="{{ route('add.cart',$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>

											</div>
										</div>
									</div>
                                    @endforeach
								</div>

							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>
						</div>
					</div><!--/recommended_items-->

				</div>
			</div>
		</div>
	</section>


@endsection
