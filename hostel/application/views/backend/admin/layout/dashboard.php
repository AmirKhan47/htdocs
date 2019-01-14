<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title ">
					Dashboard
				</h3>
			</div>
			<!-- <div>
				<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
					<span class="m-subheader__daterange-label">
						<span class="m-subheader__daterange-title"></span>
						<span class="m-subheader__daterange-date m--font-brand"></span>
					</span>
					<a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
						<i class="la la-angle-down"></i>
					</a>
				</span>
			</div> -->
		</div>
	</div>
	<!-- END: Subheader -->
	<div class="jumbotron bg-info display-1 text-center"><!-- Comming Soon! --></div>
	<div class="col-xl-12">
		<!--begin:: Widgets/Activity-->
		<!-- <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force"> -->
			<!-- <div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text m--font-light">
							Activity
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
							<a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl">
								<i class="fa fa-genderless m--font-light"></i>
							</a>
							<div class="m-dropdown__wrapper">
								<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
								<div class="m-dropdown__inner">
									<div class="m-dropdown__body">
										<div class="m-dropdown__content">
											<ul class="m-nav">
												<li class="m-nav__section m-nav__section--first">
													<span class="m-nav__section-text">
														Quick Actions
													</span>
												</li>
												<li class="m-nav__item">
													<a href="" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-share"></i>
														<span class="m-nav__link-text">
															Activity
														</span>
													</a>
												</li>
												<li class="m-nav__item">
													<a href="" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-chat-1"></i>
														<span class="m-nav__link-text">
															Messages
														</span>
													</a>
												</li>
												<li class="m-nav__item">
													<a href="" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-info"></i>
														<span class="m-nav__link-text">
															FAQ
														</span>
													</a>
												</li>
												<li class="m-nav__item">
													<a href="" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-lifebuoy"></i>
														<span class="m-nav__link-text">
															Support
														</span>
													</a>
												</li>
												<li class="m-nav__separator m-nav__separator--fit"></li>
												<li class="m-nav__item">
													<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
														Cancel
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div> -->
			<div class="m-portlet__body">
				<div class="m-widget17">
					<!-- <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-danger">
						<div class="m-widget17__chart" style="height:320px;"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
							<canvas id="m_chart_activities" width="349" height="216" class="chartjs-render-monitor" style="display: block; width: 349px; height: 216px;"></canvas>
						</div>
					</div> -->
					<div class="m-widget17__stats">
						<div class="m-widget17__items m-widget17__items-col1">
							<div class="m-widget17__item">
								<span class="m-widget17__icon">
									<i class="flaticon-visible m--font-info"></i>
								</span>
								<span class="m-widget17__subtitle">
									Total No of Users
								</span>
								<span class="m-widget17__desc">
									<?php
										$count=$this->common->get_all_records_nums('users','*');
										echo($count);
									?>
								</span>
							</div>
							<div class="m-widget17__item">
								<span class="m-widget17__icon">
									<i class="fa fa-home m--font-info"></i>
								</span>
								<span class="m-widget17__subtitle">
									Total No of Hostels
								</span>
								<span class="m-widget17__desc">
									<?php
										$count=$this->common->get_all_records_nums('hostels','*');
										echo($count);
									?>
								</span>
							</div>
						</div>
						<div class="m-widget17__items m-widget17__items-col2">
							<div class="m-widget17__item">
								<span class="m-widget17__icon">
									<i class="flaticon-users m--font-info"></i>
								</span>
								<span class="m-widget17__subtitle">
									Total No of Customers
								</span>
								<span class="m-widget17__desc">
									<?php
										// $status_id=$this->common->get_one_column('',);
										$count=$this->common->get_all_records_nums('customers','*');
										echo($count);
									?>
								</span>
							</div>
							<div class="m-widget17__item">
								<span class="m-widget17__icon">
									<i class="fa fa-dollar-sign m--font-info"></i>
								</span>
								<span class="m-widget17__subtitle">
									---
								</span>
								<span class="m-widget17__desc">
									---
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end:: Widgets/Activity-->
	<!-- </div> -->
</div>