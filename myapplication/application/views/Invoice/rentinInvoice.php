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
                                        <small>Rent-In</small>
                                    </h1>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-xs-6">
                                    <address>
                                    <strong>AL Lamaie building euipment rental</strong><br>
                                        Ph 055-6249919|050-1968244<br>
                                        airport road al kharan Ras-Ll-khaimah,UAE<br>
                                        Mail: allamaierental@gmail.com  web www.lamaieeqrental.com<br>
                                        <strong>TRN NO -123456789100004</strong>
                                    </address>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <address>
                                    <strong>اللامي لتأجير معدات البناء</strong><br>
                                        Ph 055-6249919 |050-1968244<br>
                                        طريق المطار الخران راس الخيمة ، الإمارات العربية المتحدة<br>
                                        Mail: allamaierental@gmail.com  web www.lamaieeqrental.com<br>
                                        <strong>TRN NO -123456789100004</strong>
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <h3>Customer Detail:</h3>
                                    <ul class="list-unstyled">
                                        <li> <strong>Name</strong>&emsp;&emsp;&emsp; <?php echo $detail->cust_name;?></li>
                                        <!-- <li> <strong>Name</strong>&emsp;&nbsp; <?php echo $detail->cust_name.$detail->temp_name;?></li> -->
                                        <li> <strong>Address</strong>&emsp;&emsp; <?php echo $detail->address;?></li>
                                        <li> <strong>Contact #</strong>&emsp;&nbsp;&nbsp;<?php echo $detail->contact_no;?></li>
                                        <!-- <li> <strong>TRN No</strong>&emsp;&emsp;&nbsp;&nbsp;<?php echo $detail->trn_no;?></li> -->
                                        <li> <strong>ID No</strong>&emsp;&emsp;&emsp;&nbsp;&nbsp;<?php echo $detail->id_card;?></li>
                                        
                                    </ul>
                                </div>
                                <!-- <?php               
                                // print_r($detail);
                                $datetime1 = new DateTime($detail->in_date);
                                $datetime2 = new DateTime();
                                $difference = $datetime1->diff($datetime2);
                                $difference->d;
                                if($difference->d==0){
                                    $difference->d=1;
                                }
                                ?> -->
                                <div class="col-xs-6">
                                    <h3>Additional Info:</h3>
                                    <ul class="list-unstyled">
                                        <li> <strong>Tr Date</strong>&emsp;&nbsp;&nbsp;&nbsp; &emsp;<?php echo date("Y-m-d h:i");?></li>
                                        <li> <strong>Invoice #</strong>&emsp; &emsp;<?php echo $detail->virtual_invoice;?></li>
                                        <li> <strong>Salesman</strong>&emsp;&emsp;<?php echo $detail->name;?></li>
                                        <!-- <li> <strong>Customer In Charge</strong><?php echo $detail->person_name;?></li> -->
                                        <li> <strong>Payment-</strong>&emsp;&emsp;<?php echo $detail->payment_type;?></li>
                                        <li> <strong>&nbsp;mode</strong></li>
                                        <!-- <li> <strong>Days/Month</strong>&nbsp;&nbsp;<?php echo $difference->d; ?> </li> -->
                                    </ul>
                                </div>
                                <!-- <div class="col-xs-4 invoice-payment">
                                    <h3>Payment Details:</h3>
                                    <ul class="list-unstyled">
                                        <li>
                                            <strong>V.A.T Reg #:</strong> 542554(DEMO)78 </li>
                                        <li>
                                            <strong>Account Name:</strong> FoodMaster Ltd </li>
                                        <li>
                                            <strong>SWIFT code:</strong> 45454DEMO545DEMO </li>
                                        <li>
                                            <strong>Account Name:</strong> FoodMaster Ltd </li>
                                        <li>
                                            <strong>SWIFT code:</strong> 45454DEMO545DEMO </li>
                                    </ul>
                                </div> -->
                            </div>
                        </br>
                            <div class="row">
                                <div class="col-xs-12">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th> Out Date </th>
                                                <th>Item</th>
                                                <th>Site</th>
                                                <th>Daily/Monthly</th>
                                                <th>Periods</th>
                                                <th>Qty</th>
                                                <th> Unit Cost </th>
                                                <!-- <th class="hidden-xs"> Unit Cost </th> -->
                                                <th> Total </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; $total=0; foreach ($products as $items) { ?>
                                            <?php $total=$total+(int)($items['prd_qty'])*(int)($items['prd_price'])*(int)($items['dayMonth']); ?>
                                            <tr>
                                                <td><?php echo $i; ?> </td>
                                                <td><?php echo $items['out_date']; ?></td>
                                                <!-- <td><?php echo $detail->in_date; ?></td> -->
                                                <td ><?php echo $items['prd_name'].'   : '.$items['uniqueid']; ?></td>
                                                <td ><?php echo $items['site_name']; ?></td>
                                                <td ><?php echo $items['rental_unit']; ?></td>
                                                <td ><?php echo $items['dayMonth']; ?></td>
                                                <td ><?php echo $items['prd_qty']; ?></td>
                                                <td ><?php echo $items['prd_price']; ?></td>
                                                <!-- <td class="hidden-xs"><?php echo $items['prd_price']; ?></td> -->
                                                <td ><?php echo (int)($items['prd_qty'])*(int)($items['prd_price']*(int)$items['dayMonth']); ?></td>
                                            </tr>
                                            <?php } ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </br>
                        </br>
                            <div class="row">
                                <div class="col-xs-4 col-xs-offset-8 invoice-block">
                                    <ul class="list-unstyled amounts">
                                        <li>
                                            <strong>Sub - Total amount:</strong>&emsp;<span id="spansubtotal"><?php echo $total; ?></span>
                                             
                                        </li>
                                        <li>
                                            <strong>Discount:</strong>&emsp;<span id="spandiscount">0</span>
                                           
                                        </li>
                                        
                                        <li>
                                            <strong>Vat 5 %:</strong> <span id="grandTotal"> <?php echo $detail->vat_amount; ?></span></li>
                                            <li>
                                            <strong>Advance Pay:</strong> <span id="grandTotal"> <?php echo $detail->advance; ?></span></li>
                                            <li>
                                            <strong>Net Pay:</strong> <span id="grandTotal"> <?php echo $total+$detail->vat_amount;; ?></span></li>
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