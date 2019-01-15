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
                                    <span class="caption-subject bold uppercase">Manage Store </span>
                                </div>
                                <div class="actions">
                                    <div class="btn-group">
                                       <!--  <a data-toggle="modal" href="#addProductModel" class="btn green-haze btn-lg item_edit" >Add Product</a>
                                    </a> -->
                                       
                                </div>
                            </div>
                        </div>              

                        <div class="portlet-body">
                            <button class="btn btn-success col-md-offset-11" onclick="add_customer()"><i class="glyphicon glyphicon-plus"></i> </button>
                            <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i></button>
                            <br />
                            <br />
                            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Sr #</th>
                                        <th>Due Date</th>
                                        <th style="width:200px;">Customer Name</th>
                                        <th style="width:200px;">Customer Business Name</th>
                                        <th>Contact No</th>
                                        <th>Total Credit</th>
                                        <th style="width:200px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
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
      $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        todayBtn: true,
        todayHighlight: true,
        setDate: new Date()

    });
    $(".datepicker").datepicker("setDate", new Date());
    // tagInput.....;
     $("#unique_id").tagit({readOnly: true});
     $('#prd_class').editableSelect();
    //datatables
    table = $('#table').DataTable({ 

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Customer/customer_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });

    //datepicker
    // $('.datepicker').datepicker({
    //     autoclose: true,
    //     format: "yyyy-mm-dd",
    //     todayHighlight: true,
    //     orientation: "top auto",
    //     todayBtn: true,
    //     todayHighlight: true,  
    // });

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

   
});

function add_customer()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Customer'); // Set Title to Bootstrap modal title
}

function edit_customer(id)
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
                    save_method = 'update';
                    $('#form')[0].reset(); // reset form on modals
                    $('.form-group').removeClass('has-error'); // clear error class
                    $('.help-block').empty(); // clear error string

                    //Ajax Load data from ajax
                    $.ajax({
                        url : "<?php echo site_url('Customer/customer_edit/')?>/" + id,
                        type: "GET",
                        dataType: "JSON",
                        success: function(data)
                        {
                            console.log(data);
                            $('[name="cust_id"]').val(data.cust_id);
                            $('[name="due_date"]').val(data.due_date);
                            $('[name="cust_name"]').val(data.cust_name);
                            $('[name="cust_contact"]').val(data.cust_contact);
                            $('[name="cust_idcard"]').val(data.cust_idcard);
                            $('[name="cust_business_name"]').val(data.cust_business_name);
                            $('[name="cust_business_licence"]').val(data.cust_business_licence);
                            $('[name="emirates"]').val(data.emirates);
                            $('[name="cust_nationality"]').val(data.cust_nationality);
                            $('[name="cust_mobl"]').val(data.cust_mobl);
                            $('[name="cust_location"]').val(data.cust_location);
                            $('[name="cust_email"]').val(data.cust_email);
                            $('[name="trn_no"]').val(data.trn_no);
                            // $('[name="cust_received_amount"]').val(data.cust_received_amount);

                            // $('[name="cust_idcard"]').val(data.cust_idcard);
                            // $('[name="cust_agrement"]').val(data.cust_agrement);
                            // $('[name="cust_passport"]').val(data.cust_passport);
                            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                            $('.modal-title').text('Edit Customer'); // Set title to Bootstrap modal title
                            // $('[name="dob"]').datepicker('update',data.dob);
                           

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
    
    
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function cancel()
{
   
}
function view_customer(id)
{
            window.location = "<?php echo site_url('Customer/customer_view')?>/"+id;
}
function save()
{

    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('Customer/customer_add')?>";
    } else {
        url = "<?php echo site_url('Customer/customer_update')?>";
    }
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        // data: $('#form').serialize(),
        data: new FormData($('form')[0]),
        // dataType: "JSON",
        processData: false,
        contentType: false,
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {   
                    
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    console.log(
                    $('[name="'+data.inputerror[i]+'"]').next().text() //select span help-block class set text error string
                        );
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function(xhr, status, error) 
        {
           // alert(xhr.responseText);
           console.log(xhr.responseText);
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function delete_customer(id)
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
            url : "<?php echo site_url('Customer/customer_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Add New Customer</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal"  enctype="multipart/form-data">
                    <input type="hidden" value="" name="cust_id" id="cust_id" /> 
                    <div class="form-body">
                         <div class="row">
                                <div class="col-md-6">
                                 <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Due Date</strong></label>
                                  <div class="col-md-9">
                                    <input name="due_date" id="due_date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text"  >
                                    <span class="help-block"></span>
                                  </div>
                                </div>   
                                 <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Name</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="cust_name" id="cust_name" class="form-control" placeholder="Customer Name">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Contact No</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="cust_contact" id="cust_contact" class="form-control" placeholder="Contact Number">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Id Card No</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="cust_idcard" id="cust_idcard" class="form-control" placeholder="Customer Id Card Number">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Business Name</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="cust_business_name" id="cust_business_name" class="form-control" placeholder="Business Name">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Business Licence NO</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="cust_business_licence" id="cust_business_licence" class="form-control" placeholder="Business Licence NO">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong> Emirates </strong></label>
                                  <div class="dropdown col-md-9">
                                        <select class="form-control" id="emirates" name="emirates">
                                                <option>Ras Al Khaimah</option>
                                                <option>Dubai</option>
                                                 <option>Sharjah</option>
                                                 <option>Amjan</option>
                                                 <option>Umm al-Quwain‎</option>
                                                 <option>Abu Dhabi</option>
                                                 <option>Fujairah</option>
                                        </select>
                                    
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong> Licence Copy </strong></label>
                                  <div class="col-md-9">
                                    <input type="file" name="cust_licence" id="cust_licence" class="form-control">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-md-3">Id Card Copy</label>
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> </div>
                                            <div>
                                                <span class="btn red btn-outline btn-file">
                                                    <span class="fileinput-new"> Select image </span>
                                                    <span class="fileinput-exists"> Change </span>
                                                    <input type="file" name="cust_idcard_copy"> </span>
                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                </div>
                              <div class="col-md-6">
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong> Nationality </strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="cust_nationality" id="cust_nationality" class="form-control" placeholder="Customer Nationality" />
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Mobile No</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="cust_mobl" id="cust_mobl" class="form-control" placeholder="Customer Mobile No">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Address</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="cust_location" id="cust_location" class="form-control" placeholder="Address">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Email</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="cust_email"  id="cust_email" class="form-control" placeholder="Email">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>TRN No</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="trn_no"  id="trn_no" class="form-control" placeholder="Tr No">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Agrement</strong></label>
                                  <div class="col-md-9">
                                    <input type="file" name="cust_agrement" id="cust_agrement" class="form-control">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Passport</strong></label>
                                  <div class="col-md-9">
                                    <input type="file" name="cust_passport" id="cust_passport" class="form-control">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <!-- <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong> Received Amount </strong></label>
                                  <div class="col-md-9">
                                    <input type="number" name="cust_received_amount" id="cust_received_amount" class="form-control">
                                    <span class="help-block"></span>
                                  </div>
                                </div> -->
                              </div>
                            </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" id="btnCancel" onclick="cancel()" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
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