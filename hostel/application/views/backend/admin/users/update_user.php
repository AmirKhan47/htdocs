<style>
	input::-webkit-calendar-picker-indicator
	{
	    display: none;
	}
</style>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator">
					Update User
				</h3>
				<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
					<li class="m-nav__item m-nav__item--home">
						<a href="<?php echo AURL;?>dashboard/" class="m-nav__link m-nav__link--icon">
							<i class="m-nav__link-icon la la-home"></i>
						</a>
					</li>
					<li class="m-nav__separator">
						-
					</li>
					<li class="m-nav__item">
						<a href="" class="m-nav__link">
							<span class="m-nav__link-text">
								Manage Users
							</span>
						</a>
					</li>
					<li class="m-nav__separator">
						-
					</li>
					<li class="m-nav__item">
						<a href="" class="m-nav__link">
							<span class="m-nav__link-text">
								Update User
							</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- END: Subheader -->
	<div class="m-content">
		<div class="row">
			<div class="col-xl-12 col-lg-11">
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
				<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
					<div class="m-portlet__head">
						<div class="m-portlet__head-tools">
							<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
										<i class="flaticon-share m--hide"></i>
										Update User
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
							<form class="m-form m-form--fit m-form--label-align-right" action="<?php echo AURL; ?>user/update_user/<?php echo $user['user_id']; ?>/<?php echo $user['role_id']; ?>" method="POST">
								<div class="m-portlet__body">
									<!-- <div class="form-group m-form__group m--margin-top-10 m--hide">
										<div class="alert m-alert m-alert--default" role="alert">
											The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
										</div>
									</div> -->
									<div class="form-group m-form__group row">
										<label for="example-text-input" class="col-2 col-form-label">
											Full Name
										</label>
										<div class="col-3">
											<input class="form-control m-input" type="text" name="fullname" pattern="^[a-zA-Z ]{3,40}$" minlength="3" maxlength="50" title="Please Enter A valid Name" placeholder="Abc Xyz" value="<?php echo $user['fullname']; ?>" required="required">
										</div>
										<label for="example-text-input" class="col-2 col-form-label">
											Username
										</label>
										<div class="col-3">
											<input class="form-control m-input" type="text" name="username" pattern="^[A-Za-z0-9_]{1,15}$"" minlength="3" maxlength="50" title="Please Enter A valid Username" placeholder="abcxyz" id="username" value="<?php echo $user['username']; ?>" required="required" readonly>
											<span id="username_msg"></span>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label for="example-text-input" class="col-2 col-form-label">
											Password
										</label>
										<div class="col-3">
											<input class="form-control m-input" type="text" name="password" placeholder="password" minlength="3" maxlength="50" title="Please Enter A valid Password" value="<?php echo $user['password']; ?>" required="required">
										</div>
										<label for="example-text-input" class="col-2 col-form-label">
											Email
										</label>
										<div class="col-3">
											<input class="form-control m-input" type="email" name="email" pattern="^[^.]([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" id="email" value="<?php echo $user['email']; ?>" required="required">
											<span id="email_msg"></span>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label for="example-text-input" class="col-2 col-form-label">
											Phone No.
										</label>
										<div class="col-3">
											<input class="form-control m-input" type="text" name="phone_no" pattern="[0-9]{11,12}" maxlength="12" title="Please Enter Valid Phone Number" placeholder="03123456789" value="<?php echo $user['phone_no']; ?>" required="required">
										</div>
										<label for="example-text-input" class="col-2 col-form-label">
											CNIC
										</label>
										<div class="col-3">
											<input class="form-control m-input" type="text" name="cnic" pattern="[0-9]{13,13}" maxlength="13" placeholder="1234512345671" title="Please Enter 13 Digit Valid CNIC" value="<?php echo $user['cnic']; ?>" required="required" readonly>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label for="example-text-input" class="col-2 col-form-label">
											Address
										</label>
										<div class="col-3">
											<input class="form-control m-input" type="text" name="address" minlength="5" maxlength="50" value="<?php echo $user['address']; ?>" required="required">
										</div>
										<label for="example-text-input" class="col-2 col-form-label">
											Gender
										</label>
										<div class="col-3">
											<select name="gender" class="form-control m-input" required="required">
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
										<div class="col-3">
											<input class="form-control m-input" type="date" name="date_of_birth" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" max="2009-01-01" min="1919-01-01" value="<?php echo $user['date_of_birth']; ?>" required="required" readonly>
											<span class="m-form__help">
												Please use the YYYY-MM-DD format.
											</span>
										</div>
										<label for="example-text-input" class="col-2 col-form-label">
											Select Role
										</label>
										<div class="col-3">
											<select class="form-control m-input" type="text" name="role_id" value="" required="required" disabled="disabled">
												<option value="<?php echo $user['role_id']; ?>"><?php echo $user['role_name']; ?></option>
												<?php foreach ($roles as $key => $value) { ?>
												<option value="<?php echo $value['role_id']; ?>"><?php echo $value['role_name']; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
								<div class="m-portlet__foot m-portlet__foot--fit">
									<div class="m-form__actions">
										<div class="row">
											<div class="col-2"></div>
											<div class="col-7">
												<button type="submit" name="submit" id="submit" value="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
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
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script> -->
<!-- <script type="text/javascript">
	$(document).ready(function()
	{
    	$('submit').attr('disabled',true);
	});
    $('document').ready(function()
    {
        $('#username').keyup(function()
        {
            var username=$(this).val();
            $.ajax(
            {
                url:"<?php echo AURL?>user/username_check",
                method:"POST",
                data:{username:username},
                dataType : "text",
                success:function(response)
                {
                	// alert(response);
                	if(response==1)
                	{
                		$('#username_msg').html('<span style="color:green;">Username Already Exists!</span>');
                		$(':button[type="submit"]').prop('disabled', true);
                	}
                	else
                	{
                		$('#username_msg').html('<span style="color:green;"></span>');
                		$(':button[type="submit"]').prop('disabled', false);
                	}
                }
            });
        });
    });
    $('document').ready(function()
    {
        $('#email').keyup(function()
        {
            var email=$(this).val();
            $.ajax(
            {
                url:"<?php echo AURL?>user/email_check",
                method:"POST",
                data:{email:email},
                dataType : "text",
                success:function(response)
                {
                	// alert(response);
                	if(response==1)
                	{
                		$('#email_msg').html('<span style="color:green;">Email Already Exists!</span>');
                		$(':button[type="submit"]').prop('disabled', true);
                	}
                	else
                	{
                		$('#email_msg').html('<span style="color:green;"></span>');
                		$(':button[type="submit"]').prop('disabled', false);
                	}
                }
            });
        });
    });
</script> -->