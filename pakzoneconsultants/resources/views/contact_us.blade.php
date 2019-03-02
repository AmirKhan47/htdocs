@extends('layout')
@section('title', 'Contact Us')
@section('content')

	<!--######## start banner Area ########-->
	<section style="background-image: url( {{ asset('office-1209640_1920.jpg') }} ); background-size: cover;
    position: relative;">
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white text-uppercase">
						Contact Us
					</h1>
					<p class="text-white link-nav"><a href="/">Home </a>
						<span class="lnr lnr-arrow-right"></span> <a href="/contact_us">
							Contact Us</a></p>
				</div>
			</div>
		</div>
	</section>
	<!--######## End banner Area ########-->

	<!--######## Start contact-page Area ########-->
	<section class="contact-page-area section-gap">
		<div class="container">
			<div class="row contact-wrap">
				<h3>Peshawar Office</h3>
				<div class="map-wrap" style="width: 100%">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d423413.10084571305!2d71.58883532186223!3d33.99472082774547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38d93d7449a56637%3A0xac5f7c36820e708f!2sMalik+Nadeem+Plaza!5e0!3m2!1sen!2s!4v1549441170310" style="width: 100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
				<div class="col-lg-3 d-flex flex-column address-wrap">
					<div class="single-contact-address d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-home"></span>
						</div>
						<div class="contact-details">
							<h5>Peshawar, Pakistan</h5>
							<p>
								A-1/1, Malik nadeem Plaza, Yousafabad Pull, Dalazak Road, Peshawar
								<br>Cell: 0311-1861562, 0300-9003757
							</p>
						</div>
					</div>
					<div class="single-contact-address d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-home"></span>
						</div>
						<div class="contact-details">
							<h5>Islamabad, Pakistan</h5>
							<p>
								473-A Street NO. 10 F-10/2, Islamabad
								<br>Cell: 0323-9103411
							</p>
						</div>
					</div>
					<div class="single-contact-address d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-phone-handset"></span>
						</div>
						<div class="contact-details">
							<h5>051-2503840</h5>
							<p>Mon to Fri 9am to 6 pm</p>
						</div>
					</div>
					<div class="single-contact-address d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-envelope"></span>
						</div>
						<div class="contact-details">
							<h5>pakzoneConsultants@yahoo.com</h5>
							<h5>mumtaz_abidi@yahoo.com</h5>
							<p>Send us your query</p>
						</div>
					</div>
				</div>
				<div class="col-lg-9">
					<form class="form-area contact-form text-right" id="myForm" action="mail.php" method="post">
						<div class="row">
							<div class="col-lg-6">
								<input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
								 class="common-input mb-20 form-control" required="" type="text">

								<input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''"
								 onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">
								<input name="subject" placeholder="Enter subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'"
								 class="common-input mb-20 form-control" required="" type="text">
							</div>
							<div class="col-lg-6">
								<textarea class="common-textarea form-control" name="message" placeholder="Enter Messege" onfocus="this.placeholder = ''"
								 onblur="this.placeholder = 'Enter Messege'" required=""></textarea>
							</div>
							<div class="col-lg-12 mt-30">
								<div class="alert-msg" style="text-align: left;"></div>
								<button class="primary-btn primary" style="float: right;">Send Message</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!--######## End contact-page Area ########-->
@endsection