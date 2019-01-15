<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo SURL;?>school/admin_dashboard">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Pending Registration</span>
        </li>
    </ul>
</div>
<h3 class="page-title"> Applicants
</h3>
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-green-seagreen">
            <i class="fa fa-user font-green-seagreen"></i>
            <span class="caption-subject bold uppercase"> Registered Forms </span>
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
                <input type="text" class="form-control column_filter" data-column="1" name="name" id="id1" placeholder="Name">
            </div>
            <div class="col-md-2 cwd form-group">   
                <input type="text" class="form-control column_filter" data-column="3" name="contact_no" id="id3" placeholder="Contact No">
            </div>
            <div class="col-md-2 cwd form-group">   
                <input type="text" class="form-control column_filter" data-column="4" name="branch" id="id4" placeholder="Branch">
            </div>
            <div class="col-md-2 cwd form-group">   
                <input type="text" class="form-control column_filter" data-column="5" name="cnic" id="id5" placeholder="Student CNIC">
            </div>
        </div>
        <table class="table table-sm table-striped table-bordered table-hover table-header-fixed dataTable no-footer" id="mydatatable">
            <thead>
                <tr>
                    <th> Reg. No. </th>
                    <th> Name </th>
                    <th> Registration Date </th>
                    <th> Contact No. </th>
                    <th> Branch </th>
                    <th> CNIC/B.Form No </th>
                    <th> Status </th>
                    <th>No of Emails</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header green" style="background-color:#32c5d2;">
                        <h5 class="modal-title" id="exampleModalLabel"><strong class="text-white">Send Test Message</strong>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button></h5>
                    </div>
                    <form id="sendMessage">
                        <input type="hidden" name="student_id" value="0">
                        <div class="modal-body form-horizontal" style="padding-bottom: 0px">
                            <div class="form-inline">
                                <div class="form-group" style="margin-left: 5px;">
                                    <label>
                                        To
                                    </label>
                                    <b name="student_email"></b>
                                    <!-- <br>
                                    <b name="contact_email"></b> -->
                                </div>
                            </div>
                            <p>Dear Parents,<br>
                            Test Date of 
                            <b class="text-uppercase" name="student_name"></b> 
                            for Class 
                            <b name="student_class"></b>
                             is schedule on 
                            <div class="form-group">
                                <label class="control-label col-md-2">Time<span class="required" aria-required="true">*</span></label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <!-- <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span> -->
                                        <div class="input-icon right">
                                            <i class="fa"></i>
                                            <input type="time" class="form-control" name="time" value="" placeholder="Select Time" required="required">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Date<span class="required" aria-required="true">*</span></label>
                                <div class="col-md-8">
                                    <div class="input-group">                                                   
                                        <div class="input-icon right">
                                            <i class="fa"></i>
                                            <select class="_58mq" name="test_day" required="required" data-rule-required="true">
                                                <option value="">Day</option>
                                                <?php 
                                                for ($i=1; $i <= 31; $i++) { 
                                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                                }
                                                ?>
                                            </select>
                                            <select class="_58mq" name="test_month" required="required" data-rule-required="true">
                                                <option value="">Month</option><option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sept</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>
                                            </select>
                                            <select class="_58mq" name="test_year" required="required" data-rule-required="true">
                                                <option value="">Year</option>
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
                            <div class="form-group">
                                <label class="control-label col-md-2">Branch<span class="required" aria-required="true">*</span></label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <!-- <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span> -->
                                        <div class="input-icon right">
                                            <i class="fa"></i>
                                            <select type="text" required="required" data-rule-required="true" on name="branch" class="form-control" required="required">
                                                <optgroup>
                                                    <option value="">Select Branch</option>
                                                    <?php foreach ($branches as $branch) 
                                                        {
                                                            echo '<optgroup label="_________">';
                                                            echo '<option value="'.$branch['branch_id'].'">'.$branch['branch_name'].'</option>';
                                                            echo '<optgroup label="'.$branch['contact_email'].'">';
                                                            echo '<optgroup label="'.$branch['address_local'].'">';
                                                            // echo '<optgroup label="_________">';
                                                            // echo '<option value="">'.$branch['branch_address'].'</option>';
                                                        }
                                                    ?>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <p>
                                        
                                    </p>
                                </div>
                            </div>
                            <br>
                            <!-- For Queries<br>
                            Phone: 03445151822<br>
                            Email: ballers999@gmail.com</p> -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="location.href = '<?php echo SURL.'admin/portal' ?>';" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" id="send_email_submit" class="btn btn-primary">
                                Submit
                            </button>
                            <br>
                            <div id="errors" class="" style="padding: 10px"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>