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
                                <div class="caption font-dark">
                                    <i class="icon-settings font-dark"></i>
                                    <span class="caption-subject bold uppercase">Manage Detail</span>
                                </div>
                                <div class="actions">

                                    <!-- <div class="btn-group">
                                        <?php if($forward!='yes'): ?>
                                        <a class="btn green-haze btn-outline btn-circle btn-lg" data-toggle="modal" href="#quotationModel" data-hover="dropdown" data-close-others="true"> Add New Trade
                                        </a>
                                    <?php endif; ?>
                                </div> -->
                            </div>
                            
                        </div>
                        <div class="portlet-body">
                         <form action="#" class="horizontal-form">
                            <div class="form-body">
                              <!--   <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group" >
                                           <label class="control-label"><strong>Supplier</strong></label>
                                           <div class="input-group"  >
                                            
                                     <input class="form-control " disabled value="<?php echo $entry['supplier_name'] ?>">
                                     <?php if($entry['supplier_id'] !=-1 ): ?>
                                     <span class="input-group-btn">
                                        <a class="btn default" type="button" id="clear" href="<?php echo base_url(); ?>index.php/Supplier/supplier_detail/<?php echo $entry['supplier_id'] ?>">
                                           <i class="fa fa-eye"></i>
                                       </a>
                                   </span>
                               <?php endif; ?>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label"><strong>Quotation No</strong></label>
                        <input id="type" class="form-control" disabled  type="text" value="<?php echo $entry['quo_no']; ?>">
                    </div>

                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label"><strong>Amount</strong></label>
                        <input id="remainBalance" class="form-control" disabled  type="text" value="<?php echo $entry['total_price']; ?>">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label"><strong>Create Date</strong></label>
                        <input id="Profit" class="form-control" disabled  type="text" value="<?php echo $entry['date']; ?>">
                    </div>

                </div>
                <!-- <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label"><strong>Due Date</strong></label>
                        <input id="type" class="form-control" disabled  type="text" value="<?php echo $entry['due_date']; ?>">
                    </div>

                </div> -->
            </div> 
            <!--/row-->
            <table class="table table table-striped table-bordered" >
                <thead>
                    <tr>
                     <td> # Sr</td>
                     <th> Invoice #</th>
                     <th> Customer Name</th>
                     <!-- <th> Accounts </th> -->
                 </tr>
             </thead>
             <tbody>
             	<?php if(!empty($transactionDetail)): ?>
             	<?php $i=1; foreach($transactionDetail as $row): ?>
<!--                                         <?php var_dump($row) ;?>
-->                                         <tr>
<td><?php echo $i ; ?></td>
<td><?php echo $row['virtual_invoice']; ?></td>
<td><?php echo $row['cust_name']; ?></td>
<!-- <td><?php echo $row['quantity']; ?> </td>
<td><?php echo $row['amount']; ?> </td>
<td><?php echo ($row['amount']*$row['quantity']); ?> </td> -->
</tr>
<?php $i++; endforeach; ?>
<?php endif; ?>
</tbody>
</table> 
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