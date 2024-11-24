<?php include "./views/layout/header.php" ?>
<?php include "./views/layout/navbar.php" ?>
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Chi Tiết Sản Phẩm</h1>
        <div class="d-inline-flex">
            <p class="m-0">Trang chủ</p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Chi Tiết Sản Phẩm</p>
        </div>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    <?php foreach ($listAnhSanPham as $key => $item): ?>

                        <div class="<?php if ($key === 0) {
                            echo 'carousel-item active';
                        } else {
                            echo 'carousel-item';
                        }
                        ; ?>">
                            <img class="w-100 h-100" src="<?php echo BASE_URL . $item['link_hinh_anh'] ?>" alt="Image">
                        </div>
                    <?php endforeach; ?>
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold"><?= $SanPham['ten_san_pham'] ?></h3>
            <?php if (isset($SanPham['gia_khuyen_mai']) && $SanPham['gia_khuyen_mai'] != 0) { ?>
                <h3 class="mb-4"><?= number_format($SanPham['gia_khuyen_mai'], 0, ',', '.') ?> VND</h3>
                <h3 class="text-muted ml-2"><del><?= number_format($SanPham['gia_san_pham'], 0, ',', '.'); ?> VND</del></h3>
            <?php } else { ?>
                <h3 class="mb-4"><?= number_format($SanPham['gia_san_pham'], 0, ',', '.') ?> VND</h3>
            <?php } ?>

            <p class="mb-4"><?= $SanPham['mo_ta'] ?></p>
            <div class="d-flex mb-3">
                <p class="text-dark font-weight-medium mb-0 mr-3">Lượt xem:
                <p class="mb-3"><?= $SanPham['luot_xem'] ?></p>
                </p>

            </div>
            <div class="d-flex mb-4">

                <p class="text-dark font-weight-medium mb-0 mr-3">Trạng thái:
                <p class="mb-3 <?= $SanPham['trang_thai'] == 1 ? 'text-success' : 'text-danger' ?>">
                    <?= $SanPham['trang_thai'] == 1 ? 'Còn hàng' : 'Hết hàng' ?></p>
                </p>

            </div>
            <div class="d-flex align-items-center mb-4 pt-2">
                <!-- <form id="myForm" action="#" method="post">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-primary btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="number" class="form-control bg-secondary text-center" value="1" readonly
                            name="so_luong_mua" id="quantityInput">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </form> -->
                <a href="<?= BASE_URL .'?act=them-tu-chi-tiet&id_san_pham='. $SanPham['id'] ?>"><button
                        class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Thêm vào giỏ
                        hàng</button></a>

            </div>

        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Thông số sản phẩm</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Bình luận</a>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-1">
                    <h4 class="mb-3">Chi tiết sản phẩm</h4>
                    <table class="table table-tripped">
                        <thead>
                            <tr>
                                <th>Loại</th>
                                <th>Chất Liệu</th>
                                <th>Đá</th>
                                <th>Độ hoàn thiện</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $SanPham['ten_danh_muc'] ?></td>
                                <td><?= $SanPham['chat_lieu'] ?></td>
                                <td>Curbic Zirconia</td>
                                <td>Xuất Sắc</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="tab-pane fade" id="tab-pane-2">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-4">Bình luận của sản phẩm</h4>
                            <?php foreach ($BinhLuan as $key => $item): ?>
                                <div class="media mb-4">

                                    <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6><?= $item['ho_ten'] ?><small> - <i><?= $item["ngay_dang"] ?></i></small></h6>
                                        <p><?= $item['noi_dung'] ?></p>
                                    </div>

                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-4">Nhập bình luận</h4>
                            <form method="post" action="?act=add-binh-luan&id_san_pham=<?= $SanPham['id'] ?>">
                                <div class="form-group">
                                    <textarea id="message" cols="30" rows="5" class="form-control"
                                        name="noi_dung"></textarea>
                                </div>
                                <div class="form-group mb-0">
                                    <?php if (isset($_SESSION['name'])) {
                                        echo '<input type="submit" value="Gửi" class="btn btn-primary px-3" name="addBinhLuan">';
                                    } else {
                                        echo '<p class="text-danger">Vui lòng đăng nhập để nhập bình luận</p>';
                                    } ?>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Products Start -->
<div class="container-fluid py-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Sản Phẩm Tương Tự</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        <!-- Sản phẩm hot -->
        <?php foreach ($Top4SanPham as $key => $item): ?>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <a href="<?= BASE_URL.'?act=chi-tiet-san-pham&id_san_pham='.$item['id'] ?>"><img class="img-fluid w-100" src="<?= $item['hinh_anh'] ?>" alt=""></a>
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <a href="<?= BASE_URL.'?act=chi-tiet-san-pham&id_san_pham='.$item['id'] ?>">
                            <h6 class="text-truncate mb-3"><?= $item['ten_san_pham'] ?></h6>
                        </a>
                        <div class="d-flex justify-content-center">
                            <?php if ($item['gia_khuyen_mai'] != 0) { ?>

                                <h6><?= number_format($item['gia_khuyen_mai'], 0, ',', '.'); ?> VND</h6>
                                <h6 class="text-muted ml-2"><del><?= number_format($item['gia_san_pham'], 0, ',', '.'); ?>
                                        VND</del></h6>
                            <?php } else { ?>
                                <h6><?= number_format($item['gia_san_pham'], 0, ',', '.'); ?> VND</h6>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="<?= BASE_URL.'?act=chi-tiet-san-pham&id_san_pham='.$item['id'] ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem Chi
                            Tiết</a>
                        <a href="<?= BASE_URL .'?act=them-tu-chi-tiet&id_san_pham='. $item['id'] ?>" class="btn btn-sm text-dark p-0"><i
                                class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Products End -->
<?php include "./views/layout/footer.php" ?>
