  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-2">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/img/ktc_logo_line.png" alt="AdminLTE Logo" width="15px" class="" style="opacity: .8"> 
      <span class="brand-text font-weight-light">REPROTIK:: ADMIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="/admin/dashboard" class="nav-link {{Request::is('admin/dashboard') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="/admin/project" class="nav-link {{Request::is('admin/project*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-folder-plus"></i>
              <p>
                Project
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/video" class="nav-link {{Request::is('admin/video*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-film"></i>
              <p>
                Video
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/panduan" class="nav-link {{Request::is('admin/panduan*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Panduan
              </p>
            </a>
          </li>

          @if (auth()->user()->role == 'admin')
              
          <li class="nav-item">
            <a href="/admin/kategori" class="nav-link {{Request::is('admin/kategori*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Kategori
              </p>
            </a>
          </li>



          
           

          <li class="nav-item {{Request::is('admin/user*') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{Request::is('admin/user*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/user?role=user" class="nav-link {{request('role')== 'user' ? 'child-active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/user?role=admin" class="nav-link  {{request('role')== 'admin' ? 'child-active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
            </ul>
          </li>

          @endif


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


