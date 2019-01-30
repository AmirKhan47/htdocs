		<footer class="main-footer text-center">
		    <strong>Copyright &copy; 2019 <a href="http://www.pyitgb.com" target="_blank">PYIT</a>.</strong> All rights
		    reserved.
		</footer>
	</div>
	<!-- ./wrapper -->

	<!-- jQuery 3 -->
		<script src="<?php echo Admin_assets;?>vendors/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap 3.3.7 -->
		<script src="<?php echo Admin_assets;?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- DataTables -->
		<script src="<?php echo Admin_assets;?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo Admin_assets;?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
		<!-- AdminLTE App -->
		<script src="<?php echo Admin_assets;?>js/adminlte.js"></script>

		<?php if ($active == 'users'): ?>
			<script>
				$(document).ready(function(){
					$("#users_data").DataTable();
				});
			</script>
		<?php endif ?>


		<?php if ($active == 'news'): ?>
			<script>
				$(document).ready(function(){
					$("#news_data").DataTable();
				});
			</script>
			<script src="<?php echo Admin_assets;?>scripts/file_delete.js"></script>
			<!-- Bootstrap WYSIHTML5 -->
			<script src="<?php echo Admin_assets; ?>vendors/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
			<script>
				$(document).ready(function(){
					$('.wysihtml5').wysihtml5();
				});
				
			</script>
		<?php endif ?>


		<?php if ($active == 'files'): ?>
			<script>
				$(document).ready(function(){
					$("#files_data").DataTable();
				});
			</script>
			<script src="<?php echo Admin_assets;?>scripts/file_delete.js"></script>
		<?php endif ?>


		<?php if ($active == 'slider'): ?>
			<script src="<?php echo Admin_assets;?>scripts/slider_images.js"></script>
		<?php endif ?>
		
	</body>
</html>