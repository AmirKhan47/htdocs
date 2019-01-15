<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo AURL.'dashboard/'?>">Dashboard</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?php echo AURL.'user/registration'?>">Registration</a>
            
        </li>
        
    </ul>
    
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title">Registration
    
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-green-seagreen">
            <i class="fa fa-user font-green-seagreen"></i>
            <span class="caption-subject bold uppercase"> 
            Regstration</span>
        </div> 
        <div class="actions">                                       
        </div>
    </div>

    <div class="portlet-body form">
        <form action="<?php echo AURL."User/update/".$user['id']."/".$role;?>" id="registration-form" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="form-body">
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button> You have some form errors. Please check below. 
                </div>
                <div class="alert alert-success display-hide">
                    <button class="close" data-close="alert"></button> Your form validation is successful! 
                </div>
                <div class="alert alert-block alert-info fade in">
                    <p><b>'<span style="color:red;">*</span>' fields are compulsory.</b></p>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    
                                    <label class="control-label col-md-4">Name<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" id="name" name="name" class="form-control" value="<?php echo $user['Name']; ?>" data-validation="custom" data-validation-regexp="^[a-zA-Z\s]+$"  data-validation-error-msg="Name is incorrect ">
                                        <?php echo form_error('name'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Username<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" id="username" name="username"  class="form-control" value="<?php echo $user['username'];?>" data-validation="required" readonly>
                                        <div id="eumsg"></div>
                                        <?php echo form_error('username'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-11">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    
                                    <label class="control-label col-md-4">Email<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8">
                                        <input type="email" id="email" name="email" onblur="emailchecker()" class="form-control" value="<?php echo $user['email']; ?>" data-validation="email" readonly><div id="eemsg"></div>
                                        <?php echo form_error('email'); ?>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Role<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control"  id="role" name="role" data-validation="required">
                                            <option value="">Select</option>
                                            <?php 
                                               if (count($roles)>0) {
                                                  foreach ($roles as $key => $value) {
                                                  ?>    
                                                  <option value="<?=$value['id'];?>" <?php 
                                                  if($user['role']==$value['id']){ echo 'selected="selected"';} 
                                                  ?>>
                                                  <?= $value['role_name'];?></option>
                                            <?php }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            
                            </div> -->
                        </div>
                    </div>
                </div>
                
                
                
                



            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        
                        <button name="submit" id="submit" type="submit" value="submit" class="btn btn-md green-meadow"><i class="glyphicon glyphicon-arrow-right"></i>Update User</button>
                                                                
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
