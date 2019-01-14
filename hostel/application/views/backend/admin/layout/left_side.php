<?php
	$CI =& get_instance();
	$CI->load->model('backend/admin/user_model','user',true);
	$CI->load->model('backend/admin/hostel_model','hostel',true);
	$CI->load->model('backend/admin/customer_model','customer',true);
?>
<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
	<i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
	<!-- BEGIN: Aside Menu -->
	<?php if($this->session->userdata('role_id')==1) { ?>
		<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
			<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
				<li class="m-menu__item <?php if($active=='dashboard') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
					<a  href="<?php echo AURL; ?>dashboard" class="m-menu__link ">
						<i class="m-menu__link-icon flaticon-line-graph"></i>
						<span class="m-menu__link-title">
							<span class="m-menu__link-wrap">
								<span class="m-menu__link-text">
									Dashboard
								</span>
							</span>
						</span>
					</a>
				</li>
				<li class="m-menu__section ">
					<h4 class="m-menu__section-text">
						Users
					</h4>
					<i class="m-menu__section-icon flaticon-more-v3"></i>
				</li>
				<li class="m-menu__item  m-menu__item--submenu <?php if($active=='add_user' OR $active=='list_of_admin' OR $active=='list_of_so') { ?> m-menu__item--open m-menu__item--expanded <?php } ?> " aria-haspopup="true"  m-menu-submenu-toggle="hover">
					<a  href="javascript:;" class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon flaticon-layers"></i>
						<span class="m-menu__link-text">
							Manage Users
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu ">
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
								<span class="m-menu__link">
									<span class="m-menu__link-text">
										Manage Users
									</span>
								</span>
							</li>
							<li class="m-menu__item <?php if($active=='add_user') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
								<a  href="<?php echo AURL; ?>user/" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										Add User
									</span>
								</a>
							</li>
							<li class="m-menu__item <?php if($active=='list_of_admin') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
								<a  href="<?php echo AURL; ?>user/list_of_admin" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										List of Admin
									</span>
									<span class="m-menu__link-badge">
										<span class="m-badge m-badge--danger">
											<?php
												$list_of_admin=$CI->user->list_of_admin_count();
												echo $list_of_admin;
											?>
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__item <?php if($active=='list_of_so') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
								<a  href="<?php echo AURL; ?>user/list_of_so" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										List of Sales Operator
									</span>
									<span class="m-menu__link-badge">
										<span class="m-badge m-badge--success">
											<?php
												$list_of_so=$CI->user->list_of_so_count();
												echo $list_of_so;
											?>
										</span>
									</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="m-menu__section ">
					<h4 class="m-menu__section-text">
						Hostels
					</h4>
					<i class="m-menu__section-icon flaticon-more-v3"></i>
				</li>
				<li class="m-menu__item  m-menu__item--submenu <?php if($active=='location_settings' OR $active=='list_of_locations') { ?> m-menu__item--open m-menu__item--expanded <?php } ?> " aria-haspopup="true"  m-menu-submenu-toggle="hover">
					<a  href="javascript:;" class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon flaticon-share"></i>
						<span class="m-menu__link-text">
							Hostels Settings
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu ">
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
								<span class="m-menu__link">
									<span class="m-menu__link-text">
										Hostels Settings
									</span>
								</span>
							</li>
							<li class="m-menu__item <?php if($active=='location_settings') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
								<a  href="<?php echo AURL; ?>location/" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										Location Settings
									</span>
								</a>
							</li>
							<li class="m-menu__item <?php if($active=='list_of_locations') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
								<a  href="<?php echo AURL; ?>location/list_of_locations" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										List of Locations
									</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="m-menu__item  m-menu__item--submenu <?php if($active=='add_hostel' OR $active=='new_hostels' OR $active=='approved_hostels' OR $active=='payment_pending' OR $active=='all_hostels') { ?> m-menu__item--open m-menu__item--expanded <?php } ?> " aria-haspopup="true"  m-menu-submenu-toggle="hover">
					<a  href="javascript:;" class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon flaticon-multimedia-1"></i>
						<span class="m-menu__link-text">
							Manage Hostels
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu ">
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
								<span class="m-menu__link">
									<span class="m-menu__link-text">
										Manage Hostels
									</span>
								</span>
							</li>
							<li class="m-menu__item <?php if($active=='add_hostel') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
								<a  href="<?php echo AURL; ?>hostel" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										Add Hostel
									</span>
								</a>
							</li>
							<li class="m-menu__item <?php if($active=='new_hostels') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
								<a  href="<?php echo AURL; ?>hostel/new_hostels" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										New Hostels
									</span>
									<span class="m-menu__link-badge">
										<span class="m-badge m-badge--info">
											<?php
												$new_hostels=$CI->hostel->new_hostels_count();
												echo $new_hostels;
											?>
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__item <?php if($active=='approved_hostels') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
								<a  href="<?php echo AURL; ?>hostel/approved_hostels" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										Approved Hostels
									</span>
									<span class="m-menu__link-badge">
										<span class="m-badge m-badge--primary">
											<?php
												$approved_hostels=$CI->hostel->approved_hostels_count();
												echo $approved_hostels;
											?>
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__item <?php if($active=='payment_pending') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
								<a  href="<?php echo AURL; ?>hostel/payment_pending" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										Payment Pending
									</span>
									<span class="m-menu__link-badge">
										<span class="m-badge m-badge--secondary">
											<?php
												$payment_pending=$CI->hostel->payment_pending_count();
												echo $payment_pending;
											?>
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__item <?php if($active=='all_hostels') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
								<a  href="<?php echo AURL; ?>hostel/all_hostels" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										All Hostels
									</span>
									<span class="m-menu__link-badge">
										<span class="m-badge m-badge--warning">
											<?php
												$all_hostels=$CI->hostel->all_hostels_count();
												echo $all_hostels;
											?>
										</span>
									</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="m-menu__section ">
					<h4 class="m-menu__section-text">
						Customers
					</h4>
					<i class="m-menu__section-icon flaticon-more-v3"></i>
				</li>
				<li class="m-menu__item  m-menu__item--submenu <?php if($active=='add_customer' OR $active=='new_customers' OR $active=='all_customers') { ?> m-menu__item--open m-menu__item--expanded <?php } ?> " aria-haspopup="true"  m-menu-submenu-toggle="hover">
					<a  href="javascript:;" class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon flaticon-interface-1"></i>
						<span class="m-menu__link-text">
							Manage Customers
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu ">
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
								<span class="m-menu__link">
									<span class="m-menu__link-text">
										Manage Customers
									</span>
								</span>
							</li>
							<!-- <li class="m-menu__item <?php if($active=='add_customer') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
								<a  href="<?php echo AURL; ?>customer" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										Add Customer
									</span>
								</a>
							</li> -->
							<li class="m-menu__item <?php if($active=='new_customers') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
								<a  href="<?php echo AURL; ?>customer/new_customers" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										All Customers
									</span>
									<span class="m-menu__link-badge">
										<span class="m-badge m-badge--danger">
											<?php
												$new_customers=$CI->customer->new_customers_count();
												echo $new_customers;
											?>
										</span>
									</span>
								</a>
							</li>
							<!-- <li class="m-menu__item <?php if($active=='all_customers') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
								<a  href="<?php echo AURL; ?>customer/all_customers" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										All Customers
									</span>
									<span class="m-menu__link-badge">
										<span class="m-badge m-badge--danger">
											<?php
												$all_customers=$CI->customer->all_customers_count();
												echo $all_customers;
											?>
										</span>
									</span>
								</a>
							</li> -->
						</ul>
					</div>
				</li>
			</ul>
		</div>
	<?php } ?>
	<?php if($this->session->userdata('role_id')==2) { ?>
		<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
			<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
				<li class="m-menu__item <?php if($active=='dashboard') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
					<a  href="<?php echo AURL; ?>user/dashboard" class="m-menu__link ">
						<i class="m-menu__link-icon flaticon-line-graph"></i>
						<span class="m-menu__link-title">
							<span class="m-menu__link-wrap">
								<span class="m-menu__link-text">
									Dashboard
								</span>
							</span>
						</span>
					</a>
				</li>
				<!-- <li class="m-menu__section ">
					<h4 class="m-menu__section-text">
						Users
					</h4>
					<i class="m-menu__section-icon flaticon-more-v3"></i>
				</li>
				<li class="m-menu__item  m-menu__item--submenu <?php if($active=='add_user' OR $active=='list_of_admin' OR $active=='list_of_so') { ?> m-menu__item--open m-menu__item--expanded <?php } ?> " aria-haspopup="true"  m-menu-submenu-toggle="hover">
					<a  href="javascript:;" class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon flaticon-layers"></i>
						<span class="m-menu__link-text">
							Manage Users
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu ">
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
								<span class="m-menu__link">
									<span class="m-menu__link-text">
										Manage Users
									</span>
								</span>
							</li>
							<li class="m-menu__item <?php if($active=='add_user') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
								<a  href="<?php echo AURL; ?>user/" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										Add User
									</span>
								</a>
							</li>
							<li class="m-menu__item <?php if($active=='list_of_admin') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
								<a  href="<?php echo AURL; ?>user/list_of_admin" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										List of Admin
									</span>
									<span class="m-menu__link-badge">
										<span class="m-badge m-badge--danger">
											2
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__item <?php if($active=='list_of_so') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
								<a  href="<?php echo AURL; ?>user/list_of_so" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										List of Sales Operator
									</span>
									<span class="m-menu__link-badge">
										<span class="m-badge m-badge--danger">
											2
										</span>
									</span>
								</a>
							</li>
						</ul>
					</div>
				</li> -->
				<li class="m-menu__section ">
					<h4 class="m-menu__section-text">
						Hostels
					</h4>
					<i class="m-menu__section-icon flaticon-more-v3"></i>
				</li>
				<!-- <li class="m-menu__item  m-menu__item--submenu <?php if($active=='location_settings' OR $active=='list_of_locations') { ?> m-menu__item--open m-menu__item--expanded <?php } ?> " aria-haspopup="true"  m-menu-submenu-toggle="hover">
					<a  href="javascript:;" class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon flaticon-share"></i>
						<span class="m-menu__link-text">
							Hostels Settings
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu ">
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
								<span class="m-menu__link">
									<span class="m-menu__link-text">
										Hostels Settings
									</span>
								</span>
							</li>
							<li class="m-menu__item <?php if($active=='location_settings') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
								<a  href="<?php echo AURL; ?>location/" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										Location Settings
									</span>
								</a>
							</li>
							<li class="m-menu__item <?php if($active=='list_of_locations') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
								<a  href="<?php echo AURL; ?>location/list_of_locations" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										List of Locations
									</span>
								</a>
							</li>
						</ul>
					</div>
				</li> -->
				<li class="m-menu__item  m-menu__item--submenu <?php if($active=='add_hostel' OR $active=='new_hostels' OR $active=='approved_hostels' OR $active=='payment_pending' OR $active=='all_hostels') { ?> m-menu__item--open m-menu__item--expanded <?php } ?> " aria-haspopup="true"  m-menu-submenu-toggle="hover">
					<a  href="javascript:;" class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon flaticon-multimedia-1"></i>
						<span class="m-menu__link-text">
							Manage Hostels
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu ">
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
								<span class="m-menu__link">
									<span class="m-menu__link-text">
										Manage Hostels
									</span>
								</span>
							</li>
							<li class="m-menu__item <?php if($active=='add_hostel') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
								<a  href="<?php echo AURL; ?>hostel" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										Add Hostel
									</span>
								</a>
							</li>
							<li class="m-menu__item <?php if($active=='new_hostels') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
								<a  href="<?php echo AURL; ?>hostel/new_hostels" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										New Hostels
									</span>
									<span class="m-menu__link-badge">
										<span class="m-badge m-badge--info">
											<?php
												$new_hostels=$CI->hostel->new_hostels_count();
												echo $new_hostels;
											?>
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__item <?php if($active=='approved_hostels') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
								<a  href="<?php echo AURL; ?>hostel/approved_hostels" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										Approved Hostels
									</span>
									<span class="m-menu__link-badge">
										<span class="m-badge m-badge--primary">
											<?php
												$approved_hostels=$CI->hostel->approved_hostels_count();
												echo $approved_hostels;
											?>
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__item <?php if($active=='payment_pending') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
								<a  href="<?php echo AURL; ?>hostel/payment_pending" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										Payment Pending
									</span>
									<span class="m-menu__link-badge">
										<span class="m-badge m-badge--secondary">
											<?php
												$payment_pending=$CI->hostel->payment_pending_count();
												echo $payment_pending;
											?>
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__item <?php if($active=='all_hostels') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
								<a  href="<?php echo AURL; ?>hostel/all_hostels" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										All Hostels
									</span>
									<span class="m-menu__link-badge">
										<span class="m-badge m-badge--warning">
											<?php
												$all_hostels=$CI->hostel->all_hostels_count();
												echo $all_hostels;
											?>
										</span>
									</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="m-menu__section ">
					<h4 class="m-menu__section-text">
						Customers
					</h4>
					<i class="m-menu__section-icon flaticon-more-v3"></i>
				</li>
				<li class="m-menu__item  m-menu__item--submenu <?php if($active=='add_customer' OR $active=='new_customers' OR $active=='all_customers') { ?> m-menu__item--open m-menu__item--expanded <?php } ?> " aria-haspopup="true"  m-menu-submenu-toggle="hover">
					<a  href="javascript:;" class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon flaticon-interface-1"></i>
						<span class="m-menu__link-text">
							Manage Customers
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu ">
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
								<span class="m-menu__link">
									<span class="m-menu__link-text">
										Manage Customers
									</span>
								</span>
							</li>
							<!-- <li class="m-menu__item <?php if($active=='add_customer') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
								<a  href="<?php echo AURL; ?>customer" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										Add Customer
									</span>
								</a>
							</li> -->
							<li class="m-menu__item <?php if($active=='new_customers') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
								<a  href="<?php echo AURL; ?>customer/new_customers" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										All Customers
									</span>
									<span class="m-menu__link-badge">
										<span class="m-badge m-badge--danger">
											<?php
												$new_customers=$CI->customer->new_customers_count();
												echo $new_customers;
											?>
										</span>
									</span>
								</a>
							</li>
							<!-- <li class="m-menu__item <?php if($active=='all_customers') { ?> m-menu__item--active <?php } ?> " aria-haspopup="true" >
								<a  href="<?php echo AURL; ?>customer/all_customers" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
									</i>
									<span class="m-menu__link-text">
										All Customers
									</span>
									<span class="m-menu__link-badge">
										<span class="m-badge m-badge--danger">
											<?php
												$all_customers=$CI->customer->all_customers_count();
												echo $all_customers;
											?>
										</span>
									</span>
								</a>
							</li> -->
						</ul>
					</div>
				</li>
			</ul>
		</div>
	<?php } ?>
	<!-- END: Aside Menu -->
</div>
<!-- END: Left Aside -->