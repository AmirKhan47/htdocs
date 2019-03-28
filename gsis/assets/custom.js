// function my_function($name)

// {

// 	// alert($name);

// 	// console.log($name);

// 	var name=$name;

// 	// alert(name);

// 	// e.preventDefault();

// 	// return;

//    	var data = new FormData();

//    	var form_data = $('#file_completion_form').serializeArray();

//    	$.each(form_data, function (key, input)

//    	{

//        data.append(input.name, input.value);

//    	});

// 	//input quatation

// 	// var quotation_wip = $(name)[0].files;

// 	// if(quotation_wip.length>0)

// 	// {

//  //   		for (var i = 0; i < quotation_wip.length; i++)

//  //   		{

//  //      		data.append(name, quotation_wip[i]);

//  //   		}

// 	// }

// 	// else

//  //   	{

//  //    	return 0;

//  //    	exit;

//  //   	}

// 	// data.append('key', 'value');

//    	// var lead_id=$('#lead_id').val();

//    	var student_id =  $('#student_id').val();

//    	alert(student_id);

//    	alert(name);

//    	// return;

//    	$.ajax(

//    	{

//    		url:window.location.origin+'/file/file_completion/'+student_id + '/' + name,

//        type:'POST',

//        data:data,

//        cache:false,

//        contentType: false,

//        processData: false,

//       	success:function(data)

//        	{

//        		alert(data);

//        		if(data==1)

//         	{

// 	       		$("#msg").show();

// 	       		setTimeout(function()

// 	       		{

// 	       			$("#msg").hide(); 

// 	       		}, 

// 	       		10000);

// 	       	}

// 	       	if(data==2)

// 	       	{

// 	       		window.location.href='<?php echo base_url(); ?>file/index';

// 	       	}

//     //        	{

//     //        	if(data==1)

//     //        	{

// 				// $('#msg').html(data).fadeIn('slow');

// 		  //    	// $('#msg').html("data insert successfully").fadeIn('slow') //also show a success message 

// 		  //    	$('#msg').delay(5000).fadeOut('slow');

//     //            // $("#form")[0].reset();

//     //            // pre_table(1);

//     //        	}

//     //        	else 

//     //        	if(data==3)

//     //        	{

//     //            window.location.href=base_url+ 'auth/';

//     //        	}

//     //        	else

//     //        	{

//     //            window.location.href='<?php echo base_url(); ?>upload/';

//     //         }

//    		}

// 	});

// }

// -------------------- 15 File Uploading --------------------

// var URL=window.location.origin+'/file/'; //For Localhost

// var URL='http://www.redstartechs.org/gsis/staging/file/'; //For Server

$(document).ready(function()

	{

		// Undertaking By Guardian

		$('#upload_undertaking').click(function(e)

		{

		   	e.preventDefault();

		   	var data = new FormData();

		   	var form_data = $('#file_completion_form').serializeArray();

		   	$.each(form_data, function (key, input)

		   	{

		       data.append(input.name, input.value);

		   	});

	    	//input quatation

	   		var quotation_wip = $('input[name="undertaking"]')[0].files;

	   		if(quotation_wip.length>0)

	   		{

	       		for (var i = 0; i < quotation_wip.length; i++)

	       		{

	          		data.append("undertaking[]", quotation_wip[i]);

	       		}

	   		}

	   		else

		   	{

		    	return 0;

		    	exit;

		   	}

			data.append('key', 'value');

		   	var student_id =  $('#student_id').val();

		   	$('#loader').show();

		   	$.ajax(

		   	{

	       		url: window.location.origin+'/file/file_completion/'+student_id, //localhost

	       		// url:'http://www.redstartechs.org/gsis/staging/file/file_completion/'+student_id,

		       	type:'POST',

		       	data:data,

		       	cache:false,

		       	contentType: false,

		       	processData: false,

		       	success:function(data)

		       	{

		       		$('#loader').hide();

		       		if(data==2)

		           	{

		               window.location.href=window.location.origin+'/file/index/'+student_id;

		               // window.location.href='http://www.redstartechs.org/gsis/staging/file/index/'+student_id;

		            }

		       		else

		       		{

			       		var obj = jQuery.parseJSON(data);

			       		// alert( obj.undertaking );

			       		$("#undertaking span").html(obj.undertaking);

			       		$("#download_undertaking").html('<a href='+window.location.origin+'/file/download/'+obj.undertaking+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i></button></a>');

			       		// $("#download_undertaking").html('<a href="http://www.redstartechs.org/gsis/staging/file/download/'+obj.undertaking+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i></button></a>');

			       		$("#msg").show();

	               		// setTimeout(function()

	               		// {

	               		// 	$("#msg").hide(); 

	               		// }, 

	               		// 10000);

               		}

	       		}

			});

	 	});

	 	// Copy of Paid Fee Challan

	 	$('#upload_copy_of_paid_fee_challan').click(function(e)

		{

		   	e.preventDefault();

		   	var data = new FormData();

		   	var form_data = $('#file_completion_form').serializeArray();

		   	$.each(form_data, function (key, input)

		   	{

		       data.append(input.name, input.value);

		   	});

	    	//input quatation

	   		var quotation_wip = $('input[name="copy_of_paid_fee_challan"]')[0].files;

	   		if(quotation_wip.length>0)

	   		{

	       		for (var i = 0; i < quotation_wip.length; i++)

	       		{

	          		data.append("copy_of_paid_fee_challan[]", quotation_wip[i]);

	       		}

	   		}

	   		else

		   	{

		    	return 0;

		    	exit;

		   	}

			data.append('key', 'value');

		   	var student_id =  $('#student_id').val();

		   	$('#loader1').show();

		   	$.ajax(

		   	{

	       		url:window.location.origin+'/file/file_completion1/'+student_id,

	       		// url:'http://www.redstartechs.org/gsis/staging/file/file_completion1/'+student_id,

		       	type:'POST',

		       	data:data,

		       	cache:false,

		       	contentType: false,

		       	processData: false,

		       	success:function(data)

		       	{

		       		$('#loader1').hide();

		       		if(data==2)

		           	{

		               window.location.href=window.location.origin+'/file/index/'+student_id;

		               // window.location.href='http://www.redstartechs.org/gsis/staging/file/index/'+student_id;

		            }

		       		else

		       		{

			       		var obj = jQuery.parseJSON(data);

			       		// alert( obj.copy_of_paid_fee_challan );

			       		$("#copy_of_paid_fee_challan span").html(obj.copy_of_paid_fee_challan);

			       		$("#download_copy_of_paid_fee_challan").html('<a href='+window.location.origin+'/file/download/'+obj.copy_of_paid_fee_challan+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i></button></a>');

						// $("#download_copy_of_paid_fee_challan").html('<a href="http://www.redstartechs.org/gsis/staging/file/download/'+obj.copy_of_paid_fee_challan+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i></button></a>');

						$("#msg1").show();

	               		// setTimeout(function()

	               		// {

	               		// 	$("#msg1").hide(); 

	               		// }, 

	               		// 10000);

               		}

	       		}

			});

	 	});

	 	// Copy of Paid Registration Slip

	 	$('#upload_copy_of_paid_registration_slip').click(function(e)

		{

		   	e.preventDefault();

		   	var data = new FormData();

		   	var form_data = $('#file_completion_form').serializeArray();

		   	$.each(form_data, function (key, input)

		   	{

		       data.append(input.name, input.value);

		   	});

	    	//input quatation

	   		var quotation_wip = $('input[name="copy_of_paid_registration_slip"]')[0].files;

	   		if(quotation_wip.length>0)

	   		{

	       		for (var i = 0; i < quotation_wip.length; i++)

	       		{

	          		data.append("copy_of_paid_registration_slip[]", quotation_wip[i]);

	       		}

	   		}

	   		else

		   	{

		    	return 0;

		    	exit;

		   	}

			data.append('key', 'value');

		   	// var lead_id=$('#lead_id').val();

		   	var student_id =  $('#student_id').val();

		   	// alert(student_id);

		   	// return;

		   	$('#loader2').show();

		   	$.ajax(

		   	{

	       		url:window.location.origin+'/file/file_completion2/'+student_id,

	       		// url:'http://www.redstartechs.org/gsis/staging/file/file_completion2/'+student_id,

		       	type:'POST',

		       	data:data,

		       	cache:false,

		       	contentType: false,

		       	processData: false,

		       	success:function(data)

		       	{	

		       		$('#loader2').hide();

		       		if(data==2)

		           	{

		               window.location.href=window.location.origin+'/file/index/'+student_id;

		               // window.location.href='http://www.redstartechs.org/gsis/staging/file/index/'+student_id;

		            }

		       		else

		       		{

			       		var obj = jQuery.parseJSON(data);

			       		// alert( obj.copy_of_paid_registration_slip );

			       		$("#copy_of_paid_registration_slip span").html(obj.copy_of_paid_registration_slip);

			       		$("#download_copy_of_paid_registration_slip").html('<a href='+window.location.origin+'/file/download/'+obj.copy_of_paid_registration_slip+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i></button></a>');

			       		// $("#download_copy_of_paid_registration_slip").html('<a href="http://www.redstartechs.org/gsis/staging/file/download/'+obj.copy_of_paid_registration_slip+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i></button></a>');

						$("#msg2").show();

	               		// setTimeout(function()

	               		// {

	               		// 	$("#msg2").hide(); 

	               		// }, 

	               		// 10000);

	               	}

	       		}

			});

	 	});

	 	// Photographs

	 	$('#upload_photographs').click(function(e)

		{

		   	e.preventDefault();

		   	var data = new FormData();

		   	var form_data = $('#file_completion_form').serializeArray();

		   	$.each(form_data, function (key, input)

		   	{

		       data.append(input.name, input.value);

		   	});

	    	//input quatation

	   		var quotation_wip = $('input[name="photographs"]')[0].files;

	   		if(quotation_wip.length>0)

	   		{

	       		for (var i = 0; i < quotation_wip.length; i++)

	       		{

	          		data.append("photographs[]", quotation_wip[i]);

	       		}

	   		}

	   		else

		   	{

		    	return 0;

		    	exit;

		   	}

			data.append('key', 'value');

		   	// var lead_id=$('#lead_id').val();

		   	var student_id =  $('#student_id').val();

		   	// alert(student_id);

		   	// return;

		   	$('#loader3').show();

		   	$.ajax(

		   	{

	       		url:window.location.origin+'/file/file_completion3/'+student_id,

	       		// url:'http://www.redstartechs.org/gsis/staging/file/file_completion3/'+student_id,

		       	type:'POST',

		       	data:data,

		       	cache:false,

		       	contentType: false,

		       	processData: false,

		       	success:function(data)

		       	{	

		       		$('#loader3').hide();

		      		if(data==2)

		           	{

		               window.location.href=window.location.origin+'/file/index/'+student_id;

		               // window.location.href='http://www.redstartechs.org/gsis/staging/staging/file/index/'+student_id;

		            }

		       		else

		       		{

			       		var obj = jQuery.parseJSON(data);

			       		// alert( obj.photographs );

			       		$("#photographs span").html(obj.photographs);

						$("#download_photographs").html('<a href='+window.location.origin+'/file/download/'+obj.photographs+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i></button></a>');

			       		// $("#download_photographs").html('<a href="http://www.redstartechs.org/gsis/staging/file/download/'+obj.photographs+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i></button></a>');

			       		$("#msg3").show();

	               		// setTimeout(function()

	               		// {

	               		// 	$("#msg3").hide(); 

	               		// }, 

	               		// 10000);

	               	}

	       		}

			});

	 	});

	 	// Copy of Form-B

	 	$('#upload_copy_of_form_b').click(function(e)

		{

		   	e.preventDefault();

		   	var data = new FormData();

		   	var form_data = $('#file_completion_form').serializeArray();

		   	$.each(form_data, function (key, input)

		   	{

		       data.append(input.name, input.value);

		   	});

	    	//input quatation

	   		var quotation_wip = $('input[name="copy_of_form_b"]')[0].files;

	   		if(quotation_wip.length>0)

	   		{

	       		for (var i = 0; i < quotation_wip.length; i++)

	       		{

	          		data.append("copy_of_form_b[]", quotation_wip[i]);

	       		}

	   		}

	   		else

		   	{

		    	return 0;

		    	exit;

		   	}

			data.append('key', 'value');

		   	// var lead_id=$('#lead_id').val();

		   	var student_id =  $('#student_id').val();

		   	// alert(student_id);

		   	// return;

		   	$('#loader4').show();

		   	$.ajax(

		   	{

	       		url:window.location.origin+'/file/file_completion4/'+student_id,

	       		// url:'http://www.redstartechs.org/gsis/staging/file/file_completion4/'+student_id,

		       	type:'POST',

		       	data:data,

		       	cache:false,

		       	contentType: false,

		       	processData: false,

		       	success:function(data)

		       	{	

		       		$('#loader4').hide();

		       		if(data==2)

		           	{

		               window.location.href=window.location.origin+'/file/index/'+student_id;

		               // window.location.href='http://www.redstartechs.org/gsis/staging/file/index/'+student_id;

		            }

		       		else

		       		{

			       		var obj = jQuery.parseJSON(data);

			       		// alert( obj.copy_of_form_b );

			       		$("#copy_of_form_b span").html(obj.copy_of_form_b);

						$("#download_copy_of_form_b").html('<a href='+window.location.origin+'/file/download/'+obj.copy_of_form_b+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i></button></a>');

			       		// $("#download_copy_of_form_b").html('<a href="http://www.redstartechs.org/gsis/staging/file/download/'+obj.copy_of_form_b+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i></button></a>');

						$("#msg4").show();

	               		// setTimeout(function()

	               		// {

	               		// 	$("#msg4").hide(); 

	               		// }, 

	               		// 10000);

	               	}

	       		}

			});

	 	});

	 	// Copy of Guardian Cnic

	 	$('#upload_copy_of_guardian_cnic').click(function(e)

		{

		   	e.preventDefault();

		   	var data = new FormData();

		   	var form_data = $('#file_completion_form').serializeArray();

		   	$.each(form_data, function (key, input)

		   	{

		       data.append(input.name, input.value);

		   	});

	    	//input quatation

	   		var quotation_wip = $('input[name="copy_of_guardian_cnic"]')[0].files;

	   		if(quotation_wip.length>0)

	   		{

	       		for (var i = 0; i < quotation_wip.length; i++)

	       		{

	          		data.append("copy_of_guardian_cnic[]", quotation_wip[i]);

	       		}

	   		}

	   		else

		   	{

		    	return 0;

		    	exit;

		   	}

			data.append('key', 'value');

		   	// var lead_id=$('#lead_id').val();

		   	var student_id =  $('#student_id').val();

		   	// alert(student_id);

		   	// return;

		   	$('#loader5').show();

		   	$.ajax(

		   	{

	       		url:window.location.origin+'/file/file_completion5/'+student_id,

	       		// url:'http://www.redstartechs.org/gsis/staging/file/file_completion5/'+student_id,

		       	type:'POST',

		       	data:data,

		       	cache:false,

		       	contentType: false,

		       	processData: false,

		       	success:function(data)

		       	{	

		       		$('#loader5').hide();

		       		if(data==2)

		           	{

		               window.location.href=window.location.origin+'/file/index/'+student_id;

		               // window.location.href='http://www.redstartechs.org/gsis/staging/file/index/'+student_id;

		            }

		       		else

		       		{

			       		var obj = jQuery.parseJSON(data);

			       		// alert( obj.copy_of_guardian_cnic );

			       		$("#copy_of_guardian_cnic span").html(obj.copy_of_guardian_cnic);

						$("#download_copy_of_guardian_cnic").html('<a href='+window.location.origin+'/file/download/'+obj.copy_of_guardian_cnic+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i></button></a>');

			       		// $("#download_copy_of_guardian_cnic").html('<a href="http://www.redstartechs.org/gsis/staging/file/download/'+obj.copy_of_guardian_cnic+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i></button></a>');

						$("#msg5").show();

	               		// setTimeout(function()

	               		// {

	               		// 	$("#msg5").hide(); 

	               		// }, 

	               		// 10000);

	               	}

	       		}

			});

	 	});

	 	// School Leaving Certificate

	 	$('#upload_school_leaving_certificate').click(function(e)

		{

		   	e.preventDefault();

		   	var data = new FormData();

		   	var form_data = $('#file_completion_form').serializeArray();

		   	$.each(form_data, function (key, input)

		   	{

		       data.append(input.name, input.value);

		   	});

	    	//input quatation

	   		var quotation_wip = $('input[name="school_leaving_certificate"]')[0].files;

	   		if(quotation_wip.length>0)

	   		{

	       		for (var i = 0; i < quotation_wip.length; i++)

	       		{

	          		data.append("school_leaving_certificate[]", quotation_wip[i]);

	       		}

	   		}

	   		else

		   	{

		    	return 0;

		    	exit;

		   	}

			data.append('key', 'value');

		   	// var lead_id=$('#lead_id').val();

		   	var student_id =  $('#student_id').val();

		   	// alert(student_id);

		   	// return;

		   	$('#loader6').show();

		   	$.ajax(

		   	{

	       		url:window.location.origin+'/file/file_completion6/'+student_id,

	       		// url:'http://www.redstartechs.org/gsis/staging/file/file_completion6/'+student_id,

		       	type:'POST',

		       	data:data,

		       	cache:false,

		       	contentType: false,

		       	processData: false,

		       	success:function(data)

		       	{	

		       		$('#loader6').hide();

		       		if(data==2)

		           	{

		               window.location.href=window.location.origin+'/file/index/'+student_id;

		               // window.location.href='http://www.redstartechs.org/gsis/staging/file/index/'+student_id;

		            }

		       		else

		       		{

			       		var obj = jQuery.parseJSON(data);

			       		// alert( obj.school_leaving_certificate );

			       		$("#school_leaving_certificate span").html(obj.school_leaving_certificate);

						$("#download_school_leaving_certificate").html('<a href='+window.location.origin+'/file/download/'+obj.school_leaving_certificate+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i></button></a>');

			       		// $("#download_school_leaving_certificate").html('<a href="http://www.redstartechs.org/gsis/staging/file/download/'+obj.school_leaving_certificate+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i></button></a>');

						$("#msg6").show();

	               		// setTimeout(function()

	               		// {

	               		// 	$("#msg6").hide(); 

	               		// }, 

	               		// 10000);

	               	}

	       		}

			});

	 	});

	 	// Record of Results

	 	$('#upload_record_of_results').click(function(e)

		{

		   	e.preventDefault();

		   	var data = new FormData();

		   	var form_data = $('#file_completion_form').serializeArray();

		   	$.each(form_data, function (key, input)

		   	{

		       data.append(input.name, input.value);

		   	});

	    	//input quatation

	   		var quotation_wip = $('input[name="record_of_results"]')[0].files;

	   		if(quotation_wip.length>0)

	   		{

	       		for (var i = 0; i < quotation_wip.length; i++)

	       		{

	          		data.append("record_of_results[]", quotation_wip[i]);

	       		}

	   		}

	   		else

		   	{

		    	return 0;

		    	exit;

		   	}

			data.append('key', 'value');

		   	// var lead_id=$('#lead_id').val();

		   	var student_id =  $('#student_id').val();

		   	// alert(student_id);

		   	// return;

		   	$('#loader7').show();

		   	$.ajax(

		   	{

	       		url:window.location.origin+'/file/file_completion7/'+student_id,

	       		// url:'http://www.redstartechs.org/gsis/staging/file/file_completion7/'+student_id,

		       	type:'POST',

		       	data:data,

		       	cache:false,

		       	contentType: false,

		       	processData: false,

		       	success:function(data)

		       	{	

		       		$('#loader7').hide();

		       		if(data==2)

		           	{

		               window.location.href=window.location.origin+'/file/index/'+student_id;

		               // window.location.href='http://www.redstartechs.org/gsis/staging/file/index/'+student_id;

		            }

		       		else

		       		{

			       		var obj = jQuery.parseJSON(data);

			       		// alert( obj.record_of_results );

			       		$("#record_of_results span").html(obj.record_of_results);

						$("#download_record_of_results").html('<a href='+window.location.origin+'/file/download/'+obj.record_of_results+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i></button></a>');

			       		// $("#download_record_of_results").html('<a href="http://www.redstartechs.org/gsis/staging/file/download/'+obj.record_of_results+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i> </button></a>');

						$("#msg7").show();

	               		// setTimeout(function()

	               		// {

	               		// 	$("#msg7").hide(); 

	               		// }, 

	               		// 10000);

               		}

	       		}

			});

	 	});

	 	// Merit Certificates

	 	$('#upload_merit_certificates').click(function(e)

		{

		   	e.preventDefault();

		   	var data = new FormData();

		   	var form_data = $('#file_completion_form').serializeArray();

		   	$.each(form_data, function (key, input)

		   	{

		       data.append(input.name, input.value);

		   	});

	    	//input quatation

	   		var quotation_wip = $('input[name="merit_certificates"]')[0].files;

	   		if(quotation_wip.length>0)

	   		{

	       		for (var i = 0; i < quotation_wip.length; i++)

	       		{

	          		data.append("merit_certificates[]", quotation_wip[i]);

	       		}

	   		}

	   		else

		   	{

		    	return 0;

		    	exit;

		   	}

			data.append('key', 'value');

		   	// var lead_id=$('#lead_id').val();

		   	var student_id =  $('#student_id').val();

		   	// alert(student_id);

		   	// return;

		   	$('#loader8').show();

		   	$.ajax(

		   	{

	       		url:window.location.origin+'/file/file_completion8/'+student_id,

	       		// url:'http://www.redstartechs.org/gsis/staging/file/file_completion8/'+student_id,

		       	type:'POST',

		       	data:data,

		       	cache:false,

		       	contentType: false,

		       	processData: false,

		       	success:function(data)

		       	{	

		       		$('#loader8').hide();

		       		if(data==2)

		           	{

		               window.location.href=window.location.origin+'/file/index/'+student_id;

		               // window.location.href='http://www.redstartechs.org/gsis/staging/file/index/'+student_id;

		            }

		       		else

		       		{

			       		var obj = jQuery.parseJSON(data);

			       		// alert( obj.merit_certificates );

			       		$("#merit_certificates span").html(obj.merit_certificates);

						$("#download_merit_certificates").html('<a href='+window.location.origin+'/file/download/'+obj.merit_certificates+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i></button></a>');

			       		// $("#download_merit_certificates").html('<a href="http://www.redstartechs.org/gsis/staging/file/download/'+obj.merit_certificates+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i> </button></a>');

						$("#msg8").show();

	               		// setTimeout(function()

	               		// {

	               		// 	$("#msg8").hide(); 

	               		// }, 

	               		// 10000);

	               	}

	       		}

			});

	 	});

	 	// Gap Certificate

	 	$('#upload_gap_certificate').click(function(e)

		{

		   	e.preventDefault();

		   	var data = new FormData();

		   	var form_data = $('#file_completion_form').serializeArray();

		   	$.each(form_data, function (key, input)

		   	{

		       data.append(input.name, input.value);

		   	});

	    	//input quatation

	   		var quotation_wip = $('input[name="gap_certificate"]')[0].files;

	   		if(quotation_wip.length>0)

	   		{

	       		for (var i = 0; i < quotation_wip.length; i++)

	       		{

	          		data.append("gap_certificate[]", quotation_wip[i]);

	       		}

	   		}

	   		else

		   	{

		    	return 0;

		    	exit;

		   	}

			data.append('key', 'value');

		   	// var lead_id=$('#lead_id').val();

		   	var student_id =  $('#student_id').val();

		   	// alert(student_id);

		   	// return;

		   	$('#loader9').show();

		   	$.ajax(

		   	{

	       		url:window.location.origin+'/file/file_completion9/'+student_id,

	       		// url:'http://www.redstartechs.org/gsis/staging/file/file_completion9/'+student_id,

		       	type:'POST',

		       	data:data,

		       	cache:false,

		       	contentType: false,

		       	processData: false,

		       	success:function(data)

		       	{

		       		$('#loader9').hide();

		       		if(data==2)

		           	{

		               window.location.href=window.location.origin+'/file/index/'+student_id;

		               // window.location.href='http://www.redstartechs.org/gsis/staging/file/index/'+student_id;

		            }

		       		else

		       		{

			       		var obj = jQuery.parseJSON(data);

			       		// alert( obj.gap_certificate );

			       		$("#gap_certificate span").html(obj.gap_certificate);

						$("#download_gap_certificate").html('<a href='+window.location.origin+'/file/download/'+obj.gap_certificate+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i></button></a>');

			       		// $("#download_gap_certificate").html('<a href="http://www.redstartechs.org/gsis/staging/file/download/'+obj.gap_certificate+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i> </button></a>');

						$("#msg9").show();

	               		// setTimeout(function()

	               		// {

	               		// 	$("#msg9").hide(); 

	               		// }, 

	               		// 10000);

	               	}

	       		}

			});

	 	});

	 	// Character Certificate

	 	$('#upload_character_certificate').click(function(e)

		{

		   	e.preventDefault();

		   	var data = new FormData();

		   	var form_data = $('#file_completion_form').serializeArray();

		   	$.each(form_data, function (key, input)

		   	{

		       data.append(input.name, input.value);

		   	});

	    	//input quatation

	   		var quotation_wip = $('input[name="character_certificate"]')[0].files;

	   		if(quotation_wip.length>0)

	   		{

	       		for (var i = 0; i < quotation_wip.length; i++)

	       		{

	          		data.append("character_certificate[]", quotation_wip[i]);

	       		}

	   		}

	   		else

		   	{

		    	return 0;

		    	exit;

		   	}

			data.append('key', 'value');

		   	// var lead_id=$('#lead_id').val();

		   	var student_id =  $('#student_id').val();

		   	// alert(student_id);

		   	// return;

		   	$('#loader10').show();

		   	$.ajax(

		   	{

	       		url:window.location.origin+'/file/file_completion10/'+student_id,

	       		// url:'http://www.redstartechs.org/gsis/staging/file/file_completion10/'+student_id,

		       	type:'POST',

		       	data:data,

		       	cache:false,

		       	contentType: false,

		       	processData: false,

		       	success:function(data)

		       	{

		       		$('#loader10').hide();

		       		if(data==2)

		           	{

		               window.location.href=window.location.origin+'/file/index/'+student_id;

		               // window.location.href='http://www.redstartechs.org/gsis/staging/file/index/'+student_id;

		            }

		       		else

		       		{

			       		var obj = jQuery.parseJSON(data);

			       		// alert( obj.character_certificate );

			       		$("#character_certificate span").html(obj.character_certificate);

						$("#download_character_certificate").html('<a href='+window.location.origin+'/file/download/'+obj.character_certificate+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i></button></a>');

			       		// $("#download_character_certificate").html('<a href="http://www.redstartechs.org/gsis/staging/file/download/'+obj.character_certificate+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i></button></a>');

						$("#msg10").show();

	               		// setTimeout(function()

	               		// {

	               		// 	$("#msg10").hide(); 

	               		// }, 

	               		// 10000);

	               	}

	       		}

			});

	 	});

	 	// Migration Certificate

	 	$('#upload_migration_certificate').click(function(e)

		{

		   	e.preventDefault();

		   	var data = new FormData();

		   	var form_data = $('#file_completion_form').serializeArray();

		   	$.each(form_data, function (key, input)

		   	{

		       data.append(input.name, input.value);

		   	});

	    	//input quatation

	   		var quotation_wip = $('input[name="migration_certificate"]')[0].files;

	   		if(quotation_wip.length>0)

	   		{

	       		for (var i = 0; i < quotation_wip.length; i++)

	       		{

	          		data.append("migration_certificate[]", quotation_wip[i]);

	       		}

	   		}

	   		else

		   	{

		    	return 0;

		    	exit;

		   	}

			data.append('key', 'value');

		   	// var lead_id=$('#lead_id').val();

		   	var student_id =  $('#student_id').val();

		   	// alert(student_id);

		   	// return;

		   	$('#loader11').show();

		   	$.ajax(

		   	{

	       		url:window.location.origin+'/file/file_completion11/'+student_id,

	       		// url:'http://www.redstartechs.org/gsis/staging/file/file_completion11/'+student_id,

		       	type:'POST',

		       	data:data,

		       	cache:false,

		       	contentType: false,

		       	processData: false,

		       	success:function(data)

		       	{

		       		$('#loader11').hide();

		       		if(data==2)

		           	{

		               window.location.href=window.location.origin+'/file/index/'+student_id;

		               // window.location.href='http://www.redstartechs.org/gsis/staging/file/index/'+student_id;

		            }

		       		else

		       		{

			       		var obj = jQuery.parseJSON(data);

			       		// alert( obj.migration_certificate );

			       		$("#migration_certificate span").html(obj.migration_certificate);

						$("#download_migration_certificate").html('<a href='+window.location.origin+'/file/download/'+obj.migration_certificate+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i></button></a>');

			       		// $("#download_migration_certificate").html('<a href="http://www.redstartechs.org/gsis/staging/file/download/'+obj.migration_certificate+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i></button></a>');

						$("#msg11").show();

	               		// setTimeout(function()

	               		// {

	               		// 	$("#msg11").hide(); 

	               		// }, 

	               		// 10000);

	               	}

	       		}

			});

	 	});

	 	// Registration Card

	 	$('#upload_registration_card').click(function(e)

		{

		   	e.preventDefault();

		   	var data = new FormData();

		   	var form_data = $('#file_completion_form').serializeArray();

		   	$.each(form_data, function (key, input)

		   	{

		       data.append(input.name, input.value);

		   	});

	    	//input quatation

	   		var quotation_wip = $('input[name="registration_card"]')[0].files;

	   		if(quotation_wip.length>0)

	   		{

	       		for (var i = 0; i < quotation_wip.length; i++)

	       		{

	          		data.append("registration_card[]", quotation_wip[i]);

	       		}

	   		}

	   		else

		   	{

		    	return 0;

		    	exit;

		   	}

			data.append('key', 'value');

		   	// var lead_id=$('#lead_id').val();

		   	var student_id =  $('#student_id').val();

		   	// alert(student_id);

		   	// return;

		   	$('#loader12').show();

		   	$.ajax(

		   	{

	       		url:window.location.origin+'/file/file_completion12/'+student_id,

	       		// url:'http://www.redstartechs.org/gsis/staging/file/file_completion12/'+student_id,

		       	type:'POST',

		       	data:data,

		       	cache:false,

		       	contentType: false,

		       	processData: false,

		       	success:function(data)

		       	{

		       		$('#loader12').hide();

		       		if(data==2)

		           	{

		               window.location.href=window.location.origin+'/file/index/'+student_id;

		               // window.location.href='http://www.redstartechs.org/gsis/staging/file/index/'+student_id;

		            }

		       		else

		       		{

			       		var obj = jQuery.parseJSON(data);

			       		// alert( obj.registration_card );

			       		$("#registration_card span").html(obj.registration_card);

						$("#download_registration_card").html('<a href='+window.location.origin+'/file/download/'+obj.registration_card+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i></button></a>');

			       		// $("#download_registration_card").html('<a href="http://www.redstartechs.org/gsis/staging/file/download/'+obj.registration_card+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i></button></a>');

						$("#msg12").show();

	               		// setTimeout(function()

	               		// {

	               		// 	$("#msg12").hide(); 

	               		// }, 

	               		// 10000);

	               	}

	       		}

			});

	 	});

	 	//Equivalence Certificate

	 	$('#upload_equivalence_certificate').click(function(e)

		{

		   	e.preventDefault();

		   	var data = new FormData();

		   	var form_data = $('#file_completion_form').serializeArray();

		   	$.each(form_data, function (key, input)

		   	{

		       data.append(input.name, input.value);

		   	});

	    	//input quatation

	   		var quotation_wip = $('input[name="equivalence_certificate"]')[0].files;

	   		if(quotation_wip.length>0)

	   		{

	       		for (var i = 0; i < quotation_wip.length; i++)

	       		{

	          		data.append("equivalence_certificate[]", quotation_wip[i]);

	       		}

	   		}

	   		else

		   	{

		    	return 0;

		    	exit;

		   	}

			data.append('key', 'value');

		   	// var lead_id=$('#lead_id').val();

		   	var student_id =  $('#student_id').val();

		   	// alert(student_id);

		   	// return;

		   	$('#loader13').show();

		   	$.ajax(

		   	{

	       		url:window.location.origin+'/file/file_completion13/'+student_id,

	       		// url:'http://www.redstartechs.org/gsis/staging/file/file_completion13/'+student_id,

		       	type:'POST',

		       	data:data,

		       	cache:false,

		       	contentType: false,

		       	processData: false,

		       	success:function(data)

		       	{

		       		$('#loader13').hide();

		       		if(data==2)

		           	{

		               window.location.href=window.location.origin+'/file/index/'+student_id;

		               // window.location.href='http://www.redstartechs.org/gsis/staging/file/index/'+student_id;

		            }

		       		else

		       		{

			       		var obj = jQuery.parseJSON(data);

			       		// alert( obj.equivalence_certificate );

			       		$("#equivalence_certificate span").html(obj.equivalence_certificate);

						$("#download_equivalence_certificate").html('<a href='+window.location.origin+'/file/download/'+obj.equivalence_certificate+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i></button></a>');

			       		// $("#download_equivalence_certificate").html('<a href="http://www.redstartechs.org/gsis/staging/file/download/'+obj.equivalence_certificate+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i></button></a>');

						$("#msg13").show();

	               		// setTimeout(function()

	               		// {

	               		// 	$("#msg13").hide(); 

	               		// }, 

	               		// 10000);

	               	}

	       		}

			});

	 	});

	 	// Cancelation of Result

	 	$('#upload_cancelation_of_result').click(function(e)

		{

		   	e.preventDefault();

		   	var data = new FormData();

		   	var form_data = $('#file_completion_form').serializeArray();

		   	$.each(form_data, function (key, input)

		   	{

		       data.append(input.name, input.value);

		   	});

	    	//input quatation

	   		var quotation_wip = $('input[name="cancelation_of_result"]')[0].files;

	   		if(quotation_wip.length>0)

	   		{

	       		for (var i = 0; i < quotation_wip.length; i++)

	       		{

	          		data.append("cancelation_of_result[]", quotation_wip[i]);

	       		}

	   		}

	   		else

		   	{

		    	return 0;

		    	exit;

		   	}

			data.append('key', 'value');

		   	// var lead_id=$('#lead_id').val();

		   	var student_id =  $('#student_id').val();

		   	// alert(student_id);

		   	// return;

		   	$('#loader14').show();

		   	$.ajax(

		   	{

	       		url:window.location.origin+'/file/file_completion14/'+student_id,

	       		// url:'http://www.redstartechs.org/gsis/staging/file/file_completion14/'+student_id,

		       	type:'POST',

		       	data:data,

		       	cache:false,

		       	contentType: false,

		       	processData: false,

		       	success:function(data)

		       	{

		       		$('#loader14').hide();

		       		if(data==2)

		           	{

		               window.location.href=window.location.origin+'/file/index/'+student_id;

		               // window.location.href='http://www.redstartechs.org/gsis/staging/file/index/'+student_id;

		            }

		       		else

		       		{

			       		var obj = jQuery.parseJSON(data);

			       		// alert( obj.cancelation_of_result );

			       		$("#cancelation_of_result span").html(obj.cancelation_of_result);

						$("#download_cancelation_of_result").html('<a href='+window.location.origin+'/file/download/'+obj.cancelation_of_result+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i></button></a>');

			       		// $("#download_cancelation_of_result").html('<a href="http://www.redstartechs.org/gsis/staging/file/download/'+obj.cancelation_of_result+'"><button type="button" class="btn btn-info chk2" id=""><i class="fa fa-upload"></i></button></a>');

						$("#msg14").show();

	               		// setTimeout(function()

	               		// {

	               		// 	$("#msg14").hide(); 

	               		// }, 

	               		// 10000);

	               	}

	       		}

			});

	 	});

	});

// File Completion Ajax File Uploads

// $(document).ready(function()

// {

// 	$('#upload_copy_of_paid_fee_challan').click(function(e)

// 	{

// 	   	e.preventDefault();

// 	   	var data = new FormData();

// 	   	var form_data = $('#file_completion_form').serializeArray();

// 	   	$.each(form_data, function (key, input)

// 	   	{

// 	       data.append(input.name, input.value);

// 	   	});

//     	//input quatation

//    		var quotation_wip = $('input[name="copy_of_paid_fee_challan"]')[0].files;

//    		if(quotation_wip.length>0)

//    		{

//        		for (var i = 0; i < quotation_wip.length; i++)

//        		{

//           		data.append("copy_of_paid_fee_challan[]", quotation_wip[i]);

//        		}

//    		}

//    		else

// 	   	{

// 	    	return 0;

// 	    	exit;

// 	   	}

// 		data.append('key', 'value');

// 	   	// var lead_id=$('#lead_id').val();

// 	   	var student_id =  $('#student_id').val();

// 		// alert('hello');

// 		// alert(student_id);

// 		console.log(student_id);

// 		// return;

// 	   	$.ajax(

// 	   	{

// 	       url:window.location.origin+'/file/file_completion/'+student_id,

//            // "url": "http://localhost/gsis/admin/get_data/",

//             // "url": "http://www.redstartechs.org/gsis/staging/admin/get_data/",

// 	       type:'POST',

// 	       data:data,

// 	       cache:false,

// 	       contentType: false,

// 	       processData: false,

// 	       success:function(data)

// 	       	{

// 	       		if(data==1)

// 	       		{

// 	       			$("#msg").show();

// 	       		}

// 	       		else

// 	       		{

// 	       			 window.location.href=window.location.origin+'/file/file_completion/'+student_id;

// 	       	// 		$('#msg').html(data).fadeIn('slow');

// 			     	// $('#msg').html("data insert successfully").fadeIn('slow'); //also show a success message 

// 			     	// $('#msg').delay(5000).fadeOut('slow');

// 	        //        	$("#form")[0].reset();

// 	               	// pre_table(1);

// 	       		}

//            		// setTimeout(function() { $("#msg").hide(); }, 10000);

// 	    //        	if(data==1)

// 	    //        	{

// 					// $('#msg').html(data).fadeIn('slow');

// 			  //    	// $('#msg').html("data insert successfully").fadeIn('slow') //also show a success message 

// 			  //    	$('#msg').delay(5000).fadeOut('slow');

// 	    //            // $("#form")[0].reset();

// 	    //            // pre_table(1);

// 	    //        	}

// 	    //        	else 

// 	    //        	if(data==3)

// 	    //        	{

// 	    //            window.location.href=base_url+ 'auth/';

// 	    //        	}

// 	    //        	else

// 	    //        	{

// 	    //            window.location.href='<?php echo base_url(); ?>upload/';

// 	    //         }

//        		}

// 		});

//  	});

// });

// /File Completion Ajax File Uploads

function image_check(image_name,error_message,button_name)

{

	var type_reg = /^image\/(jpg|png|jpeg)$/;

	// var video_reg=/^video\/(mp4)$/;

	var pdf_reg=/^application\/(pdf)$/;

	var files = $(image_name).get(0).files;

	var size=0;

	var r=0;

	for (i = 0; i < files.length; i++)

	{

		var type = files[i].type;

		console.log(type);

		if (type_reg.test(type))

		{

			console.log(type);

	   	}

	   	else

	   	if(video_reg.test(type))

	   	{

	       console.log(type);

	   	}

	   	else

	   	if(pdf_reg.test(type))

	   	{

	       console.log(type);

	   	}

	   	else

	   	{

	       r=1;

	       break;

	   	}

	   	var  file_size=  files[i].size;

	   	var isize = (file_size / 1024);

	   	isize = (Math.round(isize * 100) / 100);

	   	if(isize > 2048)

	   	{

				size=1;

				break;

		}

	   	else

	   	{

	       console.log("small file  "+file_size);

	   	}

	}

	if(r==1)

	{

  		$(image_name).addClass('error');

	   	$(image_name).css('border-color','rgb(185, 74, 72)');

	   	$(error_message).html('<span class="help-block form-error" style="color:#e73d4a;">Unsupported Format only images,pdf and mp4 video supported</span>');

	   	$(button_name).prop('disabled', true);

	}

	else

	{

		if(size==1)

	   	{

	    	$(image_name).addClass('error');

	       	$(image_name).css('border-color','rgb(185, 74, 72)');

	       	$(error_message).html('<span class="help-block form-error" style="color:#e73d4a;">Large File Upload</span>');

	       	$(button_name).prop('disabled', true);

		}

	   	else

	 	{

	       	$(image_name).removeClass('error');

	       	$(image_name).css('border-color','#27a4b0');

	       	$(error_message).html('');

	       	$(button_name).prop('disabled', false);

	   	}

	}

}