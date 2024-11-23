<?php 

class TrangChuController
{
    public $modelTrangChu;
    public $modelSanPham;
    public $modelTaiKhoan;

    public function __construct()
    {
        $this->modelTrangChu = new TrangChu();   
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
    }

    public function trangChu()
    {
        $DanhMuc = $this->modelTrangchu->getAllDanhMuc();      
        $Top4SanPham = $this->modelSanPham->get4SanPham();
        $SanPhamKhuyenMai = $this->modelSanPham->getSale();
        $SanPhamMoi = $this->modelSanPham->getSanPhamMoi();
        require_once "./views/TrangChu.php";
    }
    public function getListSanPham(){
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
        $name = $email = $pass = $dia_chi = '';
        $errors_name = $errors_email = $errors_pass = $errors_dia_chi = '';
    
        // Check if the form is submitted
        if (isset($_POST['signup'])) {
            // Capture the form values
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $dia_chi = $_POST['dia_chi'];
    
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
    
            // If there are no errors, insert the new account into the database
            if (empty($errors_name) && empty($errors_email) && empty($errors_pass) && empty($errors_dia_chi)) {
                $result = $this->modelTaiKhoan->insert_taikhoan($name, $email, $pass, $dia_chi);
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
    
    function logout() {
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
          
                    header("Location: ./index.php?act=/");
             
            } else {
                echo "<script>alert('Tài khoản hoặc mật khẩu không chính xác!')</script>";
            }
        }
    }

  
}
