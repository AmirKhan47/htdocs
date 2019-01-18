<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Lead Generation</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1>Lead Generation</h1>
		<form id="form" method="POST" action="<?php echo base_url().'welcome/add'; ?>">
			<div class="row">
				<div class="form-group col-6">
			    	<label for="exampleInputEmail1">Date</label>
			    	<input type="date" class="form-control" name="date" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required="required">
			  	</div>
			  	<div class="form-group col-6">
			    	<label for="exampleInputPassword1">Lead Origin</label>
			    	<select name="lead_origin" class="form-control" required="required">
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
			    	<input type="text" class="form-control" name="lead_area" id="exampleInputPassword1" placeholder="" required="required">
			  	</div>
			  	<div class="form-group col-6">
			    	<label for="exampleInputPassword1">City</label>
			    	<select name="city" class="form-control" required="required">
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
			    	<input type="text" class="form-control" name="query" id="exampleInputPassword1" placeholder="" required="required">
			  	</div>
			  	<div class="form-group col-6">
			    	<label for="exampleInputPassword1">Client Name</label>
			    	<input type="text" class="form-control" name="client_name" id="exampleInputPassword1" placeholder="" required="required">
			  	</div>
			</div>
			<div class="row">
			  	<div class="form-group col-6">
			    	<label for="exampleInputPassword1">Contact</label>
			    	<input type="text" class="form-control" name="contact" id="exampleInputPassword1" placeholder="" required="required">
			  	</div>
			  	<div class="form-group col-6">
			    	<label for="exampleInputPassword1">Note</label>
			    	<textarea name="note" rows="1" class="form-control"></textarea>
			  	</div>
			</div>
			<input type="submit" id="submit-hidden" style="display: none">
			<div id="alert"></div>
			<div class="row">
			  	<div class="col-6">
			  		<button type="button" id="btn" class="btn btn-primary">Submit</button>
			  	</div>
			  	<div class="col-6">
			  		<a href="http://localhost/CodeIgniter-3.1.10/welcome/view"><button type="button" id="btn" class="btn btn-primary">Lead Report</button></a>
			  	</div>
			</div>
		</form>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">
		// $("#btn").on("click", function()
		// {
  // 			if(!$("#form")[0].checkValidity())
  // 			{
		// 		// If the form is invalid, submit it. The form won't actually submit;
		// 		// this will just cause the browser to display the native HTML5 error messages.
		// 		$("#form").find("#submit-hidden").click();
		// 	}
		// });
		$(document).ready(function()
		{
			$('#btn').click(function(event)
			{
				if(!$("#form")[0].checkValidity())
	  			{
					// If the form is invalid, submit it. The form won't actually submit;
					// this will just cause the browser to display the native HTML5 error messages.
					$("#form").find("#submit-hidden").click();
					return false;
				}
	       		form=$("#form").serialize();
		     	$.ajax(
		     	{
			       type:'POST',
			       url:'http://localhost/CodeIgniter-3.1.10/welcome/add',
			       data:form,
			       success: function(data)
			    	{
			           	alert('Successful!'); //Unterminated String literal fixed
			        	$('#alert').html('<div class="alert alert-primary alert-dismissible fade show   m-alert m-alert--square m-alert--air"><button class="close" data-close="alert"></button><span>Lead Added!</span></div>');
    					$('#area_name_form').clearForm();
			    	}

		     	});
	     		event.preventDefault();
	     		return false;  //stop the actual form post !important!
	  		});
			// $("#lead_generation_form").on("submit",function(event)
			// {
	  // 			event.preventDefault();
	  // 			form=$("#form").serialize();
	  // 			console.log(form);
			// 	$.ajax(
			// 	{
			// 		url:'<?php echo base_url().'welcome/add'; ?>',
   //  				method:"POST",
   //  				data: form,
			// 	})
			// 	.done(function()
			// 	{
			// 		console.log("success");
			// 	})
			// 	.fail(function()
			// 	{
			// 		console.log("error");
			// 	})
			// 	.always(function()
			// 	{
			// 		console.log("complete");
			// 	});
			// });
		});
	</script>
</body>
</html>