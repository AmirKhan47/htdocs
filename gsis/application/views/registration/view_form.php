        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="<?php echo SURL;?>school/admin_dashboard">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo SURL;?>admin/portal">Pending Registration</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Detail</span>
                </li>
            </ul>
        </div>
        <h3 class="page-title"> REGISTRATION FORM </h3>
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green-seagreen">
                    <i class="fa fa-user font-green-seagreen"></i>
                    <span class="caption-subject bold uppercase"> REGISTRATION FORM </span>
                </div> 
                <div class="actions">
                </div>
            </div>
            <div id="divToPrint" class="portlet-body form">
                <form action="<?php echo base_url();?>admin/updateStudent" id="form_sample_16" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="student_id" value="<?php echo $student['student_id'];?>">
                    <div class="form-body">
                    <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                    <div class="alert alert-success display-hide">
                        <button class="close" data-close="alert"></button> Your form validation is successful! 
                    </div>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="alert alert-block alert-info fade in">
                        <p><b>'<span style="color:red;">*</span>' fields are compulsory.</b></p>
                    </div>                  
                <div class="row">
                    <div class="col-md-11 col-xs-11">
                        <div class="row">
                            <div class="col-md-6 col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-xs-4">Student's Name<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-8 col-xs-8">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" style="text-transform: uppercase;" data-rule-required="true" data-rule-minlength="3" data-rule-maxlength="40" pattern="[a-zA-Z0-9\s]+" id="name" name="student_name" class="form-control" placeholder="Student Name" value="<?php echo $student['student_name']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-xs-4">CNIC/B.Form No</label>
                                    <div class="col-md-8 col-xs-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-credit-card"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text"  id="cnic2" maxlength="15" minlength="15" data-rule-required="true" name="student_national_id" class="form-control" placeholder="XXXXX-XXXXXXX-X" value="<?php echo $student['student_national_id']; ?>">
                                            </div>
                                        </div>
                                        <div id="id_error" style="display: none;">
                                            <div class="alert alert-danger" id="student_national_id_error">
                                        </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-xs-4">Father's Name<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8 col-xs-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" style="text-transform: uppercase;"  id="guardian_name"  data-rule-required="true" name="guardian_name" class="form-control" placeholder="Father Name" value="<?php echo $father['guardian_name']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-xs-4">Father's CNIC<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8 col-xs-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-credit-card"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text"  name="guardian_national_id" data-rule-required="true" placeholder="xxxxx-xxxxxxx-x" class="form-control" maxlength="15" id="cnic" value="<?php echo $father['guardian_national_id']; ?>" required>
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
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-xs-4">Mother's Name<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8 col-xs-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" style="text-transform: uppercase;"  id="guardian_name"  data-rule-required="true" name="guardian_name1" class="form-control" placeholder="Mother Name" value="<?php echo $mother['guardian_name']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-xs-4">Mother's CNIC<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8 col-xs-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-credit-card"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" data-rule-required="true" id="cnic" name="guardian_national_id1" placeholder="xxxxx-xxxxxxx-x" class="form-control" maxlength="15" minlength="15" value="<?php echo $mother['guardian_national_id']; ?>" required>
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
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-xs-4">Gender<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8 col-xs-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user-md"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <select class="form-control" id="gender" name="student_gender" required>
                                                   <option value="">Select</option>
                                                    <option value="male"
                                                        <?php
                                                            if($student['student_gender']=='male')
                                                            {
                                                                echo 'selected';
                                                            }
                                                        ?>
                                                        >
                                                        Male
                                                    </option>
                                                   <option value="female" <?php if($student['student_gender']=='female')
                                                   {
                                                    echo 'selected';
                                                   } ?>>Female</option>
                                                             </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-xs-4">Date of Birth</label>
                                    <div class="col-md-8 col-xs-8">
                                        <div class="input-group">  
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <select class="_58mq" name="student_date_of_birth_day" data-rule-required="true" >
                                                    <option value="<?php echo $student_date_of_birth_day ;?>">
                                                        <?php echo $student_date_of_birth_day ;?>
                                                    </option>
                                                    <?php 
                                                    for ($i=1; $i <= 31; $i++)
                                                    { 
                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <select class="_58mq" name="student_date_of_birth_month" data-rule-required="true" >
                                                    <option value="<?php echo $student_date_of_birth_month ;?>">
                                                        <?php echo $student_date_of_birth_month ;?>
                                                    </option><option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sept</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>
                                                </select>
                                                <select class="_58mq" name="student_date_of_birth_year" data-rule-required="true">
                                                   <option value="<?php echo $student_date_of_birth_year ;?>">
                                                        <?php echo $student_date_of_birth_year ;?>
                                                    <?php 
                                                    $year = date("Y"); // get the year part of the current date
                                                    $minYear = $year - 50;
                                                    for ($i=$year; $i >= $minYear; $i--) { 
                                                       echo '<option value="'.$i.'">'.$i.'</option>';
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
                        <div class="row">
                            <div class="col-md-6 col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-xs-4">Nationality<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-8 col-xs-8">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-flag"></i>
                                                </span>
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <select class="form-control" data-rule-required="true" id="nationality" name="student_nationality">
                                                    
                                                      <option value="<?php echo $student['student_nationality']; ?>"><?php echo $student['student_nationality']; ?></option>
                                                       <option value="Pakistan">Pakistan</option>
                                                        <option value="Foreign">Foreign</option>


                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        
                            <div class="col-md-6 col-xs-12 col-sm-6">
                                <div class="form-group">
                                     <div class="form-group">
                                    <label class="control-label col-md-4 col-xs-4">Place Of Birth </label>
                                    <div class="col-md-8 col-xs-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-globe"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" pattern="[a-zA-Z0-9\s]+" name="student_place_of_birth" id="pob" class="form-control" placeholder="" value="<?php echo $student['student_place_of_birth']; ?>">
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
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-xs-4">Religion</label>
                                    <div class="col-md-8 col-xs-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-credit-card"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <select class="form-control"  id="student_religion" name="student_religion">
                                           <option value="<?php echo $student['student_religion']; ?>"><?php echo $student['student_religion']; ?></option>
                                           <option value="Muslim">Muslim</option>
                                           <option value="Other">Other</option>
                                           
                                                     </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-xs-4">Email:<span class="required" aria-required="true">*</span> </label>
                                    <div class="col-md-8 col-xs-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope-o"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="email" data-rule-required="true"  name="contact_email" class="form-control"  value="<?php echo $student['contact_email']; ?>">
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
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-xs-4">Office Phone</label>
                                    <div class="col-md-8 col-xs-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" id="phone"  maxlength="12" name="contact_line" class="form-control" data-validation="number" value="<?php echo $student['contact_line']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-xs-4">Mobile:<span class="required" aria-required="true">*</span> </label>
                                    <div class="col-md-8 col-xs-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" minlength="11" maxlength="12" id="mobile" data-rule-required="true" name="contact_cell" data-validation="number" class="form-control" placeholder="" value="<?php echo $student['contact_cell']; ?>">
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
                        <div class="col-md-4">
                           <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label col-md-4">House/Street:<span class="required" aria-required="true">*</span> </label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-map-marker"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <textarea type="text" data-rule-required="true" maxlength="30" name="address_local" class="form-control"><?php echo $student['address_local']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Sector:<span class="required" aria-required="true">*</span> </label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-map-marker"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <textarea type="text" data-rule-required="true" maxlength="30" name="address_sector" class="form-control"><?php echo $student['address_sector']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label col-md-4">City:<span class="required" aria-required="true">*</span> </label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-map-marker"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <textarea type="text" data-rule-required="true" maxlength="30" name="address_city" class="form-control"><?php echo $student['address_city']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-xs-4">Reason for Leaving</label>
                                    <div class="col-md-8 col-xs-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-map-marker"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <textarea type="text" pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+"  name="registration_reason_for_leaving" class="form-control"><?php echo $student['registration_last_school_reason_for_leaving']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-md-6 col-xs-12 col-sm-6">
                             <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-xs-4">Admission Required From<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8 col-xs-8">
                                        <div class="input-group">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <select class="_58mq" name="registration_required_from_day" data-rule-required="true" >
                                                    <option value="<?php echo $registration_required_from_day ;?>">
                                                        <?php echo $registration_required_from_day ;?>
                                                    </option>
                                                    <?php 
                                                    for ($i=1; $i <= 31; $i++) { 
                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <select class="_58mq" name="registration_required_from_month" data-rule-required="true" >
                                                    <option value="<?php echo $registration_required_from_month ;?>">
                                                        <?php echo $registration_required_from_month ;?>
                                                    </option><option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sept</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>
                                                </select>
                                                <select class="_58mq" name="registration_required_from_year" data-rule-required="true">
                                                    <option value="<?php echo $registration_required_from_year ;?>">
                                                        <?php echo $registration_required_from_year ;?>
                                                    </option>
                                                    <?php 
                                                    $year = date("Y"); // get the year part of the current date
                                                    $minYear = $year + 50;
                                                    for ($i=$year; $i <= $minYear; $i++) { 
                                                       echo '<option value="'.$i.'">'.$i.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-6 col-xs-12 col-sm-6">
                             <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-xs-4">Last School Attented<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8 col-xs-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                               <i class="fa fa-registered"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" data-rule-maxlength="80" name="registration_last_school_name" id="las" class="form-control" placeholder="" value="<?php echo $student['registration_last_school_name']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-xs-4">FROM</label>
                                    <div class="col-md-8 col-xs-8">
                                        <div class="input-group">
                                            <div class="input-icon float-right right">
                                                <i class="fa"></i>
                                                <select class="_58mq" name="registration_last_school_from_day" data-rule-required="true" >
                                                    <option value="<?php echo $registration_last_school_from_day ;?>">
                                                        <?php echo $registration_last_school_from_day ;?>
                                                    </option>
                                                    <?php 
                                                    for ($i=1; $i <= 31; $i++) { 
                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <select class="_58mq" name="registration_last_school_from_month" data-rule-required="true">
                                                    <option value="<?php echo $registration_last_school_from_month ;?>">
                                                        <?php echo $registration_last_school_from_month ;?>
                                                    </option><option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sept</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>
                                                </select>
                                                <select class="_58mq" name="registration_last_school_from_year" data-rule-required="true">
                                                    <option value="<?php echo $registration_last_school_from_year ;?>">
                                                        <?php echo $registration_last_school_from_year ;?>
                                                    </option>
                                                    <?php 
                                                    $year = date("Y")-1; // get the year part of the current date
                                                    $minYear = $year - 50;
                                                    for ($i=$year; $i >= $minYear; $i--) { 
                                                       echo '<option value="'.$i.'">'.$i.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 col-sm-6">
                             <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-xs-4">To</label>
                                    <div class="col-md-8 col-xs-8">
                                        <div class="input-group">
                                            
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <select class="_58mq" name="registration_last_school_to_day" data-rule-required="true" >
                                                    <option value="<?php echo $registration_last_school_to_day ;?>">
                                                        <?php echo $registration_last_school_to_day ;?>
                                                    </option>
                                                    <?php 
                                                    for ($i=1; $i <= 31; $i++) { 
                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <select class="_58mq" name="registration_last_school_to_month" data-rule-required="true" >
                                                    <option value="<?php echo $registration_last_school_to_month ;?>">
                                                        <?php echo $registration_last_school_to_month ;?>
                                                    </option><option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sept</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>
                                                </select>
                                                <select class="_58mq" name="registration_last_school_to_year" data-rule-required="true">
                                                    <option value="<?php echo $registration_last_school_to_year ;?>">
                                                        <?php echo $registration_last_school_to_year ;?>
                                                    </option>
                                                    <?php 
                                                    $year = date("Y"); // get the year part of the current date
                                                    $minYear = $year - 50;
                                                    for ($i=$year; $i >= $minYear; $i--) { 
                                                       echo '<option value="'.$i.'">'.$i.'</option>';
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
                    <div class="row">
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-xs-4">Class<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8 col-xs-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <select type="text" data-rule-required="true" id="class" name="class_name" class="form-control"  value="<?php $student['class_id']; ?>">
                                                    <?php foreach ($classes as $class) 
                                                        {
                                                            echo '<option value="'.$class['id'].'"';
                                                            if($class['id']==$student['class_id'])
                                                            {
                                                                echo "selected";
                                                            }
                                                            echo '>'.$class['class_name'].'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-xs-4">Branch<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8 col-xs-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <select type="text" data-rule-required="true" id="branch" id="branch" class="form-control" name="branch_name" value="<?php $student['branch_id']; ?>">
                                                     <?php foreach ($branches as $branch) {
                                                        echo '<option value="'.$branch['id'].'"';
                                                        if($branch['id']==$student['branch_id']){echo "selected";}
                                                        echo '>'.$branch['branch_name'].'</option>';
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
                    <div class="col-md-6 col-xs-12 col-sm-6 col-sm-offset-3">
                        <div class="form-group">
                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-xs-4">Test Result<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8 col-xs-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-language"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <select class="form-control" data-rule-required="true" id="test_result" name="registration_test" required>
                                                    <option value="<?php echo $student['registration_test']?>"><?php echo $student['registration_test']?></option>
                                                    <option value="Fail">Fail</option>
                                                    <option value="Pass">Pass</option>        
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-xs-4">Test Remarks<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8 col-xs-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-language"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <textarea class="form-control" data-rule-required="true" minlength="3" maxlength="200" id="registration_test_remarks" name="registration_test_remarks" rows="3"><?php echo $student['registration_test_remarks'];?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-xs-4">Registration Fee</label>
                                    <div class="col-md-8 col-xs-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-registered"></i>
                                            </span>
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" id="reg"  minlength="2" maxlength="10" name="registration_fee" class="form-control" data-validation="number" value="<?php echo $student['registration_fee']; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-hover">
                    <label class="control-label col-md-4 col-xs-4"><b style="float: left">Siblings Registered With Same CNIC:</b></label>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Registration No.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(!$siblings)
                            {}
                            else
                            {
                                $i=1;
                                foreach($siblings as $sibling)
                                {
                                    echo '<tr>';
                                    echo '<th scope="row">'.$i++.'</th>';
                                    echo '<td class="uppercase">'.$sibling['student_name'].'</td>';
                                    echo '<td>'.$sibling['student_roll_no'].'</td>';
                                    echo '</tr>';
                                } 
                            }
                            ?>
                        </tbody>
                    </table>
                                        <div class="row">
                                                        </div>
                                                         <div class="row">
                                                            <div class="col-md-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-7 col-xs-7" style="margin-bottom: 20px"><u><strong>Undertaking</u></strong></label>
                                                                        <div class="col-md-12 col-xs-12">
                                                                            <div class="input-group">
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i>
                                                                                    <p    name="nationality" >
                                            I, ___________________________________ son/daughter/father/guardian of ___________________________________ hereby solemnly certify that the above particulars are correct to the best of my knowledge. I also affirm that I have carefully read and the student name, father name, date of birth and other information provided is correct and verified from present academic credentials/personal identification records i.e Matric/F.Sc/CNIC/B-Form. This may appear on academic credentials of GSIS. I take full responsibility, in case, any of the above particulars are found incorrect/ false.
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 col-xs-12">
                                                                     <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-11 col-xs-11 " style="text-decoration: overline;">Parent/Guardian/Student Signature </label>
                                                                        <div class="col-md-8 col-xs-8">
                                                                            <div class="input-group">
                                                                               
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i>
                                                                               
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
                            <div class="col-md-offset-5 col-md-6 col-xs-12 col-sm-6">
                                
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><strong>Undertaking...?</strong></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        I ___________  have carefully read and understood the rules,regulations and requirements of the school and hereby agree to abide them.I further agree and responsible to provide all the documents required to fulfil the admission criteria and to finanacial terms of the school and agree that my child take part in all school activities and will strictly follow the school displine policy.
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">I Agree</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <button type="submit" id="button1" formaction="<?php echo SURL;?>admin/update_Student" class="btn btn-primary">
                                    Update
                                </button>
                                <a href="<?php echo SURL.'admin/undertaking_print/'.$student['student_id'];?>">                                  
                                    <button type="button" title="Select Test Result First" class="btn btn-md green-meadow" id="mybutton">
                                        <i class="fa fa-print"></i>
                                    Print
                                    </button>
                                </a>
                                <button type="submit" id="button2" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="<?php echo base_url(). 'assets/global/plugins/respond.min.js'?>"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/excanvas.min.js'?>"></script>                
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
        <script src="<?php echo base_url(). 'assets/layouts/layout/scripts/layout.min.js'?>" type="text/javascript"></script>
        <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script> 
        <script src="<?php echo base_url(). 'assets/global/scripts/datatable.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/datatables/datatables.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/pages/scripts/table-datatables-responsive.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/pages/scripts/validation.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'assets/js/jquery.maskedinput.min.js' ?>"></script>
        <script src="<?php echo base_url().'assets/js/jQuery.print.js'?>"></script>
        <!-- <script>
            $(document).ready(function() 
            {
                $('#mybutton').on('click',function()
                {
                    // $('#printPageButton').attr('disabled', true);
                    $('#button2').attr('disabled', false);
                });
            });
        </script> -->
        <script>
            $(document).ready(function()
            {
                $("input[name='student_national_id']").mask('99999-9999999-9');
                $("input[name='guardian_national_id']").mask('99999-9999999-9').bind("blur", function ()
                {
                    // force revalidate on blur.
                    var frm = $(this).parents("form");
                    // if form has a validator
                    if ($.data( frm[0], 'validator' ))
                    {
                      var validator = $(this).parents("form").validate();
                      validator.settings.onfocusout.apply(validator, [this]);
                    }
                });
                 $("input[name='guardian_national_id1']").mask('99999-9999999-9').bind("blur", function () {
            // force revalidate on blur.
            var frm = $(this).parents("form");
            // if form has a validator
            if ($.data( frm[0], 'validator' )) {
              var validator = $(this).parents("form").validate();
              validator.settings.onfocusout.apply(validator, [this]);
            }
          });
                $("input[name='contact_cell']").mask('0399-9999999');
            });
        </script>
       <!--  <script type="text/javascript">
            $(document).ready(function() {
                $("#page").find('printPageButton').on('click', function() {
                //Print ele4 with custom options
                $("#page").print({
                    //Use Global styles
                    globalStyles : false,
                    //Add link with attrbute media=print
                    mediaPrint : false,
                    //Custom stylesheet
                    stylesheet : "http://fonts.googleapis.com/css?family=Inconsolata",
                    //Print in a hidden iframe
                    iframe : false,
                    //Don't print this
                    noPrintSelector : ".avoid-this",
                    //Add this at top
                    prepend : "Hello World!!!<br/>",
                    //Add this on bottom
                    append : "<br/>Buh Bye!",
                    //Log to console when printing is done via a deffered callback
                    deferred: $.Deferred().done(function() { console.log('Printing done', arguments); })
                });
            });
            });
        </script> -->
        <script>
            function PrintElem()
            {
                alert(document.getElementsByTagName('head')[0].innerHTML);
                var elem='divToPrint';
                var mywindow = window.open('', 'PRINT', 'height=400,width=600');
                mywindow.document.write('<html><head>'+ document.getElementsByTagName('head')[0].innerHTML +'<title>' + document.title  + '</title>');
                mywindow.document.write('</head><body >');
                mywindow.document.write('<h1>' + document.title  + '</h1>');
                mywindow.document.write(document.getElementById('divToPrint').innerHTML);
                mywindow.document.write('</body></html>');

                mywindow.document.close(); // necessary for IE >= 10
                mywindow.focus(); // necessary for IE >= 10*/

                mywindow.print();
                mywindow.close();

                return true;
            }
        </script>
        <script>
            $.validator.addMethod("FULLNAME",function(value, element) {
                        return this.optional(element) || /^[a-zA-Z]+([ :-]?[a-zA-Z]+)*[ ]*$/.test(value);
                    }, 'Please enter a valid name e.g "Osama Iqbal Khan" or "Quaid-e-Azam" without quotes');
            $.validator.addMethod("contact_email",function(value, element) {
                        return this.optional(element) || /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
                    }, "Email Address is invalid: Please enter a valid email address.");
            $.validator.addMethod("registration_reason_for_leaving",function(value, element) {
                        return this.optional(element) || /^[a-zA-Z]+([a-zA-Z. ]+)*$/.test(value);
                    }, "Please enter a valid reason");
        </script>
        <script type="text/javascript">
            $(document).ready(function()
            {
               $('#class').on('change', function()
                {
                    var class_id = $(this).val();
                    if(class_id == '')
                    {
                        $('#branch').prop('disabled', true);
                    }
                    else
                    {
                        var myurl = '<?php echo SURL; ?>' + 'admin/getBranchesInClass/' + class_id;
                        $('#branch').prop('disabled', false);
                        $.ajax(
                        {
                            url: myurl,
                            type: "GET",
                            success: function(data)
                            {
                                
                                mdata=JSON.parse(data);
                                if(mdata.response=='success')
                                {
                                    $('#branch').html(mdata['data']);     
                                }
                                else
                                {
                                     $('#branch').html(''); 
                                }
                               
                            },
                            error: function(a,b,c,d)
                            {
                                alert('Error occur...!!');
                            }
                        });
                    }
                });
                $('#student_national_id').on('blur', function()
                {
                    var student_national_id = $(this).val();
                    if(student_national_id != '')
                    {
                        var myurl = 'student/isAlreadyRegistered/' + student_national_id;
                        $('#student_national_id').prop('disabled', true);
                        $.ajax(
                        {
                            url: myurl,
                            type: "GET",
                            success: function(data)
                            {
                                if(data=='true')
                                {

                                    $('#student_national_id_error').html('CNIC/B.Form No Already Registered');
                                    $("#id_error").show();
                                }
                                else
                                {
                                     $("#id_error").remove();
                                }
                               
                            },
                            error: function(a,b,c,d)
                            {
                                alert('Error occur...!!');
                            },
                            complete: function () 
                            {
                                $('#student_national_id').prop('disabled', false);
                            }
                        });
                    }
                    else
                    {
                        $("#student_national_id_error").remove();
                    }
                });
                $('#test_result').change(function()
                {
                    $('#mybutton').removeAttr('disabled');
                    // event.preventDefault();
                });
            });
        </script>
    </body>
</html>