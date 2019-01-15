<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo AURL.'dashboard/'?>">Dashboard</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?php echo AURL.'leads/all_leads'?>">leads Detail</a>
            
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
                              <li class="list-group-item">Status : <strong><?=$leads['status'];?></strong></li>
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
                    <div class="portlet-body">

                        <a class="btn btn-success"><i class="fa fa-comments"></i> Chat</a>
                        <a class="btn btn-danger"><i class="fa fa-exclamation-triangle"></i> Fail</a>
                        <a class="btn btn-info"><i class="fa fa-envelope"></i> Email</a>
                        <a class="btn btn-warning"><i class="fa fa-tasks"></i> Add Task</a>
                        <a class="btn btn-default"><i class="fa fa-coffee"></i> Review</a>
                                    
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
                                        <th>Download</th>

                                    </tr>
                                </thead> 
                                <tbody>
                            <?php
                            $i=0;
                               foreach ($bdm_data as $key => $value) {
                                   # code...
                            ?> 
                                    <tr>
                                        <td><?=$i;?></td>
                                        <td><?=$value['image'];?></td>
                                        <td><?=date('d-m-Y',strtotime($value['created_date']));?></td>
                                        <td><a href="<?php echo Upload.'customer/'.$value['image'];?>" class="btn btn-success" download="<?php echo Upload.'customer/'.$value['image'];?>"">Download</a></td>

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
                    <div class="portlet-title">
                        <div class="caption font-green-sharp">
                            <i class="icon-settings font-green-sharp"></i>
                            <span class="caption-subject font-green-sharp bold uppercase">Lead Assigned</span>
                                        
                        </div>
                                    
                    </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover table-header-fixed" id="ro-table">
                            <thead>
                                <tr>
                                    <th> Sno </th>
                                    <th> Name</th>
                                    <th> Email </th>
                                    <th> Username </th>
                                    <!-- <th> RO </th> -->
                                    <th>Created Date</th>
                                    <th>Action</th>

                                </tr>
                            </thead>                                
                        </table>
                                    
                    </div>
                </div>
            </div>

        </div>
        <!--End of BDM upload File -->


    </div>
</div>