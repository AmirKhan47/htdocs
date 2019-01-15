<!DOCTYPE html>
<html lang="en">
    <script type="text/javascript">
        var BASE_URL = "<?php echo base_url();?>";
    </script>
    <head>
        <meta charset="utf-8" />
        <title><?php echo DEFAULT_TITLE;?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo Assets;?>global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Assets;?>global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Assets;?>global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Assets;?>global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Assets;?>global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo Assets;?>global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Assets;?>global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Assets;?>global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Assets;?>global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Assets;?>global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Assets;?>global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Assets;?>global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Assets;?>global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Assets;?>global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Assets;?>global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="<?php echo Assets;?>global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Assets;?>global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Assets;?>global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo Assets;?>global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Assets;?>global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Assets;?>global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Assets;?>global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo Assets;?>global/plugins/ladda/ladda-themeless.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo Assets;?>global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo Assets;?>global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->

        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo Assets;?>layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Assets;?>layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo Assets;?>layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->

        <link rel="shortcut icon" href="<?php echo Assets;?>32x32.png" />

    </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="<?php SURL.'admin' ?>" class="logo-default" style="color: white;font-size: 22px;text-align: center;margin-top:10px;margin-left: 10px;">
                       GSIS </a>
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="" />
                                <span class="username username-hide-on-mobile"> <?php echo $this->session->userdata('name') ?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                            	<li>
                                    <a href="<?php echo SURL.'login/change_password' ?>">
                                        <i class="fa fa-cog"></i> Change Password </a>
                                </li>
                                <li>
                                    <a href="<?php echo SURL.'login/logout' ?>">
                                        <i class="icon-key"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler"> </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                        <!-- <li class="sidebar-search-wrapper"> -->
                            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                            <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                            <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                            <!-- <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                                <a href="javascript:;" class="remove">
                                    <i class="icon-close"></i>
                                </a>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <a href="javascript:;" class="btn submit">
                                            <i class="icon-magnifier"></i>
                                        </a>
                                    </span>
                                </div>
                            </form> -->
                            <!-- END RESPONSIVE QUICK SEARCH FORM -->
                        <!-- </li> -->

                <?php
                    $role=$this->session->userdata('role');
                    if($role==='1')
                    {
                ?>
                        <li class="nav-item <?php if($active=='dashboard'){?> start active open <?php }?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <?php  if($active=='dashboard'){?>
                                    <span class="selected"></span>
                                    <span class="arrow open"></span>
                                <?php }else{?>
                                <span class="arrow"></span>
                            	<?php }?>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item <?php if($active=='dashboard'){?> start active open<?php }?>">
                                    <a href="<?php echo base_url().'school/admin_dashboard'?>" class="nav-link">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">Admin Dashboard</span>
		                                <?php  if($active=='dashboard'){?>
		                                    <span class="selected"></span>
		                                <?php }?>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item <?php if($active=='manage_applicants' || $active=='manage_test_applicants' || $active=='manage_file_completion_applicants'|| $active=='manage_registered_applicants' || $active=='manage_all_applicants' || $active=='recruitment_form' || $active=='add_department' || $active=='manage_departments' || $active=='add_designation' || $active=='manage_designations' || $active=='assign_department_designation' || $active=='manage_department_designations' || $active=='manage_levels'){?> start active open <?php }?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-user"></i>
                                <span class="title">Human Resource</span>
                                 <?php  if($active=='manage_applicants'){?>
                                    <span class="selected"></span>
                                    <span class="arrow open"></span>
                                <?php }else{?>
                                    <span class="arrow"></span>
                                <?php }?>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item <?php if($active=='manage_applicants'){?> start active open <?php }?>">
                                    <a href="<?php echo SURL;?>recruitment/manage_applicants" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">New Applicants</span>
                                        <?php $data['new_employees']=count($this->common->select_array_records('employees',array('employee_last_status_id'=>'1')));
                                        ?>
                                        <span class="badge badge-success"><?php echo $data['new_employees'];?></span>
                                        <?php  if($active=='manage_applicants'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a>
                                </li>
                                <li class="nav-item <?php if($active=='manage_test_applicants'){?> start active open <?php }?>">
                                    <a href="<?php echo SURL;?>recruitment/manage_test_applicants" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Test/Demo</span>
                                        <?php $data['manage_test_applicants']=count($this->common->select_array_records('employees',array('employee_last_status_id'=>'2')));?>
                                        <span class="badge badge-primary"><?php echo $data['manage_test_applicants'];?></span>
                                        <?php  if($active=='manage_test_applicants'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a>
                                </li>
                                <li class="nav-item <?php if($active=='manage_file_completion_applicants'){?> start active open <?php }?>">
                                    <a href="<?php echo SURL;?>recruitment/manage_file_completion_applicants" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">File Completion</span>
                                        <?php $data['manage_file_completion_applicants']=count($this->common->select_array_records('employees',array('employee_last_status_id'=>'3')));?>
                                        <span class="badge badge-danger"><?php echo $data['manage_file_completion_applicants'];?></span>
                                        <?php  if($active=='manage_file_completion_applicants'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a>
                                </li>
                                <li class="nav-item <?php if($active=='manage_registered_applicants'){?> start active open <?php }?>">
                                    <a href="<?php echo SURL;?>recruitment/manage_registered_applicants" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Registered</span>
                                        <?php $data['manage_registered_applicants']=count($this->common->select_array_records('employees',array('employee_last_status_id'=>'4')));?>
                                        <span class="badge badge-warning"><?php echo $data['manage_registered_applicants'];?></span>
                                        <?php  if($active=='manage_registered_applicants'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a>
                                </li>
                                <li class="nav-item <?php if($active=='manage_all_applicants'){?> start active open <?php }?>">
                                    <a href="<?php echo SURL;?>recruitment/manage_all_applicants" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">All Applicants</span>
                                        <?php $data['manage_all_applicants']=count($this->common->select_array_records('employees'));?>
                                        <span class="badge badge-success"><?php echo $data['manage_all_applicants'];?></span>
                                        <?php  if($active=='manage_all_applicants'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a>
                                </li> -->
                                <!-- <li class="nav-item <?php if($active=='recruitment_form'){?> start active open <?php }?>">
                                    <a href="<?php echo SURL;?>recruitment/" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Applicants Form</span>
                                        <?php  if($active=='recruitment_form'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a>
                                </li> -->
                                <!-- <li class="nav-item <?php if($active=='add_department'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url(). 'department/'?>" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Add Department</span>
                                        <?php  if($active=='add_department'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a> 
                                </li> -->
                                <!-- <li class="nav-item <?php if($active=='manage_departments'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url(). 'department/manage_departments'?>" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Department List</span>
                                        <?php  if($active=='manage_departments'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a> 
                                </li> -->
                                <!-- <li class="nav-item <?php if($active=='add_designation'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url(). 'designation/'?>" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Add Designation</span>
                                        <?php  if($active=='add_designation'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a> 
                                </li> -->
                                <!-- <li class="nav-item <?php if($active=='manage_designations'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url(). 'designation/manage_designations'?>" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Designation List</span>
                                        <?php  if($active=='manage_designations'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a> 
                                </li> -->
                                <!-- <li class="nav-item <?php if($active=='assign_department_designation'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url(). 'designation/assign_department_designation'?>" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Assign Department To Designation</span>
                                        <?php  if($active=='assign_department_designation'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a> 
                                </li> -->
                                <!-- <li class="nav-item <?php if($active=='manage_department_designations'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url(). 'designation/manage_department_designations'?>" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Manage Departments & Designations</span>
                                        <?php  if($active=='manage_departments_designations'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a> 
                                </li>
                                <li class="nav-item <?php if($active=='manage_levels'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url(). 'level/manage_levels'?>" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Manage Levels</span>
                                        <?php  if($active=='manage_levels'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a> 
                                </li> -->
                            <!-- </ul>
                        </li> -->
                        <li class="nav-item <?php if($active=='manage_user'){?> start active open <?php }?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-users"></i>
                                <span class="title">Users</span>
                                 <?php  if($active=='manage_user'){?>
                                    <span class="selected"></span>
                                    <span class="arrow open"></span>
                                <?php }else{?>
                                	<span class="arrow"></span>
                            	<?php }?>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item <?php if($active=='manage_user'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url();?>user" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Manage Users</span>
                                        <?php  if($active=='manage_user'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a>
                                </li>
                                <!-- <li class="nav-item <?php if($active=='manage_user' || $active=='add_department' || $active=='add_designation' || $active=='manage_subjects' || $active=='manage_levels'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url();?>user" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Manage Users</span>
                                        <?php  if($active=='manage_user'){?>
		                                    <span class="selected"></span>
		                                <?php }?>
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="nav-item <?php if($active=='portal' || $active=='registeredStudents' || $active=='registered_students' || $active=='file_completion_students' || $active=='all_students' || $active=='manage_branches' || $active=='manage_classes' || $active=='manage_classes' || $active=='manage_branches_classes' || $active=='manage_subjects' || $active=='assign_class_branch' || $active=='manage_classes_subjects' || $active=='assign_subject_class' || $active=='manage_fee_structure'){?> start active open <?php }?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
                                <span class="title">Admission</span>
                                <?php if($active=='portal' || $active=='registeredStudents' || $active=='registered_students' || $active=='file_completion_students' || $active=='all_students' || $active=='manage_branches' || $active=='manage_classes' || $active=='manage_classes' || $active=='manage_branches_classes' || $active=='manage_subjects' || $active=='manage_classes_subjects' || $active=='assign_class_branch' || $active=='assign_subject_class' || $active=='manage_fee_structure'){?>
                                    <span class="selected"></span>
                                    <span class="arrow open"></span>
                                <?php }else{?>
                                	<span class="arrow"></span>
                            	<?php }?>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="<?php echo base_url();?>" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Registration Form</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php if($active=='portal'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url();?>admin/portal" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">New Students</span>
                                        <?php
                                            if($this->session->userdata('role')==1)
                                            {
                                                $data['new']=count($this->common->select_array_records('registration',array('registration_status'=>'pending')));
                                            }
                                            else
                                            {
                                               $data['new']=count($this->common->select_array_records('registration',array('registration_status'=>'pending','branch_id'=>$this->session->userdata('branch_id'))));
                                            }
                                        ?>
                                        <span class="badge badge-success"><?php echo $data['new'];?></span>
                                        <?php  if($active=='portal'){?>
		                                    <span class="selected"></span>
		                                <?php }?>
                                    </a>
                                </li>
                                <li class="nav-item <?php if($active=='registeredStudents'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url();?>admin/registeredStudents" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Detailed Data Entry</span>
                                        <?php
                                            if($this->session->userdata('role')==1)
                                            {
                                                $data['pending']=count($this->common->select_array_records('registration',array('registration_status'=>'payment pending')));
                                            }
                                            else
                                            {
                                               $data['pending']=count($this->common->select_array_records('registration',array('registration_status'=>'payment pending','branch_id'=>$this->session->userdata('branch_id'))));
                                            }
                                        ?>
                                        <span class="badge badge-danger"><?php echo $data['pending'];?></span>
                                        <?php  if($active=='registeredStudents'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a> 
                                </li>
                                <li class="nav-item <?php if($active=='registered_students'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url();?>admin/registered_students" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Incomplete File</span>
                                        <?php
                                            if($this->session->userdata('role')==1)
                                            {
                                                // $data['registered']=count($this->common->select_array_records('registration',array('registration_status'=>'registered')));
                                                $data['registered']=$this->registeration->registered_students_count('registered');
                                            }
                                            else
                                            {
                                               $data['registered']=count($this->common->select_array_records('registration',array('registration_status'=>'registered','branch_id'=>$this->session->userdata('branch_id'))));
                                            }
                                        ?>
                                        <span class="badge badge-warning"><?php echo $data['registered'];?></span>
                                        <?php  if($active=='registered_students'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a> 
                                </li>
                                <li class="nav-item <?php if($active=='file_completion_students'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url();?>admin/file_completion_students" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Registered Students</span>
                                        <?php
                                            if($this->session->userdata('role')==1)
                                            {
                                                $data['file_completion']=$this->registeration->file_completion_students_count('registered');
                                            }
                                            else
                                            {
                                                $data['file_completion']=$this->registeration->file_completion_students_count1('registered',$this->session->userdata('branch_id'));
                                               // $data['file_completion']=count($this->common->select_array_records('registration',array('registration_status'=>'registered','branch_id'=>$this->session->userdata('branch_id'))));
                                            }
                                        ?>
                                        <span class="badge badge-warning"><?php echo $data['file_completion'];?></span>
                                        <?php  if($active=='file_completion_students'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a> 
                                </li>
                                <li class="nav-item <?php if($active=='all_students'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url();?>admin/all_students" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">All Students</span>
                                        <?php
                                            if($this->session->userdata('role')==1)
                                            {
                                                $data['all_students']=count($this->common->select_array_records('registration'));
                                            }
                                            else
                                            {
                                               $data['all_students']=count($this->common->select_array_records('registration'));
                                            }
                                        ?>
                                        <span class="badge badge-primary"><?php echo $data['all_students'];?></span>
                                        <?php  if($active=='all_students'){?>
		                                    <span class="selected"></span>
		                                <?php }?>
                                    </a> 
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url();?>challan/view/" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Fee Challan</span> 
                                    </a> 
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(). 'challan/excel'?>" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Download Excel Sheet</span>
                                    </a> 
                                </li> 
                                <!-- <li class="nav-item <?php if($active=='add_branch'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url(). 'branch/'?>" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Add Branch</span>
                                        <?php  if($active=='add_branch'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a> 
                                </li> -->
                                <li class="nav-item <?php if($active=='manage_branches'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url(). 'branch/manage_branches'?>" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Manage Branches</span>
                                        <?php  if($active=='manage_branches'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a> 
                                </li> 
                                <li class="nav-item <?php if($active=='manage_classes'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url(). 'classes/manage_classes'?>" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Manage Classes</span>
                                        <?php  if($active=='manage_classes'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a> 
                                </li>
                                <!-- <li class="nav-item <?php if($active=='assign_class_branch'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url(). 'classes/assign_class_branch'?>" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Assign Class To Branch</span>
                                        <?php  if($active=='assign_class_branch'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a> 
                                </li> -->
                                <li class="nav-item <?php if($active=='manage_branches_classes'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url(). 'classes/manage_branches_classes'?>" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Manage Branches & Classes</span>
                                        <?php  if($active=='manage_branches_classes'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a> 
                                </li>
                                <li class="nav-item <?php if($active=='manage_subjects'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url(). 'subject/manage_subjects/'?>" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Manage Subjects</span>
                                        <?php  if($active=='manage_subjects'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a> 
                                </li>
                                <!-- <li class="nav-item <?php if($active=='assign_subject_class'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url(). 'subject/assign_subject_class'?>" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Assign Subject To Class</span>
                                        <?php  if($active=='assign_subject_class'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a> 
                                </li> -->
                                <li class="nav-item <?php if($active=='manage_classes_subjects'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url(). 'subject/manage_classes_subjects'?>" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Manage Classes & Subjects</span>
                                        <?php  if($active=='manage_classes_subjects'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a> 
                                </li>
                                <li class="nav-item <?php if($active=='manage_fee_structure'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url(). 'fee_structure/'?>" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Manage Fee Structure</span>
                                        <?php  if($active=='manage_fee_structure'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a> 
                                </li>
                            </ul>
                        </li>
                <?php
                    }
                ?>
                <?php
                    $role1=$this->session->userdata('role');
                    if($role1==='2')
                    {
                ?>
                        <li class="nav-item <?php if($active=='dashboard'){?> start active open<?php }?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <?php  if($active=='dashboard'){?>
                                    <span class="selected"></span>
                                    <span class="arrow open"></span>
                                <?php }else{?>
                                <span class="arrow"></span>
                                <?php }?>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item <?php if($active=='dashboard'){?> start active open<?php }?>">
                                    <a href="<?php echo base_url().'user/dashboard'?>" class="nav-link">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">User Dashboard</span>
                                        <?php  if($active=='dashboard'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="heading">
                            <h3 class="uppercase">Registration</h3>
                        </li> -->
                        <li class="nav-item <?php if($active=='portal' || $active=='registeredStudents' || $active=='registered_students' || $active=='file_completion_students' || $active=='all_students'){?> start active open <?php }?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
                                <span class="title">Admission</span>
                                <?php if($active=='portal' || $active=='registeredStudents' || $active=='registered_students' || $active=='file_completion_students' || $active=='all_students'){?>
                                    <span class="selected"></span>
                                    <span class="arrow open"></span>
                                <?php }else{?>
                                    <span class="arrow"></span>
                                <?php }?>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="<?php echo base_url();?>" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Registration Form</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php if($active=='portal'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url();?>admin/portal" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">New Students</span>
                                        <?php
                                            if($this->session->userdata('role')==1)
                                            {
                                                $data['new']=count($this->common->select_array_records('registration',array('registration_status'=>'pending')));
                                            }
                                            else
                                            {
                                               $data['new']=count($this->common->select_array_records('registration',array('registration_status'=>'pending','branch_id'=>$this->session->userdata('branch_id'))));
                                            }
                                        ?>
                                        <span class="badge badge-success"><?php echo $data['new'];?></span>
                                        <?php  if($active=='portal'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a>
                                </li>
                                <li class="nav-item <?php if($active=='registeredStudents'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url();?>admin/registeredStudents" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Detailed Data Entry</span>
                                        <?php
                                            if($this->session->userdata('role')==1)
                                            {
                                                $data['pending']=count($this->common->select_array_records('registration',array('registration_status'=>'payment pending')));
                                            }
                                            else
                                            {
                                               $data['pending']=count($this->common->select_array_records('registration',array('registration_status'=>'payment pending','branch_id'=>$this->session->userdata('branch_id'))));
                                            }
                                        ?>
                                        <span class="badge badge-danger"><?php echo $data['pending'];?></span>
                                        <?php  if($active=='registeredStudents'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a> 
                                </li>
                                <li class="nav-item <?php if($active=='registered_students'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url();?>admin/registered_students" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Incomplete File</span>
                                        <?php
                                            if($this->session->userdata('role')==1)
                                            {
                                                // $data['registered']=count($this->common->select_array_records('registration',array('registration_status'=>'registered')));
                                                $data['registered']=$this->registeration->registered_students_count('registered');
                                            }
                                            else
                                            {
                                               $data['registered']=count($this->common->select_array_records('registration',array('registration_status'=>'registered','branch_id'=>$this->session->userdata('branch_id'))));
                                            }
                                        ?>
                                        <span class="badge badge-warning"><?php echo $data['registered'];?></span>
                                        <?php  if($active=='registered_students'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a> 
                                </li>
                                <li class="nav-item <?php if($active=='file_completion_students'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url();?>admin/file_completion_students" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Registered Students</span>
                                        <?php
                                            if($this->session->userdata('role')==1)
                                            {
                                                $data['file_completion']=$this->registeration->file_completion_students_count('registered');
                                            }
                                            else
                                            {
                                                $data['file_completion']=$this->registeration->file_completion_students_count1('registered',$this->session->userdata('branch_id'));
                                               // $data['file_completion']=count($this->common->select_array_records('registration',array('registration_status'=>'registered','branch_id'=>$this->session->userdata('branch_id'))));
                                            }
                                        ?>
                                        <span class="badge badge-warning"><?php echo $data['file_completion'];?></span>
                                        <?php  if($active=='file_completion_students'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a> 
                                </li>
                                <li class="nav-item <?php if($active=='all_students'){?> start active open <?php }?>">
                                    <a href="<?php echo base_url();?>admin/all_students" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">All Students</span>
                                        <?php
                                            if($this->session->userdata('role')==1)
                                            {
                                                $data['all_students']=count($this->common->select_array_records('registration'));
                                            }
                                            else
                                            {
                                            	 $data['all_students']=count($this->common->select_array_records('registration'));
                                               // $data['all_students']=count($this->common->select_array_records('registration',array('branch_id'=>$this->session->userdata('branch_id'))));
                                            }
                                        ?>
                                        <span class="badge badge-primary"><?php echo $data['all_students'];?></span>
                                        <?php  if($active=='all_students'){?>
                                            <span class="selected"></span>
                                        <?php }?>
                                    </a> 
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="<?php echo base_url();?>challan/view/" class="nav-link ">
                                        <i class=""></i>
                                        <span class="title">Fee Challan</span> 
                                    </a> 
                                </li> -->
                            </ul>
                        </li>
                <?php
                    }
                ?>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                    <div class="theme-panel hidden-xs hidden-sm">
                        <!-- <div class="toggler"> </div> -->
                        <div class="toggler-close"> </div>
                        <div class="theme-options">
                            <div class="theme-option theme-colors clearfix">
                                <span> THEME COLOR </span>
                                <ul>
                                    <li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default"> </li>
                                    <li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue"> </li>
                                    <li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue"> </li>
                                    <li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey"> </li>
                                    <li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light"> </li>
                                    <li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2"> </li>
                                </ul>
                            </div>
                            <div class="theme-option">
                                <span> Theme Style </span>
                                <select class="layout-style-option form-control input-sm">
                                    <option value="square" selected="selected">Square corners</option>
                                    <option value="rounded">Rounded corners</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Layout </span>
                                <select class="layout-option form-control input-sm">
                                    <option value="fluid" selected="selected">Fluid</option>
                                    <option value="boxed">Boxed</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Header </span>
                                <select class="page-header-option form-control input-sm">
                                    <option value="fixed" selected="selected">Fixed</option>
                                    <option value="default">Default</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Top Menu Dropdown</span>
                                <select class="page-header-top-dropdown-style-option form-control input-sm">
                                    <option value="light" selected="selected">Light</option>
                                    <option value="dark">Dark</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Mode</span>
                                <select class="sidebar-option form-control input-sm">
                                    <option value="fixed">Fixed</option>
                                    <option value="default" selected="selected">Default</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Menu </span>
                                <select class="sidebar-menu-option form-control input-sm">
                                    <option value="accordion" selected="selected">Accordion</option>
                                    <option value="hover">Hover</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Style </span>
                                <select class="sidebar-style-option form-control input-sm">
                                    <option value="default" selected="selected">Default</option>
                                    <option value="light">Light</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Position </span>
                                <select class="sidebar-pos-option form-control input-sm">
                                    <option value="left" selected="selected">Left</option>
                                    <option value="right">Right</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Footer </span>
                                <select class="page-footer-option form-control input-sm">
                                    <option value="fixed">Fixed</option>
                                    <option value="default" selected="selected">Default</option>
                                </select>
                            </div>
                        </div>
                    </div>