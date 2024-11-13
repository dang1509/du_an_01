<aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link text-center">
      <span class="brand-text font-weight-light">Admin</span> 
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['user']; ?></a>
        </div>  
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
  
               <li class="nav-item">
            <a href="<?php echo BASE_URL_ADMIN.'?act=/' ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              Trang chủ
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo BASE_URL_ADMIN.'?act=danh-muc' ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Danh mục sản phẩm
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo BASE_URL_ADMIN.'?act=san-pham' ?>" class="nav-link">
              <i class="nav-icon fas fa-ring"></i>
              <p>
                Sản phẩm
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo BASE_URL_ADMIN.'?act=don-hang' ?>" class="nav-link">
            <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Đơn hàng
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo BASE_URL_ADMIN.'?act=binh-luan' ?>" class="nav-link">
            <i class="nav-icon fas fa-comments"></i>
              <p>
                Bình luận 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
              <p>
                Quản lí tài khoản
              </p>
              <i class="fas fa-angle-left right"></i> 
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo BASE_URL_ADMIN.'?act=tai-khoan-quan-tri' ?>" class="nav-link">
                <i class="nav-icon far fa-user">
                  Tài khoản quản trị
                </i>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo BASE_URL_ADMIN.'?act=tai-khoan-khach-hang' ?>" class="nav-link">
                <i class="nav-icon far fa-user">
                  Tài khoản khách hàng
                </i>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo BASE_URL_ADMIN.'?act=voucher' ?>" class="nav-link">
            <i class="nav-icon fas fa-ticket-alt"> </i>
              <p>
              Voucher 
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>