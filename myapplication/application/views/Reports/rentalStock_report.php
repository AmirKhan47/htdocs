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
                                <a class="btn btn-sm btn-primary"  id="search"><i class="glyphicon glyphicon-pencil"></i> Search</a>
                                  <!-- <a class="btn btn-sm btn-danger"   id="delete" disabled ><i class="glyphicon glyphicon-trash"></i> Delete</a>
                                  <a class="btn btn-sm btn-info"  id="view" disabled ><i class="glyphicon glyphicon-eye"></i> View</a> -->
                                   </div>
                                 </div>
                               </div>          

                               <div class="portlet-body">
                                <form id="form" class="form-horizontal" method="post">
                                <div class="form-body">
                                <!-- <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="col-md-3 col-form-label"><strong>Transaction Type</strong></label>
                                        <div class="col-md-6">
                                        <select class="form-control" name="trans_type" id="trans_type" required> 
                                            <option></option>  
                                            <?php if(!empty($trans_type)) { ?>
                                            <?php foreach ($trans_type as $acc) { ?>
                                            <option value="<?php echo $acc->tr_type; ?>" ><?php echo $acc->tr_type; ?></option>
                                            <?php } }?>
                                          </select>  
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="col-md-3 col-form-label"><strong>Account Code</strong></label>
                                        <div class="col-md-6">
                                        <select class="form-control" name="account_code" id="account_code" required> 
                                            <option></option>  
                                            <?php if(!empty($accounts)) { ?>
                                            <?php foreach ($accounts as $acc) { ?>
                                            <option value="<?php echo $acc->id; ?>" ><?php echo $acc->account_name; ?></option>
                                            <?php } }?>
                                          </select>  
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                  </div>
                                </div> -->
                                   <!-- <div class="row">
                                    <div class="col-md-6">
                                     <div class="form-group">
                                        <label class="col-md-3 col-form-label"><strong>From Date</strong></label>
                                        <div class="col-md-6">
                                        <input name="from_date" id="from_date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                    	<div class="form-group">
                                        <label class="col-md-3 col-form-label"><strong>To Date</strong></label>
                                        <div class="col-md-6">
                                        <input name="to_date" id="to_date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                    </div>
                                  </div> -->
                                <div class="table-toolbar">
                                  <div class="row">
                                  <div class="col-md-12">
                                      <div class="btn-group pull-right">
                                          <button class="btn green  btn-outline dropdown-toggle" id="toolButton" data-toggle="dropdown">Tools
                                              <i class="fa fa-angle-down"></i>
                                          </button>
                                          <ul class="dropdown-menu pull-right" id="sale_tools">
                                              <li>
                                                  <a href="javascript:;" data-action="0" class="tool-action">
                                                      <i class="fa fa-print"></i> Print </a>
                                              </li>
                                              <li>
                                                  <a href="javascript:;" data-action="2" class="tool-action">
                                                  <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                              </li>
                                              <li>
                                                  <a href="javascript:;" data-action="3" class="tool-action">
                                                      <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                              </li>
                                          </ul>
                                      </div>
                                        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                          <thead>
                                              <tr>
                                                  <th></th>
                                                  <th>Product Description</th>
                                                  <!-- <th>Unit</th> -->
                                                  <th>Stock Qty</th>
                                                  <th>Rent Per Day</th>
                                                  <th>Rent Per Month</th>
                                                  <th>Brand</th>
                                                  <th>Model</th>
                                                  <th>Size</th>
                                                  <th>Vendor</th>
                                                  <th>Item Class</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                          </tbody>
                                      </table>
                                </div>
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
var table;
var id=0;
// var ty_type = 'null';
// var from_date= 'null';
// var to_date= 'null';
$(document).ready(function() {
  function reload_table()
  {
      table.ajax.reload(null,false); //reload datatable ajax
  }
  // function urlReload(){
  //     table.ajax.url("<?php echo site_url('Reports/populateRentalStockReport')?>/"+from_date+"/"+to_date+"/"+ty_type).load();
  // }
  // $("#search").on("click",function(){
  //     from_date = 'null';
  //     to_date = 'null';
  //     ty_type = 'null';
  //     if($("#from_date").val() != ''){
  //       from_date = $("#from_date").val();
  //     }
  //     if($("#to_date").val() != ''){
  //       to_date = $("#to_date").val();
  //     }
  //     if($("#trans_type").val() != ''){
  //       ty_type = $("#trans_type").val();
  //     }

  //     if((from_date != "null" && to_date == "null") || (from_date == "null" && to_date != "null") ) {
  //       alert("Please enter both Dates to search");
  //     }else{
  //       urlReload();
  //     }
  // });
  table = $('#table').DataTable({ 
      // Load data for the table's content from an Ajax source
      "ajax": {
          "url": "<?php echo site_url('Reports/populateRentalStockReport')?>",
          "type": "POST"
      },
      buttons: [
        { extend: 'print', className: 'btn dark btn-outline' },
        { extend: 'copy', className: 'btn red btn-outline' },
        { extend: 'pdf', className: 'btn green btn-outline' },
        { extend: 'excel', className: 'btn yellow btn-outline ' },
        { extend: 'csv', className: 'btn purple btn-outline ' }
        // { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
      ],

      //Set column definition initialisation properties.
      "columnDefs": [
      { 
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
      },
      ],

    });
  $('#sale_tools > li > a.tool-action').on('click', function() {
        var action = $(this).attr('data-action');
        console.log(action);
        $("#table").DataTable().button(action).trigger();
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
