<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo SURL;?>school/admin_dashboard">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Edit Level</span>
        </li>
    </ul>
</div>
<h3 class="page-title">Edit Level</h3>
<div class="portlet light bordered ">
    <div class="portlet-title">
        <div class="caption font-green-seagreen">
            <i class="fa fa-user font-green-seagreen"></i>
            <span class="caption-subject bold uppercase">Edit Level</span>
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
        <form action="<?php echo SURL.'level/edit_level/'.$levels['level_id'];?>" id="" class="form-horizontal" method="post" enctype="multipart/form-data">
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
                                        <label class="control-label col-md-3">Level Name<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i> 
                                                    <input type="text" class="form-control" id="level_name" name="level_name" onchange="level_name_check()"  value="<?php echo $levels['level_name']; ?>" data-validation="required">
                                                    <span id="error_message"></span>
                                                    <?php echo form_error('level_name');?>
                                                </div>
                                            </div>
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
    function level_name_check()
    {
        var name=$('#level_name').val();
        if(name !='')
        {
            $.ajax(
            {
                url:'<?php echo SURL.'level/level_name_check'?>',
                type:'POST',
                data:{level_name:name},
                success:function(data)
                {
                    if(data== 1)
                    {
                        $('#level_name').addClass('error');
                        $('#level_name').css('border-color','rgb(185, 74, 72)');
                        $('#error_message').html('<span class="help-block form-error" style="color:#e73d4a;">Level Name already exits!</span>');
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