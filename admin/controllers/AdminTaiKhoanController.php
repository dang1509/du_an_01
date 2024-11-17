<?php
    class AdminTaiKhoanController{
        public $modelTaiKhoan;
        public $modelDonHang;
        public $modelBinhLuan;
        public function __construct(){
            $this->modelTaiKhoan = new TaiKhoan();
            $this->modelDonHang = new DonHang();
            $this->modelBinhLuan = new BinhLuan();

        }
        public function danhSachQuanTri(){
            $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);
            require_once './views/taikhoan/quantri/listQuanTri.php';
        }
        public function formThemQuanTri(){
            require_once './views/taikhoan/quantri/themQuanTri.php';
            deleteSessionError();
        }
        public function ThemQuanTri(){
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $ho_ten = $_POST['ho_ten']?? "";
                $email = $_POST['email'] ?? "";
                $so_dien_thoai = $_POST['so_dien_thoai']??"";
                $error = [];
                
                if(empty($ho_ten)){
                    $error['ho_ten']='Họ tên không được để trống';
                }
                $_SESSION['error']= $error;
                if(empty($error)){
                    // $password = password_hash('123@', PASSWORD_BCRYPT);
                    $password = 1;
                    $chuc_vu_id = 1;

                    $this->modelTaiKhoan->addTaiKhoan($ho_ten,$email,$so_dien_thoai,$password,$chuc_vu_id);
                    header("location:".BASE_URL_ADMIN.'?act=tai-khoan-quan-tri');
                    exit();
                }else{
                    $_SESSION['flash'] = true;
                    header("location:".BASE_URL_ADMIN.'?act=form-them-quan-tri');
                    exit();
                }
            }
        }
        public function formSuaQuanTri(){
            $quan_tri_id=$_GET['quan_tri_id'];
            $quanTri=$this->modelTaiKhoan->getOneQuanTri($quan_tri_id);
            // var_dump($quanTri);die();
            require_once './views/taikhoan/quantri/suaQuanTri.php';
            deleteSessionError();
        }
        public function SuaQuanTri(){
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $quan_tri_id = $_POST['quan_tri_id'];
                // var_dump($quan_tri_id);die();
                $quanTriOld=$this->modelTaiKhoan->getOneQuanTri($quan_tri_id);
                // var_dump($quanTriOld);die();
                $old_file = $quanTriOld['anh_dai_dien'];
                
                $ho_ten = $_POST['ho_ten'] ?? "";
                $email = $_POST['email'] ?? ""; 
                $so_dien_thoai = $_POST['so_dien_thoai'] ?? 0;
                $ngay_sinh = $_POST['ngay_sinh']??"" ; 
                
                $gioi_tinh = $_POST['gioi_tinh'] ?? "";
                $mat_khau = $_POST['mat_khau']?? "";
                $trang_thai = $_POST['trang_thai']?? "";
                $dia_chi = $_POST['dia_chi']?? "";         
                $hinh_anh= $_FILES['anh_dai_dien'] ?? NULL;

               if(isset($hinh_anh)&&$hinh_anh['error']==UPLOAD_ERR_OK){  
                if(!empty($old_file)){
                    deleteFile($old_file);
                   }
                   $newFile = uploadFile($hinh_anh,'./uploads/');
               }else{
                $newFile= $old_file;
               }
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
                if(empty($ngay_sinh)){
                    $error['ngay_sinh']='Ngày sinh không được để trống';
                
                }if(empty($mat_khau)){
                    $error['mat_khau']='Mật khẩu không được để trống';
                }
                
                
                $_SESSION['error'] = $error;
                if(empty($error)){
                    $this->modelTaiKhoan->updateQuanTri($quan_tri_id,$ho_ten,$email,$so_dien_thoai,$ngay_sinh,$gioi_tinh,$mat_khau,$trang_thai,$dia_chi,$newFile);
                    // var_dump($tai_khoan);die();
                   header("location:".BASE_URL_ADMIN.'?act=tai-khoan-quan-tri');
                    exit();
                }else{
                    $_SESSION['flash'] = true;
                    header("location:".BASE_URL_ADMIN.'?act=form-sua-quan-tri&quan_tri_id='.$quan_tri_id);
                    exit();
                }
            }
        }
        public function danhSachKhachHang(){
            $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);
            require_once './views/taikhoan/khachhang/listKhachHang.php';
        }
        public function formSuaKhachHang(){
            $khach_hang_id=$_GET['id_khach_hang'];
            $khachHang=$this->modelTaiKhoan->getOneKhachHang($khach_hang_id);
            require_once './views/taikhoan/khachhang/suaKhachHang.php';
            deleteSessionError();
        }
        public function SuaKhachHang(){
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $khach_hang_id = $_POST['khach_hang_id']??'';

                $KhachHangOld = $this->modelTaiKhoan->getOneKhachHang($khach_hang_id);
                $old_file = $KhachHangOld['anh_dai_dien'];
                
                $ho_ten = $_POST['ho_ten'] ?? "";
                $email = $_POST['email'] ?? ""; 
                $so_dien_thoai = $_POST['so_dien_thoai'] ?? 0;
                $ngay_sinh = $_POST['ngay_sinh'] ?? ""; 
                
                $gioi_tinh = $_POST['gioi_tinh'] ?? "";
                $mat_khau = $_POST['mat_khau']?? "";
                $trang_thai = $_POST['trang_thai']?? "";
                $dia_chi = $_POST['dia_chi']?? "";         
                $hinh_anh= $_FILES['anh_dai_dien'] ?? NULL;
                
               if(isset($hinh_anh)&&$hinh_anh['error']==UPLOAD_ERR_OK){  
                if(!empty($old_file)){
                    deleteFile($old_file);
                   }
                   $newFile = uploadFile($hinh_anh,'./uploads/');
               }else{
                $newFile= $old_file;
               }
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
                if(empty($mat_khau)){
                    $error['mat_khau']='Mật khẩu không được để trống';
                }
                
                
                $_SESSION['error'] = $error;
                if(empty($error)){
                   $this->modelTaiKhoan->updateKhachHang($khach_hang_id,$ho_ten,$email,$so_dien_thoai,$ngay_sinh,$gioi_tinh,$mat_khau,$trang_thai,$dia_chi,$newFile);
                 header("location:".BASE_URL_ADMIN.'?act=tai-khoan-khach-hang');
                    exit();
                }else{
                    $_SESSION['flash'] = true;
                    header("location:".BASE_URL_ADMIN.'?act=form-sua-khach-hang&&id_khach_hang='.$khach_hang_id);
                    exit();
                }
            }
        }
        public function ChiTietKhachHang(){
            $id_khach_hang = $_GET['id_khach_hang'];
            $khachHang = $this->modelTaiKhoan->getOneKhachHang($id_khach_hang);
            $listDonHang = $this->modelDonHang->getDonHangFromKhachHang($id_khach_hang);
            $listBinhLuan = $this->modelBinhLuan->getBinhLuanFromKhachHang($id_khach_hang);
            require_once './views/taikhoan/khachhang/chiTietKhachHang.php';
        }
    }
?>