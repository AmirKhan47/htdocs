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
                <!-- <div class="caption font-dark">
                  <i class="icon-settings font-dark"></i>
                  <span class="caption-subject bold uppercase">Manage Receipts </span>
                </div> -->
                <div class="actions">
                  <div class="btn-group">
                                       <!--  <a data-toggle="modal" href="#addProductModel" class="btn green-haze btn-lg item_edit" >Add Product</a>
                                     </a> -->

                                   </div>
                                 </div>
                               </div>              

                               <div class="portlet-body">
                                <form id="form" class="form-horizontal" action="<?php echo base_url(); ?>Payments/addExpense" method="post">
                                <div class="form-body">
                                   <div class="row">
                                    <div class="col-md-6">
                                     <div class="form-group ">
                                        <label class="col-md-3 col-form-label"><strong>Date</strong></label>
                                        <div class="col-md-6">
                                          <input name="date" id="date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text"  >
                                        <!-- <span class="help-block"></span> -->
                                        </div>
                                      </div>
                                      <div class="form-group ">
                                        <label class="col-md-3 col-form-label"><strong>Time</strong></label>
                                        <div class="col-md-6">
                                          <input type="text" class="form-control timepicker-default timepicker-default-default" value="<?php if(isset($detail)){ echo $detail->out_time; }else{} ?>" name="tr_time" id="tr_time"> </div>
                                        </div>
                                        <div class="form-group ">
                                          <label class="col-md-3 col-form-label"><strong>Type</strong></label>
                                          <div class="col-md-6">
                                            <select class="form-control" name="trans_type" id="trans_type" required> 
                                              <option></option>
                                              <option value="supplier">Supplier</option>
                                              <option value="expense">Expense</option>
                                            </select>  
                                            <span class="help-block"></span>
                                          </div>
                                        </div>
                                        <div class="form-group hidden_field_supplier" hidden>
                                          <label class="col-md-3 col-form-label"><strong>Supplier</strong></label>
                                          <div class="col-md-6">
                                            <select class="form-control input-medium" name="suppliers" id="suppliers"  > 
                                              <option></option>
                                              <?php if(!empty($suppliers)) { ?>  
                                              <?php foreach ($suppliers as $supplier) { ?>
                                              <option value="<?php echo $supplier->sup_id; ?>" ><?php echo $supplier->sup_name; ?></option>   
                                              <?php } }?>
                                            </select>  
                                          </div>
                                        </div>
                                         <input type="hidden" name="actual_Invoices" id="actual_Invoices" value=""> 
                                        <input type="hidden" name="actual_types" id="actual_types" value=""> 
                                      <div class="form-group ">
                                        <label class="col-md-3 col-form-label"><strong>Banks</strong></label>
                                        <div class="col-md-6">
                                        <select class="form-control" name="banks" id="banks" required > 
                                            <option></option>  
                                            <?php if(!empty($banks)) { ?>

                                            <?php foreach ($banks as $name) { ?>
                                            <option value="<?php echo $name->bank_id; ?>" ><?php echo $name->bank_name.':    '.$name->bank_balance; ?></option>   
                                            <?php } }?>
                                          </select>  
                                          <!-- <span class="help-block">Balance:</span><span id="bank_balance"> </span> -->
                                        </div>
                                      </div>
                                      <div class="form-group hidden_field_account" hidden>
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
                                      <div class="form-group ">
                                        <label class="col-md-3 col-form-label"><strong>Payment Mode</strong></label>
                                        <div class="col-md-6">
                                        <select class="form-control" name="payment_mode" id="payment_mode" > 
                                            <option></option>  
                                            <option value="cash">Cash</option>
                                            <option value="cheque">Cheque</option>
                                          </select>  
                                          <span class="help-block"></span>
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
                                      	  <label class="col-md-3 col-form-label"><strong>Remarks</strong></label>
                                        	<div class="col-md-6">
                                          <textarea class="form-control" name="remarks"  id="remarks" rows="5" placeholder="Description" ></textarea>
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
                                <div class="hidden_table_expense" hidden>
                                <div class="row">
                                  <div class="col-md-12">
                                    <input type="button"  name="add" id="add" class="btn green" value="Add More"> 
                                    <table class="table table table-striped table-bordered" id="dynamic_field">
                                      <thead>
                                        <tr>
                                          <th>Account Code</th>
                                          <th>Description</th>
                                          <th>Amount</th>
                                          <th>Vat</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                                </div>
                                <div class="hidden_table_supplier" >
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
                                </div>
                                <div class="form-actions">
                                  <div class="row">
                                    <div class="col-md-offset-8 col-md-2">
                                      <button type="button" class="btn default">Cancel</button>
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
                <!-- varibales for global use... -->
                <?php $this->load->view('layouts/common_js'); ?>
                <script type="text/javascript">
var selectData=new Array();
window.sup_id=0;
var table;

$(document).ready(function() {
  $('#suppliers').select2();
  table = $('#table').DataTable({ 
        // Load data for the table's content from an Ajax source
        "ajax": {
          "url": "<?php echo site_url('Receipts/getInvoices')?>/"+sup_id,
          "type": "POST"
        }
      });
  //Geeting accounts.............
    $.ajax({

        url:"<?php echo base_url() ?>/Banking/getAccounts",
        type: "POST",
        dataType:"json",
        success:function(data){
            console.log(data);
            // Add options
            for (var i in data) {
                selectData[i]='<option value=' + data[i]['id']+'>' + data[i]['account_name'] + '</option>';
            }
        }
    });
  var i=0; 
  $('#add').click(function(){  
  $("#dynamic_field tbody tr").each(function() {    
    i++;
   });

   $('#dynamic_field').append('<tr id="row'+i+'"><td><select class="form-control" name="accounts[]" id="accounts_' + i + '"><option></option></select></td><td><input type="text" required class="form-control " name="description[]" id="description_' + i + '" data-original-id="" > </td><td><input type="text" required class="form-control" value="0" name="amount[]" id="amount_' + i + '"> </td><td><input type="checkbox" class="form-control" name="vat[]" id="vat_' + i + '" > </td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
   $('#accounts_'+i).append(selectData);


});  
  $("#suppliers").on("change",function(){
      sup_id = $(this).val();
      table.ajax.url("<?php echo site_url('Receipts/getSupInvoices')?>/"+sup_id).load();
    });

  $(document).on('click', '.btn_remove', function(){  
   var button_id = $(this).attr("id");   
   $('#row'+button_id+'').remove();  
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
      // if(total <= $('#received_amount').data('original-value')) { // gets value){
      //       $('#received_amount').val($('#received_amount').data('original-value')- total);       
      //       $('#total_amount').val(0);
      // }else{
      //       $('#received_amount').val($('#received_amount').data('original-value'));       
      //       $('#total_amount').val(total);
      // }
      $('#total_amount').val(total);
    });


$('#dynamic_field').on("change",'[name^=vat]',function(){
    total=0;
      $('#dynamic_field').find('tbody tr').each(function () {
        var row = $(this);
        if (row.find('input[type="checkbox"]').is(':checked') ) {
            console.log(row.find('input[name^=amount]').val());
            total= total + parseInt(row.find('input[name^=amount]').val() ) + ( parseInt(row.find('input[name^=amount]').val() ) * 0.05 )  ; 
        }else{
            console.log('inNotCheck');
            total= total + parseInt(row.find('input[name^=amount]').val() ) ; 
        }
    });
      $('#total_amount').val(total);
});

$('#dynamic_field').on("change",'[name^=amount]',function(){
    total=0;
      $('#dynamic_field').find('tbody tr').each(function () {
        var row = $(this);
        if (row.find('input[type="checkbox"]').is(':checked') ) {
            console.log(row.find('input[name^=amount]').val());
            total= total + parseInt(row.find('input[name^=amount]').val() ) + ( parseInt(row.find('input[name^=amount]').val() ) * 0.05 )  ; 
        }else{
            console.log('inNotCheck');
            total= total + parseInt(row.find('input[name^=amount]').val() ) ; 
        }
    });
      $('#total_amount').val(total);
});

  $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        todayBtn: true,
        todayHighlight: true,
        setDate: new Date()

    });
    $(".datepicker").datepicker("setDate", new Date());

    $('#trans_type').on("change",function(){
     if($(this).val() == "supplier"){
       $(".hidden_field_supplier").attr("hidden", false);
       $(".hidden_field_account").attr("hidden", false);
       $(".hidden_table_supplier").attr("hidden", false);
       $(".hidden_table_expense").attr("hidden", true);
       $("#account_id").val('');
       // $("#suppliers").val('');
       // $("#suppliers").prop("selectedIndex", 0).trigger('change');
        table.clear().draw();

     }
     else{
       $(".hidden_table_supplier").attr("hidden", true);
       $(".hidden_field_supplier").attr("hidden", true);
       $(".hidden_field_account").attr("hidden", true);
       $(".hidden_table_expense").attr("hidden", false);
       $("#account_id").val('');

        table.clear().draw();


     }
   });

	$('#payment_mode').on("change",function(){
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
