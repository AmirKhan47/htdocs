<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo BURL.'Dashboard/'?>">Dashboard</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?php echo URL.'Auth/change_password'?>">Change Password</a>
            
        </li>
        
    </ul>
    
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> Change Password
    
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-green-seagreen">
            <i class="fa fa-user font-green-seagreen"></i>
            <span class="caption-subject bold uppercase"> 
            Change Password</span>
        </div> 
        <div class="actions">                                       
        </div>
    </div>

    <div class="portlet-body form">
        <form action="<?php echo URL."Auth/change_password/"?>" id="registration-form" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="form-body">
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button> You have some form errors. Please check below. 
                </div>
                <div class="alert alert-success display-hide">
                    <button class="close" data-close="alert"></button> Your form validation is successful! 
                </div>
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
                <div class="row">
                    <div class="col-md-11">
                        <div class="row">
                            <div class="col-md-11">
                                <div class="form-group">
                                    
                                    <label class="control-label col-md-4">Old Password<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8">
                                        <input type="password" id="old_password" name="old_password" class="form-control" value="<?php echo set_value('old_password'); ?>" data-validation="required">
                                        <?php echo form_error('old_password'); ?>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="col-md-11">
                                <div class="form-group">
                                    
                                    <label class="control-label col-md-4">New Password<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8">
                                        <input type="password" id="new_password" name="new_password" class="form-control" value="<?php echo set_value('new_password'); ?>" data-validation="strength" data-validation-strength="2">
                                        <?php echo form_error('new_password'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-11">
                        <div class="row">
                            
                            <div class="col-md-11">
                                <div class="form-group">
                                    
                                    <label class="control-label col-md-4">Confirm Password<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8">
                                        <input type="password" id="confirm_password" name="confirm_password" class="form-control" value="<?php echo set_value('confirm_password'); ?>" data-validation="required">
                                        <?php echo form_error('confirm_password'); ?>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
                
                



            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <button name="submit" id="submit" type="submit" value="submit" class="btn btn-md green-meadow"><i class="glyphicon glyphicon-arrow-right"></i>Submit</button>
                                                                
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>

  $.validate({
    modules : 'location, date, security, file',
    
  });

 

</script>
