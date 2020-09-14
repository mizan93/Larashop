@extends('layouts.app')

@section('content')
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free E-Commerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>100% Responsive Design</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>

							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free Ecommerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>

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
	</section><!--/slider-->

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							@foreach ($categories as $cat)
								<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">{{ $cat->cat_name}}</a></h4>
								</div>
							</div>
							@endforeach
						</div><!--/category-products-->
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									@foreach ($brands as $brand)
										<li><a href="#"> {{{ $brand->name }}}<span class="badge badge-primary">{{ $brand->products->count()}}</span></a></li>
									@endforeach
								</ul>
							</div>
						</div><!--/brands_products-->
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					</div>
				</div>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						@foreach ($products as $product)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<a href="#" >

								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{ url('storage/product/'.$product->image)}}" alt="" />
											<p> {{$product->name}}</h2>
											<p>Code: {{$product->code}}</h2>
											<p>${{$product->price}}</h2>
											<p>{!! Str::limit($product->description, 20, '...') !!}
										</div>

								</div>
								</a>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="{{ $product->id }}" class="btn btn-default add-to-cart"><i class="fa fa-plus-square"></i>Add to wishlis</a></li>
										<li><a href="{{ $product->id }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
					</div><!--features_items-->

					{{-- <div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								@foreach ($categories as $cat)
								<li><a href="#{{ $cat->slug }}" data-toggle="tab">{{ $cat->cat_name }}-<span class="badge">{{ $cat->count() }}</span></a></li>

								@endforeach

							</ul>
                        </div>
                        @foreach ($products as $product)
						<div class="tab-content">

							<div class="tab-pane fade  in" id="{{ $product->cat->slug}}" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{ url('storage/product/'.$product->image)}}" alt="{{ $product->name }}" />
												<h2>${{  $product->price }}</h2>
												<p>{{  $product->name  }}</p>
												<a href="{{ $product->id }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>

										</div>
									</div>
								</div>

							</div>


                        </div>
                        @endforeach
					</div><!--/category-tab--> --}}
                    <div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								@foreach ($categories as $category)
                                <li class=""><a href="#{{ $category->slug }}" data-toggle="tab">{{ $category->cat_name }}
                                    {{-- <span class="badge">{{ $category->products->count() }}</span> --}}
                                </a></li>

                                @endforeach
							</ul>
						</div>
						<div class="tab-content">
                            @foreach ($products as $product)


							<div class="tab-pane fade active in" id="{{ $product->cat->slug }}">
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery2.jpg" alt="">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>

										</div>
									</div>
								</div>

                            </div>
                            @endforeach
						</div>
					</div>
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>

						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
                                    @foreach ($products as $product)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
                                                    <img src="{{ url('storage/product/'.$product->image)}}" alt="" />
													<h2>${{ $product->price }}</h2>
													<p>{{ $product->name }}</p>
													<a href="{{ $product->id }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
