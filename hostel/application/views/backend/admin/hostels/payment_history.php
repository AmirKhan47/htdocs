<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator">
					Payment History
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
								Payment History
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
							Payment History
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
				<ul class="m-portlet__nav">
					<li class="m-portlet__nav-item">
						<label for=""></label>
						<input type="hidden" name="hostel_id" id="hostel_id" value="<?php echo $hostel_id; ?>">
						<select class="form-control" name="year" id="year" required="required">
							<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
							<?php foreach ($years as $key => $value){ ?>
								<option value="<?php echo $value['year']; ?>"><?php echo $value['year']; ?></option>
							<?php } ?>
						</select>
					</li>
					<li class="m-portlet__nav-item">
						<button href="<?php echo AURL?>hostel" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air" onclick="add_hostel_payment('<?php echo $hostel_id ;?>')">
							<span>
								<i class="la la-plus"></i>
								<span>
									Add Hostel Payment
								</span>
							</span>
						</button>
					</li>
				</ul>
			</div>
			</div>
			<div class="m-portlet__body">
				<div class="form-group m-form__group row">
					<!-- <div class="row">
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
			        </div> -->
					<table id="payment_history_table" class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer">
						<thead>
							<tr>
								<th>Month</th>
								<th>Amount</th>
								<!-- <th>Submitted Date</th>
								<th>Submitted By</th> -->
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>January</td>
								<td><?php echo $payment_history['month_1']; ?></td>
							</tr>
							<tr>
								<td>February</td>
								<td><?php echo $payment_history['month_2']; ?></td>
							</tr>
							<tr>
								<td>March</td>
								<td><?php echo $payment_history['month_3']; ?></td>
							</tr>
							<tr>
								<td>April</td>
								<td><?php echo $payment_history['month_4']; ?></td>
							</tr>
							<tr>
								<td>May</td>
								<td><?php echo $payment_history['month_5']; ?></td>
							</tr>
							<tr>
								<td>June</td>
								<td><?php echo $payment_history['month_6']; ?></td>
							</tr>
							<tr>
								<td>July</td>
								<td><?php echo $payment_history['month_7']; ?></td>
							</tr>
							<tr>
								<td>August</td>
								<td><?php echo $payment_history['month_8']; ?></td>
							</tr>
							<tr>
								<td>September</td>
								<td><?php echo $payment_history['month_9']; ?></td>
							</tr>
							<tr>
								<td>October</td>
								<td><?php echo $payment_history['month_10']; ?></td>
							</tr>
							<tr>
								<td>November</td>
								<td><?php echo $payment_history['month_11']; ?></td>
							</tr>
							<tr>
								<td>December</td>
								<td><?php echo $payment_history['month_12']; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!--end::Portlet-->
		<!--begin::Modal-->
		<div class="modal fade" id="add_hostel_payment_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">
							Add Hostel Payment
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">
								&times;
							</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="add_hostel_payment_form">
							<div class="form-group">
								<label for="recipient-name" class="form-control-label">
									Select Date:
								</label>
								<input type="month" class="form-control" name="date" id="date" required="required">
							</div>
							<div class="form-group">
								<label for="recipient-name" class="form-control-label">
									Amount:
								</label>
								<input type="text" class="form-control" name="amount" id="amount" required="required">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" id="close_btn1" data-dismiss="modal">
									Close
								</button>
								<button type="submit" id="add_hostel_payment_submit" class="btn btn-primary">
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
	function add_hostel_payment(hostel_id)
	{
		$('#add_hostel_payment_modal').modal();
		$('#add_hostel_payment_submit').click(function(event)
		{
			var date=$('#date').val();
			var amount=$('#amount').val();
			event.preventDefault();
			$.ajax(
			{
				url: '<?php echo AURL.'hostel/add_hostel_payment/'; ?>'+hostel_id+'',
				method: 'POST',
				data: {date:date,amount:amount},
			})
			.done(function()
			{
				console.log("success");
				$( "#errors" ).html('<span class="alert alert-success alert-dismissible"><b>Success!</b>Hostel Payment Added</span>');
				$("#add_hostel_payment_form")[0].reset();
			})
			.fail(function() {
				console.log("error");
				$( "#errors" ).html('<span class="alert alert-warning alert-dismissible"><b>Failed!</b>Failed to Add Hostel Payment</span>');
			})
			.always(function()
			{
				console.log("complete");
			});
		});		
	}
	$(document).ready(function()
	{
// 		$('select').on('change', function() {
//   alert( this.value );
// });
		$('#year').change(function()
		{
			var hostel_id=$('#hostel_id').val();
			var year=$('#year').val();
			$.ajax(
			{
				url: '<?php echo AURL.'hostel/payment_history_ajax_table/'; ?>'+hostel_id+'',
				method: 'POST',
				data: {year:year},
			})
			.done(function(html)
			{
				$('#payment_history_table').html(html);
				console.log("success");
			})
			.fail(function()
			{
				console.log("error");
			})
			.always(function()
			{
				console.log("complete");
			});
		});
		$('#close_btn1').click(function()
  		{
  			$('#errors').html('');
  			location.reload();
  		});
	});
</script>