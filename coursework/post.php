
<!-- <!DOCTYPE html> -->
<!-- <html> -->
<!-- <head> -->
	<!-- <title>Registration system PHP and MySQL</title> -->
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
<!-- </head> -->
<!-- <body> -->
	<div class="header">
		<h2>Post</h2>
	</div>
	
	<form method="post" action="post.php" autocomplete="off" enctype="multipart/form-data">

		<!-- <?php include('errors.php'); ?> -->

		<div class="input-group">
			<label>Image</label>
			<input type="file" name="image" value="" required="required">
		</div>
		<div class="input-group">
			<label>Description</label>
			<textarea name="description" id="" cols="30" rows="10"></textarea>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_post">Submit</button>
		</div>
	</form>
<!-- </body> -->
<!-- </html> -->