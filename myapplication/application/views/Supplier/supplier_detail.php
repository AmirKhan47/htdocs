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
                            <!-- BEGIN PROFILE CONTENT -->
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light ">
                                            <div class="portlet-title tabbable-line">
                                                <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                                </div>
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_1" data-toggle="tab">Supplier Transactions</a>
                                                    </li>
                                                    <!-- <li>
                                                        <a href="#tab_1_2" data-toggle="tab">Supplier Products</a>
                                                    </li> -->
                                                </ul>
                                            </div>
                                            <div class="portlet-body">
                                              <div class="tab-content">
                                                <!-- PERSONAL INFO TAB -->
                                                <div class="tab-pane active" id="tab_1_1">
                                                 <table  id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                  <thead>
                                                    <tr>
                                                      <th>Person Name</th>
                                                      <th>Profession</th>
                                                      <th>Contact #</th>
                                                      <th>Id Card</th>
                                                      <th>Passport</th>
                                                      <th>Action</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                  </tbody>
                                                </table>
                                              </div>
                                              <!-- END PERSONAL INFO TAB -->
                                              <!-- CHANGE PASSWORD TAB -->
                                              <!-- <div class="tab-pane" id="tab_1_3">
                                                <a class="btn btn-success col-md-offset-11" onclick="add_person()" id="addAuthorize" ><i class="glyphicon glyphicon-plus"></i></a>

                                              </div> -->
                                              <!-- END CHANGE PASSWORD TAB -->

                                            </div>
                                          </div>
</div>
</div>
</div>
</div>
<!-- END PROFILE CONTENT -->              

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

$(document).ready(function() {
  var url = window.location.pathname;
  var id = url.substring(url.lastIndexOf('/') + 1);
    //datatables
    // table = $('#table').DataTable({ 

    //     // Load data for the table's content from an Ajax source
    //     "ajax": {
    //         "url": "<?php echo site_url('Supplier/supplier_transaction')?>/"+id,
    //         "type": "POST"
    //     },

    //     //Set column definition initialisation properties.
    //     "columnDefs": [
    //     { 
    //         "targets": [ -1 ], //last column
    //         "orderable": false, //set not orderable
    //     },
    //     ],

    // });
});

</script>
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Add Person</h3>
            </div>
            <div class="modal-body form">
              <form action="#" id="personForm" class="form-horizontal"  enctype="multipart/form-data">
                <input type="hidden" value="" name="ap_id" id="ap_id" /> 
                <div class="form-body">
                 <div class="form-body">
                  <div class="modal-body">
                    <div class="row">

                      <div class="col-md-12">
                        <strong> Product Name <span class="required"> * </span></strong>
                        <input type="text" required class="form-control input-large" name="product" id="product" />
                      </br>
                      <strong> Unit Price <span class="required"> * </span></strong>
                      <input type="text" required class="form-control input-large" name="price" id="price" />
                      <input type="hidden" name="prd_id" id="prd_id" />

                    </div>

                  </div>
                </div>
              </div>
            </div>
          </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" id="btnCancel" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
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