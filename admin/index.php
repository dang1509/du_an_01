<?php
session_start();
    require_once '../commons/env.php';
    require_once '../commons/function.php';

    require_once './controllers/AdminThongKeController.php';
    require_once './models/AdminSanPhamModel.php';

    require_once './controllers/AdminDanhMucController.php';
    require_once './models/AdminDanhMucModel.php';

    require_once './controllers/AdminBinhLuanController.php';
    require_once './models/AdminBinhLuanModel.php';
    
    require_once './controllers/AdminVoucherController.php';
    require_once './models/AdminVoucherModel.php';

    require_once './controllers/AdminQuanTriTaiKhoanController.php';
    require_once './models/AdminQuanTriTaiKhoanModel.php';
    
    
    

    require_once './controllers/AdminSanPhamController.php';
    $act = $_GET['act'] ?? '/';
    match($act){
        '/'=>(new AdminThongKeController())->ThongKe(),
        // Sản phẩm
        'san-pham' => (new AdminSanPhamController())->danhSachSanPham(),


        // Danh mục
        'danh-muc' => (new AdminDanhMucController())->danhSachDanhMuc(),
        'delete' => (new AdminDanhMucController())->deleteDanhMuc($_GET['id']),
        'form-them-danh-muc' => (new AdminDanhMucController())-> formThemDanhMuc(),
        'add' => (new AdminDanhMucController())->insertDanhMuc(),
        'form-sua-danh-muc' => (new AdminDanhMucController())->formSuaDanhMuc(),
        'update' => (new AdminDanhMucController())->updateDanhMuc(),

        // Bình luận
        'binh-luan' => (new AdminBinhLuanController())->danhSachBinhLuan(),
        'trang-thai' => (new AdminBinhLuanController())->updateTrangThai($_GET['id']),
        // voucher
        'voucher' => (new AdminVoucherController())->danhSachVoucher(),
        // tai khoan
        'tai-khoan-khach-hang' => (new AdminQuanTriTaiKhoanController())->(),
        'tai-khoan-quan-tri' => (new AdminQuanTriTaiKhoanController())->(),

    };
?>