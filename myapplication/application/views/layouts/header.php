<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
			<a href="">
			<!-- <img src="<?php echo base_url(); ?>assets/layouts/layout/img/fts_logo.png" alt="logo" class="logo-default" /> </a> -->
			<div class="menu-toggler sidebar-toggler">
				<span></span>
			</div>
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
                        <img alt="" class="img-circle" src="<?php echo base_url();?>assets/layouts/layout/img/user_icon.png" />
                        <span class="username username-hide-on-mobile"> <?php echo $this->session->user_name ?> </span>
                        <i class="fa fa-angle-down"></i>
					</a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/login">
							<i class="icon-key"></i> Log Out </a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="clearfix"> </div>