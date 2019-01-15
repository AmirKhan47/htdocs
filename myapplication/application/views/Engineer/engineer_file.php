<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('layouts/common'); ?>
	<style> 
	.help-block{color:#F00;}
	.error{color:#F00;}
	</style>
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
	<?php $this->load->view('layouts/header'); ?>
	<div class="page-container">
		<?php $this->load->view('layouts/side_bar_menu'); ?>
		<div class="page-content-wrapper">
			<div class="page-content">
				<?php $this->load->view('layouts/breadcrumb'); ?>

				<div class="row">
					<div class="col-md-12">
						<div class="portlet light bordered">
							<div class="portlet-title">
								<div class="caption font-dark">
									<i class="icon-settings font-dark"></i>
									<span class="caption-subject bold uppercase">Staff Files</span>
								</div>
								<div class="actions">
									<div class="btn-group">
										<a class="btn green-haze btn-outline btn-circle btn-lg" data-toggle="modal" href="#addAMCModel" data-hover="dropdown" data-close-others="true"> Add New File

										</a>

									</div>
								</div>
							</div>
							<div class="portlet-body">
								<div class="tab-content">
									<div class="tab-pane active" id="tab11">
										<form name="frmlegaccountlist" id="frmlegaccountlist" method="post" action="contacts/customer">
											<table style="cursor:pointer" class="table table-striped table-bordered table-hover table-checkable order-column" id="amc_tbl">
												<thead>
													<tr>
														<th>
															<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
																<input type="checkbox" class="group-checkable" id="select_all" />
																<span></span>
															</label>

														</th>

														<th> Expiry Date </th>
														<th> Type</th>
														<th> File Name</th>

													</tr>
												</thead>
												<tbody>
													<?php if(!empty($files)): ?>
													<?php $i=1; foreach($files as $row): ?>
													<tr>

														<td>
															<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
																<input type="checkbox" class="emp_checkbox" class="checkboxes" data-emp-id="<?php echo $row['doc_id'] ?>" />
																<span></span>
															</label>
														</td>

														<td><?php echo $row['expiry_date']; ?></td>
														<td><?php echo $row['type']; ?> </td>
														<td><a  href="<?php echo base_url(); ?>/uploaded/<?php echo $row['name']; ?>" download><?php echo $row['name']; ?></a>
														
														</td>

													</tr>

													<?php $i++; endforeach; ?>
												<?php endif; ?>
											</tbody>
										</table>

									</form>
									<div class="row">
										<div class="col-md-3 well">
											<span class="rows_selected" id="select_count">0 Selected</span>
											<a type="button" class="btn btn-sm btn-outline red tooltips pull-right" data-original-title="Delete Selected" data-placement="top" id="delete_records" data-action="<?php echo base_url() ?>index.php/Engineer/deleteFile" >Delete Selected</a>
										</div>

									</div>
									<div class="clearfix"></div>
								</div>


							</div>
							<!-- STRAT OF Add Project MODLE-->
							<div id="addAMCModel" class="modal fade" tabindex="-1" data-width="500">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
									<h4 class="modal-title"><strong>Add File</strong></h4>
								</div>
								<form role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/Engineer/uploadFiles/<?php echo $this->uri->segment(3); ?>" method="post" class="form-horizontal">
									<div class="form-body">
										<div class="modal-body">
											<div class="row">
												<div class="col-md-12">
													<strong> Select File Type <span class="required"> * </span></strong>
													<select class="form-control input-large" required  id="type"  name="type">
														<option></option>
														<option name="Emirates Id">Emirates Id Copy</option>
														<option name="Passport Copy">Passport Copy</option>
														<option name="Visa Copy">Visa Copy</option>
														<option name="Health Card Copy">Health Card Copy</option>
														<option name="Civil Defence Card Copy">Civil Defence Card Copy</option>
														<option name="Driving Licence Copy">Driving Licence Copy</option>
														<option name="Apprecation Letter Copy">Apprecation Letter Copy</option>
														<option name="Warning Letter Copy">Warning Letter Copy</option>

													</select>
												</br>
                                            <!-- <p>You can add new amc along their records.</p>
                                            <p><strong> Amc Name <span class="required"> * </span></strong>
                                                <input class="form-control input-large" id="amc_name" name="amc_name" type="text"/>
                                            </p>
                                            <p><strong> Amc Value <span class="required"> * </span></strong>
                                                <input type="text" class="form-control input-large" name="amc_value" id="amc_value">
                                            </p>
                                            <p><strong> Payment Terms <span class="required"> * </span></strong>
                                                <input class="form-control input-large" id="payment_terms" name="payment_terms" type="text"/>
                                            </p> -->
                                            <strong> Upload Engineer File <span class="required"> * </span></strong>

                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                            	<div class="input-group input-large">
                                            		<div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                            			<i class="fa fa-file fileinput-exists"></i>&nbsp;
                                            			<span class="fileinput-filename"> </span>
                                            		</div>
                                            		<span class="input-group-addon btn default btn-file">
                                            			<span class="fileinput-new"> Select file </span>
                                            			<span class="fileinput-exists"> Change </span>
                                            			<input type="file"  id="files" required name="files" > 
                                            		</span>
                                            		<a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                            	</div>

                                            </div>

                                        </div>
                                        <div class="col-md-9">  
                                        	<strong> Expiry Date <span class="required"> * </span> </strong>
                                        	<div class="input-group date date-picker " data-date-format="dd/mm/yyyy">
                                        		<input type="text" required class="form-control form-filter " readonly name="date" id="date">
                                        		<span class="input-group-btn">
                                        			<button class="btn btn-medium default" type="button">
                                        				<i class="fa fa-calendar"></i>
                                        			</button>
                                        		</span>
                                        	</div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                            	<div class="modal-footer">
                            		<input type="submit" id="submit" name="submit" class="btn green" value="Save" >
                            		<button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
                            	</div>
                            </div>
                        </form>
                    </div>
                    <!-- END OF Add Project MODLE -->
                </div>
            </div>
        </div>
    </div>


</div>
</div>
</div>
<!-- varibales for global use... -->
<script>
window.table_id = "amc_tbl";
</script>
<?php $this->load->view('layouts/footer'); ?>
<?php $this->load->view('layouts/common_js'); ?>

<script>
$(document).ready(function () {
	$(".date-picker").datepicker("setDate", new Date());

});
</script>            

<?php 
if($this->session->flashdata('success')){
	$message=$this->session->flashdata('success');
	echo "<script>    toastr.success('".$message."') </script>";
}else if($this->session->flashdata('error')){
	$message=$this->session->flashdata('error');
	echo "<script>    toastr.error('".$message."') </script>";
}
?>
</body>
</html>