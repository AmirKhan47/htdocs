<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo SURL;?>school/admin_dashboard">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Add Fee Structure</span>
        </li>
    </ul>
</div>
<h3 class="page-title">Add Fee Structure</h3>
<div class="portlet light bordered ">
    <div class="portlet-title">
        <div class="caption font-green-seagreen">
            <i class="fa fa-user font-green-seagreen"></i>
            <span class="caption-subject bold uppercase">Add Fee Structure</span>
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
        <form action="<?php echo SURL.'fee_structure/add_fee_structure/';?>" id="form_sample_16" class="form-horizontal" method="post" enctype="multipart/form-data">
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
                                                <select type="text" data-rule-required="true" id="class_id" name="class_id" class="form-control"  value="">
                                                    <option value="">Select Class</option>
                                                    <?php foreach ($classes as $class) {
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
                                                    <input type="text" pattern="^[0-9]*$" data-rule-required="true" data-rule-minlength="1" data-rule-maxlength="11"  id="addmission_fee" name="admission_fee" class="form-control" placeholder="" value="">
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
                                                    <input type="text" pattern="^[0-9]*$" data-rule-required="true" data-rule-minlength="1" data-rule-maxlength="11" id="security" name="security" class="form-control" placeholder="" value="">
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
                                                    <input type="text" id="fee" data-rule-minlength="1" data-rule-maxlength="11" name="tution_fee" data-rule-required="true" value="" class="form-control" >
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
                                        <label class="control-label col-md-4">Annual Fund<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" data-rule-required="true" pattern="^[0-9]*$" data-rule-minlength="1" data-rule-maxlength="11"  id="annual_fund" name="annual_fund" class="form-control" placeholder="" value="">
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
                                        <label class="control-label col-md-4">Annual Stationery Fund</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" pattern="^[0-9]*$" data-rule-minlength="1" data-rule-maxlength="11" id="stationary_fund" name="stationary_fund" class="form-control" placeholder="" value="">
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
                                                    <input type="text" pattern="^[0-9]*$" id="monthly_security" name="monthly_security" data-rule-minlength="1" data-rule-maxlength="11" value="" class="form-control" >
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
                                        <label class="control-label col-md-4">Monthly lab Charges</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" id="lab_charges" pattern="^[0-9]*$" name="lab_charges" data-rule-minlength="1" data-rule-maxlength="11" class="form-control" placeholder="" value="">
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
                                                    <input type="text" pattern="^[0-9]*$" maxlength="11" id="exam_charges" name="exam_charges" class="form-control" placeholder="">
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
                                                    <input type="text" pattern="^[0-9]*$" data-rule-maxlength="11"  id="registration_charges" name="registration_charges" class="form-control" placeholder="" value="">
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
                                                    <input type="text" pattern="^[0-9]*$" data-rule-maxlength="11"  id="deferred" name="deferred" class="form-control" placeholder="" value=""/>
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
                                                    <input type="text" pattern="^[0-9]*$" data-rule-maxlength="11"  id="house_shirt" name="house_shirt" class="form-control" placeholder="" value="">
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
                                                    <input type="text" pattern="^[0-9]*$" data-rule-maxlength="11"  id="received" name="received" class="form-control" placeholder="" value=""/>
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
                                                    <input type="text" pattern="^[0-9]*$" name="computer_charges" class="form-control" data-rule-minlength="1" data-rule-maxlength="11" id="computer_charges" value="">
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