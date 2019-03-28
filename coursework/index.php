<?php 
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'coursework');
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1>Add New</h1>
		<form action="ajaxupload.php" id="form" class="bg-light p-2" method="POST" enctype="multipart/form-data">

			<div class="form-group row">
				<div class="col">
					<img id="image" src="#" alt="" style="max-height: 100px;">
					<label for="">Image</label><input type="file" class="form-control-file" name="image" id="image" accept="image/*" required="required">
				</div>
				<div class="col">
					<label for="" class="col">Description</label>
					<textarea name="description" maxlength="500" cols="30" rows="3" required=""></textarea>
				</div>
			</div>

			<input type="submit" class="btn btn-info" name="submit" value="Submit">
			<div id="err"></div>
		</form>
		<h1>View All</h1>
		<div class="row">
			
				<?php	
					$query = "SELECT * from posts ORDER BY id DESC";
					$data = mysqli_query($db, $query);
					$num_rows = mysqli_num_rows($data);
					while($row = mysqli_fetch_assoc($data)){
						echo '<div class="col-md-6">
						<img src="'.$row['image'].'" alt="" style="height: 100px; width: 150px">
						</div>';
						echo '<div class="col-md-6">
						'.$row['description'].'
						</div>';
						
					}
				?>

		</div>

	</div>
		
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
		$(document).ready(function (e)
		{
		 	$("#form").on('submit',(function(e)
		 	{
		  		e.preventDefault();
		  		$.ajax(
		  		{
		        	url: "ajaxupload.php",
		   			type: "POST",
		   			data:  new FormData(this),
		   			contentType: false,
		         	cache: false,
		   			processData:false,
				   	success: function(data)
				   	{
					    if(data == 'invalid')
					    {
					     	// invalid file format.
					     	$("#err").html("Invalid File !");
					    }
					    if(data == 1)
					    {
					    	alert('Success!');
					    	$("#err").html('Success');
						    $("#preview").html(data);
						    $("#form")[0].reset();
					    }
					},
				    error: function(e) 
				    {
				    	$("#err").html(e);
				    }          
		    	});
		 	}));
		});
	</script>
</body>
</html>