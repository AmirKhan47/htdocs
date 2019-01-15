<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('layouts/common'); ?>
    <style> 
    .help-block{color:#F00;}
    .error{color:#F00;}
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
                                    <span class="caption-subject bold uppercase">Manage Store</span>
                                </div>
                                <div class="actions">
                                    <div class="btn-group">
                                        <a class="btn green-haze btn-outline btn-circle btn-lg" data-toggle="modal" href="#tradeModel" data-hover="dropdown" data-close-others="true"> Add New Material
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                   <div class="tab-pane active" id="tab11">
                                    <form name="frmlegaccountlist" id="frmlegaccountlist" method="post" action="contacts/customer">
                                        <table style="cursor:pointer" class="table table-striped table-bordered table-hover table-checkable order-column" id="store_tbl">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="group-checkable" id="select_all" />
                                                            <span></span>
                                                        </label>
                                                    </th>
                                                    <th># Sr</th>
                                                    <th> Date </th>
                                                    <th> Quotation No </th>
                                                    <th> Supplier Name </th>
                                                    <th>Total Amount </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        <?php if(!empty($materials)): ?>
                                          <?php $i=1; foreach($materials as $row): ?>
                                        <tr class='clickable-row' id="<?php echo $row['material_id'] ?>" data-url="material_detail/<?php echo $row['material_id'];?>">
                                                   <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="emp_checkbox" class="checkboxes" data-emp-id="<?php echo $row['material_id'] ?>" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row['date']; ?></td>
                                                <td><?php echo $row['quo_no']; ?> </td>
                                                <td><?php echo $row['supplier_name']; ?> </td>
                                                <!-- <td><?php echo $row['quo_no']; ?> </td> -->
                                                <td><?php echo $row['total_price']; ?> </td>
                                            </tr>
                                            <?php $i++; endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </form>
                            <div class="row">
                                <div class="col-md-3 well">
                                    <span class="rows_selected" id="select_count">0 Selected</span>
                                    <a type="button" class="btn btn-sm btn-outline red tooltips pull-right" data-original-title="Delete Selected" data-placement="top" id="delete_records" data-action="<?php echo base_url() ?>index.php/Store/deleteRecord" >Delete Selected</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!-- STRAT OF Add Project MODLE-->
                    <div id="tradeModel" class="modal fade" tabindex="-1" data-width="1000">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><strong>Add Material</strong></h4>
                        </div>
                        <form role="form" id="addTrade" name="addTrade" action="<?php echo base_url(); ?>index.php/Store/addProducts" method="post" class="form-horizontal">
                            <div class="form-body">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <strong> Select Supplier <span class="required">  </span></strong>
                                                    <select class="form-control " required name="supplier_name" id="supplier_name">
                                                        <option></option>
                                                        <?php if(!empty($suppliers)): ?>
                                                        <?php foreach ($suppliers as $object): ?>
                                                            <option value="<?php echo $object['supplier_id'].'_'.$object['name'].'_'.$object['cr_limit']; ?>"><?php echo $object['name']; ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                    </select>
                                            </div>  
                                                    <div class="col-md-3" >
                                                        <strong> Quotation No <span class="required"> * </span></strong>
                                                        <input type="text" class="form-control " name="quo_no" id="quo_no" />
                                                    </div>
                                                    <div class="col-md-3">  
                                                        <strong> Date <span class="required"> * </span> </strong>
                                                        <div class="input-group date date-picker " data-date-format="dd/mm/yyyy">
                                                            <input type="text" class="form-control form-filter " readonly name="start_date" id="start_date">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-small default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </br>
                                    </div>
                                </br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table table-striped table-bordered" id="dynamic_field">
                                            <tr>
                                                <td><strong> Select Product <span class="required"> * </span></strong>
                                                   <span class="required"><select class="form-control input-medium" name="product[]" id="product_0">
                                                <option></option>
                                            </select></span>
                                               </td>
                                                <td><strong> Select Store <span class="required"> * </span></strong>
                                                <select class="form-control input-small" required name="store_name[]" id="store_name_0">
                                                        <option></option>
                                                        <option value="Al_Jazeera">Al Jazeera</option>
                                                        <option value="Al_Ghail">Al Ghail</option>
                                                        <option value="ACC">ACC</option>
                                                        <option value="Office">Office</option>
                                                        
                                                </select>
                                               </td>
                                               <td>
                                                <strong> Amount <span class="required"> * </span></strong>
                                                <input type="text" readonly class="form-control input-small" name="amount[]" id="amount_0">
                                            </td>
                                            <td>
                                                <strong> Quantity <span class="required"> * </span></strong>
                                                <input type="text" class="form-control input-small" name="qty[]" id="qty_0" >
                                            </td>
                                            <td>
                                            </br>
                                            <input type="button" name="add" id="add" class="btn green" value="Add More"> 
                                        </td>   
                                    </tr> 
                                </table>
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
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- varibales for global use... -->
<script>
window.table_id = "store_tbl";
  var selectData=new Array();

</script>
<?php $this->load->view('layouts/footer'); ?>
<?php $this->load->view('layouts/common_js'); ?>
<script>  
$(document).ready(function(){ 

  var i=0;  
  $('#add').click(function(){  
   i++;  
   $('#dynamic_field').append('<tr id="row'+i+'"><td><strong> Select Product <span class="required"> * </span></strong><select class="form-control input-medium" name="product[' + i + ']' + '" id="product_' + i + '""><option></option></select></td><td><select class="form-control input-small" required name="store_name[' + i + ']' + '" id="store_name_' + i + '"><option></option><option value="Al_Jazeera">Al Jazeera</option><option value="Al_Ghail">Al Ghail</option><option value="ACC">ACC</option><option value="Office">Office</option></select></td><td><strong> Amount <span class="required"> * </span></strong><input type="text" required readonly class="form-control input-small" name="amount[' + i + ']' + '" id="amount_' + i + '"></td><td><strong> Quantity <span class="required"> * </span></strong><input type="text" required class="form-control input-small" name="qty[' + i + ']' + '" id="qty_' + i + '" > </td> <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
   $('#product_'+i).append(selectData);

});  
  $(document).on('click', '.btn_remove', function(){  
   var button_id = $(this).attr("id");   
   $('#row'+button_id+'').remove();  
});     

});  
</script>
<script>
$(document).ready(function () {
    $(".date-picker").datepicker("setDate", new Date());
    
    $("#store_tbl").on("dblclick", ".clickable-row" ,function(){
    //$(".clickable-row").on('dblclick', function() {
       window.location = $(this).data("url");
   });

    var supplier_id;
    $("#supplier_name").change(function(){
       supplier_id=$('#supplier_name').val();
       //Removing and clearing row............
       var table_rows =$("#dynamic_field tr").length;
       for (var i = 0; i < table_rows; i++) {

            $('#product_'+i).empty().append('<option></option>');
            $('#amount_'+i).val('');
            $('#qty_'+i).val('');
            $('#store_name_'+i).val('');
            $('#row'+(i+1)).remove();  
            
       };
           

       //Populating data.............
        $.ajax({

            url:"<?php echo base_url() ?>index.php/Store/getProducts",
            type: "POST",
            data: {id:supplier_id},
            dataType:"json",

            success:function(data){
                console.log(data);
                    // Get select
                var select = document.getElementById('product_0');
                // Add options
                for (var i in data) {
                    $(select).append('<option value=' + data[i]['prd_id']+'_'+data[i]['product_name'] + '>' + data[i]['product_name'] + '</option>');
                    selectData[i]='<option value=' + data[i]['prd_id']+'_'+data[i]['product_name'] + '>' + data[i]['product_name'] + '</option>';
                }
            }
        });
    });
    $('#dynamic_field').on("change",'[name^=product]',function(){ 

        //var selected_option = $(this).childern(":selected").;
        //var id = $(this).find('option:selected').attr('id');
        //console.log($(this).attr('id'));
        var res = $(this).attr('id').split("_");
        //console.log(res[1]);
        var id = $(this).find(":selected").val();
        //var rowId=($(this).closest('tr'));

        //console.log($(rowId).children(':nth-child(2)').children().attr('id'));
        
        

        //var id=$('#product').val();
        
        if(id==''){
            $('#amount_'+res[1]).val('');
        }

        $.ajax({

            url:"<?php echo base_url() ?>index.php/Store/getPrice",
            type: "POST",
            data: {id:id,sup_id:supplier_id},
            dataType:"json",

            success:function(data){
                console.log(data);
                $('#amount_'+res[1]).val(data);  
            }

        });
    });

    var i=1;
    $("#addTrade").validate({
        rules: {
            perm_name: {
                required: true,
            },
            local_name: {
                required: true,
            },
            quo_no: {
                required: true,
            },
            
            'description[]': { 
                required:true,
            },
            'amount[]': { 
                required:true,
                number:true,
            },
            'qty[]': { 
                required:true,
                number:true,
            },
            start_date: {
                required: true,
            }
        },
        messages: {
            perm_name: {
                required: "Please Enter Supplier Name",
            },
            local_name: {
                required: "Please Enter Name",
            },
            quo_no: {
                required: "Please Enter Quotation No",
            },
            'description[]': { 
                required: "Please Enter Description",
            },
            'amount[]': { 
                required: "Please Enter Amount",
                number: "Please Enter Valid Data",
            },
            'qty[]': { 
                required: "Please Enter Quantity",
                number: "Please Enter Valid Data",
            },
            start_date: {
                required: "Please Select Date",
            }
        }
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