<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<form enctype="multipart/form-data" id="submit">
               <div class="control-group form-group">
                        <div class="controls">
                            <label>Upload Photo:</label>
                            <input name="file" type="file"  id="image_file" required>
                            <p class="help-block"></p>
                        </div>
               </div>
               <button type="submit" class="btn btn-primary" id="sub">Submit</button>
           </form> 
           <script type="text/javascript">
           	$(document).ready(function() {
           		$('#submit').submit(function(e){
           			alert('hello');
			    	e.preventDefault(); 
			         $.ajax(
			         {
			             url:'http://localhost/file_uploading/file/do_upload/',
			             type:"post",
			             data:new FormData(this),
			             processData:false,
			             contentType:false,
			             cache:false,
			             async:false,
			            success: function(data)
		              	{
		                  	alert(data);
		           		}
		           		.done(doneCallbacks)
			           	// error: function(data) 
			           	// {
			           	// 	alert(data);
			           	// }
			         });
			    });
           	});
           </script> 
</body>
</html>