<?php
    class AdminDonHangController{
        public $modelDonHang;
        
        public function __construct(){
            $this-> modelDonHang = new DonHang();
            
        }
        public function danhsachDonHang(){
        $listDonHang = $this->modelDonHang->getAllDonHang();
        require_once "./views/donhang/listDonHang.php";
        } 
        public function ChiTietDonHang(){
            $don_hang_id = $_GET['id_don_hang'];
            $donHang = $this->modelDonHang->getOneDonHang($don_hang_id);
            // var_dump($donHang);die();
            $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($don_hang_id);
            require_once './views/donhang/detailDonHang.php';
        }
        public function formSuaDonHang(){
            $id = $_GET['id_don_hang'];
            $DonHang = $this->modelDonHang->getOneDonHang($id);
            $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
            if($DonHang){
                require_once "./views/donhang/formSuaDonHang.php";
                // var_dump($DonHang);die();
                deleteSessionError();
            }else{
                header("location:".BASE_URL_ADMIN.'?act=don-hang');
                exit();
            }
            
        }
        public function SuaDonHang(){
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $don_hang_id = $_POST['don_hang_id'] ??'';
                $ten_nguoi_nhan = $_POST['ten_nguoi_nhan']??'';
                $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan']??'';
                $email_nguoi_nhan = $_POST['email_nguoi_nhan']??'';
                $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan']??'';
                $ghi_chu = $_POST['ghi_chu']??'';
                $trang_thai_id = $_POST['trang_thai_id']??''; 
                $error = [];           
                if(empty($ten_nguoi_nhan)){
                    $error['ten_nguoi_nhan']='Tên người nhận không được để trống';
                }
                if(empty($sdt_nguoi_nhan)){
                    $error['sdt_nguoi_nhan']='Số điện thoại không được để trống';
                }
                if(empty($email_nguoi_nhan)){
                    $error['email_nguoi_nhan']='Email không được để trống';
                }
                if(empty($dia_chi_nguoi_nhan)){
                    $error['dia_chi_nguoi_nhan']='Địa chỉ không được để trống';
                }
                if(empty($trang_thai_id)){
                    $error['trang_thai_id']='Trạng thái không được để trống';
                }                      
                $_SESSION['error'] = $error;
                if(empty($error)){
                    $don_hang=$this->modelDonHang->updateDonHang($ten_nguoi_nhan,$sdt_nguoi_nhan,$email_nguoi_nhan,$dia_chi_nguoi_nhan,$ghi_chu,$trang_thai_id,$don_hang_id);
                   
                // var_dump($don_hang);die();
                    header("location:".BASE_URL_ADMIN.'?act=don-hang');
                    exit();
                }else{
                    $_SESSION['flash'] = true;
                    header("location:".BASE_URL_ADMIN.'?act=form-sua-don-hang&&id_don_hang='.$don_hang_id);
                    exit();
                }
            }
        }
        
        
        
    }

?>