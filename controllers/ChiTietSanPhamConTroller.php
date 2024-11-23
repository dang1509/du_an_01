<?php
    class ChiTietSanPhamConTroller{
        public $modelChiTiet;
        public function __construct(){
            $this->modelChiTiet = new ChiTiet;
        }
    }
?>