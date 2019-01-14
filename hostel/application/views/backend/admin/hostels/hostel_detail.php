<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator">
					Hostel Detail
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
								Hostel Detail
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
										Hostel Detail
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
							<form class="m-form m-form--fit m-form--label-align-right" action="<?php echo AURL; ?>hostel/update_hostel/<?php echo $hostel['hostel_id']; ?>" method="POST" enctype="multipart/form-data">
									<div class="row table-bordered">
										<div class="col-4 ml-4">
											<label for="example-text-input" class="font-weight-bold">Hostel Status: Active</label>
										</div>
										<div class="col-3">
											<label for="example-text-input" class="font-weight-bold">ID: <?php echo $hostel['hostel_id']; ?></label>
										</div>
										<div class="col-4">
											<label for="example-text-input" class="font-weight-bold">Hostel Timings: <?php echo $hostel['hostel_timings']; ?></label>
										</div>
									</div>
									<div class="row">
										<div class="col-3 ml-4">
											<img src="<?php echo Admin_Uploads.'hostel_logos/'.$hostel['hostel_logo']; ?>" width="150" height="100" alt="Hostel Logo">
										</div>
										<div class="col-8">
											<table class="table-sm table-bordered m-table table-responsive">
												<tbody>
													<tr>
														<td class="font-weight-bold">Hostel Name</td>
														<td><?php echo $hostel['hostel_name']; ?></td>
														<td class="font-weight-bold">Shared Room Rent</td>
														<td><?php echo $hostel['owner_name']; ?></td>
													</tr>
													<tr>
														<td class="font-weight-bold">Owner Name</td>
														<td><?php echo $hostel['owner_name']; ?></td>
														<td class="font-weight-bold">Address</td>
														<td><?php echo $hostel['address']; ?></td>
													</tr>
													<tr>
														<td class="font-weight-bold">Contact</td>
														<td><?php echo $hostel['contact']; ?></td>
														<td class="font-weight-bold">Country</td>
														<td><?php echo $hostel['country_name']; ?></td>
													</tr>
													<tr>
														<td class="font-weight-bold">Category</td>
														<td><?php echo $hostel['category_name']; ?></td>
														<td class="font-weight-bold">City</td>
														<td><?php echo $hostel['city_name']; ?></td>
													</tr>
													<tr>
														<td class="font-weight-bold">Type</td>
														<td><?php echo $hostel['type_name']; ?></td>
														<td class="font-weight-bold">Area</td>
														<td><?php echo $hostel['area_name']; ?></td>
													</tr>
													<tr>
														<td class="font-weight-bold">Property Size</td>
														<td><?php echo $hostel['property_size']; ?></td>
														<td class="font-weight-bold">Google Location</td>
														<td><?php echo $hostel['google_location']; ?></td>
													</tr>
													<tr>
														<td class="font-weight-bold">Total No of Rooms</td>
														<td><?php echo $hostel['total_rooms']; ?></td>
														<td class="font-weight-bold">Website Link</td>
														<td><?php echo $hostel['website_link']; ?></td>
													</tr>
													<tr>
														<td class="font-weight-bold">Single Person Room Rent</td>
														<td><?php echo $hostel['single_person_room_rent']; ?></td>
														<td class="font-weight-bold">Facebook Page Link</td>
														<td><?php echo $hostel['facebook_link']; ?></td>
													</tr>
													<tr>
														<td colspan="2" class="font-weight-bold">Hostel Description</td>
														<td colspan="2"><?php echo $hostel['description']; ?></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="row mt-3">
										<!-- <div class="col-3 ml-4">
											<img src="<?php echo Admin_Uploads.'hostel_pictures/'.$hostel_pictures[0]['picture_name']; ?>" width="150" height="100" alt="Hostel Logo">
										</div> -->
										<div class="col-11 ml-4 table-bordered">
											<div class="m-checkbox-inline">
												<div class="row">
													<label class="font-weight-bold table-bordered">
														Facilities
													</label>
												</div>
												<div class="row-sm">
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
															<label class="m-checkbox m-checkbox--check-bold m-checkbox--state-brand">				<input type="checkbox" name="hostel_facilities[]" value="<?php echo $value['facility_id']; ?>" <?php echo $checked; ?> disabled>
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
								<label for="example-text-input" class="col-2 col-form-label font-weight-bold">
									Hostel Pictures
								</label>
								<div class="col-10">
									<?php foreach ($hostel_pictures as $key => $value) { ?>
										<img src="<?php echo Admin_Uploads.'hostel_pictures/'.$value['picture_name']; ?>" width="100" height="100" alt="Hostel Pictures">
									<?php } ?>
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
	           	$('#hostel_logo_error').html('<span class="help-block form-error" style="color:#e73d4a;">Max Size 2MB</span>');
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
	           	$('#picture_name_error').html('<span class="help-block form-error" style="color:#e73d4a;">Max Size 2MB</span>');
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