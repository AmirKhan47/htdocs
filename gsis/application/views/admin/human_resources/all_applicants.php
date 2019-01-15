<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo SURL.'school/admin_dashboard'?>">Dashboard</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Users</span>         
        </li> 
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> All Applicants </h3>
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-green-seagreen">
            <i class="fa fa-user font-green-seagreen"></i>
            <span class="caption-subject bold uppercase"> All Applicants </span>
        </div> 
        <!-- <div class="actions"> 
        <a href="<?php echo SURL.'recruitment/reject_all'?>" value="cancel" name="action" class="btn red-mint"><i class="glyphicon glyphicon glyphicon-file"></i>
                        Reject All</a>                                      
        </div> -->
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
		<table id="all_applicants" class="table table-striped table-bordered table-hover table-header-fixed">
			<thead>
				<tr>
					<th>Registration No.</th>
					<th>Name</th>
					<th>Contact</th>
					<th>CNIC</th>
					<th>Position</th>
                    <th>Registration Date</th>
                    <th>Status</th>
                    <th>Final Status</th>
                    <th>Detail</th>
				</tr>
			</thead>
		</table>
	</div>
</div>