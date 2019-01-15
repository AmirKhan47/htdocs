<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo AURL.'dashboard/'?>">Dashboard</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?php echo AURL.'log/'?>">RO Activity Log</a>
            
        </li>
        
    </ul>
    
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title">RO Activity Log
    
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-green-seagreen">
            <i class="fa fa-user font-green-seagreen"></i>
            <span class="caption-subject bold uppercase"> 
            RO Activity Log</span>
        </div> 
        <div class="actions">                                       
        </div>
    </div>

    <div class="portlet-body form">
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
                <form class="form-horizontal" id="activity-form">
                <div class="row">
                    <div class="col-md-5">
                        <div class="row">
                            
                            <div class="form-group">
                                <label class="control-label col-md-2">Date<span class="required" aria-required="true">*</span></label>
                                <div class="col-md-10">
                                    <input type="text" id="date" name="date" class="form-control date-picker"  data-validation="required" autocomplete="off">
                                    
                                    <input type="hidden" name="url" id="url" value=<?= AURL;?>>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-2">RO<span class="required" aria-required="true">*</span></label>
                                <div class="col-md-10">
                                    <select class="form-control select2 ro_list"  id="ro_list" name="ro_list" data-validation="required" data-validation-error-msg="Please select RO">
                                        <option value="">Select</option>
                                    <?php 
                                        if (count($ro)>0) {
                                            foreach ($ro as $key => $value) {
                                    ?>    
                                                <option value="<?=$value['id'];?>">
                                                    <?= $value['Name'];?>        
                                                </option>
                                    <?php }
                                        }
                                    ?>
                                    </select>
                                
                                         
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 pull-right">
                        <button type="submit" class="btn btn-success" id="activity-btn"><i class="fa fa-search"></i></a>
                    </div>

                </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-12">
                        <div id="log-table"></div>
                        <div class="pull-right" id="log-pagination"></div>                                  
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