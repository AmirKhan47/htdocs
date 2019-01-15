<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo AURL.'dashboard/'?>">Dashboard</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?php echo AURL.'leads/review_detail/'.$leads['id'];?>">leads Detail</a>
            
        </li>
        
    </ul>
    
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> leads Detail
    
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-green-seagreen">
            <i class="fa fa-user font-green-seagreen"></i>
            <span class="caption-subject bold uppercase"> leads Detail</span>
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
        <!-- Customer and Assigning Detail -->
        <div class="row">

            <div class="col-md-6">
                <div class="portlet light bg-inverse">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                                <i class="icon-user font-red-sunglo"></i>
                                <span class="caption-subject bold uppercase">Customer Detail</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <ul class="list-group">
                              <li class="list-group-item">Lead Serial Number : <strong><?=$leads['id'];?></strong></li>
                              <li class="list-group-item">Customer Name : <strong><?=$leads['name'];?></strong></li>
                              <li class="list-group-item">Designation : <strong><?=$leads['designation'];?></strong></li>
                              <li class="list-group-item">Address : <strong><?=$leads['address'];?></strong></li>
                            </ul>
                                    
                        </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="portlet light bg-inverse">
                    <div class="portlet-title">
                        <div class="caption font-yellow-crusta">
                            <i class="icon-pin font-yellow-crusta"></i>
                            <span class="caption-subject font-yellow-crusta bold uppercase">Assigning Detail</span>
                                        
                        </div>
                                    
                    </div>
                    <div class="portlet-body">
                        <ul class="list-group">
                              <li class="list-group-item">BDM : <strong><?=$leads['bdm'];?></strong></li>
                              <li class="list-group-item">RO : <strong><?=$leads['ro'];?></strong></li>
                              <li class="list-group-item">Status : <strong id="status1">
                                <?=$leads['status'];?>    
                                </strong><input type="hidden" name="status2" id="status2" value="<?=$leads['status'];?>" /></li>
                              <li class="list-group-item">Category :
                                <?php
                                if($leads['priority']==1){
                //red
                                    $color='<div style="width: 1vw; height: 1vw; border: 2px solid black; border-radius: 50%; background: #ff4d4d; margin-top: -15px; margin-left: 80px;"></div>';
                                }elseif ($leads['priority']==2) { 
                                    //green
                                    $color='<div style="width: 1vw; height: 1vw; border: 2px solid black; border-radius: 50%; background: #00b300; margin-top: -15px; margin-left: 80px;"></div>';
                                }elseif ($leads['priority']==3) {
                                    //blue
                                    $color='<div style="width: 1vw; height: 1vw; border: 2px solid black; border-radius: 50%; background: #6666ff; margin-top: -15px; margin-left: 80px;"></div></div>';
                                }elseif ($leads['priority']==4) {
                                    //white
                                    $color='<div style="width: 1vw; height: 1vw; border: 2px solid black; border-radius: 50%;margin-top: -15px; margin-left: 80px;"></div>';
                                }
                                echo $color;
                                ?> 
                              </li>
                            </ul>
                                    
                    </div>
                </div>
            </div>

        </div>
        <!--End of Customer and Assigning Detail -->
        <!--Tenure and Buttons -->
        <div class="row">

            <div class="col-md-6">
                <div class="portlet light bg-inverse">
                    <div class="portlet-title">
                        <div class="caption font-purple-plum">
                                <i class="icon-clock font-purple-plum"></i>
                                <span class="caption-subject font-purple-plum bold uppercase">Tenure</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <ul class="list-group">
                              <li class="list-group-item">Assigned Date : <strong><?php
                              if($leads['created_date'] !=''){
                                echo date('d-m-Y',strtotime($leads['created_date']));
                              } 
                              ;?></strong></li>
                              <li class="list-group-item">Total Date with RO : 
                              <strong>
                              <?php
                              if($leads['created_date'] !=''){
                                $now = time(); // or your date as well
                                $your_date = strtotime($leads['created_date']);
                                $datediff = $now - $your_date;

                                echo round($datediff / (60 * 60 * 24));

                              }
                                
                              ?> </strong>
                              </li>
                            </ul>
                                    
                        </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="portlet light bg-inverse">
                    <div class="portlet-title">
                        <div class="caption font-green-sharp">
                            <i class="icon-settings font-green-sharp"></i>
                            <span class="caption-subject font-green-sharp bold uppercase">Action Buttons</span>
                                        
                        </div>
                                    
                    </div>
                    <div class="portlet-body text-center">

                        <a class="btn btn-success"><i class="fa fa-comments"></i> Chat</a>
                        <a class="btn btn-danger" id="r-fail"><i class="fa fa-exclamation-triangle"></i> Fail</a>
                        <a class="btn btn-info"><i class="fa fa-envelope"></i> Email</a>
                        <a class="btn btn-warning"><i class="fa fa-tasks"></i> Add Task</a>
                                    
                    </div>
                </div>
            </div>

        </div>

        <!--End of Tenure and Buttons -->
        <!--BDM upload File -->
        <div class="row">

            <div class="col-md-12">
                <div class="portlet light bg-inverse">
                    <div class="portlet-title">
                        <div class="caption font-purple-plum">
                                <i class="icon-notebook font-red-flamingo"></i>
                                <span class="caption-subject font-red-flamingo bold uppercase">BDM Upload Files</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <?php
                              if(count($bdm_data)>0){                                
                            ?>
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th> Sno </th>
                                        <th> Name</th>
                                        <th>Uploaded Date</th>
                                        <th><div class="pull-right">Download</div></th>

                                    </tr>
                                </thead> 
                                <tbody>
                            <?php
                            $i=1;
                               foreach ($bdm_data as $key => $value) {
                                   # code...
                            ?> 
                                    <tr>
                                        <td><?=$i;?></td>
                                        <td><?=str_replace(' ', '_',$leads['name']).'_'.$value['image'];?></td>
                                        <td><?=date('d-m-Y',strtotime($value['created_date']));?></td>
                                        <td><div class="pull-right"><a href="<?php echo Upload.'customer/'.$value['image'];?>" class="btn btn-success" download="<?=str_replace(' ', '_',$leads['name']).'_'.$value['image'];?>""><i class="fa fa-download"></i></a></div></td>

                                    </tr>   
                            <?php  $i++;
                                }
                            ?>    
                                </tbody>
                            </table>
                            <?php }
                            else{
                                echo '<div class="alert alert-danger">
                                  No data Uploaded
                                </div>';
                            }
                            ?>      
                        </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="portlet light bg-inverse">
                    <div class="portlet-title tabbable-line">
                        <div class="caption font-green-sharp">
                            <i class="icon-settings font-green-sharp"></i>
                            <span class="caption-subject font-green-sharp bold uppercase">Lead Assigned</span>           
                        </div>
                        <ul class="nav nav-tabs" id="new-list">
                            <?php
                                foreach ($lead_stages as $key => $value) {
                                    if($value['stage_name_id']== 3){
                                       echo '<li  id="visit-list">
                                             <a href="#portlet_tab1" data-toggle="tab"> Visit </a>
                                            </li>'; 
                                    }elseif ($value['stage_name_id']== 4) {
                                        echo '<li id="wip-list">
                                                <a href="#portlet_tab2" data-toggle="tab"  id="portlet1"> Work In Progress </a>
                                             </li>';
                                    }elseif ($value['stage_name_id']== 6) {
                                        echo '<li id="pre-list">
                                                <a href="#portlet_tab3" data-toggle="tab"  id="portlet2"> Presentation </a>
                                             </li>';
                                    }
                                }
                            ?>
                            
                        </ul>
                                    
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <div class="tab-pane" id="portlet_tab1">
                                <form  id="visit-form" role="form" class="form-horizontal"  enctype="multipart/form-data">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="pull-right label label-success" for="form_control_1">Completion Date : <strong id="visit-completion"></strong></label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="portlet light bordered">
                                                            <div class="portlet-title">
                                                                <div class="caption font-green-sharp">
                                                                    <i class="icon-speech font-green-sharp"></i>
                                                                    <span class="caption-subject bold uppercase"> Visit Form Submission</span>
                                                                    <span class="caption-helper">
                                                                </div>
                                                                <div class="actions">
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="portlet-body">
                                                                <!-- visit form -->
                                                        <div class="form-group form-md-line-input">

                                                            <div class="md-checkbox-list">
                                                                <?php
                                                                if(isset($visit_doc['category_status'])){
                                                                    $s=explode('-',$visit_doc['category_status']);    
                                                                }
                                                                 
                                                                ?>
                                                                
                                                                <div class="md-checkbox">
                                                                    <input type="checkbox" id="site_visit" name="visit[]" value="1" class="md-check chk chk2" onclick="clickCheckbox()" <?php
                                                                    if(isset($visit_doc['category_status'])){
                                                                        if($s[0]==1){echo "checked";}    
                                                                    }

                                                                     
                                                                    
                                                                    ?>
                                                                    >
                                                                    <label for="site_visit">
                                                                        <span></span>
                                                                        <span class="check"></span>
                                                                        <span class="box"></span>Site Visit</label>
                                                                </div>

                                                                <div class="md-checkbox">
                                                                    <input type="checkbox" id="showroom_visit" name="visit[]" value="2" class="md-check chk chk2" onclick="clickCheckbox()" <?php
                                                                    if(isset($visit_doc['category_status'])){
                                                                        if(isset($s[1])){
                                                                         if($s[1]==2){echo "checked";}  

                                                                        }
                                                                        if ($s[0]==2) {
                                                                            echo "checked";
                                                                        }
                                                                            
                                                                    } 
                                                                    
                                                                    ?>
                                                                    >
                                                                    <label for="showroom_visit">
                                                                        <span></span>
                                                                        <span class="check"></span>
                                                                        <span class="box"></span>Showroom Visit</label>
                                                                </div>
                                                                <div id="eumsg"></div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  for="measurement">Measurement:</label>
                                                            <input type="file" class="form-control chk2" id="measurement" name="measurement" multiple data-validation="required" <?php if($lead_detail==1){echo 'disabled';}?> >
                                                            <input type="hidden" class="form-control" id="lead_id" name="lead_id" value="<?=$leads['id'];?>" >
                                                            <input type="hidden" class="form-control" id="visit_stage_id" name="visit_stage_id" value="3" >
                                                            <input type="hidden" class="form-control" id="stage_id" name="stage_id" value="<?=$leads['stage_id'];?>" >
                                                            

                                                            <input type="hidden" class="form-control" id="visit_assign_id" name="visit_assign_id" value="<?=$leads['assign_id'];?>" >
                                                        </div>
                                                        <button type="submit" class="btn btn-info chk2" id="upload" <?php if($lead_detail==1){echo 'disabled';}?>><i class="fa fa-upload"></i> Upload</button>
                                                        <button type="button" class="btn btn-success chk3" id="visit_submit" name="visit_submit" <?php if($lead_detail==1){echo 'style="display:none;"';}?>><i class="fa fa-arrow-circle-right"></i> Submit</button>
                                                        <button type="button" class="btn btn-danger chk3" id="visit-fail" <?php if($lead_detail==1){echo 'style="display:none;"';}?>><i class="fa fa-exclamation-triangle"></i> fail</button>
                                                        <!-- End of visit form -->
                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="portlet light bordered">
                                                            <div class="portlet-title">
                                                                <div class="caption font-yellow-crusta">
                                                                    <i class="icon-clock font-yellow-crusta"></i>
                                                                    <span class="caption-subject bold uppercase"> Visit Previous Uploaded Record</span>
                                                                    
                                                                </div>
                                                                <div class="actions">
                                                                   
                                                                </div>
                                                            </div>
                                                            <div class="portlet-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div id="visit-table1"></div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="pull-right" id="visit-pagination1"></div>
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
                            <div class="tab-pane" id="portlet_tab2">
                                <form  id="wip-form" role="form" class="form-horizontal"  enctype="multipart/form-data">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="pull-right label label-success" for="form_control_1">Completion Date : <strong id="wip-completion"></strong></label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="portlet light bordered">
                                                            <div class="portlet-title">
                                                                <div class="caption font-green-sharp">
                                                                    <i class="icon-speech font-green-sharp"></i>
                                                                    <span class="caption-subject bold uppercase"> Work in progress Form Submission</span>
                                                                    
                                                                </div>
                                                                <div class="actions">

                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="portlet-body">
                                                                <div class="form-group">
                                                                    <label  for="measurement">3D Design:</label>
                                                                    <input type="file" class="form-control chk4" id="design" name="design" multiple data-validation="required">
                                                                    <input type="hidden" class="form-control" id="wip_lead_id" name="wip_lead_id" value="<?=$leads['id'];?>" >
                                                                    <input type="hidden" class="form-control" id="wip_stagen_id" name="wip_stagen_id" value="4" >
                                                                    <input type="hidden" class="form-control" id="wip_stage_id" name="wip_stage_id" value="<?=$leads['stage_id'];?>" >
                                                                    

                                                                    <input type="hidden" class="form-control" id="wip_assign_id" name="wip_assign_id" value="<?=$leads['assign_id'];?>" >
                                                                </div>

                                                                <div class="form-group">
                                                                    <label  for="measurement">Layout:</label>
                                                                    <input type="file" class="form-control chk4" id="layout" name="layout" multiple data-validation="required">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label  for="measurement">Quotation:</label>
                                                                    <input type="file" class="form-control chk4" id="quotation_wip" name="quotation_wip" multiple data-validation="required">
                                                                </div>
                                                                <button type="submit" class="btn btn-info chk4" id="wip_upload"><i class="fa fa-upload"></i> Upload</button>
                                                                <button type="button" class="btn btn-success chk5" id="wip_submit" name="wip_submit"><i class="fa fa-arrow-circle-right"></i> Submit</button>
                                                                <button type="button" class="btn btn-danger chk5" id="wip-fail"><i class="fa fa-exclamation-triangle"></i> fail</button>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="portlet light bordered">
                                                            <div class="portlet-title">
                                                                <div class="caption font-yellow-crusta">
                                                                    <i class="icon-clock font-yellow-crusta"></i>
                                                                    <span class="caption-subject bold uppercase"> Work in Progress Previous Uploaded Record</span>
                                                                    
                                                                </div>
                                                                <div class="actions">
                                                                   <a  class="btn btn-success achk" id="accept-btn"><i class="fa fa-check"></i> Accept</a>
                                                                   <a  class="btn btn-danger achk" id="reject-btn"><i class="fa fa-times"></i> Reject</a>
                                                                </div>
                                                            </div>
                                                            <div class="portlet-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div id="wip-table1"></div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="pull-right" id="wip-pagination1"></div>
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
                            <div class="tab-pane" id="portlet_tab3">
                                <form  id="pre-form" role="form" class="form-horizontal"  enctype="multipart/form-data">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="pull-right label label-success" for="form_control_1">Completion Date : <strong id="pre-completion"></strong></label>

                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="portlet light bordered">
                                                            <div class="portlet-title">
                                                                <div class="caption font-green-sharp">
                                                                    <i class="icon-speech font-green-sharp"></i>
                                                                    <span class="caption-subject bold uppercase"> Presentation Form Submission</span>
                                                                    
                                                                </div>
                                                                <div class="actions">
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="portlet-body">
                                                                <div class="form-group">
                                                                    <label  for="measurement">Quotation:</label>
                                                                    <input type="file" class="form-control chk6" id="quotation_pre" name="quotation_pre" multiple data-validation="required">
                                                                    <input type="hidden" class="form-control" id="pre_lead_id" name="pre_lead_id" value="<?=$leads['id'];?>" >
                                                                    <input type="hidden" class="form-control" id="pre_stagen_id" name="pre_stagen_id" value="6" >
                                                                    <input type="hidden" class="form-control" id="pre_stage_id" name="pre_stage_id" value="<?=$leads['stage_id'];?>" >
                                                                    

                                                                    <input type="hidden" class="form-control" id="pre_assign_id" name="pre_assign_id" value="<?=$leads['assign_id'];?>" >
                                                                </div>
                                                                <button type="submit" class="btn btn-info chk6" id="pre_upload"><i class="fa fa-upload"></i> Upload</button>
                                                                <button type="button" class="btn btn-success chk7" id="pre_submit" name="pre_submit"><i class="fa fa-arrow-circle-right"></i> Submit</button>
                                                                <button type="button" class="btn btn-danger chk7" id="pre-fail"><i class="fa fa-exclamation-triangle"></i> fail</button>
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="portlet light bordered">
                                                            <div class="portlet-title">
                                                                <div class="caption font-yellow-crusta">
                                                                    <i class="icon-clock font-yellow-crusta"></i>
                                                                    <span class="caption-subject bold uppercase"> Presentation Previous Uploaded Record</span>
                                                                    
                                                                </div>
                                                                <div class="actions">
                                                                   
                                                                </div>
                                                            </div>
                                                            <div class="portlet-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div id="pre-table1"></div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="pull-right" id="pre-pagination1"></div>
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
                    </div>
                </div>
            </div>

        </div>
        <!--End of BDM upload File -->
        <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Confirmation</h4>
                    </div>
                    <div class="modal-body">
                        <p> Are you sure submit it ?</p>
                    </div>
                    <div class="modal-footer">
                        <form id="continue-form">
                            <input type="hidden" class="form-control" id="lead_id1" name="lead_id1" value="<?=$leads['id'];?>" >
                            <input type="hidden" class="form-control" id="stage_id1" name="stage_id1" value="<?=$leads['stage_id'];?>" >
                            <input type="hidden" class="form-control" id="assign_id1" name="assign_id1" value="<?=$leads['assign_id'];?>" >
                            <input type="hidden" class="form-control" id="stage" name="stage">
                            <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                            <button type="submit" data-dismiss="modal" class="btn green" id="continue-submit">Submit</button>    
                        </form>
                        
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

  var url='<?php echo AURL;?>';
  var base_url='<?php echo AURL;?>';



  $('#upload').click(function(e){
    e.preventDefault();
    var checkedNum = $('input[name="visit[]"]:checked').length;
    // var file_data = $('input[name="measurement"]')[0].files;
    // var form = $('#visit-form')[0];
    var data = new FormData();

    //Form data
    var form_data = $('#visit-form').serializeArray();
    $.each(form_data, function (key, input) {
        data.append(input.name, input.value);
    });

        //File data
    var file_data = $('input[name="measurement"]')[0].files;
    for (var i = 0; i < file_data.length; i++) {
        data.append("measurement[]", file_data[i]);
    }
    //var formData = new FormData(form);
    data.append('key', 'value');
    var lead_id=$('#lead_id').val();
    if (!checkedNum){
        $(".md-checkbox").addClass('has-error');
        $(".chk").addClass('error');
        $(".chk").css('border-color','rgb(185, 74, 72)');
        $('#eumsg').html('<span class="form-error has-error" style="color:#e73d4a;">Please click one checkbox</span>');
        return false;
    }else{
        $.ajax({
            url:url+'lead/upload_visit',
            type:'POST',
            data:data,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                if(data==1){
                    $("#visit-form")[0].reset();
                    visit_table(1);
                }else if(data==3){
                    window.location.href=base_url+ 'auth/';

                }else{
                    window.location.href=url+ 'lead/detail/'+lead_id;

                }
            }

        });

    }
  });


  $('#wip_upload').click(function(e){
    e.preventDefault();

    var data = new FormData();

    var form_data = $('#wip-form').serializeArray();
    $.each(form_data, function (key, input) {
        data.append(input.name, input.value);
    });

    //input 3d design
    var design = $('input[name="design"]')[0].files;
    for (var i = 0; i < design.length; i++) {
        data.append("design[]", design[i]);
    }

     //input layout
    var layout = $('input[name="layout"]')[0].files;
    for (var i = 0; i < layout.length; i++) {
        data.append("layout[]", layout[i]);
    }

     //input quatation
    var quotation_wip = $('input[name="quotation_wip"]')[0].files;
    for (var i = 0; i < quotation_wip.length; i++) {
        data.append("quotation_wip[]", quotation_wip[i]);
    }

    data.append('key', 'value');
    var lead_id=$('#lead_id').val();

    $.ajax({
        url:url+'lead/upload_wip',
        type:'POST',
        data:data,
        cache:false,
        contentType: false,
        processData: false,
        success:function(data){
            if(data==1){
                $("#wip-form")[0].reset();
                wip_table(1);
            }else if(data==3){
                window.location.href=base_url+ 'auth/';
            }else{
                window.location.href=url+ 'lead/detail/'+lead_id;

            }
        }

    });


  });

  function clickCheckbox(){
    
    var checkedNum = $('input[name="visit[]"]:checked').length;
    if (!checkedNum){
        $(".md-checkbox").addClass('has-error');
        $(".chk").addClass('error');
        $(".chk").css('border-color','rgb(185, 74, 72)');
        $('#eumsg').html('<span class="form-error has-error" style="color:#e73d4a;">Please click one checkbox</span>');
        return false;
    }else{
        $(".md-checkbox").removeClass('has-error');
        $(".chk").removeClass('error');    
        $('#eumsg').html('');
    }
    
  }

  function visit_table(page){
    var lead_id=$('#lead_id').val();
    var visit_stage_id=$('#visit_stage_id').val();
    var visit_assign_id=$('#visit_assign_id').val();
    var status2=$('#status2').val();
    $.ajax({
        url:url+'leads/visit_table/'+page,
        method:'POST',
        dataType:'json',
        data:{lead_id1:lead_id,stage_id:visit_stage_id,assign_id1:visit_assign_id},
        success:function(data){
            // console.log(data.completion_date);exit();
            // if(data.completion_date!=''){
                $('.chk2').prop('disabled',true);//visit checkbox and image upload
                $('.chk3').hide();//visit submit button and fail button
                // $('#new-list').html('');
                
            // }
            $('#visit-completion').html(data.completion_date);
            $('#visit-table1').html(data.visit_table);
            $('#visit-pagination1').html(data.pagination_link);
        }
    });
  }

  function wip_table(page){
    var wip_lead_id=$('#wip_lead_id').val();
    var wip_stagen_id=$('#wip_stagen_id').val();
    var wip_assign_id=$('#wip_assign_id').val();

    $.ajax({
        url:url+'leads/wip_table/'+page,
        method:'POST',
        dataType:'json',
        data:{lead_id:wip_lead_id,stagename:wip_stagen_id,assign_id:wip_assign_id},
        success:function(data){
            // if(data.completion_date!=''){
                $('.chk4').prop('disabled',true);
                $('.chk5').hide();    
            // }
            
            $('#wip-completion').html(data.completion_date);
            $('#wip-table1').html(data.wip_table);
            $('#wip-pagination1').html(data.pagination_link);
        }

    });
  }
  function pre_table(page){
    var pre_lead_id=$('#pre_lead_id').val();
    var pre_stagen_id=$('#pre_stagen_id').val();
    var pre_assign_id=$('#pre_assign_id').val();
    

    $.ajax({
        url:url+'leads/pre_table/'+page,
        method:'POST',
        dataType:'json',
        data:{lead_id:pre_lead_id,stagename:pre_stagen_id,assign_id:pre_assign_id},
        success:function(data){
            // if(data.completion_date!=''){
                $('.chk6').prop('disabled',true);
                $('.chk7').hide();    
            // }
            
            $('#pre-completion').html(data.completion_date);
            $('#pre-table1').html(data.pre_table);
            $('#pre-pagination1').html(data.pagination_link);
        }

    });
  }

  visit_table(1);
  wip_table(1);
  pre_table(1);

  $(document).on("click", "#visit1 li a", function(event){
        event.preventDefault();
        var page = $(this).data("ci-pagination-page");
        visit_table(page);
  });

  $(document).on("click", "#wip1 li a", function(event){
        event.preventDefault();
        var page = $(this).data("ci-pagination-page");
        wip_table(page);
  });

  $(document).on("click", "#pre1 li a", function(event){
        event.preventDefault();
        var page = $(this).data("ci-pagination-page");
        pre_table(page);
  });

  $('#visit_submit').click(function(){
    $('#stage').val(1);//visit to wip
    $('#static').modal('show');

  });

  $('#wip_submit').click(function(){
    $('#stage').val(2);//wip to pre
    $('#static').modal('show');

  });

  $('#visit-fail').click(function(){
    $('#stage').val(4);
    $('#static').modal('show');

  });

  $('#wip-fail').click(function(){
    $('#stage').val(4);
    $('#static').modal('show');

  });

  $('#r-fail').click(function(){
    $('#stage').val(4);
    $('#static').modal('show');

  });

  $('#reject-btn').click(function(){
    $('#stage').val(5);
    $('#static').modal('show');
  });

  $('#accept-btn').click(function(){
    $('#stage').val(6);
    $('#static').modal('show');
  });

  $('#continue-submit').click(function(e){
    e.preventDefault();
    var serialized = $('#continue-form').serialize();
    var stage=$('#stage').val();
    var lead_id=$('#lead_id').val();
    // alert(serialized);exit;
    // alert(url);exit;

    $.ajax({
        url:base_url+'leads/submit_lead_progress',
        type:'POST',
        data:serialized,
        success:function(data){
            // alert(data);exit;
            if(data==1){
                if(stage==4){
                    $('#status1').html('Fail');
                    $('#status2').val('Fail');
                    statusfail();
                }else if(stage==5){
                    $('#status1').html('Work in progress');
                    $('#status2').val('Work in progress');
                    $('#new-list').html('<li  id="visit-list"><a href="#portlet_tab1" data-toggle="tab"> Visit </a></li><li id="wip-list"><a href="#portlet_tab2" data-toggle="tab"  id="portlet1"> Work In Progress </a></li>');
                    changestatus();

                }else if(stage==2){
                    $('#status1').html('Review');
                    $('#status2').val('Review');

                }else if(stage==6){
                    $('#status1').html('Presentation');
                    $('#status2').val('Presentation');
                    $('#new-list').html('<li  id="visit-list"><a href="#portlet_tab1" data-toggle="tab"> Visit </a></li><li id="wip-list"><a href="#portlet_tab2" data-toggle="tab"  id="portlet1"> Work In Progress </a></li><li id="pre-list"><a href="#portlet_tab3" data-toggle="tab"  id="portlet2"> Presentation </a></li>');
                    changestatus();

                }
                visit_table(1);
                wip_table(1);
                pre_table(1);
            }else if(data==3){
                window.location.href=base_url+ 'auth/';

            }else{
               window.location.href=base_url+ 'leads/detail/'+lead_id; 
            }

        }
    })

  });

  // use for fail

  function statusfail(){
      var status2=$('#status2').val();
      if(status2=='Fail' || status2=='Success'){
        $('#r-fail').hide();
        $('.achk').hide();

      }  
  }
  statusfail();

  function changestatus(){
    var status2=$('#status2').val();
    
    if(status2=='Visit'){
        $('#visit-list').addClass('active');
        $('#portlet_tab1').addClass('active');

    }else if(status2 == 'Work in progress'){
        $('#visit-list').removeClass('active');
        $('#portlet_tab1').removeClass('active');
        $('#wip-list').addClass('active');
        $('#portlet_tab2').addClass('active');

    }else if(status2 == 'Presentation'){
        $('#wip-list').removeClass('active');
        $('#portlet_tab2').removeClass('active');
        $('#pre-list').addClass('active');
        $('#portlet_tab3').addClass('active');
    }else if(status2 == 'Fail'){
        $('#visit-list').addClass('active');
        $('#portlet_tab1').addClass('active');
    }else if(status2 == 'Review'){
        $('#wip-list').addClass('active');
        $('#portlet_tab2').addClass('active');
    }

  }

  changestatus();
  


  
</script>