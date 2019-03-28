<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo SURL;?>school/admin_dashboard">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Edit Fee Structure</span>
        </li>
    </ul>
</div>
<h3 class="page-title">Edit Fee Structure</h3>
<div class="portlet light bordered ">
    <div class="portlet-title">
        <div class="caption font-green-seagreen">
            <i class="fa fa-user font-green-seagreen"></i>
            <span class="caption-subject bold uppercase">Edit Fee Structure</span>
        </div>  
        <div class="actions">
        </div>
    </div>
    <div class="portlet-body form">
        <?php
            if ($this->session->flashdata('err_message')) 
            {
        ?>
                <div class="alert alert-danger">
                    <button class="close" data-close="alert"></button>
                    <span><?php echo $this->session->flashdata('err_message');?></span>
                </div>
        <?php
            }

            if ($this->session->flashdata('ok_message')) 
            {
        ?>
                <div class="alert alert-success">
                    <button class="close" data-close="alert"></button>
                    <span><?php echo $this->session->flashdata('ok_message');?></span>
                </div>
        <?php
            }
        ?>
        <form action="<?php echo SURL.'fee_structure/edit_fee_structure/'.$fee_structure['fee_structure_id'];?>" id="form_sample_16" class="form-horizontal" method="post" enctype="multipart/form-data">
            <input type="hidden" name="class_id" value="<?php echo $class['id']; ?>">
            <div class="form-body">
                <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="alert alert-block alert-info fade in">
                    <p><b>'<span style="color:red;">*</span>' fields are compulsory.</b></p>
                </div>
                <div class="row">
                    <div class="col-md-11">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Class<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-8">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <select type="text" data-rule-required="true" name="class_id" id="class_id1" class="form-control" disabled="disabled">
                                                    <option value="<?php echo $class['id']; ?>" selected><?php echo $class['class_name']; ?></option>
                                                    <?php foreach ($classes as $row => $class)
                                                    {
                                                        echo '<option value="'.$class['id'].'" >'.$class['class_name'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Type<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-8">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <select type="text" data-rule-required="true" onchange="fee_structure_type_check()" id="fee_structure_type" name="fee_structure_type" class="form-control"  value="">
                                                    <!-- <option value="<?php echo $fee_structure['fee_structure_type']; ?>" selected><?php echo $fee_structure['fee_structure_type']; ?> -->
                                                    <option value="New" <?php if ($fee_structure['fee_structure_type']=='New') { echo 'selected'; } ?>>New</option>
                                                    <option value="Old" <?php if ($fee_structure['fee_structure_type']=='Old') { echo 'selected'; } ?>>Old</option>
                                                </select>
                                                <div id="error_message"></div>
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
                                         <label class="control-label col-md-4">Addmission Fee<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" pattern="^[0-9]*$" data-rule-required="true" data-rule-minlength="1" data-rule-maxlength="11"  id="admission_fee" name="admission_fee" class="form-control" placeholder="" value="<?php echo $fee_structure['admission_fee']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Security (Refundable)<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" pattern="^[0-9]*$" data-rule-required="true" data-rule-minlength="1" data-rule-maxlength="11" id="security" name="security" class="form-control" placeholder="" value="<?php echo $fee_structure['security']; ?>">
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
                                        <label class="col-md-4 control-label">Tution Fee<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" id="fee" data-rule-minlength="1" data-rule-maxlength="11" name="tution_fee" data-rule-required="true" value="<?php echo $fee_structure['tution_fee']; ?>" class="form-control" >
                                                    <span class="input-group-btn">
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Monthly Computer Charges</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" data-rule-required="true" pattern="^[0-9]*$" name="computer_charges" class="form-control" data-rule-minlength="1" data-rule-maxlength="11" id="computer_charges" value="<?php echo $fee_structure['computer_charges']; ?>">
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
                                        <label class="control-label col-md-4">Annual Fund</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" data-rule-required="true" pattern="^[0-9]*$" data-rule-minlength="1" data-rule-maxlength="11"  id="annual_fund" name="annual_fund" class="form-control" placeholder="" value="<?php echo $fee_structure['annual_fund']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Monthly lab Charges</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" data-rule-required="true" id="lab_charges" pattern="^[0-9]*$" name="lab_charges" data-rule-minlength="1" data-rule-maxlength="11" class="form-control" placeholder="" value="<?php echo $fee_structure['lab_charges']; ?>">
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
                                        <label class="col-md-4 control-label">Monthly Security</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" data-rule-required="true" pattern="^[0-9]*$" id="monthly_security" name="monthly_security" data-rule-minlength="1" data-rule-maxlength="11" value="<?php echo $fee_structure['monthly_security']; ?>" class="form-control" >
                                                    <span class="input-group-btn">
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Annual Stationery Fund</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" data-rule-required="true" pattern="^[0-9]*$" data-rule-minlength="1" data-rule-maxlength="11"  id="stationary_fund" name="stationary_fund" class="form-control" placeholder="" value="<?php echo $fee_structure['stationary_fund']; ?>">
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
                                        <label class="control-label col-md-4">Exam Charges</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" data-rule-required="true" pattern="^[0-9]*$" maxlength="11" id="exam_charges" name="exam_charges" class="form-control" placeholder="" value="<?php echo $fee_structure['exam_charges']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Registration Charges</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" data-rule-required="true" pattern="^[0-9]*$" data-rule-maxlength="11"  id="registration_charges" name="registration_charges" class="form-control" placeholder="" value="<?php echo $fee_structure['registration_charges']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Less: DEFERRED (IF ANY)</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" data-rule-required="true" pattern="^[0-9]*$" data-rule-maxlength="11"  id="deferred" name="deferred" class="form-control" placeholder="" value="<?php echo $fee_structure['deferred']; ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">House Shirt Charges</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" data-rule-required="true" pattern="^[0-9]*$" data-rule-maxlength="11"  id="house_shirt" name="house_shirt" class="form-control" placeholder="" value="<?php echo $fee_structure['house_shirt']; ?>">
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
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Less: Received (IF ANY)</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" data-rule-required="true" pattern="^[0-9]*$" data-rule-maxlength="11"  id="received" name="received" class="form-control" placeholder="" value="<?php echo $fee_structure['received']; ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8" style="margin-left: 15px;">
                                <label class="control-label col-md-3"></label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <button type="submit" name="submit" value="submit" class="btn btn-success float-right">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script type="text/javascript">
    $.validate(
    {
        modules : 'location, date, security, file',
    });
    function fee_structure_type_check()
    {
        var class_id=$('#class_id1').val();
        var fee_structure_type=$('#fee_structure_type').val();
        if(class_id!='' && fee_structure_type!='')
        {
            $.ajax(
            {
                url:'<?php echo SURL.'fee_structure/fee_structure_type_check'?>',
                type:'POST',
                data:{class_id:class_id,fee_structure_type:fee_structure_type},
                success:function(data)
                {
                    if(data== 1)
                    {
                        $('#class_id1').addClass('error');
                        $('#fee_structure_type').addClass('error');
                        $('#class_id1').css('border-color','rgb(185, 74, 72)');
                        $('#fee_structure_type').css('border-color','rgb(185, 74, 72)');
                        $('#error_message').html('<span class="help-block form-error" style="color:#e73d4a;">Fee Structure Type already assigned!</span>');
                        $(':input[type="submit"]').prop('disabled', true);

                    }
                    else
                    {
                        $('#class_id1').removeClass('error');
                        $('#fee_structure_type').removeClass('error');
                        $('#class_id1').css('border-color','#208992');
                        $('#fee_structure_type').css('border-color','#208992');
                        $('#error_message').html('');
                        $(':input[type="submit"]').prop('disabled', false);
                    }
                }
            })
        }
    }
</script>  -->