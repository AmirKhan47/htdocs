<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>import demo</title>
</head>
<body>
	<form action="<?php echo base_url();?>datatable/import/" method="POST" enctype="multipart/form-data">
		<input type="file" name="myfile">
		<input type="submit" name="submit" value="submit">
	</form>
</body>
</html>