<?php
    class AdminBinhLuanController{
        public $modelBinhLuan;
        public $modelTaiKhoan;
        public $modelSanPham;
        public function __construct(){
            $this->modelBinhLuan= new BinhLuan();
            $this->modelTaiKhoan=new TaiKhoan();
            $this->modelSanPham = new SanPham();
        }
        public function danhsachBinhLuan(){
            $listBinhLuan = $this->modelBinhLuan->getAllBinhLuan();
            require_once "./views/binhluan/listBinhLuan.php";
            }
        
        public function UpdateBinhLuan(){
            $id_binh_luan = $_GET['id_binh_luan'];
            $binhLuan = $this->modelBinhLuan->getOneBinhLuan($id_binh_luan);
            if($binhLuan){
                $trang_thai_update = '';
                if($binhLuan['trang_thai']==1){
                    $trang_thai_update = 0;
                }else{
                    $trang_thai_update = 1;
                }
            }
            $this->modelBinhLuan->updateBinhLuan($id_binh_luan,$trang_thai_update);
            header('location:'.BASE_URL_ADMIN.'?act=binh-luan');
        } 
    }
?>