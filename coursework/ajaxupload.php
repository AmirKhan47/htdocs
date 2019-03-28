<?php
	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'coursework');

	$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
	$path = 'uploads/'; // upload directory
	if(!empty($_POST['description']) || $_FILES['image'])
	{
		$img = $_FILES['image']['name'];
		$tmp = $_FILES['image']['tmp_name'];
		// get uploaded file's extension
		$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
		// can upload same image using rand function
		$final_image = rand(1000,1000000).$img;
		// check's valid format
		if(in_array($ext, $valid_extensions)) 
		{ 
			$path = $path.strtolower($final_image); 
			if(move_uploaded_file($tmp,$path)) 
			{
				// echo "<img src='$path' />";
				$description = $_POST['description'];
				//include database configuration file
				// include_once 'db.php';
				//insert form data in the database
				$insert = $db->query("INSERT posts (description,image) VALUES ('".$description."','".$path."')");
				if($insert){
					echo '1';
				}

			}
		}
		else 
		{
			echo 'invalid';
		}
	}
?>