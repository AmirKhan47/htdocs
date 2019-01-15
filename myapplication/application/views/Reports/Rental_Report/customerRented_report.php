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
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group "> 
                                        <label class="col-md-3 col-form-label"><strong>Select Search Type</strong></label>
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
                                  <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="col-md-3 col-form-label"><strong>Customer Name</strong></label>
                                        <div class="col-md-6">
                                        <select class="form-control" name="cust_name" id="cust_name" required> 
                                            <option></option>  
                                            <?php if(!empty($cust_name)) { ?>
                                            <?php foreach ($cust_name as $name) { ?>
                                            <!-- if customers are to be matced using id then use id here and include customer table in the join as well -->
                                            <option value="<?php echo $name->temp_name; ?>" ><?php echo $name->temp_name; ?></option>
                                            <?php } }?>
                                          </select>  
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                  </div>
                                </div>
                                   <div class="row" id="hiddenRentIn" hidden>
                                    <div class="col-md-6">
                                     <div class="form-group">
                                        <label class="col-md-3 col-form-label"><strong>RentIn From Date</strong></label>
                                        <div class="col-md-6">
                                        <!-- <input name="cheque_date" id="cheque_date" class="form-control" type="date"> -->
                                        <input name="from_date" id="from_date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                    	<div class="form-group">
                                        <label class="col-md-3 col-form-label"><strong>RentIn To Date</strong></label>
                                        <div class="col-md-6">
                                        <!-- <input name="cheque_date" id="cheque_date" class="form-control" type="date"> -->
                                        <input name="to_date" id="to_date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row" id="hiddenRentOut" hidden>
                                    <div class="col-md-6">
                                     <div class="form-group">
                                        <label class="col-md-3 col-form-label"><strong>RentOut From Date</strong></label>
                                        <div class="col-md-6">
                                        <!-- <input name="cheque_date" id="cheque_date" class="form-control" type="date"> -->
                                        <input name="out_from_date" id="out_from_date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                    	<div class="form-group">
                                        <label class="col-md-3 col-form-label"><strong>RentOut To Date</strong></label>
                                        <div class="col-md-6">
                                        <!-- <input name="cheque_date" id="cheque_date" class="form-control" type="date"> -->
                                        <input name="out_to_date" id="out_to_date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
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
                                                  <th>RentOut DateTime</th>
                                                  <th>Product Name</th>
                                                  <th>Invoice NO</th>
                                                  <th>Out Qty</th>
                                                  <th>RentIn DateTime</th>
                                                  <th>In Qty</th>
                                                  <th>Balance Qty</th>
                                                  <th>Day Rate</th>
                                                  <th>Amount</th>
                                                  <!-- <th>Tr. Mode</th> -->
                                                  <th>Site</th>
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
var type = 0;
var cust = 0;
var from_date;
var to_date;
$(document).ready(function() {
  function reload_table()
  {
      table.ajax.reload(null,false); //reload datatable ajax
  }
  function urlReload(){
      type = $("#searchType").val();
      console.log(cust);
      table.ajax.url("<?php echo site_url('Reports/populateCustomerProducts')?>/"+from_date+"/"+to_date+"/"+type+"/"+cust).load();
  }
  $("#searchType").on("change",function(){
    var val = $(this).val();
    if(val == "rentIn"){
      $('#hiddenRentOut').hide();
      $('#hiddenRentIn').show();
    }else if(val == "rentOut"){
      $('#hiddenRentIn').hide();
      $('#hiddenRentOut').show();
    }else{
      $('#hiddenRentIn').hide();
      $('#hiddenRentOut').hide();

    }
  });
  $("#search").on("click",function(){
    from_date = null;
    to_date = null;
    cust = "";
    if($("#searchType").val() == "rentIn"){
      from_date = $("#from_date").val();
      to_date = $("#to_date").val();
      cust = $("#cust_name").val();
      if(from_date == "" || to_date == ""){
        //Malik idhar apna wo popup laga laen.
        alert("Please enter both the dates");
        return;
      } else if(cust == ""){
        alert("Please enter customer name");
        return;
      } else{
        urlReload();
      }
    }else if($("#searchType").val() == "rentOut"){
      from_date = $("#out_from_date").val();
      to_date = $("#out_to_date").val();
      cust = $("#cust_name").val();
      if(from_date == "" || to_date == ""){
        //Malik idhar apna wo popup laga laen.
        alert("Please enter both the dates");
      } else if(cust == ""){
        alert("Please enter customer name");
        return;
      } else{
        urlReload();
      }
    }else{
      //Malik idhar apna wo popup laga laen.
      alert("Please select a type to search");
    }
  });
  table = $('#table').DataTable({ 
      // Load data for the table's content from an Ajax source
      "ajax": {
          "url": "<?php echo site_url('Reports/populateCustomerProducts')?>/"+from_date+"/"+to_date+"/"+type+"/"+cust,
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
