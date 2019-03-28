<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-3">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{asset('/images/logos/logo-cropped-resized-3.png')}}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3 ml-0"
           style="opacity: .8; margin-top: 0.5px;">
      <span class="brand-text font-weight-light text-uppercase">Rupal Enterprises</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="/home" class="nav-link @if ($active == 'dash') active @endif">
                <i class="nav-icon fa fa-dashboard"></i>
                <p>
                    Dashboard
                </p>
                </a>
                
            </li>
          
            <li class="nav-item">
                <a href="/files" class="nav-link @if ($active == 'files') active @endif ">
                <i class="nav-icon fa fa-file-o"></i>
                <p>
                    Files
                    
                </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="/news" class="nav-link @if ($active == 'news') active @endif">
                <i class="nav-icon fa fa-newspaper-o"></i>
                <p>
                    News
                    
                </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="/users" class="nav-link @if ($active == 'users') active @endif">
                    <i class="nav-icon fa fa-user"></i>
                    <p>
                        Users
                        
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="/sliderImages" class="nav-link @if ($active == 'images') active @endif">
                    <i class="nav-icon fa fa-image"></i>
                    <p>
                    Slider Images
                    
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="/users/{{Auth::id()}}/edit" class="nav-link @if ($active == 'accounts') active @endif">
                    <i class="nav-icon fa fa-cog"></i>
                    <p>
                    Account Settings
                    
                    </p>
                </a>
            </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>