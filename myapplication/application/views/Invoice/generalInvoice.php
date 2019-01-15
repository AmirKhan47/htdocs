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
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered">


                       <div class="portlet-body">
                        <!-- BEGIN CONTENT -->
                        <!-- END PAGE HEADER-->
                        <div class="invoice">
                            <div class="row invoice-logo">
                                <div class="col-xs-6 col-xs-offset-4">
                                    <h1 class="page-title">Tax Invoice
                                        <small>General</small>
                                    </h1>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-xs-6">
                                    <address>
                                    <strong>AL Lamaie building euipment rental</strong><br>
                                        Ph 055-6249919    |  050-1968244<br>
                                        airport road al kharan Ras-Ll-khaimah,UAE<br>
                                        Mail: allamaierental@gmail.com  web www.lamaieeqrental.com<br>
                                        <strong>TRN NO -123456789100004</strong>
                                    </address>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <address>
                                    <strong>اللامي لتأجير معدات البناء:</strong><br>
                                        Ph 055-6249919    |  050-1968244<br>
                                        طريق المطار الخران راس الخيمة ، الإمارات العربية المتحدة<br>
                                        Mail: allamaierental@gmail.com  web www.lamaieeqrental.com<br>
                                        <strong>TRN NO -123456789100004</strong>
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-8">
                                    <h3>Customer Detail:</h3>
                                    <ul class="list-unstyled">
                                 
                                        <li> <strong>Name</strong>&emsp;&emsp;&emsp; <?php echo $detail['name'];?></li>
                                        <li> <strong>Address</strong>&emsp;&emsp; <?php echo $detail['address'];?></li>
                                        <li> <strong>Contact #</strong>&emsp;&nbsp;&nbsp;<?php echo $detail['contact_no'];?></li>
                                        <li> <strong>TRN No</strong>&emsp;&emsp;&nbsp;&nbsp;<?php echo $detail['tr_no'];?></li>
                                        <!-- <li> <strong>ID No</strong>&emsp;&emsp;&emsp;&nbsp;&nbsp;<?php echo $detail->cust_idcard;?></li> -->
                                    </ul>
                                </div>
                                <div class="col-xs-4">
                                    <h3>Additional Info:</h3>
                                    <ul class="list-unstyled">
                                        <li> <strong>Tr Date</strong>&emsp;&nbsp;&nbsp;&nbsp; &emsp;<?php echo date("Y-m-d h:i");?></li>
                                        <li> <strong>Invoice #</strong>&emsp; &emsp;<?php echo $detail['virtual_invoice'];?></li>
                                        <li> <strong>Received Amount:</strong>&emsp;&emsp;<?php echo $detail['amount'];?></li>
                                        <li> <strong>Remaining-Balance:</strong>&emsp;&emsp;<?php echo $detail['credit'];?></li>
                                        <!-- <li> <strong>&nbsp;mode</strong></li> -->
                                    </ul>
                                </div>
                            </div>
                        </br>
                            <div class="row">
                                <!-- <div class="col-xs-6 col-xs-offset-6 invoice-block">
                                </div> -->
                                <div class="col-xs-4 col-xs-offset-8 invoice-block">

                                    <br/>
                                    <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();"> Print
                                        <i class="fa fa-print"></i>
                                    </a>
                                    <a class="btn btn-lg green hidden-print margin-bottom-5"> Send Mail
                                        <i class="fa fa-check"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                <!-- END CONTENT -->
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
<?php $this->load->view('layouts/footer'); ?>
<?php $this->load->view('layouts/common_js'); ?>


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