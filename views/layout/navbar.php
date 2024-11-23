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
                            <a href="" class="nav-item nav-link">Đăng nhập</a>
                            <a href="" class="nav-item nav-link">Đăng ký</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
         <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Trang Sản Phẩm</h1>
            <div class="d-inline-flex">
                <p class="m-0">Trang chủ</p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Trang sản phẩm</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->