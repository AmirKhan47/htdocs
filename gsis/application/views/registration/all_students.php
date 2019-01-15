<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo SURL;?>school/admin_dashboard">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span> All Students </span>
        </li>
    </ul>
</div>
<h3 class="page-title"> All Students </h3>
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-green-seagreen">
            <i class="fa fa-user font-green-seagreen"></i>
            <span class="caption-subject bold uppercase"> All Students </span>
        </div>
    </div>
    <div class="portlet-body form">
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
        <div class="row">
            <div class="col-md-1 cwd form-group" ></div>
            <div class="col-md-2 cwd form-group" >
                <input type="text" class="form-control column_filter" data-column="0" name="reg_no"  id="id0" placeholder="Reg. No.">
            </div>
            <div class="col-md-2 cwd form-group">
                <input type="text" class="form-control column_filter" data-column="1" name="roll_no"  id="id1" placeholder="Roll No.">
            </div>
            <div class="col-md-2 cwd form-group">  
                <input type="text" class="form-control column_filter" data-column="3" name="name" id="id3" placeholder="Name">
            </div>
            <div class="col-md-2 cwd form-group">   
                <input type="text" class="form-control column_filter" data-column="4" name="cnic" id="id4" placeholder="Student CNIC">
            </div>
            <div class="col-md-2 cwd form-group"> 
                <input type="text" class="form-control column_filter" data-column="5" name="guardian_cnic" id="id5" placeholder="Guardian CNIC">
            </div>
        </div>
        <table class="table table-sm table-striped table-bordered table-hover table-header-fixed dataTable no-footer" id="all_students">
                <thead>
                    <tr>
                        <th> Reg. No. </th>
                        <th> Roll No. </th>
                        <th> Student Status </th>
                        <th> Name </th>
                        <th> Student CNIC </th>
                        <th> Guardian CNIC </th>
                        <th> Contact </th>
                        <th> Branch </th>
                        <th> Result </th>
                    </tr>
                </thead>
        </table>
    </div>
</div>