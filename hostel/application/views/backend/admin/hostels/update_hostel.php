<!-- <style>
	.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(<?php echo URL;?>assets/Preloader_2.gif) center no-repeat #fff;
}
</style>
<div class="se-pre-con"></div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script> -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator">
					Update Hostel
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
								Manage Hostels
							</span>
						</a>
					</li>
					<li class="m-nav__separator">
						-
					</li>
					<li class="m-nav__item">
						<a href="" class="m-nav__link">
							<span class="m-nav__link-text">
								Update Hostel
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
				<!-- <?php echo $error;?> -->
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
		            if ($this->session->flashdata('warning_message')) 
		            {
		        ?>
		                <div class="alert alert-warning alert-dismissible fade show   m-alert m-alert--square m-alert--air">
		                    <button class="close" data-close="alert"></button>
		                    <span><?php echo $this->session->flashdata('warning_message'); ?></span>
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
										Hostel Details
									</a>
								</li>
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
										Hostel Images
									</a>
								</li>
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
										Hostel Facilities
									</a>
								</li>
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
							<form class="m-form m-form--fit m-form--label-align-right" action="<?php echo AURL; ?>hostel/update_hostel/<?php echo $hostel['hostel_id']; ?>" method="POST" enctype="multipart/form-data">
								<div class="m-portlet__body">
									<div class="form-group m-form__group row">
										<div class="col-lg-4">
											<label for="example-text-input">
												Hostel Name
											</label>
											<input class="form-control m-input" type="text" name="hostel_name" pattern="^[a-zA-Z ]{3,40}$" minlength="3" maxlength="50" title="Please Enter A valid Hostel Name" value="<?php echo $hostel['hostel_name']; ?>" required="required">
										</div>
										<div class="col-lg-4">
											<label for="example-text-input">
												Owner Name
											</label>
											<input class="form-control m-input" type="text" name="owner_name" pattern="^[a-zA-Z ]{3,40}$" minlength="3" maxlength="50" title="Please Enter A valid Name" value="<?php echo $hostel['owner_name']; ?>" required="required">
										</div>
										<div class="col-lg-4">
											<label for="example-text-input">
												Contact
											</label>
											<input class="form-control m-input" type="text" name="contact" pattern="[0-9]{11,12}" maxlength="12" title="Please Enter Valid Phone Number" placeholder="03123456789" value="<?php echo $hostel['contact']; ?>" required="required">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<div class="col-lg-4">
											<label for="example-text-input" class="col-2 col-form-label">
												Description
											</label>
											<textarea class="form-control m-input" name="description" id="" cols="" rows="1" required="required"><?php echo $hostel['description']; ?></textarea>
										</div>
										<div class="col-lg-4">
											<label for="example-text-input" class="col-2 col-form-label">
												Category
											</label>
											<select class="form-control m-input" type="text" name="category_id" value="" required="required">
												<!-- <option value="<?php echo $hostel['category_id']; ?>"><?php echo $hostel['category_name']; ?></option> -->
												<?php foreach ($categories as $key => $value) { ?>
													<option value="<?php echo $value['category_id'];?>
														<?php if($hostel['category_id']==$value['category_id']) { echo 'selected="selected"'; } ?>"><?php echo $value['category_name']; ?>
													</option>
												<?php } ?>
											</select>
										</div>
										<div class="col-lg-4">
											<label for="example-text-input" class="col-2 col-form-label">
												Type
											</label>
											<select class="form-control m-input" type="text" name="type_id" value="" required="required">
												<!-- <option value="<?php echo $hostel['type_id']; ?>"><?php echo $hostel['type_name']; ?></option> -->
												<?php foreach ($types as $key => $value) { ?>
													<option value="<?php echo $value['type_id'];?>
														<?php if($hostel['type_id']==$value['type_id']) { echo 'selected="selected"'; } ?>"><?php echo $value['type_name']; ?>
													</option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<div class="col-lg-4">
											<label for="example-text-input">
												Property Size
											</label>
											<input class="form-control m-input" type="text" name="property_size" title="Please Enter Valid Number" maxlength="50" value="<?php echo $hostel['property_size']; ?>" required="required">
										</div>
										<div class="col-lg-4">
											<label for="example-text-input">
												Total Rooms
											</label>
											<input class="form-control m-input" type="text" name="total_rooms" pattern="^(0|[1-9][0-9]*)$" title="Please Enter Valid Number" maxlength="50" value="<?php echo $hostel['total_rooms']; ?>" required="required">
										</div>
										<div class="col-lg-4">
											<label for="example-text-input">
												Website Link
											</label>
											<input class="form-control m-input" type="text" name="website_link" value="<?php echo $hostel['website_link']; ?>" required="required">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<div class="col-lg-4">
											<label for="example-text-input">
												Facebook Link
											</label>
											<input class="form-control m-input" type="text" name="facebook_link" value="<?php echo $hostel['facebook_link']; ?>" required="required">
										</div>
										<div class="col-lg-4">
											<label for="example-text-input">
												Hostel Timings
											</label>
											<?php
												$pieces=explode("-",$hostel['hostel_timings']);
												$hostel_timings1=$pieces[0];
												$hostel_timings2=$pieces[1];
											?>
											<!-- <input class="form-control m-input" type="text" name="hostel_timings" value="<?php echo $hostel['hostel_timings']; ?>" required="required"> --><br>
											From
											<input class="m-input" type="time" name="hostel_timings1" value="<?php echo $hostel_timings1; ?>" required="required">
											To
											<input class="m-input" type="time" name="hostel_timings2" value="<?php echo $hostel_timings2; ?>" required="required">
										</div>
										<div class="col-lg-4">
											<label for="example-text-input">
												Single Person Room Rent
											</label>
											<input class="form-control m-input" type="text" name="single_person_room_rent" pattern="^(0|[1-9][0-9]*)$" title="Please Enter Valid Number" maxlength="50" value="<?php echo $hostel['single_person_room_rent']; ?>" required="required">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<div class="col-lg-4">
											<label for="example-text-input">
												Shared Room Rent
											</label>
											<input class="form-control m-input" type="text" name="shared_room_rent" pattern="^(0|[1-9][0-9]*)$" title="Please Enter Valid Number" maxlength="50" value="<?php echo $hostel['shared_room_rent']; ?>" required="required">
										</div>
										<div class="col-lg-4">
											<label for="example-text-input">
												Address
											</label>
											<input class="form-control m-input" type="text" name="address" value="<?php echo $hostel['address']; ?>" required="required">
										</div>
										<div class="col-lg-4">
											<label for="example-text-input">
												Country
											</label>
											<select class="form-control m-input" type="text" name="country_id" id="country_id" value="" required="required">
												<!-- <option value="<?php echo $hostel['country_id']; ?>"><?php echo $hostel['country_name']; ?></option> -->
												<?php foreach ($countries as $key => $value) { ?>
													<option value="<?php echo $value['country_id']; ?>" <?php if($hostel['country_id']==$value['country_id']) { echo 'selected'; } ?> ><?php echo $value['country_name']; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<div class="col-lg-4">
											<label for="example-text-input">
												City
											</label>
											<input type="hidden" name="hostel_id" id="hostel_id" value="<?php echo $hostel['hostel_id']; ?>">
											<select class="form-control m-input" type="text" name="city_id" id="city_id" value="" required="required">
												<option value="<?php echo $hostel['city_id']; ?>"><?php echo $hostel['city_name']; ?></option>
											</select>
										</div>
										<div class="col-lg-4">
											<label for="example-text-input">
												Area
											</label>
											<select class="form-control m-input" type="text" name="area_id" id="area_id" value="" required="required">
												<option value="<?php echo $hostel['area_id']; ?>"><?php echo $hostel['area_name']; ?></option>
												<?php foreach ($areas as $key => $value) { ?>
													<option value="<?php echo $value['area_id']; ?>"><?php echo $value['area_name']; ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="col-lg-4">
											<label for="example-text-input">
												Google Location
											</label>
											<input class="form-control m-input" type="text" name="google_location" value="<?php echo $hostel['google_location']; ?>" required="required">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label for="example-text-input">
											Hostel Logo
										</label>
										<div class="col-4">
											<img src="<?php echo Admin_Uploads.'hostel_logos/'.$hostel['hostel_logo']; ?>" width="200" height="100" alt="Hostel Logo Image">
											<input type="hidden" name="hostel_logo" value="<?php echo $hostel['hostel_logo']; ?>">
											<input class="form-control m-input" type="file" name="hostel_logo" accept=".png,.jpeg,.jpg" id="hostel_logo" onchange="image_check()" value="<?php echo $hostel['hostel_logo']; ?>">
											<div id="hostel_logo_error"></div>
										</div>
									</div>
									<div class="m-form__actions">
										<div class="row">
											<div class="col-2"></div>
											<div class="col-7">
												<button type="submit" name="submit" id="submit" value="submit" class="btn btn-primary">
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
						<div class="tab-pane " id="m_user_profile_tab_2">
							<div class="m-portlet__body">
								<div class="form-group m-form__group row">
									<?php foreach ($hostel_pictures as $key => $value) { ?>
										<form class="m-form m-form--fit m-form--label-align-right" id="images_form<?php echo $value['hostel_picture_id']; ?>" enctype="multipart/form-data" action="">
											<div class="col-4" id="image_error<?php echo $value['hostel_picture_id']; ?>">
												<img class="img-responsive" src="<?php echo Admin_Uploads.'hostel_pictures/'.$value['picture_name']; ?>" width="100" height="100" alt="Hostel Pictures">
												<div id="error_area<?php echo $value['hostel_picture_id']; ?>">
													<input type="file" name="picture_name" accept=".png,.jpeg,.jpg" id="picture_name" onchange="image_check1(<?php echo $value['hostel_picture_id']; ?>)" value="">
													<span id="picture_name_error<?php echo $value['hostel_picture_id']; ?>"></span>
												</div>
												<div class="btn-group mt-3">
													<!-- <input type="hidden" name="hostel_id" value="<?php echo $value['hostel_id'];; ?>"> -->
													<!-- <input type="hidden" name="picture_name" value="<?php echo $value['picture_name'];; ?>"> -->
													<button type="button" name="image_update_btn<?php echo $value['hostel_picture_id']; ?>" id="image_update_btn<?php echo $value['hostel_picture_id']; ?>" onclick='image_update("<?php echo $value['hostel_picture_id']; ?>","<?php echo $value['picture_name']; ?>")' class="btn btn-primary" disabled>
														Save
													</button>
													&nbsp;&nbsp;
													<button type="button" name="delete_image<?php echo $value['hostel_picture_id']; ?>" id="delete_image<?php echo $value['hostel_picture_id']; ?>" onclick='delete_image("<?php echo $value['hostel_picture_id']; ?>","<?php echo $value['picture_name']; ?>")' class="btn btn-secondary m-btn m-btn--air m-btn--custom">
														Remove
													</button>
													<!-- <button type="button" class="btn btn-secondary m-btn m-btn--air m-btn--custom">
														Download
													</button> -->
													<a href="<?php echo URL.'./assets/uploads/hostel_pictures/'.$value['picture_name'];?>" download>
		                                                <button type="button" class="btn btn-secondary m-btn m-btn--air m-btn--custom" id=""><i class="fa fa-download"></i>Download</button>
		                                            </a>
												</div>
											</div>
										</form>
									<?php } ?>
								</div>
								<form class="m-form m-form--fit m-form--label-align-right" action="<?php echo AURL; ?>hostel/add_more_images/<?php echo $hostel['hostel_id']; ?>" method="POST" enctype="multipart/form-data">
									<div class="form-group m-form__group row">
										<label for="example-text-input" class="col-3 col-form-label">
											Add More Hostel Pictures
										</label>
										<div class="col-9">
											<input class="form-control m-input" type="file" name="picture_name1[]" accept=".png,.jpeg,.jpg" id="picture_name1" onchange="image_check2()" value="" required="required" multiple="multiple">
											<div id="picture_name_error1"></div>
										</div>
									</div>
									<div class="m-portlet__foot m-portlet__foot--fit">
										<div class="m-form__actions">
											<div class="row">
												<div class="col-2"></div>
												<div class="col-7">
													<button type="submit" name="submit" id="submit" value="submit" class="btn btn-primary">
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
						</div>
						<div class="tab-pane " id="m_user_profile_tab_3">
							<form class="m-form m-form--fit m-form--label-align-right" action="<?php echo AURL; ?>hostel/update_hostel_facilities/<?php echo $hostel['hostel_id']; ?>" method="POST" enctype="multipart/form-data">
								<div class="m-portlet__body">
									<div class="form-group m-form__group row">
										<label for="example-text-input" class="col-2 col-form-label">
											Facilities
										</label>
										<div class="col-10">
											<div class="m-checkbox-inline">
												<?php
													$f=array();
													foreach ($hostels_facilities as $k => $val)
													{
														$f[]=$val['facility_id'];
													} 
													foreach ($facilities as $key => $value)
													{
														if(in_array($value['facility_id'],$f))
														{
															$checked="checked";	
														}
														else
														{
															$checked='';
														}
												?>
														<label class="m-checkbox m-checkbox--check-bold m-checkbox--state-brand">				<input type="checkbox" name="hostel_facilities[]" value="<?php echo $value['facility_id']; ?>" <?php echo $checked; ?> >
															<?php echo $value['facility_name']; ?>
															<span></span>
														</label>
												<?php
													}
												?>
											</div>
										</div>
									</div>
								</div>
								<div class="m-form__actions">
									<div class="row">
										<div class="col-2"></div>
										<div class="col-7">
											<button type="submit" name="submit" id="submit" value="submit" class="btn btn-primary">
												Save changes
											</button>
											&nbsp;&nbsp;
											<!-- <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">
												Cancel
											</button> -->
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script> -->
<script>
	$(document).ready(function()
	{
	  		var country_id = $('#country_id').val();
	  		var hostel_id = $('#hostel_id').val();
	  		if(country_id != '')
	  		{
	   			$.ajax(
	   			{
		    		url:"<?php echo AURL; ?>hostel/get_cities1",
		    		method:"POST",
		    		data:{country_id:country_id,hostel_id:hostel_id},
		    		success:function(data)
				    {
				    	$('#city_id').html(data);
				     	// $('#area_id').html('<option value="">Select Area</option>');
				    }
	   			});
			}
		  	else
		  	{
		   		$('#city_id').html('<option value="">Select City</option>');
		   		$('#area_id').html('<option value="">Select Area</option>');
		  	}
	  		var city_id = $('#city_id').val();
	  		var hostel_id = $('#hostel_id').val();
	  		if(city_id != '')
	  		{
	   			$.ajax(
	   			{
		    		url:"<?php echo AURL; ?>hostel/get_areas1",
		    		method:"POST",
		    		data:{city_id:city_id,hostel_id:hostel_id},
		    		success:function(data)
				    {
				    	$('#area_id').html(data);
				     	// $('#area_id').html('<option value="">Select Area</option>');
				    }
	   			});
			}
		  	else
		  	{
		   		$('#city_id').html('<option value="">Select City</option>');
		   		$('#area_id').html('<option value="">Select Area</option>');
		  	}
		$('#country_id').change(function()
		{
	  		var country_id = $('#country_id').val();
	  		if(country_id != '')
	  		{
	   			$.ajax(
	   			{
		    		url:"<?php echo AURL; ?>hostel/get_cities",
		    		method:"POST",
		    		data:{country_id:country_id},
		    		success:function(data)
				    {
				    	$('#city_id').html(data);
				     	$('#area_id').html('<option value="">Select Area</option>');
				    }
	   			});
			}
		  	else
		  	{
		   		$('#city_id').html('<option value="">Select City</option>');
		   		$('#area_id').html('<option value="">Select Area</option>');
		  	}
		});
		$('#city_id').change(function()
		{
			var city_id = $('#city_id').val();
		  	if(city_id != '')
		  	{
		   		$.ajax(
		   		{
					url:"<?php echo AURL; ?>hostel/get_areas",
	    			method:"POST",
	    			data:{city_id:city_id},
	    			success:function(data)
	    			{
	    				$('#area_id').html(data);
	    			}
	   			});
	  		}
	  		else
	  		{
	   			$('#area_id').html('<option value="">Select Area</option>');
	  		}
	 	}); 
	});
</script>
<script type="text/javascript">
	function image_check()
	{
		var type_reg = /^image\/(jpg|png|jpeg)$/;
		// var video_reg=/^video\/(mp4)$/;
		// var pdf_reg=/^application\/(pdf)$/;
		var files = $('#hostel_logo').get(0).files;
		var size=0;
		var r=0;
		for (i = 0; i < files.length; i++)
		{
			var type = files[i].type;
			console.log(type);
			if (type_reg.test(type))
			{
				console.log(type);
	       	}
	       	else
	       	if(video_reg.test(type))
	       	{
	           console.log(type);
	       	}
	       	else
	       	if(pdf_reg.test(type))
	       	{
	           console.log(type);
	       	}
	       	else
	       	{
	           r=1;
	           break;
	       	}
	       	var  file_size=  files[i].size;
	       	var isize = (file_size / 1024);
	       	isize = (Math.round(isize * 100) / 100);
	       	if(isize > 2048)
	       	{
   				size=1;
   				break;
			}
	       	else
	       	{
	           console.log("small file  "+file_size);
	       	}
		}
	   	if(r==1)
	   	{
	      $('#hostel_logo').addClass('error');
	       $('#hostel_logo').css('border-color','rgb(185, 74, 72)');
	       $('#hostel_logo_error').html('<span class="help-block form-error" style="color:#e73d4a;">Unsupported Format only images supported</span>');
	       $(':input[type="submit"]').prop('disabled', true);
	   	}
	   	else
	   	{
	    	if(size==1)
	       	{
	        	$('#hostel_logo').addClass('error');
	           	$('#hostel_logo').css('border-color','rgb(185, 74, 72)');
	           	$('#hostel_logo_error').html('<span class="help-block form-error" style="color:#e73d4a;">Max Size 500KB</span>');
	           	$(':input[type="submit"]').prop('disabled', true);
	    	}
	       	else
	     	{
	           	$('#hostel_logo').removeClass('error');
	           	$('#hostel_logo').css('border-color','#27a4b0');
	           	$('#hostel_logo_error').html('');
	           	$(':input[type="submit"]').prop('disabled', false);
	       	}
		}
	}
</script>
<script type="text/javascript">
	function image_check1(hostel_picture_id)
	{
		var type_reg = /^image\/(jpg|png|jpeg)$/;
		// var video_reg=/^video\/(mp4)$/;
		// var pdf_reg=/^application\/(pdf)$/;
		var files = $('#picture_name').get(0).files;
		var size=0;
		var r=0;
		for (i = 0; i < files.length; i++)
		{
			var type = files[i].type;
			// console.log(type);
			if (type_reg.test(type))
			{
				// console.log(type);
	       	}
	       	else
	       	if(video_reg.test(type))
	       	{
	           // console.log(type);
	       	}
	       	else
	       	if(pdf_reg.test(type))
	       	{
	           // console.log(type);
	       	}
	       	else
	       	{
	           r=1;
	           break;
	       	}
	       	var  file_size=  files[i].size;
	       	var isize = (file_size / 1024);
	       	isize = (Math.round(isize * 100) / 100);
	       	if(isize > 512)
	       	{
   				size=1;
   				break;
			}
	       	else
	       	{
	           // console.log("small file  "+file_size);
	       	}
		}
	   	if(r==1)
	   	{
	      $('#error_area'+hostel_picture_id).addClass('error');
	       $('#error_area'+hostel_picture_id).css({'border-color':'coral','border-style':'solid'});
	       $('#picture_name_error'+hostel_picture_id).html('<span class="help-block form-error" style="color:#e73d4a;">Unsupported Format only images supported</span>');
	       $(':input[type="submit"]').prop('disabled', true);
	   	}
	   	else
	   	{
	    	if(size==1)
	       	{
	        	$('#error_area'+hostel_picture_id).addClass('error');
	           	$('#error_area'+hostel_picture_id).css({'border-color':'coral','border-style':'solid'});
	           	$('#picture_name_error'+hostel_picture_id).html('<span class="help-block form-error" style="color:#e73d4a;">Max Size 500KB</span>');
	           	$('#image_update_btn'+hostel_picture_id).prop('disabled', true);
	    	}
	       	else
	     	{
	           	$('#error_area'+hostel_picture_id).removeClass('error');
	           	$('#error_area'+hostel_picture_id).css({'border-color':'#27a4b0','border-style':'none'});
	           	$('#picture_name_error'+hostel_picture_id).html('');
	           	$('#image_update_btn'+hostel_picture_id).prop('disabled', false);
	       	}
		}
	}
	function image_update(hostel_picture_id,picture_name)
	{
		// var form = $('#images_form');
 	 	// var formdata = new FormData(form);
		$.ajax(
		{
			url: '<?php echo AURL; ?>hostel/image_update/'+hostel_picture_id+'/'+picture_name,
			method: 'POST',
			// data: formdata,
			data: new FormData($('#images_form'+hostel_picture_id)[0]),
			processData: false,  // Important!
	        contentType: false,
	        cache: false,
		})
		.done(function()
		{
			console.log("success");
			window.location.reload();
			// window.location.hash = 'm_user_profile_tab_2';
			// window.location.href = window.location.href + '#tabs-4';
			// $("#m_user_profile_tab_2").load(window.location.href + " #here" );
		})
		.fail(function()
		{
			console.log("error");
		})
		.always(function()
		{
			console.log("complete");
		});
	}
	function delete_image(hostel_picture_id,picture_name)
	{
		$.ajax(
		{
			url: '<?php echo AURL; ?>hostel/delete_image/',
			data: {hostel_picture_id:hostel_picture_id,picture_name:picture_name},
			method: 'POST',
		})
		.done(function()
		{
			console.log("success");
			 location.reload();
		})
		.fail(function() {
			console.log("error");
		})
		.always(function()
		{
			console.log("complete");
		});
	}
	function image_check2()
	{
		var type_reg = /^image\/(jpg|png|jpeg)$/;
		// var video_reg=/^video\/(mp4)$/;
		// var pdf_reg=/^application\/(pdf)$/;
		var files = $('#picture_name1').get(0).files;
		var size=0;
		var r=0;
		for (i = 0; i < files.length; i++)
		{
			var type = files[i].type;
			console.log(type);
			if (type_reg.test(type))
			{
				console.log(type);
	       	}
	       	else
	       	if(video_reg.test(type))
	       	{
	           console.log(type);
	       	}
	       	else
	       	if(pdf_reg.test(type))
	       	{
	           console.log(type);
	       	}
	       	else
	       	{
	           r=1;
	           break;
	       	}
	       	var  file_size=  files[i].size;
	       	var isize = (file_size / 1024);
	       	isize = (Math.round(isize * 100) / 100);
	       	if(isize > 512)
	       	{
   				size=1;
   				break;
			}
	       	else
	       	{
	           console.log("small file  "+file_size);
	       	}
		}
	   	if(r==1)
	   	{
	      $('#picture_name1').addClass('error');
	       $('#picture_name1').css('border-color','rgb(185, 74, 72)');
	       $('#picture_name_error1').html('<span class="help-block form-error" style="color:#e73d4a;">Unsupported Format only images supported</span>');
	       $(':input[type="submit"]').prop('disabled', true);
	   	}
	   	else
	   	{
	    	if(size==1)
	       	{
	        	$('#picture_name1').addClass('error');
	           	$('#picture_name1').css('border-color','rgb(185, 74, 72)');
	           	$('#picture_name_error1').html('<span class="help-block form-error" style="color:#e73d4a;">Max Size 512KB</span>');
	           	$(':input[type="submit"]').prop('disabled', true);
	    	}
	       	else
	     	{
	           	$('#picture_name1').removeClass('error');
	           	$('#picture_name1').css('border-color','#27a4b0');
	           	$('#picture_name_error1').html('');
	           	$(':input[type="submit"]').prop('disabled', false);
	       	}
		}
	}
</script>