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
                                    <h1 class="page-title"> Invoice
                                        <small>Damage Product</small>
                                    </h1>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-6"><strong>Tr. NO: &emsp;&nbsp;</strong>100238651200003
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <h3>Product Detail:</h3>
                                    <ul class="list-unstyled">
                                        <li> <strong>Name</strong>&emsp;&emsp;&emsp; <?php echo $detail->prd_name;?></li>
                                        <li> <strong>Qty</strong>&emsp;&emsp; <?php echo $detail->prd_qty;?></li>
                                        <li> <strong>Unique ID</strong>&emsp;&nbsp;&nbsp;<?php echo $detail->uniq;?></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </br>
                            <div class="row">
                                <div class="col-xs-12">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th>DP ID</th>
                                                <th>Product Name</th>
                                                <th>Qty</th>
                                                <th>Price </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; $total=0; foreach ($products as $items) { ?>
                                            <?php $total=$total+(int)($items['mat_price']); ?>
                                            <tr>
                                                <td><?php echo $i; ?> </td>
                                                <td><?php echo $items['virtual_id']; ?></td>
                                                <td><?php echo $items['prd_name']; ?></td>
                                                <td><?php echo $items['mat_qty']; ?></td>
                                                <td><?php echo $items['mat_price']; ?></td>
                                            </tr>
                                            <?php } ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </br>
                        </br>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="well">
                                         <address>
                                            <strong>AL-Lamaieeq Rental</strong>
                                            <br/> Al Dhait South - North Ras Al Khaimah, UAE
                                            <br/>
                                            <abbr title="Phone">P:</abbr> +971 501 968244 </address>
                                        <address>
                                            <strong>Email Address</strong>
                                            <br/>
                                            <a > info@lamaieeqrental.com </a>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-xs-offset-4 invoice-block">
                                    <ul class="list-unstyled amounts">
                                        <li>
                                            <strong>Total amount:</strong>&emsp;<span id="spansubtotal"><?php echo $total; ?></span>
                                        </li>
                                    </ul>
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

<script type="text/javascript">
$(document).ready(function(){

$('#discount').change(function() { 
   $('#spandiscount').text(parseInt($(this).val()));
   $('#grandTotal').text(parseInt($('#subtotal').val())-parseInt($(this).val()));
}); 

$('#subtotal').change(function() { 
   $('#spansubtotal').text(parseInt($(this).val()));
   $('#grandTotal').text(parseInt($(this).val())-parseInt($('#discount').val()));
}); 

});	
</script>

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