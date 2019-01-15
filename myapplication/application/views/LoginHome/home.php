<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('layouts/common'); ?>
</head>    
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <?php $this->load->view('layouts/header'); ?>

    <div class="page-container">
        <?php $this->load->view('layouts/side_bar_menu'); ?>
        <div class="page-content-wrapper">
            <div class="page-content">
                <?php $this->load->view('layouts/breadcrumb'); ?>
                
            </div>
            <div class="clearfix"></div>

        </div>
    </div>

<script>
window.table_id = "";
</script>        
<?php $this->load->view('layouts/footer'); ?>
<?php $this->load->view('layouts/common_js'); ?> 

</body>
</html>