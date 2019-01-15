<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo SURL;?>school/admin_dashboard">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Detailed Data Entry</span>
        </li>
    </ul>
</div>
<h3 class="page-title"> Detail Data Entry
</h3>
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-green-seagreen">
            <i class="fa fa-user font-green-seagreen"></i>
            <span class="caption-subject bold uppercase"> Detail Data Entry </span>
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
            <div class="col-md-1 cwd form-group" ></div>
            <div class="col-md-2 cwd form-group" >
                <input type="text" class="form-control column_filter" data-column="0" name="reg_no"  id="id0" placeholder="Reg. No.">
            </div>
            <div class="col-md-2 cwd form-group">
                <input type="text" class="form-control column_filter" data-column="1" name="name"  id="id1" placeholder="Name">
            </div>
            <div class="col-md-2 cwd form-group">  
                <input type="text" class="form-control column_filter" data-column="2" name="cnic" id="id2" placeholder="Student CNIC">
            </div>
            <div class="col-md-2 cwd form-group">   
                <input type="text" class="form-control column_filter" data-column="3" name="contact_no" id="id3" placeholder="Contact No">
            </div>
            <div class="col-md-2 cwd form-group">   
                <input type="text" class="form-control column_filter" data-column="4" name="branch" id="id4" placeholder="Branch">
            </div>
        </div>
        <table class="table-sm table-striped table-bordered table-hover table-header-fixed dataTable no-footer" id="mydatatable1">
                <thead>
                    <tr>
                        <th>Reg. No.</th>
                        <th>Name </th>
                        <th>CNIC No</th>
                        <th>Contact No.</th>
                        <th>Branch</th>
                        <th>Test Result</th>
                        <th>Registration Fee</th>
                        <th>Status</th>
                        <th>Student Detail</th>
                        <th>Payment Status</th>
                        <!-- <th> Delete </th> -->
                    </tr>
                </thead>
        </table>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #32c5d2;">
                        <h5 class="modal-title" id="exampleModalLabel"><strong>Admission Confirmation Message</strong>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button></h5>
                    </div>

                    <form id="sendMessage">
                        <input type="hidden" name="student_id" value="0">
                        <div class="modal-body form-horizontal" style="padding-bottom: 0px;padding-top: 0px;">
                            <p style="margin-bottom: 0px;">Dear Parents/Guardians,<br>
                                Admission Date for
                                <b>
                                    Amir Khan
                                </b> 
                                for 
                                <b>
                                    Class 8th
                                </b>
                                 is schedule on
                            <div class="form-inline">
                                <div class="form-group">
                                    <input type="time" style="margin-left: 15px" name="time" value="" placeholder="Select Time" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="date" style="margin-left: 30px" name="date" value="" placeholder="Select Date" required="required">
                                </div>
                            </div>
                            <b>
                                AT H-8 GSIS Campus
                            </b>
                            .<br>
                            <!-- For Queries<br>
                            Phone: 03445151822<br>
                            Email: ballers999@gmail.com</p> -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="send_email_submit" class="btn btn-primary">Submit</button>
                            <br>
                            <div id="errors"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>