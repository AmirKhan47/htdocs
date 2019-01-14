<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator">
					Add Location
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
								Location Settings
							</span>
						</a>
					</li>
					<li class="m-nav__separator">
						-
					</li>
					<li class="m-nav__item">
						<a href="" class="m-nav__link">
							<span class="m-nav__link-text">
								Add Location
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
		        <div id="error"></div>
				<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
					<div class="m-portlet__head">
						<div class="m-portlet__head-tools">
							<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
										<i class="flaticon-share m--hide"></i>
										Add Country
									</a>
								</li>
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" id="2" role="tab">
										Add City
									</a>
								</li>
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
										Add Area
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
							<form class="m-form m-form--fit m-form--label-align-right" id="country_name_form">
								<div class="m-portlet__body">
									<!-- <div class="form-group m-form__group m--margin-top-10 m--hide">
										<div class="alert m-alert m-alert--default" role="alert">
											The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
										</div>
									</div> -->
									<!-- <div class="form-group m-form__group row">
										<div class="col-10 ml-auto">
											<h3 class="m-form__section">
												1. Country
											</h3>
										</div>
									</div> -->
									<div class="form-group m-form__group row">
										<label for="example-text-input" class="col-2 col-form-label">
											Country Name
										</label>
										<div class="col-3">
											<input class="form-control m-input" type="text" name="country_name" id="country_name" value="" required="required">
											<div id="country_name_msg"></div>
										</div>
									</div>
									<div class="m-form__actions">
										<div class="row">
											<div class="col-2"></div>
											<div class="col-7">
												<button type="button" name="country_name_submit" id="country_name_submit" value="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
													Save
												</button>
												&nbsp;&nbsp;
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane " id="m_user_profile_tab_2">
							<form class="m-form m-form--fit m-form--label-align-right" id="city_name_form">
								<div class="m-portlet__body">
										<div class="form-group m-form__group row">
											<label for="example-text-input" class="col-2 col-form-label">
												Select Country
											</label>
											<div class="col-3">
												<select class="form-control m-input" type="text" name="country_id" id="country_id" value="" required="required">
													<!-- <option value="">Select</option> -->
													<!-- <?php foreach ($countries as $key => $value) { ?>
														<option value="<?php echo $value['country_id']; ?>"><?php echo $value['country_name']; ?></option>
													<?php } ?> -->
												</select>
											</div>
										</div>
										<div class="form-group m-form__group row">
											<label for="example-text-input" class="col-2 col-form-label">
												City Name
											</label>
											<div class="col-3">
												<input class="form-control m-input" type="text" name="city_name" id="city_name" value="" required="required">
												<div id="city_name_msg"></div>
											</div>
										</div>
									<div class="m-form__actions">
										<div class="row">
											<div class="col-2"></div>
											<div class="col-7">
												<button type="button" name="city_name_submit" id="city_name_submit" value="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
													Save
												</button>
												&nbsp;&nbsp;
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane " id="m_user_profile_tab_3">
							<form class="m-form m-form--fit m-form--label-align-right" id="area_name_form">
								<div class="m-portlet__body">
										<div class="form-group m-form__group row">
											<label for="example-text-input" class="col-2 col-form-label">
												Select Country
											</label>
											<div class="col-3">
												<select class="form-control m-input" type="text" name="country_id" id="country_id1" value="" required="required">
													<option value="">Select</option>
													<?php foreach ($countries as $key => $value) { ?>
														<option value="<?php echo $value['country_id']; ?>"><?php echo $value['country_name']; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="form-group m-form__group row">
											<label for="example-text-input" class="col-2 col-form-label">
												Select City
											</label>
											<div class="col-3">
												<select class="form-control m-input" type="text" name="city_id" id="city_id" value="" required="required">
													<option value="">Select</option>
													<?php foreach ($cities as $key => $value) { ?>
														<option value="<?php echo $value['city_id']; ?>"><?php echo $value['city_name']; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="form-group m-form__group row">
											<label for="example-text-input" class="col-2 col-form-label">
												Area Name
											</label>
											<div class="col-3">
												<input class="form-control m-input" type="text" name="area_name" id="area_name" value="" required="required">
												<div id='area_name_msg'></div>
											</div>
										</div>
									<div class="m-form__actions">
										<div class="row">
											<div class="col-2"></div>
											<div class="col-7">
												<button type="button" name="area_name_submit" id="area_name_submit" value="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
													Save
												</button>
												&nbsp;&nbsp;
											</div>
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
<script type="text/javascript">
	$(document).ready(function()
	{
    	$('#country_name_submit').attr('disabled',true);
    	$('#city_name_submit').attr('disabled',true);
    	$('#area_name_submit').attr('disabled',true);
	});
	$(document).ready(function()
	{
		$('#country_id1').change(function()
		{
	  		var country_id = $('#country_id1').val();
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
	});
    $('document').ready(function()
    {
        $('#country_name').keyup(function()
        {
            var country_name=$(this).val();
            $.ajax(
            {
                url:"<?php echo AURL?>location/country_name_check",
                method:"POST",
                data:{country_name:country_name},
                dataType : "text",
                success:function(response)
                {
                	// alert(response);
                	if(response==1)
                	{
                		$('#country_name_msg').html('<span style="color:green;">Country Name Already Exists!</span>');
                		$('#country_name_submit').prop('disabled', true);
                	}
                	else
                	{
                		$('#country_name_msg').html('<span style="color:green;"></span>');
                		$('#country_name_submit').prop('disabled', false);
                	}
                }
            });
        });
    });
    $('document').ready(function()
    {
        $('#city_name').keyup(function()
        {
            var city_name=$(this).val();
            var country_id=$('#country_id').val();
            // var country_name=$('#country_id').find(':selected').text();
            $.ajax(
            {
                url:"<?php echo AURL?>location/city_name_check",
                method:"POST",
                data:{city_name:city_name,country_id:country_id},
                dataType : "text",
                success:function(response)
                {
                	// alert(response);
                	if(response==1)
                	{
                		$('#city_name_msg').html('<span style="color:green;">City Name Already Exists!</span>');
                		$('#city_name_submit').prop('disabled', true);
                	}
                	else
                	{
                		$('#city_name_msg').html('<span style="color:green;"></span>');
                		$('#city_name_submit').prop('disabled', false);
                	}
                }
            });
        });
    });
    $('document').ready(function()
    {
        $('#area_name').keyup(function()
        {
            var area_name=$(this).val();
            var city_id=$('#city_id').val();
            $.ajax(
            {
                url:"<?php echo AURL?>location/area_name_check",
                method:"POST",
                data:{area_name:area_name,city_id:city_id},
                dataType : "text",
                success:function(response)
                {
                	// alert(response);
                	if(response==1)
                	{
                		$('#area_name_msg').html('<span style="color:green;">Area Name Already Exists!</span>');
                		$('#area_name_submit').prop('disabled', true);
                	}
                	else
                	{
                		$('#area_name_msg').html('<span style="color:green;"></span>');
                		$('#area_name_submit').prop('disabled', false);
                	}
                }
            });
        });
    });
    $(document).ready(function()
    {
    	$('#country_name_submit').click(function()
    	{
    		var country_name=$('#country_name').val();
    		$.ajax(
    		{
    			url:'<?php echo AURL?>location/add_country',
    			method:"POST",
    			data: {country_name:country_name},
    		})
    		.done(function() {
    			console.log("success");
    			$('#error').html('<div class="alert alert-primary alert-dismissible fade show   m-alert m-alert--square m-alert--air"><button class="close" data-close="alert"></button><span>Country Added!</span></div>');
    			$('#country_name_form').clearForm();
    		})
    		.fail(function() {
    			console.log("error");
    			$('#error').html('<div class="alert alert-danger alert-dismissible fade show   m-alert m-alert--square m-alert--air"><button class="close" data-close="alert"></button><span>Country Already Exists!</span></div>');
    		})
    		.always(function() {
    			console.log("complete");
    		});
    		
    	});
    });
    $(document).ready(function()
    {
    	$('#city_name_submit').click(function()
    	{
    		var city_name=$('#city_name').val();
    		var country_id=$('#country_id').val();
    		$.ajax(
    		{
    			url:'<?php echo AURL?>location/add_city',
    			method:"POST",
    			data: {city_name:city_name,country_id:country_id},
    		})
    		.done(function() {
    			console.log("success");
    			$('#error').html('<div class="alert alert-primary alert-dismissible fade show   m-alert m-alert--square m-alert--air"><button class="close" data-close="alert"></button><span>City Added!</span></div>');
    			$('#city_name_form').clearForm();
    		})
    		.fail(function() {
    			console.log("error");
    			$('#error').html('<div class="alert alert-danger alert-dismissible fade show   m-alert m-alert--square m-alert--air"><button class="close" data-close="alert"></button><span>City Already Exists!</span></div>');
    		})
    		.always(function() {
    			console.log("complete");
    		});
    		
    	});
    });
    $(document).ready(function()
    {
    	$('#area_name_submit').click(function()
    	{
    		var area_name=$('#area_name').val();
    		// var country_id=$('#country_id').val();
    		var city_id=$('#city_id').val();
    		$.ajax(
    		{
    			url:'<?php echo AURL?>location/add_area',
    			method:"POST",
    			data: {area_name:area_name,city_id:city_id},
    		})
    		.done(function() {
    			console.log("success");
    			$('#error').html('<div class="alert alert-primary alert-dismissible fade show   m-alert m-alert--square m-alert--air"><button class="close" data-close="alert"></button><span>Area Added!</span></div>');
    			$('#area_name_form').clearForm();
    		})
    		.fail(function() {
    			console.log("error");
    			$('#error').html('<div class="alert alert-danger alert-dismissible fade show   m-alert m-alert--square m-alert--air"><button class="close" data-close="alert"></button><span>Area Already Exists!</span></div>');
    		})
    		.always(function() {
    			console.log("complete");
    		});
    		
    	});
    });
 //    function get_countries()
 //    {
	//     $(document).ready(function()
	//     {
 //    		$.ajax(
 //    		{
 //    			url:'<?php echo AURL?>location/get_countries',
 //    			method:"POST",
 //    		})
 //    		.done(function(html)
 //    		{
 //    			console.log("success");
 //    			$('#country_id').html(html);
 //    		})
 //    		.fail(function()
 //    		{
 //    			console.log("error");
 //    			alert('No Country Found!');
 //    		})
 //    		.always(function()
 //    		{
 //    			console.log("complete");
 //    		});
	//     });
	// }
	    $(document).ready(function()
	    {
	  //   	$('a[data-toggle=tab]').click(function()
	  //   	{
   //  			alert(this.id);
			// });
			// $( "#2" ).click(function()
			// {
			// 	alert( "Handler for .click() called." );
			// });
	    	$('#2').click(function()
	    	{
	    		$.ajax(
	    		{
	    			url:'<?php echo AURL?>location/get_countries',
	    			method:"POST",
	    		})
	    		.done(function(html)
	    		{
	    			console.log("success");
	    			$('#country_id').html(html);
	    			$('#country_id1').html(html);
	    		})
	    		.fail(function()
	    		{
	    			console.log("error");
	    			alert('No Country Found!');
	    		})
	    		.always(function()
	    		{
	    			console.log("complete");
	    		});
	    	});
		});
		$('#country_name_form').on('keyup keypress', function(e)
		{
		 	var keyCode = e.keyCode || e.which;
		  	if (keyCode === 13)
		  	{ 
		    	e.preventDefault();
		    	return false;
		  	}
		});
		$('#city_name_form').on('keyup keypress', function(e)
		{
		 	var keyCode = e.keyCode || e.which;
		  	if (keyCode === 13)
		  	{ 
		    	e.preventDefault();
		    	return false;
		  	}
		});
		$('#area_name_form').on('keyup keypress', function(e)
		{
		 	var keyCode = e.keyCode || e.which;
		  	if (keyCode === 13)
		  	{ 
		    	e.preventDefault();
		    	return false;
		  	}
		});
</script>