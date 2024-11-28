<?php

class TrangChuController
{
    public $modelTrangChu;
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelBinhLuan;
    public $modelGioHang;
    public $modelThanhToan;
    public $modelDonHang;
    public function __construct()
    {
        $this->modelTrangChu = new TrangChu();
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelBinhLuan = new BinhLuan();
        $this->modelGioHang = new GioHang();
        $this->modelThanhToan = new ThanhToan();
        $this->modelDonHang = new DonHang();
    }

    public function trangChu()
    {
        $DanhMuc = $this->modelTrangChu->getAllDanhMuc();
        $Top4SanPham = $this->modelSanPham->get4SanPham();
        $SanPhamKhuyenMai = $this->modelSanPham->getSale();
        $SanPhamMoi = $this->modelSanPham->getSanPhamMoi();
        require_once "./views/TrangChu.php";
    }
    public function getListSanPham()
    {
        $DanhMuc = $this->modelTrangChu->getAllDanhMuc();
        // var_dump($DanhMuc);die();
        $SanPham = $this->modelSanPham->getAllSanPham();
        require_once "./views/TrangSanPham.php";
    }

    public function dangki()
    {
        require_once "./views/taikhoan/dangki.php";
    }
    public function signUp()
    {
        // Initialize variables to hold the values and error messages
        $name = $email = $pass = $so_dien_thoai = $dia_chi = '';
        $errors_name = $errors_email = $errors_pass = $errors_so_dien_thoai= $errors_dia_chi = '';

        // Check if the form is submitted
        if (isset($_POST['signup'])) {
            // Capture the form values
            $chuc_vu_id = 2;
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $dia_chi = $_POST['dia_chi'];
            $so_dien_thoai = $_POST['so_dien_thoai'];

            // Validate each field and store error messages if necessary
            if (empty($name)) {
                $errors_name = "Họ và tên là bắt buộc.";
            }
            if (empty($email)) {
                $errors_email = "Email là bắt buộc.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors_email = "Email không hợp lệ.";
            }
            if (empty($pass)) {
                $errors_pass = "Mật khẩu là bắt buộc.";
            }
            if (empty($dia_chi)) {
                $errors_dia_chi = "Địa chỉ là bắt buộc.";
            }
            if (empty($so_dien_thoai)) {
                $errors_so_dien_thoai = "Số điện thoại là bắt buộc.";
            }

            // If there are no errors, insert the new account into the database
            if (empty($errors_name) && empty($errors_email) && empty($errors_pass)  && empty($errors_so_dien_thoai) && empty($errors_dia_chi)) {
                $result = $this->modelTaiKhoan->insert_taikhoan($name, $email, $pass,$so_dien_thoai, $dia_chi, $chuc_vu_id);    
                if ($result) {
                    // Success message and redirect
                    echo "<script>alert('Đăng ký thành công');</script>";
                    header('Location: ./index.php?act=dangnhap');
                    exit(); // Ensure no further code is executed after the redirect
                } else {
                    echo "Đã có lỗi xảy ra khi đăng ký.";
                }
            }
        }

        // If there were errors, or if it's a first-time request, display the registration form
        require_once 'views/taikhoan/dangki.php';
    }

    function logout()
    {
        session_unset();
        session_destroy();
        header('Location: ./index.php?act=/');
    }
    public function dangnhap()
    {
        require_once "./views/taikhoan/dangnhap.php";
        if (isset($_POST['login'])) {
            $user = $_POST['email'];
            $pass = $_POST['password'];
            $account = $this->modelTaiKhoan->login($user, $pass);

            if ($account) {
                $_SESSION['id'] = $account['id'];
                $_SESSION['pass'] = $account['mat_khau'];
                $_SESSION['name'] = $account['ho_ten'];
                $_SESSION['email'] = $account['email'];
                $_SESSION['login'] = true;
                $_SESSION['chuc_vu'] = $account['chuc_vu_id'];
                header("Location: ./index.php?act=/");

            } else {
                echo "<script>alert('Tài khoản hoặc mật khẩu không chính xác!')</script>";
            }
        }
    }
    public function chiTietSanPham()
    {
        $id_san_pham = $_GET['id_san_pham'];
        $Top4SanPham = $this->modelSanPham->get4SanPham();
        $BinhLuan = $this->modelBinhLuan->getBinhLuanFromSanPham($id_san_pham);

        $SanPham = $this->modelSanPham->getDetailSanPham($id_san_pham);

        $listAnhSanPham = $this->modelSanPham->getAlbumAnhSanPham($id_san_pham);
        // var_dump($BinhLuan);die(); 
        // var_dump($listAnhSanPham);die();
        if ($SanPham) {
            require_once "./views/ChiTietSanPham.php";
        }
    }
    public function addBinhLuan()
    {
        if (isset($_POST['addBinhLuan'])) {
            $noi_dung = $_POST['noi_dung'];
            $tai_khoan_id = $_SESSION['id'];
            $san_pham_id = $_GET['id_san_pham'];
            // var_dump($tai_khoan_id);
            $ngay_dang = date('Y-m-d');
            $trang_thai = 1;
            $this->modelBinhLuan->ThemBinhLuan($san_pham_id, $tai_khoan_id, $noi_dung, $ngay_dang, $trang_thai);
            // var_dump($binhluan);die();
            header("location:?act=chi-tiet-san-pham&id_san_pham=" . $san_pham_id);
        }
    }
    public function xemGioHang()
    {
        $DanhMuc = $this->modelTrangChu->getAllDanhMuc();

        if (!isset($_SESSION['id'])) {
            echo "<script>
        alert('Vui lòng đăng nhập để sử dụng giỏ hàng!');
        window.location.href = '?act=dangnhap';
                 </script>";

        } else {
            $tai_khoan_id = $_SESSION['id'];
            $gioHang = $this->modelGioHang->getAllGioHang($tai_khoan_id);
            require_once './views/GioHang.php';
        }
    }
    public function giamSoLuong()
    {
        $id_gio_hang = $_GET['id_gio_hang'];
        $this->modelGioHang->giam($id_gio_hang);
        header('location:?act=xem-gio-hang');
    }
    public function tangSoLuong()
    {
        $id_gio_hang = $_GET['id_gio_hang'];
        $this->modelGioHang->tang($id_gio_hang);
        header('location:?act=xem-gio-hang');
    }
    public function themGioHang()
    {
        if (!isset($_SESSION['id'])) {
            echo "<script>
             alert('Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng!');
             window.location.href = '?act=dangnhap';
              </script>";
        } else {
            $tai_khoan_id = $_SESSION['id'];
            $gio_hang = $this->modelGioHang->checkGioHang($tai_khoan_id);

            if ($gio_hang) {
                $gio_hang_id = $gio_hang['id'];
            } else {
                $this->modelGioHang->addGioHang($tai_khoan_id);
                $gio_hang = $this->modelGioHang->checkGioHang($tai_khoan_id);
                if (!$gio_hang) {
                    die("Không thể tạo giỏ hàng mới.");
                }
                $gio_hang_id = $gio_hang['id'];
            }
            // var_dump($gio_hang_id);die();
            $san_pham_id = $_GET['id_san_pham'];
            $san_pham = $this->modelGioHang->checkSanPham($san_pham_id);
            // var_dump($san_pham);die();
            if ($san_pham == true) { // Sản phẩm đã tồn tại trong giỏ hàng
                $check = $this->modelGioHang->tang($san_pham_id);
            } else { // Sản phẩm chưa tồn tại
                $so_luong = 1;
                $check = $this->modelGioHang->addChiTietGioHang($gio_hang_id, $san_pham_id, $so_luong);
            }

            if ($check) {
                echo "<script> 
                alert('Thêm sản phẩm vào giỏ hàng thành công!');
                window.location.href = '?act=/';
                 </script>";
            } else {
                echo "<script> 
                alert('Không thể thêm sản phẩm vào giỏ hàng!');
                window.location.href = '?act=/';
                 </script>";
            }
        }

    }
    public function themTuSanPham()
    {
        if (!isset($_SESSION['id'])) {
            echo "<script>
             alert('Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng!');
             window.location.href = '?act=dangnhap';
              </script>";
        } else {
            $tai_khoan_id = $_SESSION['id'];
            $gio_hang = $this->modelGioHang->checkGioHang($tai_khoan_id);

            if ($gio_hang) {
                $gio_hang_id = $gio_hang['id'];
            } else {
                $this->modelGioHang->addGioHang($tai_khoan_id);
                $gio_hang = $this->modelGioHang->checkGioHang($tai_khoan_id);
                if (!$gio_hang) {
                    die("Không thể tạo giỏ hàng mới.");
                }
                $gio_hang_id = $gio_hang['id'];
            }
            // var_dump($gio_hang_id);die();
            $san_pham_id = $_GET['id_san_pham'];
            $san_pham = $this->modelGioHang->checkSanPham($san_pham_id);
            // var_dump($san_pham);die();
            if ($san_pham == true) { // Sản phẩm đã tồn tại trong giỏ hàng
                $check = $this->modelGioHang->tang($san_pham_id);
            } else { // Sản phẩm chưa tồn tại
                $so_luong = 1;
                $check = $this->modelGioHang->addChiTietGioHang($gio_hang_id, $san_pham_id, $so_luong);
            }

            if ($check) {
                echo "<script> 
                alert('Thêm sản phẩm vào giỏ hàng thành công!');
                window.location.href = '?act=list-san-pham';
                 </script>";
            } else {
                echo "<script> 
                alert('Không thể thêm sản phẩm vào giỏ hàng!');
                window.location.href = '?act=list-san-pham';
                 </script>";
            }
        }
    }
    public function themTuChiTiet()
    {
        if (!isset($_SESSION['id'])) {
            echo "<script>
             alert('Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng!');
             window.location.href = '?act=dangnhap';
              </script>";
        } else {
            $tai_khoan_id = $_SESSION['id'];
            $gio_hang = $this->modelGioHang->checkGioHang($tai_khoan_id);

            if ($gio_hang) {
                $gio_hang_id = $gio_hang['id'];
            } else {
                $this->modelGioHang->addGioHang($tai_khoan_id);
                $gio_hang = $this->modelGioHang->checkGioHang($tai_khoan_id);
                if (!$gio_hang) {
                    die("Không thể tạo giỏ hàng mới.");
                }
                $gio_hang_id = $gio_hang['id'];
            }
            // var_dump($gio_hang_id);die();
            $san_pham_id = $_GET['id_san_pham'];
            $san_pham = $this->modelGioHang->checkSanPham($san_pham_id);
            $check_gio_hang = $this->modelGioHang->checkChiTiet($gio_hang_id);

            // var_dump($san_pham);die();
            if ($san_pham == true) { // Sản phẩm đã tồn tại trong giỏ hàng
                // var_dump($san_pham);die();
                $check = $this->modelGioHang->tang($san_pham_id);
                // var_dump($check);die();
                
            } else { // Sản phẩm chưa tồn tại
                $so_luong = 1;
                $check = $this->modelGioHang->addChiTietGioHang($gio_hang_id, $san_pham_id, $so_luong);
                // $san_pham = $this->modelGioHang->checkSanPham($san_pham_id);            
            }
            // var_dump($check_gio_hang);die();
            // $so_luong = 1;
            // $this->modelGioHang->addChiTietGioHang($gio_hang_id, $san_pham_id, $so_luong);
            // var_dump($san_pham);die();
            if ($check) {
                echo "<script> 
                alert('Thêm sản phẩm vào giỏ hàng thành công!');
                window.location.href = '?act=chi-tiet-san-pham&id_san_pham=$san_pham_id';
                 </script>";
            } else {
                echo "<script> 
                alert('Không thể thêm sản phẩm vào giỏ hàng!');
                window.location.href = '?act=chi-tiet-san-pham&id_san_pham=$san_pham_id';
                 </script>";
            }
        }
    }

    public function xoaGioHang()
    {
        $id_gio_hang = $_GET['id_gio_hang'];
        $this->modelGioHang->deleteSanPham($id_gio_hang);
        header('location:?act=xem-gio-hang');
    }

    public function renderThanhToan()
    {
        $DanhMuc = $this->modelTrangChu->getAllDanhMuc();
        $id_tai_khoan = $_SESSION['id'];
        $taiKhoan = $this->modelTaiKhoan->getOneTaiKhoan($id_tai_khoan);
        $gioHang = $this->modelGioHang->getAllGioHang($id_tai_khoan);
        $phuongThucThanhToan = $this->modelThanhToan->getAllPhuongThuc();
        if (isset($gioHang)) {
            require_once './views/TrangThanhToan.php';
        } else {
            echo "<script> 
            alert('Vui lòng thêm sản vào giỏ hàng!');
            window.location.href = '?act=xem-gio-hang';
                     </script>";
        }
    }
    public function postThanhToan()
    {
        $DanhMuc = $this->modelTrangChu->getAllDanhMuc();
        $id_tai_khoan = $_SESSION['id'];
        $ma_don_hang = $this->modelThanhToan->getMaDonHang();
        if ($ma_don_hang) {
            $row = $ma_don_hang;
            $prefix = $row['ten_ma']; // Ví dụ: 'DH-'
        } else {
            die("Không tìm thấy tiền tố mã đơn hàng!");
        }
        $last_ma_don_hang = $this->modelThanhToan->getLastMaDonHang($prefix);

        if ($last_ma_don_hang) {
            $row = $last_ma_don_hang;
            $lastOrderCode = $row['ma_don_hang'];

            // Tách phần số từ mã đơn hàng (VD: từ DH-00010 lấy 10)
            $lastNumber = (int) substr($lastOrderCode, strlen($prefix));
        } else {
            $lastNumber = 0; // Nếu chưa có dữ liệu, bắt đầu từ 0
        }
        $newNumber = $lastNumber + 1;
        $newOrderCode = $prefix . str_pad($newNumber, 5, '0', STR_PAD_LEFT);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $gioHang = $this->modelGioHang->getAllGioHang($id_tai_khoan);
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'] ?? '';
            $ngay_dat = date('Y-m-d');
            $tong_tien = $_POST['tong_tien'];
            // var_dump($tong_tien);die();
            $phuong_thuc_thanh_toan = $_POST['ten_phuong_thuc'];
            $trang_thai_id = 1;
            // $voucher_id = '';
            $don_hang_id = $this->modelThanhToan->InsertDonHang(
                $newOrderCode,
                $id_tai_khoan,
                $ten_nguoi_nhan,
                $email_nguoi_nhan,
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $ghi_chu,
                $ngay_dat,
                $tong_tien,
                $phuong_thuc_thanh_toan,
                $trang_thai_id
            );
            // var_dump($don_hang_id);
            if (!empty($gioHang)) {
                foreach ($gioHang as $key => $item) {
                    $san_pham_id = $item['san_pham_id'];
                    if ($item['gia_khuyen_mai'] != 0) {
                        $don_gia = $item['gia_khuyen_mai'];
                    } else {
                        $don_gia = $item['gia_san_pham'];
                    }
                    $so_luong = $item['so_luong'];
                    $thanh_tien = $don_gia * $so_luong;
                    $this->modelThanhToan->InsertChiTietDonHang($don_hang_id, $san_pham_id, $don_gia, $so_luong, $thanh_tien);

                }
                $this->modelGioHang->deleteGioHang($id_tai_khoan);
                foreach ($gioHang as $key => $item) {
                    $this->modelGioHang->deleteChiTietGioHang($item['gio_hang_id']);
                }
                echo "<script> 
            alert('Đặt hàng thành công');
            window.location.href = '?act=/';
                     </script>";
            }
            
                
            
        }


    }
    // lich su don hang 
    public function list() {
        $tai_khoan_id = $_SESSION['id'];
        $donHangs = $this->modelDonHang->getAllDonHang($tai_khoan_id);
        include './views/lichSuDonHang.php'; 
    }
 // thong tin cá nhân 
 public function thongTinCaNhan() {
        $tai_khoan_id = $_SESSION['id'];
        $tai_khoan = $this->modelTaiKhoan->getThongTin($tai_khoan_id);
        include './views/thongTin/thongTin.php';
    }
    // cap nhat  thong tin cá nhân
    public function capNhatThongTin(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_SESSION['id'];
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];
            $error = [];
            if(empty($ho_ten)){
                $error['ho_ten']='Họ tên không được để trống';
            }
            if(empty($email)){
                $error['email']='Email không được để trống';
            }
            if(empty($so_dien_thoai)){
                $error['so_dien_thoai']='Số điện thoại không được để trống';
            }
            if(empty($dia_chi)){
                $error['dia_chi']='Địa chỉ không được để trống';
            }
            if(empty($error)){
                $this->modelTaiKhoan->updateThongTin($id,$ho_ten,$email,$so_dien_thoai,$dia_chi);
                header('Location: ?act=thongtin');                
                
            }else{
                $thongtin = ['id'=>$id,'ho_ten'=>$ho_ten,'email'=>$email,'so_dien_thoai'=>$so_dien_thoai,'dia_chi'=>$dia_chi];
                require_once "./views/thongTin/thongTin.php";
            }
        }
    }
// tim kiem 
// Phương thức để hiển thị trang sản phẩm với tìm kiếm
public function timKiem()
{
    
    
    $listSP = $this->modelSanPham->getAllSanPham();
    $DanhMuc = $this->modelTrangChu->getAllDanhMuc();
    $result = [];
    if (isset($_POST['search']) ) {
        foreach ($listSP as $item) {
            if (strpos(strtolower($item['ten_san_pham']), strtolower($_POST['search'])) !== false) {
                $result[] = $item;
            }
        }
    }
    $SanPham = $result;
    require_once './views/TrangSanPham.php';
    
}
}
