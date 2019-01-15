<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo BURL.'Dashboard/'?>">Dashboard</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?php echo BURL.'lead/registration_form'?>">Registration Form</a>
            
        </li>
        
    </ul>
    
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> Lead Registration Form
    
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-green-seagreen">
            <i class="fa fa-user font-green-seagreen"></i>
            <span class="caption-subject bold uppercase"> 
            Regstration form</span>
        </div> 
        <div class="actions">                                       
        </div>
    </div>
<?php echo validation_errors(); ?>
    <div class="portlet-body form">
        <form action="<?php echo BURL."lead/registration_form/"?>" id="registration-form" class="form-horizontal" method="post" enctype="multipart/form-data">
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
                                    
                                    <label class="control-label col-md-4">Designation<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control"  id="designation" name="designation" data-validation="required" data-validation-error-msg="Please select Customer Designation">
                                            <option value="">Select</option>
                                            <?php 
                                               if (count($designation)>0) {
                                                  foreach ($designation as $key => $value) {
                                                  ?>    
                                                  <option value="<?=$value['id'];?>"><?= $value['name'];?></option>
                                            <?php }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Customer title<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control"  id="title" name="title"  data-validation="required" data-validation-error-msg="Please select Customer title">
                                            <option value="">Select</option>
                                            <option value="1">Mr.</option>
                                            <option value="2">Mrs.</option>
                                            <option value="3">Gen.</option>
                                            <option value="4">Brig.</option>
                                            <option value="5">Engr.</option>
                                            <option value="6">Dr.</option>
                                            <option value="7">Arch.</option>
                                            
                                        </select>
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
                                    
                                    <label class="control-label col-md-4">Customer Name<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" id="name" name="name" class="form-control" value="<?=set_value('name'); ?>" data-validation="custom" data-validation-regexp="^[a-zA-Z\s]+$"  data-validation-error-msg="Customer Name is incorrect ">
                                        <?php echo form_error('name'); ?>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Contact no<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" id="phone" name="phone" class="form-control" value="<?php echo set_value('phone'); ?>" data-validation="number" data-validation-error-msg="Contact no is not valid">
                                        <?php echo form_error('name'); ?>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-11">
                        <div class="row">
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    
                                    <label class="control-label col-md-4">Registration Date<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="date" id="date" class="form-control  date-picker" size="16" value="<?php echo set_value('date'); ?>" data-validation="date" data-validation-format="dd-mm-yyyy">
                                        <?php echo form_error('date'); ?>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Address<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8">
                                       <textarea class="form-control" rows="2" name="address" id="address" data-validation="required"><?php echo set_value('address'); ?></textarea>
                                       <?php echo form_error('address'); ?>
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
                                    
                                    <label class="control-label col-md-4">File<span class="required" aria-required="true"></span></label>
                                    <div class="col-md-8">
                                        <input type="file" name="cu_image[]" id="cu_image" class="form-control" multiple>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Categorization<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control"  id="category" name="category" data-validation="required" data-validation-error-msg="Please select Category">
                                            <option value="">Select</option>
                                            <option value="1">Red</option>
                                            <option value="2">Green</option>
                                            <option value="3">Blue</option>
                                            <option value="4">White</option>
                                        </select>
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
                        <a href="<?php echo BURL.'Lead/'?>" value="cancel" name="action" class="btn red-mint"><i class="glyphicon glyphicon-arrow-left"></i>
                        All leads</a>
                        <button name="submit" id="submit" type="submit" value="submit" class="btn btn-md green-meadow"><i class="glyphicon glyphicon-arrow-right"></i>Submit & Next</button>
                                                                
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
