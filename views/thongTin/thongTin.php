<?php include "./views/layout/header.php" ?>
<link rel="stylesheet" href="assets/css/table.css">
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Thông tin cá nhân</h1>
    </div>
</div>
<?php if (isset($tai_khoan)): ?>
    <div class="container">
    <form action="?act=editThongtin" method="POST">
        <div class="form-group">
            <label for="ho_ten">Họ và tên</label>
            <input type="text" class="form-control" id="name" name="ho_ten" value="<?= htmlspecialchars($tai_khoan['ho_ten']); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($tai_khoan['email']); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Số điện thoại</label>
            <input type="text" class="form-control" id="so_dien_thoai" name="so_dien_thoai" value="<?= htmlspecialchars($tai_khoan['so_dien_thoai']); ?>" required>
        </div>
        <div class="form-group">
            <label for="dia_chi">Địa chỉ</label>
            <input type="text" class="form-control" id="dia_chi" name="dia_chi" value="<?= htmlspecialchars($tai_khoan['dia_chi']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary" name="editThongTin">Cập nhật thông tin</button>
    </form>
</div>
    </div>
<?php else: ?>
    <p>Không tìm thấy thông tin người dùng.</p>
<?php endif; ?>
<?php include "./views/layout/footer.php" ?>