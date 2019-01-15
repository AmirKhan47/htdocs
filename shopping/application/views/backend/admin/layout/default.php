<!DOCTYPE html>
<html lang="en">
	<!-- BEGIN: Header -->
	<?php $this->load->view('backend/admin/layout/header'); ?>
	<!-- END: Header -->

	<!-- begin::Body -->
	<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

		<!-- BEGIN: Left Aside -->
		<?php $this->load->view('backend/admin/layout/left_side'); ?>
		<!-- END: Left Aside -->

		<!-- BEGIN: My Page -->
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