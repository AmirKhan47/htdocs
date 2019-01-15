                    <!-- END THEME PANEL -->
                    <!-- BEGIN PAGE BAR -->
	    <div class="page-bar">
	        <ul class="page-breadcrumb">
	            <li>
	                <a href="index.html">Portal</a>
	                <i class="fa fa-circle"></i>
	            </li>
	            <li>
	                <span>Submission Details</span>
	            </li>
	        </ul>
	    </div>

		<div class="portlet light bordered ">
		            <div class="portlet-title">
		                <div class="caption ">
		                        <span class="caption-subject bold text-uppercase"> Submission Details </span>
		                </div>
		            </div>
		    <div class="portlet-body form">
		                <!-- BEGIN FORM-->
<!-- 		        <form action="<?php// echo SURL.'admin/submission_details_submit/'.$result[0]['student_id'];?>" id="form_sample_16" class="form-horizontal" method="post" enctype="multipart/form-data"> -->
		            <div class="form-body">
		            	<table class="table table-bordered table-striped table-condensed flip-content">
		            		<caption class="display-3 h3">Fee Submission Record</caption>
		            		<thead class="flip-content">
		            			<tr>
		            				<!-- <th>Student Name</th> -->
		            				<th>Bank</th>
		            				<th>Date</th>
		            				<th>Amount Paid</th>
		            				<th>Add</th>
		            				<th>Edit</th>
		            			</tr>
		            		</thead>
		            		<tbody>
		            			<?php foreach ($result as $key => $value)
                                    {
                                    	// echo "<pre>";
                                    	// print_r ($result);
                                    	// echo "</pre>";
                                    	// exit();
                                    	echo'<tr>';

		            						// echo'<td>'.$value['student_id'].'</td>';
		            						echo'<td>'.$value['challan_bank_submitted'].'</td>';
		            						echo'<td>'.$value['challan_date_submitted'].'</td>';
		            						echo'<td>'.$value['challan_amount_submitted'].'</td>';

	            						echo'<td>
                                            <button type="button" class="btn btn-circle btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Add New Row">
                                                <a style="color:white;" href="'.base_url().'admin/submission_details/'.$value['student_id'].'">
                                                    Add
                                                </a>
                                            </button>
                                        </td>';

		            					echo'<td>
                                                <button type="button" class="btn btn-circle btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Current Row">
                                                    <a style="color:white;" href="'.base_url().'admin/submission_details_edit/'.$value['student_id'].'">
                                                        Edit
                                                    </a>
                                                </button>
                                            </td>';

	            						echo'</tr>';
                                    } 
                                ?>
		            		</tbody>
		            	</table>
		            </div>
		        <!-- </form> -->
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
		<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script> 
 		<script src="<?php echo SURL. 'assets/global/scripts/datatable.js'?>" type="text/javascript"></script>
        <script src="<?php echo SURL. 'assets/global/plugins/datatables/datatables.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo SURL. 'assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'?>" type="text/javascript"></script>
        <script src="<?php echo SURL. 'assets/pages/scripts/table-datatables-responsive.min.js'?>" type="text/javascript"></script>  
    	<script src="<?php echo SURL. 'assets/pages/scripts/validation.js'?>" type="text/javascript"></script>
	</body>
</html>
