<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo SURL.'school/admin_dashboard'?>">Dashboard</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?php echo SURL.'recruitment/manage_applicants'?>">Manage Applicants</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Applicants</span>         
        </li> 
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> Applicant Details </h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered" id="form_wizard_1">
            <!-- <div class="portlet-title"> -->
                <!-- <div class="caption"> -->
                    <!-- <i class=" icon-layers font-red"></i> -->
                    <!-- <span class="caption-subject font-red bold uppercase"> Form Wizard -
                        <span class="step-title"> Step 1 of 4 </span>
                    </span> -->
                <!-- </div> -->
                <!-- <div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                        <i class="icon-cloud-upload"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                        <i class="icon-wrench"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                        <i class="icon-trash"></i>
                    </a>
                </div> -->
            <!-- </div> -->
            <div class="portlet-body form">
                <form class="form-horizontal" action="#" id="submit_form" method="POST">
                    <div class="form-wizard">
                        <div class="form-body">
                            <ul class="nav nav-pills nav-justified steps">
                                <li <?php if($employees['employee_last_status_id']<2) { ?> class="active done" <?php } else if($employees['employee_last_status_id']>0) { ?> class="active done" <?php } ?>>
                                    <a href="#tab1" data-toggle="tab" class="step">
                                        <span class="number"> 1 </span>
                                        <span class="desc">
                                            <i class="fa fa-check"></i> Applicant </span>
                                    </a>
                                    <div class="col-md-offset-3"><?php echo $employee_statuses[0]['created_at'];?></div>
                                </li>
                                <li  <?php if($employees['employee_last_status_id']<=3) { ?> class="active done" <?php } else if($employees['employee_last_status_id']>1) { ?> class="active done" <?php } ?>>
                                    <a href="#tab2" data-toggle="tab" class="step">
                                        <span class="number" <?php if($employees['employee_last_status_id']<2) { ?> style="background-color:red" <?php } ?> > 2 </span>
                                        <span class="desc">
                                            <i class="fa fa-check"></i> Test/Demo </span>
                                    </a>
                                    <div class="col-md-offset-3">
                                        <?php if(isset($employee_statuses[1]['created_at'])) { echo $employee_statuses[1]['created_at']; } ?>
                                    </div>
                                </li>
                                <li <?php if($employees['employee_last_status_id']<4) { ?> class="active done" <?php } else if($employees['employee_last_status_id']>2) { ?> class="active done" <?php } ?>>
                                    <a href="#tab3" data-toggle="tab" class="step">
                                        <span class="number" <?php if($employees['employee_last_status_id']<3) { ?> style="background-color:red" <?php } ?>> 3 </span>
                                        <span class="desc">
                                            <i class="fa fa-check"></i> File Completion </span>
                                    </a>
                                    <div class="col-md-offset-3">
                                        <?php if(isset($employee_statuses[2]['created_at'])) { echo $employee_statuses[2]['created_at']; } ?>
                                    </div>
                                </li>
                                <li <?php if($employees['employee_last_status_id']<5) { ?> class="active done" <?php } else if($employees['employee_last_status_id']>3) { ?> class="active done" <?php } ?>>
                                    <a href="#tab4" data-toggle="tab" class="step">
                                        <span class="number" <?php if($employees['employee_last_status_id']<4) { ?> style="background-color:red" <?php } ?> > 4 </span>
                                        <span class="desc">
                                            <i class="fa fa-check"></i> Registered </span>
                                    </a>
                                    <div class="col-md-offset-3">
                                        <?php if(isset($employee_statuses[3]['created_at'])) { echo $employee_statuses[3]['created_at']; } ?>
                                    </div>
                                </li>
                            </ul>
                            <!-- <div id="bar" class="progress progress-striped" role="progressbar">
                                <div class="progress-bar progress-bar-success">
                                </div>
                            </div> -->
                            <div class="portlet light bordered">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption">
                                        <i class="icon-globe font-green-sharp"></i>
                                        <span class="caption-subject font-green-sharp bold uppercase">Actions</span>
                                    </div>
                                </div>
                                <div class="portlet-body util-btn-margin-bottom-5">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="dropdown_fontawesome">
                                            <div class="clearfix">
                                                <div class="form-actions">
                                                    <a href="javascript:;" id="send_email" class="btn default"> Send Email
                                                        <!-- <i class="fa fa-user"></i> -->
                                                    </a>
                                                    <a href="<?php echo SURL.'recruitment/email_history/'.$employees['employee_id'];?>" class="btn red"> Email History
                                                        <!-- <i class="fa fa-search"></i> -->
                                                    </a>
                                                    <!-- <a href="<?php echo SURL.'./assets/uploads/'.$files[0]['undertaking'];?>" download>
                                                        <button type="button" class="btn btn-info chk2" id=""><i class="fa fa-download"></i></button>
                                                    </a> -->
                                                    <a href="<?php echo SURL.'./assets/documents/'.$documents['document_name'];?>" download class="btn blue">
                                                        <!-- <i class="fa fa-file-o"></i> -->
                                                        Download CV 
                                                    </a>
                                                    <?php if($employees['employee_last_status_id']<4) { ?>
                                                        <a class="btn default button-next" href="<?php echo SURL.'recruitment/update_employee_status/'.$employees['employee_id'].'/'.$employees['employee_last_status_id'];?>" onclick="return confirm('Are You sure you want to accept the applicant for next stage?')"> Continue
                                                            <!-- <i class="fa fa-plus"></i> -->
                                                        </a>
                                                    <?php } ?>
                                                    <a href="javascript:;" class="btn red"> Reject
                                                        <!-- <i class="fa fa-times"></i> -->
                                                    </a>
                                                    <a href="javascript:;" class="btn green button-previous"> Back
                                                        <!-- <i class="fa fa-minus"></i> -->
                                                    </a>
                                                    <a href="javascript:;" class="btn green button-submit"> Submit
                                                        <!-- <i class="fa fa-check"></i> -->
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="portlet light bordered">
                    <div class="portlet-title tabbable-line">
                        <div class="caption">
                            <i class="icon-share font-dark"></i>
                            <span class="caption-subject font-dark bold uppercase">Portlet Tabs</span>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#portlet_tab2_1" data-toggle="tab"> Info </a>
                            </li>
                            <li>
                                <a href="#portlet_tab2_2" data-toggle="tab"> Personal Detail </a>
                            </li>
                            <?php if($employees['employee_last_status_id']<2)
                            {
                            }
                            else
                            { ?>
                                <li>
                                    <a href="#portlet_tab2_3" data-toggle="tab"> Test/Demo Detail </a>
                                </li>
                            <?php }
                             ?>
                            <?php if($employees['employee_last_status_id']<3)
                            {
                            }
                            else
                            { ?>
                                <li>
                                    <a href="#portlet_tab2_4" data-toggle="tab"> File Completion </a>
                                </li>
                            <?php }
                            ?>
                        </ul>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="portlet_tab2_1">
                                <!-- <div class="tab-content"> -->
                                    <!-- <div class="alert alert-danger display-none">
                                        <button class="close" data-dismiss="alert"></button> You have some form errors. Please check below. 
                                    </div> -->
                                   <!--  <div class="alert alert-success display-none">
                                        <button class="close" data-dismiss="alert"></button> Your form validation is successful! 
                                    </div> -->
                                    <!-- <div class="tab-pane active" id="tab1"> -->
                                        <form id="applying_for_form" class="form-horizontal">
                                            <div id="applying_for_update_alert"></div>
                                            <input type="hidden" name="employee_id" value="<?php echo $employees['employee_id'];?>">
                                            <h3><b>Applying For</b></h3>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">Position
                                                        </label>
                                                        <div class="col-md-4">
                                                            <select class="form-control" name="position_id" required="">
                                                                <option value="<?php echo $position['position_id'];?>"><?php echo $position['position_name'];?></option>
                                                                <?php
                                                                    foreach ($positions as $key => $value)
                                                                    {
                                                                ?>
                                                                        <option value="<?php echo $value['position_id'];?>"><?php echo $value['position_name'];?></option>
                                                                <?php 
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <label class="control-label col-md-2">Level
                                                        </label>
                                                        <div class="col-md-4">
                                                            <select class="form-control" name="level_id" required="">
                                                                <option value="<?php echo $employee_level['level_id'];?>"><?php echo $employee_level['level_name'];?></option>
                                                                <?php
                                                                    foreach ($levels as $key => $value)
                                                                    {
                                                                ?>
                                                                        <option value="<?php echo $value['level_id'];?>"><?php echo $value['level_name'];?></option>
                                                                <?php 
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">Class
                                                        </label>
                                                        <div class="col-md-4">
                                                            <select class="form-control" id="class_id" name="class_id" required="">
                                                            <option value="<?php echo $class['id'];?>"><?php echo $class['class_name'];?></option>
                                                                <?php
                                                                    foreach ($classes as $key => $value)
                                                                    {
                                                                ?>
                                                                        <option value="<?php echo $value['id'];?>"><?php echo $value['class_name'];?></option>
                                                                <?php 
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <label class="control-label col-md-2">Branch
                                                        </label>
                                                        <div class="col-md-4">
                                                            <select type="text" id="branch_id" class="form-control" name="branch_id" value="" title="Select Class First" required="">
                                                                <option value="<?php echo $branch['id'] ;?>"><?php echo $branch['branch_name'] ;?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">Subject
                                                        </label>
                                                        <div class="col-md-4">
                                                            <select class="form-control" name="subject_id" required="">
                                                            <option value="<?php echo $subject['id'];?>"><?php echo $subject['subject_name'];?></option>
                                                                <?php
                                                                    foreach ($subjects as $key => $value)
                                                                    {
                                                                ?>
                                                                        <option value="<?php echo $value['id'];?>"><?php echo $value['subject_name'];?></option>
                                                                <?php 
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <label class="control-label col-md-2">Current Status
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="" value="<?php echo $current_status['status_name'];?>" placeholder="" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">Already Registered
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="already_registered" value="<?php echo $already_registered;?>" disabled="" />
                                                        </div>
                                                        <label class="control-label col-md-2">Last Remarks
                                                        </label>
                                                        <div class="col-md-4">
                                                            <?php if($already_registered=='Yes') 
                                                            { 
                                                            ?>
                                                                <input type="text" class="form-control" name="status" value="<?php echo $employee_last_status_remarks['status_remark'];?>" disabled="" />
                                                            <?php
                                                            }
                                                            else 
                                                            { 
                                                            ?>
                                                                <input type="text" class="form-control" name="status" value="<?php echo "";?>" disabled="" />
                                                            <?php 
                                                            }
                                                             ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">Last Registered Date
                                                        </label>
                                                        <div class="col-md-4">
                                                            <?php if($already_registered=='Yes') 
                                                            { 
                                                            ?>
                                                                <input type="text" class="form-control" name="registration_date" value="<?php echo $employee_last_status_remarks['created_at'];?>" disabled="" />
                                                            <?php
                                                            }
                                                            else 
                                                            { 
                                                            ?>
                                                                <input type="text" class="form-control" name="registration_date" value="<?php echo "";?>" disabled="" />
                                                            <?php 
                                                            }
                                                            ?>
                                                        </div>
                                                        <label class="control-label col-md-2">Last Status
                                                        </label>
                                                        <div class="col-md-4">
                                                            <?php if($already_registered=='Yes') 
                                                            { 
                                                            ?>
                                                                <input type="text" class="form-control" name="status" value="<?php echo $employee_last_status_name['status_name'];?>" disabled="" />
                                                            <?php
                                                            }
                                                            else 
                                                            { 
                                                            ?>
                                                                <input type="text" class="form-control" name="status" value="<?php echo "";?>" disabled="" />
                                                            <?php 
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-5 col-md-6">
                                                        <button type="submit" id="applying_for_btn" name="submit" value="" class="btn btn-primary mt-ladda-btn ladda-button" data-style="expand-right"><i class="glyphicon glyphicon-ok-sign"></i>
                                                            <span class="ladda-label">Update</span>
                                                            <span class="ladda-spinner"></span>
                                                        </button>
                                                        <div id="errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    <!-- </div> -->
                                    <!-- <div class="tab-pane" id="tab2">
                                        <form id="applying_for_form" class="form-horizontal">
                                            <div id="applying_for_update_alert"></div>
                                            <input type="hidden" name="employee_id" value="<?php echo $employees['employee_id'];?>">
                                            <h3><b>Applying For</b></h3>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">Position
                                                        </label>
                                                        <div class="col-md-4">
                                                            <select class="form-control" name="position_id" value="<?php echo $position['position_id'];?>"><?php echo $position['position_name'];?>
                                                                <?php
                                                                    foreach ($positions as $key => $value)
                                                                    {
                                                                ?>
                                                                        <option value="<?php echo $value['position_id'];?>"><?php echo $value['position_name'];?></option>
                                                                <?php 
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <label class="control-label col-md-2">Class
                                                        </label>
                                                        <div class="col-md-4">
                                                            <select class="form-control" name="class_id" value="<?php echo $class['id'];?>"><?php echo $class['class_name'];?>
                                                                <?php
                                                                    foreach ($classes as $key => $value)
                                                                    {
                                                                ?>
                                                                        <option value="<?php echo $value['id'];?>"><?php echo $value['class_name'];?></option>
                                                                <?php 
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">Branch
                                                        </label>
                                                        <div class="col-md-4">
                                                            <select class="form-control" name="branch_id" value="<?php echo $branch['id'];?>"><?php echo $branch['branch_name'];?>
                                                                <?php
                                                                    foreach ($branches as $key => $value)
                                                                    {
                                                                ?>
                                                                        <option value="<?php echo $value['id'];?>"><?php echo $value['branch_name'];?></option>
                                                                <?php 
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <label class="control-label col-md-2">Subject
                                                        </label>
                                                        <div class="col-md-4">
                                                            <select class="form-control" name="subject_id" value="<?php echo $subject['id'];?>"><?php echo $subject['subject_name'];?>
                                                                <?php
                                                                    foreach ($subjects as $key => $value)
                                                                    {
                                                                ?>
                                                                        <option value="<?php echo $value['id'];?>"><?php echo $value['subject_name'];?></option>
                                                                <?php 
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">Status
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="status" value="<?php echo $statuses['status_name'];?>" disabled="" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">Already Registered
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="already_registered" value="<?php echo $already_registered;?>" disabled="" />
                                                        </div>
                                                        <label class="control-label col-md-2">Remarks
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="remarks" value="<?php echo "Nill";?>" disabled="" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">Last Registered Date
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="registration_date" value="<?php echo "Nill";?>" disabled="" />
                                                        </div>
                                                        <label class="control-label col-md-2">Last Status
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="status" value="<?php echo "Nill";?>" disabled="" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-5 col-md-6">
                                                        <button type="submit" id="applying_for_btn" name="submit" value="" class="btn btn-md green-meadow"><i class="glyphicon glyphicon-ok-sign"></i>
                                                        Update</button>
                                                        <div id="errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="tab3">
                                        <form id="applying_for_form" class="form-horizontal">
                                            <div id="applying_for_update_alert"></div>
                                            <input type="hidden" name="employee_id" value="<?php echo $employees['employee_id'];?>">
                                            <h3><b>Applying For</b></h3>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">Position
                                                        </label>
                                                        <div class="col-md-4">
                                                            <select class="form-control" name="position_id" value="<?php echo $position['position_id'];?>"><?php echo $position['position_name'];?>
                                                                <?php
                                                                    foreach ($positions as $key => $value)
                                                                    {
                                                                ?>
                                                                        <option value="<?php echo $value['position_id'];?>"><?php echo $value['position_name'];?></option>
                                                                <?php 
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <label class="control-label col-md-2">Class
                                                        </label>
                                                        <div class="col-md-4">
                                                            <select class="form-control" name="class_id" value="<?php echo $class['id'];?>"><?php echo $class['class_name'];?>
                                                                <?php
                                                                    foreach ($classes as $key => $value)
                                                                    {
                                                                ?>
                                                                        <option value="<?php echo $value['id'];?>"><?php echo $value['class_name'];?></option>
                                                                <?php 
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">Branch
                                                        </label>
                                                        <div class="col-md-4">
                                                            <select class="form-control" name="branch_id" value="<?php echo $branch['id'];?>"><?php echo $branch['branch_name'];?>
                                                                <?php
                                                                    foreach ($branches as $key => $value)
                                                                    {
                                                                ?>
                                                                        <option value="<?php echo $value['id'];?>"><?php echo $value['branch_name'];?></option>
                                                                <?php 
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <label class="control-label col-md-2">Subject
                                                        </label>
                                                        <div class="col-md-4">
                                                            <select class="form-control" name="subject_id" value="<?php echo $subject['id'];?>"><?php echo $subject['subject_name'];?>
                                                                <?php
                                                                    foreach ($subjects as $key => $value)
                                                                    {
                                                                ?>
                                                                        <option value="<?php echo $value['id'];?>"><?php echo $value['subject_name'];?></option>
                                                                <?php 
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">Status
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="status" value="<?php echo $statuses['status_name'];?>" disabled="" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">Already Registered
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="already_registered" value="<?php echo $already_registered;?>" disabled="" />
                                                        </div>
                                                        <label class="control-label col-md-2">Remarks
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="remarks" value="<?php echo "Nill";?>" disabled="" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">Last Registered Date
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="registration_date" value="<?php echo "Nill";?>" disabled="" />
                                                        </div>
                                                        <label class="control-label col-md-2">Last Status
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="status" value="<?php echo "Nill";?>" disabled="" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-5 col-md-6">
                                                        <button type="submit" id="applying_for_btn" name="submit" value="" class="btn btn-md green-meadow"><i class="glyphicon glyphicon-ok-sign"></i>
                                                        Update</button>
                                                        <div id="errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="tab4">
                                        <form id="applying_for_form" class="form-horizontal">
                                            <div id="applying_for_update_alert"></div>
                                            <input type="hidden" name="employee_id" value="<?php echo $employees['employee_id'];?>">
                                            <h3><b>Applying For</b></h3>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">Position
                                                        </label>
                                                        <div class="col-md-4">
                                                            <select class="form-control" name="position_id" value="<?php echo $position['position_id'];?>"><?php echo $position['position_name'];?>
                                                                <?php
                                                                    foreach ($positions as $key => $value)
                                                                    {
                                                                ?>
                                                                        <option value="<?php echo $value['position_id'];?>"><?php echo $value['position_name'];?></option>
                                                                <?php 
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <label class="control-label col-md-2">Class
                                                        </label>
                                                        <div class="col-md-4">
                                                            <select class="form-control" name="class_id" value="<?php echo $class['id'];?>"><?php echo $class['class_name'];?>
                                                                <?php
                                                                    foreach ($classes as $key => $value)
                                                                    {
                                                                ?>
                                                                        <option value="<?php echo $value['id'];?>"><?php echo $value['class_name'];?></option>
                                                                <?php 
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">Branch
                                                        </label>
                                                        <div class="col-md-4">
                                                            <select class="form-control" name="branch_id" value="<?php echo $branch['id'];?>"><?php echo $branch['branch_name'];?>
                                                                <?php
                                                                    foreach ($branches as $key => $value)
                                                                    {
                                                                ?>
                                                                        <option value="<?php echo $value['id'];?>"><?php echo $value['branch_name'];?></option>
                                                                <?php 
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <label class="control-label col-md-2">Subject
                                                        </label>
                                                        <div class="col-md-4">
                                                            <select class="form-control" name="subject_id" value="<?php echo $subject['id'];?>"><?php echo $subject['subject_name'];?>
                                                                <?php
                                                                    foreach ($subjects as $key => $value)
                                                                    {
                                                                ?>
                                                                        <option value="<?php echo $value['id'];?>"><?php echo $value['subject_name'];?></option>
                                                                <?php 
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">Status
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="status" value="<?php echo $statuses['status_name'];?>" disabled="" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">Already Registered
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="already_registered" value="<?php echo $already_registered;?>" disabled="" />
                                                        </div>
                                                        <label class="control-label col-md-2">Remarks
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="remarks" value="<?php echo "Nill";?>" disabled="" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">Last Registered Date
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="registration_date" value="<?php echo "Nill";?>" disabled="" />
                                                        </div>
                                                        <label class="control-label col-md-2">Last Status
                                                        </label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="status" value="<?php echo "Nill";?>" disabled="" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-5 col-md-6">
                                                        <button type="submit" id="applying_for_btn" name="submit" value="" class="btn btn-md green-meadow"><i class="glyphicon glyphicon-ok-sign"></i>
                                                        Update</button>
                                                        <div id="errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div> -->
                                <!-- </div> -->
                            </div>
                            <div class="tab-pane" id="portlet_tab2_2">
                                <form id="personal_details_form" class="form-horizental">
                                    <input type="hidden" name="employee_id" id="employee_id" value="<?php echo $employees['employee_id'];?>">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <h3><b>Personal Details</b></h3>
                                            <div id="personal_detail_alert"></div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Name<span class="required" aria-required="true">*</span></label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <div class="input-icon right">
                                                                        <i class="fa"></i>
                                                                        <input style="text-transform:uppercase;" type="text" id="employee_name" name="employee_name" class="form-control" placeholder="Ali" value="<?php echo $employees['employee_name'];?>" data-validation="length" data-validation-length="min3">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">CNIC<span class="required" aria-required="true">*</span></label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <div class="input-icon right">
                                                                        <i class="fa"></i>
                                                                        <input type="text" id="employee_cnic" name="employee_cnic" maxlength="13" class="form-control" placeholder="1234567890123" value="<?php echo $employees['employee_cnic'];?>" data-validation="length" data-validation-length="min13">
                                                                    </div>
                                                                </div>
                                                                <div class="alert alert-danger" style="display: none;margin-bottom: 0px" id="cnic_error">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Father Name<span class="required" aria-required="true">*</span></label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <div class="input-icon right">
                                                                        <i class="fa"></i>
                                                                        <input type="text" style="text-transform:uppercase;" id="employee_father_name"  name="employee_father_name" class="form-control" placeholder="Ali" value="<?php echo $employees['employee_father_name'];?>" data-validation="length" data-validation-length="min3">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Father CNIC<span class="required" aria-required="true">*</span> </label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <div class="input-icon right">
                                                                        <i class="fa"></i>
                                                                        <input type="text" id="employee_father_cnic" name="employee_father_cnic" class="form-control" placeholder="1234567890123" value="<?php echo $employees['employee_father_cnic'];?>" data-validation="length" data-validation-length="min13">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Email<span class="required" aria-required="true">*</span></label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <div class="input-icon right">
                                                                        <i class="fa"></i>
                                                                        <input type="text" id="contact_email"  name="contact_email" class="form-control" placeholder="abc@gmail.com" value="<?php echo $contacts['contact_email'];?>" data-validation="email">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Mobile No.<span class="required" aria-required="true">*</span> </label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <div class="input-icon right">
                                                                        <i class="fa"></i>
                                                                        <input type="text" id="contact_cell" name="contact_cell" class="form-control" maxlength="15" minlength="15" placeholder="03213456789" value="<?php echo $contacts['contact_cell'];?>" data-validation="required">
                                                                    </div>
                                                                    <div class="help-block">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Gender<span class="required" aria-required="true">*</span></label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <div class="input-icon right">
                                                                        <i class="fa"></i>
                                                                        <select type="text" id="employee_gender" name="employee_gender" class="form-control" value="<?php echo $employees['employee_gender'];?>" data-validation="required">
                                                                            <option value="male">Male</option>
                                                                            <option value="femail">Female</option>
                                                                            <option value="other">Other</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Upload CV<span class="required" aria-required="true">*</span></label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <div class="input-icon right">
                                                                        <i class="fa"></i>
                                                                        <input type="file" id="cv" class="form-control" name="cv" value="" title="Upload Your Latest CV" disabled="" 
                                                                        data-validation="mime size required" 
                                                                        data-validation-allowing="pdf" 
                                                                        data-validation-max-size="1mb" 
                                                                        data-validation-error-msg-required="No image selected"> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Residential Telephone No.</label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <div class="input-icon right">
                                                                        <i class="fa"></i>
                                                                        <input type="text" class="form-control" value="<?php echo $contacts['contact_line'];?>" id="contact_line" name="contact_line">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Emergency No.</label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <div class="input-icon right">
                                                                        <i class="fa"></i>
                                                                        <input type="text" class="form-control" value="<?php echo $contacts['contact_line_ext'];?>" id="contact_line_ext" name="contact_line_ext">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Residential Address<span class="required" aria-required="true">*</span></label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <div class="input-icon right">
                                                                        <i class="fa"></i>(<span id="pres-max-length">100</span> characters left)
                                                                        <textarea class="form-control" id="address_local" minlength="5" name="address_local" rows="2" placeholder="Ho.xx, St.xx-x, Sec.x-x/x, xxxxxxxx" data-validation="required"><?php echo $addresses[0]['address_local'];?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">City<span class="required" aria-required="true">*</span></label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <div class="input-icon right">
                                                                        <i class="fa"></i>
                                                                        <input type="text" name="address_city" id="address_city" class="form-control" placeholder="xxxxxxxx" value="<?php echo $addresses[0]['address_city'];?>" data-validation="required">
                                                                    </div>
                                                                    <div class="help-block">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Permanent Address</label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <div class="input-icon right">
                                                                        <i class="fa"></i>(<span id="pres-max-length1">100</span> characters left)
                                                                        <textarea class="form-control" rows="2" id="address_local1" name="address_local1"><?php echo $addresses[1]['address_local'];?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">City</label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <div class="input-icon right">
                                                                        <i class="fa"></i>
                                                                        <input type="text" name="address_city1" id="address_city1" class="form-control" placeholder="" value="<?php echo $addresses[1]['address_city'];?>">
                                                                    </div>
                                                                    <div class="help-block">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Martial Status<span class="required" aria-required="true">*</span></label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <div class="input-icon right">
                                                                        <i class="fa"></i>
                                                                        <select type="text" placeholder="" name="employee_martial_status" id="employee_martial_status" class="form-control" value="<?php echo $employees['employee_martial_status'];?>" data-validation="required" disabled>
                                                                            <option value="single">Single</option>
                                                                            <option value="married">Married</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="help-block">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Husband/Wife CNIC<span class="required" aria-required="true">*</span></label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <div class="input-icon right">
                                                                        <i class="fa"></i>
                                                                        <input type="text" id="employee_husband_wife_cnic" placeholder="XXXXX-XXXXXXX-X" name="employee_husband_wife_cnic" class="form-control" placeholder="" value="<?php echo $employees['employee_husband_wife_cnic'];?>" data-validation="number" data-validation="required" disabled>
                                                                    </div>
                                                                    <div class="help-block"> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-5 col-md-6">
                                                        <button type="submit" id="personal_details_btn" name="submit" value="" class="btn btn-primary mt-ladda-btn ladda-button" data-style="expand-right">
                                                            <i class="glyphicon glyphicon-ok-sign"></i>
                                                            <span class="ladda-label">Update</span>
                                                            <span class="ladda-spinner"></span>
                                                        </button>
                                                        <div id="errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <h3><b>Detail of Children</b></h3>
                                            <div id="personal_details_alert"></div>
                                            <div class="row form-inline">
                                                <label class="control-label">Name</label>
                                                <input type="text" name="children_name" class="form-control" value="" placeholder="">
                                                <label class="control-label">Class</label>
                                                <input type="text" name="children_class" class="form-control" value="" placeholder="">
                                                <label class="control-label">School</label>
                                                <input type="text" name="children_school" class="form-control" value="" placeholder="">
                                                <div class="form-group">
                                                    <input type="submit" id="children_details_btn" class="col-md-offset-6 btn-primary form-control" name="" value="Add Student">
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="portlet light bordered" style="margin-top: 10px">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <i class="icon-social-dribbble font-green"></i>
                                                                <span class="caption-subject font-green bold uppercase">Children Table</span>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <div class="table-scrollable" id='tbo'>
                                                                <table class="table table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th> Sr. # </th>
                                                                            <th> Name </th>
                                                                            <th> Class </th>
                                                                            <th> School </th>
                                                                            <th> Status </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $i=1; foreach($children_details as $key => $value){?>
                                                                            <tr>
                                                                                <td><?php echo $i;?></td>
                                                                                <form id="child_<?php echo $value['children_detail_id'];?>">
                                                                                <td>
                                                                                    <div class="hide_<?php echo $value['children_detail_id'];?>" id="div_name_<?php echo $value['children_detail_id'];?>"><?php echo $value['children_name'];?></div>
                                                                                    <input type="hidden" class="show_<?php echo $value['children_detail_id'];?>" id="h_name_<?php echo $value['children_detail_id'];?>" value="<?php echo $value['children_name'];?>">
                                                                                </td>
                                                                                <td>
                                                                                    <div class="hide_<?php echo $value['children_detail_id'];?>"  id="div_class_<?php echo $value['children_detail_id'];?>"><?php echo $value['children_class'];?></div>
                                                                                    <input type="hidden" class="show_<?php echo $value['children_detail_id'];?>" id="h_class_<?php echo $value['children_detail_id'];?>" value="<?php echo $value['children_class'];?>">
                                                                                </td>
                                                                                <td>
                                                                                    <div class="hide_<?php echo $value['children_detail_id'];?>"  id="div_school_<?php echo $value['children_detail_id'];?>"><?php echo $value['children_school'];?></div>
                                                                                    <input type="hidden" class="show_<?php echo $value['children_detail_id'];?>" id="h_school_<?php echo $value['children_detail_id'];?>" value="<?php echo $value['children_school'];?>">
                                                                                </td>
                                                                                <td>
                                                                                    <div class="btn-group">
                                                                                        <a class="btn btn-info hide_<?php echo $value['children_detail_id'];?>" onclick="showupdate('<?php echo $value['children_detail_id'];?>')">Edit</a>
                                                                                        <a class="btn btn-info update_<?php echo $value['children_detail_id'];?>" onclick="submitupdate('<?php echo $value['children_detail_id'];?>',event)" style="display: none;">Update</a>
                                                                                        <a onclick="delete_child('<?php echo $value['children_detail_id'];?>',event)" id="children_details_delete_btn" class="btn btn-danger">Delete</a>
                                                                                    </div>
                                                                                </td>
                                                                                </form>
                                                                            </tr>
                                                                        <?php $i++;} ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="portlet_tab2_3">
                                <form id="test_demo_result_form" class="form-horizontal">
                                    <input type="hidden" name="employee_id" value="<?php echo $employees['employee_id'];?>">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <h3><b>Test/Demo Result</b></h3>
                                            <div id="test_demo_result_alert"></div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">
                                                            Branch
                                                        </label>
                                                        <div class="col-md-4">
                                                            <select name="branch_id" class="form-control" id="" required="">
                                                                <option value="" selected>Select Branch</option>
                                                                <?php foreach ($branches as $key => $value) { ?>
                                                                    <option value="<?php echo $value['id'];?>"><?php echo $value['branch_name'];?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">
                                                            Department
                                                        </label>
                                                        <div class="col-md-4">
                                                            <select name="department_id" class="form-control" id="" required="">
                                                                <option value="" selected>Select Department</option>
                                                                <?php foreach ($departments as $key => $value) { ?>
                                                                    <option value="<?php echo $value['department_id'];?>"><?php echo $value['department_name'];?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">
                                                            Position
                                                        </label>
                                                        <div class="col-md-4">
                                                            <select name="position_id" class="form-control" id="" required="">
                                                                <option value="" selected>Select Designation</option>
                                                                <?php foreach ($positions as $key => $value) { ?>
                                                                    <option value="<?php echo $value['position_id'];?>"><?php echo $value['position_name'];?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">
                                                            Test Result
                                                        </label>
                                                        <div class="col-md-4">
                                                            <select name="status_result" class="form-control" id="" required="">
                                                                <option value="" selected>Select Test Result</option>
                                                                <option value="Pass">Pass</option>
                                                                <option value="Fail">Fail</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">
                                                            Remarks
                                                        </label>
                                                        <div class="col-md-4">
                                                            <!-- <textarea name="status_remark" class="form-control" id="" cols="30" rows="3" required=""></textarea> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">
                                                            Salary
                                                        </label>
                                                        <div class="col-md-4">
                                                            <!-- <input type="text" class="form-control" name="employee_salary" value="" placeholder="" required=""> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-6">
                                                        <button type="button" name="submit" id="test_demo_result_update_btn" value="submit" class="btn btn-primary mt-ladda-btn ladda-button" data-style="expand-right">
                                                            <i class="glyphicon glyphicon-ok-sign"></i>
                                                            <span class="ladda-label">Update</span>
                                                            <span class="ladda-spinner"></span>
                                                        </button>
                                                        <div id="errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="portlet_tab2_4">
                                <form id="file_completion_form" class="form-horizontal">
                                    <div class="form-body">
                                        <!-- <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}"> -->
                                        <!-- <div class="alert alert-block alert-info fade in">
                                            <p><b>'<span style="color:red;">*</span>' fields are compulsory.</b></p>
                                        </div> -->
                                        <!-- <?php echo $error;?> -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3><b>For Office Use Only</b></h3>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Employee No.</label>
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control" value="<?php echo $employees['employee_no'];?>" placeholder="Enter text" disabled="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Position</label>
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control" placeholder="Enter text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Branch</label>
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control" placeholder="Enter text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Action Type</label>
                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="mt-radio-inline">
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios25" value="option1" class="form-control" checked="">
                                                                    New Hire
                                                                </label>
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios26" value="option2" class="form-control" checked="">
                                                                    Re-Hire
                                                                </label>
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios27" value="option3" class="form-control" checked="">
                                                                    Termination
                                                                </label>
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios28" value="option4" class="form-control" checked="">
                                                                    Resignation
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="mt-radio-inline">
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios25" value="option1" class="form-control" checked="">
                                                                    Retirement
                                                                </label>
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios26" value="option2" class="form-control" checked="">
                                                                    Suspension
                                                                </label>
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios27" value="option3" class="form-control" checked="">
                                                                    Transfer
                                                                </label>
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios28" value="option4" class="form-control" checked="">
                                                                    Long Leave
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Type of Position</label>
                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="mt-radio-inline">
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios25" value="option1" class="form-control" checked="">
                                                                    Visiting
                                                                </label>
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios26" value="option2" class="form-control" checked="">
                                                                    Permanent
                                                                </label>
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios27" value="option3" class="form-control" checked="">
                                                                    Domestic Staff
                                                                </label>
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios28" value="option4" class="form-control" checked="">
                                                                    Temporary/Substitute
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Probation</label>
                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="mt-radio-inline">
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios25" value="option1" class="form-control" checked="">
                                                                    6 Months
                                                                </label>
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios26" value="option2" class="form-control" checked="">
                                                                    1 Year
                                                                </label>
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios27" value="option3" class="form-control" checked="">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Replacement for (if any)</label>
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control" placeholder="Enter text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Gross Salary</label>
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control" placeholder="Enter text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Date of Joining</label>
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control" placeholder="Enter text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Applicable Leave Rules</label>
                                                    <!-- <div class="col-md-10"> -->
                                                        <!-- <div class="row"> -->
                                                            <div class="mt-radio-inline">
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios25" value="option1" class="form-control" checked="">
                                                                    Visiting Staff Rules
                                                                </label>
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios26" value="option2" class="form-control" checked="">
                                                                    Permanent Staff Rules
                                                                </label>
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios27" value="option3" class="form-control" checked="">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        <!-- </div> -->
                                                    <!-- </div> -->
                                                </div>
                                                <div class="col-md-offset-3 col-md-6 col-md-offset-3">
                                                    <button name="submit" id="submit" type="button" value="submit" class="btn btn-primary mt-ladda-btn ladda-button" data-style="expand-right">
                                                        <i class="glyphicon glyphicon-ok-sign"></i>
                                                        <span class="ladda-label">Update</span>
                                                        <span class="ladda-spinner"></span>
                                                    </button>                                      
                                                </div><br>
                                                <h3><b>File Completion</b></h3>
                                                <table class="table table-striped table-bordered table-hover table-header-fixed">
                                                    <thead>
                                                        <tr>
                                                            <th>File Name</th>
                                                            <th>Choose File</th>
                                                            <th>Update</th>
                                                            <th>Status</th>
                                                            <!-- <th>Name</th> -->
                                                            <th>Download</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                        <!-- file 1 -->
                                                            <td>
                                                                <label>Resume/CV</label>
                                                            </td>
                                                            <td>
                                                                <input type="file" data-validation="" style="display: inline" name="undertaking" id="undertaking" value="" placeholder="" multiple="">
                                                            </td>
                                                            <td>
                                                                <input type="hidden" id="student_id" name="student_id" value="">
                                                                <button type="button" class="btn btn-info chk2" id="upload_undertaking">
                                                                    <i class="fa fa-upload"></i>
                                                                </button>
                                                            </td>
                                                            <td>
                                                                <span class="alert" style="display: none" id="msg">Updated</span>
                                                            </td>
                                                            <td id="download_undertaking">
                                                                <a href="<?php echo SURL.'file/download/';?>">
                                                                    <button type="button" class="btn btn-info chk2" id=""><i class="fa fa-download"></i></button>
                                                                </a>
                                                            </td>
                                                         <!--    <td id="undertaking">
                                                                <span ><?php echo $files[0]['undertaking']; ?></span>
                                                            </td> -->
                                                        </tr>
                                                        <tr>
                                                            <!-- file 2 -->
                                                            <td>
                                                                <label>Copy of Academic Documents</label>
                                                            </td>
                                                            <td>
                                                                <input type="file" data-validation="" style="display: inline" name="copy_of_paid_fee_challan" id="copy_of_paid_fee_challan" value="" placeholder="">
                                                            </td>
                                                            <td>
                                                                <input type="hidden" id="student_id" name="student_id" value="">
                                                                <button type="button" class="btn btn-info chk2" id="upload_copy_of_paid_fee_challan">
                                                                    
                                                                    <i class="fa fa-upload"></i>
                                                                </button>
                                                            </td>
                                                            <td>
                                                                <span class="alert" style="display: none" id="msg1">Updated</span>
                                                            </td>
                                                            <td id="download_copy_of_paid_fee_challan">
                                                                <a href="<?php echo SURL.'file/download/';?>">
                                                                    <button type="button" class="btn btn-info chk2" id=""><i class="fa fa-download"></i></button>
                                                                </a>
                                                            </td>
                                                            <!-- <td id="copy_of_paid_fee_challan">
                                                                <span><?php echo $files[0]['copy_of_paid_fee_challan']; ?></span>
                                                            </td> -->
                                                        </tr>
                                                        <tr>
                                                            <!-- file 3 -->
                                                            <td>
                                                                <label>Copy of CNIC</label>
                                                            </td>
                                                            <td>   
                                                                <input type="file" data-validation="" style="display: inline" name="copy_of_paid_registration_slip" id="copy_of_paid_registration_slip" value="" placeholder="">
                                                            </td>
                                                            <td>
                                                                <input type="hidden" id="student_id" name="student_id" value="">
                                                                <button type="button" class="btn btn-info chk2" id="upload_copy_of_paid_registration_slip">
                                                                    <i class="fa fa-upload"></i>
                                                                </button>
                                                            </td>
                                                            <td>
                                                                <span class="alert" style="display: none" id="msg2">Updated</span>
                                                            </td>
                                                            <!-- <td id="copy_of_paid_registration_slip">
                                                                <span><?php echo $files[0]['copy_of_paid_registration_slip']; ?></span>
                                                            </td> -->
                                                            <td id="download_copy_of_paid_registration_slip">
                                                                <a href="<?php echo SURL.'file/download/';?>">
                                                                    <button type="button" class="btn btn-info chk2" id=""><i class="fa fa-download"></i></button>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <!-- file 4 -->
                                                            <td>
                                                                <label>Appointment Letter</label>
                                                            </td>
                                                            <td>
                                                                <input type="file" data-validation="" style="display: inline" name="photographs" id="photographs" value="" placeholder="">
                                                            </td>
                                                            <td>
                                                                <input type="hidden" id="student_id" name="student_id" value="">
                                                                <button type="button" class="btn btn-info chk2" id="upload_photographs">
                                                                    <i class="fa fa-upload"></i>
                                                                </button>
                                                            </td>
                                                            <td>
                                                                <span class="alert" style="display: none" id="msg3">Updated</span>
                                                            </td>
                                                            <!-- <td id="photographs">
                                                                <span><?php echo $files[0]['photographs']; ?></span>
                                                            </td> -->
                                                            <td id="download_photographs">
                                                                <a href="<?php echo SURL.'file/download/';?>">
                                                                    <button type="button" class="btn btn-info chk2" id=""><i class="fa fa-download"></i></button>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <!-- file 5 -->
                                                            <td>
                                                                <label>Service Rules</label>
                                                            </td>
                                                            <td>
                                                                <input type="file" data-validation="" style="display: inline" name="copy_of_form_b" id="copy_of_form_b" value="" placeholder="">
                                                            </td>
                                                            <td>
                                                                <input type="hidden" id="student_id" name="student_id" value="">
                                                                <button type="button" class="btn btn-info chk2" id="upload_copy_of_form_b">
                                                                    <i class="fa fa-upload"></i>
                                                                </button>
                                                            </td>
                                                            <td>
                                                                <span class="alert" style="display: none" id="msg4">Updated</span>
                                                            </td>
                                                            <!-- <td id="copy_of_form_b">
                                                                <span><?php echo $files[0]['copy_of_form_b']; ?></span>
                                                            </td> -->
                                                            <td id="download_copy_of_form_b">
                                                                <a href="<?php echo SURL.'file/download/';?>">
                                                                    <button type="button" class="btn btn-info chk2" id=""><i class="fa fa-download"></i></button>
                                                                </a>
                                                            </td>
                                                            <td>
                                                        </tr>
                                                        <tr>
                                                            <!-- file 6 -->
                                                            <td>
                                                                <label>Leave Rules</label>
                                                            </td>
                                                            <td>
                                                                <input type="file" data-validation="" style="display: inline" name="copy_of_guardian_cnic" id="copy_of_guardian_cnic" value="" placeholder="">
                                                            </td>
                                                            <td>
                                                                <input type="hidden" id="student_id" name="student_id" value="">
                                                                <button type="button" class="btn btn-info chk2" id="upload_copy_of_guardian_cnic">
                                                                    <i class="fa fa-upload"></i>
                                                                </button>
                                                            </td>
                                                            <td>
                                                                <span class="alert" style="display: none" id="msg5">Updated</span>
                                                            </td>
                                                            <!-- <td id="copy_of_guardian_cnic">
                                                                <span><?php echo $files[0]['copy_of_guardian_cnic']; ?></span>
                                                            </td> -->
                                                            <td id="download_copy_of_guardian_cnic">
                                                                <a href="<?php echo SURL.'file/download/';?>">
                                                                    <button type="button" class="btn btn-info chk2" id=""><i class="fa fa-download"></i></button>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <!-- file 7 -->
                                                            <td>
                                                                <label>Instruction for Teachers</label>
                                                            </td>
                                                            <td>
                                                                <input type="file" data-validation="" style="display: inline" name="school_leaving_certificate" id="school_leaving_certificate" value="" placeholder="">
                                                            </td>
                                                            <td>
                                                                <input type="hidden" id="student_id" name="student_id" value="">
                                                                <button type="button" class="btn btn-info chk2" id="upload_school_leaving_certificate">
                                                                    <i class="fa fa-upload"></i>
                                                                </button>
                                                            </td>
                                                            <td>
                                                                <span class="alert" style="display: none" id="msg6">Updated</span>
                                                            </td>
                                                           <!--  <td id="school_leaving_certificate">
                                                                <span><?php echo $files[0]['school_leaving_certificate']; ?></span>
                                                            </td> -->
                                                            <td id="download_school_leaving_certificate">
                                                                <a href="<?php echo SURL.'file/download/';?>">
                                                                    <button type="button" class="btn btn-info chk2" id=""><i class="fa fa-download"></i></button>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <!-- file 8 -->
                                                            <td>
                                                                <label>2 Passport Size Photographs</label>
                                                            </td>
                                                            <td>
                                                                <input type="file" data-validation="" style="display: inline" name="record_of_results" id="record_of_results" value="" placeholder="">
                                                            </td>
                                                            <td>
                                                                <input type="hidden" id="student_id" name="student_id" value="">
                                                                <button type="button" class="btn btn-info chk2" id="upload_record_of_results">
                                                                    <i class="fa fa-upload"></i>
                                                                </button>
                                                            </td>
                                                            <td>
                                                                <span class="alert" style="display: none" id="msg7">Updated</span>
                                                            </td>
                                                            <!-- <td id="record_of_results">
                                                                <span><?php echo $files[0]['record_of_results']; ?></span>
                                                            </td> -->
                                                            <td id="download_record_of_results">
                                                                <a href="<?php echo SURL.'file/download/';?>">
                                                                    <button type="button" class="btn btn-info chk2" id=""><i class="fa fa-download"></i></button>
                                                                </a>
                                                            </td>
                                                            <td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!-- <div class="col-md-offset-3 col-md-6">
                                                    <button name="submit" id="submit" type="submit" value="submit" class="btn btn-primary mt-ladda-btn ladda-button" data-style="expand-right">
                                                        <i class="glyphicon glyphicon-ok-sign"></i>
                                                        <span class="ladda-label">Update</span>
                                                        <span class="ladda-spinner"></span>
                                                    </button>                                      
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->
<!-- Send Email Modal Start-->
<div class="modal fade bs-modal-lg in" id="send_email_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Send Email</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo SURL."recruitment/send_email/"?>" id="registration-form" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="employee_id" id="employee_id" value="<?php echo $employees['employee_id'];?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-2">To<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-10">
                                            <input type="email" name="send_to" value="<?php echo $contacts['contact_email'];?>" id="send_to" class="form-control" data-validation="email" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Subject<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-10">
                                            <input type="text" name="subject" value="GSIS Test/Demo Date" id="subject" class="form-control" data-validation="required">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Test Date & Time<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-10">
                                            <input type="text" name="test_datetime" size="" class="form-control input-group date form_datetime bs-datetime">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Test Branch<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-10">
                                            <select class="form-control" name="branch_id" data-validation="required">
                                                <option value="" selected="">Select Branch</option>
                                                <?php foreach ($branches as $key => $value) { ?>
                                                    <option value="<?php echo $value['id'];?>"><?php echo $value['branch_name'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Message<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-10">
                                            <textarea class="summernote" name="message" data-validation="required" id="message" required>Test/Demo Date</textarea>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>       
                    <div class="modal-footer">
                        <button type="submit" class="btn green" name="send_email" id="submit" value="add_submit">Send</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Send Email Modal End-->
<div class="modal fade bs-modal-lg in" id="update-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="update-task">View Send Email</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo SURL."email/send_email/"?>" id="registration-form" class="form-horizontal" method="post" enctype="multipart/form-data"> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        
                                        <label class="control-label col-md-2">to<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-10">
                                            <input type="text" name="d_to" id="d_to" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Subject<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-10">
                                            <input type="text" name="d_sub" id="d_sub" class="form-control" readonly>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-2">message<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-10">
                                            <textarea class="summernote" name="d_message" id="d_message" disabled><div id="div_message"></div> </textarea>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>         
                    <div class="modal-footer"> 
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- END CONTENT BODY -->
<!-- </div> -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script type="text/javascript">
    $(document).ready(function()
    {
        $('.summernote').summernote(
        {
            height: 200, 
        });
        $('#send_email').click(function()
        {
            $('#send_email_modal').modal('show');
        });
    });
</script>