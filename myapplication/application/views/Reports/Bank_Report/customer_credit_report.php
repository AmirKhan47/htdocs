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
                                  <!-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                          <label class="col-md-3 col-form-label"><strong>Total Customers</strong></label>
                                          <div class="col-md-6">
                                            <input readonly style="background-color: rgba(0,0,0,0); border: none;" id="total_cust" class="col-md-3 col-form-label" value="" />
                                            <span class="help-block"></span>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group ">
                                          <label class="col-md-3 col-form-label"><strong>Total Credit</strong></label>
                                          <div class="col-md-6">
                                            <input readonly style="background-color: rgba(0,0,0,0); border: none;" id="total_credit" class="col-md-3 col-form-label" value="" />
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
                                                  <th>Customer Name</th>
                                                  <th>Company</th>
                                                  <th>Phone No</th>
                                                  <th>Due Amount</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                          </tbody>
                                          <tfoot>
                                            <tr>
                                                <th colspan="4" style="text-align:right">Total:</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
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
var account = 0;
var type = 0;
var from_date;
var to_date;
$(document).ready(function() {
  function reload_table()
  {
      table.ajax.reload(null,false); //reload datatable ajax
  }
  // function urlReload(){
  //     account = $("#searchType").val();
  //     table.ajax.url("<?php echo site_url('Reports/populateCustCreditReport')?>/"+from_date+"/"+to_date+"/"+type).load();
  // }
  // $("#search").on("click",function(){
  //     from_date = $("#from_date").val();
  //     to_date = $("#to_date").val();
  //     account = $("#cust_name").val();
  //     if(from_date == "" || to_date == ""){
  //       //Malik idhar apna wo popup laga laen.
  //       alert("Please enter both the dates");
  //       return;
  //     } else if(account == ""){
  //       alert("Please enter Account name");
  //       return;
  //     } else{
  //       urlReload();
  //     }
  // });
  table = $('#table').DataTable({ 
      // Load data for the table's content from an Ajax source
      "ajax": {
          "url": "<?php echo site_url('Reports/populateCustCreditReport')?>",
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
      "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 4 ).footer() ).html(
                // '$'+pageTotal +' ( $'+ total +' total)'
                '$'+pageTotal +' ( $'+ total +' total)'
            );
        },

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
