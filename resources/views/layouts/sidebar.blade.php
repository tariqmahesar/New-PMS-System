<!-- Sidebar Menu -->
      <nav class="mt-2" style="font-size: 14px;">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{url('admin')}}" class="nav-link <?php if(Request::segment(2) == "dashboard"){ ?> active <?php } ?> ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul> -->
          </li>

<br>
          <!-- <li class="nav-header">Site Layout Section</li> -->

          <!-- <li class="nav-header">Product Section</li> -->
          <li class="nav-item <?php if(Request::segment(2) == "users" || Request::segment(2) == "users"){ ?> menu-is-opening menu-open <?php } ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{url('/admin/users')}}" class="nav-link <?php if(Request::segment(2) == "users" || Request::segment(2) == "users"){ ?> active <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users list</p>
                </a>
              </li>
              </ul>
          </li>
          <br>

          <li class="nav-item <?php if(Request::segment(2) == "category" ){ ?> menu-is-opening menu-open <?php } ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Manage Category & Design
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{url('admin/category')}}" class="nav-link <?php if(Request::segment(2) == "category" || Request::segment(2) == "add-category"){ ?> active <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categories & Design listing</p>
                </a>
              </li>

              

             <!--  <li class="nav-item">
                <a href="{{url('admin/product')}}" class="nav-link <?php if(Request::segment(2) == "product"){ ?> active <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product list</p>
                </a>
              </li> -->
              
            </ul>
          </li>



          <br>

          <?php $userType = Auth::user()->user_type; ?>

          <?php if($userType == "Manager"){ ?>
          <li class="nav-item <?php if(Request::segment(2) == "logs" ){ ?> menu-is-opening menu-open <?php } ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Show Notification Logs
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{url('admin/logs')}}" class="nav-link <?php if(Request::segment(2) == "logs"){ ?> active <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Notification Logs</p>
                </a>
              </li>

              

             <!--  <li class="nav-item">
                <a href="{{url('admin/product')}}" class="nav-link <?php if(Request::segment(2) == "product"){ ?> active <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product list</p>
                </a>
              </li> -->
              
            </ul>
          </li>

        <?php } ?>
          <!-- <li class="nav-item <?php if(Request::segment(2) == "design" ){ ?> menu-is-opening menu-open <?php } ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Manage Design
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{url('admin/design')}}" class="nav-link <?php if(Request::segment(2) == "design" || Request::segment(2) == "add-design"){ ?> active <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Design Listings</p>
                </a>
              </li> -->


             <!--  <li class="nav-item">
                <a href="{{url('admin/product')}}" class="nav-link <?php if(Request::segment(2) == "product"){ ?> active <?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product list</p>
                </a>
              </li> -->
              
            </ul>
          </li>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>