<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo SURL;?>school/admin_dashboard">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Add Subject</span>
        </li>
    </ul>
</div>
<h3 class="page-title">Add Subject</h3>
<div class="portlet light bordered ">
    <div class="portlet-title">
        <div class="caption font-green-seagreen">
            <i class="fa fa-user font-green-seagreen"></i>
            <span class="caption-subject bold uppercase">Add Subject</span>
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
        <form action="<?php echo SURL.'subject/add_subject/';?>" id="" class="form-horizontal" method="post" enctype="multipart/form-data">
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
                                        <label class="control-label col-md-3">Classes<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <select name="class_id" class="form-control" required="">
                                                        <option value="" selected="">Select Class</option>
                                                        <?php foreach ($classes as $key => $value) { ?>
                                                            <option value="<?php echo $value['id'];?>"><?php echo $value['class_name'];?></option>
                                                        <?php } ?>
                                                    </select>
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
                                        <label class="control-label col-md-3">Subject Name<span class="required" aria-required="true">*</span></label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                                <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input type="text" class="form-control" data-rule-required="true" name="subject_name" value="" placeholder="" required="">
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
                            					<button type="submit" class="btn btn-success float-right">Submit</button>
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
<!-- <script src="<?php echo SURL. 'assets/global/plugins/jquery.min.js'?>" type="text/javascript"></script>
<script src="<?php echo SURL. 'assets/global/plugins/bootstrap/js/bootstrap.min.js'?>" type="text/javascript"></script>
<script src="<?php echo SURL. 'assets/global/plugins/js.cookie.min.js'?>" type="text/javascript"></script>
<script src="<?php echo SURL. 'assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js'?>" type="text/javascript"></script>
<script src="<?php echo SURL. 'assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js'?>" type="text/javascript"></script>
<script src="<?php echo SURL. 'assets/global/plugins/jquery.blockui.min.js'?>" type="text/javascript"></script>
<script src="<?php echo SURL. 'assets/global/plugins/uniform/jquery.uniform.min.js'?>" type="text/javascript"></script>
<script src="<?php echo SURL. 'assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js'?>" type="text/javascript"></script>
<script src="<?php echo SURL. 'assets/layouts/layout/scripts/jquery.dropselect.js'?>" type="text/javascript"></script> -->
<!-- <script src="<?php echo SURL. 'assets/global/plugins/jquery-inputmask/inputmask/inputmask.min.js'?>" type="text/javascript"></script> -->
<!-- <script src="<?php echo SURL. 'assets/global/plugins/jquery-inputmask/inputmask/jquery.inputmask.min.js'?>" type="text/javascript"></script> -->
<!-- <script src="<?php echo SURL. '/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js'?>" type="text/javascript"></script>
<script src="<?php echo SURL. '/assets/pages/scripts/form-input-mask.min.js'?>" type="text/javascript"></script> -->
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<!-- <script src="<?php echo SURL. 'assets/global/scripts/app.min.js'?>" type="text/javascript"></script> -->
<!-- END THEME GLOBAL SCRIPTS -->
 <!-- <script src="<?php echo SURL. 'assets/pages/scripts/form-validation-md.min.js'?>" type="text/javascript"></script> -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- <script src="<?php echo SURL. 'assets/global/plugins/jquery-validation/js/jquery.validate.min.js'?>" type="text/javascript"></script>
<script src="<?php echo SURL. 'assets/global/plugins/jquery-validation/js/additional-methods.min.js'?>" type="text/javascript"></script>
	<script src="<?php echo SURL. 'assets/layouts/layout/scripts/demo.min.js'?>" type="text/javascript"></script>
<script src="<?php echo SURL. 'assets/layouts/global/scripts/quick-sidebar.min.js'?>" type="text/javascript"></script> 
<script src="<?php echo SURL. 'assets/layouts/layout/scripts/layout.min.js'?>" type="text/javascript"></script>
	<script src="<?php echo SURL. 'assets/global/scripts/datatable.js'?>" type="text/javascript"></script>
<script src="<?php echo SURL. 'assets/global/plugins/datatables/datatables.min.js'?>" type="text/javascript"></script>
<script src="<?php echo SURL. 'assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'?>" type="text/javascript"></script>
<script src="<?php echo SURL. 'assets/pages/scripts/table-datatables-responsive.min.js'?>" type="text/javascript"></script>  
<script src="<?php echo SURL. 'assets/pages/scripts/validation.js'?>" type="text/javascript"></script> -->