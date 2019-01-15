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
             <div class="portlet-title tabbable-line">
              <div class="caption caption-md">
                <i class="icon-globe theme-font hide"></i>
                <!-- <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span> -->
              </div>
              <ul class="nav nav-tabs">
                <li class="active">
                  <a href="#tab_1_1" data-toggle="tab">Receipt Entry</a>
                </li>
                <li>
                  <a href="#tab_1_2" data-toggle="tab">Payment Received</a>
                </li>
              </ul>
            </div>
          </br>
          <div class="portlet-body">
            <div class="tab-content">
              <!-- Receipt  TAB -->
              <div class="tab-pane active" id="tab_1_1">
                <form id="form" class="form-horizontal" action="<?php echo base_url(); ?>Receipts/updateRentin" method="post">
                  <div class="form-body">
                   <div class="row">
                    <div class="col-md-6">
                      <div class="form-group ">
                        <label class="col-md-3 col-form-label"><strong>Date</strong></label>
                        <div class="col-md-6">
                          <input name="date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text"> </div>  
                          <span class="help-block"></span>
                        </div>
                        <div class="form-group ">
                          <label class="col-md-3 col-form-label"><strong>Time</strong></label>
                          <div class="col-md-6">
                            <input type="text" class="form-control timepicker-default timepicker-default-default" value="<?php if(isset($detail)){ echo $detail->out_time; }else{} ?>" name="trans_time" id="trans_time"> </div>
                          </div>
                          <div class="form-group ">
                            <label class="col-md-3 col-form-label"><strong>By</strong></label>
                            <div class="col-md-6">
                              <select class="form-control" name="By" id="By" required> 
                                <option></option>
                                <option value="ref">Reference</option>
                                <option value="inv">Invoice</option>
                              </select>  
                              <span class="help-block"></span>
                            </div>
                          </div>
                          <!-- <div class="form-group ">
                            <label class="col-md-3 col-form-label"><strong>Type</strong></label>
                            <div class="col-md-6">
                              <select class="form-control" name="trans_type" id="trans_type" required> 
                                <option></option>
                                <option value="customer">Customer</option>
                                <option value="supplier">Supplier</option>
                              </select>  
                              <span class="help-block"></span>
                            </div>
                          </div> -->
                          <!-- <div class="form-group hidden_field_supplier" hidden>
                            <label class="col-md-3 col-form-label"><strong>Supplier</strong></label>
                            <div class="col-md-6">
                              <select class="form-control input-medium" name="suppliers" id="suppliers"  > 
                                <option></option>
                                <?php if(!empty($banks)) { ?>  
                                <?php foreach ($suppliers as $supplier) { ?>
                                <option value="<?php echo $supplier->sup_id; ?>" ><?php echo $supplier->sup_name; ?></option>   
                                <?php } }?>
                              </select>  
                            </div>
                          </div> -->
                          <div class="form-group" >
                            <label class="col-md-3 col-form-label"><strong>Customer Name</strong></label>
                            <div class="col-md-6">
                              <select class="form-control input-medium" name="cust_name" id="cust_name" > 
                                <option></option>  
                                <?php if(!empty($cust_name)) { ?>
                                <?php foreach ($cust_name as $name) { ?>
                                <option value="<?php echo $name->cust_id; ?>" ><?php echo $name->cust_name.':    '.$name->total_credit; ?></option>   
                                <?php } }?>
                              </select>  
                              <span class="help-block"></span>
                            </div>
                          </div>
                          <input type="hidden" name="actual_Invoices" id="actual_Invoices" value=""> 
                          <input type="hidden" name="actual_types" id="actual_types" value=""> 

                          <div class="hidden_field_banks" hidden>
                          <div class="form-group">
                            <label class="col-md-3 col-form-label"><strong>Banks</strong></label>
                            <div class="col-md-6">
                              <select class="form-control" name="banks" id="banks"  > 
                                <option></option>  
                                <?php if(!empty($banks)) { ?>

                                <?php foreach ($banks as $name) { ?>
                                <option value="<?php echo $name->bank_id; ?>" ><?php echo $name->bank_name.':    '.$name->bank_balance; ?></option>   
                                <!-- <option value="<?php echo $name->bank_id; ?>" ><?php echo $name->bank_name; ?></option>    -->
                                <?php } }?>
                              </select>  
                              <span class="help-block"></span>
                            </div>
                          </div>
                          <div class="form-group ">
                            <label class="col-md-3 col-form-label"><strong>Accounts</strong></label>
                            <div class="col-md-6">
                              <select class="form-control" name="accounts" id="accounts"  > 
                                <option></option>  
                                <?php if(!empty($accounts)) { ?>
                                <?php foreach ($accounts as $name) { ?>
                                <option value="<?php echo $name->id; ?>" ><?php echo $name->account_name; ?></option>   
                                <?php } }?>
                              </select>  
                              <span class="help-block"></span>
                            </div>
                          </div>
                          <div class="form-group ">
                            <label class="col-md-3 col-form-label"><strong>Reccipt Mode</strong></label>
                            <div class="col-md-6">
                              <select class="form-control" name="receipt_mode" id="receipt_mode" > 
                                <option></option>  
                                <option value="cash">Cash</option>
                                <option value="cheque">Cheque</option>
                              </select>  
                              <span class="help-block"></span>
                            </div>
                          </div>
                          </div>
                          <div class="form-group hidden_fields" hidden>
                            <label class="col-md-3 col-form-label"><strong>Cheque No</strong></label>
                            <div class="col-md-6">
                              <input type="text" name="cheque_no" id="cheque_no" class="form-control"> 
                              <span class="help-block"></span>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group ">
                            <label class="col-md-3 col-form-label"><strong>Trans No</strong></label>
                            <div class="col-md-6">
                              <input name="trans_no" readonly class="form-control" value="<?php echo $tr_no->virtual_invoice; ?>" type="text">    
                              <span class="help-block"></span>
                            </div>
                          </div>
                          <div class="form-group ">
                           <label class="col-md-3 col-form-label"><strong>Description</strong></label>
                           <div class="col-md-6">
                            <textarea class="form-control" name="description"  id="description" rows="5" placeholder="Description" ></textarea>
                            <span class="help-block"></span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-3 col-form-label"><strong>Received Amount</strong></label>
                          <div class="col-md-6">
                            <input type="text" readonly name="received_amount" id="received_amount" class="form-control"> 
                            <span class="help-block"></span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-3 col-form-label"><strong>Discount</strong></label>
                          <div class="col-md-6">
                            <input type="text" name="discount" id="discount" class="form-control"> 
                            <span class="help-block"></span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-3 col-form-label"><strong>Total Amount</strong></label>
                          <div class="col-md-6">
                            <input type="text" readonly name="total_amount" id="total_amount" class="form-control"> 
                            <span class="help-block"></span>
                          </div>
                        </div>
                        <div class="form-group hidden_fields"  hidden>
                          <label class="col-md-3 col-form-label"><strong>Cheque Date</strong></label>
                          <div class="col-md-6">
                            <input name="cheque_date" id="cheque_date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text"  >
                            <span class="help-block"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </br>
                </br>
                <div class="row">
                  <div class="col-md-12">
                    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Date</th>
                          <th>Invoice #</th>
                          <th>Type</th>
                          <th>Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="form-actions">
                <div class="row">
                  <div class="col-md-offset-8 col-md-2">
                    <button type="button" class="btn default">Cancel</button>
                    <button type="button" id="clearPayment" class="btn blue">Submit</button>
                    <!-- <button type="submit" class="btn blue">Submit</button> -->
                  </div>
                </div>
              </div>
            </form>
          </div>
          <!--End of Receipt tab -->
          <!-- CHANGE AVATAR TAB -->
          <div class="tab-pane" id="tab_1_2">
            <form action="<?php echo base_url();?>/Receipts/receivedAmount" id="form2" method="POST" class="form-horizontal"  enctype="multipart/form-data">
              <div class="form-body">
               <div class="row">
                <div class="col-md-6">
                  <div class="form-group ">
                    <label class="col-md-3 col-form-label"><strong>Date</strong></label>
                    <div class="col-md-6">
                      <input name="received_date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text"> </div>  
                      <span class="help-block"></span>
                    </div>
                 <div class="form-group">
                  <label class="col-md-3 col-form-label"><strong>Customer Name</strong></label>
                  <div class="col-md-6">
                    <select class="form-control " name="cust_id" id="cust_id" required > 
                      <option></option>  
                      <?php if(!empty($cust_name)) { ?>
                      <?php foreach ($cust_name as $name) { ?>
                      <option value="<?php echo $name->cust_id; ?>" ><?php echo $name->cust_name.':    '.$name->total_credit; ?></option>   
                      <?php } }?>
                    </select>  
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-form-label"><strong>Amount</strong></label>
                  <div class="col-md-6">
                    <input type="text"  name="cust_received_amount" id="cust_received_amount" class="form-control" required> 
                    <span class="help-block"></span>
                  </div>
                </div>

              </div>
              <div class="col-md-6">
               <div class="form-group ">
                <label class="col-md-3 col-form-label"><strong>Banks</strong></label>
                <div class="col-md-6">
                  <select class="form-control" name="bank_id" id="bank_id" required > 
                    <option></option>  
                    <?php if(!empty($banks)) { ?>

                    <?php foreach ($banks as $name) { ?>
                    <option value="<?php echo $name->bank_id; ?>" ><?php echo $name->bank_name.':    '.$name->bank_balance; ?></option>   
                    <!-- <option value="<?php echo $name->bank_id; ?>" ><?php echo $name->bank_name; ?></option>    -->
                    <?php } }?>
                  </select>  
                  <span class="help-block"></span>
                </div>
              </div>
              <div class="form-group ">
                <label class="col-md-3 col-form-label"><strong>Accounts</strong></label>
                <div class="col-md-6">
                  <select class="form-control" name="account_id" id="account_id"  > 
                    <option></option>  
                    <?php if(!empty($accounts)) { ?>
                    <?php foreach ($accounts as $name) { ?>
                    <option value="<?php echo $name->id; ?>" ><?php echo $name->account_name; ?></option>   
                    <?php } }?>
                  </select>  
                  <span class="help-block"></span>
                </div>
              </div>
            </div>
          </div>   
        </div>
      </br>
      <button type="submit" id="btnUpdate" class="btn btn-primary col-md-offset-11">Update</button>
    </form>    
  </div>
  <!-- END Agrement TAB -->
</div>
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
var table;
window.cust_id=0;
var total=0;
$(document).ready(function() {
  $('#cust_name').select2();
  $('#suppliers').select2();
  $('.datepicker').datepicker({
    autoclose: true,
    format: "yyyy-mm-dd",
    todayHighlight: true,
    todayBtn: true,
    todayHighlight: true,
    setDate: new Date()

  });
  $(".datepicker").datepicker("setDate", new Date());
  table = $('#table').DataTable({ 
        // Load data for the table's content from an Ajax source
        "ajax": {
          "url": "<?php echo site_url('Receipts/getInvoices')?>/"+cust_id,
          "type": "POST"
        },
      });

  function reload_table()
  {
      table.ajax.reload(null,false); //reload datatable ajax 
    }

    $("#cust_name").on("change",function(){
      cust_id = $(this).val();
      $.ajax({
        url : "<?php echo site_url('Customer/customerDetail')?>/"+cust_id,
        dataType: "JSON",
        success: function(data)
        {
              // console.log(data);
              $('#received_amount').val(data.cust_received_amount);
              $('#received_amount').data('original-value',data.cust_received_amount); // sets value

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              // alert('Error deleting data');
            }
          });
      table.ajax.url("<?php echo site_url('Receipts/getInvoices')?>/"+cust_id).load();
    });

    $("#suppliers").on("change",function(){
      sup_id = $(this).val();
      // alert(id);
      // reload_table();
      table.ajax.url("<?php echo site_url('Receipts/getSupInvoices')?>/"+sup_id).load();
    });

    $('#table').on("change",'[name^=checkInvoices]',function(){
      total=0;
      var invoices = [];  
      var types = [];  

      $('#table').find('tr').each(function () {
        var row = $(this);
        
        if (row.find('input[type="checkbox"]').is(':checked') ) {
          total= total +  parseInt(row.find('td:eq(4)').text());
          invoices.push(row.find('[name^=getInvoices]').val());
          types.push(row.find('[name^=invoiceType]').val());
        }
      });

      var selected_values = invoices.join(","); 
      var selected_types = types.join(","); 

      console.log(selected_values);
      console.log(selected_types);

      var newTotal=0;
      $('#actual_Invoices').val(selected_values);
      $('#actual_types').val(selected_types);

      // console.log(total);
      if(total <= $('#received_amount').data('original-value')) { // gets value){
            $('#received_amount').val($('#received_amount').data('original-value')- total);       
            $('#total_amount').val(0);
      }else{
            $('#received_amount').val($('#received_amount').data('original-value'));       
            $('#total_amount').val(total);
      }
      // $('#total_amount').val(total);
    });

    $('#clearPayment').on("click",function(){
      if($('#By').val()=='ref'){
        
        if($('#total_amount').val()!=0){
          alert('Please select correct invoices!')
        }else{
          $("#form").submit();
        }
      }
    });

    $('.datepicker').datepicker({
      autoclose: true,
      format: "yyyy-mm-dd",
      todayHighlight: true,
      todayBtn: true,
      todayHighlight: true,
      setDate: new Date()

    });

    $('#discount').on("change",function(){

      $('#total_amount').val( $('#total_amount').val() - $(this).val() );

    });

    $('#By').on("change",function(){
     if($(this).val() == "ref"){
       $(".hidden_field_banks").attr("hidden", true);
       $(".hidden_fields").attr("hidden", true);
       $("#banks").val("");
       $("#accounts").val("");
       $("#accounts").val("");
       $("#receipt_mode").val("");
       $("#cheque_no").val("");
       $("#cheque_date").val("");
     }
     else{
       $(".hidden_field_banks").attr("hidden", false);
     }
   });

   //  $('#trans_type').on("change",function(){
   //   if($(this).val() == "supplier"){
   //     $(".hidden_field_supplier").attr("hidden", false);
   //     $(".hidden_field_customer").attr("hidden", true);
   //     $("#cust_name").val("");

   //   }
   //   else if ($(this).val() == "customer") {
   //     $(".hidden_field_customer").attr("hidden", false);
   //     $(".hidden_field_supplier").attr("hidden", true);
   //     $("#supplier").val("");
   //   }else{
   //     $(".hidden_field_customer").attr("hidden", true);
   //     $(".hidden_field_supplier").attr("hidden", true);
   //     $("#supplier").val("");
   //     $("#cust_name").val("");

   //   }
   // });

    $('#receipt_mode').on("change",function(){
     if($(this).val() == "cash"){
       $(".hidden_fields").attr("hidden", true);
       $("#cheque_no").val("");
       $("#cheque_date").val("");
     }
     else if($(this).val() == "cheque"){
       $(".hidden_fields").attr("hidden", false);
     }else{
       $(".hidden_fields").attr("hidden", true);
       $("#cheque_no").val("");
       $("#cheque_date").val("");
     }

   });
  });


</script>

<?php 
if($this->session->flashdata('success')) {
  $message=$this->session->flashdata('success');
  echo "<script>    toastr.success('".$message."') </script>";
}else if($this->session->flashdata('error')) {
  $message=$this->session->flashdata('error');
  echo "<script>    toastr.error('".$message."') </script>";
}
?>
</body>
</html>
