<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    </head>
    <body>
        <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Dashboard</span>
                            </li>
                        </ul>
                        <div class="page-toolbar">
                            <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                                <i class="icon-calendar"></i>&nbsp;
                                <span class="thin uppercase hidden-xs"></span>&nbsp;
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </div>
                    </div>
  
  <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption font-green-seagreen">
                                                        <i class="fa fa-user font-green-seagreen"></i>
                                                        <span class="caption-subject bold uppercase"> Personal Information</span>
                                                    </div> 
                                                <div class="actions">
                                                  
                                                    
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="" id="form_sample_16" class="form-horizontal" method="post" enctype="multipart/form-data">
                                                    <div class="form-body">
                                                    <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Your form validation is successful! </div>
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
                                                                        <label class="control-label col-md-4">Student's Name<span class="required" aria-required="true">*</span></label>
                                                                        <div class="col-md-8">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                                    <i class="fa fa-user"></i>
                                                                                </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i>
                                                                                    <input type="text" data-rule-required="true" data-rule-minlength="3" data-rule-maxlength="40" id="name" name="fname" class="form-control" placeholder="" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Father's Name<span class="required" aria-required="true">*</span></label>
                                                                        <div class="col-md-8">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                                    <i class="fa fa-user"></i>
                                                                                </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i>
                                                                                    <input type="text"  data-rule-required="true" name="lname" class="form-control" placeholder="" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->


                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">CNIC/B.Form No<span class="required" aria-required="true">*</span></label>
                                                                        <div class="col-md-8">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                                    <i class="fa fa-credit-card"></i>
                                                                                </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i>
                                                                                    <input type="text" data-rule-required="true" pattern="[0-9+]{5}-[0-9+]{7}-[0-9]{1}" name="cnic" class="form-control" placeholder="" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Parent CNIC </label>
                                                                        <div class="col-md-8">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                                    <i class="fa fa-credit-card"></i>
                                                                                </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i>
                                                                                    <input type="text" name="passport" data-rule-required="true" class="form-control"  value="">
                                                                                </div>
                                                                                <div class="help-block">
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
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
                                                                                    <select class="form-control" data-rule-required="true" id="gender" name="gender" >
                                                                               <option>Select</option>
                                                                               <option value="male" >Male</option>
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
                                                                    <label class="col-md-4 control-label"> Date of Birth <span class="required" aria-required="true">*</span></label>
                                                                    <div class="col-md-7">
                                                                        <div class="input-group">
                                                                           
                                                                           <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                                                <input type="date" id="blood" name="blood" data-rule-required="true" value="" class="form-control" >
                                                                                <span class="input-group-btn">
                                                                                    <button class="btn default" type="button" readonly>
                                                                                        <i class="fa fa-calendar"></i>
                                                                                    </button>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <!--  -->
                                                            <!--  -->                                                    
                                                        <!--  -->
                                                        
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Blood Group<span class="required" aria-required="true">*</span></label>
                                                                        <div class="col-md-8">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                                    <i class="fa fa-tint"></i>
                                                                                </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i>
                                                                                    <select class="form-control" data-rule-required="true" id="blood" name="blood" >
                                                                               <option>Select</option>
                                                                               <option value="a" >A</option>
                                                                               <option value="b">B</option>
                                                                               <option value="ab" >AB</option>
                                                                               <option value="o">O</option>
                                                                                         </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
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
                                                                                    <input type="text" name="pob" class="form-control" placeholder="" value="">
                                                                                </div>
                                                                                <div class="help-block">
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        
                                                        <!--  -->
                                                        <!--  -->

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
                                                                                    <select class="form-control" data-rule-required="true" id="nationality" name="nationality">
                                                                                    
                                                                                      <option value="">Select</option>

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
                                                                        <label class="control-label col-md-4">Language<span class="required" aria-required="true">*</span></label>
                                                                        <div class="col-md-8">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                                    <i class="fa fa-language"></i>
                                                                                </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i>
                                                                                    <select class="form-control" data-rule-required="true" id="language" name="language" >
                                                                               <option>Select</option>
                                                                               <option  ></option>
                                                                               
                                                                                         </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/row-->
                                                        
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Religion<span class="required" aria-required="true">*</span></label>
                                                                        <div class="col-md-8">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                                    <i class="fa fa-credit-card"></i>
                                                                                </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i>
                                                                                    <input type="text" data-rule-required="true"  name="religion" class="form-control" placeholder="" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Email: </label>
                                                                        <div class="col-md-8">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                                    <i class="fa fa-envelope-o"></i>
                                                                                </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i>
                                                                                    <input type="text" name="email" class="form-control" placeholder="" value="">
                                                                                </div>
                                                                                <div class="help-block">
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        
                                                        <!--     <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                    <label class="control-label col-md-4">Select Image <span class="required">*</span></label>
                                                                    <div class="col-md-8">
                                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> 
                                                                    
                                                                           
                                                                            </div>
                                                                                
                                                                            <div>
                                                                                <span class="btn blue-madison  btn-file">
                                                                                    <span class="fileinput-new"> Select image </span>
                                                                                    <span class="fileinput-exists"> Change </span>
                                                                                            
                                                                              
                                                                                    <input type="file" name="image" data-rule-extension="jpg|jpeq|png|tif|gif|bmp"  > </span>
                                                                             
                                                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div> -->
                                                            
                                                            <!--  -->
                                                            <!--  -->
                                                            <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Phone<span class="required" aria-required="true">*</span></label>
                                                                        <div class="col-md-8">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                                    <i class="fa fa-phone"></i>
                                                                                </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i>
                                                                                    <input type="text" data-rule-required="true"  name="phone" class="form-control" placeholder="" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Mobile: </label>
                                                                        <div class="col-md-8">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                                    <i class="fa fa-phone"></i>
                                                                                </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i>
                                                                                    <input type="text" name="mobile" class="form-control" placeholder="" value="">
                                                                                </div>
                                                                                <div class="help-block">
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                            <!--  -->
                                                            <!--  -->
                                                        <div class="row">
                                                            
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Postal Address<span class="required" aria-required="true">*</span></label>
                                                                        <div class="col-md-8">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                                    <i class="fa fa-map-marker"></i>
                                                                                </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i>
                                                                                    <input type="text" data-rule-required="true" data-rule-minlength="3" data-rule-maxlength="80" name="PApresent" class="form-control" placeholder="Present" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                             <div class="col-md-6">
                                                               <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Postal Address<span class="required" aria-required="true">*</span></label>
                                                                        <div class="col-md-8">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                                    <i class="fa fa-map-marker"></i>
                                                                                </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i>
                                                                                    <input type="text" data-rule-required="true"  name="PApermanent" class="form-control" placeholder="Permanent" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/row-->

                                                        <div class="row">
                                                           
                                                            <!--/span-->
                                                             <div class="col-md-6">
                                                                 <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Facebook ID<span class="required" aria-required="true">*</span></label>
                                                                        <div class="col-md-8">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                                    <i class="fa fa-facebook-official"></i>
                                                                                </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i>
                                                                                    <input type="text" data-rule-required="true" data-rule-maxlength="80" name="fb_id" class="form-control" placeholder="" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--  
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Guardian Name</label>
                                                                        <div class="col-md-8">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                                    <i class="fa fa-user"></i>
                                                                                </span>
                                                                                <div class="input-icon right">
                                                                                    <i class="fa"></i>
                                                                                    <input type="text" data-rule-minlength="3" data-rule-maxlength="80" name="guardianname" class="form-control" placeholder="" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                          
                                                        </div>
                                                         -->
                                                        <!--/row-->
                                                    </div>
                                                        
                                                 
                                                    
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-6">
                                                               <a href="" value="cancel" name="action" class="btn red-mint"><i class="glyphicon glyphicon-arrow-left"></i>
                                                                Go to menu</a>
                                                                <button type="submit" name="action" value="save" class="btn btn-md green-meadow"><i class="glyphicon glyphicon-ok-sign"></i>
                                                                Save & Close</button>
                                                               
                                                                <button name="action" type="submit" value="submit" class="btn btn-md green-meadow"><i class="glyphicon glyphicon-arrow-right"></i>
                                                                Submit & Next</button>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- END FORM-->
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
    <script src="<?php echo base_url(). 'assets/global/scripts/app.min.js'?>" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url(). 'assets/global/plugins/jquery-validation/js/jquery.validate.min.js'?>" type="text/javascript"></script>
<!--  --><script src="<?php echo base_url(). 'assets/global/plugins/jquery-validation/js/additional-methods.min.js'?>" type="text/javascript"></script>
   <script src="<?php echo base_url(). 'assets/layouts/layout/scripts/demo.min.js'?>" type="text/javascript"></script>
         <script src="<?php echo base_url(). 'assets/layouts/global/scripts/quick-sidebar.min.js'?>" type="text/javascript"></script> 
<!--  -->   

     <script src="<?php echo base_url(). 'assets/pages/scripts/validation.js'?>" type="text/javascript"></script>
   </body>
  </html>

    </body>

</html>