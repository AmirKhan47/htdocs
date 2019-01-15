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
                                        <!-- <th>Sr #</th> -->
                                        <th style="width:100px;">Supplier Name</th>
                                        <th>Email</th>
                                        <th>Licence No</th>
                                        <th>Mobile No</th>
                                        <th>Address</th>
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
   
    //datatables
    table = $('#table').DataTable({ 

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Supplier/supplier_list')?>",
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
    $('.modal-title').text('Add Supplier'); // Set Title to Bootstrap modal title
}

function edit_supplier(id)
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
        url : "<?php echo site_url('Supplier/supplier_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="sup_id"]').val(data.sup_id);
            $('[name="sup_name"]').val(data.sup_name);
            $('[name="sup_licence"]').val(data.sup_licence);
            $('[name="email"]').val(data.email);
            $('[name="phone"]').val(data.phone);
            $('[name="mobile"]').val(data.mobile);
            $('[name="trn_no"]').val(data.tr_no);
            $('[name="business_name"]').val(data.business_name);
            $('[name="emirates"]').val(data.emirates);
           
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Supplier'); // Set title to Bootstrap modal title
            

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
function view_supplier(id)
{
            window.location = "<?php echo site_url('Supplier/supplier_view')?>/"+id;
}
function save()
{

    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('Supplier/supplier_add')?>";
    } else {
        url = "<?php echo site_url('Supplier/supplier_update')?>";
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

function delete_supplier(id)
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
            url : "<?php echo site_url('Supplier/supplier_delete')?>/"+id,
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
                <h3 class="modal-title">Add Supplier</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal"  enctype="multipart/form-data">
                    <input type="hidden" value="" name="sup_id" id="sup_id" /> 
                    <div class="form-body">
                         <div class="row">
                                <div class="col-md-6">
                                 <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Name</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="sup_name" id="sup_name" class="form-control" placeholder="Supplier Name">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Email</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="email"  id="email" class="form-control" placeholder="Supplier Email">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Licence No</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="sup_licence"  id="sup_licence" class="form-control" placeholder="Licence No">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Mobile No</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile Number">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Contact No</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Contact Number">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Address</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <!-- <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Contact No</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="contact_no" id="contact_no" class="form-control" placeholder="Contact Number">
                                    <span class="help-block"></span>
                                  </div>
                                </div> -->
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Business Name</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="business_name" id="business_name" class="form-control" placeholder="Business Name">
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
                                  <label class="col-md-3 col-form-label"><strong>TRN No</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="trn_no"  id="trn_no" class="form-control" placeholder="Tr No">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
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