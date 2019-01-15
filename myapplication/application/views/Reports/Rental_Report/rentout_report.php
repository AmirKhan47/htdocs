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
                                     <div class="form-group">
                                        <label class="col-md-3 col-form-label"><strong>RentOut From Date</strong></label>
                                        <div class="col-md-6">
                                        <!-- <input name="cheque_date" id="cheque_date" class="form-control" type="date"> -->
                                        <input name="from_date" id="from_date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                    	<div class="form-group">
                                        <label class="col-md-3 col-form-label"><strong>RentOut To Date</strong></label>
                                        <div class="col-md-6">
                                        <!-- <input name="cheque_date" id="cheque_date" class="form-control" type="date"> -->
                                        <input name="to_date" id="to_date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group ">
                                        <label class="col-md-3 col-form-label"><strong>Contact No.</strong></label>
                                        <div class="col-md-6">
                                        <select class="form-control" name="contact_no" id="contact_no"> 
                                            <option value="null"></option>  
                                            <?php if(!empty($cust_name)) { ?>
                                            <?php foreach ($cust_name as $name) { ?>
                                            <!-- if customers are to be matced using id then use id here and include customer table in the join as well -->
                                            <option value="<?php echo $name->contact_no; ?>" ><?php echo $name->contact_no; ?></option>
                                            <?php } }?>
                                          </select>  
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group ">
                                        <label class="col-md-3 col-form-label"><strong>Customer Name</strong></label>
                                        <div class="col-md-6">
                                        <select class="form-control" name="cust_name" id="cust_name"> 
                                            <option value="null"></option>  
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
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group ">
                                        <label class="col-md-3 col-form-label"><strong>Bussiness Name</strong></label>
                                        <div class="col-md-6">
                                        <select class="form-control" name="business_name" id="business_name"> 
                                            <option value="null"></option>  
                                            <?php if(!empty($business_name)) { ?>
                                            <?php foreach ($business_name as $name) { ?>
                                            <!-- if customers are to be matced using id then use id here and include customer table in the join as well -->
                                            <option value="<?php echo $name->cust_id; ?>" ><?php echo $name->cust_business_name; ?></option>
                                            <?php } }?>
                                          </select>  
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group ">
                                        <label class="col-md-3 col-form-label"><strong>Product Class</strong></label>
                                        <div class="col-md-6">
                                        <select class="form-control" name="prd_class" id="prd_class"> 
                                            <option value="null"></option>  
                                            <?php if(!empty($prd_class)) { ?>
                                            <?php foreach ($prd_class as $name) { ?>
                                            <!-- if customers are to be matced using id then use id here and include customer table in the join as well -->
                                            <option value="<?php echo $name->prd_class; ?>" ><?php echo $name->prd_class; ?></option>
                                            <?php } }?>
                                          </select>  
                                          <span class="help-block"></span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                          <label class="col-md-3 col-form-label"><strong>Total Qty</strong></label>
                                          <div class="col-md-6">
                                            <input readonly style="background-color: rgba(0,0,0,0); border: none;" id="total_qty" class="col-md-3 col-form-label" value="" />
                                            <span class="help-block"></span>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group ">
                                          <label class="col-md-3 col-form-label"><strong>Total Amount</strong></label>
                                          <div class="col-md-6">
                                            <input readonly style="background-color: rgba(0,0,0,0); border: none;" id="total_amount" class="col-md-3 col-form-label" value="" />
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
                                                    <!-- <li>
                                                        <a href="javascript:;" id="exportBib"  >
                                                            <i class="fa fa-file"></i> Export to bibTex </a>
                                                        </li> -->
                                                    </ul>
                                                </div>
                                                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                  <thead>
                                                      <tr>
                                                          <th></th>
                                                          <th>Tr. No</th>
                                                          <th>Invoice #</th>
                                                          <th>Customer</th>
                                                          <th>Qty</th>
                                                          <th>Amount</th>
                                                          <th>Rent-Out Date</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                  </tbody>
                                              </table>
                                            </div>
                                        </div>
                                  </div>
                                  <!-- <div class="row">
                                  <div class="col-md-12">
                                  </div>
                                  </div> -->
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
var from_date = 'null';
var to_date = 'null';
var cust = 'null';
var type = 'null';
$(document).ready(function() {
  function reload_table()
  {
      table.ajax.reload(null,false); //reload datatable ajax
  }
  function urlReload(){
      table.ajax.url("<?php echo site_url('Reports/populateRentout')?>/"+from_date+"/"+to_date+"/"+cust.trim()+"/"+type.trim()).load();
  }
  $('#table tbody').on('dblclick', 'tr', function () {
      id = $(this).closest('tr').find('td:eq(2)').text();
      window.location = "<?php echo site_url('Invoice/rentoutInvoice')?>/"+id;
    } );
  $('#table').on( 'draw.dt', function () {
    var qty=0;
    var amount=0;
    $('#table tbody tr td:nth-child(5)').each( function(){
      //add item to array
      if ($.isNumeric($(this).text())) {
        qty += parseInt($(this).text());
      }
      //console.log( $(this).text() );
    });
    $("#total_qty").val(qty);
    $('#table tbody tr td:nth-child(6)').each( function(){
      //add item to array
      if ($.isNumeric($(this).text())) {
        amount += parseInt($(this).text());
      }
      //console.log( $(this).text() );
    });
    $("#total_amount").val(amount);
  });
  table = $('#table').DataTable({ 
      // Load data for the table's content from an Ajax source
      "ajax": {
          "url": "<?php echo site_url('Reports/populateRentout')?>/"+from_date+"/"+to_date+"/"+cust+"/"+type,
          "type": "POST"
          // "data": function(d) {
          //     d['from'] = from_date;
          //     d['to'] = to_date;
          // }
      },
      //******************************************************************** */
      //Simple wayt to add a class to a row
      // "createdRow": function ( row, data, index ) {
      //           $(row).addClass('clickable-row');
      //           //to add class on each table cell
      //           //$('td', row).addClass('highlight');
      //   },
      //******************************************************************** */
      buttons: [
        { extend: 'print', className: 'btn dark btn-outline' },
        { extend: 'copy', className: 'btn red btn-outline' },
        { extend: 'pdf', className: 'btn green btn-outline' },
        { extend: 'excel', className: 'btn yellow btn-outline ' },
        { extend: 'csv', className: 'btn purple btn-outline ' }
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
  $("#business_name").on("change",function(){
    type = "business_name";
    $("#contact_no").val('null');
    $("#cust_name").val('null');
    $("#prd_class").val('null');
  });
  $("#prd_class").on("change",function(){
    type = "prd_class";
    $("#contact_no").val('null');
    $("#cust_name").val('null');
    $("#business_name").val('null');
  });
  $("#contact_no").on("change",function(){
    type = "contact_no";
    $("#business_name").val('null');
    $("#cust_name").val('null');
    $("#prd_class").val('null');
  });
  $("#cust_name").on("change",function(){
    type = "cust_name";
    $("#contact_no").val('null');
    $("#business_name").val('null');
    $("#prd_class").val('null');
  });
  $("#search").on("click",function(){
      from_date = 'null';
      to_date = 'null';
      cust = 'null';
      if($("#from_date").val() != ''){
        from_date = $("#from_date").val();
      }
      if($("#to_date").val() != ''){
        to_date = $("#to_date").val();
      }
      if(type == 'business_name'){
        cust = $("#business_name").val();
      }else if(type == 'contact_no'){
        cust = $("#contact_no").val();
      }else if(type == 'cust_name'){
        cust = $("#cust_name").val();
      }else if(type == 'prd_class'){
        cust = $("#prd_class").val();
      }

      if((from_date == 'null' && to_date != 'null') || (from_date != 'null' && to_date == 'null')){
        alert("Please enter both Dates to search");
      }else{
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
