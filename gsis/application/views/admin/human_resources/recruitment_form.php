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
                <span class="caption-subject bold uppercase "> Recruitment Form</span>
            </div> 
        <div class="actions">
        </div>
    </div>
    <div class="portlet-body form">
        <form id="recruitment_form" action="<?php echo SURL;?>recruitment/add_employee" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="form-body">
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert">
                    </button> You have some form errors. Please check below. 
                </div>
                <?php echo $error;?>
                <div class="alert alert-success display-hide">
                    <button class="close" data-close="alert"></button> Your form validation is successful! 
                </div>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
               <div class="alert alert-block alert-info fade in">
                    <ul>
                        <li><b>'<span style="color:red;">*</span>' Fields are compulsory.</b></li>
                    </ul>
                </div>                  
                <div class="row">
                    <div class="col-md-11">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Name<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input style="text-transform:uppercase;" type="text" id="employee_name" name="employee_name" class="form-control" placeholder="Ali" value="" data-validation="length" data-validation-length="min3">
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
                                                    <input type="text" id="employee_cnic" name="employee_cnic" maxlength="13" class="form-control" placeholder="1234567890123" value="" data-validation="length" data-validation-length="min13">
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
                                        <label class="control-label col-md-4">Upload Passport size picture<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="file" id="employee_picture_name" name="employee_picture_name" class="form-control" value="" title="Upload Your Latest Passport Size Picture"
                                                    data-validation="mime size required"
                                                    data-validation-allowing="png,jpg,jpeg"
                                                    data-validation-max-size="256kb"
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
                                        <label class="control-label col-md-4">Father Name<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" style="text-transform:uppercase;" id="employee_father_name"  name="employee_father_name" class="form-control" placeholder="Ali" value="" data-validation="length" data-validation-length="min3">
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
                                                    <input type="text" id="employee_father_cnic" name="employee_father_cnic" maxlength="13" class="form-control" placeholder="1234567890123" data-validation="length" data-validation-length="min13">
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
                                        <label class="control-label col-md-4">Email<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" id="contact_email"  name="contact_email" class="form-control" placeholder="abc@gmail.com" value="" data-validation="email">
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
                                                    <input type="text" id="contact_cell" name="contact_cell" class="form-control" maxlength="15" minlength="10" placeholder="03213456789" value="" data-validation="required">
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
                                        <label class="control-label col-md-4">Select Gender<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <select type="text" id="employee_gender" name="employee_gender" class="form-control" value="" data-validation="required">
                                                        <option value="" selected>Select Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
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
                                                    <input type="file" id="employee_cv" name="employee_cv" class="form-control" value="" title="Upload Your Latest CV"
                                                    data-validation="mime size required" 
                                                    data-validation-allowing="pdf" 
                                                    data-validation-max-size="2mb" 
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
                                                    <input type="text" class="form-control" id="contact_line" name="contact_line">
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
                                                    <input type="text" class="form-control" id="contact_line_ext" name="contact_line_ext">
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
                                                    <textarea class="form-control" id="address_local" minlength="5" name="address_local" rows="2" placeholder="Ho.xx, St.xx-x, Sec.x-x/x, xxxxxxxx" data-validation="required"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Residential City<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" name="address_city" id="address_city" class="form-control" placeholder="xxxxxxxx" value="" data-validation="required">
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
                                                    <textarea class="form-control" rows="2" id="address_local1" name="address_local1"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Permanent City</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" name="address_city1" id="address_city1" class="form-control" placeholder="" value="">
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
                                                    <select type="text" placeholder="" name="employee_martial_status" id="employee_martial_status" class="form-control"  data-validation="required">
                                                        <option value="" selected>Select Martial Status</option>
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
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
                                        <label class="control-label col-md-4">Husband/Wife CNIC</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" id="employee_husband_wife_cnic" placeholder="XXXXX-XXXXXXX-X" name="employee_husband_wife_cnic" class="form-control" placeholder="" value="" data-validation="number" disabled="">
                                                </div>
                                                <div class="help-block"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-offset-1"><h4><b>Applying For:</b></h4></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Position<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-8" style="padding-left: 0px;">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <select type="text" class="form-control" name="position_id" id="position_id" data-validation="required">
                                                        <option value="" selected>Select Position</option> 
                                                        <?php foreach ($positions as $key => $value) 
                                                            {
                                                        ?>
                                                                <option value="<?php echo $value['position_id'];?>">
                                                                	<?php echo $value['position_name'];?>
                                                                </option>  
                                                        <?php
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
                                        <label class="control-label col-md-4">Level</label>
                                        <div class="col-md-8" style="padding-left: 0px;">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <select name="level_id" id="level_id" class="form-control" placeholder="" disabled="">
                                                        <option value="">Select Level</option>
                                                        <?php foreach ($levels as $key => $value) 
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
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Class</label>
                                        <div class="col-md-8" style="padding-left: 0px;">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <select name="class_id" id="class_id" class="form-control" placeholder="" disabled="">
                                                        <option value="">Select Class</option>
                                                        <?php foreach ($classes as $key => $value) 
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
                                </div>
                            </div> -->
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Subject</label>
                                        <div class="col-md-8" style="padding-left: 0px;">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <select name="subject_id" id="subject_id" class="form-control" placeholder="" disabled="">
                                                        <option value="">Select Subject</option>
                                                        <?php foreach ($subjects as $key => $value) 
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
                                </div>
                            </div> -->
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Branch<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-8" style="padding-left: 0px;">
                                            <div class="input-group">
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <select name="branch_id" id="branch_id" class="form-control" placeholder="" data-validation="required">
                                                        <option value="">Select Branch</option>
                                                        <?php foreach ($branches as $key => $value) 
                                                            {
                                                        ?>
                                                                <option value="<?php echo $value['id'];?>"><?php echo $value['branch_name'];?></option>  
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-5 col-md-6">
                            <!-- <div class="g-recaptcha" data-sitekey="6LfTe1IUAAAAANprIefnCZJwBYdZGzvVpnujdxCY"></div> -->
                            <button type="submit" id="submit_recruitment_form" name="submit" value="submit" class="btn btn-md green-meadow"><i class="glyphicon glyphicon-ok-sign"></i>
                            Submit</button>
                            <div id="errors"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
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
<!-- <script src="<?php echo base_url(). 'assets/global/scripts/app.min.js'?>" type="text/javascript"></script> -->
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?php echo base_url(). 'assets/global/plugins/jquery-validation/js/jquery.validate.min.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url(). 'assets/global/plugins/jquery-validation/js/additional-methods.min.js'?>" type="text/javascript"></script>
<!-- <script src="<?php echo base_url(). 'assets/layouts/layout/scripts/demo.min.js'?>" type="text/javascript"></script> -->
<!-- <script src="<?php echo base_url(). 'assets/layouts/global/scripts/quick-sidebar.min.js'?>" type="text/javascript"></script> -->
<script src="<?php echo base_url().'assets/js/jquery.maskedinput.min.js'?>"></script>
<!-- <script src="<?php echo base_url(). 'assets/pages/scripts/validation.js'?>" type="text/javascript"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $.validate(
    {
        validateOnBlur : true,
        errorMessagePosition : 'top',
        scrollToTopOnError : true,
        modules : 'location, date, security, file',
        onModulesLoaded : function()
        {
            // $('#country').suggestCountry();
            // // Show strength of password
            // $('input[name="password"]').displayPasswordStrength();
            // $( "#datepicker" ).datepicker();
        }
    });
    // Restrict presentation length
    $('#address_local').restrictLength( $('#pres-max-length') );
    $('#address_local1').restrictLength( $('#pres-max-length1') );
</script>
<!-- <script type="text/javascript">
    $(document).ready(function()
    {
        $('select[name="position_id"]').on('change', function()
        {
            var position_id = $(this).val();
            if(position_id)
            {
                $.ajax(
                {
                    url: '<?php echo SURL;?>recruitment/get_classes/'+position_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data)
                    {
                        $('select[name="city"]').empty();
                        $.each(data, function(key, value)
                        {
                            $('select[name="city"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }
                });
            }
            else
            {
                $('select[name="city"]').empty();
            }
        });
    });
</script> -->
<script type="text/javascript">
    $(document).ready(function()
    {
        $('#employee_martial_status').change(function()
        {
            if($('#employee_martial_status').val()=='Married')
            {
                $('#employee_husband_wife_cnic').prop('disabled', false);
            }
            else
            {
                $('#employee_husband_wife_cnic').prop('disabled', true);  
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function()
    {
        $('#position_id').change(function()
        {
	    		var position_name=$.trim($("#position_id").children("option:selected").text());
            if(position_name=='Teacher')
            {
                $('#level_id').prop('disabled', false);
                // $('#subject_id').prop('disabled', false);
            }
            else
            {
                $('#level_id').prop('disabled', true);  
                // $('#subject_id').prop('disabled', true); 
            }
        });
    });
</script>
    </body>
</html>