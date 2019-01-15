<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('layouts/common'); ?>
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
                            <div class="actions">
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-primary"  id="search"><i class="glyphicon glyphicon-pencil"></i> Search</a>
                                </div>
                            </div>
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase">Manage Bank</span>
                            </div>
                            <div class="tools"></div>

                        </div>
                        <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="col-md-3 col-form-label"><strong>From Date</strong></label>
                                <div class="col-md-6">
                                <!-- <input name="cheque_date" id="cheque_date" class="form-control" type="date"> -->
                                <input name="from_date" id="from_date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                    <span class="help-block"></span>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="col-md-3 col-form-label"><strong>To Date</strong></label>
                                <div class="col-md-6">
                                <!-- <input name="cheque_date" id="cheque_date" class="form-control" type="date"> -->
                                <input name="to_date" id="to_date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                    <span class="help-block"></span>
                                </div>
                                </div>
                             </div>
                            </div>
                            <br/>
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="bank_tbl">
                                        <thead>
                                            <tr>
                                               <td># Sr</td>
                                               <th>Date</th>
                                               <th width="20%">Description </th>
                                               <th>Amount </th>

                                           </tr>
                                       </thead>
                                       <tbody>
                                           <?php if(!empty($transactions)): ?>
                                           <?php $i=1; foreach($transactions as $row): ?>
                                           <tr>

                                               <td><?php echo $i; ?></td>
                                               <td><?php echo $row['tr_date']; ?> </td>
                                               <td><?php echo $row['description']; ?> </td>
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
var from_date = 'null';
var to_date = 'null';
var id = 'null';
</script>
<?php $this->load->view('layouts/footer'); ?>
<?php $this->load->view('layouts/common_js'); ?>
<script>
$(document).ready(function () {
    table = $('#bank_tbl').DataTable();
    var url = window.location.href;
    id = location.pathname.split('/')[5];
    function urlReload(){

        table.ajax.url("<?php echo site_url('Banking/populate_account_details')?>/"+id+"/"+from_date+"/"+to_date).load();
    }
    $("#search").on("click",function(){
      from_date = $("#from_date").val();
      to_date = $("#to_date").val();
      if(from_date == "" || to_date == ""){
        alert("Please enter both the dates");
        return;
      }  else{
        urlReload();
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
});
</script>

</body>
</html>