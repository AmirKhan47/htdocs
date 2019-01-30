<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            FILES
            <small>Manage your files here</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- START CUSTOM TABS -->
        <!-- <h2 class="page-header">Manage Your Files Here</h2> -->
        <div class="row">
            <div class="col-md-12">
                <?php if ($this->session->flashdata('file_upload_success')): ?>
                    <?= $this->session->flashdata('file_upload_success');?>
                <?php endif ?>

                <?php if ($this->session->flashdata('upload_error')): ?>
                    <div class="alert alert-danger"><?= $this->session->flashdata('upload_error')['error']; ?></div>
                <?php endif ?>

                <?php if ($this->session->flashdata('delete_success')): ?>
                    <div class="alert alert-success"><?= $this->session->flashdata('delete_success'); ?></div>
                <?php endif ?>

                <?php if ($this->session->flashdata('delete_error')): ?>
                    <div class="alert alert-danger"><?= $this->session->flashdata('delete_error'); ?></div>
                <?php endif ?>




                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Files List</h3>
                        <button type="button" class="pull-right btn bg-navy btn-flat" data-toggle="modal" data-target="#files_modal">Add New Files</button>
                    </div>
                    
                    
                    <!-- /.box-header -->
                    <div class="box-body">         
                        <table id="files_data" class="table table-bordered table-striped">
                            <thead>
                                <tr role="row">
                                    <th>Filename</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Created by</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($files as $file): ?>
                                    <tr>
                                        <td><?php echo $file['file_name']; ?></td>
                                        <td><?php echo $file['file_category']; ?></td>
                                        <td><?php echo $file['file_description']; ?></td>
                                        <td><?php echo $file['file_created_by']; ?></td>
                                        <td><?php echo $file['file_created_at']; ?></td>
                                        <td>
                                            <a href="<?php echo URL; ?>uploads/files/<?php echo $file['file_attachment'];?>" class="btn bg-navy btn-flat btn-xs" download><i class="fa fa-download"></i></a>


                                            <button class="btn bg-red btn-flat btn-xs" onclick="triggerModal(<?php echo $file['file_id']; ?>);"><i class="fa fa-times"></i></button>


                                            <!-- <button type="button" class="btn bg-red btn-flat btn-xs" data-toggle="modal" data-target="#delete_confirm__modal">Delete File</button> -->

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

        <div class="modal fade" id="files_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add New File</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                            <!-- general form elements -->
                                <div class="box box-primary">
                                    <!-- <div class="box-header with-border">
                                        <h3 class="box-title">Quick Example</h3>
                                    </div> -->
                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <form role="form" action="<?php echo AURL;?>Files/add_new_file" method="POST" enctype="multipart/form-data">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Filename</label>
                                                <input type="text" name="file_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Filename" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Category</label>
                                                <input type="text" name="file_category" class="form-control" id="exampleInputPassword1" placeholder="Enter Category" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Description</label>
                                                <input type="text" name="file_description" class="form-control" id="exampleInputPassword1" placeholder="Enter Description">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">File input</label>
                                                <input type="file" name="file_attachment" id="exampleInputFile" required>
                                                <!-- <p class="help-block">Example block-level help text here.</p> -->
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
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn bg-light btn-flat pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn bg-navy btn-flat
                        ">Save changes</button>
                    </div> -->
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal modal-danger fade" id="delete_confirm__modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Warning!</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete the file&hellip;?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        <a id="modal_file_delete_confirm_btn" href="" type="button" class="btn btn-outline">Delete</a>
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
<!-- /.content-wrapper 