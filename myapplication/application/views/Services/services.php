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
                                    <span class="caption-subject bold uppercase">Add New Services </span>
                                </div>
                                <div class="actions">
                                    <div class="btn-group">
                                       <!--  <a data-toggle="modal" href="#addProductModel" class="btn green-haze btn-lg item_edit" >Add Product</a>
                                    </a> -->
                                       
                                </div>
                            </div>
                        </div>              

                        <div class="portlet-body">
                    <form id="form" class="form-horizontal" action="<?php echo base_url(); ?>Services/<?php if(isset($detail)){ echo 'updateServices';}else{ echo 'addServices';} ?>/<?php echo $this->uri->segment(3);?>" method="post">
                    <input type="hidden" value="<?php if(isset($detail)){ echo $detail->service_id; } ?>" name="service_id" id="service_id" />
                    <input type="hidden" value="<?php if(isset($detail)){ echo $detail->invoice_id; } ?>" name="invoice_id" id="invoice_id" /> 
                    <div class="form-group">
                         <div class="row">
                            <div class="col-md-3">
                                
                                    <label class="control-label"><strong>Invoice No</strong></label>
                                     <input name="slip_no" readonly placeholder="Slip No" class="form-control" value="<?php if(isset($detail) && $detail->virtual_invoice!=""){ echo $detail->virtual_invoice; }else{ echo $tr_no->virtual_invoice; } ?>" type="text">
                                     <input type="hidden" name="invoice_id" value="<?php if(isset($detail) ){ echo $detail->invoice_id ;} ?>" />
                                     <span class="help-block"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><strong>Invoice Date</strong></label>
                                <div class="input-icon">
                                    <i class="fa fa-clock-o"></i>
                                    <input name="date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text" value="<?php if(isset($detail)){ echo $detail->date; } ?>"> </div>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><strong> Time</strong></label>
                                <div class="input-icon">
                                    <i class="fa fa-clock-o"></i>
                                    <input type="text" class="form-control timepicker timepicker-default" value="<?php if(isset($detail)){ echo $detail->time; }else{} ?>" name="time" id="time"> </div>
                            </div>
                            
                        </div>
                        
                    </div>

                    <div class="form-group">
                         <div class="row">
                            <div class="col-md-3">
                                    <input type="hidden" id="checkCustomer" name="checkCustomer" value="<?php if(isset($detail) && $detail->cust_name != 0){ echo 1; } ?>"/>
                                    <label class="control-label"><strong>Customer Name</strong></label>
                                    <input type="text" class="form-control" list="name-options" id="cust_name" name="cust_name" value="<?php if(isset($detail)){ echo $detail->cust_name; } ?>" />
                                    <datalist id="name-options" >
                                    <?php foreach ($customers as $customer) {
                                       echo '<option value="'.$customer->cust_name.'" data-id="'.$customer->cust_id.'" "><input name="cust_id" type="hidden" value="'.$customer->cust_id.'">'.$customer->cust_name.'</option>';
                                    } ?>    
                                    </datalist>
                                </br>
                                <span class="help-block"></span>
                            </div>
                            <div class="col-md-3">
                                    <label class="control-label"><strong>Contact No</strong></label>
                                     <input name="contact_number" id="contact_number" list="mob-options" placeholder="" class="form-control" type="text" value="<?php if(isset($detail)){ echo $detail->contact_no; } ?>">
                                      <datalist id="mob-options" >
                                    <?php foreach ($customers as $customer) {
                                       echo '<option value="'.$customer->cust_mobl.'" data-id="'.$customer->cust_id.'" "><input name="cust_id" type="hidden" value="'.$customer->cust_id.'">'.$customer->cust_mobl.'</option>';
                                    } ?>    
                                    </datalist>
                                     <span class="help-block"></span>
                            </div>

                            <div class="col-md-3">
                                    <label class="control-label"><strong>Esstimated Charges</strong></label>
                                     <input name="charges" id="charges" placeholder="Charges" class="form-control" row="5" type="text" value="<?php if(isset($detail)){ echo $detail->estimated_charges; } ?>" />
                                     <span class="help-block"></span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <div class="row">
                             <div class="col-md-5">
                                    <label class="control-label"><strong>Comments/Problems</strong></label>
                                     <textarea name="comments" id="comments" placeholder="Comments/Problems" class="form-control" row="5" type="text"><?php if(isset($detail)){ echo $detail->problems; } ?></textarea>
                                     <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="button"  name="add" id="add" class="btn green" value="Add Products"> 
                            <table class="table table table-striped table-bordered" id="dynamic_field">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Qty</th>
                                            <th>Price </th>
                                            <th>Vat Amount</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <?php print_r($saleDetail); ?> -->
                                        <!-- <?php print_r($products); ?> -->
                                    <?php if(isset($servicesDetail)){ ?>
                                    <?php $i=00; $y=0; foreach ($servicesDetail as $sale) { ?>
                                    <tr id="row<?php echo $i; ?>">
                                        <td><select class="form-control input-medium" name="productname[]" id="productname_<?php echo $i; ?>">
                                            <option></option>
                                            <?php if(!empty($products)){ ?>
                                            <?php foreach ($products as $items) {
                                             if($items->prd_id == $sale['prd_id']) {?>
                                                <option value="<?php echo $items->prd_id; ?>" > <?php echo $items->prd_name;?> </option>
                                             <?php } ?>
                                                <option value="<?php echo $items->prd_id; ?>" <?php if($sale['prd_id']==$items->prd_id){ echo 'selected';} ?>> <?php echo $items->prd_name;?> </option>
                                            <?php } }else { ?>
                                                <option value="<?php echo $sale['prd_id']; ?>" selected > <?php echo $sale['prd_id'];?> </option>
                                                <?php }?>
                                            </select>
                                        </td>
                                        <td><input type="text"  required class="form-control" value="<?php echo $sale['prd_qty']; ?>" data-original-qty="<?php echo $sale['prd_qty']; ?>" name="qty[]" id="qty_<?php echo $i; ?>" > </td>
                                         <td><input type="text"   class="form-control" value="<?php echo $sale['prd_price']; ?>"  name="price[]" id="price_<?php echo $i; ?>" > </td>
                                        <td><input type="text" readonly class="form-control" value="<?php echo $sale['prd_vat'];  ?>" name="vatamount[]" id="vatamount_<?php echo $i; ?>" > </td>
                                        <td><input type="text" readonly  class="form-control" value="<?php echo $sale['prd_total'];  ?>" name="totalprice[]" id="totalprice_<?php echo $i; ?>" > </td>
                                        <td><button type="button" name="remove" id="<?php echo $i; ?>" class="btn btn-danger btn_remove">X</button></td>
                                    </tr> 
                                    <?php $i++; } } ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </br>
                </br>
                </br>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-8 col-md-2">
                                <a href="<?php echo base_url(); ?>Services"><button type="button" class="btn default" >Cancel</button></a>
                                <button type="submit" class="btn blue">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
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
var selectData=new Array();
var proudctQty=0;
// function getAutho(){
//     console.log($('#name-options').val());
// }
$(document).ready(function() {
  $('#sup_name').select2();
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        todayBtn: true,
        todayHighlight: true,
        setDate: new Date()

    });
    $(".datepicker").datepicker("setDate", new Date());
//Geeting products.............
    $.ajax({

        url:"<?php echo base_url() ?>/Store/getAllProducts",
        type: "POST",
        // data: {id:supplier_id},
        dataType:"json",

        success:function(data){
            // console.log(data);
            
                // Get select
            // var select = document.getElementById('product_0');
            // Add options
            for (var i in data) {
                if(data[i]['prd_qty']!=0)
                selectData[i]='<option value=' + data[i]['prd_id']+'>' + data[i]['prd_name'] + '</option>';
              // console.log(selectData[i]);
            }
        }
    });

    $('#cust_name').change(function() { 
 
 var id=$('#name-options option').filter(function() {
        return $('#cust_name').val() == this.value;
}).data("id");   

    if(typeof id != "undefined"){   
     
    $('#checkCustomer').val('1');

    $.ajax({
        url : "<?php echo site_url('Customer/customerPersons/')?>/"+ id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);
            $('#autorized_person').html('');
            $('#autorized_person').append('<option></option>');
            for (var i = 0; i < data.length; i++) {                
                  $('#autorized_person').append('<option value="'+data[i]['ap_id']+'">'+data[i]['person_name']+'</option>');
             }; 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

$.ajax({
    url : "<?php echo site_url('Customer/customerDetail/')?>/"+ id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
        console.log(data);
        $('#contact_number').val(data.cust_contact); 
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        alert('Error get data from ajax');
    }
});

}else{
    $('#checkCustomer').val('0');

}

});
$('#contact_number').change(function() { 
 
 var id=$('#mob-options option').filter(function() {
        return $('#contact_number').val() == this.value;
}).data("id");   

    if(typeof id != "undefined"){   
     
    $('#checkCustomer').val('1');

    $.ajax({
        url : "<?php echo site_url('Customer/customerPersons/')?>/"+ id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);
            $('#autorized_person').html('');
            $('#autorized_person').append('<option></option>');
            for (var i = 0; i < data.length; i++) {                
                  $('#autorized_person').append('<option value="'+data[i]['ap_id']+'">'+data[i]['person_name']+'</option>');
             }; 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

$.ajax({
    url : "<?php echo site_url('Customer/customerDetail/')?>/"+ id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
        console.log(data);
        $('#cust_name').val(data.cust_name); 
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        alert('Error get data from ajax');
    }
});

}else{
    $('#checkCustomer').val('0');

}

});



  var i=0; 
  var prData=''; 
  $('#add').click(function(){  
   // i++;  
  $("#dynamic_field tbody tr").each(function() {    
    i++;
   });

   $('#dynamic_field').append('<tr id="row'+i+'"><td><select class="form-control input-medium" name="productname[]" id="productname_' + i + '"><option></option></select><input type="text" class="form-control" name="newProduct[]" placeholder="New Product Name" /></td><td><input type="text" required class="form-control " name="qty[]" id="qty_' + i + '" > </td><td><input type="text" required class="form-control" name="price[]" id="price_' + i + '" > </td><td><input type="text" class="form-control " readonly name="vatamount[]" id="vatamount_' + i + '" > </td><td><input type="text" class="form-control " readonly name="totalprice[]" id="totalprice_' + i + '" > </td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
   $('#productname_'+i).append(selectData);
   $('[name^=productname]').select2();
   // $('[name^=productname]').editableSelect();


});  
  $(document).on('click', '.btn_remove', function(){  
   var button_id = $(this).attr("id");   
   $('#row'+button_id+'').remove(); 
   removeTotal(); 
});
  $("#inc_old").change(function() {
    
    if(this.checked) {
        //Do stuff
        $('#old_balance').attr('readonly',false);
        setTotal();
    }else{
        $('#old_balance').attr('readonly',true);
        setTotal();
    }

});

$("#old_balance").change(function() {
    
    setTotal();

});
$('#sup_name').on('select2:select', function (e) {
$.ajax({
    url : "<?php echo site_url('Supplier/supplierDetail/')?>/"+ $(this).val(),
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
        console.log(data);
        $('#address').val(data.address); 
        $('#cust_contact').val(data.mobile); 
        $('#old_balance').val(data.total_credit); 
         setTotal();

    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        alert('Error get data from ajax');
    }
});
});

    $('#dynamic_field').on("change",'[name^=productname]',function(){ 
        var res = $(this).attr('id').split("_");
        var id = $(this).find(":selected").val();
        if(id!=''){
        var tdData,check=0;
        //General Details...............
        $.ajax({

            url:"<?php echo base_url() ?>Store/getProductDetail/"+id,
            type: "POST",
            dataType:"json",

            success:function(data){

                proudctQty=parseInt(data.prd_qty);
                $('#qty_'+res[1]).val(data.prd_qty);
                $('#qty_'+res[1]).data('original-qty', data.prd_qty); 
                $('#qty_'+res[1]).attr('original-qty', data.prd_qty);
                 $('#price_'+res[1]).val(data.prd_cost_price);  

                setTotal();
                var total=parseInt(data.prd_cost_price) * data.prd_qty;
                $('#vatamount_'+res[1]).val( ( total * 0.05) );  
                $('#totalprice_'+res[1]).val(total);
                   

            }

        });
        // console.log(id);


    }else{
         $('#qty_'+res[1]).val('');
         $('#price_'+res[1]).val('');
         $('#vatamount_'+res[1]).val('');
         $('#totalprice_'+res[1]).val('');
         
    }

});


function removeTotal(){
  var total=0;
$('#dynamic_field tbody tr').each(function (i, row) {

      var qty =$(row).find('input[name^="qty"]').val(); 
      var price =$(row).find('input[name^="price"]').val(); 
      total= total - price*qty;
      total = (total < 0) ? total * -1 : total;
  });

      $('#net_amount').val(total);
      $('#vat_amount').val(total*0.05);
      $('#discount').val('');
      $('#total_amount').val((total*0.05)+total );
}
 function removeTotal(){
  var total=0;
$('#dynamic_field tbody tr').each(function (i, row) {

      var qty =$(row).find('input[name^="qty"]').val(); 
      var price =$(row).find('input[name^="price"]').val(); 
      total= total - price*qty;
      total = (total < 0) ? total * -1 : total;
  });

      $('#net_amount').val(total);
      $('#vat_amount').val(total*0.05);
      $('#discount').val('');
      $('#total_amount').val((total*0.05)+total );
} 
function setTotal(){
  var total=0;
$('#dynamic_field tbody tr').each(function (i, row) {

      // var outdate =($(row).find('input[name^="outdate"]').val()).substring(0,10); 
      var qty =$(row).find('input[name^="qty"]').val(); 
      var price =$(row).find('input[name^="price"]').val(); 
      // var difference=showDays(outdate,$('#in_date').val());
      total= total + price*qty;
      // console.log(total);
});

      $('#net_amount').val(total);
      $('#vat_amount').val(total*0.05);
      $('#discount').val('');
      // $('#total_amount').val((total*0.05)+total);
      // $('#total_amount').val( ( (total*0.05)+total) - $('#advance').val() );
      if ($('#inc_old').is(':checked')){
        // console.log('dfs');
      $('#total_amount').val((total*0.05)+total + parseInt($('#old_balance').val()));
    }else{
        // console.log('dfas');
      $('#total_amount').val((total*0.05)+total);
    }
}
$('#dynamic_field').on("change",'[name^=qty]',function(){
    var price=$('#price_'+($(this).attr('id').substring(4))).val();
    if(price!=''){
    setTotal();
    var total=parseInt(price)*$(this).val();
    $('#totalprice_'+($(this).attr('id').substring(4))).val(total);
    $('#vatamount_'+($(this).attr('id').substring(4))).val( ( total * 0.05) );  
    }
});

$('#dynamic_field').on("change",'[name^=price]',function(){

    setTotal();
    var qty=$('#qty_'+($(this).attr('id').substring(6))).val();
    var total=parseInt(qty)*$(this).val();
    $('#totalprice_'+($(this).attr('id').substring(6))).val(total);
    $('#vatamount_'+($(this).attr('id').substring(6))).val( ( total * 0.05) );  

});

});

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
                                  <label class="col-md-3 col-form-label"><strong>Phone No</strong></label>
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