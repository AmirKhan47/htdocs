<!--Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            NEWS
            <small>Manage NEWS here</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- START CUSTOM TABS -->
        <!-- <h2 class="page-header">Manage Your Files Here</h2> -->
        <div class="row">
            <div class="col-md-12">
                <?php if ($this->session->flashdata('news_success')): ?>
                    <div class="alert alert-success"><?=$this->session->flashdata('news_success'); ?></div>
                <?php endif ?>

                <?php if ($this->session->flashdata('news_error')): ?>
                    <div class="alert alert-danger"><?=$this->session->flashdata('news_error'); ?></div>
                <?php endif ?>

                <?php if ($this->session->flashdata('delete_success')): ?>
                    <div class="alert alert-success"><?= $this->session->flashdata('delete_success'); ?></div>
                <?php endif ?>

                <?php if ($this->session->flashdata('delete_error')): ?>
                    <div class="alert alert-success"><?= $this->session->flashdata('delete_error'); ?></div>
                <?php endif ?>

                <?php if ($this->session->flashdata('update_success')): ?>
                    <div class="alert alert-success"><?= $this->session->flashdata('update_success'); ?></div>
                <?php endif ?>

                <?php if ($this->session->flashdata('update_error')): ?>
                    <div class="alert alert-danger"><?= $this->session->flashdata('update_error'); ?></div>
                <?php endif ?>


                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">NEWS List</h3>
                        <button type="button" class="pull-right btn bg-navy btn-flat" data-toggle="modal" data-target="#news_modal">Add NEWS</button>
                    </div>
                    
                    <div class="box-body">     
                        <table id="news_data" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>News Headline</th>
                                    <th>News Description</th>
                                    <th>News Created By</th>
                                    <th>News Created at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($news_list as $news): ?>
                                    <tr>
                                        <td><?php echo $news['news_headline']; ?></td>
                                        <td><?php echo $news['news_description']; ?></td>
                                        <td><?php echo $news['news_created_by']; ?></td>
                                        <td><?php echo $news['news_created_at']; ?></td>
                                        <td>
                                            <!-- <a href="News/edit_news/" class="btn bg-maroon btn-flat btn-xs"><i class="fa fa-edit"></i></a> -->

                                            <button class="btn bg-navy btn-flat btn-xs" onclick="triggerNewsEditModal(<?php echo $news['news_id']; ?>);"><i class="fa fa-edit"></i></button>

                                            <button class="btn bg-red btn-flat btn-xs" onclick="triggerNewsModal(<?php echo $news['news_id']; ?>);"><i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>         
            </div> 
        </div>
        
        <!-- Add News Modal Starts here  -->
        <div class="modal fade" id="news_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add News</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                            <!-- general form elements -->
                                <div class="box box-primary">
                                    <form role="form" action="<?php echo AURL; ?>News/add_new_news" method="POST">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="news_headline">News Headline</label>
                                                <input type="text" name="news_headline" class="form-control" id="news_headline" placeholder="Enter News Headline" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="news_description">News Description</label>
                                                <textarea class="wysihtml5 form-control" name="news_description" id="news_description" placeholder="News Description" required></textarea>
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
        
        <!-- // Add News Modal Ends here  -->


        <!-- Update News Modal Starts here -->

        <div class="modal fade" id="news_edit_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update News</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                            <!-- general form elements -->
                                <div class="box box-primary">
                                    <form role="form" action="<?php echo AURL; ?>News/update_news" method="POST">
                                        <div class="box-body">

                                            <input name="news_upd_id" id="news_upd_id" type="hidden">
                                            <div class="form-group">
                                                <label for="news_upd_headline">News Headline</label>
                                                <input type="text" name="news_upd_headline" class="form-control" id="news_upd_headline" placeholder="Enter News Headline" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="news_upd_description">News Description</label>
                                                <textarea name="news_upd_description" id="news_upd_description" class="wysihtml5 form-control"></textarea>
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
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- // Update News Modal Ends here -->


        <!-- News Deactivate Confirm Delete Modal Starts Here -->
        
        <div class="modal modal-danger fade" id="delete_news_confirm_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Warning!</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete the news&hellip;?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        <a id="modal_news_delete_confirm_btn" href="" type="button" class="btn btn-outline">Delete</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        
        <!--// News Deactivate Confirm Delete Modal Starts Here -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->