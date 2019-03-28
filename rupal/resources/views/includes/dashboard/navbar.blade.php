
<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link"><i class="fa fa-globe"></i> Goto Website</a>
          </li>
          
        </ul>
    
        
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="fa fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right text-center">
              <a class="dropdown-item" href="#">Hello, {{ Auth::user()->name }}</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/users/{{Auth::id()}}/edit"><i class="fa fa-lock"></i>&nbsp;Change Password</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/logout" onclick="event.preventDefault();
              document.getElementById('myLogout_form').submit();"><i class="fa fa-key"></i>&nbsp;Logout</a>
              
              <form id="myLogout_form" class="dropdown-item" action="/logout" method="POST" style="display:none;">
                @csrf
              </form>
             
              
              
              
              {{-- <a href="#" class="dropdown-item">
                <i class="fa fa-key mr-2"></i> Log out
                
              </a> --}}
              
              
            </div>
          </li>
          
        </ul>
      </nav>
      <!-- /.navbar -->