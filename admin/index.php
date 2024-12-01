<?php
session_start();
    require_once '../commons/env.php';
    require_once '../commons/function.php';

    require_once './controllers/AdminThongKeController.php';

    require_once './models/AdminSanPhamModel.php';
    require_once './controllers/AdminSanPhamController.php';

    require_once './controllers/AdminDanhMucController.php';
    require_once './models/AdminDanhMucModel.php';

    require_once './controllers/AdminBinhLuanController.php';
    require_once './models/AdminBinhLuanModel.php';
    
    require_once './controllers/AdminVoucherController.php';
    require_once './models/AdminVoucherModel.php';

    require_once './controllers/AdminTaiKhoanController.php';
    require_once './models/AdminTaiKhoanModel.php';

    require_once './controllers/AdminDonHangController.php';
    require_once './models/AdminDonHangModel.php';

    require_once './models/ThongKe.php';
    

    
    $act = $_GET['act'] ?? '/';
    match($act){
        '/'=>(new AdminThongKeController())->ThongKe(),
        // Sản phẩm
        'san-pham' => (new AdminSanPhamController())->danhSachSanPham(),
        'form-them-san-pham' => (new AdminSanPhamController())->formThemSanPham(),
        'post-them-san-pham' => (new AdminSanPhamController()) -> postThemSanPham(),
        'form-edit-san-pham' => (new AdminSanPhamController()) -> formEditSanPham(),
        'post-edit-san-pham' => (new AdminSanPhamController()) -> postEditSanPham(),
        'sua-album-anh-san-pham' => (new AdminSanPhamController()) -> postEditAnhSanPham(),
        'xoa-san-pham' => (new AdminSanPhamController()) -> deleteSanPham(),
        'chi-tiet-san-pham' =>(new AdminSanPhamController())-> detailSanPham(),


        // Danh mục
        'danh-muc' => (new AdminDanhMucController())->danhSachDanhMuc(),
        'delete' => (new AdminDanhMucController())->deleteDanhMuc($_GET['id']),
        'form-them-danh-muc' => (new AdminDanhMucController())-> formThemDanhMuc(),
        'add' => (new AdminDanhMucController())->insertDanhMuc(),
        'form-sua-danh-muc' => (new AdminDanhMucController())->formSuaDanhMuc(),
        'update' => (new AdminDanhMucController())->updateDanhMuc(),

        // Bình luận
        'binh-luan' => (new AdminBinhLuanController())->danhsachBinhLuan(),
        'update-binh-luan' =>(new AdminBinhLuanController())->UpdateBinhLuan(),
        // voucher
        'voucher' => (new AdminVoucherController())->setVoucher(),
        'edit' => (new AdminVoucherController())->editVoucher(),
        'form-sua-voucher' => (new AdminVoucherController())->formSuaVoucher(),
        'update_voucher' => (new AdminVoucherController())->updateVoucher(),
        'insert' => (new AdminVoucherController())->insertVoucher(),
        'form-them-voucher' => (new AdminVoucherController())->formThemVoucher(),
        // tai khoan
        //   Tài khoản quản trị
        'tai-khoan-quan-tri'=>(new AdminTaiKhoanController)->danhSachQuanTri(),
        'form-them-quan-tri'=>(new AdminTaiKhoanController)->formThemQuanTri(),
        'them-quan-tri'=>(new AdminTaiKhoanController)->ThemQuanTri(),
        'form-sua-quan-tri'=>(new AdminTaiKhoanController)->formSuaQuanTri(),
        'sua-quan-tri'=>(new AdminTaiKhoanController)->SuaQuanTri(),
        // Tài khoản khách hàng
        'tai-khoan-khach-hang'=>(new AdminTaiKhoanController)->danhSachKhachHang(),
        'form-sua-khach-hang'=>(new AdminTaiKhoanController)->formSuaKhachHang(),
        'sua-khach-hang'=>(new AdminTaiKhoanController)->SuaKhachHang(),
        'chi-tiet-khach-hang'=>(new AdminTaiKhoanController)->ChiTietKhachHang(),
        // route đơn hàng
        'don-hang' => (new AdminDonHangController())->danhSachDonHang(),
        'form-sua-don-hang'=> (new AdminDonHangController())->formSuaDonHang(),
        'sua-don-hang'=> (new AdminDonHangController())->SuaDonHang(),
        'chi-tiet-don-hang'=>(new AdminDonHangController())->ChiTietDonHang(),
        // Thống kê
        'thong-ke'=> (new AdminThongKeController())->ThongKeTheoNgay(),
    };
?>