<style>
  .table-striped td {
    max-width: 650px;
  }
</style>

<?php include './views/layout/header.php'; ?>
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>
<!-- Main content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Admin Danh Mục</h1>

        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <!-- /.card -->
          <div class="card">
            <div class="card-header">

              </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="<?= BASE_URL_ADMIN . '?act=edit' ?>" method="post">
                <input type="hidden" name="id" value="<?= $voucher['id'] ?>">

                <!-- Mã Voucher -->
                <div class="mb-3">
                  <label for="maVoucher" class="form-label">Mã Voucher</label>
                  <input type="text" class="form-control" id="maVoucher" name="ma_voucher"
                    value="<?= htmlspecialchars($voucher['ma_voucher']) ?>">
                  <?php if (isset($error['ma_voucher'])) { ?>
                    <p class="text-danger"><?= $error['ma_voucher'] ?></p>
                  <?php } ?>
                </div>

                <!-- Giảm Giá -->
                <div class="mb-3">
                  <label for="giamGia" class="form-label">Giảm Giá</label>
                  <input type="number" class="form-control" id="giamGia" name="giam_gia"
                    value="<?= htmlspecialchars($voucher['giam_gia']) ?>">
                  <?php if (isset($error['giam_gia'])) { ?>
                    <p class="text-danger"><?= $error['giam_gia'] ?></p>
                  <?php } ?>
                </div>

                <div class="mb-3">
                  <label for="giamGia" class="form-label">Giảm Tối Thiểu Để Giảm</label>
                  <input type="number" class="form-control" name="gia_toi_thieu_de_giam" value="<?= $voucher['gia_toi_thieu_de_giam'] ?>">
                    <?php if (isset($error['gia_toi_thieu_de_giam'])) : ?>
                    <p class="text-danger"><?= $error['gia_toi_thieu_de_giam'] ?></p>
                  <?php endif;   ?>
                </div>
                <div class="mb-3">
                  <label for="giamGia" class="form-label">Giảm Tối Đa Có thể Giảm</label>
                  <input type="number" class="form-control" name="gia_toi_da_co_the_giam"
                    value="<?= $voucher['gia_toi_da_co_the_giam'] ?>">
                    <?php if (isset($error['gia_toi_da_co_the_giam'])) { ?>
                    <p class="text-danger"><?= $error['gia_toi_da_co_the_giam'] ?></p>
                  <?php } ?>
                </div>

                <!-- Ngày Bắt Đầu -->
                <div class="mb-3">
                  <label for="ngayBatDau" class="form-label">Ngày Bắt Đầu</label>
                  <input type="date" class="form-control" id="ngayBatDau" name="ngay_bat_dau"
                    value="<?= htmlspecialchars($voucher['ngay_bat_dau']) ?>">
                  <?php if (isset($error['ngay_bat_dau'])) { ?>
                    <p class="text-danger"><?= $error['ngay_bat_dau'] ?></p>
                  <?php } ?>
                </div>

                <!-- Ngày Kết Thúc -->
                <div class="mb-3">
                  <label for="ngayKetThuc" class="form-label">Ngày Kết Thúc</label>
                  <input type="date" class="form-control" id="ngayKetThuc" name="ngay_ket_thuc"
                    value="<?= htmlspecialchars($voucher['ngay_ket_thuc']) ?>">
                  <?php if (isset($error['ngay_ket_thuc'])) { ?>
                    <p class="text-danger"><?= $error['ngay_ket_thuc'] ?></p>
                  <?php } ?>
                </div>

                <!-- Số Lượng -->
                <div class="mb-3">
                  <label for="soLuong" class="form-label">Số Lượng</label>
                  <input type="number" class="form-control" id="soLuong" name="so_luong"
                    value="<?= htmlspecialchars($voucher['so_luong']) ?>" min="1">
                  <?php if (isset($error['so_luong'])) { ?>
                    <p class="text-danger"><?= $error['so_luong'] ?></p>
                  <?php } ?>
                </div>

                <!-- Trạng Thái -->
                <div class="mb-3">
                  <label for="trangThai" class="form-label">Trạng Thái</label>
                  <select class="form-control" id="trangThai" name="trang_thai">
                    <option value="1" <?= $voucher['trang_thai'] == 1 ? 'selected' : '' ?>>Có Hiệu Lực</option>
                    <option value="0" <?= $voucher['trang_thai'] == 0 ? 'selected' : '' ?>>Vô Hiệu Hóa</option>
                  </select>
                  <?php if (isset($error['trang_thai'])) { ?>
                    <p class="text-danger"><?= $error['trang_thai'] ?></p>
                  <?php } ?>
                </div>

                <!-- Nút Submit -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Sửa</button>
                </div>
              </form>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
</div>

<!-- /.content -->



<?php include './views/layout/footer.php'; ?>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>

</html>