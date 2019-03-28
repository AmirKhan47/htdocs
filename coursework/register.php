<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Register</h2>
	</div>
	
	<form method="post" action="register.php" autocomplete="off">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>" pattern="^[A-Za-z0-9_]{5,15}$" minlength="3" maxlength="50" title="Please Enter A valid Username" placeholder="abcxyz12345" required="required">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>" pattern="^[^.]([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" placeholder="abc@gmail.com" required="required">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1" placeholder="password12345" minlength="3" maxlength="50" required="required">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2" required="required">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>