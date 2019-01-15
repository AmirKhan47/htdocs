<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('layouts/common'); ?>
    <style> 
    .help-block{color:#F00;}
    .error{color:#F00;}
    .Error{color:#F00;}
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
                                    <span class="caption-subject bold uppercase">Manage Cheques </span>
                                </div>
                                <div class="actions">
                                    <div class="btn-group">
                                       <!--  <a data-toggle="modal" href="#addProductModel" class="btn green-haze btn-lg item_edit" >Add Product</a>
                                    </a> -->
                                       
                                </div>
                            </div>
                        </div>              

                        <div class="portlet-body">
                            <div class="row">
                            	<div class="col-md-6">
                            	<h5><strong>Incoming Cheques</strong></h5>

                            		<table class="table table-bordered">
							  <thead style="background-color:#444d58;color:white;">
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">Date</th>
							      <th scope="col">No #</th>
							      <th scope="col">Action</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<?php if(!empty($incoming)) { ?>
							  	<?php $i=1; foreach ($incoming as $name) { ?>
							  	<tr>
							  		<th scope="row"><?php echo $i;?></th>
							  		<td><?php echo $name['cheque_date']?></td>
							  		<td><?php echo $name['cheque_no']?></td>
							  		<td><a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_cheque(<?php echo $name['cheque_no'];?>,'Received')"><i class="glyphicon glyphicon-pencil"></i> </a>
						            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_cheque(<?php echo $name['cheque_no'];?>,'Received')"><i class="glyphicon glyphicon-trash"></i></a>
						           </td>
							  	</tr>
							  	<?php $i++;} }?>
							  </tbody>
							</table>
                            	</div>
                            	<div class="col-md-6">
                            	<h5><strong>Outgoing Cheques</strong></h5>
                            	<table class="table table-bordered">
							  <thead style="background-color:#444d58;color:white;">
							    <tr>
							       <th scope="col">#</th>
							      <th scope="col">Date</th>
							      <th scope="col">No #</th>
							      <th scope="col">Action</th>
							    </tr>
							  </thead>
							  <tbody>
							    <?php if(!empty($outgoing)) { ?>
							  	<?php $i=1; foreach ($outgoing as $name) { ?>
							  	<tr>
							  		<th scope="row"><?php echo $i;?></th>
							  		<td><?php echo $name['cheque_date']?></td>
							  		<td><?php echo $name['cheque_no']?></td>
							  		<td><a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_cheque(<?php echo $name['cheque_no'];?>,'Paid')"><i class="glyphicon glyphicon-pencil"></i> </a>
						            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_cheque(<?php echo $name['cheque_no'];?>,'Paid')"><i class="glyphicon glyphicon-trash"></i></a>
						           </td>
							  	</tr>
							  	<?php $i++;} }?>
							  </tbody>
							</table>
                            	</div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layouts/footer'); ?>
<?php $this->load->view('layouts/common_js'); ?>
<script type="text/javascript">
var save_method; //for save method string
var table;

$(document).ready(function() {
   
 }); 

function edit_cheque(id,type)
{
    var password = prompt("Please enter password:");
    if (password == null || password == "") {
        
    } else {

        $.ajax({
            url : "<?php echo site_url('Login/checkAuth/')?>/" + password,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                // console.log(data);
                if(data==true){
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#cheque_no').val(id);
    $('#cheque_type').val(type);
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Clear Cheques'); // Set Title to Bootstrap modal title
    }else{
                    alert('Password is wrong');
                }
            }
        });
    
    }
}
function delete_cheque(id)
{
    var password = prompt("Please enter password:");
    if (password == null || password == "") {
        
    } else {

        $.ajax({
            url : "<?php echo site_url('Login/checkAuth/')?>/" + password,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                // console.log(data);
                if(data==true){
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('Banking/deleteCheque')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
           	 	window.location = "<?php echo site_url('Banking/cheques')?>";    
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
    }else{
                    alert('Password is wrong');
                }
            }
        });
    
    }
}
</script>
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog" >
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Clear Cheque</h3>
            </div>
            <form action="<?php echo base_url(); ?>Banking/clearCheck" id="form" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                    <input type="hidden" value="" name="cheque_no" id="cheque_no" /> 
                    <input type="hidden" value="" name="cheque_type" id="cheque_type" /> 
                    <div class="form-body">
                         <div class="row">
                                <div class="col-md-12">
                                	<div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Amount</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="cheque_amount" id="cheque_amount" class="form-control" placeholder="Amount" required>
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Select Bank</strong></label>
                                  <div class="col-md-9">
                                  	<select class="form-control" name="banks" id="banks" required > 
                                  		<option></option>  
                                  		<?php if(!empty($banks)) { ?>
                                  		<?php foreach ($banks as $name) { ?>
                                  		<option value="<?php echo $name->bank_id; ?>" ><?php echo $name->bank_name; ?></option>   
                                  		<?php } }?>
                                  	</select>
                                  	<span class="help-block"></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="submit" id="btnSave"  class="btn btn-primary" value="Save" />
                <button type="button" id="btnCancel" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
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