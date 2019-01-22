<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lead Table</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<h1>Lead Generation Table</h1>
				<div class="offset-5 mt-3 col-2"><button type="button" data-toggle="modal" data-target="#add_lead_modal" class="btn btn-primary btn-sm">Add Lead</button></div>
		</div>
		<!-- <div class="table-responsive"> -->
			<!-- <select name="date" class="form-group">
				<option value="">Choose Date</option>
				<option value="">1</option>
				<option value="">2</option>
				<option value="">3</option>
			</select> -->
			<table id="table" class="table table-sm table-hover table-bordered">
				<thead>
					<tr>
						<th>Date</th>
						<th>Lead Origin</th>
						<th>Lead Area</th>
						<th>City</th>
						<th>Query</th>
						<th>Client Name</th>
						<th>Contact</th>
						<th>Note</th>
						<th>Posted</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		<!-- </div> -->
	</div>
	<!-- Large modal -->
	<div class="modal fade bd-example-modal-xl" id="add_lead_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-xl">
	    <div class="modal-content">
	    	<div class="container">
	    		<h1>Lead Generation</h1>
				<form id="add_form">
					<div class="row">
						<div class="form-group col-6">
					    	<label for="exampleInputEmail1">Date</label>
					    	<input type="date" class="form-control" name="date" id="date" aria-describedby="emailHelp" placeholder="" required="required">
					  	</div>
					  	<div class="form-group col-6">
					    	<label for="exampleInputPassword1">Lead Origin</label>
					    	<select name="lead_origin" id="lead_origin" class="form-control" required="required">
					    		<option value="Facebook">Facebook</option>
					    		<option value="Instagram">Instagram</option>
					    		<option value="Newspaper">Newspaper</option>
					    		<option value="Pamphlet">Pamphlet</option>
					    		<option value="Customer Referral">Customer Referral</option>
					    	</select>
					  	</div>
					</div>
					<div class="row">
					  	<div class="form-group col-6">
					    	<label for="exampleInputPassword1">Lead Area</label>
					    	<input type="text" class="form-control" name="lead_area" id="lead_area" placeholder="" required="required">
					  	</div>
					  	<div class="form-group col-6">
					    	<label for="exampleInputPassword1">City</label>
					    	<select name="city" id="city" class="form-control" required="required">
					    		<option value="Rawalpindi">Rawalpindi</option>
					    		<option value="Islamabad">Islamabad</option>
					    		<option value="Lahore">Lahore</option>
					    		<option value="Karachi">Karachi</option>
					    		<option value="Peshawar">Peshawar</option>
					    	</select>
					  	</div>
					</div>
					<div class="row">
					  	<div class="form-group col-6">
					    	<label for="exampleInputPassword1">Query</label>
					    	<input type="text" class="form-control" name="query" id="query" placeholder="" required="required">
					  	</div>
					  	<div class="form-group col-6">
					    	<label for="exampleInputPassword1">Client Name</label>
					    	<input type="text" class="form-control" name="client_name" id="client_name" placeholder="" required="required">
					  	</div>
					</div>
					<div class="row">
					  	<div class="form-group col-6">
					    	<label for="exampleInputPassword1">Contact</label>
					    	<input type="text" class="form-control" name="contact" id="contact" placeholder="" required="required">
					  	</div>
					  	<div class="form-group col-6">
					    	<label for="exampleInputPassword1">Note</label>
					    	<textarea name="note" id="note" rows="1" class="form-control"></textarea>
					  	</div>
					</div>
					<input type="submit" id="submit-hidden" style="display: none">
					<div id="alert"></div>
					<div class="row mb-3">
					  	<div class="col-6">
					  		<button type="button" id="add_btn" class="btn btn-primary">Submit</button>
					  	</div>
					</div>
				</form>
	    	</div>
	    </div>
	  </div>
	</div>
	<!-- Large modal -->
	<div class="modal fade bd-example-modal-xl" id="lead_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-xl">
	    <div class="modal-content">
	    	<div class="container">
	    		<h1>Lead Generation</h1>
				<form id="update_form">
					<input type="hidden" name="daily_lead_id" id="daily_lead_id" value="">
					<div class="row">
						<div class="form-group col-6">
					    	<label for="exampleInputEmail1">Date</label>
					    	<input type="date" class="form-control" name="date" id="date" aria-describedby="emailHelp" placeholder="" required="required">
					  	</div>
					  	<div class="form-group col-6">
					    	<label for="exampleInputPassword1">Lead Origin</label>
					    	<select name="lead_origin" id="lead_origin" class="form-control" required="required">
					    		<option value="Facebook">Facebook</option>
					    		<option value="Instagram">Instagram</option>
					    		<option value="Newspaper">Newspaper</option>
					    		<option value="Pamphlet">Pamphlet</option>
					    		<option value="Customer Referral">Customer Referral</option>
					    	</select>
					  	</div>
					</div>
					<div class="row">
					  	<div class="form-group col-6">
					    	<label for="exampleInputPassword1">Lead Area</label>
					    	<input type="text" class="form-control" name="lead_area" id="lead_area" placeholder="" required="required">
					  	</div>
					  	<div class="form-group col-6">
					    	<label for="exampleInputPassword1">City</label>
					    	<select name="city" id="city" class="form-control" required="required">
					    		<option value="Rawalpindi">Rawalpindi</option>
					    		<option value="Islamabad">Islamabad</option>
					    		<option value="Lahore">Lahore</option>
					    		<option value="Karachi">Karachi</option>
					    		<option value="Peshawar">Peshawar</option>
					    	</select>
					  	</div>
					</div>
					<div class="row">
					  	<div class="form-group col-6">
					    	<label for="exampleInputPassword1">Query</label>
					    	<input type="text" class="form-control" name="query" id="query" placeholder="" required="required">
					  	</div>
					  	<div class="form-group col-6">
					    	<label for="exampleInputPassword1">Client Name</label>
					    	<input type="text" class="form-control" name="client_name" id="client_name" placeholder="" required="required">
					  	</div>
					</div>
					<div class="row">
					  	<div class="form-group col-6">
					    	<label for="exampleInputPassword1">Contact</label>
					    	<input type="text" class="form-control" name="contact" id="contact" placeholder="" required="required">
					  	</div>
					  	<div class="form-group col-6">
					    	<label for="exampleInputPassword1">Note</label>
					    	<textarea name="note" id="note" rows="1" class="form-control"></textarea>
					  	</div>
					</div>
					<input type="submit" id="submit-hidden" style="display: none">
					<div id="alert"></div>
					<div class="row mb-3">
					  	<div class="col-6">
					  		<button type="button" id="save_btn_update" class="btn btn-primary">Update</button>
					  	</div>
					</div>
				</form>
	    	</div>
	    </div>
	  </div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function()
		{
		    var ltable = $('#table');
		    var leadtable=ltable.DataTable(
		    {
		        "pageLength": 10,
		        "bInfo": true,
		        "fnDrawCallback": function(oSettings) 
		        {
		            if (oSettings._iDisplayLength >= oSettings.fnRecordsDisplay()) 
		            {
		                $(oSettings.nTableWrapper).find('.dataTables_paginate').show();
		            }
		        },
		        "processing": true, //Feature control the processing indicator.
		        "serverSide": true, //Feature control DataTables' server-side processing mode.
		        "order": [], //Initial no order.
		        // Load data for the table's content from an Ajax source
		        "ajax": 
		        {
		            "url": 'http://localhost/CodeIgniter-3.1.10/welcome/get_list_of_lead',
		            "type": "POST"
		        },
		        "oLanguage": 
		            {
		                sProcessing: '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
		            },
		        //Set column definition initialisation properties.
		        // "columnDefs": [ 
		            // { "targets": [4],"orderable": false,},
		            // { "targets": [5],"orderable": false,},
		            // { "targets": [6],"orderable": false,},
		            // { "targets": [7],"orderable": false,},
		        // ],
		        // "fixedColumns":   true,
		        // "scrollY":        "400px",
		        // "scrollX":        true,
		        // "scrollCollapse": true,
		        // "paging":         false,
		    });
		    //////////Advance search/////////////
		    function filterColumn ( i )
		    {
		        $('#list_of_admin_datatable').DataTable().column( i ).search(
		            $('#id'+i).val()
		        ).draw();
		    }
		    $(document).ready(function()
		    {
		        $('input.column_filter').on( 'keyup', function ()
		        {
		            filterColumn( $(this).attr('data-column') );
		        });
		    });
		    $.fn.dataTable.ext.errMode = 'none';
		});
		$(document).ready(function()
		{
			$('#add_btn').click(function(event)
			{
				if(!$("#add_form")[0].checkValidity())
	  			{
					// If the form is invalid, submit it. The form won't actually submit;
					// this will just cause the browser to display the native HTML5 error messages.
					$("#add_form").find("#submit-hidden").click();
					return false;
				}
	       		form=$("#add_form").serialize();
		     	$.ajax(
		     	{
			       type:'POST',
			       url:'<?php echo site_url('welcome/add')?>',
			       data:form,
			       success: function(data)
			    	{
			           	alert('Successful!'); //Unterminated String literal fixed
			        	$('#alert').html('<div class="alert alert-primary alert-dismissible fade show   m-alert m-alert--square m-alert--air"><button class="close" data-close="alert"></button><span>Lead Added!</span></div>');
    					// $('#add_form').clearForm();
    					$("#add_form")[0].reset();
			    	}

		     	});
	     		event.preventDefault();
	     		return false;  //stop the actual form post !important!
	  		});
		});
		function update(daily_lead_id)
		{
			$('#lead_modal').modal();
			$.ajax(
			{
				url: 'http://localhost/CodeIgniter-3.1.10/welcome/edit/'+daily_lead_id,
				method: 'POST',
				dataType: 'json',
			})
			.done(function(data)
			{
				$('#daily_lead_id').val(data.daily_lead_id);
				$('#date').val(data.date);
				$('#lead_origin').val(data.lead_origin);
				$('#owner_name').val(data.owner_name);
				$('#lead_area').val(data.lead_area);
				$('#city').val(data.city);
				$('#query').val(data.query);
				$('#city_name').val(data.city_name);
				$('#client_name').val(data.client_name);
				$('#contact').val(data.contact);
				$('#note').val(data.note);
				console.log("done");
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
		// $(document).ready(function()
		// {
		// 	$('#add_btn').on('click',function()
		// 	{
	 //            var form = $('#add_form').serialize()
	 //            $.ajax(
	 //            {
	 //                type : "POST",
	 //                url  : "<?php echo site_url('welcome/add')?>",
	 //                dataType : "JSON",
	 //                data : form,
	 //                success: function(data)
	 //                {
	 //                	alert('Successful!'); //Unterminated String literal fixed
		// 	        	$('#alert').html('<div class="alert alert-primary alert-dismissible fade show   m-alert m-alert--square m-alert--air"><button class="close" data-close="alert"></button><span>Lead Added!</span></div>');
  //           		}
  //       		});
  //       		return false;
  //   		});
		// });
		$(document).ready(function()
		{
			$('#save_btn_update').on('click',function()
			{
	            var form = $('#update_form').serialize()
	            $.ajax(
	            {
	                type : "POST",
	                url  : "<?php echo site_url('welcome/update')?>",
	                dataType : "JSON",
	                data : form,
	                success: function(data)
	                {
	                	alert('Successful!'); //Unterminated String literal fixed
			        	$('#alert').html('<div class="alert alert-primary alert-dismissible fade show   m-alert m-alert--square m-alert--air"><button class="close" data-close="alert"></button><span>Lead Updated!</span></div>');
            		}
        		});
        		return false;
    		});
		});
	</script>
</body>
</html>