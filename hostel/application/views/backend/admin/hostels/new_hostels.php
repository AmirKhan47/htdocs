<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator">
					New Hostels
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
								New Hostels
							</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- END: Subheader -->
	<div class="m-content">
		<!--begin::Portlet-->
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
		<div class="m-portlet">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							New Hostels
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<a href="<?php echo AURL?>hostel" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
								<span>
									<i class="la la-plus"></i>
									<span>
										Add Hostel
									</span>
								</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="m-portlet__body">
				<div class="form-group m-form__group row">
					<div class="row">
			            <div class="col-md-2 cwd form-group" >
			                <input type="text" class="form-control column_filter" data-column="0" name="hostel_name"  id="id0" placeholder="Hostel Name">
			            </div>
			            <div class="col-md-2 cwd form-group">
			                <input type="text" class="form-control column_filter" data-column="2" name="contact"  id="id2" placeholder="Contact">
			            </div>
			            <div class="col-md-2 cwd form-group">  
			                <input type="text" class="form-control column_filter" data-column="3" name="category" id="id3" placeholder="Category">
			            </div>
			            <div class="col-md-2 cwd form-group">   
			                <input type="text" class="form-control column_filter" data-column="4" name="rent1" id="id4" placeholder="Rent 1">
			            </div>
			            <div class="col-md-2 cwd form-group"> 
			                <input type="text" class="form-control column_filter" data-column="5" name="rent2" id="id5" placeholder="Rent 2">
			            </div>
			            <div class="col-md-2 cwd form-group"> 
			                <input type="text" class="form-control column_filter" data-column="6" name="area" id="id6" placeholder="Area">
			            </div>
			        </div>
			        <div class="table-responsive">
						<table id="new_hostels_datatable" class="table table-sm table-striped- table-bordered table-hover table-checkable dataTable no-footer">
							<thead>
								<tr>
									<!-- <th>#</th> -->
									<th>Hostel Name</th>
									<th>Owner Name</th>
									<th>Contact</th>
									<th>Category</th>
									<th>1 Person Room Rent</th>
									<th>Shared Room Rent</th>
									<th>Area</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!--end::Portlet-->
		<!--begin::Modal-->
		<div class="modal fade" id="hostel_detail_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">
							Hostel Details
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">
								&times;
							</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="tab-content">
					<div class="tab-pane active" id="m_user_profile_tab_1">
						<form class="m-form m-form--fit m-form--label-align-right" action="" method="POST" enctype="multipart/form-data">
								<div class="row table-bordered">
									<div class="col-4 ml-4">
										<label for="example-text-input" class="font-weight-bold">Hostel Status: <span id="status_name"></span></label>
									</div>
									<div class="col-3">
										<label for="example-text-input" class="font-weight-bold">ID: <span id="hostel_id"></span></label>
									</div>
									<div class="col-4">
										<label for="example-text-input" class="font-weight-bold">Hostel Timings: <span id="hostel_timings"></span></label>
									</div>
								</div>
								<div class="row">
									<div class="col-3 ml-4">
										<img id="hostel_logo" src="<?php echo Admin_Uploads; ?>hostel_logos/" width="150" height="100" alt="Hostel Logo">
									</div>
									<div class="col-8">
										<table class="table-sm table-bordered m-table table-responsive">
											<tbody>
												<tr>
													<td class="font-weight-bold">Hostel Name</td>
													<td id="hostel_name"></td>
													<td class="font-weight-bold">Shared Room Rent</td>
													<td id="shared_room_rent"></td>
												</tr>
												<tr>
													<td class="font-weight-bold">Owner Name</td>
													<td id="owner_name"></td>
													<td class="font-weight-bold">Address</td>
													<td id="address"></td>
												</tr>
												<tr>
													<td class="font-weight-bold">Contact</td>
													<td id="contact"></td>
													<td class="font-weight-bold">Country</td>
													<td id="country_name"></td>
												</tr>
												<tr>
													<td class="font-weight-bold">Category</td>
													<td id="category_name"></td>
													<td class="font-weight-bold">City</td>
													<td id="city_name"></td>
												</tr>
												<tr>
													<td class="font-weight-bold">Type</td>
													<td id="type_name"></td>
													<td class="font-weight-bold">Area</td>
													<td id="area_name"></td>
												</tr>
												<tr>
													<td class="font-weight-bold">Property Size</td>
													<td id="property_size"></td>
													<td class="font-weight-bold">Google Location</td>
													<td id="google_location"></td>
												</tr>
												<tr>
													<td class="font-weight-bold">Total No of Rooms</td>
													<td id="total_rooms"></td>
													<td class="font-weight-bold">Website Link</td>
													<td id="website_link"></td>
												</tr>
												<tr>
													<td class="font-weight-bold">Single Person Room Rent</td>
													<td id="single_person_room_rent"></td>
													<td class="font-weight-bold">Facebook Page Link</td>
													<td id="facebook_link"></td>
												</tr>
												<tr>
													<td colspan="2" class="font-weight-bold">Hostel Description</td>
													<td colspan="2" id="description"></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="row mt-3">
									<div class="col-11 ml-4 table-bordered">
										<div class="m-checkbox-inline">
											<div class="row">
												<label class="font-weight-bold table-bordered">
													Facilities
												</label>
											</div>
											<div class="rom-sm" id="facilities">
												<!-- <?php
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
												?> -->
														<!-- <label class="m-checkbox m-checkbox--check-bold m-checkbox--state-brand">				<input type="checkbox" name="hostel_facilities[]" value="<?php echo $value['facility_id']; ?>" <?php echo $checked; ?> disabled>
															<?php echo $value['facility_name']; ?>
															<span></span>
														</label>  -->
												<!-- <?php
													}
												?> -->
											</div>
										</div>
									</div>
								</div>
							<label for="example-text-input" class="col-2 col-form-label font-weight-bold">
								Hostel Pictures
							</label>
							<div class="row-sm" id="hostel_pictures">
								<!-- <?php foreach ($hostel_pictures as $key => $value) { ?>
									<img src="<?php echo Admin_Uploads.'hostel_pictures/'.$value['picture_name']; ?>" width="100" height="100" alt="Hostel Pictures">
								<?php } ?> -->
							</div>
						</form>
					</div>
				</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" id="close_btn" data-dismiss="modal">
							Close
						</button>
					</div>
				</div>
			</div>
		</div>
		<!--end::Modal-->
		<!--begin::Modal-->
		<div class="modal fade" id="status_change_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">
							Hostel Status Change
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">
								&times;
							</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="status_change_form">
							<div class="form-group">
								<label for="recipient-name" class="form-control-label">
									Select Status:
								</label>
								<?php $status_id = '<span id="modal_status_id"></span>' ?>
								<select class="form-control" name="status_id" id="status_id" required="required">
									<?php foreach ($statuses as $key => $value) { ?>
										<option value="<?php echo $value['status_id']; ?>" <?php if(1==$value['status_id']) { echo 'selected'; } ?>><?php echo $value['status_name']; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" id="close_btn1" data-dismiss="modal">
									Close
								</button>
								<button type="button" id="status_change_btn" class="btn btn-primary">
									Save Changes
								</button>
							</div>
							<div id="errors"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!--end::Modal-->
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	function hostel_detail(hostel_id='',last_hostel_status_id='')
	{
		$('#hostel_detail_modal').modal();
		$.ajax(
		{
			url: '<?php echo AURL.'hostel/hostel_detail/'; ?>'+hostel_id+'/'+last_hostel_status_id+'',
			method: 'POST',
			dataType: 'json',
		})
		.done(function(data)
		{
			// alert(hostel.hostel_id);
			console.log("success");
			// console.log(data.hostel);
			$('#hostel_id').text(data.hostel.hostel_id);
			$('#hostel_name').text(data.hostel.hostel_name);
			$('#owner_name').text(data.hostel.owner_name);
			$('#contact').text(data.hostel.contact);
			$('#description').text(data.hostel.description);
			$('#category_name').text(data.hostel.category_name);
			$('#type_name').text(data.hostel.type_name);
			$('#property_size').text(data.hostel.property_size);
			$('#total_rooms').text(data.hostel.total_rooms);
			$('#website_link').text(data.hostel.website_link);
			$('#facebook_link').text(data.hostel.facebook_link);
			$('#hostel_timings').text(data.hostel.hostel_timings);
			$('#single_person_room_rent').text(data.hostel.single_person_room_rent);
			$('#shared_room_rent').text(data.hostel.shared_room_rent);
			$('#address').text(data.hostel.address);
			$('#country_name').text(data.hostel.country_name);
			$('#city_name').text(data.hostel.city_name);
			$('#area_name').text(data.hostel.area_name);
			$('#google_location').text(data.hostel.google_location);
			$('#status_name').text(data.hostel.status_name);
			var hostel_logo=data.hostel.hostel_logo;
			$("#hostel_logo").attr("src","<?php echo Admin_Uploads; ?>hostel_logos/"+hostel_logo);
			// alert(data.hostels_facilities);
			// console.log(data.hostels_facilities[0][hostel_facility_id]);
			// console.log(data.hostels_facilities[1]);
			// console.log(data.hostels_facilities[2]);
			// var facilities=data.hostels_facilities;
			// alert(data.hostel.hostels_facilities.hostel_facility_id);
			// data.hostels_facilities.each(function(index, val)
			// {
			// 	console.log('<option value="' + val['facility_id'].val() + '">' + val['facility_name'].val() + '</option>');
			// });
			// alert('hello');
			// $.each(data.hostel_facilities, function( key, value )
			// {
  				// alert( key + ": " + value );
  				// console.log(key);
			// });
			var facility_id = [],
  			facility_name = [];
  			var facilities=$('#facilities');
  			$(data.hostels_facilities).each(function(index, el)
  			{
  				var checkbox=$('<label>',
  				{
  					class:'m-checkbox m-checkbox--check-bold m-checkbox--state-brand',
  					id:el.facility_id
  				}).html(
  				[
  					$('<input>',
  					{
  						type:'checkbox',
  						name:el.facility_name+'_'+el.facility_id,
  						id:el.facility_name+'_'+el.facility_id,
  						checked:'checked',
  						value:el.facility_id

  					}).prop(
  					{
  						'disabled':true,
  						// 'checked': true,
  					}).css(
  					{
  						'display': 'inline !important',
  					}),
  					el.facility_name,
  					$('<span>')
  				]);
  				facilities.append(checkbox);	
  			});
  			var picture_name=[];
  			$(data.hostel_pictures).each(function(index, value)
  			{
  				var images=$('<img class="ml-1" src="<?php echo Admin_Uploads.'hostel_pictures/'?>'+value.picture_name+'" width="100" height="100" alt="Hostel Pictures">');
  				console.log(value.picture_name);
  				$('#hostel_pictures').append(images);
  			});

		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}
	$(document).ready(function()
	{
  		$('#close_btn').click(function()
  		{
  			document.getElementById("facilities").innerHTML = "";
  		});
  		$('#close_btn1').click(function()
  		{
  			$('#errors').html('');
  			location.reload();
  		});
	})
	function status_change(hostel_id,status_id)
	{
		$('#modal_status_id').html(status_id);
		$('#status_change_modal').modal();
		$('#status_change_btn').click(function(event)
		{
			var status_id=$('select[name=status_id]').val();
			event.preventDefault();
			$.ajax(
			{
				url: '<?php echo AURL.'hostel/status_change/'; ?>'+hostel_id+'',
				method: 'POST',
				data: {status_id:status_id},
			})
			.done(function()
			{
				console.log("success");
				$( "#errors" ).html('<span class="alert alert-success alert-dismissible"><b>Success!</b>Hostel Status Changed</span>');
				$("#status_change_form")[0].reset();
			})
			.fail(function() {
				console.log("error");
				$( "#errors" ).html('<span class="alert alert-warning alert-dismissible"><b>Failed!</b>Failed to Change Status</span>');
			})
			.always(function()
			{
				console.log("complete");
			});
		});		
	}
</script>