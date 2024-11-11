<?php
session_start();
    require_once '../commons/env.php';
    require_once '../commons/function.php';

    require_once './controllers/AdminThongKeController.php';
    require_once './models/AdminSanPhamModel.php';

    require_once './controllers/AdminDanhMucController.php';
    require_once './models/AdminDanhMucModel.php';
    

    require_once './controllers/AdminSanPhamController.php';
    $act = $_GET['act'] ?? '/';
    match($act){
        '/'=>(new AdminThongKeController())->ThongKe(),
        // Sản phẩm
        'san-pham' => (new AdminSanPhamController())->danhSachSanPham(),
        'danh-muc' => (new AdminDanhMucController())->danhSachDanhMuc(),
        'delete' => (new AdminDanhMucController())->deleteDanhMuc($_GET['id']),
        'add-san-pham' => (new AdminDanhMucController())->themDanhMuc(),
        
    };
?>