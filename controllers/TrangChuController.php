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
        deleteSessionError();
    }
    public function signUp()
    {
        // Initialize variables to hold the values and error messages
        $name = $email = $pass = $so_dien_thoai = $dia_chi = '';
        $errors_name = $errors_email = $errors_pass = $errors_so_dien_thoai = $errors_dia_chi = '';

        // Check if the form is submitted
        if (isset($_POST['signup'])) {
            // Capture the form values
            $chuc_vu_id = 2;
            $name = $_POST['name'] ?? null;
            $email = $_POST['email'] ?? null;
            $pass = $_POST['pass'] ?? null;
            $dia_chi = $_POST['dia_chi'] ?? null;
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? null;

            $error = [];
            if (empty($name)) {
                $error['name'] = "Họ và tên là bắt buộc.";
            }
            if (empty($email)) {
                $error['email'] = "Email là bắt buộc.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "Email không hợp lệ.";
            }
            if (empty($pass)) {
                $error['pass'] = "Mật khẩu là bắt buộc.";
            }
            if (empty($dia_chi)) {
                $error['dia_chi'] = "Địa chỉ là bắt buộc.";
            }
            if (empty($so_dien_thoai)) {
                $error['so_dien_thoai'] = "Số điện thoại là bắt buộc.";
            }
            $_SESSION['error'] = $error;
            // If there are no errors, insert the new account into the database
            if (empty($error)) {
                $result = $this->modelTaiKhoan->insert_taikhoan($name, $email, $pass, $so_dien_thoai, $dia_chi, $chuc_vu_id);
                if ($result) {               
                    echo "<script>alert('Đăng ký thành công');</script>";
                    header('Location:?act=dangnhap');
                    exit(); 
                } else {
                    $_SESSION['flash'] = true;
                    header('location:?act=dangky');
                    exit();
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
        header('Location: '.BASE_URL);
    }
    public function dangnhap()
    {
        require_once "./views/taikhoan/dangnhap.php";
        if (isset($_POST['login'])) {
            $user = $_POST['email'];
            $pass = $_POST['password'];
            $account = $this->modelTaiKhoan->login($user, $pass);

            if ($account && $account['trang_thai'] == 1) {
                $_SESSION['id'] = $account['id'];
                $_SESSION['pass'] = $account['mat_khau'];
                $_SESSION['name'] = $account['ho_ten'];
                $_SESSION['email'] = $account['email'];
                $_SESSION['login'] = true;
                $_SESSION['chuc_vu'] = $account['chuc_vu_id'];
                header("Location: ".BASE_URL);

            } else {
                echo "<script>alert('Thông tin đăng nhập không chính xác hoặc tài khoản đã bị vô hiệu hóa!')</script>";
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
        $this->modelSanPham->updateLuotXem($id_san_pham);
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

            // Khởi tạo các biến
            $tong_tien = 0;
            $giam_gia = 0;
            $tien_giam = 0;
            $tong_thanh_toan = 0;
            $ma_voucher_ap_dung = null;

            // Tính tổng tiền từ giỏ hàng
            foreach ($gioHang as $item) {
                $gia = $item['gia_khuyen_mai'] != 0 ? $item['gia_khuyen_mai'] : $item['gia_san_pham'];
                $tong_tien += $gia * $item['so_luong'];
            }

            // Kiểm tra nếu người dùng áp dụng voucher
            if (isset($_POST['ma_voucher'])) {
                $ma_voucher = $_POST['ma_voucher'];

                // Kiểm tra voucher trong cơ sở dữ liệu
                $voucher = $this->modelGioHang->getVoucher($ma_voucher);

                if ($voucher) {
                    // Kiểm tra ngày áp dụng
                    if (strtotime($voucher['ngay_bat_dau']) <= time() && strtotime($voucher['ngay_ket_thuc']) >= time()) {
                        // Kiểm tra giá trị đơn hàng tối thiểu
                        if ($tong_tien >= $voucher['gia_toi_thieu_de_giam']) {
                            $giam_gia = $voucher['giam_gia']; // Lấy % giảm giá
                            $tien_giam = $tong_tien * $giam_gia; // Tính số tiền giảm

                            // Kiểm tra giá trị giảm tối đa
                            if ($tien_giam > $voucher['gia_toi_da_co_the_giam']) {
                                $tien_giam = $voucher['gia_toi_da_co_the_giam']; // Giới hạn giảm giá
                            }

                            // Lưu mã voucher vào session
                            $_SESSION['voucher'] = $ma_voucher;

                            $ma_voucher_ap_dung = $ma_voucher; // Lưu mã voucher đã áp dụng
                        } else {
                            echo "<script>alert('Đơn hàng không đủ điều kiện để áp dụng voucher này.');</script>";
                        }
                    } else {
                        echo "<script>alert('Voucher đã hết hạn hoặc không hợp lệ.');</script>";
                    }
                } else {
                    echo "<script>alert('Mã voucher không hợp lệ.');</script>";
                }
            }

            // Tính tổng thanh toán
            $tong_thanh_toan = $tong_tien - $tien_giam;

            // Gửi dữ liệu đến View
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
            $san_pham = $this->modelGioHang->checkSanPham($san_pham_id, $gio_hang_id);
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
            $san_pham = $this->modelGioHang->checkSanPham($san_pham_id, $gio_hang_id);
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
            $san_pham = $this->modelGioHang->checkSanPham($san_pham_id, $gio_hang_id);
            // $check_gio_hang = $this->modelGioHang->checkChiTiet($gio_hang_id);

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

        // Khởi tạo các biến
        $tong_tien = 0;
        $giam_gia = 0;
        $tien_giam = 0;
        $tong_thanh_toan = 0;
        $ma_voucher_ap_dung = null;

        // Tính tổng tiền từ giỏ hàng
        foreach ($gioHang as $item) {
            $gia = $item['gia_khuyen_mai'] != 0 ? $item['gia_khuyen_mai'] : $item['gia_san_pham'];
            $tong_tien += $gia * $item['so_luong'];
        }

        // Kiểm tra nếu người dùng đã áp dụng voucher (lấy từ session)
        if (isset($_SESSION['voucher'])) {
            $ma_voucher = $_SESSION['voucher'];

            // Lấy thông tin voucher từ cơ sở dữ liệu
            $voucher = $this->modelGioHang->getVoucher($ma_voucher);

            if ($voucher) {
                // Kiểm tra ngày áp dụng
                if (strtotime($voucher['ngay_bat_dau']) <= time() && strtotime($voucher['ngay_ket_thuc']) >= time()) {
                    // Kiểm tra giá trị đơn hàng tối thiểu
                    if ($tong_tien >= $voucher['gia_toi_thieu_de_giam']) {
                        $giam_gia = $voucher['giam_gia']; // Lấy % giảm giá
                        $tien_giam = $tong_tien * $giam_gia; // Tính số tiền giảm

                        // Giới hạn giảm giá nếu vượt quá mức tối đa
                        if ($tien_giam > $voucher['gia_toi_da_co_the_giam']) {
                            $tien_giam = $voucher['gia_toi_da_co_the_giam'];
                        }

                        $ma_voucher_ap_dung = $ma_voucher; // Lưu mã voucher đã áp dụng
                    } else {
                        echo "<script>alert('Đơn hàng không đủ điều kiện để áp dụng voucher này.');</script>";
                    }
                } else {
                    echo "<script>alert('Voucher đã hết hạn hoặc không hợp lệ.');</script>";
                }
            } else {
                echo "<script>alert('Mã voucher không hợp lệ.');</script>";
            }
        }

        // Tính tổng thanh toán
        $tong_thanh_toan = $tong_tien - $tien_giam;

        // Nếu giỏ hàng rỗng, chuyển hướng về trang giỏ hàng
        if (empty($gioHang)) {
            echo "<script> 
        alert('Vui lòng thêm sản phẩm vào giỏ hàng!');
        window.location.href = '?act=xem-gio-hang';
        </script>";
        } else {
            // Gửi dữ liệu đến view
            require_once './views/TrangThanhToan.php';
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
            $phuong_thuc_thanh_toan = $_POST['ten_phuong_thuc'];
            $trang_thai_id = 1;

            // Kiểm tra voucher
            $voucher_id = null;
            $tien_giam = 0;
            if (isset($_SESSION['voucher'])) {
                $voucher = $this->modelGioHang->getVoucher($_SESSION['voucher']);
                if ($voucher) {
                    $gia_toi_thieu_de_giam = $voucher['gia_toi_thieu_de_giam'];
                    if ($tong_tien >= $gia_toi_thieu_de_giam) {
                        $giam_gia = $voucher['giam_gia'];
                        $tien_giam = $tong_tien * $giam_gia;
                        if ($tien_giam > $voucher['gia_toi_da_co_the_giam']) {
                            $tien_giam = $voucher['gia_toi_da_co_the_giam'];
                        }
                        $voucher_id = $voucher['id'];
                        $tong_tien -= $tien_giam;
                    }
                }
            }

            // Tạo đơn hàng
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
                $trang_thai_id,
                $voucher_id
            );

            if (!empty($gioHang)) {
                foreach ($gioHang as $item) {
                    $san_pham_id = $item['san_pham_id'];
                    $don_gia = $item['gia_khuyen_mai'] ?: $item['gia_san_pham'];
                    $so_luong = $item['so_luong'];
                    $thanh_tien = $don_gia * $so_luong;

                    $this->modelThanhToan->InsertChiTietDonHang($don_hang_id, $san_pham_id, $don_gia, $so_luong, $thanh_tien);
                    $this->modelThanhToan->UpdateSanPhamSoLuong($san_pham_id, $so_luong);
                }

                if ($voucher_id) {
                    $this->modelThanhToan->UpdateVoucherSoLuong($voucher_id);
                    unset($_SESSION['voucher']);
                }

                $this->modelGioHang->deleteGioHang($id_tai_khoan);
                foreach ($gioHang as $item) {
                    $this->modelGioHang->deleteChiTietGioHang($item['gio_hang_id']);
                }

                // Phương thức thanh toán qua VNPAY
                if ($phuong_thuc_thanh_toan == 1) { // Thanh toán qua VNPAY

                    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
                    date_default_timezone_set('Asia/Ho_Chi_Minh');

                    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                    $vnp_Returnurl = "http://localhost/du_an_trang_suc/?act=lichsu";
                    $vnp_TmnCode = "PDD6JE78";//Mã website tại VNPAY 
                    $vnp_HashSecret = "T0RPQ1Q7ZDIWOS6HY06DMS1XJYDAKHOR"; //Chuỗi bí mật

                    $vnp_TxnRef = $newOrderCode; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này 

                    $vnp_OrderInfo = 'Nội dung thanh toán';
                    $vnp_OrderType = 'billpayment';
                    $vnp_Amount = $tong_tien * 100;
                    $vnp_Locale = 'vn';
                    $vnp_BankCode = 'NCB';
                    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                    //Add Params of 2.0.1 Version
                    // $vnp_ExpireDate = $_POST['txtexpire'];
                    //Billing

                    $inputData = array(
                        "vnp_Version" => "2.1.0",
                        "vnp_TmnCode" => $vnp_TmnCode,
                        "vnp_Amount" => $vnp_Amount,
                        "vnp_Command" => "pay",
                        "vnp_CreateDate" => date('YmdHis'),
                        "vnp_CurrCode" => "VND",
                        "vnp_IpAddr" => $vnp_IpAddr,
                        "vnp_Locale" => $vnp_Locale,
                        "vnp_OrderInfo" => $vnp_OrderInfo,
                        "vnp_OrderType" => $vnp_OrderType,
                        "vnp_ReturnUrl" => $vnp_Returnurl,
                        "vnp_TxnRef" => $vnp_TxnRef

                    );

                    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                        $inputData['vnp_BankCode'] = $vnp_BankCode;
                    }


                    //var_dump($inputData);
                    ksort($inputData);
                    $query = "";
                    $i = 0;
                    $hashdata = "";
                    foreach ($inputData as $key => $value) {
                        if ($i == 1) {
                            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                        } else {
                            $hashdata .= urlencode($key) . "=" . urlencode($value);
                            $i = 1;
                        }
                        $query .= urlencode($key) . "=" . urlencode($value) . '&';
                    }

                    $vnp_Url = $vnp_Url . "?" . $query;
                    if (isset($vnp_HashSecret)) {
                        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
                        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                    }
                    $returnData = array(
                        'code' => '00'
                        ,
                        'message' => 'success'
                        ,
                        'data' => $vnp_Url
                    );
                    if ($phuong_thuc_thanh_toan == 1) {
                        header('Location: ' . $vnp_Url);
                        die();
                    } else {
                        echo json_encode($returnData);
                    }
                    // vui lòng tham khảo thêm tại code demo

                } else {
                    echo "<script> 
                    alert('Đặt hàng thành công! Chúng tôi sẽ liên hệ với bạn.');
                    window.location.href = '?act=/';
                    </script>";
                }
            }
        }
    }

    //     Ngân hàng: NCB
// Số thẻ: 9704198526191432198
// Tên chủ thẻ:NGUYEN VAN A
// Ngày phát hành:07/15
// Mật khẩu OTP:123456




    // lich su don hang 
    public function list()
    {
        $tai_khoan_id = $_SESSION['id'];
        $donHangs = $this->modelDonHang->getAllDonHang($tai_khoan_id);
        include './views/lichSuDonHang.php';
    }
    // thong tin cá nhân 
    public function thongTinCaNhan()
    {
        $tai_khoan_id = $_SESSION['id'];
        $tai_khoan = $this->modelTaiKhoan->getThongTin($tai_khoan_id);
        include './views/thongTin/thongTin.php';
    }
    // cap nhat  thong tin cá nhân
    public function capNhatThongTin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_SESSION['id'];
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];
            $error = [];
            if (empty($ho_ten)) {
                $error['ho_ten'] = 'Họ tên không được để trống';
            }
            if (empty($email)) {
                $error['email'] = 'Email không được để trống';
            }
            if (empty($so_dien_thoai)) {
                $error['so_dien_thoai'] = 'Số điện thoại không được để trống';
            }
            if (empty($dia_chi)) {
                $error['dia_chi'] = 'Địa chỉ không được để trống';
            }
            if (empty($error)) {
                $this->modelTaiKhoan->updateThongTin($id, $ho_ten, $email, $so_dien_thoai, $dia_chi);
                header('Location: ?act=thongtin');

            } else {
                $thongtin = ['id' => $id, 'ho_ten' => $ho_ten, 'email' => $email, 'so_dien_thoai' => $so_dien_thoai, 'dia_chi' => $dia_chi];
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
        if (isset($_POST['search'])) {
            foreach ($listSP as $item) {
                if (strpos(strtolower($item['ten_san_pham']), strtolower($_POST['search'])) !== false) {
                    $result[] = $item;
                }
            }
        }
        $SanPham = $result;
        require_once './views/TrangSanPham.php';

    }
    public function timKiemDanhMuc()
    {
        $danh_muc_id = $_GET['danh_muc_id'];
        $DanhMuc = $this->modelTrangChu->getAllDanhMuc();
        $SanPham = $this->modelSanPham->search($danh_muc_id);
        require_once './views/TrangSanPham.php';
    }
    public function lienHe(){
        $DanhMuc = $this->modelTrangChu->getAllDanhMuc();
        require_once './views/LienHe.php';
    }
    public function gioiThieu() {
        $DanhMuc = $this->modelTrangChu->getAllDanhMuc();
        $SanPham = $this->modelSanPham->getAllSanPham();
    include './views/gioithieu.php';
}
// tin tuc 
    public function tinTuc() {
        $DanhMuc = $this->modelTrangChu->getAllDanhMuc();
        $SanPham = $this->modelSanPham->getAllSanPham();
    include './views/tintuc.php';
}
    public function chiTietDonHang(){
        $DanhMuc = $this->modelTrangChu->getAllDanhMuc();
        $don_hang_id = $_GET['id_don_hang'];
            $donHang = $this->modelTrangChu->getOneDonHang($don_hang_id);
            $sanPhamDonHang = $this->modelTrangChu->getListSpDonHang($don_hang_id);
            require_once './views/ChiTietDonHang.php';
    }
}
