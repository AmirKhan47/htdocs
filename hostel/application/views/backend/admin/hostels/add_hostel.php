<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator">
					Add Hostel
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
								Add Hostel
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
		        ?>
				<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
					<div class="m-portlet__head">
						<div class="m-portlet__head-tools">
							<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
										<i class="flaticon-share m--hide"></i>
										Add Hostel
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
							<form class="m-form m-form--fit m-form--label-align-right" action="<?php echo AURL; ?>hostel/" method="POST" enctype="multipart/form-data">
								<div class="m-portlet__body">
									<!-- <div class="form-group m-form__group m--margin-top-10 m--hide">
										<div class="alert m-alert m-alert--default" role="alert">
											The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
										</div>
									</div> -->
									<div class="form-group m-form__group row">
										<label for="example-text-input" class="col-2 col-form-label">
											Hostel Name
										</label>
										<div class="col-4">
											<input class="form-control m-input" type="text" name="hostel_name" pattern="^[a-zA-Z ]{3,40}$" minlength="3" maxlength="50" title="Please Enter A valid Hostel Name" placeholder="Abc Xyz" value="" required="required">
										</div>
										<label for="example-text-input" class="col-2 col-form-label">
											Owner Name
										</label>
										<div class="col-4">
											<input class="form-control m-input" type="text" name="owner_name" pattern="^[a-zA-Z ]{3,40}$" minlength="3" maxlength="50" title="Please Enter A valid Name" placeholder="Abc Xyz" value="" required="required">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label for="example-text-input" class="col-2 col-form-label">
											Contact
										</label>
										<div class="col-4">
											<input class="form-control m-input" type="text" name="contact" pattern="[0-9]{11,12}" maxlength="12" title="Please Enter Valid Phone Number" placeholder="03123456789" value="" required="required">
										</div>
										<label for="example-text-input" class="col-2 col-form-label">
											Description
										</label>
										<div class="col-4">
											<textarea class="form-control m-input" name="description" id="" cols="" rows="1" required="required"></textarea>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label for="example-text-input" class="col-2 col-form-label">
											Category
										</label>
										<div class="col-4">
											<select class="form-control m-input" type="text" name="category_id" required="required">
												<option value="">Select</option>
												<!-- <option value="Girls">Girls</option>
												<option value="Boys">Boys</option>
												<option value="Guest House">Guest House</option> -->
												<?php foreach ($categories as $key => $value) { ?>
													<option value="<?php echo $value['category_id']; ?>"><?php echo $value['category_name']; ?></option>
												<?php } ?>
											</select>
										</div>
										<label for="example-text-input" class="col-2 col-form-label">
											Type
										</label>
										<div class="col-4">
											<select class="form-control m-input" type="text" name="type_id" required="required">
												<option value="">Select</option>
												<!-- <option value="Luxury">Luxury</option>
												<option value="Economy">Economy</option> -->
												<?php foreach ($types as $key => $value) { ?>
													<option value="<?php echo $value['type_id']; ?>"><?php echo $value['type_name']; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label for="example-text-input" class="col-2 col-form-label">
											Property Size
										</label>
										<div class="col-4">
											<input class="form-control m-input" type="text" name="property_size" title="Please Enter Valid Number" maxlength="50" value="" required="required">
										</div>
										<label for="example-text-input" class="col-2 col-form-label">
											Total Rooms
										</label>
										<div class="col-4">
											<input class="form-control m-input" type="text" name="total_rooms" pattern="^(0|[1-9][0-9]*)$" title="Please Enter Valid Number" maxlength="50" value="" required="required">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label for="example-text-input" class="col-2 col-form-label">
											Website Link
										</label>
										<div class="col-4">
											<input class="form-control m-input" type="url" name="website_link" minlength="10" maxlength="500" value="" required="required">
										</div>
										<label for="example-text-input" class="col-2 col-form-label">
											Facebook Link
										</label>
										<div class="col-4">
											<input class="form-control m-input" type="url" name="facebook_link" minlength="10" maxlength="500" value="" required="required">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label for="example-text-input" class="col-2 col-form-label">
											Hostel Timings
										</label>
										<div class="col-4">
											From
											<input class="m-input" type="time" name="hostel_timings1" value="01:59" required="required">
											To
											<input class="m-input" type="time" name="hostel_timings2" value="01:59" required="required">
										</div>
										<label for="example-text-input" class="col-2 col-form-label">
											Single Person Room Rent
										</label>
										<div class="col-4">
											<input class="form-control m-input" type="text" name="single_person_room_rent" pattern="^(0|[1-9][0-9]*)$" title="Please Enter Valid Number" maxlength="50" value="" required="required">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label for="example-text-input" class="col-2 col-form-label">
											Shared Room Rent
										</label>
										<div class="col-4">
											<input class="form-control m-input" type="text" name="shared_room_rent" pattern="^(0|[1-9][0-9]*)$" title="Please Enter Valid Number" maxlength="50" value="" required="required">
										</div>
										<label for="example-text-input" class="col-2 col-form-label">
											Address
										</label>
										<div class="col-4">
											<input class="form-control m-input" type="text" name="address" maxlength="500" value="" required="required">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label for="example-text-input" class="col-2 col-form-label">
											Country
										</label>
										<div class="col-4">
											<select class="form-control m-input" type="text" name="country_id" id="country_id" required="required">
												<option value="">Select</option>
												<?php foreach ($countries as $key => $value) { ?>
													<option value="<?php echo $value['country_id']; ?>"><?php echo $value['country_name']; ?></option>
												<?php } ?>
											</select>
										</div>
										<label for="example-text-input" class="col-2 col-form-label">
											City
										</label>
										<div class="col-4">
											<select class="form-control m-input" type="text" name="city_id" id="city_id" required="required">
												<option value="">Select</option>
												<!-- <?php foreach ($cities as $key => $value) { ?>
													<option value="<?php echo $value['city_id']; ?>"><?php echo $value['city_name']; ?></option>
												<?php } ?> -->
											</select>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label for="example-text-input" class="col-2 col-form-label">
											Area
										</label>
										<div class="col-4">
											<select class="form-control m-input" type="text" name="area_id" id="area_id" required="required">
												<option value="">Select</option>
												<?php foreach ($areas as $key => $value) { ?>
													<option value="<?php echo $value['area_id']; ?>"><?php echo $value['area_name']; ?></option>
												<?php } ?>
											</select>
										</div>
										<label for="example-text-input" class="col-2 col-form-label">
											Google Location
										</label>
										<div class="col-4">
											<input class="form-control m-input" type="url" name="google_location" minlength="10" maxlength="500" value="" required="required">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label for="example-text-input" class="col-2 col-form-label">
											Hostel Logo
										</label>
										<div class="col-4">
											<input class="form-control m-input" type="file" name="hostel_logo" accept=".png,.jpeg,.jpg" id="hostel_logo" onchange="image_check()" value="" required="required">
											<div id="hostel_logo_error"></div>
										</div>
										<label for="example-text-input" class="col-2 col-form-label">
											Hostel Pictures
										</label>
										<div class="col-4">
											<input class="form-control m-input" type="file" name="picture_name[]" accept=".png,.jpeg,.jpg" id="picture_name" onchange="image_check1()" value="" required="required" multiple="multiple">
											<div id="picture_name_error"></div>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label for="example-text-input" class="col-2 col-form-label">
											Facilities
										</label>
										<div class="col-10">
											<div class="m-checkbox-inline">
												<?php foreach ($facilities as $key => $value){ ?>
													<label class="m-checkbox m-checkbox--check-bold m-checkbox--state-brand">
														<input type="checkbox" name="hostel_facilities[]" value="<?php echo $value['facility_id']; ?>">
														<?php echo $value['facility_name']; ?>
														<span></span>
													</label>
												<?php } ?>
												</label>
											</div>
										</div>
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
						<div class="tab-pane " id="m_user_profile_tab_2"></div>
						<div class="tab-pane " id="m_user_profile_tab_3"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script> -->
<script type="text/javascript">
$(document).ready(function ()
{
    $('#submit').click(function()
    {
     	checked=$("input[type=checkbox]:checked").length;
      	if(checked==3)
      	{
       		alert("You must check at least one Facilities checkbox.");
        	return false;
      	}
    });
});
</script>
<script>
	$(document).ready(function()
	{
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
	           	$('#hostel_logo_error').html('<span class="help-block form-error" style="color:#e73d4a;">Max Size 512KB</span>');
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
	function image_check1()
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
	      $('#picture_name').addClass('error');
	       $('#picture_name').css('border-color','rgb(185, 74, 72)');
	       $('#picture_name_error').html('<span class="help-block form-error" style="color:#e73d4a;">Unsupported Format only images supported</span>');
	       $(':input[type="submit"]').prop('disabled', true);
	   	}
	   	else
	   	{
	    	if(size==1)
	       	{
	        	$('#picture_name').addClass('error');
	           	$('#picture_name').css('border-color','rgb(185, 74, 72)');
	           	$('#picture_name_error').html('<span class="help-block form-error" style="color:#e73d4a;">Max Size 512KB</span>');
	           	$(':input[type="submit"]').prop('disabled', true);
	    	}
	       	else
	     	{
	           	$('#picture_name').removeClass('error');
	           	$('#picture_name').css('border-color','#27a4b0');
	           	$('#picture_name_error').html('');
	           	$(':input[type="submit"]').prop('disabled', false);
	       	}
		}
	}
</script>