<?php
    class AdminSanPhamController{
        public $modelSanPham;

        public function __construct(){
            $this->modelSanPham = new SanPham();
        }
        public function danhSachSanPham(){
            $listSanPham = $this->modelSanPham->getAllSanPham();
            require_once './views/sanpham/listSanPham.php';
            
        }
    }

?>