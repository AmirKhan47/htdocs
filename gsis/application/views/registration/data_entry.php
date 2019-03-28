<div class="page-bar table-bordered" style="margin-bottom: 5px;">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo SURL.'admin/registeredStudents/'; ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?php echo SURL.'admin/registeredStudents/'; ?>">Detailed Data Entry</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Challan History</span>
        </li>
    </ul>
</div>
<div class="portlet light bordered bg-danger pt-0" style="padding-left: 0px;padding-top: 20px">
    <div class="portlet-body flip-scroll" style="padding-top: 0px;">
        <div class="h3 text-uppercase" style="margin-top: 0px;"><b>Challan History</b>
        </div>
        <table class="table table-bordered table-striped table-condensed flip-content">
            <thead class="flip-content">
                <tr>
                    <th> Date Created </th>
                    <th> Due Date </th>
                    <th> Date Submitted </th>
                    <th> Amount Sumbitted</th>
                    <th> Bank Submitted</th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>     
                <?php
                    if(!$challans)
                    {
                    
                    }
                    else
                    {
                        foreach ($challans as $challan)
                        {
                            echo '<tr>';
                            echo '<input type="hidden" id="challan_id" value="'.$challan['id'].'">';
                            echo '<td>'.$challan['challan_date_created'].'</td>';
                            echo '<td>'.$challan['challan_due_date'].'</td>';
                            echo '<td>'.$challan['challan_date_submitted'].'</td>';
                            echo '<td>'.$challan['challan_amount_submitted'].'</td>';
                            echo '<td>'.$challan['challan_bank_submitted'].'</td>';
                            echo '<td>';
                            echo '<a style="color:white;" href="'.base_url().'challan/edit/'.$challan['id'].'">
                                    <button type="button" class="btn btn-circle btn-primary btn-xs">
                                        Edit
                                    </button>
                                </a>';
                                
                            echo '
                                    <a style="color:white;" href="'.base_url().'challan/view/'.$challan['id'].'">
                                        <button type="button" class="btn btn-circle btn-info btn-xs">
                                            View
                                        </button>
                                    </a>
                                ';
                    
                                echo '
                                    <a style="color:white;" href="'.base_url().'admin/submission_details_edit/'.$challan['id'].'/'.$student_id.'">
                                        <button type="button" class="btn btn-circle btn-success btn-xs">
                                            Enter Payment Details
                                        </button>
                                    </a>
                                ';
                    
                            echo '</td>';
                            echo '</tr>';
                        }
                    }
                    ?>
            </tbody>
        </table>
    </div>
</div>
<?php 
    if ($challans)
    {
    
    }
    else
    {
?>
<div class="portlet-body table-bordered">
    <h3 class="text-uppercase"> <b>Challan Form</b> </h3>
    <form action="<?php echo base_url(); ?>challan/get_fee_structure_type" id="form_sample_17" class="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="form-group">
                        <label class="control-label col-md-2">Type<span class="required" aria-required="true">*</span></label>
                        <div class="col-md-4">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <select onchange="$('#type_btn').click()" type="text" data-rule-required="true" id="fee_structure_type" name="fee_structure_type" class="form-control"  value="">
                                    <option value="<?php echo $fee_structure['fee_structure_type']; ?>" selected><?php echo $fee_structure['fee_structure_type']; ?>
                                    <option value="New">New</option>
                                    <option value="Old">Old</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="form-group">
                        <!-- <label class="control-label col-md-2"></label> -->
                        <div class="col-md-2">
                        <input type="submit" id="type_btn" class="form-group btn btn-primary" name="submit" value="submit" style="display: none;">
                    </div>
                </div>
                </div>
            </div>
        </div>
    </form>
    <hr>
    <form action="<?php echo base_url(); ?>challan/create" id="form_sample_16" class="form-horizontal" method="post" enctype="multipart/form-data">
        <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
        <input type="hidden" name="fee_structure_id" value="<?php echo $fee_structure['fee_structure_id']; ?>">
        <div class="mt-0">
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button> You have some form errors. Please check below.
            </div>
            <div class="alert alert-success display-hide">
                <button class="close" data-close="alert"></button> Your form validation is successful!
            </div>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="alert alert-block alert-info fade in mb-0">
                <p><b>'<span style="color:red;">*</span>' fields are compulsory.</b></p>
            </div>
            <div class="row" style="margin-left: 0px;margin-right: 0px">
                <div class="col-md-11">
                    <!-- <div class="row">
                        <br/>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Type<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8">
                                        <div class="input-icon right">
                                            <i class="fa"></i>
                                            <select type="text" data-rule-required="true" id="fee_structure_type" name="fee_structure_type" class="form-control"  value="">
                                                <option value="<?php echo $fee_structure['fee_structure_type']; ?>" selected><?php echo $fee_structure['fee_structure_type']; ?>
                                                <option value="New">New</option>
                                                <option value="Old">Old</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="row">
                        <br/>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label col-md-3"><b>Addmission Fee</b><span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" pattern="[-+]?[0-9]*[.,]?[0-9]+" data-rule-required="true" data-rule-minlength="1" data-rule-maxlength="11"  id="admission_fee" name="admission_fee" class="form-control" placeholder="" value="<?php echo $fee_structure['admission_fee']; ?>" readonly>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <i class="fa"></i>
                                            <input type="text" pattern="[-+]?[0-9]*[.,]?[0-9]+" max='100' data-rule-minlength="1" data-rule-maxlength="11" id="admission_fee_discount" name="admission_fee_discount" class="form-control" placeholder="%" value="0">
                                            <span class="input-group-addon">
                                                <i class="fa fa-percent font-red">%</i>
                                            </span>
                                        </div>
                                        <span class="help-block">Discount Percentage</span>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" data-rule-required="true" pattern="[-+]?[0-9]*[.,]?[0-9]+" data-rule-minlength="1" data-rule-maxlength="11"  id="admission_fee_total" name="admission_fee_total" class="form-control" placeholder="Total" value="<?php echo $fee_structure['admission_fee']; ?>">
                                                <span class="help-block">Final Amount</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label col-md-3"><b>Security (Refundable)</b><span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" pattern="[-+]?[0-9]*[.,]?[0-9]+" data-rule-required="true" data-rule-minlength="1" data-rule-maxlength="11" id="security" name="security" class="form-control" placeholder="" value="<?php echo $fee_structure['security']; ?>" readonly>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <i class="fa"></i>
                                            <input type="text" pattern="[-+]?[0-9]*[.,]?[0-9]+" max='100' data-rule-minlength="1" data-rule-maxlength="11"  id="security" name="security_discount" class="form-control" placeholder="%" value="0">
                                            <span class="input-group-addon">
                                                <i class="fa fa-percent font-red">%</i>
                                            </span>
                                        </div>
                                        <span class="help-block">Discount Percentage</span>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" data-rule-required="true" pattern="[-+]?[0-9]*[.,]?[0-9]+" data-rule-minlength="1" data-rule-maxlength="11"  id="security" name="security_total" class="form-control" placeholder="Total" value="<?php echo $fee_structure['security']; ?>">
                                                <span class="help-block">Final Amount</span>
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
                                    <label class="col-md-3 control-label"><b>Tution Fee</b><span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" id="tution_fee" data-rule-minlength="1" data-rule-maxlength="11" name="tution_fee" data-rule-required="true" value="<?php echo $fee_structure['tution_fee']; ?>" class="form-control" readonly>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                                <i class="fa"></i>
                                                <input type="text" pattern="[-+]?[0-9]*[.,]?[0-9]+" max='100' data-rule-minlength="1" data-rule-maxlength="11"  id="tution_fee_discount" name="tution_fee_discount" class="form-control" placeholder="%" value="0">
                                                <span class="input-group-addon">
                                                <i class="fa fa-percent font-red">%</i>
                                            </span>
                                        </div>
                                        <span class="help-block">Discount Percentage</span>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" data-rule-required="true" pattern="[-+]?[0-9]*[.,]?[0-9]+" data-rule-minlength="1" data-rule-maxlength="11"  id="tution_fee_total" name="tution_fee_total" class="form-control" placeholder="Total" value="<?php echo $fee_structure['tution_fee']; ?>">
                                                <span class="help-block">Final Amount</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label col-md-3"><b>Annual Stationery Fund</b><span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" pattern="[-+]?[0-9]*[.,]?[0-9]+" data-rule-minlength="1" data-rule-maxlength="11"  id="stationary_fund" name="stationary_fund" class="form-control" placeholder="" value="<?php echo $fee_structure['stationary_fund']; ?>" readonly>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                                <i class="fa"></i>
                                                <input type="text" pattern="[-+]?[0-9]*[.,]?[0-9]+" max='100' data-rule-minlength="1" data-rule-maxlength="11"  id="stationary_fund_discount" name="stationary_fund_discount" class="form-control" placeholder="%" value="0">
                                                <span class="input-group-addon">
                                                <i class="fa fa-percent font-red">%</i>
                                            </span>
                                        </div>
                                        <span class="help-block">Discount Percentage</span>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" data-rule-required="true" pattern="[-+]?[0-9]*[.,]?[0-9]+" data-rule-minlength="1" data-rule-maxlength="11"  id="stationary_fund_total" name="stationary_fund_total" class="form-control" placeholder="Total" value="<?php echo $fee_structure['stationary_fund']; ?>">
                                                <span class="help-block">Final Amount</span>
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
                                    <label class="control-label col-md-3"><b>Annual Fund</b><span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" pattern="[-+]?[0-9]*[.,]?[0-9]+" data-rule-minlength="1" data-rule-maxlength="11"  id="annual_fund" name="annual_fund" class="form-control" placeholder="" value="<?php echo $fee_structure['annual_fund']; ?>" readonly>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <input type="text" pattern="[-+]?[0-9]*[.,]?[0-9]+" max='100' data-rule-minlength="1" data-rule-maxlength="11"  id="annual_fund_discount" name="annual_fund_discount" class="form-control" placeholder="%" value="0">
                                            <span class="input-group-addon">
                                                <i class="fa fa-percent font-red">%</i>
                                            </span>
                                        </div>
                                        <span class="help-block">Discount Percentage</span>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" data-rule-required="true" pattern="[-+]?[0-9]*[.,]?[0-9]+" data-rule-minlength="1" data-rule-maxlength="11"  id="annual_fund_total" name="annual_fund_total" class="form-control" placeholder="Total" value="<?php echo $fee_structure['annual_fund']; ?>">
                                                <span class="help-block">Final Amount</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            	<div class="form-group">
                                    <label class="control-label col-md-3"><b>Due Date</b><span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <span class="input-icon right">
                                                <i class="fa"></i>
                                                <select class="_58mq" name="challan_due_day" data-rule-required="true" >
                                                    <option value="">Day</option>
                                                    <?php 
                                                        for ($i=1; $i <= 31; $i++)
                                                        { 
                                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </span>
                                            <span class="input-icon right">
                                                <i class="fa"></i>
                                                <select class="_58mq" name="challan_due_month" data-rule-required="true">
                                                    <option value="">Month</option>
                                                    <option value="1">Jan</option>
                                                    <option value="2">Feb</option>
                                                    <option value="3">Mar</option>
                                                    <option value="4">Apr</option>
                                                    <option value="5">May</option>
                                                    <option value="6">Jun</option>
                                                    <option value="7">Jul</option>
                                                    <option value="8">Aug</option>
                                                    <option value="9">Sept</option>
                                                    <option value="10">Oct</option>
                                                    <option value="11">Nov</option>
                                                    <option value="12">Dec</option>
                                                </select>
                                            </span>
                                            <span class="input-icon right">
                                                <i class="fa"></i>
                                                <select class="_58mq" name="challan_due_year" data-rule-required="true">
                                                    <option value="">Year</option>
                                                    <?php 
                                                        $year = date("Y"); // get the year part of the current date
                                                        $minYear = $year + 50;
                                                        for ($i=$year; $i <= $minYear; $i++)
                                                        { 
                                                           echo '<option value="'.$i.'">'.$i.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </span>
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
                                    <label class="control-label col-md-3"><b>Fee Month</b><span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <span class="input-icon right">
                                                <i class="fa"></i>
                                                <select class="_58mq" name="challan_fee_month" data-rule-required="true">
                                                    <option value="">Month</option>
                                                    <option value="1">Jan</option>
                                                    <option value="2">Feb</option>
                                                    <option value="3">Mar</option>
                                                    <option value="4">Apr</option>
                                                    <option value="5">May</option>
                                                    <option value="6">Jun</option>
                                                    <option value="7">Jul</option>
                                                    <option value="8">Aug</option>
                                                    <option value="9">Sept</option>
                                                    <option value="10">Oct</option>
                                                    <option value="11">Nov</option>
                                                    <option value="12">Dec</option>
                                                </select>
                                            </span>
                                            <span class="input-icon right">
                                                <i class="fa"></i>
                                                <select class="_58mq" name="challan_fee_year" data-rule-required="true">
                                                    <option value="">Year</option>
                                                    <?php 
                                                        $year = date("Y"); // get the year part of the current date
                                                        $minYear = $year + 50;
                                                        for ($i=$year; $i <= $minYear; $i++) { 
                                                           echo '<option value="'.$i.'">'.$i.'</option>';
                                                        }
                                                        ?>
                                                </select>
                                            </span>
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
                                            <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" id="lab_ch" pattern="^[0-9]*$" name="lab_ch" data-rule-minlength="1" data-rule-maxlength="11" class="form-control" placeholder="" value="<?php echo $fee_structure['lab_charges']; ?>">
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
                                            <span class="input-group-addon">
                                            <i class="far fa-registered"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" pattern="^[0-9]*$" maxlength="11" id="exam_charges" name="exam_charges" data-validation="number" class="form-control" placeholder="" value="<?php echo $fee_structure['exam_charges']; ?>">
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
                                            <span class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" pattern="^[0-9]*$" data-rule-maxlength="11"  id="registration_charges" name="registration_charges" class="form-control" placeholder="" value="<?php echo $fee_structure['registration_charges']; ?>">
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
                                            <span class="input-group-addon">
                                            <i class="fa fa-map-marker"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" pattern="^[0-9]*$" data-rule-maxlength="11"  id="deferred" name="deferred" class="form-control" placeholder="" value="<?php echo $fee_structure['deferred']; ?>"/>
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
                                            <span class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" pattern="^[0-9]*$" data-rule-maxlength="11"  id="house_shirt" name="house_shirt" class="form-control" placeholder="" value="<?php echo $fee_structure['house_shirt']; ?>">
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
                                            <span class="input-group-addon">
                                            <i class="fa fa-map-marker"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" pattern="^[0-9]*$" data-rule-maxlength="11"  id="received" name="received" class="form-control" placeholder="" value="<?php echo $fee_structure['received']; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Monthly Security</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                            <i class="fa fa-credit-card"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" pattern="^[0-9]*$" id="monthly_security" name="monthly_security" data-rule-minlength="1" data-rule-maxlength="11" value="<?php echo $fee_structure['monthly_security']; ?>" class="form-control" >
                                                <span class="input-group-btn">
                                                </span>
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
                                    <label class="control-label col-md-4">Monthly Computer Charges</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                            <i class="fa fa-credit-card"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" pattern="^[0-9]*$" name="comp_ch" class="form-control" data-rule-minlength="1" data-rule-maxlength="11" id="comp_ch" value="<?php echo $fee_structure['computer_charges']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Remarks
                                    </label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                            <i class="fa fa-globe"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <textarea type="text" data-rule-maxlength="100" id="remarks" name="remarks" class="form-control" placeholder="" value=""></textarea>
                                            </div>
                                            <div class="help-block">
                                            </div>
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
                            <button type="submit" name="action" value="save" class="btn btn-md green-meadow"><i class="glyphicon glyphicon-ok-sign"></i>
                            Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php 
    }  
?>  
<script src="<?php echo base_url(). 'assets/global/plugins/respond.min.js'?>"></script>
<script src="<?php echo base_url(). 'assets/global/plugins/excanvas.min.js'?>"></script> 
<!-- BEGIN CORE PLUGINS -->
<script src="<?php echo base_url(). 'assets/global/plugins/jquery.min.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url(). 'assets/global/plugins/bootstrap/js/bootstrap.min.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url(). 'assets/global/plugins/js.cookie.min.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url(). 'assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url(). 'assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url(). 'assets/global/plugins/jquery.blockui.min.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url(). 'assets/global/plugins/uniform/jquery.uniform.min.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url(). 'assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js'?>" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?php echo base_url(). 'assets/global/scripts/app.min.js'?>" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?php echo base_url(). 'assets/global/plugins/jquery-validation/js/jquery.validate.min.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url(). 'assets/global/plugins/jquery-validation/js/additional-methods.min.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url(). 'assets/layouts/layout/scripts/demo.min.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url(). 'assets/layouts/global/scripts/quick-sidebar.min.js'?>" type="text/javascript"></script>  
<script src="<?php echo base_url(). 'assets/pages/scripts/validation.js'?>" type="text/javascript"></script>
<script type="text/javascript">
    var $price  = $("input[name='admission_fee']"),
    $percentage = $("input[name='admission_fee_discount']").on("input", calculatePrice),
    $discount   = $("input[name='admission_fee_total']").on("input", calculatePerc);
    function calculatePrice()
    {
        var percentage = $(this).val();
        var price      = $price.val();
        var calcPrice  = (price - ( price * percentage / 100 )).toFixed(2);
        $discount.val( calcPrice );
    }
    function calculatePerc()
    {
        var discount = $(this).val();
        var price    = $price.val();
        var calcPerc =  (100 - (discount * 100 / price)).toFixed(2);
        $percentage.val( calcPerc );
    }
</script>
<script type="text/javascript">
    // security
    var $price1  = $("input[name='security']"),
    $percentage1 = $("input[name='security_discount']").on("input", calculatePrice1),
    $discount1   = $("input[name='security_total']").on("input", calculatePerc1);
    function calculatePrice1()
    {
        var percentage1 = $(this).val();
        var price1      = $price1.val();
        var calcPrice1  = (price1 - ( price1 * percentage1 / 100 )).toFixed(2);
        $discount1.val( calcPrice1 );
    }
    function calculatePerc1()
    {
        var discount1 = $(this).val();
        var price1    = $price1.val();
        var calcPerc =  (100 - (discount1 * 100 / price1)).toFixed(2);
        $percentage1.val( calcPerc );
    }
</script>
    <!-- tution_fee -->
<script type="text/javascript">
    var $price2  = $("input[name='tution_fee']"),
    $percentage2 = $("input[name='tution_fee_discount']").on("input", calculatePrice2),
    $discount2   = $("input[name='tution_fee_total']").on("input", calculatePerc2);
    
    function calculatePrice2()
    {
        var percentage2 = $(this).val();
        var price2      = $price2.val();
        var calcPrice2  = (price2 - ( price2 * percentage2 / 100 )).toFixed(2);
        $discount2.val( calcPrice2 );
    }

    function calculatePerc2()
    {
        var discount2 = $(this).val();
        var price2    = $price2.val();
        var calcPerc =  (100 - (discount2 * 100 / price2)).toFixed(2);
        $percentage2.val( calcPerc );
    }
</script>
<script type="text/javascript">
    var $price3  = $("input[name='annual_fund']"),
    $percentage3 = $("input[name='annual_fund_discount']").on("input", calculatePrice3),
    $discount3   = $("input[name='annual_fund_total']").on("input", calculatePerc3);
    
    function calculatePrice3()
    {
        var percentage3 = $(this).val();
        var price3      = $price3.val();
        var calcPrice3  = (price3 - ( price3 * percentage3 / 100 )).toFixed(2);
        $discount3.val( calcPrice3 );
    }

    function calculatePerc3()
    {
        var discount3 = $(this).val();
        var price3    = $price3.val();
        var calcPerc =  (100 - (discount3 * 100 / price3)).toFixed(2);
        $percentage3.val( calcPerc );
    }
</script>
<script type="text/javascript">
    var $price4  = $("input[name='stationary_fund']"),
    $percentage4 = $("input[name='stationary_fund_discount']").on("input", calculatePrice4),
    $discount4   = $("input[name='stationary_fund_total']").on("input", calculatePerc4);
    
    function calculatePrice4()
    {
        var percentage4 = $(this).val();
        var price4      = $price4.val();
        var calcPrice4  = (price4 - ( price4 * percentage4 / 100 )).toFixed(2);
        $discount4.val( calcPrice4 );
    }

    function calculatePerc4()
    {
        var discount4 = $(this).val();
        var price4    = $price4.val();
        var calcPerc =  (100 - (discount4 * 100 / price4)).toFixed(2);
        $percentage4.val( calcPerc );
    }
</script>
</body>
</html>