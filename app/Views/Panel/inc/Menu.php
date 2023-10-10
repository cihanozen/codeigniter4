  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url($locale.'/dashboard')?>" class="brand-link">
      <img src="<?php echo base_url('assets/dist/img/AdminLTELogo.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CI4 Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg')?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info ">
          <a href="#" class="d-block"><?php echo session()->get('loggedUser')['username']?></a>
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
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url($locale.'/dashboard')?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas "></i>
              </p>
            </a>
          </li>

          <li class="nav-item <?php echo ($uri->getSegment(2) == 'user-lists' || $uri->getSegment(2) == 'user-add' || $uri->getSegment(2) == 'user-edit') ? 'menu-open' : '';?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                <?php echo Lang('Text.Users');?>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url($locale.'/user-lists')?>" class="nav-link <?php echo ($uri->getSegment(2) == 'user-lists') ? 'active' : '';?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo Lang('Text.UserLists');?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url($locale.'/user-add')?>" class="nav-link <?php echo ($uri->getSegment(2) == 'user-add') ? 'active' : '';?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo Lang('Text.UserAdd');?></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item <?php echo ($uri->getSegment(2) == 'user-group-lists' || $uri->getSegment(2) == 'user-group-add' || $uri->getSegment(2) == 'user-group-edit') ? 'menu-open' : '';?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                <?php echo Lang('Text.UserGroups');?>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url($locale.'/user-group-lists')?>" class="nav-link <?php echo ($uri->getSegment(2) == 'user-group-lists' || $uri->getSegment(2) == 'user-group-edit') ? 'active' : '';?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo Lang('Text.GroupLists');?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url($locale.'/user-group-add')?>" class="nav-link <?php echo ($uri->getSegment(2) == 'user-group-add') ? 'active' : '';?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo Lang('Text.GroupAdd');?></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item <?php echo ($uri->getSegment(2) == 'language-lists' || $uri->getSegment(2) == 'language-add' || $uri->getSegment(2) == 'language-edit' || $uri->getSegment(3) != '' and $uri->getSegment(2) != 'user-group-edit') ? 'menu-open' : '';?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                <?php echo Lang('Text.LanguageManagement');?>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url($locale.'/language-lists')?>" class="nav-link <?php echo ($uri->getSegment(2) == 'language-lists' || $uri->getSegment(2) == 'language-edit' || $uri->getSegment(2) == 'language-translate' ) ? 'active' : '';?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo Lang('Text.LanguageLists');?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url($locale.'/language-add')?>" class="nav-link <?php echo ($uri->getSegment(2) == 'language-add') ? 'active' : '';?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo Lang('Text.AddNewLanguage');?></p>
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
