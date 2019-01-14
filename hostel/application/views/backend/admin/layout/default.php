<!DOCTYPE html>
<html lang="en">
<?php if(!$this->session->userdata('user_id')){ redirect($this->load->view('backend/login')); } ?>
	<!-- BEGIN: Header -->
	<?php $this->load->view('backend/admin/layout/header'); ?>
	<!-- END: Header -->

	<!-- begin::Body -->
	<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

		<!-- BEGIN: Left Aside -->
		<?php $this->load->view('backend/admin/layout/left_side'); ?>
		<!-- END: Left Aside -->

		<!-- BEGIN: My Page -->
		<style>
			.no-js #loader { display: none;  }
			.js #loader { display: block; position: absolute; left: 100px; top: 0; }
			.se-pre-con
			{
				position: fixed;
				left: 0px;
				top: 0px;
				width: 100%;
				height: 100%;
				z-index: 9999;
				background: url(<?php echo URL;?>assets/admin/loader/Preloader_2.gif) center no-repeat #fff;
			}
		</style>
		<div class="se-pre-con"></div>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
		<script>
			$(window).load(function() {
				// Animate loader off screen
				$(".se-pre-con").fadeOut("slow");;
			});
		</script>
		<?php $this->load->view('backend/admin/'.$page); ?>
		<!-- END: My Page -->

	</div>
	<!-- end:: Body -->

	<!-- begin::Footer -->
	<?php $this->load->view('backend/admin/layout/footer'); ?>
	<!-- end::Footer -->

	</body>
	<!-- end::Body -->
</html>