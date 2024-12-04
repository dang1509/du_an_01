<?php include './views/layout/header.php'; ?>
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trang Thống Kê</h1>
                    <div>
                        <form action="<?= BASE_URL_ADMIN . '?act=thong-ke' ?>" method="post">
                            <div class="row">
                                <div class="col-lg-3">
                                    <h5>Từ ngày</h5>
                                    <input type="date" class="form-control" name="ngay_bat_dau">
                                </div>
                                <div class="col-lg-3">
                                    <h5>Đến ngày</h5>
                                    <input type="date" class="form-control" name="ngay_ket_thuc">
                                </div>
                                <div class="col-lg-3 d-flex align-items-end">
                                    <button class="btn btn-primary" type="submit">Xem</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                        <h1 class="card-title">Doanh thu từ ngày <?= date('d-m-Y', strtotime($ngay_bat_dau)) ?> đến ngày <?= date('d-m-Y', strtotime($ngay_ket_thuc)) ?></h1>

                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>Tổng doanh thu</th>
                                        <th>Số đơn hàng(Trạng thái thành công)</th>
                                        <th>Số sản phẩm bán được</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= 
                                             number_format($doanhThu['tong_doanh_thu'] ?? 0, 0, ',', '.')
                                            ; ?> VND</td>
                                        <td><?= $doanhThu['so_don_hang'] ?? 0 ?></td>
                                        <td><?= $doanhThu['so_san_pham_ban_duoc'] ?? 0; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <h1 class="card-title"> TOP 5 sản phẩm bán chạy nhất từ ngày <?= date('d-m-Y', strtotime($ngay_bat_dau)) ?> đến ngày <?= date('d-m-Y', strtotime($ngay_ket_thuc)) ?></h1>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Danh mục</th>
                                        <th>Số sản phẩm đã bán</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                     foreach($top5SanPham as $key=>$item):   ?>
                                        <tr>
                                            <td><?= $item['ten_san_pham'] ?></td>
                                            <td><?= $item['ten_danh_muc'] ?></td>
                                            <td><?= $item['tong_so_luong_ban'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <h1 class="card-title">Top 3 khách mua hàng nhiều nhất từ ngày <?= date('d-m-Y', strtotime($ngay_bat_dau)) ?> đến ngày <?= date('d-m-Y', strtotime($ngay_ket_thuc)) ?></h1>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>Tên khách hàng</th>
                                        <th>Số đơn hàng</th>
                                        <th>Số sản phẩm đã mua</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($top3KhachHang as $key=>$item): ?>
                                        <tr>
                                            <td><?= $item['ten_khach_hang'] ?></td>
                                            <td><?= $item['so_don_hang'] ?></td>
                                            <td><?= $item['tong_san_pham'] ?></td>
                                            <td><?= number_format($item['tong_tien_chi_tieu'] ?? 0, 0, ',', '.')
                                            ; ?> VND</td>
                                        </tr>
                                      <?php endforeach; ?>  
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                
                <!-- /.col-md-6 -->

                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Control Sidebar -->
<?php include './views/layout/footer.php'; ?>

</body>

</html>