<!DOCTYPE html>
<html>
<head>
	<title>form</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<body>
<form id="form1" action="validate">
	<label>Name</label>
	<input type="name" name="name" id="name" data-validation="length number" data-validation-length="min4">
	<label>Email</label>
	<input type="email" name="email" id="email">
<input type="submit" name="" value="submit">
</form>
<script>
  $.validate({
    lang: 'en'
  });
</script>

</body>
</html>