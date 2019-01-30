<?php if (!$this->session->userdata('session_data')): ?>
    <?php redirect(URL.'authentication/login'); ?>
<?php endif ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title; ?> | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo Admin_assets; ?>vendors/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo Admin_assets; ?>vendors/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo Admin_assets; ?>vendors/Ionicons/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo Admin_assets; ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <?php if ($active == 'news'): ?>
            <!-- bootstrap wysihtml5 - text editor -->
             <link rel="stylesheet" href="<?php echo Admin_assets; ?>vendors/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <?php endif ?>
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo Admin_assets;?>css/AdminLTE.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo Admin_assets;?>css/skin-red.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>