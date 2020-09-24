@extends('layouts.app')

@section('content')
	{{-- <section id="slider"><!--slider-->
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
	</section><!--/slider--> --}}

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					@include('layouts.sidebar')
				</div>
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{ url('storage/product/'.$product->image) }}" alt="">

							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="">
								<h2>{{ $product->name }}</h2>
								<p> ID: {{ $product->code }}</p>
								{{-- <img src="{{ url('storage/product/'.$product->image) }}" alt=""> --}}
								<span>
									<span> ${{ $product->price }}</span>
									<label>Quantity:</label>
									<input type="text" value="3">
									<a  href="{{ $product->id }}" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</a>	<a  href="{{ $product->id }}" class="btn btn-fefault cart">
										<i class="fa fa-plus-square"></i>
										Add to wishlist
									</a>
                                </span>
                                <p><b>Upload date:</b> {{ $product->updated_at->diffForHumans() }}</p>

								<p><b>Availability:</b> In Stock</p>
                                <p><b>Condition:</b> New</p>
                                @foreach ($product->brand as $product)
								<p><b>Brand:</b> {{ $product->name }}</p>

                                @endforeach
								<p><b>Description:</b> {!! $product->description !!}</p>
								{{-- <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt=""></a> --}}
							</div><!--/product-information-->

						</div>
					</div><!--/product-details-->
                    <div class="category-tab shop-details-tab"><!--category-tab-->

						<div class="tab-content">


							<div class="tab-pane fade active in" id="reviews">
								<div class="col-sm-12">

									<p><b>Write Your Review</b></p>

                                    <form method="POST" action="{{ route('review.store') }}" id="quickForm">
                                        @csrf
										<span>
											<input type="hidden" name="product" value="{{ $product->name }}">
											<input type="text" name="name" placeholder="Your Name">
											<input type="email" name="email" placeholder="Email Address">
										</span>
										<textarea name="comment" placeholder="comment"></textarea>
										<button type="submit" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>

						</div>
					</div>

					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>

						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
                                    @foreach ($randomProducts as $product)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
                                                    <a href="{{ $product->name }}">
                                                    <img src="{{ url('storage/product/'.$product->image)}}" alt="{{ $product->name }}" class="img-fluid"/>
													<h2>${{ $product->price }}</h2>
                                                    <p>{{ $product->name }}</p>
                                                </a>
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
@push('js')

<script>
    $(document).ready(function() {

  $("#quickForm").validate({

      rules:{
        name:{
            required: true,
        },
        email:{
            required: true,
            email: true
        },
        comment:{
            required: true,
        },

      },
      messages:{
          name: "Please specify your name",
          email: {
      required: "We need your email address to contact you",
      email: "Please specify your email"
    },
    comment: "Please write a review about our productd."
      }


  });
});
</script>
@endpush
