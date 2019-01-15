	<!DOCTYPE html>
	<html lang="en">
	<head>
		<?php $this->load->view('layouts/common'); ?>
		<style> 
		.help-block{color:#F00;}
		.error{color:#F00;}
		.Error{color:#F00;}
		.rows_selected {
			margin-top:7px;
			float:left;
			font-weight:bold;
		}
		</style>
	</head>
	<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
		<?php $this->load->view('layouts/header'); ?>
		<div class="page-container">
			<?php $this->load->view('layouts/side_bar_menu'); ?>
			<div class="page-content-wrapper">
				<div class="page-content">
					<?php $this->load->view('layouts/breadcrumb'); ?>

					<div class="row">
						<div class="col-md-12">
							<div class="portlet light bordered">
								<div class="portlet-title">
									<div class="caption font-dark">
										<i class="icon-settings font-dark"></i>
										<span class="caption-subject bold uppercase">Supplier Details</span>
									</div>
									<div class="tools">
										<div class="actions">
											<div class="btn-group">
												<a class="btn green-haze btn-outline btn-circle btn-sm" data-toggle="modal" href="#productModel" data-hover="dropdown" data-close-others="true"> Add Product 

												</a>

											</div>
										</div>
									</div>
								</div>
								<div class="portlet-body">
									<form action="#" class="horizontal-form">
										<div class="form-body">
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Supplier Name</label>
														<input id="sup_name" class="form-control" readonly  type="text" value="<?php echo $entry['name']; ?>">
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<label class="control-label">Credit Days</label>
														<input id="credit_days" class="form-control" readonly  type="number" value="<?php echo $entry['cr_limit']; ?>">

													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<label class="control-label">Credit Amount</label>
														<input id="credit_amount" class="form-control" readonly  type="number" value="<?php echo $entry['cr_amount']; ?>">

													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<label class="control-label"><strong style="color:#36c6d3">Paid Amount</strong></label>
														<input id="type" readonly style="background-color: rgba(0, 0, 0, 0);border:none;"  class="form-control" disabled  type="text" value="<?php if(!empty($transactions[0])){ echo $transactions[0]['paid_balance']; }?>">

													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<label class="control-label"><strong style="color:#ed6b75;">Remaing Amount</strong></label>
														<input id="type" readonly style="background-color: rgba(0, 0, 0, 0);border:none;"  class="form-control" disabled  type="text" value="<?php if(!empty($transactions[0])){ echo $transactions[0]['remain_balance']; }?>">

													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Email</label>
														<input id="email" class="form-control" readonly  type="text" value="<?php echo $entry['email']; ?>">
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<label class="control-label">Phone Number</label>
														<input id="ph_number" class="form-control" readonly  type="number" value="<?php echo $entry['ph_number']; ?>">

													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<label class="control-label">Address</label>
														<input id="address" class="form-control" readonly  type="text" value="<?php echo $entry['address']; ?>">

													</div>
												</div>
											</div>	
										</div>
									<div class="form-actions">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default btn-edit" type="button" value="Edit" ><span class="glyphicon glyphicon-pencil"></span> EDIT</button>
                                            <button class="btn green btn-save" type="button" value="Save"><span class="fa fa-save"></span> SAVE</button>
                                            <button class="btn btn-default btn-cancel" type="button">CANCEL</button>
                                        </span>
                                        <div  id="wait" hidden>
                                        <img src="<?php echo base_url(); ?>uploaded/ajax-loader.gif" />
                                    </div>
                                    </div>

                                </div>
									</form>                                    
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="portlet light bordered">
								<div class="portlet-title">
									<div class="caption font-dark">
										<i class="icon-settings font-dark"></i>
										<span class="caption-subject bold uppercase">Manage Transactions</span>
									</div>
									<div class="tools"></div>

								</div>
								<div class="portlet-body">
									<div class="tab-content">
										<div class="tab-pane active" id="tab11">
											<form name="frmlegaccountlist" id="frmlegaccountlist" method="post" action="contacts/customer">
												<table style="cursor:pointer" class="table table-striped table-bordered table-hover table-checkable order-column" id="manage_tbl">
													<thead>
														<tr>
															<!-- <th>
																<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
																	<input type="checkbox" class="group-checkable" id="select_all" />
																	<span></span>
																</label>

															</th> -->
															<th># Sr</th>
															<th> Due Date</th>
															<th> Received From </th>
															<th> Quotation No</th>
															<!-- <th> Project / Trade Name / Quotation</th> -->
															<th> Amount </th>
															<th> Status </th>
															<th> Actions </th>

														</tr>
													</thead>
													<tbody>
														<?php if(!empty($transactions)): ?>
														<?php $i=1; foreach($transactions as $row): ?>
														<tr id="<?php echo $row['trans_id'] ?>">
															<!-- <td>
																<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
																	<input type="checkbox" class="emp_checkbox" class="checkboxes" data-emp-id="<?php echo $row['trans_id'] ?>" />
																	<span></span>
																</label>
															</td> -->
															<td><?php echo $i ; ?></td>
															<td><?php echo $row['due_date']; ?> </td>
															<td><?php echo $row['from_type']; ?></td>
															<td><?php echo $row['quo_no']; ?></td>
															<!-- <td><?php echo $row['from_name']; ?></td> -->
															<td><?php echo $row['amount']; ?></td>
															
															<td>
																<?php if($row['status'] == 0): ?>

																<span class="label label-md label-danger">Unpaid</span>
															<?php else: ?>
															<span class="label label-md label-success">Paid</span>
														<?php endif; ?> 
													</td>

													<td id="<?php echo $row['trans_id'] ?>___/<?php echo $row['amount'] ?>___/<?php echo $entry['name']; ?>___/<?php echo $entry['supplier_id']; ?>___/<?php echo $row['quo_no']; ?>___/<?php echo $row['from_id']; ?>___/<?php echo $row['tax']; ?>___/<?php echo $row['from_type']; ?>">
														<?php if($row['status'] == 0): ?>
														<a id="status" class="btn btn-sm btn-outline green tooltips" data-original-title="Status" data-placement="top" ><i class="fa fa-pencil-square-o"></i></a>&nbsp;
													<?php else: ?>
													<a class="btn btn-sm btn-outline green tooltips" disabled data-original-title="Status" data-placement="top"><i class="fa fa-pencil-square-o"></i></a>&nbsp;
												<?php endif; ?>
											</td>
										</tr>

										<?php $i++; endforeach; ?>
									<?php endif; ?>
								</tbody>
							</table>

						</form>
						
						<div class="clearfix"></div>
					</div>


				</div>
				<!-- STRAT OF Add Project MODLE-->
				<div id="productModel" class="modal fade" tabindex="-1" data-width="500">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
						<h4 class="modal-title"><strong>Add Product</strong></h4>
					</div>
					<form role="form" id="addProductForm" name="addProductForm" action="<?php echo base_url(); ?>index.php/Supplier/add_Product/<?php echo $this->uri->segment(3); ?>" method="post" class="form-horizontal">
						<div class="form-body">
							<div class="modal-body">
								<div class="row">

									<div class="col-md-12">
										<strong> Product Name <span class="required"> * </span></strong>
										<input type="text" required class="form-control input-large" name="product" id="product" />
									</br>
									<strong> Unit Price <span class="required"> * </span></strong>
									<input type="text" required class="form-control input-large" name="price" id="price" />
									<input type="hidden" name="prd_id" id="prd_id" />
									
								</div>

							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="modal-footer">
							<input type="submit" id="submit" name="submit" class="btn green" value="Save" >
							<button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
						</div>
					</div>
				</form>
			</div>
			<!-- END OF Add Project MODLE -->
			<!-- STRAT OF Add Project MODLE-->
			<div id="recordpaymentModel" class="modal fade" tabindex="-1" data-width="500">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title"><strong>Add Payment Record</strong></h4>
				</div>
				<p> <span class="label label-md label-info">Note:</span> <strong>Amount: <span id="dAmount"></span> </strong> &nbsp; can be deducted or added.</span> </p>
				<form role="form" id="add_paymentRecord" name="add_paymentRecord" action="<?php echo base_url(); ?>index.php/Project/add_paymentRecord/<?php echo $this->uri->segment(3); ?>" method="post" class="form-horizontal">
					<div class="form-body">
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<strong> Bank <span class="required"> * </span></strong>
									<select class="form-control input-large" id="bank"  name="bank">
										<option></option>
										<?php foreach ($banks as $object): ?>
										<option value="<?php echo $object->id; ?>"><?php echo $object->account_name; ?></option>
									<?php endforeach; ?>
								</select>  
								<p class="Error" style="display:none;">Your Bank account has not suffecient balance.</p>
							</br>
							<strong> Paid Method <span class="required"> * </span></strong>
							<select  class="form-control input-large" name="method" id="method">
								<option></option>
								<option value="cash">Cash</option>
								<option value="cheque">Cheque</option>
								<option value="online">Online Transfer</option>
							</select>
							<input type="hidden" id="response" name="response" value="" />

							<div id="chequeNo" class="hidden">

								<strong> Enter Cheque Number <span class="required"> </span></strong> 
								<input type="text" required class="form-control input-large" name="Cheq" id="Cheq" />
							</div>
						</br>                    
					</div>
					<div class="col-md-9">  
						<strong> Date <span class="required"> * </span> </strong>
						<div class="input-group date date-picker " data-date-format="dd/mm/yyyy">
							<input type="text" class="form-control form-filter " readonly name="date" id="date">
							<span class="input-group-btn">
								<button class="btn btn-medium default" type="button">
									<i class="fa fa-calendar"></i>
								</button>
							</span>
						</div>

					</div>

				</div>
			</div>
		</div>
		<div class="form-actions">
			<div class="modal-footer">
				<input type="submit" id="submit" name="submit" class="btn green" value="Save" >
				<button type="button" id="closeModel" name"closeModel" data-dismiss="modal" class="btn btn-outline dark">Close</button>
			</div>
		</div>
	</form>
</div>
<!-- END OF Add Project MODLE -->
</div>
</div>
</div>
</div>
<!-- end of mananged transactions.. -->
<table style="cursor:pointer" class="table table table-striped table-bordered" id="product_tbl">
	<thead>
		<tr style="background-color:#444d58;color:white;" >
			<th><label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
				<input type="checkbox" class="group-checkable" id="select_all" />
				<span></span>
				</label>
			</th>
			<th> # Sr</th>
			<th> Product Name </th>
			<th> Unit Price </th>

		</tr>
	</thead>
	<tbody>
		<?php if(!empty($products)): ?>
		<?php $i=1; foreach($products as $row): ?>
		<tr class='clickable-row' data-row-id="<?php echo $i;?>" data-prd-id="<?php echo $row['prd_id'];?>">
			<td>
				<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
					<input type="checkbox" class="emp_checkbox" class="checkboxes" data-emp-id="<?php echo $row['prd_id']; ?>" />
					<span></span>
				</label>
			</td>
			<td><?php echo $i ; ?></td>
			<td id="name_<?php echo $i; ?>"><?php echo $row['product_name']; ?> </td>
			<td id="price_<?php echo $i; ?>"><?php echo $row['price']; ?> </td>

		</tr>
		<?php $i++; endforeach; ?>
	<?php endif; ?>
</tbody>
</table>
		<div class="row">
			<div class="col-md-3 well">
				<span class="rows_selected" id="select_count">0 Selected</span>
				<a type="button" class="btn btn-sm btn-outline red tooltips pull-right" data-original-title="Delete Selected" data-placement="top" id="delete_records" data-action="<?php echo base_url() ?>index.php/Supplier/deleteSupplierProduct" >Delete Selected</a>
			</div>

		</div>
</div>
</div>
</div>
<!-- varibales for global use... -->
<script>
window.table_id = "manage_tbl";
window.arr=1;
window.table_id2 = "product_tbl";

</script>
<?php $this->load->view('layouts/footer'); ?>
<?php $this->load->view('layouts/common_js'); ?>
<script>
$(document).ready(function () {
	$(".date-picker").datepicker("setDate", new Date());

	//$(".clickable-row").on('dbclick', function() {
    $("#product_tbl").on("dblclick", ".clickable-row" ,function(){

		var id= $(this).data("row-id");
		var prd_id= $(this).data("prd-id");

		console.log(prd_id);

		$('#product').val(jQuery.trim($('#name_'+id).text()));
		$('#price').val(parseInt($('#price_'+id).text()));
		$('#prd_id').val(prd_id);

		$('#addProductForm').attr('action', '<?php echo base_url(); ?>index.php/Supplier/updateProducts/<?php echo $this->uri->segment(3); ?>');	
		$('#productModel').modal("show");
	});

	$('#tab11').on("click","#status",function(){ 
		var rowId=($(this).closest('td'));
		var response=($(rowId).attr("id"));
		$('#response').val(response);
		arr = response.split("___/");
		$("#dAmount").text(arr[1]);
		$('#add_paymentRecord').attr('action', '<?php echo base_url(); ?>index.php/Supplier/clearPayment/<?php echo $this->uri->segment(3); ?>');
		$('#recordpaymentModel').modal("show");

	});

	$("#method").change(function(){
		if($("#method").val()=="cheque"){
			$("#chequeNo").removeClass('hidden');

		}else{
			$("#chequeNo").addClass('hidden');

		}

	});

	$("#bank").change(function(){
		var amount = arr[1];
		console.log(amount);
		var bank=$("#bank").val();
		console.log(bank);
		$.ajax({

			url:"<?php echo base_url() ?>index.php/it/checkBankBalance",
			type: "POST",
			data: {amount:amount,bank:bank},
			dataType:"json",
			success:function(data){
				console.log(data);
				if(data==true){
					$('.Error').hide();
				}else{
					$('.Error').show();
					$("#bank").val("");
				}

			}
		});

	});
	
	$('#closeModel').click(function(){
		$('#recordpaymentModel').on('hidden.bs.modal', function () {
			$(this).find('form').trigger('reset');
			$("#chequeNo").addClass('hidden');
		});

		$('.Error').hide();
		$("#recordpaymentModel").modal('hide');

	});

	$("#amount").focusout(function(){
		var amount = $("#amount").val();
		var bank=$("#bank").val();
		if($("#payment_type").val()=="Outsourced"){
			$.ajax({

				url:"<?php echo base_url() ?>index.php/it/checkBankBalance",
				type: "POST",
				data: {amount:amount,bank:bank},
				dataType:"json",
				success:function(data){

					if(data==true){
						$('.Error').hide();
					}else{
						$('.Error').show();
						$("#amount").val("");
					}

				}
			});
		}


	});

	$("#addProductForm").validate({
		rules: {
			product: {
				required: true,
			},
			price: {
				required: true,
				number:true,
			},
		},
		messages: {
			product: {
				required: "Please Enter Name",
			},
			price: {
				required: "Please Enter Price",
				number:"Please Enter Valid Data"
			},
		}
	});
	$("#add_paymentRecord").validate({
		rules: {
			bank: {
				required: true,
			},
			method: {
				required: true,

			},
			date: {
				required: true,
			}
		},
		messages: {
			bank: {
				required: "Please Enter Bank",
			},
			method: {
				required: "Please Enter Type",
			},
			date: {
				required: "Please Select Date",
			}
		}
	});
});
</script>
<script>
$(document).ready(function () {
// $('#save').hide();
$('.btn-save, .btn-cancel').hide();
var sup_name,credit_days,credit_amount,email,ph_number,address;

$('.btn-edit').click(function () {
    $(this).closest('div').find('.btn-edit').hide();
    $(this).closest('div').find('.btn-save, .btn-cancel').show();

    $('#sup_name').removeAttr('readonly');
    sup_name=$('#sup_name').val();
    $('#credit_days').removeAttr('readonly');
    credit_days=$('#credit_days').val();
    $('#credit_amount').removeAttr('readonly');
    credit_amount=$('#credit_amount').val();

    $('#email').removeAttr('readonly');
    email=$('#email').val();
    $('#ph_number').removeAttr('readonly');
    ph_number=$('#ph_number').val();
    $('#address').removeAttr('readonly');
    address=$('#address').val();
});

$('.btn-save').click(function () {

    var sav_sup_name,sav_credit_days,sav_credit_amount,sav_email,sav_ph_number,sav_address;
    sav_sup_name=$('#sup_name').val();
    sav_credit_days=$('#credit_days').val();
    sav_credit_amount=$('#credit_amount').val();
	sav_email=$('#email').val();
    sav_ph_number=$('#ph_number').val();
    sav_address=$('#address').val();

    $('#email').attr('readonly', 'readonly');
    $('#ph_number').attr('readonly', 'readonly');
    $('#address').attr('readonly', 'readonly');

    $('#sup_name').attr('readonly', 'readonly');
    $('#credit_days').attr('readonly', 'readonly');
    $('#credit_amount').attr('readonly', 'readonly');
    $(this).closest('div').find('.btn-save, .btn-cancel').hide();
    $(this).closest('div').find('.btn-edit').show();
        // console.log("<?php echo base_url();?>/index.php/Banking/updateRecord");
        $.ajax({ 

          url:"<?php echo base_url() ?>index.php/Supplier/updateRecord",
          type: "POST",
          data:{  sup_name:sav_sup_name, credit_days:sav_credit_days,credit_amount:sav_credit_amount,email:sav_email,ph_number:sav_ph_number,address:sav_address ,id:'<?php echo $this->uri->segment(3);?>'},
          dataType:"json", 
          beforeSend: function() { $('#wait').show(); },
          complete: function() { $('#wait').hide(); },
          success:function(data){
        }
    });

    });
$('.btn-cancel').click(function () {

   $('#sup_name').val(sup_name);
   $('#credit_days').val(credit_days);
    $('#credit_amount').val(credit_amount);
	$('#email').val(email);
   $('#ph_number').val(ph_number);
    $('#address').val(address);

   $('#email').attr('readonly', 'readonly');
   $('#ph_number').attr('readonly', 'readonly');
    $('#address').attr('readonly', 'readonly');        

	$('#sup_name').attr('readonly', 'readonly');
   $('#credit_days').attr('readonly', 'readonly');
    $('#credit_amount').attr('readonly', 'readonly'); 

   $(this).closest('div').find('.btn-save, .btn-cancel').hide();
   $(this).closest('div').find('.btn-edit').show();
});

}); 

</script>
	<?php 
	if($this->session->flashdata('success')){
		$message=$this->session->flashdata('success');
		echo "<script>    toastr.success('".$message."') </script>";
	}else if($this->session->flashdata('error')){
		$message=$this->session->flashdata('error');
		echo "<script>    toastr.error('".$message."') </script>";
	}
	?>
</body>
</html>