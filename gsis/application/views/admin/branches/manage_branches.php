<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo SURL.'school/admin_dashboard'?>">Dashboard</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Manager Branches</span>         
        </li> 
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> Manager Branches </h3>
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-green-seagreen">
            <i class="fa fa-user font-green-seagreen"></i>
            <span class="caption-subject bold uppercase"> Manager Branches </span>
        </div> 
        <div class="actions"> 
        <a href="<?php echo SURL.'branch/'?>" value="cancel" name="action" class="btn red-mint"><i class="glyphicon glyphicon glyphicon-file"></i>
                        Add New Branch</a>                                      
        </div>
    </div>

    <div class="portlet-body form">
        <?php
            if ($this->session->flashdata('err_message')) 
            {
        ?>
                <div class="alert alert-danger">
                    <button class="close" data-close="alert"></button>
                    <span><?php echo $this->session->flashdata('err_message'); ?></span>
                </div>
        <?php
            }

            if ($this->session->flashdata('ok_message')) 
            {
        ?>
                <div class="alert alert-success">
                    <button class="close" data-close="alert"></button>
                    <span><?php echo $this->session->flashdata('ok_message'); ?></span>
                </div>
        <?php
            }
        ?>
        <table class="table table-striped table-bordered table-hover table-header-fixed" id="branches_datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Branch Code</th>
                    <th>Branch Name</th>
                    <th>Phone No.</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Date Created</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>