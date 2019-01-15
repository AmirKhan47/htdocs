<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo SURL;?>school/admin_dashboard">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Assign Department To Designation</span>
        </li>
    </ul>
</div>
<h3 class="page-title">Assign Department To Designation</h3>
<div class="portlet light bordered ">
    <div class="portlet-title">
        <div class="caption font-green-seagreen">
            <i class="fa fa-user font-green-seagreen"></i>
            <span class="caption-subject bold uppercase">Assign Department To Designation</span>
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
        <form action="<?php echo SURL.'designation/edit_department_designation/'.$department_positions['department_position_id'];?>" id="" class="form-horizontal" method="post" enctype="multipart/form-data">
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
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Departments<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-9">
                                            <select class="form-control"onchange="department_designation_check()" name="department_id" id="department_id" data-validation="required">
                                                <option value="<?php echo $department['department_id'];?>"><?php echo $department['department_name'];?></option>
                                                <?php foreach ($departments as $key => $value) { ?>
                                                    <option value="<?php echo $value['department_id'];?>"><?php echo $value['department_name'];?></option>}
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Designations<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-9">
                                            <select class="form-control" onchange="department_designation_check()" name="designation_id" id="designation_id" data-validation="required">
                                                <option value="<?php echo $position['position_id'];?>"><?php echo $position['position_name'];?></option>
                                                <?php foreach ($positions as $key => $value) { ?>
                                                    <option value="<?php echo $value['position_id'];?>"><?php echo $value['position_name'];?></option>}
                                                <?php } ?>
                                            </select>
                                            <div id="error_message"></div>
                                        </div>
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
                            					<button type="submit" name="submit" value="submit" class="btn btn-success float-right">Submit</button>
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script type="text/javascript">
    $.validate(
    {
        modules : 'location, date, security, file',
    });
    function department_designation_check()
    {
        var department_id=$('#department_id').val();
        var designation_id=$('#designation_id').val();
        if(department_id!='' && designation_id!='')
        {
            $.ajax(
            {
                url:'<?php echo SURL.'designation/department_designation_check'?>',
                type:'POST',
                data:{department_id:department_id,designation_id:designation_id},
                success:function(data)
                {
                    if(data== 1)
                    {
                        $('#department_id').addClass('error');
                        $('#designation_id').addClass('error');
                        $('#department_id').css('border-color','rgb(185, 74, 72)');
                        $('#designation_id').css('border-color','rgb(185, 74, 72)');
                        $('#error_message').html('<span class="help-block form-error" style="color:#e73d4a;">Department Designation already assigned!</span>');
                        $(':input[type="submit"]').prop('disabled', true);

                    }
                    else
                    {
                        $('#department_id').removeClass('error');
                        $('#designation_id').removeClass('error');
                        $('#department_id').css('border-color','#208992');
                        $('#designation_id').css('border-color','#208992');
                        $('#error_message').html('');
                        $(':input[type="submit"]').prop('disabled', false);
                    }
                }
            })
        }
    }
</script>  