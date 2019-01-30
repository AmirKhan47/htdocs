<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            SLIDER IMAGES
            <small>Manage Slider Images Here</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <div id="success_msg"></div>

                <div id="error_msg"></div>

                <?php if ($this->session->flashdata('upload_error')): ?>
                    <div class="alert alert-danger"><?=$this->session->flashdata('upload_error'); ?></div>
                <?php endif ?>


                <div class="box box-primary">
                    

                    <div class="box-header with-border">
                        <h3 class="box-title">Current Slider Images <span class="label label-info"><?php echo $images_no; ?></span></h3>
                    </div>
                   
                   
                    <div class="box-body">
                        <?php if ($images != NULL): ?>
                            <div class="row">
                                <?php foreach ($images as $image): ?>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <img height="100%" width="100%" src="<?php echo URL; ?>uploads/slider_images/<?php echo $image['image_name']; ?>" alt="">
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                            
                            
                        <?php endif ?>
                        
                        <br>
                        <div class="row ">
                            <input id="user_name" type="hidden" value="<?php echo $this->session->userdata('session_data')['session_user_name']; ?>">
                            <div class="col-md-4">
                                <form id="form_slide_image_one">
                                    <div class="form-group">
                                        <label for="file_slide_one">Slider Image 1</label>
                                        <input type="file" name="file_slide_one" id="file_slide_one">
                                    </div>
                                    <button id="slide_one_upload_btn" type="submit" name="submit" value="submit" class="btn bg-green">Update</button>
                                </form>
                            </div>

                            <div class="col-md-4">
                                <form id="form_slide_image_two">
                                    <div class="form-group">
                                        <label for="file_slide_two">Slider Image 2</label>
                                        <input type="file" name="file_slide_two" id="file_slide_two">
                                    </div>
                                    <button id="slide_two_upload_btn" type="submit" name="submit" value="submit" class="btn bg-green">Update</button>
                                </form>
                            </div>

                            <div class="col-md-4">
                                <form id="form_slide_image_three">
                                    <div class="form-group">
                                        <label for="file_slide_three">Slider Image 3</label>
                                        <input type="file" name="file_slide_three" id="file_slide_three">
                                    </div>
                                    <button id="slide_three_upload_btn" type="submit" name="submit" value="submit" class="btn bg-green">Update</button>
                                </form>
                            </div>

                        </div>

                    </div>
                    

                    <div class="box-footer">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>