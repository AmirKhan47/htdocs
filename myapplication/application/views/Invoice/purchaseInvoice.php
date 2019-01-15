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
                                        <small>Supplier</small>
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
                                    <h3>Supplier Detail:</h3>
                                    <ul class="list-unstyled">
                                 
                                        <li> <strong>Name</strong>&emsp;&emsp;&emsp; <?php echo $detail->sup_name;?></li>
                                        <!-- <li> <strong>Name</strong>&emsp;&nbsp; <?php echo $detail->cust_name.$detail->temp_name;?></li> -->
                                        <li> <strong>Address</strong>&emsp;&emsp; <?php echo $detail->address;?></li>
                                        <li> <strong>Contact #</strong>&emsp;&nbsp;&nbsp;<?php echo $detail->contact_no;?></li>
                                        
                                       
                                        
                                    </ul>
                                </div>
                                <div class="col-xs-6">
                                    <h3>Additional Info:</h3>
                                    <ul class="list-unstyled">
                                        <li> <strong>Tr Date</strong>&emsp;&nbsp;&nbsp;&nbsp; &emsp;<?php echo date("Y-m-d h:i");?></li>
                                        <li> <strong>Invoice #</strong>&emsp; &emsp;<?php echo $detail->virtual_invoice;?></li>
                                        <li> <strong>Received By</strong>&emsp;<?php echo $detail->user_name;?></li>
                                    </ul>
                                </div>
                                <div class="col-xs-4 invoice-payment">
                                    <h3>Payment Details:</h3>
                                    <ul class="list-unstyled">
                                        <li>
                                            <strong>V.A.T :</strong> <?php echo $detail->vat_amount;?> </li>
                                        <li>
                                            <strong>Discount:</strong> <?php echo $detail->discount;?> </li>
                                        <li>
                                            <strong>Total Amount:</strong> <?php echo $detail->total_amount;?> </li>
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
                                                <th>Product Name</th>
                                                <th>Qty</th>
                                                <th>Price </th>
                                                <!-- <th class="hidden-xs">Price </th> -->
                                                <th>Vat Amount</th>
                                                <!-- <th class="hidden-xs">Vat Amount</th> -->
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; $total=0; foreach ($products as $items) { ?>
                                            <?php $total=$total+(int)($items['prd_total']); ?>
                                            <tr>
                                                <td><?php echo $i; ?> </td>
                                                <td><?php echo $items['prd_name']; ?></td>
                                                <td><?php echo $items['prd_qty']; ?></td>
                                                <td><?php echo $items['prd_price']; ?></td>
                                                <!-- <td class="hidden-xs"><?php echo $items['prd_price']; ?></td> -->
                                                <td><?php echo $items['prd_vat']; ?></td>
                                                <!-- <td class="hidden-xs"><?php echo $items['prd_vat']; ?></td> -->
                                                <td ><?php echo $items['prd_total']; ?></td>
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
                                            <strong>Sub - Total amount:</strong>&emsp;<span id="spansubtotal"><?php echo $total; ?></span>
                                            <!-- <input type="text" class="form-control input-small hidden-xs" id="subtotal" value="<?php echo $total; ?>" />  -->
                                        </li>
                                        <li>
                                            <strong>Discount:</strong>&emsp;<span id="spandiscount">0</span>
                                            <!-- <input type="text" class="form-control input-small hidden-xs" id="discount" value="0" min="0"/>  -->
                                        </li>
                                        <li>
                                            <strong>V.A.T :</strong> <?php echo $detail->vat_amount;?> </li>
                                            <!-- <input type="text" readonly class="form-control input-small hidden-xs" id="vat" value="<?php echo $detail->vat_amount; ?>" />  -->
                                        <li>
                                            <strong>Grand Total:</strong> <span id="grandTotal"> <?php echo $total+$detail->vat_amount; ?></span></li>
                                    <!-- </ul> -->

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