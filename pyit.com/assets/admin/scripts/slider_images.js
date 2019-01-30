myPath = window.location.protocol+'//'+window.location.hostname+'/pyit.com';

$("#form_slide_image_one").on('submit', function(event){
	event.preventDefault();
	var file_name = 'file_slide_one';
	var image_id = 1;
	// var user_name = $("#user_name").val();
	if($('#file_slide_one').get(0).files.length === 1){
		$("#slide_one_upload_btn").html('Uploading...');
		$("#slide_one_upload_btn").attr("disabled", "disabled");

		$.ajax({
			url: myPath+'/admin/Slider_Images/upload_slider_image/'+file_name+'/'+image_id,
			method: 'POST',
			data: new FormData(this),
			processData:false,
			contentType: false,
	        cache: false,
			success:function(data){
				$("#slide_one_upload_btn").removeAttr("disabled");
				$('#form_slide_image_one')[0].reset();
				$("#slide_one_upload_btn").html('Uploaded');
				if(data == 'uploaded'){
					$('#success_msg').html('<div class="alert alert-success">Image Uploaded Successfully</div>');
					window.location.reload();
				}else{
					$('#error_msg').html('<div class="alert alert-danger">Error Uploading Image</div>');
				}
			}
		});
	}else{
		$('#error_msg').html('<div class="alert alert-danger">No File Selected</div>');
	}
});	

$("#form_slide_image_two").on('submit', function(event){
	event.preventDefault();
	var file_name = 'file_slide_two';
	var image_id = 2;
	// var user_name = $("#user_name").val();
	if($('#file_slide_two').get(0).files.length === 1){
		$("#slide_two_upload_btn").html('Uploading...');
		$("#slide_two_upload_btn").attr("disabled", "disabled");

		$.ajax({
			url: myPath+'/admin/Slider_Images/upload_slider_image/'+file_name+'/'+image_id,
			method: 'POST',
			data: new FormData(this),
			processData:false,
			contentType: false,
	        cache: false,
			success:function(data){
				$("#slide_two_upload_btn").removeAttr("disabled");
				$('#form_slide_image_two')[0].reset();
				$("#slide_two_upload_btn").html('Uploaded');
				if(data == 'uploaded'){
					$('#success_msg').html('<div class="alert alert-success">Image Uploaded Successfully</div>');
					window.location.reload();
				}else{
					$('#error_msg').html('<div class="alert alert-danger">Error Uploading Image</div>');
				}
			}
		});
	}else{
		$('#error_msg').html('<div class="alert alert-danger">No File Selected</div>');
	}
});	


$("#form_slide_image_three").on('submit', function(event){
	event.preventDefault();
	var file_name = 'file_slide_three';
	var image_id = 3;
	// var user_name = $("#user_name").val();
	if($('#file_slide_three').get(0).files.length === 1){
		$("#slide_three_upload_btn").html('Uploading...');
		$("#slide_three_upload_btn").attr("disabled", "disabled");

		$.ajax({
			url: myPath+'/admin/Slider_Images/upload_slider_image/'+file_name+'/'+image_id,
			method: 'POST',
			data: new FormData(this),
			processData:false,
			contentType: false,
	        cache: false,
			success:function(data){
				$("#slide_three_upload_btn").removeAttr("disabled");
				$('#form_slide_image_three')[0].reset();
				$("#slide_three_upload_btn").html('Uploaded');
				if(data == 'uploaded'){
					$('#success_msg').html('<div class="alert alert-success">Image Uploaded Successfully</div>');
					window.location.reload();
				}else{
					$('#error_msg').html('<div class="alert alert-danger">Error Uploading Image</div>');
				}
			}
		});
	}else{
		$('#error_msg').html('<div class="alert alert-danger">No File Selected</div>');
	}
});	