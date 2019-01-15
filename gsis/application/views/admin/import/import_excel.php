<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Import Excel</title>
</head>
<body>
	<form action="<?php echo SURL.'challan/import_excel/';?>" method="POST" enctype="multipart/form-data">
		<input type="file" name="file">
		<input type="submit" name="submit" value="submit">
	</form>
</body>
</html>