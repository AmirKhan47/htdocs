<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sign In | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo Admin_assets;?>vendors/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo Admin_assets;?>vendors/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo Admin_assets;?>vendors/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo Admin_assets;?>/css/AdminLTE.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="<?php echo URL;?>"><img src="<?php echo URL; ?>assets/website/logo/logo-2.png" alt=""></a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <?php if ($this->session->flashdata('login_error')): ?>
                    <div class="alert alert-danger"><?php echo $this->session->flashdata('login_error'); ?></div>
                <?php endif ?>

                <?php if ($this->session->flashdata('user_status_error')): ?>
                    <div class="alert alert-danger"><?php echo $this->session->flashdata('user_status_error'); ?></div>
                <?php endif ?>
                
                <form action="<?php echo URL; ?>authentications/Auth/validate_login" method="POST">
                    <div class="form-group has-feedback">
                        <input type="text" name="input_username" class="form-control" placeholder="Username" required>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="input_password" class="form-control" placeholder="Password" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 pull-right">
                            <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat" value="submit">Sign In</button>
                        </div>
                    </div>
                </form>
                <!-- <a href="#">I forgot my password</a><br> -->
                
            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->
        <!-- jQuery 3 -->
        <script src="<?php echo Admin_assets;?>vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo Admin_assets;?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>