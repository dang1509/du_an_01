<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Danh mục sản phẩm</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
                id="navbar-vertical">
                <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                
                  <?php foreach ($DanhMuc as $key => $item): ?>

                    <a href="?act=timkiemdanhmuc&id=<?= $item['id'] ?>" class="nav-item nav-link" ><?= $item['ten_danh_muc'] ?></a>
                  
                    <?php endforeach; ?> 
                </div>
            </nav>
                  </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="<?=BASE_URL?>" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="<?=BASE_URL?>" class="nav-item nav-link active">Trang chủ</a>
                        <a href="<?php echo BASE_URL . '?act=list-san-pham' ?>" class="nav-item nav-link">Sản phẩm</a>
                        <a href="?act=tintuc" class="nav-item nav-link">Tin tức</a>
                        <a href="?act=gioithieu" class="nav-item nav-link">Giới thiệu</a>
                        <a href="?act=lienhe" class="nav-item nav-link">Liên hệ</a>
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
                                <li><a class="dropdown-item" href="?act=thongtin" >Thông tin cá nhân</a></li>
                                <li><a class="dropdown-item" href="?act=lichsu">Lịch sử đơn hàng</a></li>
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
                                <li><a class="dropdown-item" href="?act=thongtin" >Thông tin cá nhân</a></li>
                                <li><a class="dropdown-item" href="?act=lichsu">Lịch sử đơn hàng</a></li>
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
            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" style="height: 410px;">
                        <img class="img-fluid"
                            src="./uploads/pngtree-taobao-jewelry-fresh-and-simple-gold-jewelry-poster-picture-image_1034493.jpg"
                            alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">Giảm giá lên đến 20%</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Trang sức bạc</h3>
                                <a href="" class="btn btn-light py-2 px-3">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="height: 410px;">
                        <img class="img-fluid"
                            src="./uploads/pngtree-diamond-jewelry-advertising-psd-material-image_195800.jpg"
                            alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">Giảm giá lên đến 30% </h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Đơn hàng trên 2.000.000đ
                                </h3>
                                <a href="" class="btn btn-light py-2 px-3">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-prev-icon mb-n2"></span>
                    </div>
                </a>
                <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-next-icon mb-n2"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Navbar End -->


<!-- Featured Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Sản phẩm chất lượng</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Miễn phí giao hàng</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">14 Ngày đổi trả</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Hỗ trợ 24/7</h5>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->
