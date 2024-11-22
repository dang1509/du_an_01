<?php 

class TrangChuController
{
    public $modelTrangChu;
    public $modelSanPham;
    public $modelTaiKhoan;

    public function __construct()
    {
        $this->modelTrangchu = new TrangChu();   
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
    
    public function dangki()
    {
        require_once "./views/taikhoan/dangki.php";
    }
    public function signUp()
    {
        if (isset($_POST['signup'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $dia_chi = $_POST['dia_chi'];

            $errors = [];
            if (empty($name)) {
                $errors[] = "Họ và tên là bắt buộc.";
            }
            if (empty($email)) {
                $errors[] = "Email là bắt buộc.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email không hợp lệ.";
            }
            if (empty($pass)) {
                $errors[] = "Mật khẩu là bắt buộc.";
            }
            if (empty($dia_chi)) {
                $errors[] = "Địa chỉ là bắt buộc.";
            }
            if (empty($errors)) {

                $result = $this->modelTaiKhoan->insert_taikhoan($name, $email, $pass, $dia_chi);
                if ($result) {
          
                    echo "<script>alert('Đăng ký thành công');</script>";
               
                    header('Location: ./index.php?act=dangnhap');
                    exit(); 
                } else {
                    echo "Đã có lỗi xảy ra khi đăng ký.";
                }
                
            } else {

                require_once 'views/taikhoan/dangki.php';
            }
        } else {
            require_once 'views/taikhoan/dangki.php';
        }
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
