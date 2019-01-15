<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?php echo AURL.'Dashboard/'?>">Dashboard</a>
            
        </li>
        
    </ul>
    
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> Dashboard
    
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-green-seagreen">
            <i class="fa fa-user font-green-seagreen"></i>
            <span class="caption-subject bold uppercase">Dashboard</span>
        </div> 
        <div class="actions"> 
                                              
        </div>
    </div>

    <div class="portlet-body form">
        <?php
            if ($this->session->flashdata('err_message')) {
        ?>
                <div class="alert alert-danger">
                    <button class="close" data-close="alert"></button>
                    <span><?php echo $this->session->flashdata('err_message'); ?></span>
                </div>
        <?php
            }

            if ($this->session->flashdata('ok_message')) {
        ?>
                <div class="alert alert-success">
                    <button class="close" data-close="alert"></button>
                    <span><?php echo $this->session->flashdata('ok_message'); ?></span>
                </div>
        <?php
            }
        ?>
        
        <div class="row">
        	<div class="col-md-12">
        		<div class="portlet light bg-inverse">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-clock font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase">Overall Detail</span>
                                        
                        </div>
                        <div class="actions">
                                        
                        </div>
                    </div>
                    <div class="portlet-body">
                    	<div class="row">
                    		<div class="col-md-12">
                    			<form class="form-horizontal" id="overall-form" action="">
		                    		<div class="row">
		                    			<div class="col-md-5">
		                    				<div class="form-group">
				                                <label class="control-label col-md-2">From<span class="required" aria-required="true">*</span></label>
				                                <div class="col-md-10">
				                                    <input type="text" id="from_date" name="from_date" class="form-control date-picker c_date"  data-validation="required" autocomplete="off">
				                                    <div id="oferror"></div>
				                                    
				                                </div>
				                            </div>	
		                    			</div>
		                    			<div class="col-md-5">
		                    				<div class="form-group">
				                                <label class="control-label col-md-2">To<span class="required" aria-required="true">*</span></label>
				                                <div class="col-md-10">
				                                    <input type="text" id="to_date" name="to_date" class="form-control date-picker c_date"  data-validation="required" autocomplete="off">
				                                    <div id="oterror"></div>
				                                    
				                                    
				                                </div>
				                            </div>
		                    			</div>
		                    			<div class="col-md-2">
		                    				<button type="submit" name="o_submit" id="o_submit" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
		                    			</div>
		                    		</div>

		                    	</form>
                    		</div>
                    		<div class="col-md-12">
                    			<div class="portlet light bordered">
	                                <div class="portlet-body">
	                                	<table class="table table-bordered table-striped">
										    <tbody>
										      <tr>
										        <td>Assign Leads</td>
										        <td id='assign_lead'><?=$overall_leads['assign_lead'];?></td>
										        <td>Lead In Process</td>
										        <td id='lead_process'><?=$overall_leads['lead_process'];?></td>
										      </tr>
										      <tr>
										        <td>Accomplished Leads</td>
										        <td id='success_leads'><?=$overall_leads['success_leads'];?></td>
										        <td>Leads Failed</td>
										        <td id='fail_leads'><?=$overall_leads['fail_leads'];?></td>
										      </tr>
										      <tr>
										        <td>Rate of Success</td>
										        <td id='rate_success'><?=$overall_leads['rate_success'];?></td>
										        <td>Rate of Failure</td>
										        <td id='rate_fail'><?=$overall_leads['rate_fail'];?></td>
										      </tr>
										    </tbody>
										</table>
	                                    
	                                </div>
	                            </div>
                    			
                    		</div>
                    	</div>
                    	
                    	
                    	
                                    
                    </div>
                </div>
        		
        	</div>
        	<div class="col-md-12">
        		<div class="portlet light bg-inverse">
                    <div class="portlet-title">
                        <div class="caption font-green-sharp">
                            <i class="icon-bar-chart font-green-sharp"></i>
                            <span class="caption-subject bold uppercase">Leads Failed Precentage</span>
                                        
                        </div>
                        <div class="actions">
                                        
                        </div>
                    </div>
                    <div class="portlet-body">
                    	<div class="row">
                    		<div class="col-md-12">
                    			<form class="form-horizontal" id="fail-form">
                    				<div class="row">
                    					<div class="col-md-3">
		                    				<div class="form-group">
				                                <label class="control-label col-md-2">From<span class="required" aria-required="true">*</span></label>
				                                <div class="col-md-10">
				                                    <input type="text" id="from_fail" name="from_fail" class="form-control date-picker c_date"  data-validation="required" autocomplete="off">
				                                    
				                                    <input type="hidden" name="url" id="url" value=<?= AURL;?>>
				                                </div>
				                            </div>	
		                    			</div>
		                    			<div class="col-md-3">
		                    				<div class="form-group">
				                                <label class="control-label col-md-2">To<span class="required" aria-required="true">*</span></label>
				                                <div class="col-md-10">
				                                    <input type="text" id="to_fail" name="to_fail" class="form-control date-picker c_date"  data-validation="required" autocomplete="off">
				                                    
				                                    
				                                </div>
				                            </div>
		                    			</div>
		                    			<div class="col-md-3">
		                    				<div class="form-group">
				                                <label class="control-label col-md-2">RO<span class="required" aria-required="true">*</span></label>
				                                <div class="col-md-10">
				                                    <select class="form-control select2 ro_list"  id="ro_list" name="ro_list" data-validation="required" data-validation-error-msg="Please select RO">
				                                    	 
														  <optgroup label="Select">
				                                        	<option value="">Select</option>
						                                    <?php 
						                                        if (count($ro)>0) {
						                                            foreach ($ro as $key => $value) {
						                                    ?>    
						                                                <option value="<?=$value['id'];?>">
						                                                    <?= $value['Name'];?>        
						                                                </option>
						                                    <?php }
						                                        }
						                                    ?>
						                                </optgroup>
						                                <optgroup label="ALL">
														    <option value="all">All</option> 
														  </optgroup>
				                                    </select>
				                                
				                                         
				                                </div>
				                            </div>
		                    			</div>
		                    			<div class="col-md-3">
		                    				<button type="submit" name="fail_submit" id="fail_submit" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
		                    			</div>

                    				</div>
                    			</form>
                    		</div>
                    		<div class="col-md-12">
                    			<div class="portlet light bordered">
	                                <div class="portlet-body">
	                                	<div class="row">
		                                	<div class="col-md-12">
	                    						<label class="label label-primary" for="form_control_1">Total assign Leads : <strong id="assign-lead"> 5000</strong></label>
	                    						<label class="label label-danger pull-right" for="form_control_2">Total Leads Failed : <strong id="fail-lead"> 5000</strong></label>
	                    					</div>	
	                                	</div>
	                                	
	                                	<table class="table table-bordered table-striped">
	                                		<thead>
									            <tr>
									                <th><strong> Stages</strong></th>
									                <th><strong> Un-check</strong></th>
									                <th><strong> View </strong></th>
									                <th><strong> Work In Progress </strong></th>
									                <th><strong> Review </strong></th>
									                <th><strong> Presentation </strong></th>
									            </tr>
									        </thead>
										    <tbody>
										      <tr>
										        <td><strong>Stages</strong></td>
										        <td>500</td>
										        <td>50</td>
										        <td>4</td>
										        <td>400</td>
										        <td>241</td>
										      </tr>
										      <tr>
										        <td><strong>Rates</strong></td>
										        <td>42%</td>
										        <td>42%</td>
										        <td>0.75%</td>
										        <td>33.3%</td>
										        <td>20%</td>
										      </tr>
										    </tbody>
										</table>
	                                    
	                                </div>
	                            </div>
                    			
                    		</div>
                    	</div>
                                    
                    </div>
                </div>
        		
        	</div>
        	<div class="col-md-12">
        		<div class="row">
        			<div class="col-md-6">
        				<div class="portlet light bg-inverse">
		                    <div class="portlet-title">
		                        <div class="caption font-purple-plum">
		                            <i class="icon-paper-plane font-purple-plum"></i>
		                            <span class="caption-subject bold uppercase">RO Average Days</span>
		                                        
		                        </div>
		                        <div class="actions">
		                                        
		                        </div>
		                    </div>
		                    <div class="portlet-body">
		                    	<div class="row">
		                    		<div class="col-md-12">
		                    			<form class="form-horizontal" id="average-form">
		                    				<div class="row">
		                    					<div class="col-md-6">
		                    						<div class="form-group">
						                                <label class="control-label col-md-2">From<span class="required" aria-required="true">*</span></label>
						                                <div class="col-md-10">
						                                    <input type="text" id="from_average" name="from_average" class="form-control date-picker c_date"  data-validation="required" autocomplete="off">
						                                    
						                                    <input type="hidden" name="url" id="url" value=<?= AURL;?>>
						                                </div>
						                            </div>
		                    					</div>
		                    					<div class="col-md-6">
		                    						<div class="form-group">
						                                <label class="control-label col-md-2">RO<span class="required" aria-required="true">*</span></label>
						                                <div class="col-md-10">
						                                    <select class="form-control select2 ro_list"  id="ro_average" name="ro_average" data-validation="required" data-validation-error-msg="Please select RO">
						                                    	 
																  <optgroup label="Select">
						                                        	<option value="">Select</option>
								                                    <?php 
								                                        if (count($ro)>0) {
								                                            foreach ($ro as $key => $value) {
								                                    ?>    
								                                                <option value="<?=$value['id'];?>">
								                                                    <?= $value['Name'];?>        
								                                                </option>
								                                    <?php }
								                                        }
								                                    ?>
								                                </optgroup>
								                                <optgroup label="ALL">
																    <option value="all">All</option> 
																  </optgroup>
						                                    </select>
						                                
						                                         
						                                </div>
						                            </div>
		                    						
		                    					</div>
		                    					<div class="col-md-6">
		                    						<div class="form-group">
						                                <label class="control-label col-md-2">To<span class="required" aria-required="true">*</span></label>
						                                <div class="col-md-10">
						                                    <input type="text" id="to_average" name="to_average" class="form-control date-picker c_date"  data-validation="required" autocomplete="off">
						                                    
						                                    
						                                </div>
						                            </div>
		                    					</div>

		                    					<div class="col-md-3 pull-right">
				                    				<button type="submit" name="fail_submit" id="fail_submit" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
				                    			</div>
		                    				</div>
		                    			</form>
		                    			
		                    		</div>
		                    		<div class="col-md-12">
		                    			<div class="portlet light bordered">
			                                <div class="portlet-body">
			                                	<table class="table table-bordered table-striped">
			                                		<thead>
											            <tr>
											                <th><strong> Stages</strong></th>
											                <th><strong> Average Days</strong></th>   
											            </tr>
											        </thead>
												    <tbody>
												      <tr>
												        <td>Uncheck</td>
												        <td>15</td>
												      </tr>
												      <tr>
												        <td>Visit</td>
												        <td>7</td>
												      </tr>
												      <tr>
												        <td>Work In Progress</td>
												        <td>3</td>
												      </tr>
												      <tr>
												        <td>Review</td>
												        <td>9</td>
												      </tr>
												      <tr>
												        <td>Presentation</td>
												        <td>5</td>
												      </tr>
												      
												    </tbody>
												</table>
			                                    
			                                </div>
	                            		</div>
		                    		</div>
		                    	</div>
		                                    
		                    </div>
		                </div>
        				
        			</div>
        			<div class="col-md-6">
        				<div class="portlet light bg-inverse">
		                    <div class="portlet-title">
		                        <div class="caption font-yellow-crusta">
		                            <i class="icon-diamond font-yellow-crusta"></i>
		                            <span class="caption-subject bold uppercase">BDM Success Rate</span>
		                                        
		                        </div>
		                        <div class="actions">
		                                        
		                        </div>
		                    </div>
		                    <div class="portlet-body">
		                    	<div class="row">
		                    		<div class="co-md-12">
		                    			<form class="form-horizontal" id="bdm-form">
				                    		<div class="row">
				                    			<div class="col-md-5">
				                    				<div class="form-group">
									                        <label class="control-label col-md-2">From<span class="required" aria-required="true">*</span></label>
									                        <div class="col-md-10">
									                            <input type="text" id="from_bdm" name="from_bdm" class="form-control date-picker c_date"  data-validation="required" autocomplete="off">  
									                        </div>
								                    </div>
				                    			</div>
				                    			
				                    			<div class="col-md-5">
				                    				<div class="form-group">
								                        <label class="control-label col-md-2">To<span class="required" aria-required="true">*</span>  </label>
								                        <div class="col-md-10">
								                            <input type="text" id="to_bdm" name="to_bdm" class="form-control date-picker c_date"  data-validation="required" autocomplete="off">    
								                        </div>
								                    </div>
				                    			</div>

				                    			<div class="col-md-2">
						                    		<button type="submit" name="fail_submit" id="fail_submit" class="btn btn-success"><i class="fa fa-search"></i></button>
						                    	</div>
				                    		</div>
				                    	</form>
		                    		</div>
		                    		<div class="col-md-12">
		                    			<div class="portlet light bordered">
			                                <div class="portlet-body">
			                                	<div class="row">
				                                	<div class="col-md-12">
			                    						<label class="label label-danger pull-right" for="form_control_1">Total BDM : <strong id="total-bdm"> 8</strong></label>
			                    						
			                    					</div>	
			                                	</div>
			                                	
			                                	<table class="table table-bordered table-striped">
			                                		<thead>
											            <tr>
											                <th><strong> BDM</strong></th>
											                <th><strong> Total Registered Leads</strong></th>
											                <th><strong> Total Closed </strong></th>
											                <th><strong> Success % </strong></th>
											            </tr>
											        </thead>
												    <tbody>
												      <tr>
												        <td>Sufian</td>
												        <td>2500</td>
												        <td>200</td>
												        <td>8%</td>
												      </tr>
												      
												    </tbody>
												</table>
			                                    
			                                </div>
		                            	</div>		
			                    	</div>
		                    	</div>
		                    	
		                                    
		                    </div>
		                </div>
        			</div>
        		</div>
        		
        	</div>

        </div>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>

  $.validate({
    modules : 'location, date, security, file',
    
  });

  var base_url='<?php echo AURL;?>';

  $('#o_submit').click(function(e){
  	e.preventDefault();
  	var serialized = $('#overall-form').serialize();
  	var from_date=$('#from_date').val();
  	var to_date=$('#to_date').val();
  	if(from_date==''){
  		$('#from_date').addClass('error');
        $('#from_date').css('border-color','rgb(185, 74, 72)');
        $('#oferror').html('<span class="help-block form-error" style="color:#e73d4a;">This is a required field</span>');
        // $('#o_submit').prop('disabled', true);
        exit;
  	}

  	if(to_date==''){
  		$('#to_date').addClass('error');
        $('#to_date').css('border-color','rgb(185, 74, 72)');
        $('#oterror').html('<span class="help-block form-error" style="color:#e73d4a;">This is a required field</span>');
        // $('#o_submit').prop('disabled', true);
        exit;
  	}
  	$.ajax({
  		url:base_url+'dashboard/overall',
  		method:'POST',
        dataType:'json',
        data:serialized,
        success:function(data){
        	if(data!= 3){
        		$('#assign_lead').html(data.assign_lead);
	        	$('#lead_process').html(data.lead_process);
	        	$('#success_leads').html(data.success_leads);
	        	$('#fail_leads').html(data.fail_leads);
	        	$('#rate_success').html(data.rate_success);
	        	$('#rate_fail').html(data.rate_fail);	
        	}else{
        		window.location.href=base_url+ 'auth/';
        	}
        	

        }

  	});


  });

 

</script>