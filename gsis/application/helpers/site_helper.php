<?php
	if(!function_exists('helper_isCaptchaCorrect'))
	{
	  	function helper_isCaptchaCorrect($g_recaptcha_response)
		{
			$form_response=$g_recaptcha_response;
			$url="https://www.google.com/recaptcha/api/siteverify";
			$secret="6LfTe1IUAAAAAHEjl6jJRfJTcNFmPcMVscbvIkpL";
			$response=file_get_contents($url."?secret=".$secret."&response=".$form_response."&remoteip=".$_SERVER["REMOTE_ADDR"]);
			$data=json_decode($response);
			if(isset($data->success)&& $data->success=="true"){
				return true;
			}else{
				return false;
			}
		}
	}
	if(!function_exists('get_menu'))
	{
		function get_menu($role)
		{
		    $ci = & get_instance();
		    $query = "SELECT * FROM menu where role='$role'";
		    $get = $ci->db->query($query);
		    $row = $get->result_array();
		    return $row;
		}
	}
?>