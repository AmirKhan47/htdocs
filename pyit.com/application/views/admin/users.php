<!--Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Users
            <small>Manage Users here</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- START CUSTOM TABS -->
        <!-- <h2 class="page-header">Manage Your Files Here</h2> -->
        <div class="row">
            <div class="col-md-12">
                <?php if ($this->session->flashdata('user_success')): ?>
                    <div class="alert alert-success"><?=$this->session->flashdata('user_success'); ?></div>
                <?php endif ?>

                <?php if ($this->session->flashdata('user_error')): ?>
                    <div class="alert alert-danger"><?=$this->session->flashdata('user_error'); ?></div>
                <?php endif ?>

                <?php if ($this->session->flashdata('validation_errors')['username_error']): ?>
                    <div class="alert alert-danger"><?= $this->session->flashdata('validation_errors')['username_error']; ?></div>
                <?php endif ?>

                <?php if ($this->session->flashdata('validation_errors')['email_error']): ?>
                    <div class="alert alert-danger"><?= $this->session->flashdata('validation_errors')['email_error']; ?></div>
                <?php endif ?>

                <?php if ($this->session->flashdata('activate_success')): ?>
                    <div class="alert alert-success"><?=$this->session->flashdata('activate_success'); ?></div>
                <?php endif ?>

                <?php if ($this->session->flashdata('activate_error')): ?>
                    <div class="alert alert-danger"><?=$this->session->flashdata('activate_error'); ?></div>
                <?php endif ?>

                <?php if ($this->session->flashdata('deactivate_success')): ?>
                    <div class="alert alert-success"><?=$this->session->flashdata('deactivate_success'); ?></div>
                <?php endif ?>

                <?php if ($this->session->flashdata('deactivate_error')): ?>
                    <div class="alert alert-danger"><?=$this->session->flashdata('deactivate_error'); ?></div>
                <?php endif ?>

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Users List</h3>
                        <button type="button" class="pull-right btn bg-navy btn-flat" data-toggle="modal" data-target="#user_modal">Add User</button>
                    </div>
                    
                    
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="users_data" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>User Role</th>
                                    <th>User Created By</th>
                                    <th>User Status</th>
                                    <th>User Created at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?php echo $user['user_username'];?></td>
                                        <td><?php echo $user['user_role'];?></td>
                                        <td><?php echo $user['user_created_by'];?></td>
                                        <td>
                                            <?php if ($user['user_status'] == 1){ ?>
                                                <div class="label label-success">Active</div>
                                            <?php } else{ ?>
                                                 <div class="label label-danger">Inactive</div>
                                            <?php } ?>
                                        <td><?php echo $user['user_created_at'];?></td>
                                        <td>
                                            <?php if ($user['user_status'] == 1){ ?>
                                                <a href="<?php echo AURL; ?>Users/deactivate_user/<?php echo $user['user_id']; ?>" class="btn bg-red btn-flat btn-xs"><i class="fa fa-times"></i> Deactivate User</a>
                                            <?php }else{ ?>
                                                <a href="<?php echo AURL; ?>Users/activate_user/<?php echo $user['user_id']; ?>" class="btn bg-navy btn-flat btn-xs"><i class="fa fa-check"></i> Activate User</a>
                                            <?php } ?>

                                            
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>                            
                        </table>                          
                    </div>
                    <!-- /.box-body -->
                </div>
            </div> 
        </div>
        <!-- /.row -->
        <!-- END CUSTOM TABS -->

        <div class="modal fade" id="user_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add New Files</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                            <!-- general form elements -->
                                <div class="box box-primary">
                                    <form role="form" action="<?php echo AURL; ?>Users/add_new_user" method="POST">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="user_username">Username</label>
                                                <input type="text" name="user_username" class="form-control" id="user_username" placeholder="Enter Username" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="user_password">Password</label>
                                                <input type="password" name="user_password" class="form-control" id="user_password" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="user_role">User Role</label>
                                                <select class="form-control" name="user_role" id="user_role" required>
                                                    <option value="">Select User Role</option>
                                                    <option value="Editor">Editor</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="user_email">User Email</label>
                                                <input type="email" name="user_email" class="form-control" id="user_email" placeholder="Enter User Email">
                                            </div>
                                            
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->