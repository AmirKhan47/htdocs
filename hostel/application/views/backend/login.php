<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>Admin</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content=""
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tag Keywords -->
	<!-- css files -->
	<link rel="stylesheet" href="<?php echo Assets; ?>/login/css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="<?php echo Assets; ?>/login/css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<!-- //web-fonts -->
	<link rel="shortcut icon" href="<?php echo Admin_Assets;?>demo/default/media/img/logo/favicon.ico" />

</head>

<body>
	<!-- bg effect -->
	<div id="bg">
		<canvas></canvas>
		<canvas></canvas>
		<canvas></canvas>
	</div>
	<!-- //bg effect -->
	<!-- title -->
	<h1>Hostels Admin Login Form</h1>
	<!-- //title -->
	<!-- content -->
	<div class="sub-main-w3">
		<form action="<?php echo URL;?>backend/login/login" method="post">
			<h2>Login Now
				<i class="fas fa-level-down-alt"></i>
			</h2>
			<div class="form-style-agile">
				<label>
					<i class="fas fa-user"></i>
					Username
				</label>
				<input placeholder="Username" name="username" type="text" required="">
			</div>
			<div class="form-style-agile">
				<label>
					<i class="fas fa-unlock-alt"></i>
					Password
				</label>
				<input placeholder="Password" name="password" type="password" required="">
			</div>
			<?php
	            if ($this->session->flashdata('error_message')) 
	            {
	        ?>
	                <div class="alert alert-danger" style="color: #fff;">
	                    <!-- <button class="close" data-close="alert"></button> -->
	                    <span><?php echo $this->session->flashdata('error_message'); ?></span>
	                </div>
	        <?php
	            }

	            if ($this->session->flashdata('ok_message')) 
	            {
	        ?>
	                <div class="alert alert-success">
	                    <!-- <button class="close" data-close="alert"></button> -->
	                    <span><?php echo $this->session->flashdata('ok_message'); ?></span>
	                </div>
	        <?php
	            }
	        ?>
			<!-- checkbox -->
			<!-- <div class="wthree-text">
				<ul>
					<li>
						<label class="anim">
							<input type="checkbox" class="checkbox">
							<span>Stay Signed In</span>
						</label>
					</li>
					<li>
						<a href="#">Forgot Password?</a>
					</li>
				</ul>
			</div> -->
			<!-- //checkbox -->
			<input type="submit" value="Log In">
		</form>
	</div>
	<!-- //content -->

	<!-- copyright -->
	<div class="footer">
		<p>&copy; 2018 Effect Login Form. All rights reserved | Design by
			<a href="https://www.redstartechs.com/" target="_blank" class="m-link">
				Red Star Technologies
			</a>
		</p>
	</div>
	<!-- //copyright -->

	<!-- Jquery -->
	<script src="<?php echo Assets; ?>/login/js/jquery-3.3.1.min.js"></script>
	<!-- //Jquery -->

	<!-- effect js -->
	<script src="<?php echo Assets; ?>/login/js/canva_moving_effect.js"></script>
	<!-- //effect js -->

</body>

</html>