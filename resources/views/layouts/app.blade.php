
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Larashop-@yield('title')</title>
    <link href="{{ asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{ asset('frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css')}}" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<style>
                .error{
               color: red;
               font-style: bold;
           }
           </style>
  @stack('css')
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> {{ $companyinfo->phone }}</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i>{{ $companyinfo->email }}</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
                        
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="{{ $companyinfo->fb_link }}"><i class="fa fa-facebook"></i></a></li>
								<li><a href="{{ $companyinfo->tw_link }}"><i class="fa fa-twitter"></i></a></li>
								<li><a href="{{ $companyinfo->insta_link }}"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="{{ $companyinfo->gplus_link }}"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="{{ $companyinfo->youtube_link }}"><i class="fa fa-youtube"></i></a></li>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->

		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="images/home/logo.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canada</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div>

							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canadian Dollar</a></li>
									<li><a href="#">Pound</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li ><a href="{{ route('account') }}"><i class="fa fa-user"></i> Profile</a></li>
								{{-- <li><a href="#"><i class="fa fa-star"></i> Wishlist <span class="badge badge-secondary">2</span></a></li> --}}
								<li><a href="{{ route('checkout') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i> Cart <span class="badge badge-secondary">
                                    @auth
                                    {{ Cart::session(auth()->id())->getContent()->count() }}
                                    @else
                                    0
                                    @endauth
                                </span></a></li>
                                @guest
								<li><a href="{{ route('login') }}"><i class="fa fa-lock"></i> Login</a></li>
                                @else
                                @if ( Auth::user()->isRole()=='user')
								<li>
                                <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                                 <i class="fas fa-sign-out-alt"></i>
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form>
                            </li>
                                @endif

                                @endguest
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li ><a href="{{ route('home') }}" class="{{ request()->routeIs('home')? 'active' : ''
                                }}">Home</a></li>
								<li><a href="{{ route('products') }}" class="{{ request()->routeIs('products')? 'active' : ''
                                }}">Products</a></li>
								<li><a href="{{ route('blog') }}" class="{{ request()->routeIs('blog')? 'active' : ''
                                }}">Blog</a></li>
								<li ><a href="{{ route('contact.index') }}" class="{{ request()->routeIs('contact.index')? 'active' : ''
                                }}">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
						<form action="{{ route('search') }}">
						@csrf
							<input type="text" name="searchdata" placeholder="Search"/>

						</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

    @yield('content')

	<footer id="footer"><!--Footer-->


		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">T-Shirt</a></li>
								<li><a href="#">Mens</a></li>
								<li><a href="#">Womens</a></li>
								<li><a href="#">Gift Cards</a></li>
								<li><a href="#">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2020- @php
                        echo date('Y');
                    @endphp LARASHOP inc. All rights reserved.</p>
					<p class="pull-right">Developed by <span><a target="_blank" href="https://github.com/mizan93?tab=repositories">M R Mizan</a></span></p>
				</div>
			</div>
		</div>

	</footer><!--/Footer-->



    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

	{{-- <script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script> --}}
	<script src="{{ asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{ asset('frontend/js/price-range.js')}}"></script>
    <script src="{{ asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{ asset('frontend/js/main.js')}}"></script>

    <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

  {!! Toastr::message() !!}
@stack('js')
<script>
    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.error('{{ $error }}','Error',{
        closeButton:true,
        progressBar:true,
    });
    @endforeach
      @endif
</script>
</body>
</html>
