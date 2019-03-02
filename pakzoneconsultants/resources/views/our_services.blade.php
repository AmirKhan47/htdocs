@extends('layout')
@section('title', 'Our Services')
@section('content')

	<!--######## start banner Area ########-->
	<section style="background-image: url( {{ asset('office-1209640_1920.jpg') }} ); background-size: cover;
    position: relative;">
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white text-uppercase">
						Our Services
					</h1>
					<p class="text-white link-nav"><a href="/">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="/our_services">
							Our Services</a></p>
				</div>
			</div>
		</div>
	</section>
	<!--######## End banner Area ########-->

	<!--######## Start Recent Completed Project Area ########-->
	<section class="recent-completed-project section-gap">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="main-title text-center">
						<h1>Our Services</h1>
						<p class="text-justify">Pakzone Inc., located in Louisville, Kentucky, has been supporting business owners through sales, mergers and acquisitions for over 40 years. We represent buyers and sellers primarily located within the Midwest and Southeast United States including Kentucky, Indiana, Ohio and Tennessee, although we have also led successful sales in the Southwest and West Coast regions of the United States.
						</p>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">

					<div class="row">
					  <div class="col-sm-6">
					    <div class="card border-primary mb-3">
					      <div class="card-body">
					        <h5 class="card-title h3">Industrial Services</h5>
					    	<ul class="list-group list-group-flush">
							    <li class="list-group-item">Registration and corporate services</li>
							    <li class="list-group-item">Preparation of feasibility</li>
								<li class="list-group-item">Appropriate technology selection and dissemination</li>
								<li class="list-group-item">Machinery and equipment selection and procurement</li>
								<li class="list-group-item">Installation and erection work</li>
								<li class="list-group-item">Staff personal selection and training</li>
								<li class="list-group-item">Asistance in managerial systems improvement</li>
								<li class="list-group-item">Build up of client expertise</li>
								<li class="list-group-item">Entrepreneurship Development Programmes</li>
							</ul>
					      </div>
					    </div>
					  </div>
					  <div class="col-sm-6">
					    <div class="card border-primary mb-3">
					      <div class="card-body">
					        <h5 class="card-title h3">Research</h5>
						        <p class="card-text">The Pakzone Consultants manned with more than 50 professional, most of them being foreign qualified and experienced experts. They come from such diverse disciplines as, Management, Finance, Marketing, Economics, statistics, Agriculture, Industrial, Civil, Mechanical, electrical, Chemical Engineering, Operation Research, etc They are capable of handling independent studies, working for joint ventures and producing turn-key projects.
						        <br>
						        After Conceptualization of project in its all perspective, marketing analysis is undertaken which determines status of the industry, reviews supply/demand situation, project future demand/availability gaps, assesses raw material availability, examin price pattern and finally suggests pragmatic marketing mechanism highlighting role of different distribution channels.
						    	</p>
						    	<ul class="list-group list-group-flush">
								    <li class="list-group-item">Technical Evaluation</li>
								    <li class="list-group-item">Financial Appraisal</li>
								    <li class="list-group-item">Management Aspects</li>
								    <li class="list-group-item">Transfer of technology</li>
								</ul>
					      </div>
					    </div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-sm-6">
					    <div class="card border-primary mb-3">
					      <div class="card-body">
					        <h5 class="card-title h3">CNG Technology</h5>
					        <p class="card-text">Pakzone Consultants laboratries are located throughout the KPK & Pumjab providing CNG services for a broad range of clients, markets and industries. Pakzone Consultants offers laboratory techniques, laboratory instrumentation and testing methods, providing the analysis information clients need for trouble-shooting, research, quality control and many other requirements and applications. Pakzone Consultants engineers and techniques provide the crucial laboratory sopport you need to help run your bussiness and meet product research, development, and quality goals.</p>
					        <ul class="list-group list-group-flush">
							    <li class="list-group-item">Instrument Calibration</li>
							    <li class="list-group-item">Field Services</li>
							    <li class="list-group-item">Instrument, Parts & Repairs</li>
							</ul>
					      </div>
					    </div>
					  </div>
					  <div class="col-sm-6">
					    <div class="card border-primary mb-3">
					      <div class="card-body">
					        <h5 class="card-title h3">Banking And Finance</h5>
					        <ul class="list-group list-group-flush">
								<li class="list-group-item">Preparation of loan documents</li>
								<li class="list-group-item">facilicites of formalities and arrangements for obtaining and finances.</li>
							</ul>
					      </div>
					    </div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-sm-6">
					    <div class="card border-primary mb-3">
					      <div class="card-body">
					        <h5 class="card-title h3">Taxation</h5>
					        <p class="card-text">One-stop facilitation of all taxation and excise requirements</p>
					      </div>
					    </div>
					  </div>
					  <div class="col-sm-6">
					    <div class="card border-primary mb-3">
					      <div class="card-body">
					        <h5 class="card-title h3">Information Technology</h5>
					        <ul class="list-group list-group-flush">
								<li class="list-group-item">Web Development</li>
								<li class="list-group-item">Web Designing</li>
								<li class="list-group-item">Web Publishing</li>
								<li class="list-group-item">Web Hosting & Domain Registration</li>
								<li class="list-group-item">Software Development</li>
							</ul>
					      </div>
					    </div>
					  </div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!--######## End Recent Completed Project Area ########-->
@endsection