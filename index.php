<?php 
session_start();

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/TrangChuController.php';
// require_once './controllers/ChiTietSanPhamController.php';

// Require toàn bộ file Models
require_once './models/TrangChuModel.php';
require_once './models/taiKhoanModel.php';
require_once './models/SanPham.php';
require_once './models/BinhLuan.php';
require_once './models/GioHang.php';
require_once './models/ThanhToan.php';
require_once './models/lichSuDonHangModel.php';


// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/'=>(new TrangchuController())->trangChu(),
    'dangki'=>(new TrangchuController())->dangki(),
    'dangnhap'=>(new TrangchuController())->dangnhap(),
    'sign-up'   =>  (new TrangchuController())->signUp(),
    'logout' => (new TrangchuController())->logout(),
    // Lấy sản phẩm
    'list-san-pham' => (new TrangChuController())->getListSanPham(),
    'chi-tiet-san-pham'=>(new TrangChuController())->chiTietSanPham(),
    'timkiem'=>(new TrangChuController())->timKiem(),
    'timkiemdanhmuc'=>(new TrangChuController())->timKiemDanhMuc($_GET['id']),

    // Bình luận
    'add-binh-luan' => (new TrangChuController())->addBinhLuan(),
    
    // Giỏ hàng
    'xem-gio-hang' => (new TrangChuController())->xemGioHang(),
    'tang-so-luong' => (new TrangChuController())->tangSoLuong(),
    'giam-so-luong' => (new TrangChuController())->giamSoluong(),
    'them-vao-gio-hang' => (new TrangChuController())->themGioHang(),
    'them-tu-san-pham' => (new TrangChuController())->themTuSanPham(),
    'them-tu-chi-tiet' => (new TrangChuController())->themTuChiTiet(),
    'delete-gio-hang' => (new TrangChuController())->xoaGioHang(),
    // Thanh toán
    'render-thanh-toan' => (new TrangChuController())->renderThanhToan(),
    'post-thanh-toan' => (new TrangChuController())->postThanhToan(),
  
    //lịch sử đơn hàng 
    'lichsu' => (new TrangChuController())->list(),
    // thong tin 
    'thongtin' => (new TrangChuController())->thongTinCaNhan(),
    'editThongtin' => (new TrangChuController())->capNhatThongTin(),
   // lien he 
   'lienhe' => (new TrangChuController())->lienHe(),

};