<?php include "./views/layout/header.php" ?>
<style>
    table th,
    table td {
        padding: 15px;
    }
</style>
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Lịch sử đơn hàng</h1>
    </div>
</div>
<div class="container-fluid pt-5">
    <div class="row justify-content-center px-xl-5">
        <div class="col-lg-10 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Số Thứ Tự</th>
                        <th>Mã Đơn Hàng</th>
                        <th>Tên Người Nhận</th>
                        <th>Số Điện Thoại Người Dùng</th>
                        <th>Địa Chỉ Người Dùng</th>
                        <th>Ngày Đặt Hàng</th>
                        <th>Phương Thức Thanh Toán</th>
                        <th>Tổng Tiền</th>
                        <th>Trạng Thái</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php $stt = 1; ?>
                    <?php foreach ($donHangs as $donHang): ?>
                        <tr>
                            <td><?php echo $stt++; ?></td>
                            <td><?php echo ($donHang['ma_don_hang']); ?></td>
                            <td><?php echo ($donHang['ten_nguoi_nhan']); ?></td>
                            <td><?php echo ($donHang['sdt_nguoi_nhan']); ?></td>
                            <td><?php echo ($donHang['dia_chi_nguoi_nhan']); ?></td>
                            <td><?php echo ($donHang['ngay_dat']); ?></td>
                            <td><?php echo ($donHang['ten_phuong_thuc']); ?></td>
                            <?php
                            if ($donHang['trang_thai_id'] == 1) {
                                $colorAlert = 'primary';
                            } elseif ($donHang['trang_thai_id'] >= 2 && $donHang['trang_thai_id'] <= 4) {
                                $colorAlert = 'warning';
                            } elseif ($donHang['trang_thai_id'] >= 5 && $donHang['trang_thai_id'] <= 6) {
                                $colorAlert = 'success';
                            } else {
                                $colorAlert = 'danger';
                            }
                            ?>
                            <td><?php echo number_format($donHang['tong_tien'], 0, ',', '.') ?> VND</td>
                            <td class="text-<?=$colorAlert?>"><?php echo ($donHang['ten_trang_thai']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include "./views/layout/footer.php" ?>