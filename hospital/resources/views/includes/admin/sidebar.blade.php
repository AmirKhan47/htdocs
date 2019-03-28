<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/admin" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item has-treeview {{ request()->is('admin') ? 'menu-open' : '' }} ">
                <a href="#" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                    <i class="nav-icon fa fa-dashboard"></i>
                    <p>
                        Dashboard
                        <i class="right fa fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/admin" class="nav-link {{ request()->is('admin') ? 'active' : '' }} ">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                  </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{ (request()->is('user/*') OR request()->is('user')) ? 'menu-open' : '' }} ">
                <a href="#" class="nav-link {{ (request()->is('user/*') OR request()->is('user')) ? 'active' : '' }} ">
                    <i class="nav-icon fa fa-pie-chart"></i>
                    <p>
                        Users
                        <i class="right fa fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}" class="nav-link {{ request()->is('user') ? 'active' : '' }} ">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>Manage Users</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.create') }}" class="nav-link {{ request()->is('user/create') ? 'active' : '' }} ">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>Add Users</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{ request()->is('header') ? 'menu-open' : '' }} ">
                <a href="#" class="nav-link {{ request()->is('header') ? 'menu-open' : '' }} ">
                    <i class="nav-icon fa fa-tree"></i>
                    <p>
                        Bussinessess
                        <i class="fa fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/header" class="nav-link {{ request()->is('header') ? 'active' : '' }} ">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>Manage Bussinessess</p>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="/header/create" class="nav-link {{ request()->is('header/create') ? 'active' : '' }} ">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>Add Bussinessess</p>
                        </a>
                    </li> --}}
                </ul>
            </li>

          <li class="nav-item has-treeview {{ request()->is('') ? 'menu-open' : '' }} ">
            <a href="#" class="nav-link {{ request()->is('') ? 'menu-open' : '' }} ">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                Reports
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../forms/general.html" class="nav-link {{ request()->is('') ? 'active' : '' }} ">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Stocks Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../forms/advanced.html" class="nav-link {{ request()->is('') ? 'active' : '' }} ">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Monthly Detailed Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../forms/editors.html" class="nav-link {{ request()->is('') ? 'active' : '' }} ">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Other Business Monthly Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../forms/editors.html" class="nav-link {{ request()->is('') ? 'active' : '' }} ">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Hospital Expenses Monthly Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../forms/editors.html" class="nav-link {{ request()->is('') ? 'active' : '' }} ">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Profit/Loss Monthly Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../forms/editors.html" class="nav-link {{ request()->is('') ? 'active' : '' }} ">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Balance Sheet Monthly</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../forms/editors.html" class="nav-link {{ request()->is('') ? 'active' : '' }} ">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Doctors Report</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{ (request()->is('test') OR request()->is('test/create')) ? 'menu-open' : '' }} ">
            <a href="#" class="nav-link {{ (request()->is('test') OR request()->is('test/create')) ? 'active' : '' }} ">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Tests
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('test.index') }}" class="nav-link {{ request()->is('test') ? 'active' : '' }} ">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Manage Tests</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('test.create') }}" class="nav-link {{ request()->is('test/create') ? 'active' : '' }} ">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Tests</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{ (request()->is('doctor') OR request()->is('doctor/create')) ? 'menu-open' : '' }} ">
            <a href="#" class="nav-link {{ (request()->is('doctor') OR request()->is('doctor/create')) ? 'active' : '' }} ">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Doctors
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('doctor.index') }}" class="nav-link {{ request()->is('doctor') ? 'active' : '' }} ">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Manage Doctors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('doctor.create') }}" class="nav-link {{ request()->is('doctor/create') ? 'active' : '' }} ">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Doctors</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{ (request()->is('doctor') OR request()->is('doctor/create')) ? 'menu-open' : '' }} ">
            <a href="#" class="nav-link {{ (request()->is('doctor') OR request()->is('doctor/create')) ? 'active' : '' }} ">
              <i class="nav-icon fa fa-table"></i>
              <p>
                OT Doctors
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('doctor.category', 'Surgeon') }}" class="nav-link {{ request()->is('doctor') ? 'active' : '' }} ">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Manage OT Doctors</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{ route('doctor.create') }}" class="nav-link {{ request()->is('doctor/create') ? 'active' : '' }} ">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Doctors</p>
                </a>
              </li> --}}
            </ul>
          </li>

          <li class="nav-item has-treeview {{ (request()->is('patient') OR request()->is('patient/create')) ? 'menu-open' : '' }} ">
            <a href="#" class="nav-link {{ (request()->is('patient') OR request()->is('patient/create')) ? 'active' : '' }} ">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Test Receipts
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('patient.index') }}" class="nav-link {{ request()->is('patient') ? 'active' : '' }} ">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Manage Test Receipts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('patient.create') }}" class="nav-link {{ request()->is('patient/create') ? 'active' : '' }} ">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Test Receipts</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{ (request()->is('operation') OR request()->is('operation/create')) ? 'menu-open' : '' }} ">
            <a href="#" class="nav-link {{ (request()->is('operation') OR request()->is('operation/create')) ? 'active' : '' }} ">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Operations
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../tables/simple.html" class="nav-link {{ request()->is('operation') ? 'active' : '' }} ">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Manage Operations</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{ (request()->is('room') OR request()->is('room/create')) ? 'menu-open' : '' }} ">
            <a href="#" class="nav-link {{ (request()->is('room') OR request()->is('room/create')) ? 'active' : '' }} ">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Rooms
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../tables/simple.html" class="nav-link {{ request()->is('room') ? 'active' : '' }} ">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Manage Rooms</p>
                </a>
              </li>
            </ul>
        </li>

            <li class="nav-item has-treeview {{ (request()->is('operationbill') OR request()->is('operationbill/create')) ? 'menu-open' : '' }} ">
                <a href="#" class="nav-link {{ (request()->is('operationbill') OR request()->is('operationbill/create')) ? 'active' : '' }} ">
                  <i class="nav-icon fa fa-table"></i>
                  <p>
                    Operation Receipts
                    <i class="fa fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="../tables/simple.html" class="nav-link {{ request()->is('operationbill') ? 'active' : '' }} ">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Manage Operation Receipts</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../tables/data.html" class="nav-link {{ request()->is('operationbill') ? 'active' : '' }} ">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Add Operation Receipts</p>
                    </a>
                  </li>
                </ul>
            </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>