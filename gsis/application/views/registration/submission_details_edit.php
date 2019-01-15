		<div class="page-bar">
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
	                <a href="<?php echo SURL.'challan/index/'.$result[0]['student_id'] ;?>">Challan Form</a>
	                <i class="fa fa-circle"></i>
	            </li>
	            <li>
	                <span>Challan From Submission</span>
	            </li>
	        </ul>
	    </div>
		<div class="portlet light bordered ">
	        <div class="portlet-title">
	            <div class="caption ">
	                <span class="caption-subject bold text-uppercase"> Submission Details</span>
	            </div> 
	            <div class="actions">
	            </div>
	        </div>
		    <div class="portlet-body form">
		        <form action="<?php echo SURL.'admin/submission_details_update/'.$result[0]['id'].'/'.$student_id;?>" id="form_sample_16" class="form-horizontal" method="post" enctype="multipart/form-data">
		            <input type="hidden" id="challan_id" name="challan_id" value="<?php echo $result[0]['id'] ?>">
		            <div class="form-body">
		                <div class="alert alert-danger display-hide">
		                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
		                <input type="hidden" name="_token" value="{{csrf_token()}}">
		                <div class="alert alert-block alert-info fade in">
		                   	<p><b>'<span style="color:red;">*</span>' fields are compulsory.</b></p>
		                </div>
		                <?php
		                    if ($this->session->flashdata('err_message'))
		                    {
		                ?>
		                        <div class="alert alert-danger">
		                            <button class="close" data-close="alert"></button>
		                            <span><?php echo $this->session->flashdata('err_message'); ?></span>
		                        </div>
		                <?php
		                    }

		                    if ($this->session->flashdata('ok_message'))
		                    {
		                ?>
		                        <div class="alert alert-success">
		                            <button class="close" data-close="alert"></button>
		                            <span><?php echo $this->session->flashdata('ok_message'); ?></span>
		                        </div>
		                <?php
		                    }
		                ?>
		                <div class="alert"><?php echo $error;?></div>
		                <div class="row">
		                    <div class="col-md-11">
		                        <div class="row">
		                            <div class="col-md-8">
		                                <div class="form-group">
		                                    <div class="form-group">
		                                        <label class="control-label col-md-3"> Bank Name <span class="required" aria-required="true"> * </span></label>
		                                        <div class="col-md-9">
		                                                <div class="input-icon right">
		                                                    <i class="fa"></i>
	                                                    	<select class="form-control" name="bank_name" data-rule-required="true">
	                                                    		<option value="" selected="">Select Bank</option>
	                                                    		<option value="Dubai">Dubai</option>
	                                                    		<option value="Islamic">Islamic</option>
	                                                    		<option value="Askari">Askari</option>
	                                                    	</select>
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
		                                        <label class="control-label col-md-3"> Date Of Payment <span class="required" aria-required="true"> * </span></label>
		                                        <div class="col-md-9">
		                                            <div class="input-group">
		                                            	<div class="input-icon right">
		                                        			<i class="fa"></i>
					                                        <select class="_58mq" name="challan_day_submitted" data-rule-required="true">
			                                                    <!-- <option value="<?php echo $challan_day_submitted ;?>">
			                                                        <?php echo $challan_day_submitted ;?>
			                                                    </option> -->
			                                                    <?php 
			                                                    for ($i=1; $i <= 31; $i++)
			                                                    { 
			                                                        echo '<option value="'.$i.'">'.$i.'</option>';
			                                                    }
			                                                    ?>
			                                                </select>
			                                                <select class="_58mq" name="challan_month_submitted" data-rule-required="true">
			                                                    <!-- <option value="<?php echo $challan_month_submitted ;?>">
			                                                        <?php echo $challan_month_submitted ;?> -->
			                                                    </option><option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sept</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>
			                                                </select>
			                                                <select class="_58mq" name="challan_year_submitted" data-rule-required="true">
			                                                   <!-- <option value="<?php echo date("Y"); ?>"> -->
			                                                        <?php echo date("Y"); ?>
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
		                        </div>
		                        <div class="row">
		                             <div class="col-md-8">
		                                <div class="form-group">
		                                    <div class="form-group">
		                                        <label class="control-label col-md-3"> Amount <span class="required" aria-required="true"> * </span></label>
		                                        <div class="col-md-9">
		                                                <div class="input-icon right">
		                                                    <i class="fa"></i>
		                                                    <input type="text" class="form-control" data-rule-required="true" id="" maxlength="15" minlength="1" name="amount" value="">
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
		                                        <label class="control-label col-md-3"> Upload Undertaking <span class="required" aria-required="true"> * </span></label>
		                                        <div class="col-md-9">
		                                                <div class="input-icon right">
		                                                    <i class="fa"></i>
		                                                    <input type="file" accept=".png,.jpeg,.jpg,.pdf" data-rule-required="true"  id="undertaking" name="undertaking" class="form-control" onchange="image_check()" placeholder="" value="">
		                                                    <div id="undertaking_error"></div>
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
		                                        <label class="control-label col-md-3"> Upload Copy of Paid Fee Challan <span class="required" aria-required="true"> * </span></label>
		                                        <div class="col-md-9">
		                                                <div class="input-icon right">
		                                                    <i class="fa"></i>
		                                                    <input type="file" accept=".png,.jpeg,.jpg,.pdf" data-rule-required="true"  id="copy_of_paid_fee_challan" name="copy_of_paid_fee_challan" class="form-control" onchange="image_check1()" placeholder="" value="">
		                                                    <div id="copy_of_paid_fee_challan_error"></div>
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
		                            					<button type="submit" id="challan_update_btn" class="btn btn-success float-right">Update</button>
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
		<div class="portlet light bordered bg-danger pt-0" style="padding-left: 0px;padding-top: 20px">
            <div class="portlet-body flip-scroll" style="padding-top: 0px;">
                <div class="h3 text-uppercase" style="margin-top: 0px;"><b>Edits</b>
                </div>
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th> Date Submitted </th>
                            <th> Amount Sumbitted</th>
                            <th> Bank Submitted</th>
                        </tr>
                    </thead>
                    <tbody>     
                        <?php
                            if(!$history)
                            {

                            }
                            else
                            {
                                foreach ($history as $mhistory)
                                {
                                    echo '<tr>';
                                    echo '<td>'.$mhistory['challan_date_submitted'].'</td>';
                                    echo '<td>'.$mhistory['challan_amount_submitted'].'</td>';
                                    echo '<td>'.$mhistory['challan_bank_submitted'].'</td>';
                                    echo '</tr>';
                                }
                            }
                        ?>
                    </tbody>
                </table>
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
         <!-- <script src="<?php echo SURL. 'assets/pages/scripts/form-validation-md.min.js'?>" type="text/javascript"></script> -->
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
    	<script src="<?php echo SURL. 'assets/pages/scripts/validation.js'?>" type="text/javascript"></script>
    	<script type="text/javascript">
    		function image_check()
    		{
   				var type_reg = /^image\/(jpg|png|jpeg)$/;
   				// var video_reg=/^video\/(mp4)$/;
   				var pdf_reg=/^application\/(pdf)$/;
   				var files = $('#undertaking').get(0).files;
   				var size=0;
   				var r=0;
   				for (i = 0; i < files.length; i++)
   				{
      				var type = files[i].type;
      				console.log(type);
      				if (type_reg.test(type))
      				{
        				console.log(type);
			       	}
			       	else
			       	if(video_reg.test(type))
			       	{
			           console.log(type);
			       	}
			       	else
			       	if(pdf_reg.test(type))
			       	{
			           console.log(type);
			       	}
			       	else
			       	{
			           r=1;
			           break;
			       	}
			       	var  file_size=  files[i].size;
			       	var isize = (file_size / 1024);
			       	isize = (Math.round(isize * 100) / 100);
			       	if(isize > 2048)
			       	{
           				size=1;
           				break;
       				}
			       	else
			       	{
			           console.log("small file  "+file_size);
			       	}
   				}
			   	if(r==1)
			   	{
			      $('#undertaking').addClass('error');
			       $('#undertaking').css('border-color','rgb(185, 74, 72)');
			       $('#undertaking_error').html('<span class="help-block form-error" style="color:#e73d4a;">Unsupported Format only images,pdf and mp4 video supported</span>');
			       $(':input[type="submit"]').prop('disabled', true);
			   	}
			   	else
			   	{
			    	if(size==1)
			       	{
			        	$('#undertaking').addClass('error');
			           	$('#undertaking').css('border-color','rgb(185, 74, 72)');
			           	$('#undertaking_error').html('<span class="help-block form-error" style="color:#e73d4a;">Large File Upload</span>');
			           	$(':input[type="submit"]').prop('disabled', true);
			    	}
			       	else
			     	{
			           	$('#undertaking').removeClass('error');
			           	$('#undertaking').css('border-color','#27a4b0');
			           	$('#undertaking_error').html('');
			           	$(':input[type="submit"]').prop('disabled', false);
			       	}
   				}
 			}
    	</script>
    	<script type="text/javascript">
    		function image_check1()
    		{
   				var type_reg = /^image\/(jpg|png|jpeg)$/;
   				// var video_reg=/^video\/(mp4)$/;
   				var pdf_reg=/^application\/(pdf)$/;
   				var files = $('#copy_of_paid_fee_challan').get(0).files;
   				var size=0;
   				var r=0;
   				for (i = 0; i < files.length; i++)
   				{
      				var type = files[i].type;
      				console.log(type);
      				if (type_reg.test(type))
      				{
        				console.log(type);
			       	}
			       	else
			       	if(video_reg.test(type))
			       	{
			           console.log(type);
			       	}
			       	else
			       	if(pdf_reg.test(type))
			       	{
			           console.log(type);
			       	}
			       	else
			       	{
			           r=1;
			           break;
			       	}
			       	var  file_size=  files[i].size;
			       	var isize = (file_size / 1024);
			       	isize = (Math.round(isize * 100) / 100);
			       	if(isize > 2048)
			       	{
           				size=1;
           				break;
       				}
			       	else
			       	{
			           console.log("small file  "+file_size);
			       	}
   				}
			   	if(r==1)
			   	{
			      $('#copy_of_paid_fee_challan').addClass('error');
			       $('#copy_of_paid_fee_challan').css('border-color','rgb(185, 74, 72)');
			       $('#copy_of_paid_fee_challan_error').html('<span class="help-block form-error" style="color:#e73d4a;">Unsupported Format only images,pdf and mp4 video supported</span>');
			       $(':input[type="submit"]').prop('disabled', true);
			   	}
			   	else
			   	{
			    	if(size==1)
			       	{
			        	$('#copy_of_paid_fee_challan').addClass('error');
			           	$('#copy_of_paid_fee_challan').css('border-color','rgb(185, 74, 72)');
			           	$('#copy_of_paid_fee_challan_error').html('<span class="help-block form-error" style="color:#e73d4a;">Large File Upload</span>');
			           	$(':input[type="submit"]').prop('disabled', true);
			    	}
			       	else
			     	{
			           	$('#copy_of_paid_fee_challan').removeClass('error');
			           	$('#copy_of_paid_fee_challan').css('border-color','#27a4b0');
			           	$('#copy_of_paid_fee_challan_error').html('');
			           	$(':input[type="submit"]').prop('disabled', false);
			       	}
   				}
 			}
    	</script>
	</body>
</html>
