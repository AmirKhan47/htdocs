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
                                        <th>Sr #</th>
                                        <th style="width:200px;">Product Name</th>
                                        <th>Supplier Name</th>
                                        <th>Category Name</th>
                                        <th>Brand Name</th>
                                        <th>Total Quantity</th>
                                        <th>Cost Price</th>
                                        <th style="width:140px;">Action</th>
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

$(document).ready(function() {
    // tagInput.....;
     $("#unique_id").tagit({readOnly: true});
     $('#prd_class').editableSelect();
    //datatables
    table = $('#table').DataTable({ 

        // "processing": true, //Feature control the processing indicator.
        // "serverSide": true, //Feature control DataTables' server-side processing mode.
        // "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('store/product_list')?>",
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
    $('#prd_qty').change(function() { 
    if($(this).val()!=0){
        $("#unique_id").tagit("destroy");
        $("#unique_id").tagit({ tagLimit: $(this).val()  });
    }else{
            // $("#unique_id").attr('readonly',true);
    }
     });
    
       
       

});

function rentFeildon(){
       $("#prd_rent_per_day").attr('disabled',false);
       $("#prd_rent_per_month").attr('disabled',false);
       $('#rentFeilds').show();
   }
   function saleFeildon(){
        $("#prd_cost_price").attr('disabled',false);
        $("#prd_sale_price").attr('disabled',false);
        $('#saleFeilds').show();
   }function rentFeildoff(){
       $("#prd_rent_per_day").attr('disabled',true);
       $("#prd_rent_per_month").attr('disabled',true);
       $('#rentFeilds').hide();
   }
   function saleFeildoff(){
         $("#prd_cost_price").attr('disabled',true);
            $("#prd_sale_price").attr('disabled',true);
            $('#saleFeilds').hide();
   }

function add_product()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Product'); // Set Title to Bootstrap modal title
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
    $('#unique_id').tagit("removeAll");
    $("#unique_id").tagit("destroy");
     var qty=0;  
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('Store/product_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="prd_id"]').val(data.prd_id);
            $('[name="supplier"]').val(data.sup_id);
            $('[name="prd_code"]').val(data.prd_code);
            $('[name="prd_name"]').val(data.prd_name);
            $('[name="unit_cost"]').val(data.unit_cost);
            // $('[name="prd_brand"]').val(data.prd_brand);
            // $('[name="prd_model"]').val(data.prd_model);
            // $('[name="prd_size"]').val(data.prd_size);
            // $('[name="prd_color"]').val(data.prd_color);
            $('[name="prd_qty"]').val(data.prd_qty);
            qty=data.prd_qty;
            $('[name="prd_category"]').val(data.prd_category);
            $('[name="prd_cost_price"]').val(data.prd_cost_price);
            $('[name="prd_sale_price"]').val(data.prd_sale_price);
            $('[name="prd_rent_per_day"]').val(data.prd_rent_per_day);
            $('[name="prd_rent_per_month"]').val(data.prd_rent_per_month);
            $('[name="prd_class"]').val(data.prd_class);

            if(data.prd_category=='rent'){
                rentFeildon();
                saleFeildoff();
            }else if (data.prd_category=='sale'){
                rentFeildoff();
                saleFeildon();
            }else{
                rentFeildoff();
                saleFeildoff();
            }

            // $('[name="dob"]').datepicker('update',data.dob);
           

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    
     //Ajax Load unique ids ajax
    $.ajax({
        url : "<?php echo site_url('Store/product_uniqueids/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data2)
        {
           
            $("#unique_id").tagit({ tagLimit: qty });
            
            for (var i = 0; i < data2.length; i++) {                
                  $('#unique_id').tagit("createTag", data2[i]['prd_unique_id']);
             }; 

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
    rentFeildoff();
    saleFeildoff();
}

function save()
{
    console.log($('#unique_id').tagit('assignedTags'));
    $('#uniqueIdValue').val($('#unique_id').tagit('assignedTags'));
    console.log($('#uniqueIdValue').val());

    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('Store/product_add')?>";
    } else {
        url = "<?php echo site_url('Store/product_update')?>";
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
                rentFeildoff();
                saleFeildoff();
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
            console.log( xhr.responseText);
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

</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Add Product</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" value="" name="prd_id" id="prd_id" /> 
                    <div class="form-body">
                         <div class="row">
                                <div class="col-md-6">
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Name</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="prd_name"  id="prd_name" class="form-control" placeholder="Product Name">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Supplier</strong></label>
                                  <div class="col-md-9">
                                    <select class="form-control" id="supplier"  name="supplier">
                                    <option></option>  
                                    <?php if(!empty($supplier)) { ?>
                                    <?php foreach ($supplier as $name) { ?>
                                    <option value="<?php echo $name->sup_id; ?>"><?php echo $name->sup_name; ?></option>   
                                    <?php } }?>    
                                    </select>
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Last Unit Cost</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" name="unit_cost" id="unit_cost" class="form-control" placeholder="Product Code">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-md-3 col-form-label"><strong>Picture</strong></label>
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> </div>
                                            <div>
                                                <span class="btn red btn-outline btn-file">
                                                    <span class="fileinput-new"> Select image </span>
                                                    <span class="fileinput-exists"> Change </span>
                                                    <input type="file" name="picture"> </span>
                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                              </div>
                              <div class="col-md-6">
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Item Class</strong></label>
                                  <div class="col-md-9">
                                    <select class="form-control" id="prd_class"  name="prd_class">
                                    <option></option>  
                                    <?php if(!empty($prdoduct_class)) { ?>
                                    <?php foreach ($prdoduct_class as $name) { ?>
                                    <option value="<?php echo $name['prd_class']; ?>"><?php echo $name['prd_class']; ?></option>   
                                    <?php } }?>    
                                    </select>  
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Quantity</strong></label>
                                  <div class="col-md-9">
                                    <input type="number" name="prd_qty" id="prd_qty" class="form-control" value="0" placeholder="Product Quantity" />
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3"><strong>Unique id</strong></label>
                                    <div class="col-md-9">
                                       <ul id="unique_id"></ul>
                                    <input type="hidden" id="uniqueIdValue" name="uniqueIdValue" />
                                    </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Category</strong></label>
                                  <div class="col-md-9">
                                    <select class="form-control"  id="prd_category"  name="prd_category">
                                      <option ></option>
                                      <!-- <option selected disabled >Product Category</option> -->
                                      <option value="rent">Rental</option>
                                      <option value="sale">Sale</option>
                                    </select>        
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div id="saleFeilds" hidden>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Cost Price</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" disabled name="prd_cost_price" id="prd_cost_price" class="form-control" placeholder="Product Cost Price">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Sale Price</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" disabled name="prd_sale_price" id="prd_sale_price" class="form-control" placeholder="Product Sale Price">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                            </div>
                                <div id="rentFeilds" hidden>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Rent Per Day</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" disabled name="prd_rent_per_day" id="prd_rent_per_day" class="form-control" placeholder="Product Rent Per Day">
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group ">
                                  <label class="col-md-3 col-form-label"><strong>Rent Per Month</strong></label>
                                  <div class="col-md-9">
                                    <input type="text" disabled name="prd_rent_per_month" id="prd_rent_per_month" class="form-control" placeholder="Product Rent Per Month">
                                    <span class="help-block"></span>
                                  </div>
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