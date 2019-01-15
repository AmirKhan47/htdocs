<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('ro/include/head');?>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
	<?php  $this->load->view('ro/include/top_menu');?>
	<div class="page-container">
		<?php  $this->load->view('ro/include/sidebar');?>
		<div class="page-content-wrapper">
		    <div class="page-content">
		        <!-- <?php  $this->load->view('ro/include/theme');?> -->
		        <?php  $this->load->view($sublayout);?> 	
		   </div>
	    </div>
	    <?php  $this->load->view('ro/include/quickslider');?>
	</div>
	<?php  $this->load->view('ro/include/footer');?>
</body>

</html>