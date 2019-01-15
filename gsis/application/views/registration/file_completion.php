<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo SURL;?>school/admin_dashboard">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?php echo SURL;?>admin/registered_students">Registered Students</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span> File Completetion </span>
        </li>
    </ul>
</div>
<h3 class="page-title"> File Completetion </h3>
<div class="portlet light bordered ">
    <div class="portlet-title">
        <div class="caption font-green-seagreen">
            <i class="fa fa-user font-green-seagreen"></i>
            <span class="caption-subject bold uppercase"> File Completetion </span>
        </div>  
        <div class="actions">
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
        <form action="<?php echo SURL; ?>admin/registered_students/" id="file_completion_form" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="form-body">
                <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <!-- <div class="alert alert-block alert-info fade in">
                   	<p><b>'<span style="color:red;">*</span>' fields are compulsory.</b></p>
                </div> -->
                <?php echo $error;?>
                <div class="row">
                    <div class="col-md-12">
                    	<div class="table-responsive">
	                        <table class="table table-striped table-bordered table-hover table-header-fixed">
	                            <thead>
	                                <tr>
	                                    <th>File Name</th>
	                                    <th>Choose File</th>
	                                    <th>Update</th>
	                                    <th>Status</th>
	                                    <th>Download</th>
	                                    <th>File Name</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                                <tr>
	                                <!-- file 1 -->
	                                    <td>
	                                        <label>Undertaking By Guardian</label>
	                                    </td>
	                                    <td>
	                                        <input type="file" onchange="image_check('#undertaking','#undertaking_error','#upload_undertaking')" style="display: inline" name="undertaking" id="undertaking" value="" placeholder="">
	                                        <span id="loader" style="display:none;"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span></span>
	                                        <div id="undertaking_error"></div>
	                                    </td>
	                                    <td>
	                                        <input type="hidden" id="student_id" name="student_id" value="<?=$student_id;?>">
	                                        <button type="button" class="btn btn-info chk2" id="upload_undertaking">
	                                            <i class="fa fa-upload"></i>
	                                        </button>
	                                    </td>
	                                    <td>
	                                        <span class="alert" style="display: none" id="msg">Updated</span>
	                                    </td>
	                                    <td id="download_undertaking">
	                                        <?php if($files[0]['undertaking']!=''){ ?>
	                                            <a href="<?php echo SURL.'./assets/uploads/'.$files[0]['undertaking'];?>" download>
	                                                <button type="button" class="btn btn-info chk2" id=""><i class="fa fa-download"></i></button>
	                                            </a>
	                                    <?php }?>
	                                    </td>
	                                    <td id="undertaking">
	                                        <span ><?php echo $files[0]['undertaking']; ?></span>
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <!-- file 2 -->
	                                    <td>
	                                        <label>Copy of Paid Fee Challan</label>
	                                    </td>
	                                    <td>
	                                         <input type="file" onchange="image_check('#copy_of_paid_fee_challan','#undertaking_error1','#upload_copy_of_paid_fee_challan')" data-validation="" style="display: inline" name="copy_of_paid_fee_challan" id="copy_of_paid_fee_challan" value="" placeholder="">
	                                        <span id="loader1" style="display:none;"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span></span>
	                                        <div id="undertaking_error1"></div>
	                                    </td>
	                                    <td>
	                                        <input type="hidden" id="student_id" name="student_id" value="<?=$student_id;?>">
	                                        <button type="button" class="btn btn-info chk2" id="upload_copy_of_paid_fee_challan">
	                                            
	                                            <i class="fa fa-upload"></i>
	                                        </button>
	                                    </td>
	                                    <td>
	                                        <span class="alert" style="display: none" id="msg1">Updated</span>
	                                    </td>
	                                    <td id="download_copy_of_paid_fee_challan">
	                                        <?php if($files[0]['copy_of_paid_fee_challan']!=''){ ?>
	                                        <a href="<?php echo SURL.'./assets/uploads/'.$files[0]['copy_of_paid_fee_challan'];?>" download>
	                                            <button type="button" class="btn btn-info chk2" id=""><i class="fa fa-download"></i></button>
	                                        </a>
	                                    <?php }?>
	                                    </td>
	                                    <td id="copy_of_paid_fee_challan">
	                                        <span><?php echo $files[0]['copy_of_paid_fee_challan']; ?></span>
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <!-- file 3 -->
	                                    <td>
	                                        <label>Copy of Paid Registration Slip</label>
	                                    </td>
	                                    <td>   
	                                         <input type="file" onchange="image_check('#copy_of_paid_registration_slip','#undertaking_error2','#upload_copy_of_paid_registration_slip')" data-validation="" style="display: inline" name="copy_of_paid_registration_slip" id="copy_of_paid_registration_slip" value="" placeholder="">
	                                        <span id="loader2" style="display:none;"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span></span>
	                                        <div id="undertaking_error2"></div>
	                                    </td>
	                                    <td>
	                                        <input type="hidden" id="student_id" name="student_id" value="<?=$student_id;?>">
	                                        <button type="button" class="btn btn-info chk2" id="upload_copy_of_paid_registration_slip">
	                                            <i class="fa fa-upload"></i>
	                                        </button>
	                                    </td>
	                                    <td>
	                                        <span class="alert" style="display: none" id="msg2">Updated</span>
	                                    </td>
	                                    <td id="download_copy_of_paid_registration_slip">
	                                        <?php if($files[0]['copy_of_paid_registration_slip']!=''){ ?>

	                                        <a href="<?php echo SURL.'./assets/uploads/'.$files[0]['copy_of_paid_registration_slip'];?>" download>
	                                            <button type="button" class="btn btn-info chk2" id=""><i class="fa fa-download"></i></button>
	                                        </a>
	                                    <?php }?>
	                                    </td>
	                                    <td id="copy_of_paid_registration_slip">
	                                        <span><?php echo $files[0]['copy_of_paid_registration_slip']; ?></span>
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <!-- file 4 -->
	                                    <td>
	                                        <label>Photographs</label>
	                                    </td>
	                                    <td>
	                                         <input type="file" onchange="image_check('#photographs','#undertaking_error3','#upload_photographs')" data-validation="" style="display: inline" name="photographs" id="photographs" value="" placeholder="">
	                                        <span id="loader3" style="display:none;"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span></span>
	                                        <div id="undertaking_error3"></div>
	                                    </td>
	                                    <td>
	                                        <input type="hidden" id="student_id" name="student_id" value="<?=$student_id;?>">
	                                        <button type="button" class="btn btn-info chk2" id="upload_photographs">
	                                            <i class="fa fa-upload"></i>
	                                        </button>
	                                    </td>
	                                    <td>
	                                        <span class="alert" style="display: none" id="msg3">Updated</span>
	                                    </td>
	                                    <td id="download_photographs">
	                                        <?php if($files[0]['photographs']!=''){ ?>
	                                        <a href="<?php echo SURL.'./assets/uploads/'.$files[0]['photographs'];?>" download>
	                                            <button type="button" class="btn btn-info chk2" id=""><i class="fa fa-download"></i></button>
	                                        <?php }?>
	                                        </a>
	                                    </td>
	                                    <td id="photographs">
	                                        <span><?php echo $files[0]['photographs']; ?></span>
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <!-- file 5 -->
	                                    <td>
	                                        <label>Copy of Form-B</label>
	                                    </td>
	                                    <td>
	                                         <input type="file" onchange="image_check('#copy_of_form_b','#undertaking_error4','#upload_copy_of_form_b')" data-validation="" style="display: inline" name="copy_of_form_b" id="copy_of_form_b" value="" placeholder="">
	                                        <span id="loader4" style="display:none;"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span></span>
	                                        <div id="undertaking_error4"></div>
	                                    </td>
	                                    <td>
	                                        <input type="hidden" id="student_id" name="student_id" value="<?=$student_id;?>">
	                                        <button type="button" class="btn btn-info chk2" id="upload_copy_of_form_b">
	                                            <i class="fa fa-upload"></i>
	                                        </button>
	                                    </td>
	                                    <td>
	                                        <span class="alert" style="display: none" id="msg4">Updated</span>
	                                    </td>
	                                    <td id="download_copy_of_form_b">
	                                         <?php if($files[0]['copy_of_form_b']!=''){ ?>
	                                        <a href="<?php echo SURL.'./assets/uploads/'.$files[0]['copy_of_form_b'];?>" download>
	                                            <button type="button" class="btn btn-info chk2" id=""><i class="fa fa-download"></i></button>
	                                        </a>
	                                    <?php }?>
	                                    </td>
	                                    <td id="copy_of_form_b">
	                                        <span><?php echo $files[0]['copy_of_form_b']; ?></span>
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <!-- file 6 -->
	                                    <td>
	                                        <label>Copy of Guardian Cnic</label>
	                                    </td>
	                                    <td>
	                                         <input type="file" onchange="image_check('#copy_of_guardian_cnic','#undertaking_error5','#upload_copy_of_guardian_cnic')" data-validation="" style="display: inline" name="copy_of_guardian_cnic" id="copy_of_guardian_cnic" value="" placeholder="">
	                                        <span id="loader5" style="display:none;"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span></span>
	                                        <div id="undertaking_error5"></div>
	                                    </td>
	                                    <td>
	                                        <input type="hidden" id="student_id" name="student_id" value="<?=$student_id;?>">
	                                        <button type="button" class="btn btn-info chk2" id="upload_copy_of_guardian_cnic">
	                                            <i class="fa fa-upload"></i>
	                                        </button>
	                                    </td>
	                                    <td>
	                                        <span class="alert" style="display: none" id="msg5">Updated</span>
	                                    </td>
	                                    <td id="download_copy_of_guardian_cnic">
	                                        <?php if($files[0]['copy_of_guardian_cnic']!=''){ ?>
	                                        <a href="<?php echo SURL.'./assets/uploads/'.$files[0]['copy_of_guardian_cnic'];?>" download>
	                                            <button type="button" class="btn btn-info chk2" id=""><i class="fa fa-download"></i></button>
	                                        </a>
	                                    <?php }?>
	                                    </td>
	                                    <td id="copy_of_guardian_cnic">
	                                        <span><?php echo $files[0]['copy_of_guardian_cnic']; ?></span>
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <!-- file 7 -->
	                                    <td>
	                                        <label>School Leaving Certificate</label>
	                                    </td>
	                                    <td>
	                                         <input type="file" onchange="image_check('#school_leaving_certificate','#undertaking_error6','#upload_school_leaving_certificate')" data-validation="" style="display: inline" name="school_leaving_certificate" id="school_leaving_certificate" value="" placeholder="">
	                                        <span id="loader6" style="display:none;"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span></span>
	                                        <div id="undertaking_error6"></div>
	                                    </td>
	                                    <td>
	                                        <input type="hidden" id="student_id" name="student_id" value="<?=$student_id;?>">
	                                        <button type="button" class="btn btn-info chk2" id="upload_school_leaving_certificate">
	                                            <i class="fa fa-upload"></i>
	                                        </button>
	                                    </td>
	                                    <td>
	                                        <span class="alert" style="display: none" id="msg6">Updated</span>
	                                    </td>
	                                    <td id="download_school_leaving_certificate">
	                                        <?php if($files[0]['school_leaving_certificate']!=''){ ?>
	                                        <a href="<?php echo SURL.'./assets/uploads/'.$files[0]['school_leaving_certificate'];?>" download>
	                                            <button type="button" class="btn btn-info chk2" id=""><i class="fa fa-download"></i></button>
	                                        </a>
	                                    <?php }?>
	                                    </td>
	                                    <td id="school_leaving_certificate">
	                                        <span><?php echo $files[0]['school_leaving_certificate']; ?></span>
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <!-- file 8 -->
	                                    <td>
	                                        <label>Record of Results</label>
	                                    </td>
	                                    <td>
	                                         <input type="file" onchange="image_check('#record_of_results','#undertaking_error7','#upload_record_of_results')" data-validation="" style="display: inline" name="record_of_results" id="record_of_results" value="" placeholder="">
	                                        <span id="loader7" style="display:none;"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span></span>
	                                        <div id="undertaking_error7"></div>
	                                    </td>
	                                    <td>
	                                        <input type="hidden" id="student_id" name="student_id" value="<?=$student_id;?>">
	                                        <button type="button" class="btn btn-info chk2" id="upload_record_of_results">
	                                            <i class="fa fa-upload"></i>
	                                        </button>
	                                    </td>
	                                    <td>
	                                        <span class="alert" style="display: none" id="msg7">Updated</span>
	                                    </td>
	                                    <td id="download_record_of_results">
	                                        <?php if($files[0]['record_of_results']!=''){ ?>
	                                        <a href="<?php echo SURL.'./assets/uploads/'.$files[0]['record_of_results'];?>" download>
	                                            <button type="button" class="btn btn-info chk2" id=""><i class="fa fa-download"></i></button>

	                                        </a>
	                                    <?php }?>
	                                    </td>
	                                    <td id="record_of_results">
	                                        <span><?php echo $files[0]['record_of_results']; ?></span>
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <!-- file 9 -->
	                                    <td>
	                                        <label>Merit Certificates</label>
	                                    </td>
	                                    <td>
	                                         <input type="file" onchange="image_check('#merit_certificates','#undertaking_error8','#upload_merit_certificates')" data-validation="" style="display: inline" name="merit_certificates" id="merit_certificates" value="" placeholder="">
	                                        <span id="loader8" style="display:none;"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span></span>
	                                        <div id="undertaking_error8"></div>
	                                    </td>
	                                    <td>
	                                        <input type="hidden" id="student_id" name="student_id" value="<?=$student_id;?>">
	                                        <button type="button" class="btn btn-info chk2" id="upload_merit_certificates">
	                                            <i class="fa fa-upload"></i>
	                                        </button>
	                                    </td>
	                                    <td>
	                                        <span class="alert" style="display: none" id="msg8">Updated</span>
	                                    </td>
	                                    <td id="download_merit_certificates">
	                                        <?php if($files[0]['merit_certificates']!=''){ ?>
	                                        <a href="<?php echo SURL.'./assets/uploads/'.$files[0]['merit_certificates'];?>" download>
	                                            <button type="button" class="btn btn-info chk2" id=""><i class="fa fa-download"></i></button>
	                                        </a>
	                                    <?php }?>
	                                    </td>
	                                    <td id="merit_certificates">
	                                        <span><?php echo $files[0]['merit_certificates']; ?></span>
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <!-- file 10 -->
	                                    <td>
	                                        <label>Gap Certificate</label>
	                                    </td>
	                                    <td>
	                                         <input type="file" onchange="image_check('#gap_certificate','#undertaking_error9','#upload_gap_certificate')" data-validation="" style="display: inline" name="gap_certificate" id="gap_certificate" value="" placeholder="">
	                                        <span id="loader9" style="display:none;"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span></span>
	                                        <div id="undertaking_error9"></div>
	                                    </td>
	                                    <td>
	                                        <input type="hidden" id="student_id" name="student_id" value="<?=$student_id;?>">
	                                        <button type="button" class="btn btn-info chk2" id="upload_gap_certificate">
	                                            <i class="fa fa-upload"></i>
	                                        </button>
	                                    </td>
	                                    <td>
	                                        <span class="alert" style="display: none" id="msg9">Updated</span>
	                                    </td>
	                                    <td id="download_gap_certificate">
	                                        <?php if($files[0]['gap_certificate']!=''){ ?>
	                                        <a href="<?php echo SURL.'./assets/uploads/'.$files[0]['gap_certificate'];?>" download>
	                                            <button type="button" class="btn btn-info chk2" id=""><i class="fa fa-download"></i></button>
	                                        </a>
	                                    <?php }?>
	                                    </td>
	                                    <td id="gap_certificate">
	                                        <span><?php echo $files[0]['gap_certificate']; ?></span>
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <!-- file 10 -->
	                                    <td>
	                                        <label>Character Certificate</label>
	                                    </td>
	                                    <td>
	                                         <input type="file" onchange="image_check('#character_certificate','#undertaking_error10','#upload_character_certificate')" data-validation="" style="display: inline" name="character_certificate" id="character_certificate" value="" placeholder="">
	                                        <span id="loader10" style="display:none;"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span></span>
	                                        <div id="undertaking_error10"></div>
	                                    </td>
	                                    <td>
	                                        <input type="hidden" id="student_id" name="student_id" value="<?=$student_id;?>">
	                                        <button type="button" class="btn btn-info chk2" id="upload_character_certificate">
	                                            <i class="fa fa-upload"></i>
	                                        </button>
	                                    </td>
	                                    <td>
	                                        <span class="alert" style="display: none" id="msg10">Updated</span>
	                                    </td>
	                                    <td id="download_character_certificate">
	                                        <?php if($files[0]['character_certificate']!=''){ ?>
	                                        <a href="<?php echo SURL.'./assets/uploads/'.$files[0]['character_certificate'];?>" download>
	                                            <button type="button" class="btn btn-info chk2" id=""><i class="fa fa-download"></i></button>
	                                        </a>
	                                    <?php }?>
	                                    </td>
	                                    <td id="character_certificate">
	                                        <span><?php echo $files[0]['character_certificate']; ?></span>
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <!-- file 12 -->
	                                    <td>
	                                        <label>Migration Certificate</label>
	                                    </td>
	                                    <td>
	                                         <input type="file" onchange="image_check('#migration_certificate','#undertaking_error11','#upload_migration_certificate')" data-validation="" style="display: inline" name="migration_certificate" id="migration_certificate" value="" placeholder="">
	                                        <span id="loader11" style="display:none;"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span></span>
	                                        <div id="undertaking_error11"></div>
	                                    </td>
	                                    <td>
	                                        <input type="hidden" id="student_id" name="student_id" value="<?=$student_id;?>">
	                                        <button type="button" class="btn btn-info chk2" id="upload_migration_certificate">
	                                            <i class="fa fa-upload"></i>
	                                        </button>
	                                    </td>
	                                    <td>
	                                        <span class="alert" style="display: none" id="msg11">Updated</span>
	                                    </td>
	                                    <td id="download_migration_certificate">
	                                        <?php if($files[0]['migration_certificate']!=''){ ?>
	                                        <a href="<?php echo SURL.'./assets/uploads/'.$files[0]['migration_certificate'];?>" download>
	                                            <button type="button" class="btn btn-info chk2" id=""><i class="fa fa-download"></i></button>
	                                        </a>
	                                    <?php }?>
	                                    </td>
	                                    <td id="migration_certificate">
	                                        <span><?php echo $files[0]['migration_certificate']; ?></span>
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <!-- file 13 -->
	                                    <td>
	                                        <label>Registration Card</label>
	                                    </td>
	                                    <td>
	                                         <input type="file" onchange="image_check('#registration_card','#undertaking_error12','#upload_registration_card')" data-validation="" style="display: inline" name="registration_card" id="registration_card" value="" placeholder="">
	                                        <span id="loader12" style="display:none;"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span></span>
	                                        <div id="undertaking_error12"></div>
	                                    </td>
	                                    <td>
	                                        <input type="hidden" id="student_id" name="student_id" value="<?=$student_id;?>">
	                                        <button type="button" class="btn btn-info chk2" id="upload_registration_card">
	                                            <i class="fa fa-upload"></i>
	                                        </button>
	                                    </td>
	                                    <td>
	                                        <span class="alert" style="display: none" id="msg12">Updated</span>
	                                    </td>
	                                    <td id="download_registration_card">
	                                         <?php if($files[0]['registration_card']!=''){ ?>
	                                        <a href="<?php echo SURL.'./assets/uploads/'.$files[0]['registration_card'];?>" download>
	                                            <button type="button" class="btn btn-info chk2" id=""><i class="fa fa-download"></i></button>
	                                        </a>
	                                    <?php }?>
	                                    </td>
	                                    <td id="registration_card">
	                                        <span><?php echo $files[0]['registration_card']; ?></span>
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <!-- file 14 -->
	                                    <td>
	                                        <label>Equivalence Certificate</label>
	                                    </td>
	                                    <td>
	                                         <input type="file" onchange="image_check('#equivalence_certificate','#undertaking_error13','#upload_equivalence_certificate')" data-validation="" style="display: inline" name="equivalence_certificate" id="equivalence_certificate" value="" placeholder="">
	                                        <span id="loader13" style="display:none;"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span></span>
	                                        <div id="undertaking_error13"></div>
	                                    </td>
	                                    <td>
	                                        <input type="hidden" id="student_id" name="student_id" value="<?=$student_id;?>">
	                                        <button type="button" class="btn btn-info chk2" id="upload_equivalence_certificate">
	                                            <i class="fa fa-upload"></i>
	                                        </button>
	                                    </td>
	                                    <td>
	                                        <span class="alert" style="display: none" id="msg13">Updated</span>
	                                    </td>
	                                    <td id="download_equivalence_certificate">
	                                        <?php if($files[0]['equivalence_certificate']!=''){ ?>
	                                        <a href="<?php echo SURL.'./assets/uploads/'.$files[0]['equivalence_certificate'];?>" download>
	                                            <button type="button" class="btn btn-info chk2" id=""><i class="fa fa-download"></i></button>
	                                        </a>
	                                    <?php }?>
	                                    </td>
	                                    <td id="equivalence_certificate">
	                                        <span><?php echo $files[0]['equivalence_certificate']; ?></span>
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <!-- file 15 -->
	                                    <td>
	                                        <label>Cancelation of Result</label>
	                                    </td>
	                                    <td>
	                                         <input type="file" onchange="image_check('#cancelation_of_result','#undertaking_error14','#upload_cancelation_of_result')" data-validation="" style="display: inline" name="cancelation_of_result" id="cancelation_of_result" value="" placeholder="">
	                                        <span id="loader14" style="display:none;"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span></span>
	                                        <div id="undertaking_error14"></div>
	                                    </td>
	                                    <td>
	                                        <input type="hidden" id="student_id" name="student_id" value="<?=$student_id;?>">
	                                        <button type="button" class="btn btn-info chk2" id="upload_cancelation_of_result">
	                                            <i class="fa fa-upload"></i>
	                                        </button>
	                                    </td>
	                                    <td>
	                                        <span class="alert" style="display: none" id="msg14">Updated</span>
	                                    </td>
	                                    <td id="download_cancelation_of_result">
	                                        <?php if($files[0]['cancelation_of_result']!=''){ ?>
	                                        <a href="<?php echo SURL.'./assets/uploads/'.$files[0]['cancelation_of_result'];?>" download>
	                                            <button type="button" class="btn btn-info chk2" id=""><i class="fa fa-download"></i></button>
	                                        </a>
	                                    <?php }?>
	                                    </td>
	                                    <td id="cancelation_of_result">
	                                        <span><?php echo $files[0]['cancelation_of_result']; ?></span>
	                                    </td>
	                                </tr>
	                            </tbody>
	                        </table>
	                        <div class="col-md-offset-3 col-md-6">
	                            <button name="submit" id="submit" type="submit" value="submit" class="btn btn-md green-meadow"><i class="glyphicon glyphicon-arrow-right"></i>Update</button>                                      
	                        </div>
	                    </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>