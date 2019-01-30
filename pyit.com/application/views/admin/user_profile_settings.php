<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Account Settings
            <small>Manage your Account Here</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">

                <?php if ($this->session->flashdata('update_success')): ?>
                    <div class="alert alert-success"><?= $this->session->flashdata('update_success'); ?></div>
                <?php endif ?>

                <?php if ($this->session->flashdata('update_error')): ?>
                    <div class="alert alert-danger"><?= $this->session->flashdata('update_error'); ?></div>
                <?php endif ?>

                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#profile_tab" data-toggle="tab" aria-expanded="true">Profile Settings</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="profile_tab">
                            <div class="box box-primary">
                                <form role="form" action="<?php echo AURL; ?>Profile_settings/update_user_profile" method="POST">
                                    <div class="box-body">

                                        <div class="form-group">
                                            <label for="user_username">Username</label>
                                            <input type="text" name="user_username" class="form-control" id="user_username" placeholder="Enter Username" value="<?php echo $user_details['user_username']; ?>" readonly>
                                        </div>


                                        <div class="form-group">
                                            <label for="user_fullname">Fullname</label>
                                            <input type="text" name="user_upd_fullname" class="form-control" id="user_fullname" placeholder="Enter Fullname" value="<?php echo $user_details['user_full_name'];?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="user_email">Email</label>
                                            <input type="email" name="user_upd_email" class="form-control" id="user_email" placeholder="Enter Email" value="<?php echo $user_details['user_email']; ?>" required>
                                        </div>

                                         <div class="form-group">
                                            <label for="user_role">User Role</label>
                                            <input type="text" name="user_role" class="form-control" id="user_role" placeholder="Enter User Role" value="<?php echo $user_details['user_role']; ?>" readonly>
                                        </div>
                                        
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.tab-pane -->
                        
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">


                <?php if ($this->session->flashdata('old_pass_error')): ?>
                    <div class="alert alert-danger"><?= $this->session->flashdata('old_pass_error'); ?></div>
                <?php endif ?>

                <?php if ($this->session->flashdata('password_match_error')): ?>
                    <div class="alert alert-danger"><?= $this->session->flashdata('password_match_error'); ?></div>
                <?php endif ?>

                <?php if ($this->session->flashdata('pass_update_success')): ?>
                    <div class="alert alert-success"><?= $this->session->flashdata('pass_update_success'); ?></div>
                <?php endif ?>

                <?php if ($this->session->flashdata('pass_update_error')): ?>
                    <div class="alert alert-danger"><?= $this->session->flashdata('pass_update_error'); ?></div>
                <?php endif ?>


                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#password_tab" data-toggle="tab" aria-expanded="true">Password Settings</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="password_tab">
                            <div class="box box-primary">
                                <form role="form" action="<?php echo AURL; ?>Profile_settings/change_user_password" method="POST">
                                    <div class="box-body">

                                        <div class="form-group">
                                            <label for="user_old_password">Old Password</label>
                                            <input type="password" name="user_old_password" class="form-control" id="user_old_password" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="user_new_password">New Password</label>
                                            <input type="password" name="user_new_password" class="form-control" id="user_new_password" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="user_new_password_conf">Confirm New Password</label>
                                            <input type="password" name="user_new_password_conf" class="form-control" id="user_new_password_conf" required>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                                <!-- /.box -->
                        </div>
                        <!-- /.tab-pane -->
                        
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
    </section>
    
</div>