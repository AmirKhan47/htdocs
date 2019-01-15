        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="<?php echo SURL;?>school/admin_dashboard">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo SURL;?>admin/registered_students"> Registered Students </a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span> Registered Student Details </span>
                </li>
            </ul>
        </div>
        <h3 class="page-title"> Registered Student Details </h3>
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green-seagreen">
                    <i class="fa fa-user font-green-seagreen"></i>
                    <span class="caption-subject bold uppercase"> Registered Student Details List </span>
                </div> 
            </div>
            <div class="portlet-body form">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th> Registration Date </th>
                            <th> Test Result Date </th>
                            <th> Fee Challan Issuance Date </th>
                            <th> Fee Challan Submition Date </th>
                        </tr>
                    </thead>
                    <tbody>     
                        <?php
                            if(!$registered_student_details)
                            {

                            }
                            else
                            {
                                foreach ($registered_student_details as $key => $value)
                                {
                                    echo '<tr>';
                                    echo '<td>'.$value['pending_date'].'</td>';
                                    echo '<td>'.$value['payment_pending_date'].'</td>';
                                    echo '<td>'.$value['challan_date_created'].'</td>';
                                    echo '<td>'.$value['challan_date_submitted'].'</td>';
                                    echo '</tr>';
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="portlet light bordered" style="margin-top: 25px;">
            <div class="portlet-title">
                <div class="caption ">
                        <span class="caption-subject bold text-uppercase"><h3><b> Detailed Data Entry </b></h3></span>
                    </div> 
                <div class="actions">
                </div>
            </div>
            <div class="portlet-body form">
                <form action="admin/portal" id="form_sample_19" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="student_id" id="student_id" value="<?php echo $student['student_id']; ?>">
                    <div class="form-body">
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button> You have some form errors. Please check below. 
                        </div>
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
                                                <label class="control-label col-md-4">Student's Name<span class="required" aria-required="true"></span></label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" data-rule-required="true" data-rule-minlength="3" data-rule-maxlength="40" pattern="[a-zA-Z0-9\s]+" id="name" name="fname" class="form-control text-uppercase" placeholder="" value="<?php echo $student['student_name']; ?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">CNIC/B.Form No<span class="required" aria-required="true"></span></label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-credit-card"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" data-rule-required="true"  id="cnic2" maxlength="15" minlength="15" name="cnic2" class="form-control" placeholder="" value="<?php echo $student['student_national_id']; ?>" disabled>
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
                                                <label class="control-label col-md-4">Father's Name<span class="required" aria-required="true"></span></label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text"  id="lname"  data-rule-required="true" pattern="[a-zA-Z0-9\s]+" name="lname" class="form-control text-uppercase" placeholder="" value="<?php echo $father['guardian_name']; ?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Father's CNIC<span class="required" aria-required="true"></span> </label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-credit-card"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text"   name="passport" data-rule-required="true" class="form-control" maxlength="15" minlength="15" id="cnic" value="<?php echo $father['guardian_national_id']; ?>" disabled>
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
                                                <label class="control-label col-md-4">Mother's Name<span class="required" aria-required="true"></span></label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text"  id="lname"  data-rule-required="true" pattern="[a-zA-Z0-9\s]+" name="lname" class="form-control text-uppercase" placeholder="" value="<?php echo $mother['guardian_name']; ?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Mother's CNIC<span class="required" aria-required="true"></span> </label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-credit-card"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" name="passport" data-rule-required="true" class="form-control" maxlength="15" minlength="15" id="cnic" value="<?php echo $mother['guardian_national_id']; ?>" disabled>
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
                                                <label class="control-label col-md-4">Gender</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-user-md"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <select class="form-control"  disabled  id="gender" name="gender"  required >
                                                       <option value="">Select</option>
                                                       <option value="male" <?php if($student['student_gender']=='male'){
                                                        echo 'selected';
                                                       } ?>>Male</option>
                                                       <option value="female"<?php if($student['student_gender']=='female'){
                                                        echo 'selected';
                                                       } ?>>Female</option>
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
                                            <label class="col-md-4 control-label"> Date of Birth <span class="required" aria-required="true"></span></label>
                                            <div class="col-md-7">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                           <i class="fa fa-calendar"></i>
                                                        </span>
                                                   <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                        <input type="text" id="blood" name="blood" data-rule-required="true" value="<?php echo $student['student_date_of_birth'] ?>" class="form-control" disabled >
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
                                                <label class="control-label col-md-4">Branch</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-tint"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <select disabled class="form-control"  id="blood" name="blood" value="<?php $student['branch_id']; ?>">
                                                                <?php foreach ($branches as $branch) 
                                                                    {
                                                                        echo '<option value="'.$branch['id'].'"';
                                                                        if($branch['id']==$student['branch_id'])
                                                                        {
                                                                            echo 'selected';
                                                                        }
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
                                                            <input type="text" pattern="[a-zA-Z0-9\s]+" name="pob" id="pob" class="form-control" placeholder="" value="<?php echo $student['student_place_of_birth']; ?>" disabled>
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
                                                <label class="control-label col-md-4">Nationality<span class="required" aria-required="true"></span></label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-flag"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <select class="form-control" data-rule-required="true" id="nationality" name="nationality" required disabled>
                                                            
                                                              <option value="">Select</option>
                                                               <option value="p" selected>Pakistan</option>
                                                                <option value="d">Dubai</option>
                                                                 <option value="c">China</option>


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
                                                <label class="control-label col-md-4">Language</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-language"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <select class="form-control" disabled id="language" name="language" >
                                                       <option>Select</option>
                                                       <option >English</option>
                                                       <option >Chinese</option>
                                                       <option >Arabic</option>
                                                       
                                                                 </select>
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
                                                <label class="control-label col-md-4">Religion</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-credit-card"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <select class="form-control" disabled id="religion" name="religion" "<?php $student['student_religion']; ?>">
                                                       <option >Islam</option>
                                                       <option >christian</option>
                                                       <option >Hindu</option>
                                                       
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
                                                <label class="control-label col-md-4">Email:<span class="required" aria-required="true"></span> </label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-envelope-o"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="email" data-rule-required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  name="email" class="form-control" placeholder="" value="<?php echo $student['contact_email']; ?>" disabled>
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
                                                            <input type="text" id="phone" data-rule-required="true" minlength="7" maxlength="7" name="phone" class="form-control" data-validation="number" value="<?php echo $student['contact_line']; ?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Mobile:<span class="required" aria-required="true"></span> </label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-phone"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" minlength="12" maxlength="12" id="mobile" data-rule-required="true" name="mobile" data-validation="number" class="form-control" placeholder="" value="<?php echo $student['contact_cell']; ?>" disabled>
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
                                                <label class="control-label col-md-4">Reason for Leaving</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-map-marker"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <textarea style="max-height: 50px;max-width: 300px;min-height: 30px;min-width: 250px; " type="text" pattern="([a-zA-Z0-9]| |/|\\|@|#|\$|%|&)+"  name="PApresent" class="form-control"  value="<?php echo $student['registration_last_school_reason_for_leaving']; ?>" disabled><?php echo $student['registration_last_school_reason_for_leaving']; ?></textarea>
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
                                                            <textarea type="text" data-rule-required="true" maxlength="30" name="address_local" class="form-control" disabled><?php echo $student['address_local']; ?></textarea>
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
                                                            <textarea type="text" data-rule-required="true" maxlength="30" name="address_sector" class="form-control" disabled><?php echo $student['address_sector']; ?></textarea>
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
                                                            <textarea type="text" data-rule-required="true" maxlength="30" name="address_city" class="form-control" disabled><?php echo $student['address_city']; ?></textarea>
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
                                                <label class="control-label col-md-4">Admission required from</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                           <i class="fa fa-calendar"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text"  name="fb_id" class="form-control" placeholder="" value="<?php echo $student['registration_required_from']; ?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                         <div class="form-group">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Last School Attented<span class="required" aria-required="true"></span></label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                           <i class="fa fa-registered"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" data-rule-required="true" data-rule-maxlength="80" name="fb_id" id="las" pattern="[a-zA-Z0-9\s]+" class="form-control" placeholder="" value="<?php echo $student['registration_last_school_name']; ?>" disabled>
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
                                                        <span class="input-group-addon">
                                                           <i class="fa fa-calendar"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text"  name="fb_id" class="form-control" placeholder="" value="<?php echo $student['registration_last_school_from']; ?>" disabled>
                                                        </div>
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
                                                        <span class="input-group-addon">
                                                            <i class="far fa-registered"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text"  name="guardianname" class="form-control" placeholder="" value="<?php echo $student['registration_last_school_to']; ?>" disabled>
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
                                            <label class="control-label col-md-4 col-xs-4">Test Remarks<span class="required" aria-required="true">*</span></label>
                                            <div class="col-md-8 col-xs-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-language"></i>
                                                    </span>
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <textarea disabled="" class="form-control" data-rule-required="true" minlength="3" maxlength="200" id="registration_test_remarks" name="registration_test_remarks" rows="3"><?php echo $student['registration_test_remarks'];?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-xs-4">Registration Fee</label>
                                            <div class="col-md-8 col-xs-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-registered"></i>
                                                    </span>
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input disabled="" type="text" id="reg"  minlength="2" maxlength="10" name="registration_fee" class="form-control" data-validation="number" value="<?php echo $student['registration_fee']; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-social-dribbble font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">Siblings Registered on Same CNIC</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body flip-scroll">
                                        <table class="table table-bordered table-striped table-condensed flip-content table-hover">
                                            <!--Table head-->
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Roll Number</th>
                                                </tr>
                                            </thead>
                                            <!--Table head-->

                                            <!--Table body-->
                                            <tbody>
                                               <?php
                                               if(!$siblings){}else{
                                               $i=1; 
                                               foreach($siblings as $sibling){
                                                    echo '<tr>';
                                                    echo '<th scope="row">'.$i++.'</th>';
                                                    echo '<td>'.$sibling['student_name'].'</td>';
                                                    echo '<td>'.$sibling['student_roll_no'].'</td>';
                                                    echo '</tr>';
                                                } } ?>
                                            </tbody>
                                            <!--Table body-->

                                        </table>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Registration Fee: </label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-registered"></i>
                                                        </span>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" id="reg"  minlength="1" maxlength="4" name="phone" class="form-control" data-validation="number" value="<?php echo $student['registration_fee'] ?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <form action="" id="form_sample_16" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="portlet light bordered" style="margin-top: 25px;">
                <div class="portlet-title">
                    <div class="caption ">
                        <span class="caption-subject bold text-uppercase"><h3><b> Branch and Subjects </b></h3></span>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-6" >
                        <div class="form-group">
                            <div class="form-group">
                                <label class="control-label col-md-4">Select Branch<span class="required" aria-required="true">*</span></label>
                                <div class="col-md-8">
                                    <select class="form-control" data-rule-required="true"  id="select_branch" value="<?php $student['branch_id']; ?>">
                                          <?php foreach ($branches as $branch) {
                                              echo '<option value="'.$branch['id'].'"';
                                              if($branch['id']==$student['branch_id']){
                                                echo 'selected';
                                              }
                                                echo '>'.$branch['branch_name'].'</option>';
                                          } ?> 
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" >
                        <div class="form-group">
                            <div class="form-group">
                                <label class="control-label col-md-4">Select Class<span class="required" aria-required="true">*</span></label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <div class="input-icon right">
                                            <i class="fa"></i>
                                            <select class="form-control" data-rule-required="true" id="select_class">
                                                <?php foreach ($classes as $class)
                                                    {
                                                        echo '<option value="'.$class['id'].'"';
                                                        if($class['id']==$student['class_id'])
                                                        {
                                                            echo 'selected';
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
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="row form-group form-md-checkboxes">
                                <label class="col-md-3 control-label" for="form_control">Choose Subjects</label>
                                <div class="col-md-9">
                                    <div id="select_subject" class="md-checkbox-inline">
                                    </div>
                                    <!-- <div id="select_subject"></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit" style="margin-left: 40%;" value="save" class="btn btn-lg green-meadow">
                        <i class="glyphicon glyphicon-ok-sign"></i>
                        Add Subjects
                    </button>
                </div>
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-social-dribbble font-green"></i>
                                    <span class="caption-subject font-green bold uppercase">Currently Registered Subjects</span>
                                </div>
                            </div>
                            <div class="portlet-body flip-scroll">
                                <div id="subject_table">
                                    <table class="table table-bordered table-striped table-condensed flip-content">
                                        <!--Table head-->
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Subject</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <!--Table head-->
                                        <!--Table body-->
                                        <tbody>
                                            <?php
                                                if(!$registered_subjects)
                                                {
                                                }
                                                else
                                                {
                                                    // echo "<pre>";
                                                    // print_r ($registered_subjects);
                                                    // echo "</pre>";
                                                    // exit();
                                                    $i=1; 
                                                    foreach($registered_subjects as $value)
                                                    {
                                                        echo '<tr>';
                                                        echo '<th scope="row">'.$i++.'</th>';
                                                        echo '<td>'.$value['subject_name'];
                                                        if($value['subject_type'] != null)
                                                        {
                                                            echo '<p style="font-size: 10px;">'.$value['subject_type'].'</p>';
                                                        }
                                                        echo '</td>';
                                                        echo'<td>
                                                                <button onclick="delete_subject('.$value['id'].')" type="button" class="btn btn-danger btn-xs btn-circle">
                                                                    Delete
                                                                </button>
                                                            </td>';
                                                        echo '</tr>';
                                                    }
                                                } 
                                            ?>
                                        </tbody>
                                        <!--Table body-->
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>       
                </div>
            </div>
        </form>
        <div class="portlet light bordered" style="margin-top: 25px;">
            <div class="portlet-title">
                <div class="caption ">
                    <span class="caption-subject bold text-uppercase"><h3><b> Parents/Guardians </b></h3></span>
                </div> 
            </div>
            <div class="row">
                <div class="col-md-12" >
                    <div class="form-group">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="col-md-12">
                                        <form id="addGuardianForm" class="form-horizontal">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">CNIC<span class="required">*</span></label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                               <i class="fa fa-calendar"></i>
                                                            </span>
                                                            <div class="input-icon right">
                                                                <i class="fa"></i>
                                                                <input type="text" name="guardian_national_id" required="" id="cnic" data-rule-required="true" class="form-control" onblur="checkGuardianNationalId(this)" placeholder="11111-1111111-1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Relationship to child<span class="required">*</span></label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                               <i class="fa fa-calendar"></i>
                                                            </span>
                                                            <div class="input-icon right">
                                                                <i class="fa"></i>
                                                                <input type="text" pattern="^[a-zA-Z ]*$" required="" placeholder="Father/Mother/etc"  name="student_guardian_relationship" class="form-control text-uppercase" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Name<span class="required">*</span></label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                               <i class="fa fa-calendar"></i>
                                                            </span>
                                                            <div class="input-icon right">
                                                                <i class="fa"></i>
                                                                <input type="text" pattern="^[a-zA-Z ]*$" required="" name="guardian_name" placeholder="Abc Xyz" class="form-control text-uppercase" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Occupation</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                               <i class="fa fa-calendar"></i>
                                                            </span>
                                                            <div class="input-icon right">
                                                                <i class="fa"></i>
                                                                <input type="text" name="guardian_occupation" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Designation</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                               <i class="fa fa-calendar"></i>
                                                            </span>
                                                            <div class="input-icon right">
                                                                <i class="fa"></i>
                                                                <input type="text"  name="guardian_designation" class="form-control" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Organization</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                               <i class="fa fa-calendar"></i>
                                                            </span>
                                                            <div class="input-icon right">
                                                                <i class="fa"></i>
                                                                <input type="text"  name="guardian_organization" class="form-control" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Emergency Contact<span class="required">*</span></label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                               <i class="fa fa-calendar"></i>
                                                            </span>
                                                            <div class="input-icon right">
                                                                <i class="fa"></i>
                                                                <input type="text" minlength="12" maxlength="12" id="mobile" data-rule-required="true" name="contact_cell" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" style="margin-left: 40%;" id="addguardian" value="Add Guardian" class="btn btn-lg green-meadow">
                                                    <i class="glyphicon glyphicon-ok-sign"></i>
                                                    Add Guardian
                                                </button>
                                                <div class="" id="divtodisplay"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="container">
                                <div class="col-md-12" style="margin-top: 20px;"> 
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="icon-social-dribbble font-green"></i>
                                                    <span class="caption-subject font-green bold uppercase">Guardians Table</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Relationship to child</th>
                                                    <th>CNIC</th>
                                                    <th>Emergency Contact</th>
                                                    <th>Occupation</th>
                                                    <th>Designation</th>
                                                    <th>Organization</th>
                                                    <th>Action</th>
                                                </tr>
                                                <?php
                                                    if(!$guardians)
                                                    {
                                                    }
                                                    else
                                                    {
                                                        $i=1; 
                                                        foreach($guardians as $guardian)
                                                        {
                                                            echo '<tr>';
                                                                echo '<th scope="row">'.$i++.'</th>';
                                                                    echo '<td>'.$guardian['student_guardian_relationship'].'</td>';
                                                                    echo '<td>'.$guardian['guardian_national_id'].'</td>';
                                                                    echo '<td>'.$guardian['contact_cell'].'</td>';
                                                                    echo '<td>'.$guardian['guardian_occupation'].'</td>';
                                                                    echo '<td>'.$guardian['guardian_designation'].'</td>';
                                                                    echo '<td>'.$guardian['guardian_organization'].'</td>';
                                                                    echo'<td>
                                                                            <a href="'.base_url().'admin/edit_guardian/'.$guardian['guardian_id'].'">
                                                                                <button type="submit" class="btn btn-primary btn-xs btn-circle">
                                                                                    Edit
                                                                                </button>
                                                                            </a>
                                                                            <button type="button" onclick="delete_guardian('.$guardian['guardian_id'].')" class="btn btn-danger btn-xs btn-circle">
                                                                                Delete
                                                                            </button>
                                                                        </td>';
                                                            echo '</tr>';
                                                        } 
                                                    }
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- <a href="<?php echo SURL.'challan/index/'.$student['student_id']; ?>">
                                        <button type="submit" style="margin-left: 40%;" id="" value="" class="btn btn-lg btn-md green-meadow">
                                            <i class="glyphicon glyphicon-ok-sign"></i>
                                            Next To Challan
                                        </button>
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                        
            </div>
        </div>   
        <script src="<?php echo SURL. 'assets/global/plugins/jquery.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo SURL. 'assets/global/plugins/bootstrap/js/bootstrap.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo SURL. 'assets/global/plugins/js.cookie.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo SURL. 'assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo SURL. 'assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo SURL. 'assets/global/plugins/jquery.blockui.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo SURL. 'assets/global/plugins/uniform/jquery.uniform.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo SURL. 'assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo SURL. 'assets/layouts/layout/scripts/jquery.dropselect.js'?>" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo SURL. 'assets/global/scripts/app.min.js'?>" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
         <script src="<?php echo SURL. 'assets/pages/scripts/form-validation-md.min.js'?>" type="text/javascript"></script>
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo SURL. 'assets/global/plugins/jquery-validation/js/jquery.validate.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo SURL. 'assets/global/plugins/jquery-validation/js/additional-methods.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo SURL. 'assets/layouts/layout/scripts/demo.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo SURL. 'assets/layouts/global/scripts/quick-sidebar.min.js'?>" type="text/javascript"></script> 
        <script src="<?php echo SURL. 'assets/layouts/layout/scripts/layout.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo SURL. 'assets/global/scripts/datatable.js'?>" type="text/javascript"></script>
        <script src="<?php echo SURL. 'assets/global/plugins/datatables/datatables.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo SURL. 'assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'?>" type="text/javascript"></script>
        <script src="<?php echo SURL. 'assets/pages/scripts/table-datatables-responsive.min.js'?>" type="text/javascript"></script>  
        <script src="<?php echo base_url().'assets/js/jquery.maskedinput.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/pages/scripts/validation.js'?>" type="text/javascript"></script>
        <script type="text/javascript">
            $(function()
            {
                $('#nine').hide(); 
                $('#eleven').hide();
                $('#o_levels').hide();
                $('#a_levels').hide();
                $('#select_class').change(function()
                {
                    if($('#select_class').val() == '1')
                    {
                        $('#nine').show();
                    }  
                    else   
                    {
                        $('#nine').hide(); 
                    } 
                });
                $('#select_class').change(function()
                {
                    if($('#select_class').val() == '3') 
                    {
                        $('#eleven').show();
                    }  
                    else   
                    {
                        $('#eleven').hide(); 
                    } 
                });
                /*
                    $('#select_class').change(function()
                    {
                    if($('#select_class').val() == '5') 
                    {
                        $('#o_levels').show();
                    }  
                    else   
                    {
                        $('#o_levels').hide(); 
                    } 
                });
                    $('#select_class').change(function()
                    {
                    if($('#select_class').val() == '6') 
                    {
                        $('#a_levels').show();
                    }  
                    else   
                    {
                        $('#a_levels').hide(); 
                    } 
                });*/
                $("#form_sample_16").submit(function()
                {
                    // alert('agaya');
                    if ($('.subject').filter(':checked').length < 5)
                    {
                        $('#error').text('error');
                        return false;
                    }
                });
                $("#2addguardian").click(function() 
                {
                    $("#container").append('<div class="col-md-9"> <table class="table table-bordered"><tr><td>Relationship to child</td><td>CNIC</td><td>Occupation</td><td>Designation</td><td>Organization</td></tr><tr><td><input type="text" ></td><td><input type="text" onblur="checkGuardianNationalId(this)" placeholder="11111-1111111-1"></td><td><input type="text" ></td><td><input type="text" ></td><td><input type="text" ></td></tr></table></div>');
                });               
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function()
            {
                $("input[name='student_national_id']").mask('99999-9999999-9');
                $("input[name='guardian_national_id']").mask('99999-9999999-9').bind("blur", function ()
                {
                    var frm = $(this).parents("form");
                    if($.data( frm[0], 'validator' ))
                    {
                        var validator = $(this).parents("form").validate();
                        validator.settings.onfocusout.apply(validator, [this]);
                    }
                });
                $("input[name='contact_cell']").mask('0399-9999999');
                getSubjects();
            });
        </script>
        <script type="text/javascript"v>
            $.validator.addMethod("FULLNAME",function(value, element)
            {
                return this.optional(element) || /^[a-zA-Z]+([ :-]?[a-zA-Z]+)*[ ]*$/.test(value);
            },
            'Please enter a valid name e.g "Osama Iqbal khan" or "Quaid-e-Azam" without quotes');
            $.validator.addMethod("contact_email",function(value, element)
            {
                return this.optional(element) || /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
            },
            "Email Address is invalid: Please enter a valid email address.");
            $.validator.addMethod("registration_reason_for_leaving",function(value, element)
            {
                return this.optional(element) || /^[a-zA-Z]+([a-zA-Z. ]+)*$/.test(value);
            },
            "Please enter a valid reason");
        </script>
        <script type="text/javascript">
            function registerSubjects()
            {
                alert($('#select_class').val());
            }
            /*$('#form_sample_16').submit(function(e)
            {
                e.preventDefault();
                //$('#select_subject')
                var subjects =[];
                $('#select_subject input:checkbox').each(function ()
                {
                    if(this.checked)
                        subjects.push($(this).val());
                });
                alert(subjects[0]);
                //alert($('#select_class').val());
            });*/
        </script>
        <script type="text/javascript">
        $('#select_branch').change(function()
        {
            var branch = $('#select_branch').val();
            $('#select_branch').prop("disabled", true);
            var url = BASE_URL+"admin/getClassesInBranch/"+branch;
            // Send the data using post
            var getting = $.get( url);
            // Put the results in a div
            getting.done(function( data)
            {
                //alert(data);
                mdata=JSON.parse(data);
                if(mdata.response==="success")
                {
                    var html="";
                    $.each( mdata.classes, function( index, value )
                {
                    html+='<option value="'+value.id+'">'+value.class_name+'</option>';
                    $('#select_class').html(html);
                    //alert(value.class_name);
                }); 
                }
                else
                if(mdata.response==="fail")
                {
                    alert("no data");
                }
            })
            .fail(function()
            {
                alert( "error" );
            })
            .always(function()
            {
                //alert( "finished" );
                $('#select_branch').prop("disabled", false);
            });
        });
        </script>
        <script type="text/javascript">
            $('#select_class').change(function()
            {
                getSubjects();
            });
            function getSubjects()
            {
                var classes = $('#select_class').val();
                var student_id=$('#student_id').val();
                // $('#select_class').prop("disabled", true);
                var url = BASE_URL+"admin/getSubjectInClasses/"+classes+"/"+student_id;
                var html="";
                $.ajax(
                {
                    url:url,
                    success:function(data)
                    {
                        mdata=JSON.parse(data);
                        if(mdata.response==="success")
                        {
                            $('#select_subject').html(mdata.subjects); 
                        }
                        else
                        if(data.response==="fail")
                        {
                            html='no subjects';
                            $('#select_subject').html(html);
                        }
                    }
                });
            }
        </script>
        <!-- Insert Student Subjects  -->
        <script type="text/javascript">
            $('#form_sample_16').submit(function(e) 
            {
                e.preventDefault();
                var subjects =[];
                $('input[name="subjectscheckbox[]"]').each(function () 
                {
                    if(this.checked)
                    {
                         subjects.push($(this).val());
                    }     
                });
                // $('#select_branch').prop("disabled", true);
                var url = BASE_URL+"admin/insertStudentSubjects/",
                student_id = $('#student_id').val();
                // Send the data using post
                var posting = $.post( url,{subjects:subjects,student_id:student_id});
                // Put the results in a div
                posting.done(function( data)
                {
                    mdata=JSON.parse(data);
                    if(mdata.response==="success")
                    {
                        // window.location.replace(BASE_URL+"admin/registered_student_details/"+student_id);
                        // var html="";
                        $('#subject_table').html(mdata.subject_table);
                        getSubjects();
                        // $('#select_branch').prop("disabled", true);
                        // $.each( mdata.classes, function( index, value )
                        // {
                        //     html+='<option value="'+value.id+'">'+value.class_name+'</option>';
                        //     $('#select_class').html(html);
                        //     alert(value.class_name);
                        // }); 
                    }
                    else
                    if(mdata.response==="fail")
                    {
                        alert("no data");
                    }
                })
                .fail(function()
                {
                    alert( "error" );
                })
                .always(function()
                {
                    // alert( "finished" );
                    // $('#select_branch').prop("disabled", false);
                });
            });
        </script>
        <script type="text/javascript">
            function checkGuardianNationalId(elem)
            {
                var element=$(elem);
                var cnic = element.val();
                //var $form = $('#signupform'),
                // if(1==1)
                // {
                    //if(element.valid())
                    // {
                        //set to loading
                        element.prop("disabled", true);
                        //changefeedback(element,loadingFeedback,'');
                        var url = BASE_URL+"admin/isGuardianNationalIdRegistered/"+cnic;
                        // Send the data using post
                        var checkcnic = $.get( url)
                        .done(function( data )
                        {
                            // alert(data);
                            mdata=JSON.parse(data);
                            if(mdata.response==="success")
                            {
                                $("#addGuardianForm").find('input[name="student_guardian_relationship"]').val();
                                $("#addGuardianForm").find('input[name="guardian_national_id"]').val();
                                $("#addGuardianForm").find('input[name="guardian_occupation"]').val(mdata.guardian[0].guardian_occupation);
                                $("#addGuardianForm").find('input[name="guardian_designation"]').val(mdata.guardian[0].guardian_designation);
                                $("#addGuardianForm").find('input[name="guardian_organization"]').val(mdata.guardian[0].guardian_organization);
                                $("#addGuardianForm").find('input[name="guardian_name"]').val(mdata.guardian[0].guardian_name);
                                //set to success
                                //element.prop("disabled", false);
                                //changefeedback(element,successFeedback,'has-success');
                            }
                            else
                            if(mdata.response==="cnic not available")
                            {
                                //var validator = $( "#signupform" ).validate();
                                //$("#signupform_cnic_error_message").show();
                                //element.prop("disabled", false);
                                //changefeedback(element,errorFeedback,'has-error');
                                /*$("#cnic").validate().showErrors({
                                  "cnic": "Username already registered!"
                                });*/
                            }
                            else
                            {
                                //clearInput(element);
                                // alert(data);
                            }
                        })
                        .fail(function()
                        {
                            // alert( "error" );
                        })
                        .always(function()
                        {
                            element.prop("disabled", false);
                            // alert( "finished" );
                        });
                    // }
                // }
            }
            $('#addGuardian').click(function()
            {
                if($("addGuardianForm")[0].checkValidity())
                {
                    //your form execution code
                }
                else
                {
                    console.log("invalid form");
                }
            });
            $("#addGuardianForm").submit(function (e)
            {
                if(document.getElementById("addGuardianForm").checkValidity())
                {
                    e.preventDefault();
                    var form=$('#addGuardianForm');
                    var element=$('#addGuardian');
                    /*var data = 
                    {
                        "student_id":$('#student_id').val(),
                        "student_guardian_relationship":element.closest('tr').find('input[name="student_guardian_relationship"]').val(),
                        "guardian_national_id":element.closest('tr').find('input[name="guardian_national_id"]').val(),
                        "guardian_occupation":element.closest('tr').find('input[name="guardian_occupation"]').val(),
                        "guardian_designation":element.closest('tr').find('input[name="guardian_designation"]').val(),
                        "guardian_organization":element.closest('tr').find('input[name="guardian_organization"]').val(),
                        "guardian_name":element.closest('tr').find('input[name="guardian_name"]').val()
                    };*/
                    element.prop("disabled", true);
                    //changefeedback(element,loadingFeedback,'');
                    var url = BASE_URL+"admin/addGuardian";
                    // Send the data using post
                    var posting = $.post( url,form.serialize() + '&student_id=' + $('#student_id').val())
                    .done(function( data )
                    {
                        mdata=JSON.parse(data);
                        if(mdata.response==="success")
                        {
                            //set to success
                            var html='<div class="alert alert-success">success</div>';
                            $('#divtodisplay').html(html);
                            location.reload();
                            //element.prop("disabled", false);
                            //changefeedback(element,successFeedback,'has-success');
                        }
                        else
                        if(mdata.response==="already guardian")
                        {
                            var html='<div class="alert alert-warning">already guardian</div>';
                            $('#divtodisplay').html(html);
                        }
                        else
                        if(mdata.response==="cnic not available")
                        {
                            //var validator = $( "#signupform" ).validate();
                            //$("#signupform_cnic_error_message").show();
                            //element.prop("disabled", false);
                            //changefeedback(element,errorFeedback,'has-error');
                            /*$("#cnic").validate().showErrors({
                              "cnic": "Username already registered!"
                            });*/
                            var html='<div class="alert alert-danger">cnic not available</div>';
                            $('#divtodisplay').html(html);
                        }
                        else
                        {
                            //clearInput(element);
                            // alert(data);
                            var html='<div class="alert alert-danger">!</div>';
                            $('#divtodisplay').html(html);
                        }
                    })
                    .fail(function()
                    {
                        // alert( "error" );
                        var html='<div class="alert alert-danger">error!</div>';
                        $('#divtodisplay').html(html);
                    })
                    .always(function()
                    {
                        element.prop("disabled", false);
                        //alert( "finished" );
                    });
                }
            });
        </script>
        <script type="text/javascript">
            function delete_subject(id)
            {
                var agree = confirm("Are you sure you want to delete this?");
                if(agree)
                {
                    // $("#news-and-event"+id).fadeOut('slow');
                    $.post('<?php echo base_url().'admin/delete_subject/'?>', {id:id}, function(data)
                    {
                        if(data=='1')
                        {
                            location.reload();
                        }
                    });
                }
                else
                {
                    return false;
                }
            }
            function delete_guardian(id)
            {
                var agree = confirm("Are you sure you want to delete this?");
                if(agree)
                {
                    // $("#news-and-event"+id).fadeOut('slow');
                    $.post('<?php echo base_url().'admin/delete_guardian/'?>', {id:id}, function(data)
                    {
                        if(data=='1')
                        {
                            location.reload();
                        }
                    });
                }
                else
                {
                    return false;
                }
            }
        </script>
   </body>
</html>