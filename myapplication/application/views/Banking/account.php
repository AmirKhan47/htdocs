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
                            <button class="btn btn-success col-md-offset-11" onclick="add_account()"><i class="glyphicon glyphicon-plus"></i> </button>
                            <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i></button>
                            <br />
                            <br />
                            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Sr #</th>
                                        <th style="width:100px;">Account Name</th>
                                        <th>Description</th>
                                        <th>Type</th>
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
            "url": "<?php echo site_url('Banking/account_list')?>",
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

function add_account()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Account'); // Set Title to Bootstrap modal title
}

function edit_account(id)
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
        url : "<?php echo site_url('Banking/account_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="account_id"]').val(data.id);
            $('[name="account_name"]').val(data.account_name);
            $('[name="account_description"]').val(data.account_description);
            $('[name="account_type"]').val(data.account_type);
           
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Account'); // Set title to Bootstrap modal title
            

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
function view_account(id)
{
            window.location = "<?php echo site_url('Banking/account_view')?>/"+id;
}
function save()
{

    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('Banking/account_add')?>";
    } else {
        url = "<?php echo site_url('Banking/account_update')?>";
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

function delete_account(id)
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
            url : "<?php echo site_url('Banking/account_delete')?>/"+id,
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
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Add Account</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal"  enctype="multipart/form-data">
                    <input type="hidden" value="" name="account_id" id="account_id" /> 
                    <div class="form-body">
                         <div class="row">
                                <div class="col-md-12">
                                 <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Account Name</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="account_name" id="account_name" class="form-control" placeholder="Account Name">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Account Description</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="account_description"  id="account_description" class="form-control" placeholder="Account Description">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Account Type</strong></label>
                                  <div class="col-md-9">
                                    <select class="form-control" id="account_type" name="account_type" >
                                        <option value="credit">Credit</option>
                                        <option value="debit">Debit</option>
                                    </select>
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