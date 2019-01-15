<html>
<head>
<title>Upload Form</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<?php echo $error;?>

<form id="form" action="upload/do_upload" method="get" accept-charset="utf-8">

<input id="file" type="file" name="file" size="20" />
<span id="msg" style="display:none">Saved</span>

<br /><br />

<input type="submit" value="upload" id="upalod_btn" />

</form>
<script type="text/javascript">
	$(document).ready(function()
	{
		$('#upalod_btn').click(function(e)
		{
		   	e.preventDefault();
		   	var data = new FormData();
		   	var form_data = $('#form').serializeArray();
		   	$.each(form_data, function (key, input)
		   	{
		       data.append(input.name, input.value);
		   	});
	    	//input quatation
	   		var quotation_wip = $('input[name="file"]')[0].files;
	   		if(quotation_wip.length>0)
	   		{
	       		for (var i = 0; i < quotation_wip.length; i++)
	       		{
	          		data.append("file[]", quotation_wip[i]);
	       		}
	   		}
	   		else
		   	{
		    	return 0;
		    	exit;
		   	}
			data.append('key', 'value');
		   	// var lead_id=$('#lead_id').val();
		   	$.ajax(
		   	{
		       url:'<?php echo base_url(); ?>upload/do_upload/',
		       type:'POST',
		       data:data,
		       cache:false,
		       contentType: false,
		       processData: false,
		       success:function(data)
		       	{	
		       		$("#msg").show();
               		setTimeout(function() { $("#msg").hide(); }, 10000);
		    //        	if(data==1)
		    //        	{
						// $('#msg').html(data).fadeIn('slow');
				  //    	// $('#msg').html("data insert successfully").fadeIn('slow') //also show a success message 
				  //    	$('#msg').delay(5000).fadeOut('slow');
		    //            // $("#form")[0].reset();
		    //            // pre_table(1);
		    //        	}
		    //        	else 
		    //        	if(data==3)
		    //        	{
		    //            window.location.href=base_url+ 'auth/';
		    //        	}
		    //        	else
		    //        	{
		    //            window.location.href='<?php echo base_url(); ?>upload/';
		    //         }
	       		}
			});
	 	});
	});
</script>

</body>
</html>