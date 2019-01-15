<!-- BEGIN PAGE BAR -->
<style type="text/css">
    .note-group-select-from-files {
      display: none;
    }
</style>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo SURL.'school/admin_dashboard'?>">Dashboard</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?php echo SURL.'recruitment/manage_applicants'?>">Manage Applicants</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Email History</span>         
        </li> 
    </ul>
    
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> All Emails
    
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-green-seagreen">
            <i class="fa fa-envelope  font-green-seagreen"></i>
            <span class="caption-subject bold uppercase"> All Emails</span>
        </div> 
        <!-- <div class="actions"> 
            <a class="btn btn-success" id="add_task"><i class="fa fa-paper-plane"></i> Send new Mail</a>
                                              
        </div> -->
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
        <input type="hidden" name="employee_id" id="employee_id" value="<?php echo $employee_id;?>">
        <table class="table table-striped table-bordered table-hover table-header-fixed" id="employee_email_history_datatable">
            <thead>
                <tr>
                    <!-- <th> # </th> -->
                    <th> Send To </th>
                    <th> Subject </th>
                    <th> Test Date & Time </th>
                    <th> Test Branch </th>
                    <th> Message </th>
                    <th> Sent Date </th>
                    <!-- <th> Action </th> -->
                </tr>
            </thead>                                
        </table>
        <!-- for modals -->
        <div class="modal fade bs-modal-lg in" id="add-modal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Send Email</h4>
                    </div>
                    <div class="modal-body">
                    <form action="<?php echo SURL."recruitment/send_email/"?>" id="registration-form" class="form-horizontal" method="post" enctype="multipart/form-data"> 
                        <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    
                                    <label class="control-label col-md-2">To<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-10">
                                        <input type="email" name="to" id="to" class="form-control" data-validation="email" autocomplete="off">
                                        <input type="hidden" name="lead_id" id="lead_id" class="form-control" data-validation="required" autocomplete="off" value="<?php ;?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2">Subject<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-10">
                                        <input type="text" name="subject" id="subject" class="form-control" data-validation="required">
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2">Message<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-10">
                                        <textarea class="summernote" name="message" data-validation="required" id="message" required> </textarea>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                
                    </div>
                    <div class="modal-footer">
                        
                        <button type="submit" class="btn green" name="add_submit" id="add_submit" value="add_submit">Send</button>
                    </form>
                    </div>
                    </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="modal fade bs-modal-lg in" id="update-modal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title" id="update-task">View Send Email</h4>
                    </div>
                    <div class="modal-body">
                    <form action="<?php echo AURL."task/add_task/"?>" id="registration-form" class="form-horizontal" method="post" enctype="multipart/form-data"> 
                        <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    
                                    <label class="control-label col-md-2">to<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-10">
                                        <input type="text" name="d_to" id="d_to" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2">Subject<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-10">
                                        <input type="text" name="d_sub" id="d_sub" class="form-control" readonly>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2">message<span class="required" aria-required="true">*</span></label>
                                    <div class="col-md-10">
                                        <textarea class="summernote" name="d_message" id="d_message" disabled><div id="div_message"></div> </textarea>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                
                    </div>
                    <div class="modal-footer">
                        
                        
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
<script type="text/javascript">
    $(document).ready(function()
    {
        $('.summernote').summernote(
        {
            height: 200, 
        });
        $('#add_task').click(function()
        {
            $('#add-modal').modal('show');
        });
    });
</script>