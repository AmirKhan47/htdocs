<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<title>Headers</title>
</head>
<body>
	<div class="container">
		<h1>List</h1>
		<?php
            if ($this->session->flashdata('error_message')) 
            {
        ?>
                <div class="alert alert-danger alert-dismissible fade show m-alert m-alert--square m-alert--air">
                    <button class="close" data-close="alert"></button>
                    <span><?php echo $this->session->flashdata('error_message'); ?></span>
                </div>
        <?php
            }
            if ($this->session->flashdata('ok_message')) 
            {
        ?>
                <div class="alert alert-primary alert-dismissible fade show m-alert m-alert--square m-alert--air">
                    <button class="close" data-close="alert"></button>
                    <span><?php echo $this->session->flashdata('ok_message'); ?></span>
                </div>
        <?php
            }
        ?>
		<h3><button class="btn btn-info" data-toggle="modal" data-target="#add_modal">Add New</button></h3>
		<!-- <h3><a class="btn btn-info" href="<?php echo URL; ?>welcome/add_header">Add New</a></h3> -->
		<table id="contact_table" class="table table-sm table-hover">
			<thead>
				<tr>
					<!-- <th>Image</th> -->
					<th>First Name</th>
					<th>Last Name</th>
					<th>Company</th>
					<th>Job Title</th>
					<th>Category</th>
					<th>Email</th>
					<th>Bussiness Phone</th>
					<th>Home Phone</th>
					<th>Date Created</th>
					<th>Actiom</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>

	<!-- Large modal -->
	<div class="modal fade bd-example-modal-xs" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
		   	<div class="modal-content">
		    	<div class="container">
		    		<h1>Lead Generation</h1>
					<form id="add_form" method="POST" enctype="multipart/form-data">
						<div class="form-group row">
							<div class="col">
								<img id="image" src="#" alt="" style="max-height: 100px;">
								<label for="">Image</label><input type="file" class="form-control-file" name="image_name" id="image_name" accept="image/*" required="required">
							</div>
							<div class="col">
								<label for="">First Name</label><input type="text" class="form-control" name="first_name" required="required">
							</div>
						</div>

						<div class="form-group row">
							<div class="col">
								<label for="">Last Name</label><input type="text" class="form-control" name="last_name" required="required">
							</div>
							<div class="col">
								<label for="">Company</label><input type="text" class="form-control" name="company" required="required">
							</div>
						</div>

						<div class="form-group row">
							<div class="col">
								<label for="">Job Title</label><input type="text" class="form-control" name="job_title" required="required">
							</div>
							<div class="col">
								<label for="">Category</label><input type="text" class="form-control" name="category" required="required">
							</div>
						</div>

						<div class="form-group row">
							<div class="col">
								<label for="">Email</label><input type="text" class="form-control" name="email" required="required">
							</div>
							<div class="col">
								<label for="">Bussiness Phone</label><input type="text" class="form-control" name="bussiness_phone" required="required">
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col">
								<label for="">Home Phone</label><input type="text" class="form-control" name="home_phone" required="required">
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

	<!--MODAL DELETE-->
    <form>
        <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Lead</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                   <strong>Are you sure to delete this record?</strong>
              </div>
              <div class="modal-footer">
                <input type="hidden" name="product_code_delete" id="product_code_delete" class="form-control">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" type="submit" id="delete_btn" class="btn btn-primary">Yes</button>
              </div>
            </div>
          </div>
        </div>
    </form>
    <!--END MODAL DELETE-->

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
		$(document).ready(function()
		{
		    var ltable = $('#contact_table');
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
		            "url": '<?php echo URL;?>welcome/get_list',
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
		        $('#contact_table').DataTable().column( i ).search(
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
	       		// form=$("#add_form").serialize();
	       		// var formDataSerialized = $('#add_form').serialize();
	       		var form = $('#add_form')[0]; // standard javascript object here
    			var formData = new FormData( $('#add_form')[0]);
  				// console.log(formDataSerialized);
  				// console.log('Hello');
  				// return;
	       		// $('#form').submit(function(e)
		     	$.ajax(
		     	{
			       	type:'POST',
			       	url:'<?php echo URL;?>welcome/add',
			       	// data:formDataSerialized,
			       	// contentType: 'multipart/form-data',
			       	cache: false,
			        contentType: false,
			        processData: false,
			        data: formData,
			       	success: function(data)
			    	{
			    		if (data==1)
			    		{
				           	alert('Successful!'); //Unterminated String literal fixed
				        	$('#alert').html('<div class="alert alert-primary alert-dismissible fade show   m-alert m-alert--square m-alert--air"><button class="close" data-close="alert"></button><span>Record Added!</span></div>');
	    					// $('#add_form').clearForm();
	    					$("#add_form")[0].reset();
	    					// $('#lead_generation_table').ajax.reload();
	    					var myDataTable = $('#contact_table').DataTable(
	    					{
								//Rest code
							});
							myDataTable.ajax.reload();
						}
						else
						{
							alert(data); //Unterminated String literal fixed
				        	$('#alert').html('<div class="alert alert-danger alert-dismissible fade show  m-alert m-alert--square m-alert--air"><button class="close" data-close="alert"></button><span> Image type Not Allowed!</span></div>');
						}
			    	}
		     	});
	     		event.preventDefault();
	     		return false;  //stop the actual form post !important!
	  		});
		});
		// function update(daily_lead_id)
		// {
		// 	$('#update_lead_modal').modal();
		// 	$.ajax(
		// 	{
		// 		url: '<?php echo site_url('welcome/edit/')?>'+daily_lead_id,
		// 		method: 'POST',
		// 		dataType: 'json',
		// 	})
		// 	.done(function(data)
		// 	{
		// 		$('#daily_lead_id').val(data.daily_lead_id);
		// 		$('#date1').val(data.date);
		// 		$('#date2').val(data.date);
		// 		$('#lead_origin1').val(data.lead_origin);
		// 		$('#owner_name1').val(data.owner_name);
		// 		$('#lead_area1').val(data.lead_area);
		// 		$('#city1').val(data.city);
		// 		$('#query1').val(data.query);
		// 		$('#city_name1').val(data.city_name);
		// 		$('#client_name1').val(data.client_name);
		// 		$('#contact1').val(data.contact);
		// 		$('#note1').val(data.note);
		// 		console.log("done");
		// 	})
		// 	.fail(function()
		// 	{
		// 		console.log("error");
		// 	})
		// 	.always(function()
		// 	{
		// 		console.log("complete");
		// 	});
		// }
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
		// $(document).ready(function()
		// {
		// 	$('#save_btn_update').on('click',function()
		// 	{
	 //            var form = $('#update_form').serialize()
	 //            $.ajax(
	 //            {
	 //                type : "POST",
	 //                url  : "<?php echo site_url('welcome/update')?>",
	 //                dataType : "JSON",
	 //                data : form,
	 //                success: function(data)
	 //                {
	 //                	alert('Successful!'); //Unterminated String literal fixed
		// 	        	$('#alert').html('<div class="alert alert-primary alert-dismissible fade show   m-alert m-alert--square m-alert--air"><button class="close" data-close="alert"></button><span>Lead Updated!</span></div>');
		// 	        	// $('#lead_generation_table').ajax.reload();
		// 				var myDataTable = $('#lead_generation_table').DataTable(
		// 				{
		// 					//Rest code
		// 				});
		// 				myDataTable.ajax.reload();
		//             }
		//         });
  //       		return false;
  //   		});
		// });
		// Delete Lead
		function delete_lead(id)
		{
			$('#delete_modal').modal();
			$('#delete_btn').on('click',function()
			{
	            $.ajax(
	            {
	                type : "POST",
	                url  : "<?php echo URL;?>welcome/delete/"+id,
	                dataType : "JSON",
	                success: function(data)
	                {
	                	 $('#delete_modal').modal('toggle');
	                	// alert('Successful!'); //Unterminated String literal fixed
			        	// $('#alert').html('<div class="alert alert-primary alert-dismissible fade show m-alert m-alert--square m-alert--air"><button class="close" data-close="alert"></button><span>Record Deleted!</span></div>');
			        	// $('#lead_generation_table').ajax.reload();
						var myDataTable = $('#contact_table').DataTable(
						{
							//Rest code
						});
						myDataTable.ajax.reload();
		            }
		        });
    		});
		}
	</script>

	<script>
		function readURL(input)
		{
  			if (input.files && input.files[0])
  			{
    			var reader = new FileReader();
    			reader.onload = function(e)
    			{
      				$('#image').attr('src', e.target.result);
    			}
    			reader.readAsDataURL(input.files[0]);
  			}
		}
		$("#image_name").change(function()
		{
		  readURL(this);
		});
	</script>

</body>
</html>