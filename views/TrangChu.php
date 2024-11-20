<?php include "./views/layout/header.php" ?>
<?php include "./views/layout/navbar_trangchu.php" ?>
     <!-- Products Start -->
     <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">XU HƯỚNG TÌM KIẾM</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <!-- Sản phẩm hot -->
             <?php foreach($Top4SanPham as $key=>$item): ?>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <a href=""><img class="img-fluid w-100" src="<?= $item['hinh_anh'] ?>" alt=""></a>
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <a href=""><h6 class="text-truncate mb-3"><?= $item['ten_san_pham'] ?></h6></a>
                        <div class="d-flex justify-content-center">
                            <?php if($item['gia_khuyen_mai'] !=0){ ?>
                                
                            <h6><?= number_format($item['gia_khuyen_mai'], 0, ',', '.'); ?> VND</h6><h6 class="text-muted ml-2"><del><?= number_format($item['gia_san_pham'], 0, ',', '.'); ?> VND</del></h6>
                            <?php }else{ ?>
                                <h6><?= number_format($item['gia_san_pham'], 0, ',', '.'); ?> VND</h6>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem Chi Tiết</a>
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">SẢN PHẨM KHUYẾN MÃI</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">

            <?php foreach($SanPhamKhuyenMai as $key=>$item): ?>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <a href=""><img class="img-fluid w-100" src="<?= $item['hinh_anh'] ?>" alt=""></a>
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <a href=""><h6 class="text-truncate mb-3"><?= $item['ten_san_pham'] ?></h6></a>
                        <div class="d-flex justify-content-center">
                            <?php if($item['gia_khuyen_mai'] !=0){ ?>
                                
                            <h6><?= number_format($item['gia_khuyen_mai'], 0, ',', '.'); ?> VND</h6><h6 class="text-muted ml-2"><del><?= number_format($item['gia_san_pham'], 0, ',', '.'); ?> VND</del></h6>
                            <?php }else{ ?>
                                <h6><?= number_format($item['gia_san_pham'], 0, ',', '.'); ?> VND</h6>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem Chi Tiết</a>
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            
        </div>
    </div>
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">SẢN PHẨM MỚI</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">

            <?php foreach($SanPhamMoi as $key=>$item): ?>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <a href=""><img class="img-fluid w-100" src="<?= $item['hinh_anh'] ?>" alt=""></a>
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <a href=""><h6 class="text-truncate mb-3"><?= $item['ten_san_pham'] ?></h6></a>
                        <div class="d-flex justify-content-center">
                            <?php if($item['gia_khuyen_mai'] !=0){ ?>
                                
                            <h6><?= number_format($item['gia_khuyen_mai'], 0, ',', '.'); ?> VND</h6><h6 class="text-muted ml-2"><del><?= number_format($item['gia_san_pham'], 0, ',', '.'); ?> VND</del></h6>
                            <?php }else{ ?>
                                <h6><?= number_format($item['gia_san_pham'], 0, ',', '.'); ?> VND</h6>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem Chi Tiết</a>
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            
        </div>
    </div>
    <!-- Products End -->
<?php include "./views/layout/footer.php" ?>
