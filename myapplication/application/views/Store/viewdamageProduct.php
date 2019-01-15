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
                                    <span class="caption-subject bold uppercase">Manage Detail </span>
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
                            <!-- <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i></button> -->
                            <br />
                            <br />
                            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Sr #</th>
                                        <th style="width:200px;">Date</th>
                                        <th>Product Name</th>
                                        <th>Product Quantity</th>
                                        <th>Total Price </th>
                                        <th style="width:200px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<!--<?php if(!empty($detail)): ?>
                                	<?php $i=1; foreach($detail as $row): ?>-->
                                	<!-- <tr>

                                		<td><?php echo $i; ?></td>
                                		<td><?php echo $row['date']; ?></td>
                                		<td><?php echo $row['prd_name']; ?></td>
                                		<td><?php echo $row['mat_qty']; ?> </td>
                                		<td><?php echo $row['mat_price']; ?> </td>
                                		<td> <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_damage_product_detail('<?php echo $row['ddp_id']; ?>')"><i class="glyphicon glyphicon-trash"></i> Delete</a></td>
                                	</tr> -->

                                	<!--<?php $i++; endforeach; ?>
                                <?php endif; ?> -->
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
var proudctQty=0;
var productPrice=0;
var damageProductID=0;

$(document).ready(function() {
     // $('#prd_name').editableSelect();
    //datatables
    var url = window.location.pathname;
    var id = url.substring(url.lastIndexOf('/') + 1);
    // console.log(id);
    table = $('#table').DataTable({ 
        "searching": false,
        "bFilter":false,
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('store/view_material_list')?>/"+id,
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
        //Ajax Load quantity ajax
        $.ajax({
        	url : "<?php echo site_url('Store/product_qty/')?>/" + $('#prd_name option:selected').val(),
        	type: "GET",
        	dataType: "JSON",
        	success: function(data){
        		// console.log(data);
        		$('#prd_qty').val(data[0]['prd_qty']);
        		$('#prd_price').val(data[0]['prd_qty']*data[0]['prd_cost_price']);
        		$('#prd_qty').attr('disabled',false);
                proudctQty=data[0]['prd_qty'];
                productPrice=data[0]['prd_cost_price'];

        	},
        	error: function (jqXHR, textStatus, errorThrown)
        	{
            // alert('Error get data from ajax
        }
    });
    });
    $('#prd_qty').change(function() { 
        console.log($(this).val());
        console.log(proudctQty);
    	if(parseInt($(this).val())>parseInt(proudctQty)){
    		$('#prd_qty').val(proudctQty);
        	$('#prd_price').val(proudctQty*productPrice);

    	}else{
        	$('#prd_price').val($('#prd_qty').val()*productPrice);

    	}
    });      

});
function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
	// location.reload(true);
}

function add_product()
{
	damageProductID=('<?php echo  $this->uri->segment(3); ?>');
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Material'); // Set Title to Bootstrap modal title
}

// function edit_product(id)
// {
//     save_method = 'update';
//     $('#form')[0].reset(); // reset form on modals
//     $('.form-group').removeClass('has-error'); // clear error class
//     $('.help-block').empty(); // clear error string
//     var uniqueID='';  
//     var prdID;  
//     //Ajax Load data from ajax
//     $.ajax({
//         url : "<?php echo site_url('Store/damage_product_edit/')?>/" + id,
//         type: "GET",
//         dataType: "JSON",
//         success: function(data)
//         {
//             $('#unique_id').html('');
//             $('[name="dp_id"]').val(id);
//             $('#prd_name').find('option[value="' + data.prd_id + '"]').attr("selected", "selected");
//             $('[name="prd_qty"]').val(data.prd_qty);
//             $('[name="date"]').datepicker('update',data.date);
           
//                  $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
//                 $('.modal-title').text('Edit Product'); // Set title to Bootstrap modal title
                    
//         },
//         error: function (jqXHR, textStatus, errorThrown)
//         {
//             alert('Error get data from ajax');
//         }
//     });
// }


function cancel()
{

}

function save()
{
   
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('Store/damage_product_detail_add')?>/"+damageProductID;
    } else {
        url = "<?php echo site_url('Store/damage_product_detail_update')?>";
    }
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            reload_table();

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
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
           // alert();
           console.log(xhr.responseText)
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function delete_damage_product_detail(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('Store/damage_product_detail_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function(xhr, status, error) 
            {
           // alert();
           console.log(xhr.responseText) 
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
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="dp_id" id="dp_id" /> 
                    <input type="hidden" value="" name="prd_cost" id="prd_cost" /> 
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
                                    <option></option>  
                                    <?php if(!empty($prdoduct_name)) { ?>
                                    <?php foreach ($prdoduct_name as $name) { ?>
                                    <option value="<?php echo $name->prd_id; ?>"><?php echo $name->prd_name; ?></option>   
                                    <?php } }?>    
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
                          <label class="col-md-3 col-form-label"><strong>Total Price</strong></label>
                          <div class="col-md-6">
                            <input type="number" readonly name="prd_price" id="prd_price" class="form-control" />
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