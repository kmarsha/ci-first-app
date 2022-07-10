
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('login') ?>" title="Ajax validation" class="nav-link <?php if ($page == 'home') : ?> active <?php endif ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item <?php if ($page == 'employee' || $page == 'product'): ?> menu-open <?php else : ?> menu-close <?php endif ?>">
            <a href="#" class="nav-link <?php if ($page == 'employee' || $page == 'product') : ?> active <?php endif ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= route_to('employees') ?>" class="nav-link <?php if ($page == 'employee') : ?> active <?php endif ?>"> 
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= route_to('products') ?>" class="nav-link <?php if ($page == 'product') : ?> active <?php endif ?>"> 
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php if ($page == 'user' || $page == 'admin' || $page == 'student'): ?> menu-open <?php else : ?> menu-close <?php endif ?>">
            <a href="#" class="nav-link <?php if ($page == 'user' || $page == 'admin' || $page == 'student') : ?> active <?php endif ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                User's Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= route_to('users') ?>" class="nav-link <?php if ($page == 'user') : ?> active <?php endif ?>"> 
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= route_to('admins') ?>" class="nav-link <?php if ($page == 'admin') : ?> active <?php endif ?>"> 
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admins Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= route_to('students') ?>" class="nav-link <?php if ($page == 'student') : ?> active <?php endif ?>"> 
                  <i class="far fa-circle nav-icon"></i>
                  <p>Students Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?= route_to('files') ?>" title="Uploading file" class="nav-link <?php if ($page == 'file') : ?> active <?php endif ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                File Uploads
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= route_to('contacts') ?>" title="Ajax validation" class="nav-link <?php if ($page == 'contact') : ?> active <?php endif ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Contacts
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>