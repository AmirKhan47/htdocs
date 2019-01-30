<body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo AURL; ?>Dashboard" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>PYIT</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>PYIT</b>GB</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a class="btn bg-navy btn-flat text-center" href="<?php echo URL; ?>">
                                <i class="fa fa-globe"></i>
                                <span> Visit Site</span>
                            </a>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-user"></span>
                                <span class="hidden-xs"><?php if ($this->session->userdata('session_data')): ?>
                                    <?= $this->session->userdata('session_data')['session_user_name']; ?>
                                <?php endif ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-left">
                                <!-- User image -->
                                <li class="text-center"><a href="<?php echo AURL; ?>Profile_Settings">Profile</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="text-center"><a href="<?php echo URL; ?>authentications/Auth/logout_user">Sign out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>