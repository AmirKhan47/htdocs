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
                                <span class="caption-subject bold uppercase">Manage Bank</span>
                            </div>
                            <div class="tools"></div>

                        </div>
                        <div class="portlet-body">
                          <div class="row" style="border-bottom: 1px solid #eef1f5;">
                        <div class="col-md-12">
                          <div class="form-group" >
                            <h4 class="control-label col-md-3"><strong>Select Date Range</strong></h4>
                            <div class="col-md-4">
                              <div class="input-group input-large  input-daterange"  >
                                <input type="text" class="form-control datepicker" id="min-date" name="min-date" data-date-format="yyyy-mm-dd" placeholder="From:">
                                <span class="input-group-addon">  </span>
                                <input type="text" class="form-control datepicker" id="max-date" name="max-date" data-date-format="yyyy-mm-dd" placeholder="To:"> 
                                <span class="input-group-btn">
                                  <button class="btn default" type="button" id="clear">
                                    <i class="fa fa-times"></i>
                                  </button>
                                  <button class="btn default" type="button"id="search" >
                                    <i class="fa fa-search"></i>
                                  </button>

                                </span>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div  id="wait" hidden>
                                <img src="<?php echo base_url(); ?>uploaded/ajax-loader.gif" />
                              </div>
                              <p class="Error" style="display:none;">Please select dates.</p>

                            </div>  
                          </div>
                        </div> 
                    </br>
                    </br>

                      </div>
                    </br>
                          <div class="row" style="border-bottom: 1px solid #eef1f5;">
                      <div class="col-md-3 col-md-offset-3 ">
                        <!-- BEGIN WIDGET THUMB -->
                        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                          <h4 class="widget-thumb-heading">Current Balance</h4>
                          <div class="widget-thumb-wrap">
                            <i class="widget-thumb-icon bg-green-jungle fa fa-bank"></i>
                            <div class="widget-thumb-body">
                              <span class="widget-thumb-subtitle">AED</span>
                              <span class="widget-thumb-body-stat" data-counter="counterup" data-value="7,644"><span id="aAmount"><?php echo $detail['bank_balance'];?></span></span>
                              <input type="hidden" value="<?php echo $detail['bank_id'];?>" id="bank_id" />
                            </div>
                          </div>
                        </div>
                        <!-- END WIDGET THUMB -->
                      </div>
                    </div>
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="bank_tbl">
                                        <thead>
                                            <tr>
                                               <!-- <td># Tr</td> -->
                                               <th>Date</th>
                                               <th>Journal</th>
                                               <th>Slip #</th>
                                               <th>Customer / Vendor</th>
                                               <th width="20%">Description </th>
                                               <th>Received / Paid</th>
                                               <th>Amount </th>

                                           </tr>
                                       </thead>
                                       <tbody>
                                           <?php if(!empty($transactions)): ?>
                                           <?php $i=1; foreach($transactions as $row): ?>
                                           <tr class='clickable-row' data-id="<?php echo $row['bt_id'] ?>" >

                                               <!-- <td><?php echo $row['bt_id']; ?></td> -->
                                               <td><?php echo $row['tr_date']; ?></td>
                                               <td><?php echo $row['type']; ?></td>
                                               <td><?php echo $row['invoice_id']; ?></td>
                                               <td><?php echo $row['cust_name']; ?></td>
                                               <td><?php echo $row['description']; ?> </td>
                                               <td><?php echo $row['payment_type']; ?> </td>
                                               <td><?php echo $row['amount']; ?> </td>
                                   </tr>

                                   <?php $i++; endforeach; ?>
                               <?php endif; ?>
                           </tbody>
                       </table>

       </div>
   </div>
</div>
</div>

</div>
</div>
</div>
<!-- varibales for global use... -->
<script>
window.table_id = "bank_tbl";
</script>
<?php $this->load->view('layouts/footer'); ?>
<?php $this->load->view('layouts/common_js'); ?>
<script>
$(document).ready(function () {
  $(".datepicker").datepicker("setDate", new Date());
  
  $("#clear").on('click', function() {

    $("#min-date").val("");
    $("#max-date").val("");

  });
table = $('#bank_tbl').DataTable();
    $('#bank_tbl tbody').on('dblclick', 'tr', function () {
      var type = $(this).closest('tr').find('td:eq(1)').text();
      var id = $(this).closest('tr').find('td:eq(2)').text();
      if(type == "rentIn"|| type == "rentin"){
        window.location = "<?php echo site_url('Invoice/rentinInvoice')?>/"+id;
      }else if(type == "sale"){
          window.location = "<?php echo site_url('Invoice/saleInvoice')?>/"+id;
      }else if(type == "supplier"){
          window.location = "<?php echo site_url('Invoice/supplierInvoice')?>/"+id;
      }
    } );

  $("#search").on('click', function() {
    
    if($("#min-date").val()!="" && $("#max-date").val()!=""){
      $('.Error').hide();
      var min_date=$("#min-date").val();
      var max_date=$("#max-date").val();
     

      $.ajax({

        url:"<?php echo base_url() ?>index.php/Banking/bank_result/"+ $('#bank_id').val() ,
        type: "GET",
        data: {min_date:min_date,max_date:max_date},
        dataType:"json",
        beforeSend: function() { $('#wait').show(); },
        complete: function() { $('#wait').hide(); },
        success:function(data){
          if(data!=""){
          console.log(data);
          table.clear().draw();
          var all_total_amount=0;
          
          for (var i = 0; i < data.length; i++) {
          //Geeting data......
          var date=data[i]["tr_date"];
          var type=data[i]["type"];
          var invoice_id=data[i]["invoice_id"];
          var cust_name=data[i]["cust_name"];
          var description=data[i]["description"];
          var payment_type=data[i]["payment_type"];
          var total_amount=data[i]["total_amount"];

          if(data[i]["payment_type"]=='Paid'){
              all_total_amount=all_total_amount-parseFloat(data[i]["total_amount"]);
          }else{
              all_total_amount=all_total_amount+ parseFloat(data[i]["total_amount"]);
          }

          //seating data in table.......
          
          var newRow = '<tr class="clickable-row" id="" data-url="amc/amc_detail/">'+
          '<td>'+date+'</td>'+
          '<td>'+type+'</td>'+
          '<td>'+invoice_id+'</td>'+
          '<td>'+cust_name+'</td>'+
          '<td>'+description+'</td>'+
          '<td>'+payment_type+'</td>'+
          '<td>'+total_amount+'</td>'+
          '</tr>';    
          table.row.add($(newRow )).draw();
          //console.log(totalAmount);
        }
        
          $("#aAmount").text(all_total_amount);

      }else{
        dataTable.clear().draw();
      }
    }
  });
}else{
  $('.Error').show();
}
});

});
</script>

</body>
</html>