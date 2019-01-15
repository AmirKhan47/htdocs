<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="#">Dashboard</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Registration</<span>
        </li>
    </ul>
</div>
<h3 class="page-title">Registration 
</h3>
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
        <form action="<?php SURL;?>add/" id="registration-form" class="form-horizontal" method="post" enctype="multipart/form-data">
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
                                        <input type="text" id="name" name="name" class="form-control" value="<?php echo set_value('name'); ?>" data-validation="custom" data-validation-regexp="^[a-zA-Z\s]+$"  data-validation-error-msg="Name is incorrect ">
                                        <?php echo form_error('name'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Username<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" id="username" name="username" onblur="usernamechecker()" class="form-control" value="<?php echo set_value('username'); ?>" data-validation="required">
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
                                        <input type="email" id="email" name="email" onblur="emailchecker()" class="form-control" value="<?php echo set_value('email'); ?>" data-validation="email"><div id="eemsg"></div>
                                        <?php echo form_error('email'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Password<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8">
                                        <input type="password" id="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>" data-validation="required">
                                        <?php echo form_error('password'); ?>
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
                                    <label class="control-label col-md-4">Role<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control"  id="role" name="role" data-validation="required">
                                            <option value="">Select</option>
                                            <?php 
                                               if (count($roles)>0) 
                                                {
                                                    foreach ($roles as $key => $value) 
                                                    {
                                            ?>    
                                                        <option value="<?=$value['id'];?>"><?= $value['role_name'];?></option>
                                            <?php   
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Branch<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control"  id="branch_id" name="branch_id" data-validation="required">
                                            <option value="">Select</option>
                                            <?php
                                               if (count($branches)>0) 
                                                {
                                                    foreach ($branches as $key => $value) 
                                                    {
                                            ?>    
                                                        <option value="<?=$value['id'];?>"><?= $value['branch_name'];?></option>
                                            <?php 
                                                    }
                                                }
                                            ?>
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
                        <button name="submit" id="submit" type="submit" value="submit" class="btn btn-md green-meadow"><i class="glyphicon glyphicon-arrow-right"></i>Add User</button>                                      
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
    $.validate(
    {
        modules : 'location, date, security, file',
    });
    function usernamechecker()
    {
        var uname=$('#username').val();
        if(uname !='')
        {
            $.ajax(
            {
                url:'<?php echo SURL.'user/usernamechecker'?>',
                type:'POST',
                data:{username:uname},
                success:function(data)
                {
                    if(data== 1)
                    {
                        $('#username').addClass('error');
                        $('#username').css('border-color','rgb(185, 74, 72)');
                        $('#eumsg').html('<span class="help-block form-error" style="color:#e73d4a;">Username is already registered</span>');
                        $(':input[type="submit"]').prop('disabled', true);

                    }
                    else
                    {
                        $(':input[type="submit"]').prop('disabled', false);
                    }
                }
            })
        }
    }
    function emailchecker()
    {
        var email=$('#email').val();
        if(email !='')
        {
            $.ajax(
            {
                url:'<?php echo SURL.'user/emailchecker'?>',
                type:'POST',
                data:{email:email},
                success:function(data)
                {
                    if(data==1)
                    {
                        $('#email').addClass('error');
                        $('#email').css('border-color','rgb(185, 74, 72)');
                        $('#eemsg').html('<span class="help-block form-error" style="color:#e73d4a;">Email is already registered</span>');
                        $(':input[type="submit"]').prop('disabled', true);
                    }
                    else
                    {
                        $(':input[type="submit"]').prop('disabled', false);
                    }
                }
            })
        }
    }
</script>