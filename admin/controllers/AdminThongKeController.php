<?php
    class AdminThongKeController{
        public $modelThongKe;
        public function __construct(){
            $this->modelThongKe = new ThongKe;
        }
        public function ThongKe(){
            
        
            if (!isset($_SESSION['chuc_vu']) || $_SESSION['chuc_vu'] != 1) {
                echo "<script>";
                echo "alert('Tài khoản không có quyền truy cập');";
                echo "window.location.href = '".BASE_URL."';";
                echo "</script>";
                exit; 
            }
            else{
            require_once './views/ThongKe.php';
            }
        }
        public function ThongKeTheoNgay(){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $ngay_bat_dau = $_POST['ngay_bat_dau'];
                $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
                $doanhThu = $this->modelThongKe->getDoanhThu($ngay_bat_dau,$ngay_ket_thuc);
                $top5SanPham = $this->modelThongKe->getTop5($ngay_bat_dau,$ngay_ket_thuc);
                $top3KhachHang = $this->modelThongKe->getTopKhachHang($ngay_bat_dau,$ngay_ket_thuc);
                // var_dump($top3KhachHang);die();
                require_once './views/ThongKeDone.php';
            }
        }
    }