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
                            <button class="btn btn-success col-md-offset-11" onclick="add_product()"><i class="glyphicon glyphicon-plus"></i> </button>
                            <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i></button>
                            <br />
                            <br />
                            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <!-- <th>Sr #</th> -->
                                        <th style="width:200px;">Date</th>
                                        <th>Product Name</th>
                                        <th>Damage Note</th>
                                        <th>Product Unique</th>
                                        <th>Product Quantity</th>
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
$(document).ready(function(){
    $("#prd_category").change(function(){
        var value=$("#prd_category").val();
            console.log(value);

        if(value=='rent'){
            rentFeildon();
            saleFeildoff();
        }else if (value=='sale'){
            rentFeildoff();
            saleFeildon();
        }else{
            rentFeildoff();
            saleFeildoff();
        }
    });

});
</script>
<script type="text/javascript">

var save_method; //for save method string
var table;
var proudctQty=0;

$(document).ready(function() {
  // $('#prd_name').select2();

     // $('#prd_name').editableSelect();
    //datatables
    table = $('#table').DataTable({ 

        // "processing": true, //Feature control the processing indicator.
        // "serverSide": true, //Feature control DataTables' server-side processing mode.
        // "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('store/damage_product_list')?>",
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

    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        todayBtn: true,
        todayHighlight: true,  
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

    $('#prd_name').change(function() { 
    //Ajax Load unique ids ajax
    $.ajax({
        url : "<?php echo site_url('Store/product_uniqueids/')?>/" + $('#prd_name option:selected').val(),
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('#unique_id').html('');
                $('#unique_id').append('<option></option>');
            for (var i = 0; i < data.length; i++) {      
                $('#unique_id').append('<option value=' + data[i]['prd_unique_id']+'>' + data[i]['prd_unique_id'] + '</option>');

            };             
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            // alert('Error get data from ajax
                $('#unique_id').html('');
            }
        });
        //Ajax Load quantity ajax
        $.ajax({
            url : "<?php echo site_url('Store/product_qty/')?>/" + $('#prd_name option:selected').val(),
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $('#prd_qty').val(data[0]['prd_qty']);
                $('#prd_qty').attr('disabled',false);
                proudctQty=data[0]['prd_qty'];
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
            // alert('Error get data from ajax
        }
    });
    });

$('#unique_id').change(function() { 
    if($(this).val()!=''){

        $('#prd_qty').attr('disabled',true);
    }else{
        $('#prd_qty').attr('disabled',false);

    }
});      

$('#prd_qty').change(function() { 

    if($(this).val()>proudctQty){
        $('#prd_qty').val(proudctQty);

    }
});      


});

function add_product()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Product'); // Set Title to Bootstrap modal title
}

function update_status (id) {
    // body...
    $('#form2')[0].reset(); // reset form on modals
    $.ajax({
        url : "<?php echo site_url('Store/damage_product_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);
            $('[name="dp_id"]').val(parseInt(id));
            $('[name="dunique_id"]').val(data.prd_unique_id);
            $('[name="dprd_id"]').val(data.prd_id);
            $('[name="dprd_qty"]').val(data.prd_qty);
            $('#modal_form2').modal('show'); // show bootstrap modal when complete loaded
                    
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
                // alert('Error get data from ajax');
        }

        });
}
function save2()
{
   
    $('#btnSave2').text('saving...'); //change button text
    $('#btnSave2').attr('disabled',true); //set button disable 
    var url;

        url = "<?php echo site_url('Store/damage_product_status_update')?>";
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form2').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form2').modal('hide');
                reload_table();
            }
            else
            {
                
            }
            $('#btnSave2').text('save'); //change button text
            $('#btnSave2').attr('disabled',false); //set button enable 


        },
        error: function(xhr, status, error) 
        {
            // alert(xhr.responseText);
            console.log(xhr.responseText);
        }
    });
}
function edit_product(id)
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
    var uniqueID='';  
    var prdID;  
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('Store/damage_product_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            // console.log(data);
            // console.log(data.prd_id);
            $('#prd_name').val(data.prd_id);
            $('#description').val(data.description);
            $('#unique_id').html('');
            $('[name="dp_id"]').val(parseInt(id));
            // console.log($('[name="dp_id"]').val());
            // $('#prd_name').find('option[value="' + data.prd_id + '"]').attr("selected", "selected");
            // $('[name="prd_qty"]').val(data.prd_qty);
            $('[name="date"]').datepicker('update',data.date);
            // uniqueID=data.prd_unique_id;
            prdID=data.prd_id;
            // console.log(prdID);
                 //Ajax Load unique ids ajax
                  $.ajax({
                    url : "<?php echo site_url('Store/product_qty/')?>/" + prdID,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data3)
                    {
                        
                        // $('#prd_qty').val(parseInt(data3[0]['prd_qty'])+parseInt(data.prd_qty));
                        // proudctQty=parseInt(data3[0]['prd_qty'])+parseInt(data.prd_qty);
                        $('#prd_qty').val(parseInt(data3[0]['prd_qty']));
                        proudctQty=parseInt(data3[0]['prd_qty']);

                     },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error get data from ajax');
                    }
                });

                 $.ajax({
                    url : "<?php echo site_url('Store/product_uniqueids/')?>/" + prdID,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data2)
                    {
                        $('#unique_id').append('<option></option>');
                        for (var i = 0; i < data2.length; i++) {      
                        $('#unique_id').append('<option value=' + data2[i]['prd_unique_id']+'>' + data2[i]['prd_unique_id'] + '</option>');
                        };

                        console.log(data.prd_unique_id);
                        $('#unique_id').val(data.prd_unique_id); 
                        if($('#unique_id :selected').text()==''){
                         $('#prd_qty').attr('disabled',false);
                         }else{
                         $('#prd_qty').attr('disabled',true);

                         }

                        },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error get data from ajax');
                    }
                });
                 // if($('#unique_id :selected').text()==''){
                 // $('#prd_qty').attr('disabled',false);
                 // }else{
                 // $('#prd_qty').attr('disabled',true);

                 // }
                 $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Product'); // Set title to Bootstrap modal title
                    
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
    console.log($('#prd_name').val());
    $('#prd_name').val('0')
    console.log($('#prd_name').val());

    // mysel = document.getElementById('prd_name');
    // mysel.selectedIndex = 0;
    // alert(mysel.value);
    $('#unique_id').html('');
    $('#prd_qty').attr('disabled',true);
}

function save()
{
   
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('Store/damage_product_add')?>";
    } else {
        url = "<?php echo site_url('Store/damage_product_update')?>";
    }
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
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

function delete_product(id)
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
            url : "<?php echo site_url('Store/product_delete')?>/"+id,
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

function view_product(id)
{
            window.location = "<?php echo site_url('Store/product_view')?>/"+id;
}

</script>
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form2" role="dialog" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Update Status</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form2" class="form-horizontal">
                    <input type="hidden" value="" name="dp_id" id="dp_id" /> 
                    <input type="hidden" value="" name="dprd_id" id="dprd_id" /> 
                    <input type="hidden" value="" name="dunique_id" id="dunique_id" /> 
                    <input type="hidden" value="" name="dprd_qty" id="dprd_qty" /> 
                    <div class="form-body">
                       <div class="row">
                        <div class="col-md-6">
                             <div class="form-group ">
                              <label class="col-md-3 col-form-label"><strong>Date</strong></label>
                            <div class="col-md-6">
                                    <input name="repaired_date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group ">
                      <label class="col-md-3 col-form-label"><strong>Status</strong></label>
                      <div class="col-md-6">
                        <select class="form-control" name="status" id="status" required>
                            <option></option>
                            <option value="1">Completed</option>
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
                <button type="button" id="btnSave2" onclick="save2()" class="btn btn-primary">Save</button>
                <button type="button" id="btnCancel" onclick="cancel()" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Add Product</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="dp_id" id="dp_id" /> 
                    <div class="form-body">
                       <div class="row">
                        <div class="col-md-8">
                             <div class="form-group ">
                              <label class="col-md-3 col-form-label"><strong>Date</strong></label>
                            <div class="col-md-6">
                                    <input name="date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group ">
                              <label class="col-md-3 col-form-label"><strong>Product Name</strong></label>
                              <div class="col-md-6">
                                <select class="form-control" id="prd_name"  name="prd_name">
                                    <option value="0"></option>  
                                    <?php if(!empty($prdoduct_name)) { ?>
                                    <?php foreach ($prdoduct_name as $name) { ?>
                                    <option value="<?php echo $name['prd_id']; ?>"><?php echo $name['prd_name']; ?></option>   
                                    <?php } }?>    
                                </select>  
                                <span class="help-block"></span>
                            </div>
                        </div>    
                        <div class="form-group ">
                            <label class="col-md-3 col-form-label"><strong>Unique ID</strong></label>
                            <div class="col-md-6">
                                <select class="form-control" id="unique_id"  name="unique_id"> 
                                </select>  
                                <span class="help-block"></span>
                            </div>
                        </div>  
                        <div class="form-group ">
                          <label class="col-md-3 col-form-label"><strong>Quantity</strong></label>
                          <div class="col-md-6">
                            <input type="number" disabled name="prd_qty" id="prd_qty" class="form-control" />
                            <span class="help-block"></span>
                            </div>
                         </div>
                        <div class="form-group ">
                          <label class="col-md-3 col-form-label"><strong>Note</strong></label>
                          <div class="col-md-6">
                            <textarea type="text" name="description" id="description" class="form-control" placeholder="Damage Note"></textarea>
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