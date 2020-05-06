<?php
	$categories = DB::table('category_movies')->where('status',1)->get();
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" lang="zxx" class="no-js">
<head>
    <meta charset="utf-8">
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">

    <!-- Favicon -->
	<link rel="shortcut icon" href="{{asset('img/fav.png')}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/linearicons.css')}}">
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{asset('css/nice-select.css')}}">
	<link rel="stylesheet" href="{{asset('css/nouislider.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/ion.rangeSlider.css')}}" />
	<link rel="stylesheet" href="{{asset('css/ion.rangeSlider.skinFlat.css')}}" />
	<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body>
    <div id="app">
        
    <!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="/Movies_project/movies_public/public/"><img src="{{asset('img/logo.png')}}" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="/Movies_project/movies_public/public/">Inicio</a></li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Categorias</a>
								<ul class="dropdown-menu" style="columns: 2 !important;">
									@foreach($categories as $c)
										<li class="nav-item"><a class="nav-link" href="/Movies_project/movies_public/public/search/category/{{$c->id}}">{{$c->name}}</a></li>
									@endforeach
								</ul>
							</li>
							<li class="nav-item"><a class="nav-link" href="contact.html">Contacto</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<!--<li class="nav-item"><a href="#" class="cart"><span class="ti-bag"></span></a></li>-->
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between" method="get" action="{{ route('search.film') }}">
					<input type="text" class="form-control" id="s" name="s" placeholder="Nombre de la pelicula">
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End Header Area -->

        <main class="py-4">
            @yield('content')
        </main>


    <!-- start footer Area -->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Follow Us</h6>
						<p>Let us be social</p>
						<div class="footer-social d-flex align-items-center">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
				<p class="footer-text m-0">
					Copyright &copy;
					@php echo(date("Y")) @endphp 
					All rights reserved | This template is made with 
					<i class="fa fa-heart-o" aria-hidden="true"></i> 
					by <a href="https://colorlib.com" target="_blank">Colorlib</a>
				</p>
			</div>
		</div>
	</footer>
	<!-- End footer Area -->


    </div>

    <script src="{{asset('js/vendor/jquery-2.2.4.min.js')}}" defer></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="{{asset('js/vendor/bootstrap.min.js')}}" defer></script>
	<script src="{{asset('js/jquery.ajaxchimp.min.js')}}" defer></script>
	<script src="{{asset('js/jquery.nice-select.min.js')}}" defer></script>
	<script src="{{asset('js/jquery.sticky.js')}}" defer></script>
	<script src="{{asset('js/nouislider.min.js')}}" defer></script>
	<script src="{{asset('js/countdown.js')}}" defer></script>
	<script src="{{asset('js/jquery.magnific-popup.min.js')}}" defer></script>
	<script src="{{asset('js/owl.carousel.min.js')}}" defer></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="{{asset('js/gmaps.min.js')}}" defer></script>
	<script src="{{asset('js/main.js')}}" defer></script>
</body>
</html>
