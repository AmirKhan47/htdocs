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
              <!-- <div class="portlet-title"> -->
                <!-- <div class="caption font-dark">
                  <i class="icon-settings font-dark"></i>
                  <span class="caption-subject bold uppercase">Manage Receipts </span>
                </div> -->
                <!-- <div class="actions">
                  <div class="btn-group"> -->
                        <!--  <a data-toggle="modal" href="#addProductModel" class="btn green-haze btn-lg item_edit" >Add Product</a>
                      </a> -->
                <!-- <a class="btn btn-sm btn-primary"  id="search"><i class="glyphicon glyphicon-pencil"></i> Search</a> -->
                  <!-- <a class="btn btn-sm btn-danger"   id="delete" disabled ><i class="glyphicon glyphicon-trash"></i> Delete</a>
                  <a class="btn btn-sm btn-info"  id="view" disabled ><i class="glyphicon glyphicon-eye"></i> View</a> -->
                    <!-- </div>
                  </div> -->
                               <!-- </div> -->

                               <div class="portlet-body">
                                <form id="form" class="form-horizontal" method="post">
                                <div class="form-body">
                                <!-- Dont think we need any field or select statment-->
                                <!-- If select statment is required then uncomment this -->
                                   <!-- <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group "> 
                                        <label class="col-md-3 col-form-label"><strong>Search By</strong></label>
                                        <div class="col-md-6">
                                        <select class="form-control" name="searchType" id="searchType" >
                                            <option></option>
                                            <option value="rentIn">Search By Rent-In</option>
                                            <option value="rentOut">Search By Rent-Out</option>
                                          </select>  
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
                                                  <th>Equipment Name</th>
                                                  <th>Stock Qty</th>
                                                  <th>Rent-Out Qty</th>
                                                  <th>Balance Qty</th>
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
$(document).ready(function() {
  function reload_table()
  {
      table.ajax.reload(null,false); //reload datatable ajax
  }
  table = $('#table').DataTable({ 
      // Load data for the table's content from an Ajax source
      "ajax": {
          "url": "<?php echo site_url('Reports/populateRentalProducts')?>",
          "type": "POST"
      },

      buttons: [
            { extend: 'print', className: 'btn dark btn-outline' },
            { extend: 'copy', className: 'btn red btn-outline' },
            { extend: 'pdf', className: 'btn green btn-outline' },
            { extend: 'excel', className: 'btn yellow btn-outline' },
            { extend: 'csv', className: 'btn purple btn-outline ' },
            ],
    });
  $('#sale_tools > li > a.tool-action').on('click', function() {
        var action = $(this).attr('data-action');
        console.log(action);
        $("#table").DataTable().button(action).trigger();
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
