<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="{{ asset('theme_assets/img/fav.jpg') }}">
	<!-- Author Meta -->
	<meta name="author" content="colorlib">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>@yield('title', 'Pakzone Cunsultants')</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="{{ asset('theme_assets/css/linearicons.css' )}}">
	<link rel="stylesheet" href="{{ asset('theme_assets/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('theme_assets/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('theme_assets/css/magnific-popup.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.11/css/lightgallery.min.css">
	<link rel="stylesheet" href="{{ asset('theme_assets/css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ asset('theme_assets/css/animate.min.css') }}">
	<link rel="stylesheet" href="{{ asset('theme_assets/css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('theme_assets/css/main.css') }}">
	<style>
		h1
		{
			font-weight: 200 !important;
		}
		h4, h5, p, .list-group-item
		{
			font-weight: 400 !important;
		}
	</style>
</head>

<body>
	<!--################ Start Header Area ########-->
	<header id="header" id="home">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-sm-6 col-4 no-padding">
						{{-- <div class="header-top-left"> --}}
							<a class="text-lowercase" href="mailto:pakzoneConsultants@yahoo.com">
								<i class="fa fa-envelope"></i>
								{{ $images[0]->header_email }}
							</a>
							<a>
								<i class="fa fa-phone"></i>
								{{ $images[0]->header_contact }}
							</a>
						{{-- </div> --}}
					</div>
					{{-- <div class="col-lg-6 col-sm-6 col-8 header-top-right no-padding"> --}}
						{{-- <ul>
							<li><a href="{{ $images[0]->header_facebook_link }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<li><a href="https://www.linkedin.com/in/mumtaz-abidi-95704637" target="_blank"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fa fa-dribbble"></i></a></li>
							<li><a href="#" target="_blank"><i class="fa fa-behance"></i></a></li>
						</ul> --}}
						{{-- <ul>
							<li>
								<a href="#">Get free Quote</a>
							</li>
						</ul> --}}
					{{-- </div> --}}
				</div>
			</div>
		</div>
		<hr>
		<div class="container main-menu">
			<div class="row align-items-center justify-content-between d-flex">
				<div id="logo">
					<a href="/"><img src="{{ asset('theme_assets/img/logo.jpg') }}" alt="" title="" /></a>
				</div>
				<nav id="nav-menu-container">
					<ul class="nav-menu">
						<li class="{{ request()->is('/') ? 'menu-active' : '' }}"><a href="/">home</a></li>
						<li class="{{ request()->is('our_services') ? 'menu-active' : '' }}"><a href="/our_services">our services</a></li>
						<li class="{{ request()->is('our_expertise') ? 'menu-active' : '' }}"><a href="/our_expertise">our expertise</a></li>
						<li class="{{ request()->is('our_strengths') ? 'menu-active' : '' }}"><a href="/our_strengths">our strengths</a></li>
						{{-- <li class="menu-has-children {{ request()->is('blog*') ? 'menu-active' : '' }}"><a href="">blog</a>
							<ul>
								<li><a href="/blog-home">Blog Home</a></li>
								<li><a href="/blog-single">Blog Single</a></li>
							</ul>
						</li> --}}
						{{-- <li class="menu-has-children"><a href="">Pages</a>
							<ul>
								<li class="{{ request()->is('portfolio-details') ? 'menu-active' : '' }}"><a href="/portfolio-details">Portfolio Details</a></li>
								<li class="{{ request()->is('elements') ? 'menu-active' : '' }}"><a href="/elements">Elements</a></li>
							</ul>
						</li> --}}
						<li class="{{ request()->is('contact_us') ? 'menu-active' : '' }}"><a href="/contact_us">contact us</a></li>
					</ul>
				</nav>
				<!--######## #nav-menu-container -->
			</div>
		</div>
	</header>
	<!--######## End Header Area ########-->

	@yield('content')

	<!--######## start footer Area ########-->
	<footer class="footer-area">
		<div class="container">
			{{-- <div class="row"> --}}
				{{-- <div class="col-lg-3  col-md-6">
					<div class="single-footer-widget">
						<h6>Top Products</h6>
						<ul class="footer-nav">
							<li><a href="#">Managed Website</a></li>
							<li><a href="#">Manage Reputation</a></li>
							<li><a href="#">Power Tools</a></li>
							<li><a href="#">Marketing Service</a></li>
						</ul>
					</div>
				</div> --}}
				{{-- <div class="col-lg-6 col-md-6">
					<div class="single-footer-widget newsletter">
						<h6>Newsletter</h6>
						<p>You can trust us. we only send promo offers, not a single spam.</p>
						<div id="mc_embed_signup">
							<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
							 method="get" class="form-inline">

								<div class="form-group row" style="width: 100%">
									<div class="col-lg-8 col-md-12">
										<input name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'"
										 required="" type="email">
										<div style="position: absolute; left: -5000px;">
											<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
										</div>
									</div>

									<div class="col-lg-4 col-md-12">
										<button class="nw-btn primary-btn">Subscribe<span class="lnr lnr-arrow-right"></span></button>
									</div>
								</div>
								<div class="info"></div>
							</form>
						</div>
					</div>
				</div> --}}
				{{-- <div class="col-lg-3  col-md-12">
					<div class="single-footer-widget mail-chimp">
						<h6 class="mb-20">Instragram Feed</h6>
						<ul class="instafeed d-flex flex-wrap">
							<li><img src="{{ asset('theme_assets/img/i1.jpg') }}" alt=""></li>
							<li><img src="{{ asset('theme_assets/img/i2.jpg') }}" alt=""></li>
							<li><img src="{{ asset('theme_assets/img/i3.jpg') }}" alt=""></li>
							<li><img src="{{ asset('theme_assets/img/i4.jpg') }}" alt=""></li>
							<li><img src="{{ asset('theme_assets/img/i5.jpg') }}" alt=""></li>
							<li><img src="{{ asset('theme_assets/img/i6.jpg') }}" alt=""></li>
							<li><img src="{{ asset('theme_assets/img/i7.jpg') }}" alt=""></li>
							<li><img src="{{ asset('theme_assets/img/i8.jpg') }}" alt=""></li>
						</ul>
					</div>
				</div> --}}
			{{-- </div> --}}

			<div class="d-flex justify-content-between align-items-center flex-wrap">
				<p class="col-lg-8 col-sm-12 footer-text m-3 text-info">
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made by <a href="http://www.redstartechs.com/" target="_blank">Red Star Technologies</a>
				</p>
				{{-- <div class="footer-social d-flex align-items-center"> --}}
					{{-- <a href="{{ $images[0]->header_facebook_link }}"><i class="fa fa-facebook"></i></a> --}}
					{{-- <a href="#"><i class="fa fa-twitter"></i></a> --}}
					{{-- <a href="#"><i class="fa fa-dribbble"></i></a> --}}
					{{-- <a href="#"><i class="fa fa-behance"></i></a> --}}
				{{-- </div> --}}
			</div>
		</div>
	</footer>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
	<!--######## End footer Area ########-->

	<script src="{{ asset('theme_assets/js/vendor/jquery.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
	 crossorigin="anonymous"></script>
	<script src="theme_assets/js/vendor/bootstrap.min.js"></script>
	{{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script> --}}
	<script src="theme_assets/js/easing.min.js"></script>
	<script src="theme_assets/js/hoverIntent.js"></script>
	<script src="theme_assets/js/superfish.min.js"></script>
	<script src="theme_assets/js/jquery.ajaxchimp.min.js"></script>
	<script src="theme_assets/js/jquery.magnific-popup.min.js"></script>
	<script src="theme_assets/js/owl.carousel.min.js"></script>
	<script src="theme_assets/js/isotope.pkgd.min.js"></script>
	<script src="theme_assets/js/owl.carousel.min.js"></script>
	<script src="theme_assets/js/jquery.nice-select.min.js"></script>
	<script src="theme_assets/js/jquery.lightbox.js"></script>
	<script src="theme_assets/js/mail-script.js"></script>
	<script src="theme_assets/js/main.js"></script>
	<script>
		jQuery.fn.liScroll = function(settings)
		{
			settings = jQuery.extend(
			{
				travelocity: 0.01
			}, settings);		
			return this.each(function()
			{
				var $strip = jQuery(this);
				$strip.addClass("newsticker")
				var stripHeight = 1;
				$strip.find("li").each(function(i)
				{
					stripHeight += jQuery(this, i).outerHeight(true); // thanks to Michael Haszprunar and Fabien Volpi
				});
				var $mask = $strip.wrap("<div class='mask'></div>");
				var $tickercontainer = $strip.parent().wrap("<div class='tickercontainer'></div>");								
				var containerHeight = $strip.parent().parent().height();	//a.k.a. 'mask' width 	
				$strip.height(stripHeight);			
				var totalTravel = stripHeight;
				var defTiming = totalTravel/settings.travelocity;	// thanks to Scott Waye		
				function scrollnews(spazio, tempo)
				{
					$strip.animate({top: '-='+ spazio}, tempo, "linear", function(){$strip.css("top", containerHeight); scrollnews(totalTravel, defTiming);});
				}
				scrollnews(totalTravel, defTiming);				
				$strip.hover(function()
				{
					jQuery(this).stop();
				},
				function()
				{
					var offset = jQuery(this).offset();
					var residualSpace = offset.top + stripHeight;
					var residualTime = residualSpace/settings.travelocity;
					scrollnews(residualSpace, residualTime);
				});			
			});	
		};

		$(function()
		{
		    $("ul#ticker01").liScroll();
		});
	</script>
</body>

</html>