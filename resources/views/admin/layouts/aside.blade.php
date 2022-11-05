  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
          <a href="#" class="d-block">News Portal</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item menu-open">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
                
              </li>

              <li class="nav-item menu-is-opening menu-open">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-file"></i>
                  <p>
                    Category
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: block;">
    
                  <li class="nav-item">
                    <a href="{{ route('admin.categories.index')}}" class="nav-link {{ request()->is('*/categories*') ? 'active' : ' '}}">
                      <i class="fas fa-list nav-icon"></i>
                      <p>Category</p>
                    </a>
                  </li>
    
                  <li class="nav-item">
                    <a href="{{ route('admin.sub-categories.index')}}" class="nav-link {{ request()->is('*/sub-categories*') ? 'active' : ' '}}">
                      <i class="fas fa-list nav-icon"></i>
                      <p>Sub Category</p>
                    </a>
                  </li>
                </ul>
              </li>


              <li class="nav-item menu-is-opening menu-open">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-file"></i>
                  <p>
                    District
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: block;">
    
                  <li class="nav-item">
                    <a href="{{ route('admin.districts.index')}}" class="nav-link {{ request()->is('*/districts*') ? 'active' : ' '}}">
                      <i class="fas fa-list nav-icon"></i>
                      <p>District</p>
                    </a>
                  </li>
    
                  {{-- <li class="nav-item">
                    <a href="{{ route('admin.sub-categories.index')}}" class="nav-link {{ request()->is('*/sub-categories*') ? 'active' : ' '}}">
                      <i class="fas fa-list nav-icon"></i>
                      <p>Sub Category</p>
                    </a>
                  </li> --}}
                </ul>
              </li>
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>