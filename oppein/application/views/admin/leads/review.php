<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo RURL.'Dashboard/'?>">Dashboard</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?php echo RURL.'lead/review';?>">Review</a>
            
        </li>
        
    </ul>
    
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> Review
    
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-green-seagreen">
            <i class="fa fa-user font-green-seagreen"></i>
            <span class="caption-subject bold uppercase"> Review</span>
        </div> 
        <div class="actions tabbable-line"> 
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#portlet_tab1" data-toggle="tab"> Review </a>
                </li>
                <li>
                    <a href="#portlet_tab2" data-toggle="tab"> Resubmitted leads </a>
                </li>
                
            </ul>
            <!-- <a href="#" class="btn btn-danger">Visit <span class="badge badge-success">2</span></a>
            <a href="#" class="btn btn-info">Work in progress <span class="badge badge-danger">2</span></a>
            <a href="#" class="btn btn-success">Presentation <span class="badge badge-warning">2</span></a>
               -->                                
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
        <input type="hidden" name="rurl" id="rurl" value="<?php echo RURL;?>">
        <div class="tab-content">
            <div class="tab-pane active" id="portlet_tab1">


                <table class="table table-striped table-bordered table-hover table-header-fixed" id="review-table">
                    <thead>
                        <tr>
                            <th> Sno </th>
                            <th> Customer Name</th>
                            <th> Designation</th>
                            <th> Contact </th>
                            <th> RO </th>
                            <th> Review Date </th>
                            <th>Detail</th>

                        </tr>
                    </thead>                                
                </table>
                                                
            </div>

            <div class="tab-pane" id="portlet_tab2">
                <table class="table table-striped table-bordered table-hover table-header-fixed" id="resubmitted-table">
                    <thead>
                        <tr>
                            <th> Sno </th>
                            <th> Customer Name</th>
                            <th> Contact</th>
                            <th> Designation </th>
                            <th> RO </th>
                            <th> Re-work Cycle </th>
                            <th>Detail</th>

                        </tr>
                    </thead>                                
                </table>
                                                
            </div>
            
        </div>
        
        
    </div>
</div>