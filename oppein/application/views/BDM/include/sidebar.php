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
                        <li class="sidebar-search-wrapper">
                            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                            <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                            <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                            <!-- END RESPONSIVE QUICK SEARCH FORM -->
                        </li>
                        <li class="heading">
                            <h3 class="uppercase" style="color:white;">BDM Dashboard</h3>
                        </li>
                        <li class="nav-item <?php  if($active=='dashboard'){?> active open <?php }?>">
                            <a href="<?php echo BURL.'Dashboard/';?>" class="nav-link">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <?php  if($active=='dashboard'){?>

                                             <span class="selected"></span>
                                <?php }?>
                            </a>
                            
                        </li>
                        <li class="heading">
                            <h3 class="uppercase">Features</h3>
                        </li>
                        <li class="nav-item  <?php  if($active=='registration_form' || $active=='all_leads'){?>active open<?php }?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">Leads</span>
                                <?php  if($active=='registration_form' || $active=='all_leads'){?>
                                             <span class="selected"></span>
                                        <?php }?>
                                <span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  <?php  if($active=='registration_form'){?> active open <?php }?>">
                                    <a href="<?php echo BURL.'lead/registration_form';?>" class="nav-link ">
                                        <span class="title">Registration Form</span>
                                        <?php  if($active=='registration_form'){?>
                                             <span class="selected"></span>
                                        <?php }?>
                                    </a>
                                </li>
                                <li class="nav-item  <?php  if($active=='all_leads'){?> active open <?php }?>">
                                    <a href="<?php echo BURL.'lead/';?>" class="nav-link ">
                                        <span class="title">All Leads</span>
                                        <?php  if($active=='all_leads'){?>
                                             <span class="selected"></span>
                                        <?php }?>
                                    </a>
                                </li>
                            </ul>
                        </li> 
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>