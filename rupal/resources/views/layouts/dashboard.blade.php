@include('includes/dashboard/header')
@include('includes/dashboard/navbar')
@include('includes/dashboard/sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content py-2">
        @include('includes/messages')
        @yield('content')
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include('includes/dashboard/footer')

  

  

  
