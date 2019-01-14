<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title ">
					My Profile
				</h3>
			</div>
			<!-- <div> -->
				<!-- <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
					<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
						<i class="la la-plus m--hide"></i>
						<i class="la la-ellipsis-h"></i>
					</a>
					<div class="m-dropdown__wrapper">
						<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
						<div class="m-dropdown__inner">
							<div class="m-dropdown__body">
								<div class="m-dropdown__content">
									<ul class="m-nav">
										<li class="m-nav__section m-nav__section--first m--hide">
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
												Submit
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div> -->
			<!-- </div> -->
		</div>
	</div>
	<!-- END: Subheader -->
	<div class="m-content">
		<?php
            if ($this->session->flashdata('error_message')) 
            {
        ?>
                <div class="alert alert-danger alert-dismissible fade show   m-alert m-alert--square m-alert--air">
                    <button class="close" data-close="alert"></button>
                    <span><?php echo $this->session->flashdata('error_message'); ?></span>
                </div>
        <?php
            }

            if ($this->session->flashdata('ok_message')) 
            {
        ?>
                <div class="alert alert-primary alert-dismissible fade show   m-alert m-alert--square m-alert--air">
                    <button class="close" data-close="alert"></button>
                    <span><?php echo $this->session->flashdata('ok_message'); ?></span>
                </div>
        <?php
            }
        ?>
		<div class="row">
			<div class="col-xl-3 col-lg-4">
				<div class="m-portlet m-portlet--full-height  ">
					<div class="m-portlet__body">
						<div class="m-card-profile">
							<div class="m-card-profile__title m--hide">
								Your Profile
							</div>
							<div class="m-card-profile__pic">
								<div class="m-card-profile__pic-wrapper">
									<img src="<?php echo Admin_Uploads.'profile_pictures/'.$user['profile_picture']; ?>" alt="Profile Picture Missing"/>
								</div>
								<form action="<?php echo URL; ?>backend/login/update_user_picture" method="POST" enctype="multipart/form-data">
									<input type="hidden" name="old_profile_picture" value="<?php echo $user['profile_picture']; ?>">
									<input type="file" name="profile_picture" accept=".png,.jpeg,.jpg" value="" placeholder="" required="required">
									<input type="submit" class="form-control btn-primary" name="submit" value="Update">
								</form>
							</div>
							<div class="m-card-profile__details">
								<span class="m-card-profile__name">
									<?php echo $user['fullname']; ?>
								</span>
								<a href="" class="m-card-profile__email m-link">
									<?php echo $user['email']; ?>
								</a>
							</div>
						</div>
						<!-- <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
							<li class="m-nav__separator m-nav__separator--fit"></li>
							<li class="m-nav__section m--hide">
								<span class="m-nav__section-text">
									Section
								</span>
							</li>
							<li class="m-nav__item">
								<a href="../header/profile&amp;demo=default.html" class="m-nav__link">
									<i class="m-nav__link-icon flaticon-profile-1"></i>
									<span class="m-nav__link-title">
										<span class="m-nav__link-wrap">
											<span class="m-nav__link-text">
												My Profile
											</span>
											<span class="m-nav__link-badge">
												<span class="m-badge m-badge--success">
													2
												</span>
											</span>
										</span>
									</span>
								</a>
							</li>
							<li class="m-nav__item">
								<a href="../header/profile&amp;demo=default.html" class="m-nav__link">
									<i class="m-nav__link-icon flaticon-share"></i>
									<span class="m-nav__link-text">
										Activity
									</span>
								</a>
							</li>
							<li class="m-nav__item">
								<a href="../header/profile&amp;demo=default.html" class="m-nav__link">
									<i class="m-nav__link-icon flaticon-chat-1"></i>
									<span class="m-nav__link-text">
										Messages
									</span>
								</a>
							</li>
							<li class="m-nav__item">
								<a href="../header/profile&amp;demo=default.html" class="m-nav__link">
									<i class="m-nav__link-icon flaticon-graphic-2"></i>
									<span class="m-nav__link-text">
										Sales
									</span>
								</a>
							</li>
							<li class="m-nav__item">
								<a href="../header/profile&amp;demo=default.html" class="m-nav__link">
									<i class="m-nav__link-icon flaticon-time-3"></i>
									<span class="m-nav__link-text">
										Events
									</span>
								</a>
							</li>
							<li class="m-nav__item">
								<a href="../header/profile&amp;demo=default.html" class="m-nav__link">
									<i class="m-nav__link-icon flaticon-lifebuoy"></i>
									<span class="m-nav__link-text">
										Support
									</span>
								</a>
							</li>
						</ul> -->
						<div class="m-portlet__body-separator"></div>
						<!-- <div class="m-widget1 m-widget1--paddingless">
							<div class="m-widget1__item">
								<div class="row m-row--no-padding align-items-center">
									<div class="col">
										<h3 class="m-widget1__title">
											Member Profit
										</h3>
										<span class="m-widget1__desc">
											Awerage Weekly Profit
										</span>
									</div>
									<div class="col m--align-right">
										<span class="m-widget1__number m--font-brand">
											+$17,800
										</span>
									</div>
								</div>
							</div>
							<div class="m-widget1__item">
								<div class="row m-row--no-padding align-items-center">
									<div class="col">
										<h3 class="m-widget1__title">
											Orders
										</h3>
										<span class="m-widget1__desc">
											Weekly Customer Orders
										</span>
									</div>
									<div class="col m--align-right">
										<span class="m-widget1__number m--font-danger">
											+1,800
										</span>
									</div>
								</div>
							</div>
							<div class="m-widget1__item">
								<div class="row m-row--no-padding align-items-center">
									<div class="col">
										<h3 class="m-widget1__title">
											Issue Reports
										</h3>
										<span class="m-widget1__desc">
											System bugs and issues
										</span>
									</div>
									<div class="col m--align-right">
										<span class="m-widget1__number m--font-success">
											-27,49%
										</span>
									</div>
								</div>
							</div>
						</div> -->
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-lg-8">
				<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
					<div class="m-portlet__head">
						<div class="m-portlet__head-tools">
							<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
										<i class="flaticon-share m--hide"></i>
										Update Profile
									</a>
								</li>
								<!-- <li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
										Messages
									</a>
								</li> -->
								<!-- <li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
										Settings
									</a>
								</li> -->
							</ul>
						</div>
						<div class="m-portlet__head-tools">
							<ul class="m-portlet__nav">
								<li class="m-portlet__nav-item m-portlet__nav-item--last">
									<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
										<!-- <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
											<i class="la la-gear"></i>
										</a> -->
										<!-- <div class="m-dropdown__wrapper">
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
																		Create Post
																	</span>
																</a>
															</li>
															<li class="m-nav__item">
																<a href="" class="m-nav__link">
																	<i class="m-nav__link-icon flaticon-chat-1"></i>
																	<span class="m-nav__link-text">
																		Send Messages
																	</span>
																</a>
															</li>
															<li class="m-nav__item">
																<a href="" class="m-nav__link">
																	<i class="m-nav__link-icon flaticon-multimedia-2"></i>
																	<span class="m-nav__link-text">
																		Upload File
																	</span>
																</a>
															</li>
															<li class="m-nav__section">
																<span class="m-nav__section-text">
																	Useful Links
																</span>
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
															<li class="m-nav__separator m-nav__separator--fit m--hide"></li>
															<li class="m-nav__item m--hide">
																<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
																	Submit
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div> -->
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="tab-content">
						<div class="tab-pane active" id="m_user_profile_tab_1">
							<form class="m-form m-form--fit m-form--label-align-right" action="<?php echo URL; ?>backend/login/update_profile" method="POST">
								<div class="m-portlet__body">
									<!-- <div class="form-group m-form__group m--margin-top-10 m--hide">
										<div class="alert m-alert m-alert--default" role="alert">
											The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
										</div>
									</div> -->
									<!-- <div class="form-group m-form__group row">
										<div class="col-10 ml-auto">
											<h3 class="m-form__section">
												1. Personal Details
											</h3>
										</div>
									</div> -->
									<div class="form-group m-form__group row">
										<label for="example-text-input" class="col-2 col-form-label">
											Full Name
										</label>
										<div class="col-7">
											<input class="form-control m-input" type="text" name="fullname"pattern="^[a-zA-Z ]{3,40}$" minlength="3" maxlength="50" title="Please Enter A valid Name" placeholder="Abc Xyz" value="<?php echo $user['fullname']; ?>" required="required">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label for="example-text-input" class="col-2 col-form-label">
											Username
										</label>
										<div class="col-7">
											<input class="form-control m-input" type="text" name="username" pattern="^[A-Za-z0-9_]{1,15}$"" minlength="3" maxlength="50" title="Please Enter A valid Username" placeholder="abcxyz" id="username" value="<?php echo $user['username']; ?>" required="required" readonly>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label for="example-text-input" class="col-2 col-form-label">
											Password
										</label>
										<div class="col-7">
											<input class="form-control m-input" type="text" name="password" placeholder="password" minlength="3" maxlength="50" title="Please Enter A valid Password" value="<?php echo $user['password']; ?>" required="required">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label for="example-text-input" class="col-2 col-form-label">
											Email
										</label>
										<div class="col-7">
											<input class="form-control m-input" type="email" name="email" pattern="^[^.]([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" id="email" value="<?php echo $user['email']; ?>" required="required" readonly>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label for="example-text-input" class="col-2 col-form-label">
											Phone No.
										</label>
										<div class="col-7">
											<input class="form-control m-input" type="text" name="phone_no" pattern="[0-9]{11,12}" maxlength="12" title="Please Enter Valid Phone Number" placeholder="03123456789" value="<?php echo $user['phone_no']; ?>" required="required">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label for="example-text-input" class="col-2 col-form-label">
											CNIC
										</label>
										<div class="col-7">
											<input class="form-control m-input" type="text" name="cnic" pattern="[0-9]{13,13}" maxlength="13" placeholder="1234512345671" value="<?php echo $user['cnic']; ?>" required="required" readonly>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label for="example-text-input" class="col-2 col-form-label">
											Address
										</label>
										<div class="col-7">
											<input class="form-control m-input" type="text" name="address" minlength="5" maxlength="50" value="<?php echo $user['address']; ?>" required="required">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label for="example-text-input" class="col-2 col-form-label">
											Gender
										</label>
										<div class="col-7">
											<select name="gender" class="form-control m-input" required="required" readonly>
												<option value="Male" <?php if($user['gender']=='Male') { echo 'selected="selected"'; } ?>>Male</option> 
												<option value="Female" <?php if($user['gender']=='Female') { echo 'selected="selected"'; } ?>>Female</option>
												<option value="Other" <?php if($user['gender']=='Other') { echo 'selected="selected"'; } ?>>Other</option>
											</select>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label for="example-text-input" class="col-2 col-form-label">
											Date Of Birth
										</label>
										<div class="col-7">
											<input class="form-control m-input" type="date" name="date_of_birth" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" max="2009-01-01" min="1919-01-01" value="<?php echo $user['date_of_birth']; ?>" required="required" readonly>
										</div>
									</div>
								</div>
								<div class="m-portlet__foot m-portlet__foot--fit">
									<div class="m-form__actions">
										<div class="row">
											<div class="col-2"></div>
											<div class="col-7">
												<button type="submit" name="submit" value="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
													Save changes
												</button>
												&nbsp;&nbsp;
												<!-- <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">
													Cancel
												</button> -->
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane " id="m_user_profile_tab_2"></div>
						<div class="tab-pane " id="m_user_profile_tab_3"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>