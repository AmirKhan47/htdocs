	    <div class="page-bar">
	        <ul class="page-breadcrumb">
	            <li>
	                <a href="<?php echo SURL;?>school/admin_dashboard">Home</a>
	                <i class="fa fa-circle"></i>
	            </li>
	            <li>
	                <span>Guardian Update</span>
	            </li>
	        </ul>
	    </div>
		<div class="portlet light bordered ">
		            <div class="portlet-title">
		                <div class="caption ">
		                        <span class="caption-subject bold text-uppercase">Guardian Update</span>
		                    </div> 
		                <div class="actions">
		                </div>
		            </div>
		    <div class="portlet-body form">
		        <form action="<?php echo SURL.'admin/update_guardian/'.$guardian[0]['id'];?>" id="form_sample_16" class="form-horizontal" method="post" enctype="multipart/form-data">
		            <input type="hidden" id="challan_id" name="branch_id" value="">
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
		                                        <label class="control-label col-md-3"> CNIC <span class="required" aria-required="true">*</span></label>
		                                        <div class="col-md-9">
		                                            <div class="input-group">
		                                                <span class="input-group-addon">
		                                                    <i class="fa fa-user"></i>
		                                                </span>
		                                                <div class="input-icon right">
		                                                    <i class="fa"></i>
		                                                    <input type="text" name="guardian_national_id" data-rule-required="true" class="form-control" maxlength="15" minlength="15" id="cnic" value="<?php echo $guardian[0]['guardian_national_id']; ?>">
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="row">
		                             <div class="col-md-8">
		                                <div class="form-group">
		                                    <div class="form-group">
		                                        <label class="control-label col-md-3"> Relationship to child <span class="required" aria-required="true">*</span></label>
		                                        <div class="col-md-9">
		                                            <div class="input-group">
		                                                <span class="input-group-addon">
		                                                    <i class="fa fa-credit-card"></i>
		                                                </span>
		                                                <div class="input-icon right">
		                                                    <i class="fa"></i>
		                                                    <input type="text" value="<?php echo $guardians[0]['student_guardian_relationship'];?>" pattern="^[a-zA-Z ]*$" data-rule-required="true" placeholder="Father/Mother/etc"  name="student_guardian_relationship" class="form-control text-uppercase" >
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="row">
		                             <div class="col-md-8">
		                                <div class="form-group">
		                                    <div class="form-group">
		                                        <label class="control-label col-md-3"> Name <span class="required" aria-required="true">*</span></label>
		                                        <div class="col-md-9">
		                                            <div class="input-group">
		                                                <span class="input-group-addon">
		                                                    <i class="fa fa-credit-card"></i>
		                                                </span>
		                                                <div class="input-icon right">
		                                                    <i class="fa"></i>
		                                                    <input type="text" value="<?php echo $guardian[0]['guardian_name'];?>"  data-rule-required="true" name="guardian_name" placeholder="Abc Xyz" class="form-control text-uppercase" >
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="row">
		                             <div class="col-md-8">
		                                <div class="form-group">
		                                    <div class="form-group">
		                                        <label class="control-label col-md-3"> Occupation </label>
		                                        <div class="col-md-9">
		                                            <div class="input-group">
		                                                <span class="input-group-addon">
		                                                    <i class="fa fa-credit-card"></i>
		                                                </span>
		                                                <div class="input-icon right">
		                                                    <i class="fa"></i>
		                                                    <input type="text" value="<?php echo $guardian[0]['guardian_occupation'];?>" name="guardian_occupation" class="form-control" >
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="row">
		                             <div class="col-md-8">
		                                <div class="form-group">
		                                    <div class="form-group">
		                                        <label class="control-label col-md-3"> Designation </label>
		                                        <div class="col-md-9">
		                                            <div class="input-group">
		                                                <span class="input-group-addon">
		                                                    <i class="fa fa-credit-card"></i>
		                                                </span>
		                                                <div class="input-icon right">
		                                                    <i class="fa"></i>
		                                                    <input type="text" value="<?php echo $guardian[0]['guardian_designation'];?>" name="guardian_designation" class="form-control" >
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="row">
		                             <div class="col-md-8">
		                                <div class="form-group">
		                                    <div class="form-group">
		                                        <label class="control-label col-md-3"> Organization </label>
		                                        <div class="col-md-9">
		                                            <div class="input-group">
		                                                <span class="input-group-addon">
		                                                    <i class="fa fa-credit-card"></i>
		                                                </span>
		                                                <div class="input-icon right">
		                                                    <i class="fa"></i>
		                                                    <input type="text" value="<?php echo $guardian[0]['guardian_organization'];?>" name="guardian_organization" class="form-control" >
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="row">
			                        <div class="col-md-8">
		                                <div class="form-group">
		                                    <div class="form-group">
		                                        <label class="control-label col-md-3">Emergency Contact<span class="required">*</span></label>
		                                        <div class="col-md-9">
		                                            <div class="input-group">
		                                                <span class="input-group-addon">
		                                                   <i class="fa fa-calendar"></i>
		                                                </span>
		                                                <div class="input-icon right">
		                                                    <i class="fa"></i>
		                                                    <input type="text" minlength="12" maxlength="12" id="conact_cell" data-rule-required="true" name="contact_cell" value="<?php echo $contacts[0]['contact_cell'];?>" class="form-control">
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
		                            					<button type="submit" class="btn btn-success float-right">Update</button>
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
		<!-- <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>  -->
		<script src="<?php echo base_url().'assets/js/jquery.maskedinput.min.js'?>"></script>
 		<script src="<?php echo SURL. 'assets/global/scripts/datatable.js'?>" type="text/javascript"></script>
        <script src="<?php echo SURL. 'assets/global/plugins/datatables/datatables.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo SURL. 'assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'?>" type="text/javascript"></script>
        <script src="<?php echo SURL. 'assets/pages/scripts/table-datatables-responsive.min.js'?>" type="text/javascript"></script>  
    	<script src="<?php echo SURL. 'assets/pages/scripts/validation.js'?>" type="text/javascript"></script>
    	<script>
          $(document).ready(function()
          {
            $("input[name='guardian_national_id']").mask('99999-9999999-9').bind("blur", function () {
            var frm = $(this).parents("form");
            if ($.data( frm[0], 'validator' )) {
              var validator = $(this).parents("form").validate();
              validator.settings.onfocusout.apply(validator, [this]);
            }
          });
        });
        </script>
	</body>
</html>
