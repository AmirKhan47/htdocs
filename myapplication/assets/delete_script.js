$('document').ready(function() {
	// select all checkbox	
	jQuery('#select_all').on('click', function(e) {
		
		if($(this).is(':checked',true)) {
			$(".emp_checkbox").prop('checked', true);  
		}  
		else {  
			$(".emp_checkbox").prop('checked',false);  
		}		
		// set all checked checkbox count
		$("#select_count").html($("input.emp_checkbox:checked").length+" Selected");
	});
	// set particular checked checkbox count
	$(document).on('click',".emp_checkbox", function(e) {
		$("#select_count").html($("input.emp_checkbox:checked").length+" Selected");
	});	
	// delete selected records
	jQuery('#delete_records').on('click', function(e) { 
		var employee = [];  
		$(".emp_checkbox:checked").each(function() {  
			employee.push($(this).data('emp-id'));
		});	
		if(employee.length <=0)  {  
			swal({
				title: "Please select some records",
				type: "warning",
				closeOnCancel: false
			}); 
		}  
		else { 	
			/*var message = "Are you sure you want to delete "+(employee.length>1?"these":"this")+" record?";  
			var checked = confirm(message);  */
			var selected_values = employee.join(","); 
				//console.log(selected_values);
				var Base_url= $(this).data('action');
				swal({
					title: "Are you sure?",
					text: "You will not be able to recover this action!",
					type: "warning",
					showCancelButton: true,
					confirmButtonClass: 'btn-danger',
					confirmButtonText: 'Yes, delete it!',
					cancelButtonText: "No, cancel it!",
					closeOnConfirm: false,
					closeOnCancel: false
				},
				function (isConfirm) {
					if (isConfirm) {

						$.ajax({ 
							type: "POST",  
							url: Base_url,  
							data: 'emp_id='+selected_values,  
							dataType:"json",
							success: function(response) {	
						//remove deleted employee rows
						// var emp_ids = response.toString().split(",");
						// for (var i=0; i<emp_ids.length; i++ ) {						
						// 	$("#"+emp_ids[i]).remove();

						// }
						console.log(response);
						},
						error: function (xhr, ajaxOptions, thrownError) {
							swal("Error deleting!", "Please try again", "error");
							console.log(xhr.responseText);
						}   
					});
						swal({title: "Deleted!",text: "Your "+(employee.length>1?"records have been ":"record has been ")+"deleted!", type: "success"},
								function(){ 
									location.reload();
								}
							); 
						
					} else {
						swal("Cancelled", "Your "+(employee.length>1?"records are ":"record is ")+"safe :)", "error");
					}
				});
			//if(checked == true) {			

			//}  
		}  
	});
});
