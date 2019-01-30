<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lead Table</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <style type="text/css">
    	/*text[text-anchor="middle"]*/
    	/*{
  			display:none;
		}*/
    </style>
</head>
<body>
	<div class="container">
		<div class="row">
			<h1>Lead Graph</h1>
		</div>
		<div class="row">
			<div id="bar_chart" style="height: 250px;"></div>
		</div>
		<div class="row">
			<h1>Lead Generation Table</h1>
				<div class="offset-5 mt-3 col-2"><button type="button" data-toggle="modal" data-target="#add_lead_modal" class="btn btn-primary btn-sm">Add Lead</button></div>
		</div>
		<div class="row">
            <div class="col-2 form-group">
                <input type="text" class="form-control column_filter" data-column="0" name="" id="id0" placeholder="2019-12-31">
            </div>
        </div>
        <div class="row">
			<table id="lead_generation_table" class="table table-sm table-hover table-bordered">
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
		</div>
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
	<div class="modal fade bd-example-modal-xl" id="update_lead_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-xl">
	    <div class="modal-content">
	    	<div class="container">
	    		<h1>Lead Generation</h1>
				<form id="update_form">
					<input type="hidden" name="daily_lead_id" id="daily_lead_id" value="">
					<input type="hidden" name="old_date" id="date2" value="">
					<div class="row">
						<div class="form-group col-6">
					    	<label for="exampleInputEmail1">Date</label>
					    	<input type="date" class="form-control" name="date" id="date1" aria-describedby="emailHelp" placeholder="" required="required">
					  	</div>
					  	<div class="form-group col-6">
					    	<label for="exampleInputPassword1">Lead Origin</label>
					    	<select name="lead_origin" id="lead_origin1" class="form-control" required="required">
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
					    	<input type="text" class="form-control" name="lead_area" id="lead_area1" placeholder="" required="required">
					  	</div>
					  	<div class="form-group col-6">
					    	<label for="exampleInputPassword1">City</label>
					    	<select name="city" id="city1" class="form-control" required="required">
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
					    	<input type="text" class="form-control" name="query" id="query1" placeholder="" required="required">
					  	</div>
					  	<div class="form-group col-6">
					    	<label for="exampleInputPassword1">Client Name</label>
					    	<input type="text" class="form-control" name="client_name" id="client_name1" placeholder="" required="required">
					  	</div>
					</div>
					<div class="row">
					  	<div class="form-group col-6">
					    	<label for="exampleInputPassword1">Contact</label>
					    	<input type="text" class="form-control" name="contact" id="contact1" placeholder="" required="required">
					  	</div>
					  	<div class="form-group col-6">
					    	<label for="exampleInputPassword1">Note</label>
					    	<textarea name="note" id="note1" rows="1" class="form-control"></textarea>
					  	</div>
					</div>
					<input type="submit" id="submit-hidden1" style="display: none">
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
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript">
    	new Morris.Bar(
        {
            // ID of the element in which to draw the chart.
            element: 'bar_chart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: <?php echo $data;?>,
            // data: [
            //     { period: '2019-01-01', line: 1},
            //     { period: '2019-01-02', line: 2},
            //     { period: '2019-01-03', line: 3},
            //     { period: '2019-01-04', line: 4},
            //     { period: '2019-01-05', line: 5},
            //     { period: '2019-01-06', line: 6},
            //     { period: '2019-01-07', line: 7},
            //     { period: '2019-01-08', line: 8},
            //     { period: '2019-01-09', line: 9},
            //     { period: '2019-01-10', line: 5},
            //     { period: '2019-01-11', line: 11},
            //     { period: '2019-01-12', line: 12},
            //     { period: '2019-01-13', line: 13},
            //     { period: '2019-01-14', line: 14},
            //     { period: '2019-01-15', line: 15},
            //     { period: '2019-01-16', line: 30},
            //     { period: '2019-01-17', line: 17},
            //     { period: '2019-01-18', line: 18},
            //     { period: '2019-01-19', line: 19},
            //     { period: '2019-01-20', line: 20},
            //     { period: '2019-01-21', line: 21},
            //     { period: '2019-01-22', line: 22},
            //     { period: '2019-01-23', line: 23},
            //     { period: '2019-01-24', line: 24},
            //     { period: '2019-01-25', line: 25},
            //     { period: '2019-01-26', line: 26},
            //     { period: '2019-01-27', line: 27},
            //     { period: '2019-01-28', line: 28},
            //     { period: '2019-01-29', line: 29},
            //     { period: '2019-01-30', line: 30},
            // ],
            // The name of the data record attribute that contains x-values.
            xkey: 'date',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['count'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Total No. of Lead'],
            // xLabels: 'day',
            // xLabelAngle: 30,
            fillOpacity: 0.6,
            hideHover: 'auto',
            behaveLikeLine: true,
            resize: true,
            lineWidth: '10px',
            pointFillColors:['#ffffff'],
            pointStrokeColors: ['black'],
            lineColors:['black','red','blue']
        });
    </script>
	<script type="text/javascript">
		$(document).ready(function()
		{
		    var ltable = $('#lead_generation_table');
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
		            "url": '<?php echo site_url('welcome/get_list_of_lead')?>',
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
		        $('#lead_generation_table').DataTable().column( i ).search(
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
    					// $('#lead_generation_table').ajax.reload();
    					var myDataTable = $('#lead_generation_table').DataTable(
    					{
							//Rest code
						});
						myDataTable.ajax.reload();
			    	}
		     	});
	     		event.preventDefault();
	     		return false;  //stop the actual form post !important!
	  		});
		});
		function update(daily_lead_id)
		{
			$('#update_lead_modal').modal();
			$.ajax(
			{
				url: '<?php echo site_url('welcome/edit/')?>'+daily_lead_id,
				method: 'POST',
				dataType: 'json',
			})
			.done(function(data)
			{
				$('#daily_lead_id').val(data.daily_lead_id);
				$('#date1').val(data.date);
				$('#date2').val(data.date);
				$('#lead_origin1').val(data.lead_origin);
				$('#owner_name1').val(data.owner_name);
				$('#lead_area1').val(data.lead_area);
				$('#city1').val(data.city);
				$('#query1').val(data.query);
				$('#city_name1').val(data.city_name);
				$('#client_name1').val(data.client_name);
				$('#contact1').val(data.contact);
				$('#note1').val(data.note);
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
			        	// $('#lead_generation_table').ajax.reload();
						var myDataTable = $('#lead_generation_table').DataTable(
						{
							//Rest code
						});
						myDataTable.ajax.reload();
		            }
		        });
        		return false;
    		});
		});
		// Delete Lead
		function delete_lead(daily_lead_id)
		{
			$('#delete_modal').modal();
			$('#delete_btn').on('click',function()
			{
	            // var form = $('#update_form').serialize()
	            $.ajax(
	            {
	                type : "POST",
	                url  : "<?php echo site_url('welcome/delete/')?>"+daily_lead_id,
	                dataType : "JSON",
	                success: function(data)
	                {
	                	 $('#delete_modal').modal('toggle');
	                	// alert('Successful!'); //Unterminated String literal fixed
			        	// $('#alert').html('<div class="alert alert-primary alert-dismissible fade show m-alert m-alert--square m-alert--air"><button class="close" data-close="alert"></button><span>Record Deleted!</span></div>');
			        	// $('#lead_generation_table').ajax.reload();
						var myDataTable = $('#lead_generation_table').DataTable(
						{
							//Rest code
						});
						myDataTable.ajax.reload();
		            }
		        });
    		});
		}
	</script>
</body>
</html>