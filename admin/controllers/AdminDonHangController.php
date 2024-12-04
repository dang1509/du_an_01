<?php
    class AdminDonHangController{
        public $modelDonHang;
        
        public function __construct(){
            $this-> modelDonHang = new DonHang();
            
        }
        public function danhsachDonHang(){
        $listDonHang = $this->modelDonHang->getAllDonHang();
        // var_dump($listDonHang);die();
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
            // var_dump($DonHang);die();
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
                
                $trang_thai_id = $_POST['trang_thai_id']??''; 
                // print_r($_POST);die();
                
                    $this->modelDonHang->updateDonHang($don_hang_id,$trang_thai_id);
                    // echo $don_hang_id;die();
                // var_dump($don_hang);die();
                    header("location:".BASE_URL_ADMIN.'?act=don-hang');
                
                
            }
        }
        
        
        
    }

?>