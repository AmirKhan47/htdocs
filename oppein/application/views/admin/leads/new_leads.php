<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo AURL.'dashboard/'?>">Dashboard</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?php echo AURL.'leads/new_lead'?>">Lead Allotment</a>
            
        </li>
        
    </ul>
    
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> Allotment of New Leads
    
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-green-seagreen">
            <i class="fa fa-user font-green-seagreen"></i>
            <span class="caption-subject bold uppercase"> Allotment of New Leads</span>
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
        
        <table class="table table-striped table-bordered table-hover table-header-fixed" id="newlead-table">
            <thead>
                <tr>
                    <th> Sno </th>
                    <th> Customer Name</th>
                    <th> Designation </th>
                    <!-- <th> Registration Date </th> -->
                    <th> Contact no </th>
                    <th> RO </th>
                    <th> Category </th>
                    <th> status</th>
                    <th>Action</th>

                </tr>
            </thead>                                
        </table>

        <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Assign RO</h4>
                    </div>
                    <div class="modal-body">
                    <form action="<?php echo AURL."leads/assign_ro/"?>" id="registration-form" class="form-horizontal" method="post" enctype="multipart/form-data"> 
                        <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    
                                    <label class="control-label col-md-4">Customer Name<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" id="name" class="form-control" size="16" readonly><br>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Designation<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8">
                                       <input type="text" name="designation" id="designation" class="form-control" size="16" readonly><br>
                                    </div>
                                </div>
                            
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Contact No<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8">
                                       <input type="text" name="phone" id="phone" class="form-control" size="16" readonly><br>
                                       <input type="hidden" name="lead_id" id="lead_id" class="form-control" size="16" readonly>
                                    </div>
                                </div>
                            
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    
                                    <label class="control-label col-md-4">RO<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control select2 ro_list"  id="ro_list" name="ro_list"  data-validation="required" data-validation-error-msg="Please select RO">
                                            <option value="">Select</option>
                                            <?php 
                                               if (count($ro)>0) {
                                                  foreach ($ro as $key => $value) {
                                                  ?>    
                                                  <option value="<?=$value['id'];?>"><?= $value['Name'];?></option>
                                            <?php }
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
                    <div class="modal-footer">
                        
                        <button type="submit" class="btn green" name="submit" value="submit">Submit</button>
                    </form>
                    </div>
                    </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
  $.validate({
    modules : 'location, date, security, file',
    
  });
</script>

<script type="text/javascript">
    function assignmodal(id){
        var name=$('#name_'+id).val();
        var designation=$('#designation_'+id).val();
        var phone=$('#phone_'+id).val();
        $('#name').val(name);
        $('#designation').val(designation);
        $('#phone').val(phone);
        $('#lead_id').val(id);
        $('#basic').modal('show');
        
    }
</script>