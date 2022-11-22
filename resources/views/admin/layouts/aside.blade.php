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

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item menu-open">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
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


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Division
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.divisions.index')}}" class="nav-link {{ request()->is('*/divisions*') ? 'active' : ' '}}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Division</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.districts.index')}}" class="nav-link {{ request()->is('*/districts*') ? 'active' : ' '}}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>District</p>
                </a>
              </li>
             
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                News
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.news.index')}}" class="nav-link {{ request()->is('*/news*') ? 'active' : ' '}}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>News</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-cog nav-icon"></i>
              <p>
                Setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.social')}}" class="nav-link {{ request()->is('*/social*') ? 'active' : ' '}}">
                  <i class="fa fa-cog nav-icon"></i>
                  <p>Social Setting</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.seo')}}" class="nav-link {{ request()->is('*/seo*') ? 'active' : ' '}}">
                  <i class="fa fa-cog nav-icon"></i>
                  <p>SEO Setting</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.namaz')}}" class="nav-link {{ request()->is('*/namaz*') ? 'active' : ' '}}">
                  <i class="fa fa-cog nav-icon"></i>
                  <p>Prayer Time</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.livetv')}}" class="nav-link {{ request()->is('*/livetv*') ? 'active' : ' '}}">
                  <i class="fa fa-cog nav-icon"></i>
                  <p>LiveTv Setting</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.notices.index')}}" class="nav-link {{ request()->is('*/notices*') ? 'active' : ' '}}">
                  <i class="fa fa-cog nav-icon"></i>
                  <p>Notice Setting</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.websites.index')}}" class="nav-link {{ request()->is('*/websites*') ? 'active' : ' '}}">
                  <i class="fa fa-cog nav-icon"></i>
                  <p>Website Link</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Gallery
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('admin.photos.index')}}" class="nav-link {{ request()->is('*/photos*') ? 'active' : ' '}}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Photo Gallery</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.vedios.index')}}" class="nav-link {{ request()->is('*/vedios*') ? 'active' : ' '}}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Vedio Gallery</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Advertisement
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.ads.index')}}" class="nav-link {{ request()->is('*/ads*') ? 'active' : ' '}}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Ads</p>
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