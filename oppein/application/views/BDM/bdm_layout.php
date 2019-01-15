<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('bdm/include/head');?>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
	<?php  $this->load->view('bdm/include/top_menu');?>
	<div class="page-container">
		<?php  $this->load->view('bdm/include/sidebar');?>
		<div class="page-content-wrapper">
		    <div class="page-content">
		        <!-- <?php  $this->load->view('bdm/include/theme');?> -->
		        <?php  $this->load->view($sublayout);?> 	
		   </div>
	    </div>
	    <?php  $this->load->view('bdm/include/quickslider');?>
	</div>
	<?php  $this->load->view('bdm/include/footer');?>
</body>

</html>