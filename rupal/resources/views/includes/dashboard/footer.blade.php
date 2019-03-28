<footer class="main-footer text-center">
    
    <strong>Copyright &copy; 2019 <a href="/">Rupal Enterprises</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Bootstrap and Jquery -->
<script src="{{ asset('js/app.js') }}"></script>

<!-- AdminLTE js -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>

<!-- DataTables jQuery -->
<script src="{{ asset('dist/plugins/datatables/jquery.dataTables.min.js')}}"></script>

<!-- DataTables Bootstrap -->
<script src="{{ asset('dist/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Files Datatables -->
<script>
  $("#files_dataTable").dataTable(
  );
</script>

<!-- News Datatables -->
<script>
  $("#news_dataTable").dataTable(
  );
</script>

<script>
  $("#users_dataTable").dataTable();
</script>

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>

</body>
</html>