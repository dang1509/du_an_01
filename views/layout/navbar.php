<div class="container-fluid">
        <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Danh mục sản phẩm</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 250px">
                        
                        <?php foreach($DanhMuc as $key=>$item): ?>
                        
                        <a href="" class="nav-item nav-link"><?= $item['ten_danh_muc'] ?></a>
                        
                        
                        <?php endforeach;?>
                        
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="#" class="nav-item nav-link">Trang chủ</a>
                            <a href="<?php echo BASE_URL.'?act=list-san-pham' ?>" class="nav-item nav-link">Sản phẩm</a>
                            <a href="#" class="nav-item nav-link">Tin tức</a>
                            <a href="#" class="nav-item nav-link">Giới thiệu</a>
                            <a href="#" class="nav-item nav-link">Liên hệ</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                        <?php
                        if (isset($_SESSION['login']) && isset($_SESSION['name']) && isset($_SESSION['chuc_vu']) && $_SESSION['chuc_vu'] == 2) { ?>

                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="#">Thông tin cá nhân</a></li>
                                    <li><a class="dropdown-item" href="#">Lịch sử đơn hàng</a></li>
                                    <li><a class="dropdown-item text-danger" href="?act=logout">Đăng xuất</a></li>
                                </ul>
                            </div>

                        <?php
                        }elseif(isset($_SESSION['login']) && isset($_SESSION['name']) && isset($_SESSION['chuc_vu']) && $_SESSION['chuc_vu'] == 1){
?>
                                <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL_ADMIN.'?act=/' ?>">Vào Quản Trị</a></li>
                                    <li><a class="dropdown-item text-danger" href="?act=logout">Đăng xuất</a></li>
                                </ul>
                            </div>
               <?php         }else{
                            // Nếu chưa đăng nhập, hiển thị liên kết đăng nhập và đăng ký
                            echo '<a href="index.php?act=dangnhap" class="nav-item nav-link">Đăng nhập</a>';
                            echo '<a href="index.php?act=dangki" class="nav-item nav-link">Đăng ký</a>';
                        }
                        ?>

                    </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
         <!-- Page Header Start -->
    
    <!-- Page Header End -->