@extends('layouts.app')
@section('title', 'details')

@section('content')

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
									<input type="text" value="{{ $product->quantity }}">
									<a  href="{{ route('add.cart',$product->id) }}" class="btn btn-fefault cart">
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

										    <input type="text" name="name" placeholder="Your Name">
											<input type="email" name="email"  placeholder="Your Email Address">
											<input type="text" name="product_name" placeholder="Product Name">
											<input type="text" name="product_code" placeholder="Product Code">


										<textarea name="comment" placeholder="comment"></textarea>
										<button type="submit" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>

						</div>
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

        email:{
            required: true,
            email: true
        },
		product_name:{
            required: true,
        },
        product_code:{
            required: true,
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
	product_name: "Please specify product name",
          product_code: "Please specify product code",
    comment: "Please write a review about our productd."
      }


  });
});
</script>
@endpush
