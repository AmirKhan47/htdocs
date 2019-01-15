<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo AURL.'dashboard/'?>">Dashboard</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?php echo AURL.'user/bdm'?>">BDM</a>
            
        </li>
        
    </ul>
    
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> BDM List
    
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-green-seagreen">
            <i class="fa fa-user font-green-seagreen"></i>
            <span class="caption-subject bold uppercase"> BDM List</span>
        </div> 
        <div class="actions"> 
        <a href="<?php echo AURL.'user/registration'?>" value="cancel" name="action" class="btn red-mint"><i class="glyphicon glyphicon glyphicon-file"></i>
                        Registration Form</a>                                      
        </div>
    </div>

    <div class="portlet-body form">
        <?php
            if ($this->session->flashdata('err_message')) {
        ?>
                <div class="alert alert-danger">
                    <button class="close" data-close="alert"></button>
                    <span><?php echo $this->session->flashdata('err_message'); ?></span>
                </div>
        <?php
            }

            if ($this->session->flashdata('ok_message')) {
        ?>
                <div class="alert alert-success">
                    <button class="close" data-close="alert"></button>
                    <span><?php echo $this->session->flashdata('ok_message'); ?></span>
                </div>
        <?php
            }
        ?>
        
        <table class="table table-striped table-bordered table-hover table-header-fixed" id="bdm-table">
            <thead>
                <tr>
                    <th> Sno </th>
                    <th> Name</th>
                    <th> Email </th>
                    <th> Username </th>
                    <!-- <th> RO </th> -->
                    <th>Created Date</th>
                    <th>Action</th>

                </tr>
            </thead>                                
        </table>
    </div>
</div>