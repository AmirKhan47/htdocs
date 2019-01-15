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
                                    <span class="caption-subject bold uppercase">Add New Sale </span>
                                </div>
                                <div class="actions">
                                    <div class="btn-group">
                                       <!--  <a data-toggle="modal" href="#addProductModel" class="btn green-haze btn-lg item_edit" >Add Product</a>
                                    </a> -->
                                       
                                </div>
                            </div>
                        </div>              

                    <div class="portlet-body">
                    <form id="form" class="form-horizontal" action="<?php echo base_url(); ?>Sale/<?php if(isset($detail)){ echo 'updateSale';}else{ echo 'addSale';} ?>/<?php echo $this->uri->segment(3);?>" method="post">
                    <input type="hidden" value="<?php if(isset($detail)){ echo $detail->sale_id; } ?>" name="sale_id" id="sale_id" /> 
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
                                <label class="control-label"><strong>Sale Time</strong></label>
                                <div class="input-icon">
                                    <i class="fa fa-clock-o"></i>
                                    <input type="text" class="form-control timepicker timepicker-default" value="<?php if(isset($detail)){ echo $detail->time; }else{} ?>" name="time" id="time"> </div>
                            </div>
                            <div class="col-md-3">
                                
                                    <label class="control-label"><strong>Sale Man</strong></label>
                                    <select class="form-control" id="salesman" required name="salesman"> 
                                        <option></option>  
                                        <?php if(!empty($salesman)) { ?>
                                        <?php foreach ($salesman as $name) { ?>
                                        <option value="<?php echo $name['user_id']; ?>" <?php if(isset($detail)){ echo 'selected';}?> ><?php echo $name['user_name']; ?></option>   
                                        <?php } }?>
                                    </select>  
                                    <span class="help-block"></span>
                            </div>
                            
                        </div>
                        
                    </div>

                    <div class="form-group">
                         <div class="row">
                          <div class="col-md-3">
                                <label class="control-label"><strong>Customer Type</strong></label>
                                <select class="form-control" id="cust_type" required name="cust_type"> 
                                    <option></option>
                                    <option value="registered" <?php if(isset($detail) && $detail->cust_type=='registered'){ echo 'selected';} ?> >Registered</option>
                                    <option value="cash" <?php if(isset($detail) && $detail->cust_type=='cash'){ echo 'selected';} ?> >Cash</option>
                                </select>
                                <span class="help-block"></span>
                            </div>

                            <div class="col-md-3">
                                    <input name="customer_id" id="customer_id" type="hidden" value="<?php if(isset($detail) && $detail->customer_id != 0){ echo $detail->customer_id; } ?>">
                                    <input type="hidden" id="checkCustomer" name="checkCustomer" value="<?php if(isset($detail) && $detail->customer_id != 0){ echo 1; } ?>" />
                                    <label class="control-label"><strong>Customer Name</strong></label>
                                    <!-- possibly flip of name is due to this issue, we have used temp_name here and cust_name below -->
                                    <input type="text" class="form-control" list="name-options" id="cust_name" name="cust_name" value="<?php if(isset($detail)){ echo $detail->temp_name; } ?>" />
                                    <datalist id="name-options" >
                                    <?php foreach ($customers as $name) {
                                       echo '<option value="'.$name->cust_name.'" data-id="'.$name->cust_id.'" "><input name="cust_id" type="hidden" value="'.$name->cust_id.'">'.$name->cust_name.'</option>';
                                    } ?>    
                                    </datalist>
                                </br>
                                <span class="help-block"></span>
                            </div>  
                           <!--  <div class="col-md-3">
                                <label class="control-label"><strong>Customer Name</strong></label>
                                <select class="form-control" id="cust_name" required name="cust_name"> 
                                     <option></option>  
                                        <?php if(!empty($customer)) { ?>
                                        <?php foreach ($customer as $name) { ?>
                                        <option value="<?php echo $name->cust_id; ?>" <?php if(isset($detail)){ echo 'selected';}?> ><?php echo $name->cust_name; ?></option>   
                                        <?php } }?>
                                </select>        
                                     <span class="help-block"></span>
                                <span class="help-block"></span>
                            </div> -->
                            
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
                            <!-- <?php print_r($customers); ?> -->
                            <!-- <div class="col-md-3">
                                    <label class="control-label"><strong>Contact No</strong></label>
                                     <input type="text" class="form-control" list="cust-buss-options" id="cust_business_name" name="cust_business_name" value="<?php if(isset($detail)){ echo $detail->cust_business_name; } ?>" />
                                    <datalist id="cust-buss-options" >
                                    <?php foreach ($customers as $name) {
                                       echo '<option value="'.$name->cust_business_name.'" data-id="'.$name->cust_id.'" "><input name="cust_id" type="hidden" value="'.$name->cust_id.'">'.$name->cust_business_name.'</option>';
                                    } ?>    
                                    </datalist>
                                     <span class="help-block"></span>
                            </div> -->
                            <div class="col-md-3">
                                    <label class="control-label"><strong>Address</strong></label>
                                     <textarea name="address" id="address" placeholder="Addresss" class="form-control" row="5" type="text"><?php if(isset($detail)){ echo $detail->address; } ?></textarea>
                                     <span class="help-block"></span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-3 cash_hidden" <?php if(!(isset($detail) && $detail->cust_type=='cash')){ echo 'hidden';} ?> >
                                    <label class="control-label"><strong>Tr. No</strong></label>
                                    <input type="text" class="form-control" id="tr_no" name="tr_no" value="<?php if(isset($detail)){ echo $detail->tr_no; } ?>" />
                                </br>
                                <span class="help-block"></span>
                            </div>  
                            <div class="col-md-3 cash_hidden" <?php if(!(isset($detail) && $detail->cust_type=='cash')){ echo 'hidden';} ?> >
                                    <label class="control-label"><strong>Emirates</strong></label>
                                    <!-- problematic -->
                                    <!-- for this see below input field -->
                                    <!-- <input type="text" class="form-control" list="emirates-options" id="emirates" name="emirates" value="" /> -->
                                    <select class="form-control" name="emirates" id="emirates" >
                                        <option></option>
                                        <option value="abu_dhabi" <?php if(isset($detail)){ if($detail->cash_cust_emirate){ if($detail->cash_cust_emirate == 'abu_dhabi'){echo 'selected' ;}}} ?>>Abu Dhabi</option>
                                        <option value="ajman" <?php if(isset($detail)){ if($detail->cash_cust_emirate){ if($detail->cash_cust_emirate == 'ajman'){echo 'selected' ;}}} ?>>Ajman</option>
                                        <option value="dubai" <?php if(isset($detail)){ if($detail->cash_cust_emirate){ if($detail->cash_cust_emirate == 'dubai'){echo 'selected' ;}}} ?>>Dubai</option>
                                        <option value="fujairah" <?php if(isset($detail)){ if($detail->cash_cust_emirate){ if($detail->cash_cust_emirate == 'fujairah'){echo 'selected' ;}}} ?>>Fujairah</option>
                                        <option value="ras_al_khaimah" <?php if(isset($detail)){ if($detail->cash_cust_emirate){ if($detail->cash_cust_emirate == 'ras_al_khaimah'){echo 'selected' ;}}} ?>>Ras al-Khaimah</option>
                                        <option value="sharjah" <?php if(isset($detail)){ if($detail->cash_cust_emirate){ if($detail->cash_cust_emirate == 'sharjah'){echo 'selected' ;}}} ?>>Sharjah</option>
                                        <option value="umm_al_quwain" <?php if(isset($detail)){ if($detail->cash_cust_emirate){ if($detail->cash_cust_emirate == 'umm_al_quwain'){echo 'selected' ;}}} ?>>Umm al-Quwain</option>
                                    </select>
                                </br>
                                <span class="help-block"></span>
                            </div>  
                             <!-- <?php print_r($detail); ?> -->
                             
                            <div class="col-md-3 registered_hidden" <?php if(!(isset($detail) && $detail->cust_type=='registered')){ echo 'hidden';} ?>>
                                    <label class="control-label"><strong>Customer's Bussiness Name</strong></label>
                                    <input type="text" class="form-control" list="cust-buss-options" id="cust_business_name" name="cust_business_name" value="<?php if(isset($detail)){ echo $detail->cust_business_name; } ?>" />
                                    <datalist id="cust-buss-options" >
                                    <?php foreach ($customers as $name) {
                                       echo '<option value="'.$name->cust_business_name.'" data-id="'.$name->cust_id.'" "><input name="cust_id" type="hidden" value="'.$name->cust_id.'">'.$name->cust_business_name.'</option>';
                                    } ?>    
                                    </datalist>
                                </br>
                                <span class="help-block"></span>
                            </div>  
                            <!-- <div class="col-md-3 registered_hidden" hidden>
                                    <label class="control-label"><strong>Customer Name</strong></label>
                                    <input type="text" class="form-control" list="name-options" id="cust_name" name="cust_name" value="<?php if(isset($detail)){ echo $detail->temp_name; } ?>" />
                                    <datalist id="name-options" >
                                    <?php foreach ($customer as $name) {
                                       echo '<option value="'.$name->cust_name.'" data-id="'.$name->cust_id.'" "><input name="cust_id" type="hidden" value="'.$name->cust_id.'">'.$name->cust_name.'</option>';
                                    } ?>    
                                    </datalist>
                                </br>
                                <span class="help-block"></span>
                            </div>   -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="button"  name="add" id="add" class="btn green" value="Add Products"> 
                            <table class="table table table-striped table-bordered" id="dynamic_field">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <!-- <th>Unit</th> -->
                                            <th>Qty</th>
                                            <th>Cost Price</th>
                                            <th>Sale Price</th>
                                            <th>Vat Amount</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <?php print_r($saleDetail); ?> -->
                                        <!-- <?php print_r($products); ?> -->
                                    <?php if(isset($saleDetail)){ ?>
                                    <?php $i=00; $y=0; foreach ($saleDetail as $sale) { ?>
                                    <tr id="row<?php echo $i; ?>">
                                        <td><select class="form-control input-medium" name="productname[]" id="productname_<?php echo $i; ?>">
                                            <option></option>
                                            <?php if(!empty($products)){ ?>
                                            <?php foreach ($products as $items) { ?>
                                                <option value="<?php echo $items->prd_id; ?>" <?php if($sale['prd_id']==$items->prd_id){ echo 'selected';} ?>> <?php echo $items->prd_name;?> </option>
                                            <?php } }else { ?>
                                                <option value="<?php echo $sale['prd_id']; ?>" selected > <?php echo $sale['prd_name'];?> </option>
                                                <?php }?>
                                            </select>
                                        </td>
                                        <!-- <td><input type="text"  required class="form-control" value="<?php echo $sale['prd_unit']; ?>" name="unit[]" id="qty_<?php echo $i; ?>" > </td> -->
                                        <!-- Waleed's added line -->
                                        <!-- <td><input type="number"  required class="form-control" value="" name="eqty[]" id="eqty_<?php echo $i; ?>" > </td> -->

                                        <td><input type="text" readonly required class="form-control" value="<?php echo $sale['prd_qty']; ?>" data-original-qty="<?php echo $sale['prd_qty']; ?>" name="qty[]" id="qty_<?php echo $i; ?>" > </td>
                                        <td> </td>
                                        <td><input type="text"  readonly class="form-control" value="<?php echo $sale['prd_price']; ?>" readonly name="price[]" id="price_<?php echo $i; ?>" > </td>
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
                     <div class="row">
                                  <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="col-md-3 col-form-label"><strong>Old Balance</strong></label>
                                            <!-- <?php print_r($customers); ?> -->
                                            <?php if(!empty($customers)) { ?>
                                            <?php foreach ($customers as $customerDetail) { ?>
                                            <?php if(isset($detail) && $detail->customer_id==$customerDetail->cust_id){ $old=$customerDetail->total_credit;}else{ $old=0; }?>  
                                            <?php } }?>
                                            <div class="col-md-6">
                                                <input  readonly type="text" name="old_balance" id="old_balance" value="<?php if(isset($detail) ){ echo $old ;}else{ echo 0; } ?>" class="form-control" /> 
                                                <span class="help-block"></span>
                                            </div>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" name="inc_old" id="inc_old" />
                                                            <span></span>
                                            </label>
                                        </div>
                                        <div class="form-group ">
                                          <label class="col-md-3 col-form-label"><strong>Payment Type</strong></label>
                                          <div class="col-md-6">
                                          <!-- changed here by MV -->
                                            <select class="form-control" name="payment_type" id="payment_type" required <?php if(isset($detail) && $detail->cust_type=='cash'){ echo 'disabled';} ?> >
                                                <option></option>
                                                <option value="cash" <?php if(isset($detail) && $detail->payment_type == 'cash'){ echo 'selected' ;} ?> >Cash</option>
                                                <!-- <option value="cash">Cash</option> -->
                                                <option value="credit" <?php if(isset($detail) && $detail->payment_type == 'credit'){ echo 'selected' ;} ?> >Credit</option>
                                                <!-- <option value="bank">Bank</option> -->
                                            </select>
                                            <span class="help-block"></span>
                                          </div>
                                        </div>
                                        <div class="form-group ">
                                          <label class="col-md-3 col-form-label"><strong>Amount Received</strong></label>
                                          <div class="col-md-6">
                                            <input type="text" name="amountReceived" id="amountReceived" value="<?php if(isset($detail) ){ echo $detail->amountReceived ;} ?>" class="form-control" > 
                                            <span class="help-block"></span>
                                          </div>
                                        </div>
                                        <div class="form-group ">
                                          <label class="col-md-3 col-form-label"><strong>Amount Returned</strong></label>
                                          <div class="col-md-6">
                                            <input type="text" readonly name="amountReturned" id="amountReturned" value="<?php if(isset($detail) ){ echo $detail->amountReturned ;} ?>" class="form-control" > 
                                            <span class="help-block"></span>
                                          </div>
                                        </div>
                                        <!-- <?php if(isset($detail)) ?> -->
                                        <div class="form-group hidden_field_bank" <?php if(isset($detail) && $detail->bank_id!=0){}else{ echo ' hidden ';}?> >
                                        <label class="col-md-3 col-form-label"><strong>Banks</strong></label>
                                        <div class="col-md-6">
                                        <select class="form-control " name="banks" id="banks"  > 
                                            <option></option>  
                                            <?php if(!empty($banks)) { ?>
                                            <?php foreach ($banks as $name) { ?>
                                            <option value="<?php echo $name->bank_id; ?>" <?php if(isset($detail) && $detail->bank_id== $name->bank_id){ echo 'selected' ;} ?> ><?php echo $name->bank_name; ?></option>   
                                            <?php } }?>
                                          </select>  
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
<!-- 
                                       <div class="form-group hidden_fields" <?php if(isset($detail) && $detail->bank_id==0){}else{ echo 'hidden ';}?> >
                                        <label class="col-md-3 col-form-label"><strong>Cheque No</strong></label>
                                        <div class="col-md-6">
                                        <input type="text" name="cheque_no" id="cheque_no" class="form-control" value=" <?php if(isset($detail)) { echo $detail->cheque_no ;} ?>"> 
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                      <div class="form-group hidden_fields" <?php if(isset($detail) && $detail->bank_id==0){}else{ echo 'hidden ';}?>>
                                        <label class="col-md-3 col-form-label"><strong>Cheque Date</strong></label>
                                        <div class="col-md-6">
                                        <input name="cheque_date" id="cheque_date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text" value="<?php if(isset($detail) ){ echo $detail->cheque_date ;} ?>" >
                                          <span class="help-block"></span>
                                        </div>
                                      </div> -->
                                </div>
                                  <div class="col-md-6">    
                                        <div class="form-group ">
                                          <label class="col-md-3 col-form-label"><strong>Net Amount</strong></label>
                                          <div class="col-md-6">
                                            <input   type="text" readonly name="net_amount" id="net_amount" value="<?php if(isset($detail) ){ echo $detail->net_amount ;} ?>" class="form-control" > 
                                            <span class="help-block"></span>
                                          </div>
                                        </div>
                                        <div class="form-group ">
                                          <label class="col-md-3 col-form-label"><strong>Discount</strong></label>
                                          <div class="col-md-6">
                                            <input   type="text" name="discount" id="discount" value="<?php if(isset($detail) ){ echo $detail->discount ;} ?>" class="form-control"> 
                                            <span class="help-block"></span>
                                          </div>
                                        </div>
                                        <div class="form-group ">
                                          <label class="col-md-3 col-form-label"><strong>Vat Amount</strong></label>
                                          <div class="col-md-6">
                                            <input   readonly type="text" name="vat_amount" id="vat_amount" value="<?php if(isset($detail) ){ echo $detail->vat_amount ;} ?>" class="form-control"> 
                                            <span class="help-block"></span>
                                          </div>
                                        </div>
                                        
                                        <div class="form-group ">
                                          <label class="col-md-3 col-form-label"><strong>Total Amount</strong></label>
                                          <div class="col-md-6">
                                            <input   type="text" name="total_amount" id="total_amount" value="<?php if(isset($detail) ){ echo $detail->total_amount ;} ?>" class="form-control"> 
                                            <span class="help-block"></span>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-8 col-md-2">
                                <a href="<?php echo site_url('Purchase')?>"><button type="button" class="btn default">Cancel</button></a>
                                <!-- <button type="button" class="btn default">Cancel</button> -->
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
  // $('#productname_0').select2();
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
//Geeting products.............
    $.ajax({

        url:"<?php echo base_url() ?>/Store/getSaleProducts",
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

  var i=0; 
  var prData=''; 
  $('#add').click(function(){  
   // i++;  
  $("#dynamic_field tbody tr").each(function() {    
    i++;
   });
    // <td><input type="number" class="form-control" name="eqty[] /"></td>
   $('#dynamic_field').append('<tr id="row'+i+'"><td><select class="form-control input-medium" name="productname[]" id="productname_' + i + '"><option></option></select></td><td><input type="number" required class="form-control " name="qty[]" id="qty_' + i + '" > </td><td><input type="number" required class="form-control" readonly name="costprice[]" id="costprice_' + i + '" > </td><td><input type="number" required class="form-control" readonly name="price[]" id="price_' + i + '" > </td><td><input type="number" class="form-control " readonly name="vatamount[]" id="vatamount_' + i + '" > </td><td><input type="number" class="form-control " readonly name="totalprice[]" id="totalprice_' + i + '" > </td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
   $('#productname_'+i).append(selectData);
   $('[name^=productname]').select2();


});  
$("#amountReceived").on("change",function(){
    var rec = $(this).val();
    var tot = $("#total_amount").val();
    var ret = rec - tot ;
    $("#amountReturned").val(ret);
    // console.log(ret);
});
  $(document).on('click', '.btn_remove', function(){  
   var button_id = $(this).attr("id");  
   console.log(button_id); 

    // $('#qty_'+button_id).val(data.prd_qty);
    // var price=$('#price_'+button_id).val();  
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
$('#contact_number').change(function() { 
 
 var id=$('#mob-options option').filter(function() {
        return $('#contact_number').val() == this.value;
}).data("id");   

    if(typeof id != "undefined"){   
     
    $('#checkCustomer').val('1');
    $('#customer_id').val(id);

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
        $('#address').val(data.cust_location); 
        $('#cust_name').val(data.cust_name); 
        $('#id_card').val(data.cust_idcard); 
        $('#B_N').val(data.cust_business_name);
            $('#cust_business_name').val(data.cust_business_name); 
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
$('#cust_business_name').change(function() { 
    var  id=$('#cust-buss-options option').filter(function() {
            return $('#cust_business_name').val() == this.value;
        }).data("id");
    console.log(id);
    // var id;
    // if($(this).attr('id') == "cust_name"){
    //     id=$('#name-options option').filter(function() {
    //         return $('#cust_name').val() == this.value;
    //     }).data("id");
    // }else if($(this).attr('id') == "cust_business_name"){
    //     id=$('#cust-buss-options option').filter(function() {
    //         return $('#cust_business_name').val() == this.value;
    //     }).data("id");
    // }else {
    //     id=$('#contact_options option').filter(function() {
    //         return $('#cust_contact').val() == this.value;
    //     }).data("id");
    // }
    if(typeof id != "undefined"){   
    $('#checkCustomer').val('1');   
    $('#customer_id').val(id);
// console.log('ghggh')
   $.ajax({
        url : "<?php echo site_url('Customer/customerDetail/')?>/"+ id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);
            $('#address').val(data.cust_location); 
            $('#cust_name').val(data.cust_name); 
            $('#old_balance').val(data.total_credit); 
            // $('#cust_contact').val(data.cust_contact); 
            $('#emirates').val(data.emirates); 
            $('#contact_number').val(data.cust_contact); 

            // $('#cust_business_name').val(data.cust_business_name); 
            
            setTotal();

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

$('#cust_type').change(function() { 
    $('#cust_contact').val('');
    $('#address').val('');
    $('#cust_name').val('');
    $('#cust_business_name').val('');
    $('#customer_id').val('');
    var x = $(this).val();
    if( x == "cash" ){
        $('#payment_type').prop('disabled', true);
        $(".cash_hidden").show();
        $(".registered_hidden").hide();
    }else if( x == "registered" ){
        $('#payment_type').prop('disabled', false);
        $(".registered_hidden").show();
        $(".cash_hidden").hide();
    }else{
        $(".registered_hidden").hide();
        $(".cash_hidden").hide();
    }
    
});

    $('#dynamic_field').on("change",'[name^=productname]',function(){ 
        // console.log($(this).attr('id'));
        var res = $(this).attr('id').split("_");
        var id = $(this).find(":selected").val();
        if(id!=''){
        //console.log(res[1]);
        var tdData,check=0;
        // var prd_qty=0;
        //General Details...............
        $.ajax({

            url:"<?php echo base_url() ?>Store/getProductDetail/"+id,
            type: "POST",
            dataType:"json",

            success:function(data){

                // if(data.idExisit!='0'){
                
                //     proudctQty=1;
                //     $('#qty_'+res[1]).val(1);
                //     $('#qty_'+res[1]).data('original-qty', 1); 
                // }else{
               
                    proudctQty=parseInt(data.prd_qty);
                    $('#qty_'+res[1]).val(data.prd_qty);
                    $('#qty_'+res[1]).data('original-qty', data.prd_qty); 
                    $('#qty_'+res[1]).attr('original-qty', data.prd_qty);
                // }

                $('#costprice_'+res[1]).val(data.prd_cost_price);  
                $('#price_'+res[1]).val(data.prd_sale_price);  

                setTotal();
                var total=parseInt(data.prd_sale_price) * data.prd_qty;
                $('#totalprice_'+res[1]).val(total);
                $('#vatamount_'+res[1]).val( ( total * 0.05) );  

            }

        });
        // console.log(id);
        //Geeting unique ids.............
        $.ajax({

            url:"<?php echo base_url() ?>Store/product_uniqueids/"+id,
            type: "POST",
            dataType:"json",

            success:function(data){
                $('#productunique_'+res[1]).html('');
                    $('#productunique_'+res[1]).append('<option selected value=""></option>');
                    // console.log(data);
                if(data.length!=0){
                    for (var i = 0; i < data.length; i++) { 
                       
                       $("#dynamic_field tbody tr").not(':last').each(function() {
                        tdData=($(this).children().eq(1).find('option:selected').text());
                        if(tdData==data[i]['prd_unique_id']){
                          check=1;
                        }
                        }); 

                      if(data[i]['status']!=0 && check!=1)               
                      $('#productunique_'+res[1]).append('<option value="'+data[i]['pu_id']+'">'+data[i]['prd_unique_id']+'</option>');
                      check=0;
                  };

                $('#productunique_'+res[1]).attr('readonly',false);  
                $('#qty_'+res[1]).attr('readonly',true);  

              }else{
                $('#qty_'+res[1]).attr('readonly',false);  
                $('#productunique_'+res[1]).attr('readonly',true);  
            }

        }

        });

    }else{
         $('#qty_'+res[1]).val('');
         $('#price_'+res[1]).val('');
         $('#vatamount_'+res[1]).val('');
         $('#totalprice_'+res[1]).val('');
    }

});
// $("input[name=cust_name]").focusout(function(){
//     alert($(this).val());
// });
$('#cust_name').change(function() { 
 var id=$('#name-options option').filter(function() {
        return $('#cust_name').val() == this.value;
        }).data("id");
    
    if(typeof id != "undefined"){   
     
    $('#checkCustomer').val('1');
    $('#customer_id').val(id);
    
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
        $('#address').val(data.cust_location); 
        $('#contact_number').val(data.cust_contact); 
            $('#cust_business_name').val(data.cust_business_name); 
        $('#id_card').val(data.cust_idcard); 
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

$('#cust_type').change(function() { 
    $('#contact_number').val('');
    $('#autorized_person').html('');
    $('#address').val('');
    $('#cust_name').val('');

});

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

$('#dynamic_field').on("change",'[name^=qty]',function(){

    console.log($(this).data('original-qty'));
   if( parseInt($(this).val()) > parseInt($(this).data('original-qty')) || parseInt($(this).val()) == 0){
     $(this).val($(this).data('original-qty'));

     $('#totalprice_'+($(this).attr('id').substring(4))).val($(this).data('original-qty') * ($('#price_'+( $(this).attr('id').substring(4))).val()) );
     $('#vatamount_'+($(this).attr('id').substring(4))).val($('#totalprice_'+($(this).attr('id').substring(4))).val() * 0.05 );
     //Make sure in edit case........
    setTotal();


   }
   else{

    setTotal();
    var price=$('#price_'+($(this).attr('id').substring(4))).val();
    var total=parseInt(price)*$(this).val();
    $('#totalprice_'+($(this).attr('id').substring(4))).val(total);
    $('#vatamount_'+($(this).attr('id').substring(4))).val( ( total * 0.05) );  

   }

});

$('#discount').on("change",function(){
    var net = $('#net_amount').val();
    var discount = $(this).val();
    var diff = parseInt(net - discount);
    var old = parseInt($('#old_balance').val());
    var vat= parseInt((diff)*0.05);
    // console.log(vat);
    $('#vat_amount').val(vat);
    if($("#inc_old").is("selected")){
        $('#total_amount').val(diff + vat  + old);
    }else{
        $('#total_amount').val(diff + vat);
    }
 });

$('#payment_type').on("change",function(){

   if($(this).val() == "cash"){
     $(".hidden_field_bank").attr("hidden", false);
     $('#inc_old').attr('disabled',false);
   }
   else{
         $(".hidden_field_bank").attr("hidden", true);
         $('#inc_old').attr('checked',false);
         $('#inc_old').attr('disabled',true);
         $('#old_balance').attr('readonly',true);
         setTotal();
   }

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