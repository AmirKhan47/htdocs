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
                  <span class="caption-subject bold uppercase">Manage Rent-In </span>
                </div>
                <div class="actions">
                  <div class="btn-group">
                                       <!--  <a data-toggle="modal" href="#addProductModel" class="btn green-haze btn-lg item_edit" >Add Product</a>
                                     </a> -->

                                   </div>
                                 </div>
                               </div>              

                               <div class="portlet-body">
                                <form id="form" class="form-horizontal" action="<?php echo base_url(); ?>Rental/updateRentin" method="post">
                                  <div class="form-body">
                                   <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group ">
                                          <label class="col-md-3 col-form-label"><strong>In Date</strong></label>
                                          <div class="col-md-6">
                                            <input name="in_date" id="in_date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text"  >
                                            <span class="help-block"></span>
                                          </div>
                                        </div>
                                        <div class="form-group ">
                                          <label class="col-md-3 col-form-label"><strong>In Time</strong></label>
                                          <div class="col-md-6">
                                            <div class="input-icon">
                                            <i class="fa fa-clock-o"></i>
                                            <input type="text" readonly class="form-control timepicker timepicker-default" value="<?php if(isset($detail)){ echo $detail->in_time; }else{} ?>" name="in_time" id="in_time"> 
                                          </div>
                                            <span class="help-block"></span>
                                          </div>
                                        </div>
                                         <div class="form-group ">
                                          <label class="col-md-3 col-form-label"><strong>Slip No</strong></label>
                                          <div class="col-md-6">
                                         <input name="slip_no" readonly placeholder="Slip No" class="form-control" value="<?php if(isset($detail) && $detail->virtual_invoice!=""){ echo $detail->virtual_invoice; }else{ echo $tr_no->virtual_invoice; } ?>" type="text">    
                                            <span class="help-block"></span>
                                          </div>
                                        </div>
                                      <div class="form-group ">
                                        <label class="col-md-3 col-form-label"><strong>Customer Name</strong></label>
                                        <div class="col-md-6">
                                          <input readonly  type="text" name="cust_name" id="cust_name" value="<?php echo $this->session->userdata('cust_name');  ?>" class="form-control"> 
                                          <input type="hidden" name="cust_id" id="cust_id" value="<?php echo $this->session->userdata('cust_id');  ?>" > 
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                      <div class="form-group ">
                                        <label class="col-md-3 col-form-label"><strong>Contact No</strong></label>
                                        <div class="col-md-6">
                                          <input readonly  type="text" name="contact_no" id="contact_no" value="<?php echo $this->session->userdata('contact_no');  ?>" class="form-control"> 
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                      <div class="form-group ">
                                        <label class="col-md-3 col-form-label"><strong>Id Card No</strong></label>
                                        <div class="col-md-6">
                                          <input readonly  type="text" name="id_card" id="id_card" value="<?php echo $this->session->userdata('id_card');  ?>" class="form-control"> 
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                      <div class="form-group ">
                                        <label class="col-md-3 col-form-label"><strong>Sales Man</strong></label>
                                        <div class="col-md-6">
                                          <select class="form-control" id="salesman" required name="salesman"> 
                                            <option></option>  
                                            <?php if(!empty($salesman)) { ?>
                                            <?php foreach ($salesman as $name) { ?>
                                            <option value="<?php echo $name['user_id']; ?>" ><?php echo $name['user_name']; ?></option>   
                                            <?php } }?>
                                          </select>  
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group ">
                                        <label class="col-md-3 col-form-label"><strong>Address</strong></label>
                                        <div class="col-md-6">
                                          <textarea readonly  class="form-control" name="address" id="address" rows="5"><?php echo $this->session->userdata('address'); ?></textarea>
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                       <div class="form-group ">
                                        <label class="col-md-3 col-form-label"><strong>RentOut Remarks</strong></label>
                                        <div class="col-md-6">
                                          <textarea  class="form-control" readonly name="remarks" value="" id="address" rows="3"><?php echo $this->session->userdata('remarks'); ?></textarea>
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                      <div class="form-group ">
                                        <label class="col-md-3 col-form-label"><strong>RentIn Remarks</strong></label>
                                        <div class="col-md-6">
                                          <textarea  class="form-control" name="rent_in_remarks" value="" id="address" rows="5"></textarea>
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                      </div>
                                    </div>
                                <div class="row">
                                  <div class="col-md-12">
                                    <table class="table table table-striped table-bordered" id="dynamic_field">
                                      <thead>
                                        <tr>
                                          <th>Out Date</th>
                                          <th>Out Time</th>
                                          <th>Hr #</th>
                                          <th>Rental Period</th>
                                          <th>Item Name</th>
                                          <th>Out Qty </th>
                                          <th>Int Qty</th>
                                          <th>Unit Price</th>
                                          <th>Total Price</th>
                                        </tr>
                                      </thead>
                                      <?php if(isset($list)){ ?>
                                      <?php $i=00; $y=0; $total=0; foreach ($list as $agrement) { ?>
                                      <?php               
                                          // $datetime1 = new DateTime($agrement[$y]->out_date);
                                          // $datetime2 = new DateTime();
                                          // $difference = $datetime1->diff($datetime2);
                                          // $difference->d;
                                          // if($difference->d==0){
                                          //   $difference->d=1; 
                                          // }
                                      // <?php $total=$total+(int)($agrement[$y]->prd_qty)*(int)($agrement[$y]->prd_price)*(int)($difference->d);
                                      ?>
                                      <!-- <?php print_r($agrement[$y]->prd_id); ?>  -->
                                      <tr id="row<?php echo $i; ?>">
                                        <td><input type="text" readonly style="background-color: rgba(0,0,0,0); border: none;" class="form-control" value="<?php if(isset($list)){ echo $agrement[$y]->out_date; } ?>" name="outdate[]" id="outdate_<?php echo $i; ?>" > </td>
                                        <!-- <td><input name="out_date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text"  ></td> -->
                                        <td><input type="text" readonly style="background-color: rgba(0,0,0,0); border: none;" class="form-control" value="<?php if(isset($list)){ echo $agrement[$y]->out_time; } ?>" name="outtime[]" id="outtime_<?php echo $i; ?>" > </td>
                                        <td><input type="text" readonly style="background-color: rgba(0,0,0,0); border: none;" class="form-control" value="" name="hours[]" id="hours_<?php echo $i; ?>" > </td>
                                        <td><input type="text" class="form-control" value="" name="daysMonth[]" id="daysMonth_<?php echo $i; ?>" ></td>
                                        <input type='hidden'  value='<?php if(isset($list)){ echo $agrement[$y]->rental_unit; } ?>' name='rental_unit[]'>
                                        <input type='hidden'  value='<?php if(isset($list)){ echo $agrement[$y]->site_name; } ?>' name='site_name[]'>
                                        
                                        <!-- <td><input type="text" readonly style="background-color: rgba(0,0,0,0); border: none;" class="form-control" value="<?php if(isset($list)){ echo $agrement[$y]->virtual_invoice; } ?>" name="invoices[]" id="invoice_<?php echo $i; ?>" > </td> -->
                                        <input type='hidden' value='<?php if(isset($list)){ echo $agrement[$y]->invoice_id; } ?>' name='invoice[]'>
                                        <td><input type="text" readonly style="background-color: rgba(0,0,0,0); border: none;" class="form-control" value="<?php if(isset($list)){ echo $agrement[$y]->prd_name.' '.$agrement[$y]->uniqueid;; } ?>" name="productname[]" id="productname_<?php echo $i; ?>" > </td>
                                        <input type='hidden' value='<?php if(isset($list)){ echo $agrement[$y]->prd_id; } ?>' name='productsIds[]'>
                                        <!-- <td><input type="text" readonly style="background-color: rgba(0,0,0,0); border: none;" class="form-control" value="<?php if(isset($list)){ echo $agrement[$y]->uniqueid; } ?>" name="productunique[]" id="productunique_<?php echo $i; ?>" > </td> -->
                                        <input type='hidden' value='<?php if(isset($list)){ echo $agrement[$y]->prd_unique_id; } ?>' name='productunique[]'>
                                        
                                        <td><input type="text" readonly style="background-color: rgba(0,0,0,0); border: none;" class="form-control" value="<?php if(isset($list)){ echo $agrement[$y]->original_qty; } ?>" name="outqty[]" id="outqty<?php echo $i; ?>" > </td>
                                        <td><input type="text" class="form-control" value="<?php if(isset($list)){ echo $agrement[$y]->prd_qty; } ?>" <?php if($agrement[$y]->prd_unique_id!=null){echo 'readonly';} ?> data-original-id="<?php echo $agrement[$y]->original_qty ;?>" name="qty[]" id="qty_<?php echo $i; ?>" > </td>
                                        <td><input type="text" readonly style="background-color: rgba(0,0,0,0); border: none;" class="form-control" value="<?php if(isset($list)){ echo $agrement[$y]->prd_price; } ?>" readonly name="price[]" id="price_<?php echo $i; ?>" > </td>
                                        <!-- <td><input type="text" readonly style="background-color: rgba(0,0,0,0); border: none;" class="form-control" value="<?php if(isset($list)){ echo $agrement[$y]->prd_price *  $agrement[$y]->prd_qty; } ?>" readonly  > </td> -->
                                        <td><input type="text" readonly style="background-color: rgba(0,0,0,0); border: none;" class="form-control" value="" name="totalprice[]" id="totalprice_<?php echo $i; ?>" > </td>
                                        
                                        <!-- <td><input type="checkbox" class="form-control" id="<?php echo $i; ?>" name="statusProduct[]" /></td> -->
                                        <!-- <input id="hiddenCheckbox_<?php echo $i; ?>" type='hidden' value='off' name='hiddenCheckbox[]'> -->
                                      </tr> 
                                      <?php $i++; } } ?>
                                      <tbody>
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
                                            <?php if(!empty($customer)) { ?>
                                            <?php foreach ($customer as $name) { ?>
                                            <!-- <?php  var_dump($this->session->userdata('cust_id') ) . 'ss' . var_dump($name->cust_id) ;  ?> -->
                                            <?php if( $this->session->userdata('cust_id')==$name->cust_id){ $old=$name->total_credit;}else{$old=0; }?>  
                                            <?php } }?>
                                            <div class="col-md-6">
                                                <input  readonly type="text" name="old_balance" id="old_balance" value="<?php echo $old; ?>" class="form-control" /> 
                                                <span class="help-block"></span>
                                            </div>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" name="inc_old" id="inc_old" />
                                                            <span></span>
                                            </label>
                                        </div>
                                        <div class="form-group ">
                                          <label class="col-md-3 col-form-label"><strong>Damage Penalty</strong></label>
                                          <div class="col-md-6">
                                            <input   type="text" name="damage" id="damage" class="form-control" value=""> 
                                            <span class="help-block"></span>
                                          </div>
                                        </div>
                                        <div class="form-group ">
                                          <label class="col-md-3 col-form-label"><strong>Advance Balance</strong></label>
                                          <div class="col-md-6">
                                            <input   type="text" name="advance" id="advance" readonly class="form-control" value="<?php echo $this->session->userdata('advance');  ?>"> 
                                            <span class="help-block"></span>
                                          </div>
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
                                        <!-- <div class="form-group ">
                                          <label class="col-md-3 col-form-label"><strong>Old Balance</strong></label>
                                          <div class="col-md-6">
                                            <input   type="text" name="old_balance" id="old_balance" class="form-control" value=""> 
                                            <span class="help-block"></span>
                                          </div>
                                        </div> -->
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
                                      </div>
                                  <div class="col-md-6">    
                                        <div class="form-group ">
                                          <label class="col-md-3 col-form-label"><strong>Net Amount</strong></label>
                                          <div class="col-md-6">
                                            <input   type="text" readonly name="net_amount" id="net_amount" value="" class="form-control" > 
                                            <span class="help-block"></span>
                                          </div>
                                        </div>
                                        <div class="form-group ">
                                          <label class="col-md-3 col-form-label"><strong>Discount</strong></label>
                                          <div class="col-md-6">
                                            <input   type="text" name="discount" id="discount" class="form-control"> 
                                            <span class="help-block"></span>
                                          </div>
                                        </div>
                                        <div class="form-group ">
                                          <label class="col-md-3 col-form-label"><strong>Vat Amount</strong></label>
                                          <div class="col-md-6">
                                            <input   readonly type="text" name="vat_amount" id="vat_amount" class="form-control"> 
                                            <span class="help-block"></span>
                                          </div>
                                        </div>
                                        <div class="form-group ">
                                          <label class="col-md-3 col-form-label"><strong>Total Amount</strong></label>
                                          <div class="col-md-6">
                                            <input   type="text" name="total_amount" id="total_amount" class="form-control"> 
                                            <span class="help-block"></span>
                                          </div>
                                        </div>
                                        <!-- <div class="form-group ">
                                          <label class="col-md-3 col-form-label"><strong>Options</strong></label>
                                          <div class="col-md-6">
                                             <label class="col-md-3 col-form-label"><input type="radio" name="paymentOption" value="cash" checked>Cash</label> 
                                              <label class="col-md-3 col-form-label"><input type="radio" name="paymentOption" value="credits">Credits</label> 
                                            <span class="help-block"></span>
                                          </div>
                                           
                                            <span class="help-block"></span>
                                          
                                        </div> -->
                                      </div>
                                </div> 
                                <div class="form-actions">
                                  <div class="row">
                                    <div class="col-md-offset-8 col-md-2">
                                      <a href="<?php echo site_url('Rental/rentIn')?>"><button type="button" class="btn default">Cancel</button></a>
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
var netAmount=0;
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
 // console.log($('#in_date').val()+' '+$('#in_time').val());

function getHour(start_actual_time,end_actual_time){
  start_actual_time = new Date(start_actual_time);
  end_actual_time = new Date(end_actual_time);

  var diff = end_actual_time - start_actual_time;

  var diffSeconds = diff/1000;
  var HH = Math.floor(diffSeconds/3600);
  var MM = Math.floor(diffSeconds%3600)/60;

  var formatted = ((HH < 10)?("0" + HH):HH) 
  return formatted;
}

$('#dynamic_field').on("change",'[name^=qty]',function(){
   if($(this).val()>$(this).data('original-id') || $(this).val() == 0){
     $(this).val($(this).data('original-id'));
   }
   else{
    setTotal();
    // var price=$('#price_'+($(this).attr('id').substring(4))).val();
    // var total=parseInt(price)*$(this).val();
    // $('#totalprice_'+($(this).attr('id').substring(4))).val(total);

   }

});
$("#amountReceived").on("change",function(){
    var rec = $(this).val();
    var tot = $("#total_amount").val();
    var ret = rec - tot ;
    $("#amountReturned").val(ret);
    // console.log(ret);
});

$("#old_balance").change(function() {
    setTotal();
    // if($('#total_amount').val()!=''){
    // $('#total_amount').val( parseInt($('#total_amount').val()) + parseInt($('#old_balance').val()) );
    // }

});

function setTotal(){
  var total=0;
       $('#dynamic_field tbody tr').each(function (i, row) {
      var qty =$(row).find('input[name^="qty"]').val(); 
      var price =$(row).find('input[name^="price"]').val(); 
      var difference=$(row).find('input[name^="daysMonth"]').val();
      total= total + price*qty*difference;
      $(row).find('input[name^="totalprice"]').val(price*qty*difference);
      });

      $('#net_amount').val(total);
      $('#vat_amount').val(total*0.05);
      $('#discount').val('');
      if ($('#inc_old').is(':checked')){
        // console.log(parseInt($('#old_balance').val()) );
        $('#total_amount').val((total*0.05)+total + parseInt($('#old_balance').val()) - $('#advance').val() + $('#damage').val()  );
      }else{
        // console.log('dfas');
        $('#total_amount').val((total*0.05)+total - $('#advance').val() + $('#damage').val() );
      }
// $('#dynamic_field tbody tr').each(function (i, row) {

//       var outdate =($(row).find('input[name^="outdate"]').val()).substring(0,10); 
//       var qty =$(row).find('input[name^="qty"]').val(); 
//       var price =$(row).find('input[name^="price"]').val(); 
//       var difference=showDays(outdate,$('#in_date').val());
//       total= total + price*qty*difference;
//       console.log(total);
// });

//       $('#net_amount').val(total);
//       $('#vat_amount').val(total*0.05);
//       $('#discount').val('');

//       if ($('#inc_old').is(':checked')){
//         // console.log(parseInt($('#old_balance').val()) );
//         $('#total_amount').val((total*0.05)+total + parseInt($('#old_balance').val()) - $('#advance').val() + $('#damage').val()  );
//       }else{
//         // console.log('dfas');
//         $('#total_amount').val((total*0.05)+total - $('#advance').val() + $('#damage').val() );
//       }
//       // $('#total_amount').val((total*0.05)+total);
//       // $('#total_amount').val( ( (total*0.05)+total) - $('#advance').val() );
//       // $('#total_amount').val( ( (total*0.05)+total) - $('#advance').val() + $('#damage').val() );
} 

//calcutaing days and time at first.................
$('#dynamic_field tbody tr').each(function (i, row) {

      var outdate =($(row).find('input[name^="outdate"]').val()).substring(0,10); 
      var outtime =($(row).find('input[name^="outtime"]').val()); 
      var hours=getHour(outdate+' '+outtime , $('#in_date').val()+' '+$('#in_time').val());
      // console.log(hours);
      var difference=showDays(outdate,$('#in_date').val());
      $(row).find('input[name^="hours"]').val(hours);
      // $(row).find('input[name^="days"]').val(difference);
     

});

////////END OF //////////////////////////////
function setTotalOnDateChange(){
  var total=0;

$('#dynamic_field tbody tr').each(function (i, row) {

      var outdate =($(row).find('input[name^="outdate"]').val()).substring(0,10); 
      var outtime =($(row).find('input[name^="outtime"]').val()); 

      // var qty =$(row).find('input[name^="qty"]').val(); 
      // var price =$(row).find('input[name^="price"]').val(); 
      var difference=showDays(outdate,$('#in_date').val());
      var hours=getHour(outdate+' '+outtime , $('#in_date').val()+' '+$('#in_time').val());
      $(row).find('input[name^="hours"]').val(hours);
      // $(row).find('input[name^="days"]').val(difference);
      // total= total + price*qty*difference;

});

  // $('#net_amount').val(total);
  // $('#vat_amount').val(total*0.05);
  // $('#discount').val('');
  // $('#total_amount').val( ( (total*0.05)+total) - $('#advance').val() + $('#damage').val() );
}

function showDays(firstDate,secondDate){
  var day_start = new Date(firstDate);
  var day_end = new Date(secondDate);
  var total_days = (day_end - day_start) / (1000 * 60 * 60 * 24);
  if(total_days==0){
    return 1;
  }else{
    return total_days;
  }
}

// $('#net_amount').val('<?php echo $total; ?>');
// $('#vat_amount').val('<?php echo ($total*0.05); ?>');
// $('#total_amount').val('<?php echo ($total*0.05)+$total; ?>' - $('#advance').val());

$('#in_date').on("change",function(){
      setTotalOnDateChange();
 });


$('#dynamic_field').on("change",'[name^=daysMonth]',function(){
  var total=0;

     $('#dynamic_field tbody tr').each(function (i, row) {
      var qty =$(row).find('input[name^="qty"]').val(); 
      var price =$(row).find('input[name^="price"]').val(); 
      var difference=$(row).find('input[name^="daysMonth"]').val();
      total= total + price*qty*difference;
      $(row).find('input[name^="totalprice"]').val(price*qty*difference);
      });

      $('#net_amount').val(total);
      $('#vat_amount').val(total*0.05);
      $('#discount').val('');
      if ($('#inc_old').is(':checked')){
        // console.log(parseInt($('#old_balance').val()) );
        $('#total_amount').val((total*0.05)+total + parseInt($('#old_balance').val()) - $('#advance').val() + $('#damage').val()  );
      }else{
        // console.log('dfas');
        $('#total_amount').val((total*0.05)+total - $('#advance').val() + $('#damage').val() );
      }
      // $('#total_amount').val( ( (total*0.05)+total) - $('#advance').val() + $('#damage').val() );
 });

function totalAmount(){
  var net= $('#net_amount').val();
  var vat= (($('#net_amount').val() - $(this).val())*0.05);
  var discount= $('#discount').val();
  var damage= $('#damage').val();
  var advance= $('#advance').val();

  return  ( ( net - discount + vat ) + damage ) - advance ;
}

$('#discount').on("change",function(){

  var vat= (($('#net_amount').val() - $(this).val())*0.05);
  $('#vat_amount').val(vat);
  $('#total_amount').val(( ($('#net_amount').val() - $(this).val()) + vat ) - $('#advance').val() +  $('#damage').val());
 
 });

$('#damage').on("change",function(){
  var vat= (($('#net_amount').val())*0.05);
  $('#vat_amount').val(vat);
  $('#total_amount').val(( ($('#net_amount').val() - $('#discount').val()) + vat ) - $('#advance').val() + parseFloat($('#damage').val()) );
 
  // $('#total_amount').val( ($('#total_amount').val() - $(this).val()) );
 });

$('#dynamic_field').on("change",'[name^=statusProduct]',function(){
   var id=$(this).attr('id');
   
   if($(this).is(":checked")) {
     $('#hiddenCheckbox_'+id).val('on');
   }else{
     $('#hiddenCheckbox_'+id).val('off');
   }

 });

$("#inc_old").change(function() {
    
    if(this.checked) {
        //Do stuff
        $('#old_balance').attr('readonly',false);
          if($('#total_amount').val()==''){
          $('#total_amount').val(($('#total_amount').val()) + parseInt($('#old_balance').val()) );
          }else{
          $('#total_amount').val( parseFloat($('#total_amount').val()) + parseInt($('#old_balance').val()) );  
          }

        // setTotal();
    }else{
        $('#old_balance').attr('readonly',true);
        // setTotal();
        $('#total_amount').val( parseFloat($('#total_amount').val()) - parseInt($('#old_balance').val()) );

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