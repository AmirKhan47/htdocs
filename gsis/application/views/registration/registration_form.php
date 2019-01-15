        <div class="portlet light bordered col-md-8 col-md-offset-2">
            <div class="portlet-title">
                    <div class="caption ">
                        <img class="col-md-7 col-md-offset-3" src="<?php echo base_url(). 'assets/img/Webp.net-resizeimage (9).png'?>">
                    </div> 
                    <div class="actions">
                    </div>
            </div>
            <div class="portlet-title">
                <div class="caption font-green-seagreen">
                        <i class="fa fa-user font-green-seagreen"></i>
                        <span class="caption-subject bold uppercase "> Registration Form</span>
                    </div> 
                <div class="actions">
                </div>
            </div>
            <div class="portlet-body form">
                <form action="<?php echo base_url();?>student/add" id="form_sample_16" class="form-horizontal" method="post" enctype="multipart/form-data" autocomplete="on">
                    <div class="form-body">
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert">
                            </button> You have some form errors. Please check below. 
                        </div>
                        <div class="alert alert-success display-hide">
                            <button class="close" data-close="alert"></button> Your form validation is successful! 
                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="alert alert-block alert-info fade in">
                            <ul>
                                <li style="color:red;">Your name must be the same as it appears on your present academic credentials/personal identification records i.e Matric/F.Sc/CNIC/B-Form.</li>
                                <li>This information will be verified from the documents submitted with your admission application. </li>
                                <li>Fulfilment of this requirement is mandatory for the processing of this application. This may appear on academic credentials of GSIS</li>
                                <li><b>'<span style="color:red;">*</span>' fields are compulsory.</b></li>
                            </ul>
                        </div>              
                        <div class="row">
                            <div class="col-md-11">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Student's Name<span class="required" aria-required="true">*</span></label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input style="text-transform:uppercase;" type="text" data-rule-required="true" data-rule-minlength="3" data-rule-maxlength="40" pattern="[a-zA-Z0-9\s]+" id="student_name" name="student_name" class="form-control" placeholder="Student Name" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">CNIC/B.Form No</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-credit-card"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text"  id="student_national_id" maxlength="15" minlength="15" name="student_national_id" class="form-control" placeholder="XXXXX-XXXXXXX-X" value="">
                                                        </div>
                                                    </div>
                                                    <div class="alert alert-danger" style="display: none;margin-bottom: 0px" id="student_national_id_error">
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
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" style="text-transform:uppercase;" id="guardian_name"  data-rule-required="true" name="guardian_name" class="form-control" placeholder="Father Name" value="">
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
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-credit-card"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" data-rule-required="true" id="cnic" name="guardian_national_id" class="form-control" maxlength="15" minlength="15" placeholder="XXXXX-XXXXXXX-X" value="">
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
                                                <label class="control-label col-md-4">Mother Name<span class="required" aria-required="true">*</span></label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" style="text-transform:uppercase;" id="guardian_name"  data-rule-required="true" name="guardian_name1" class="form-control" placeholder="Mother Name" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Mother CNIC<span class="required" aria-required="true">*</span> </label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-credit-card"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" data-rule-required="true" id="cnic" name="guardian_national_id1" class="form-control" maxlength="15" minlength="15" placeholder="XXXXX-XXXXXXX-X" value="">
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
                                                <label class="control-label col-md-4">Class<span class="required" aria-required="true">*</span></label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <select type="text" data-rule-required="true" id="class" name="class_name" class="form-control"  value="">
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
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Branch<span class="required" aria-required="true">*</span></label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <select type="text" data-rule-required="true" id="branch" class="form-control" name="branch_name" value="" title="Select Class First" disabled> 
                                                            </select>
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
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-user-md"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <select class="form-control" id="gender" name="student_gender" required>
                                                               <option value=""  >Select Gender</option>
                                                               <option value="male"  >Male</option>
                                                               <option value="female">Female</option>
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
                                                <label class="control-label col-md-4">Religion</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-credit-card"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <select class="form-control" id="religion" name="student_religion" required>
                                                                <option value="">Select Religon</option>
                                                                <option value="Muslim" selected>Muslim</option>
                                                                <option value="Other">Other</option>
                                                            </select>
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
                                                <label class="col-md-4 control-label"> Date of Birth <span class="required" aria-required="true">*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input-group">
                                                        <span class="input-icon right">
                                                            <i class="fa"></i>
                                                            <select class="_58mq" name="student_date_of_birth_day" data-rule-required="true" >
                                                                <option value="">Day</option>
                                                                <?php 
                                                                for ($i=1; $i <= 31; $i++) { 
                                                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </span>
                                                        <span class="input-icon right">
                                                            <i class="fa"></i>
                                                            <select class="_58mq" name="student_date_of_birth_month" data-rule-required="true" >
                                                                <option value="">Month</option><option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sept</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>
                                                            </select>
                                                        </span>
                                                        <span class="input-icon right">
                                                            <i class="fa"></i>
                                                            <select class="_58mq" name="student_date_of_birth_year" data-rule-required="true" >
                                                                <option value="">Year</option>
                                                                <?php 
                                                                $year = date("Y")-1; // get the year part of the current date
                                                                $minYear = $year - 50;
                                                                for ($i=$year; $i >= $minYear; $i--) { 
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
                                                <label class="control-label col-md-4">Place Of Birth </label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-globe"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" name="student_place_of_birth" id="pob" class="form-control" placeholder="Place/City of Birth e.g Islamabad" value="">
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
                                                <label class="control-label col-md-4">Nationality<span class="required" aria-required="true">*</span></label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-flag"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <select class="form-control" data-rule-required="true" id="nationality" name="student_nationality" required>
                                                                <option value="Pakistan">Pakistan</option>
                                                                <option value="Foreign">Foreign</option>
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
                                                <label class="control-label col-md-4">Email:<span class="required" aria-required="true">*</span> </label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-envelope-o"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="email" data-rule-required="true" name="contact_email" class="form-control" placeholder="Email" value="">
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
                                                <label class="control-label col-md-4">Office Phone</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-phone"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" placeholder="051-XXXXXXX" name="contact_line" class="form-control">
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
                                                <label class="control-label col-md-4">Mobile:<span class="required" aria-required="true">*</span> </label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-phone"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" id="mobile" placeholder="03XX-XXXXXXX" data-rule-required="true" name="contact_cell" data-validation="number" class="form-control" placeholder="" value="" required>
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
                                                            <textarea type="text" data-rule-required="true" maxlength="30" name="address_local" class="form-control" placeholder="92, 35-B"></textarea>
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
                                                            <textarea type="text" data-rule-required="true" maxlength="30" name="address_sector" class="form-control" placeholder="I-10/4" value=""></textarea>
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
                                                            <textarea type="text" data-rule-required="true" maxlength="30" name="address_city" class="form-control" placeholder="Karachi" value=""></textarea>
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
                                                <label class="control-label col-md-4">Last School Attented</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                           <i class="fa fa-registered"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" name="registration_last_school_name" data-rule-maxlength="80" placeholder="F.G Junior School X-1/1, Islamabad">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Reasons For Leaving</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-map-marker"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <textarea type="text" maxlength="80" name="registration_reason_for_leaving" class="form-control" placeholder="I left previous school because..."></textarea>
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
                                                <label class="control-label col-md-4">FROM</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                       <span class="input-icon right">
                                                            <i class="fa"></i>
                                                            <select class="_58mq" name="registration_last_school_from_day">
                                                                <option value="" selected="selected">Day</option>
                                                                <?php 
                                                                for ($i=1; $i <= 31; $i++) { 
                                                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </span>
                                                        <span class="input-icon right">
                                                            <i class="fa"></i>
                                                            <select class="_58mq" name="registration_last_school_from_month">
                                                                <option value="" selected="selected">Month</option><option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sept</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>
                                                            </select>
                                                        </span>
                                                        <span class="input-icon right">
                                                            <i class="fa"></i>
                                                            <select class="_58mq" name="registration_last_school_from_year">
                                                                <option value="" selected="selected">Year</option>
                                                                <?php
                                                                $year = date("Y")-1; // get the year part of the current date
                                                                $minYear = $year - 50;
                                                                for ($i=$year; $i >= $minYear; $i--) { 
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
                                                <label class="control-label col-md-4">To</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <select class="_58mq" name="registration_last_school_to_day">
                                                                <option value="">Day</option>
                                                                <?php 
                                                                for ($i=1; $i <= 31; $i++) { 
                                                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                            <select class="_58mq" name="registration_last_school_to_month">
                                                                <option value="">Month</option><option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sept</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>
                                                            </select>
                                                            <select class="_58mq" name="registration_last_school_to_year">
                                                                <option value="">Year</option>
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
                                    <div class="col-md-6">
                                         <div class="form-group">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Admission Required From<span class="required" aria-required="true">*</span></label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-icon right">
                                                            <i class="fa"></i>
                                                            <select class="_58mq" name="registration_required_from_day" data-rule-required="true" >
                                                                <option value="">Day</option>
                                                                <?php 
                                                                for ($i=1; $i <= 31; $i++) { 
                                                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </span>
                                                        <span class="input-icon right">
                                                            <i class="fa"></i>
                                                            <select class="_58mq" name="registration_required_from_month" data-rule-required="true" >
                                                                <option value="">Month</option><option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sept</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>
                                                            </select>
                                                        </span>
                                                        <span class="input-icon right">
                                                            <i class="fa"></i>
                                                            <select class="_58mq" name="registration_required_from_year" data-rule-required="true">
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
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-5 col-md-6" title="Check Student CNIC">
                                        <!-- <div class="g-recaptcha" data-sitekey="6LfTe1IUAAAAANprIefnCZJwBYdZGzvVpnujdxCY"></div> -->
                                        <button type="submit" id="form_sample_16_submit_button" name="submit" value="save" class="btn btn-md green-meadow"><i class="glyphicon glyphicon-ok-sign"></i>
                                        Submit</button>
                                        <div id="errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="<?php echo base_url(). 'assets/global/plugins/respond.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/excanvas.min.js'?>" type="text/javascript"></script> 
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
        <script src="<?php echo base_url(). 'assets/js/jquery.maskedinput.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/pages/scripts/validation.js'?>" type="text/javascript"></script>
        <script src="https://www.google.com/recaptcha/api.js"  type="text/javascript"></script>
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

                $("input[name='guardian_national_id1']").mask('99999-9999999-9').bind("blur", function () 
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

                $("input[name='contact_cell']").mask('0399-9999999');
                $("input[name='contact_line']").mask('051-9999999');
            });
        </script>
        <script>
        	
            /*$.validator.addMethod("CNIC",function(postalcode, element) {
            	//removes placeholder from string
                    //postalcode = postalcode.split("_").join("");

                    //Checks the length of the zipcode now that placeholder characters are removed.
                    if (postalcode.length === 5 || postalcode.length === 13) {
                        //Removes hyphen
                        alert("asd");
                        postalcode = postalcode+"-";
                        element.val(postalcode);
                    }
        		        return this.optional(element) || /^[0-9]+$/.test(postalcode);
        		    }, 'Please enter a valid cnic');*/
            $.validator.addMethod("FULLNAME",function(value, element) {
                        return this.optional(element) || /^[a-zA-Z]+([ :-]?[a-zA-Z]+)*[ ]*$/.test(value);
                    }, 'Please enter a valid name e.g "Osama Iqbal khan" or "Quaid-e-Azam" without quotes');
            $.validator.addMethod("contact_email",function(value, element) {
                        return this.optional(element) || /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
                    }, "Email Address is invalid: Please enter a valid email address.");
            $.validator.addMethod("registration_reason_for_leaving",function(value, element) {
                        return this.optional(element) || /^[a-zA-Z]+([a-zA-Z. ]+)*$/.test(value);
                    }, "Please enter a valid reason");
        </script>
        <script>
            function recaptchaCallback() 
            {
                $('#form_sample_16_submit_button').removeAttr('disabled');
            };
        </script>
        <script type="text/javascript">
            $(document).ready(function()
            {
               $('#class').change(function()
                {
                    var class_id = $(this).val();
                    if(class_id == '')
                    {
                        $('#branch').prop('disabled', true);
                    }
                    else
                    {
                        var myurl = '<?php echo SURL;?>student/getBranchesInClass/'+class_id;
                        // var myurl = '<?php echo SURL;?>student/getBranchesInClass/'+class_id;
                        // alert(myurl);
                        $('#branch').prop('disabled', false);
                        $('#branch').removeAttr('title')
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
               //on blur national id student
                $('#student_national_id').on('blur', function()
                {
                    var student_national_id = $(this).val();
                    if(student_national_id != '')
                    {
                        // var myurl = '<?php echo SURL;?>student/isAlreadyRegistered/' + student_national_id;
                        var myurl = '<?php echo SURL;?>student/isAlreadyRegistered/'+student_national_id;
                        // $('#student_national_id').prop('disabled', true);
                        $.ajax(
                        {
                            url: myurl,
                            type: "GET",
                            success: function(data)
                            {
                            	if(data=='true')
                            	{
                                    // alert("true");
                                    $('#student_national_id_error').html('CNIC/B.Form No Already Registered');
                                    $("#student_national_id_error").show();
                                    $('button[type="submit"]').attr('disabled','disabled');
                                }
                                else
                                {
                                    // alert("else");
                                     $('#student_national_id_error').html('OK');
                                     $("#student_national_id_error").remove();
                                     $('button[type="submit"]').removeAttr('disabled');
                                }
                               
                            },
                            error: function(a,b,c,d)
                            {
                                alert('CNIC/B.Form No. is Already Registered...!!');
                                // $('button[type="submit"]').removeAttr('disabled');
                            },
                            complete: function () 
                            {
                                // $('button[type="submit"]').removeAttr('disabled');
                            	// $('#student_national_id').prop('disabled', false);
                            }
                        });
                    }
                    else
                    {
                        $("#student_national_id_error").remove();
                    }
                });  
            });
        </script>
    </body>
</html>