<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('layouts/common'); ?>
    <style> 
    .help-block{color:#F00;}
    .error{color:#F00;}
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
                    <div class="col-md-12 ">
                        <div class="portlet light form-fit bordered">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="icon-settings font-dark"></i>
                                    <span class="caption-subject bold uppercase"> <?php echo $Action; ?> Bank Account</span>
                                </div>
                                <div class="actions">
                                    <div class="btn-group">
                                        <!-- <a class="btn green-haze btn-outline btn-circle btn-sm" data-toggle="modal" href="#transferModel" data-hover="dropdown" data-close-others="true"> Bank Transfer

                                        </a> -->
                                        <a class="btn btn-sm btn-primary"  id="edit" disabled ><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                        <a class="btn btn-sm btn-danger"   id="delete" disabled ><i class="glyphicon glyphicon-trash"></i> Delete</a>
                                        <a class="btn btn-sm btn-info"  id="view" disabled ><i class="glyphicon glyphicon-eye"></i> View</a>

                                    </div>
                                </div>
                            </div>

                            <div class="portlet-body">
                                <!--<a var_dump($acc_balance) id="add_row" class="btn btn-default pull-left">Add Row</a> -->
                                
                                <div class="tiles" style="border-bottom: 1px solid black;">
                                 <?php $temp=1; foreach ($banks as $object): ?>
                                   <?php if($object->bank_name=="Cash"): ?>
                                    <a id="banks[]" name="banks[]" data-id="<?php echo $object->bank_id;?>">
                                     <div class="tile double bg-blue" id="acc'.$object->bank_id.'" >
                                         <div class="tile-body">
                                             <h4 id="account_title"><?php echo $object->bank_name; ?></h4>
                                             <p > Your Balance</p>
                                             <p id="bank_balance"><?php echo $object->bank_balance; ?></p>
                                         </div>
                                         <div class="tile-object">
                                             <div class="name">
                                                 <i class="fa fa-bank"></i>
                                             </div>
                                             <div class="number"><?php echo $temp++ ?></div>
                                         </div>
                                     </div> 
                                 </a>
                             <?php endif; ?>
                         <?php endforeach; ?>

                     </div>
                 </br>
                 <div class="tiles" id="newBank">

                    <!-- adding account -->
                    <?php $temp=1; foreach ($banks as $object): ?> 
                    <?php if($object->bank_name!='Cash'): ?> 
                    <a id="banks[]" name="banks[]" data-id="<?php echo $object->bank_id;?>">
                     <div class="tile double bg-green" id="acc'.$object->bank_id.'" >
                         <div class="tile-body">
                             <h4 id="account_title"><?php echo $object->bank_name; ?></h4>
                             <p > Your Balance</p>
                             <p id="account_balance"><?php echo $object->bank_balance; ?></p>
                         </div>
                         <div class="tile-object">
                             <div class="name">
                                 <i class="fa fa-bank"></i>
                             </div>
                             <div class="number"><?php echo $temp++ ?></div>
                         </div>
                     </div> 
                 </a>
            <?php endif; ?>
             <?php endforeach; ?>
             <!-- <div id='addr1'></div> -->
             <div class="tile double bg-grey-gallery">
                <a id="addnewBank" >
                <!-- <a data-toggle="modal" href="#bank_model" > -->
                    <div class="tile-body">
                        <i class="fa fa-plus"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name"> Please add a new account. </div>

                    </div>
                </a>
            </div>

        </div>

                <!-- STRAT OF BANK TRANSFER ADD MODLE-->
                <!-- <div id="transferModel" class="modal fade" tabindex="-1" data-width="500">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title"><strong>Bank Transfer</strong></h4>
                    </div>
                    <form role="form" id="bank_transfer" name="bank_transfer" action="<?php echo base_url(); ?>index.php/banking/bank_transfer" method="post" class="form-horizontal">
                        <div class="form-body">
                            <div class="modal-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <p>Record the transfer of money between your bank accounts</p>
                                        <p><strong> Paid From Bank Account <span class="required"> * </span></strong>
                                            <select class="form-control input-large" name="paid_bank" id="paid_bank">

                                                <option value="">Select</option>
                                                <?php foreach ($accounts as $object) { ?>

                                                <option value="<?php echo $object->id; ?>"> <?php echo $object->account_name; ?></option>
                                                <?php  } ?>

                                            </select> </p>
                                            <p><strong> Paid Into Bank Account <span class="required"> * </span></strong>
                                                <select class="form-control input-large" name="receive_bank" id="receive_bank">

                                                </select></p>
                                                <p><strong> Method </strong>
                                                    <select class="form-control input-large" name="method" id="method">
                                                        <option value="cash">Cash</option>
                                                        <option value="cheque">Cheque</option>
                                                        <option value="online">Online Transfer</option>
                                                    </select> </p>
                                                    <p><strong> Amount Transferred <span class="required"> * </span></strong>
                                                        <input type="text" class="form-control input-large" name="transfer_amount" id="transfer_amount">
                                                    </p>          
                                                </div>
                                                <div class="col-md-9">  
                                                    <strong> Date Transferred <span class="required"> * </span> </strong>
                                                    <div class="input-group date date-picker1 " data-date-format="dd/mm/yyyy">
                                                        <input type="text" class="form-control form-filter " readonly name="date_transfer" id="date_transfer">
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
                                            <button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
                                        </div>
                                    </div>
                                </form>
                            </div> -->
                            <!-- END OF BANK TRANSFER ADD MODLE -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layouts/footer'); ?>
<?php $this->load->view('layouts/common_js'); ?>
<script>
var save_method; //for save method string

$(document).ready(function () {

    $(document).click(function() {
        $('#edit').attr('disabled',true);
        $('#delete').attr('disabled',true);
        $('#view').attr('disabled',true);
        // save_method='add';
    });

$('#addnewBank').click(function(){
    save_method='add';
    $('#bank_model').modal('show'); // show bootstrap modal when complete loaded
   
 });

$('.tiles').on("click",'[name^=banks]',function(e){
   var id=$(this).data('id');
   //seeting ids.......
   $('#edit').data('id',id);
   $('#delete').data('id',id);
   $('#view').data('id',id);
   //enabling ........
   $('#edit').attr('disabled',false);
   $('#delete').attr('disabled',false);
   $('#view').attr('disabled',false);
    e.stopPropagation(); // This is the preferred method.
    return false;
 });

$('#edit').click(function(){
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
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('Banking/bank_edit/')?>/" + $(this).data('id'),
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);
            $('[name="bank_id"]').val(data.bank_id);
            $('[name="bank_name"]').val(data.bank_name);
            $('[name="bank_description"]').val(data.bank_description);
            $('[name="bank_balance"]').val(data.bank_balance);
           
            $('#bank_model').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Bank'); // Set title to Bootstrap modal title
            

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }else{
                    alert('Password is wrong');
                }
            }
        });
    
    }
});

$('#view').click(function(){
            window.location = "<?php echo site_url('Banking/bank_view')?>/"+$(this).data('id');
});

$('#delete').click(function(){
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
            url : "<?php echo site_url('Banking/bank_delete')?>/"+$(this).data('id'),
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                window.location = "<?php echo site_url('Banking')?>";
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
});

});
function save()
{
    // save_method = 'add';
    
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        // console.log('add');
        $('#form').attr('action', "<?php echo base_url()?>Banking/create_bank");
    } else {
        // console.log('update');
        $('#form').attr('action', "<?php echo base_url()?>Banking/update_bank");        
    }
    //submiting.......
    $('form').submit();
    $('#btnSave').text('save'); //change button text
    $('#btnSave').attr('disabled',false); //set button enable 
}

</script>
<!-- Bootstrap modal -->
<div class="modal fade" id="bank_model" role="dialog" >
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Add Account</h3>
            </div>
            <form role="form" action="<?php echo base_url();?>Banking/create_bank" method="post" id="form" class="form-horizontal"  enctype="multipart/form-data">
            <div class="form-body">
            <div class="modal-body">
                    <input type="hidden" value="" name="bank_id" id="bank_id" /> 
                         <div class="row">
                                <div class="col-md-12">
                                 <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Bank Name</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="bank_name" required id="bank_name" class="form-control" placeholder="Bank Name">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Bank Description</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="bank_description"  id="bank_description" class="form-control" placeholder="Bank Description">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Bank Balance</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="bank_balance"  id="bank_balance" class="form-control" placeholder="Bank Balance">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                    </div>
            </div>
            <div class="form-actions">
            <div class="modal-footer">
                <input type="button" id="btnSave" onclick="save()" class="btn btn-primary" value="Save" />
                <button type="button" id="btnCancel" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
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