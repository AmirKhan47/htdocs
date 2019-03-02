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
		<h1>Add New</h1>
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
		<h3><a class="btn btn-info" href="<?php echo URL; ?>header/">View All</a></h3>
		<form action="<?php echo URL; ?>header/add_header" method="POST" enctype="multipart/form-data">

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

			<button type="submit" class="btn btn-info">Submit</button>
			
		</form>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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