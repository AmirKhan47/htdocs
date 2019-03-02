@extends('layout')
@section('title')
@section('content')
<style>
	.holder { 
  background-color:#ccc;
  width:300px;
  height:250px;
  overflow:hidden;
  padding:10px;
  font-family:Helvetica;
}
.holder .mask {
  position: relative;
  left: 0px;
  top: 10px;
  width:300px;
  height:240px;
  overflow: hidden;
}
.holder ul {
  list-style:none;
  margin:0;
  padding:0;
  position: relative;
}
.holder ul li {
  padding:10px 0px;
}
.holder ul li a {
  color:darkred;
  text-decoration:none;
}
</style>

	<!--######## start banner Area ########-->
	{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous"> --}}
	<section class="" id="">
	  	<div class="bd-example">
		  	<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
		    <ol class="carousel-indicators">
		      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
		      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
		      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
		    </ol>
		    <div class="carousel-inner">
		      <div class="carousel-item active">
		        <img src="uploads/slider_images/{{ $images[0]->image1_name }}" class="d-block w-100" alt="...">
		        <div class="carousel-caption d-none d-md-block" style="background: rgba(204, 71, 16, 0.5);">
		          <h1>{{ $images[0]->label1 }}</h1>
		          <p>{{ $images[0]->text1 }}</p>
		        </div>
		      </div>
		      <div class="carousel-item">
		        <img src="uploads/slider_images/{{ $images[0]->image2_name }}" class="d-block w-100" alt="...">
		        <div class="carousel-caption d-none d-md-block" style="background: rgba(204, 71, 16, 0.5);">
		          <h1>{{ $images[0]->label2 }}</h1>
		          <p>{{ $images[0]->text2 }}</p>
		        </div>
		      </div>
		      <div class="carousel-item">
		        <img src="uploads/slider_images/{{ $images[0]->image3_name }}" class="d-block w-100" alt="...">
		        <div class="carousel-caption d-none d-md-block" style="background: rgba(204, 71, 16, 0.5);">
		          <h1>{{ $images[0]->label3 }}</h1>
		          <p>{{ $images[0]->text3 }}</p>
		        </div>
		      </div>
		    </div>
		    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
		      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		      <span class="sr-only">Previous</span>
		    </a>
		    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
		      <span class="carousel-control-next-icon" aria-hidden="true"></span>
		      <span class="sr-only">Next</span>
		    </a>
		  	</div>
		</div>
	</section>
	<!--######## End banner Area ########-->
	<!--######## Start Latest News Area ########-->
	<section class="latest-news-area section-gap">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-8">
					<div class="main-title text-center">
						<h1>PAKZONE CONSULTANTS (TESTING LAB)</h1>
						<p>HDIP/ORGA AUTHORIZED CNG TESTING LABORATORY FOR SAFETY RELIEF DEVICES & CALIBRATION OF GAUGES
						</p>
					</div>
				</div>
				<div class="col-4 rounded border-left">
					<h4 class="text-left text-uppercase"><u>Latest News</u></h4>
					<div class="news-section">
						{{-- @foreach ($data as $news)
	                        <div class="p-1 border-bottom mx-auto">
			                    <h5 class="text-uppercase">{{$news->news_headline}}</h5>
			                    <p>{{$news->news_description}}</p>
	                        </div>
	                	@endforeach --}}
	                	<div class="holder">
						  	<ul id="ticker01">
						  		@foreach ($data as $news)
								<li><span>{{ $news->updated_at }}</span><h5 class="text-uppercase">{{ $news->news_headline }}</h5>
			                    <p>{{ $news->news_description }}</p></li>
								@endforeach
							</ul>
						</div>
	                </div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="single-news card">
						{{-- <img class="card-top-img" src="{{ asset('public/theme_assets/img/news/n1.jpg') }}" alt="Card image cap"> --}}
						<div class="card-body">
							<h4 class="card-title">
								<a href="#">
									Our Introduction
								</a>
							</h4>
							<p class="card-text">{{ $images[0]->introduction }}</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-news card">
						{{-- <img class="card-top-img" src="{{ asset('public/theme_assets/img/news/n2.jpg') }}" alt="Card image cap"> --}}
						<div class="card-body">
							<h4 class="card-title">
								<a href="#">
									Our Mission
								</a>
							</h4>
							<p class="card-text">{{ $images[0]->mission }}</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-news card">
						{{-- <img class="card-top-img" src="{{ asset('public/theme_assets/img/news/n3.jpg') }}" alt="Card image cap"> --}}
						<div class="card-body">
							<h4 class="card-title">
								<a href="#">
									Our Vision
								</a>
							</h4>
							<p class="card-text">{{ $images[0]->vision }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--######## End Latest News Area ########-->

	<!--######## Start Our Offer Area ########-->
	{{-- <section class="our-offer-area section-gap"> --}}
		{{-- <div class="container"> --}}
			{{-- <div class="row align-items-center">
				<div class="col-lg-12">
					<div class="row">
						<div class="col-lg-3 col-md-3 mb-30">
							<div class="single-circle">
								<div class="single-item">
									<div class="progressBar progressBar--animateText" data-progress="75">
										<svg class="progressBar-contentCircle" viewBox="0 0 200 200">
											<circle transform="rotate(-90, 100, 100)" class="progressBar-background" cx="100" cy="100" r="95" />
											<circle transform="rotate(-90, 100, 100)" class="progressBar-circle" cx="100" cy="100" r="95" />
										</svg>
										<span class="progressBar-percentage progressBar-percentage-count">1.5K</span>
									</div>
								</div>
								<h4>Happy Clients</h4>
							</div>
						</div>

						<div class="col-lg-3 col-md-3 mb-30">
							<div class="single-circle">
								<div class="single-item">
									<div class="progressBar progressBar--animateText" data-progress="75">
										<svg class="progressBar-contentCircle" viewBox="0 0 200 200">
											<circle transform="rotate(-90, 100, 100)" class="progressBar-background" cx="100" cy="100" r="95" />
											<circle transform="rotate(-90, 100, 100)" class="progressBar-circle" cx="100" cy="100" r="95" />
										</svg>
										<span class="progressBar-percentage progressBar-percentage-count">10</span>
									</div>
								</div>
								<h4>Years of Experience</h4>
							</div>
						</div>

						<div class="col-lg-3 col-md-3 mb-30">
							<div class="single-circle">
								<div class="single-item">
									<div class="progressBar progressBar--animateText" data-progress="75">
										<svg class="progressBar-contentCircle" viewBox="0 0 200 200">
											<circle transform="rotate(-90, 100, 100)" class="progressBar-background" cx="100" cy="100" r="95" />
											<circle transform="rotate(-90, 100, 100)" class="progressBar-circle" cx="100" cy="100" r="95" />
										</svg>
										<span class="progressBar-percentage progressBar-percentage-count">250</span>
									</div>
								</div>
								<h4>Professionals</h4>
							</div>
						</div>

						<div class="col-lg-3 col-md-3 mb-30">
							<div class="single-circle">
								<div class="single-item">
									<div class="progressBar progressBar--animateText" data-progress="75">
										<svg class="progressBar-contentCircle" viewBox="0 0 200 200">
											<circle transform="rotate(-90, 100, 100)" class="progressBar-background" cx="100" cy="100" r="95" />
											<circle transform="rotate(-90, 100, 100)" class="progressBar-circle" cx="100" cy="100" r="95" />
										</svg>
										<span class="progressBar-percentage progressBar-percentage-count">369</span>
									</div>
								</div>
								<h4>On Going Job</h4>
							</div>
						</div>
					</div>
				</div> --}}

				{{-- <div class="offset-lg-1 col-lg-5">
					<div class="row justify-content-center">
						<div class="col-lg-12">
							<div class="main-title text-left">
								<h1>We can be your digital Problems Solution Partner</h1>
								<p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially
									in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.
								</p>
								<a href="#" class="primary-btn offer-btn mr-10">What we Offer</a>
								<a href="#" class="primary-btn quote-btn">Get a free Quote</a>
							</div>
						</div>
					</div>
				</div> --}}
			{{-- </div> --}}
		{{-- </div> --}}
	{{-- </section> --}}
	<!--######## End Our Offer Area ########-->

	<!--######## Start Recent Completed Project Area ########-->
	{{-- <section class="recent-completed-project section-gap">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="main-title text-center">
						<h1>Our Recent Completed Projects</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
							aliqua.
						</p>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="filters project-filter">
						<ul>
							<li class="active" data-filter=".all">All Categories</li>
							<li data-filter=".brand">Branding</li>
							<li data-filter=".img-man">Image Manipulation</li>
							<li data-filter=".creative">Creative Work</li>
							<li data-filter=".web">Web Design</li>
							<li data-filter=".print-mat">Print Material</li>
						</ul>
					</div>
					<div class="projects_inner row" id="lightgallery">
						<div class="col-lg-4 col-sm-6 web all" data-src="{{ asset('public/theme_assets/img/project/p1.jpg') }}">
							<div class="projects_item">
								<img class="img-fluid w-100" src="{{ asset('public/theme_assets/img/project/p1.jpg') }}" alt="">
								<div class="icon">
									<img class="img-fluid" src="{{ asset('public/theme_assets/img/icon.png') }}" alt="">
								</div>
							</div>
							<div class="projects_text">
								<h4>
									<a href="/portfolio-details">3D Helmet Design</a>
								</h4>
								<p>Client Project</p>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6 brand all creative" data-src="{{ asset('public/theme_assets/img/project/p2.jpg') }}">
							<div class="projects_item">
								<img class="img-fluid w-100" src="{{ asset('public/theme_assets/img/project/p2.jpg') }}" alt="">
								<div class="icon">
									<img class="img-fluid" src="{{ asset('public/theme_assets/img/icon.png') }}" alt="">
								</div>
							</div>
							<div class="projects_text">
								<h4>
									<a href="/portfolio-details">2D Vinyl Design</a>
								</h4>
								<p>Client Project</p>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6 all" data-src="{{ asset('public/theme_assets/img/project/p3.jpg') }}">
							<div class="projects_item">
								<img class="img-fluid w-100" src="{{ asset('public/theme_assets/img/project/p3.jpg') }}" alt="">
								<div class="icon">
									<img class="img-fluid" src="{{ asset('public/theme_assets/img/icon.png') }}" alt="">
								</div>
							</div>
							<div class="projects_text">
								<h4>
									<a href="/portfolio-details">Creative Poster Design</a>
								</h4>
								<p>Client Project</p>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6 all print-mat" data-src="{{ asset('public/theme_assets/img/project/p4.jpg') }}">
							<div class="projects_item">
								<img class="img-fluid w-100" src="{{ asset('public/theme_assets/img/project/p4.jpg') }}" alt="">
								<div class="icon">
									<img class="img-fluid" src="{{ asset('public/theme_assets/img/icon.png') }}" alt="">
								</div>
							</div>
							<div class="projects_text">
								<h4>
									<a href="/portfolio-details">Embosed Logo Design</a>
								</h4>
								<p>Client Project</p>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6 brand img-man all" data-src="{{ asset('public/theme_assets/img/project/p5.jpg') }}">
							<div class="projects_item">
								<img class="img-fluid w-100" src="{{ asset('public/theme_assets/img/project/p5.jpg') }}" alt="">
								<div class="icon">
									<img class="img-fluid" src="{{ asset('public/theme_assets/img/icon.png') }}" alt="">
								</div>
							</div>
							<div class="projects_text">
								<h4>
									<a href="/portfolio-details">3D Disposable Bottle</a>
								</h4>
								<p>Client Project</p>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6 brand work img-man all" data-src="{{ asset('public/theme_assets/img/project/p6.jpg') }}">
							<div class="projects_item">
								<img class="img-fluid w-100" src="{{ asset('public/theme_assets/img/project/p6.jpg') }}" alt="">
								<div class="icon">
									<img class="img-fluid" src="{{ asset('public/theme_assets/img/icon.png') }}" alt="">
								</div>
							</div>
							<div class="projects_text">
								<h4>
									<a href="/portfolio-details">3D Logo Design</a>
								</h4>
								<p>Client Project</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> --}}
	<!--######## End Recent Completed Project Area ########-->

	<!--######## Start testimonial Area ########-->
	{{-- <section class="testimonial-area section-gap">
		<div class="container">
			<div class="row">
				<div class="active-testimonial-carusel">
					<div class="single-testimonial item d-flex flex-row">
						<div class="thumb">
							<img class="img-fluid" src="{{ asset('public/theme_assets/img/elements/user1.png') }}" alt="">
						</div>
						<div class="desc">
							<p>
								“If you don’t like change, you’re going to like irrelevance even less.”
							</p>
							<h4 mt-30>Eric Shinseki</h4>
							<p class="mb-0">Former United States Secretary of Veterans Affairs</p>
						</div>
					</div>
					<div class="single-testimonial item d-flex flex-row">
						<div class="thumb">
							<img class="img-fluid" src="{{ asset('public/theme_assets/img/elements/user2.png') }}" alt="">
						</div>
						<div class="desc">
							<p>
								“In the business world, the rear view mirror is always clearer than the windshield.”
							</p>
							<h4 mt-30>Warren Buffett</h4>
							<p class="mb-0">CEO of Berkshire Hathaway</p>
						</div>
					</div>
					<div class="single-testimonial item d-flex flex-row">
						<div class="thumb">
							<img class="img-fluid" src="{{ asset('public/theme_assets/img/elements/user1.png') }}" alt="">
						</div>
						<div class="desc">
							<p>
								Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector,
								hardware.
							</p>
							<h4 mt-30>Mark Alviro Wiens</h4>
							<p class="mb-0">CEO at Google</p>
						</div>
					</div>
					<div class="single-testimonial item d-flex flex-row">
						<div class="thumb">
							<img class="img-fluid" src="{{ asset('public/theme_assets/img/elements/user2.png') }}" alt="">
						</div>
						<div class="desc">
							<p>
								Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector,
								hardware.
							</p>
							<h4 mt-30>Lina Harrington</h4>
							<p class="mb-0">CEO at Google</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> --}}
	<!--######## End testimonial Area ########-->

	<!--######## Start Latest Blog Area ########-->
	{{-- <section class="latest-blog-area section-gap">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="main-title text-center">
						<h1>Latest From Our Blog</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
							aliqua.
						</p>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-3 col-md-6 single-blog">
					<div class="thumb">
						<img class="img-fluid w-100" src="{{ asset('public/theme_assets/img/b1.jpg') }}" alt="">
					</div>
					<p class="date">10 Jan 2018</p>
					<h4>
						<a href="#">Cooking Perfect Fried Rice in minutes</a>
					</h4>
					<p>
						inappropriate behavior ipsum dolor sit amet, consectetur.
					</p>
					<div class="meta-bottom d-flex justify-content-between">
						<p><span class="lnr lnr-heart"></span> 15 Likes</p>
						<p><span class="lnr lnr-bubble"></span> 02 Comments</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 single-blog">
					<div class="thumb">
						<img class="img-fluid w-100" src="{{ asset('public/theme_assets/img/b2.jpg') }}" alt="">
					</div>
					<p class="date">10 Jan 2018</p>
					<h4>
						<a href="#">Secret of making Heart Shaped eggs</a>
					</h4>
					<p>
						inappropriate behavior ipsum dolor sit amet, consectetur.
					</p>
					<div class="meta-bottom d-flex justify-content-between">
						<p><span class="lnr lnr-heart"></span> 15 Likes</p>
						<p><span class="lnr lnr-bubble"></span> 02 Comments</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 single-blog">
					<div class="thumb">
						<img class="img-fluid w-100" src="{{ asset('public/theme_assets/img/b3.jpg') }}" alt="">
					</div>
					<p class="date">10 Jan 2018</p>
					<h4>
						<a href="#">How to check steak if it is tender or not</a>
					</h4>
					<p>
						inappropriate behavior ipsum dolor sit amet, consectetur.
					</p>
					<div class="meta-bottom d-flex justify-content-between">
						<p><span class="lnr lnr-heart"></span> 15 Likes</p>
						<p><span class="lnr lnr-bubble"></span> 02 Comments</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 single-blog">
					<div class="thumb">
						<img class="img-fluid w-100" src="{{ asset('public/theme_assets/img/b4.jpg') }}" alt="">
					</div>
					<p class="date">10 Jan 2018</p>
					<h4>
						<a href="#">Addiction When Gambling Becomes A Problem</a>
					</h4>
					<p>
						inappropriate behavior ipsum dolor sit amet, consectetur.
					</p>
					<div class="meta-bottom d-flex justify-content-between">
						<p><span class="lnr lnr-heart"></span> 15 Likes</p>
						<p><span class="lnr lnr-bubble"></span> 02 Comments</p>
					</div>
				</div>
			</div>
		</div>
	</section> --}}
	<!--######## End Latest Blog Area ########-->
@endsection
{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script> --}}