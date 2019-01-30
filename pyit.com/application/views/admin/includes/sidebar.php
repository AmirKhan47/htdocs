<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header text-center" style="text-transform: uppercase;">Administration Panel</li>

            <li class="<?php if($active == 'dash'){ echo 'active';} ?>">
                <a href="<?php echo URL; ?>admin">
                    <i class="fa fa-dashboard"></i> 
                    <span>Dashboard</span>
                </a>
            </li>
            

            <li class="<?php if($active == 'files'){echo 'active';}?>">
                <a href="<?php echo AURL; ?>Files">
                    <i class="fa fa-files-o"></i>
                    <span>Files</span>
                </a>
            </li>


            <li class="<?php if($active == 'news'){echo 'active';}?>">
                <a href="<?php echo AURL; ?>News">
                    <i class="fa fa-newspaper-o"></i>
                    <span>News</span>
                </a>
            </li>

            <li class="<?php if($active == 'users'){echo 'active';}?>">
                <a href="<?php echo AURL; ?>Users">
                    <i class="fa fa-user"></i>
                    <span>Users</span>
                </a>
            </li>

            

            <li class="<?php if($active == 'slider'){echo 'active';}?>">
                <a href="<?php echo AURL; ?>Slider_Images">
                    <i class="fa fa-image"></i>
                    <span>Slider Images</span>
                </a>
            </li>

            

            <li class="<?php if($active == 'profile'){ echo 'active';}?>">
                <a href="<?php echo AURL; ?>Profile_Settings">
                    <i class="fa fa-gear"></i>
                    <span>Account Settings</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>