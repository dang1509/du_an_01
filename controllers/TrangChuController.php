<?php 

class TrangChuController
{
    public $modelTrangChu;
   
    public function __construct()
    {
        $this->modelTrangchu = new TrangChu();   
    }
    public function trangChu(){
        $DanhMuc = $this->modelTrangchu->getAllDanhMuc();
        $SanPham = $this->modelTrangchu->getAllSanPham();
        require_once "./views/TrangChu.php";
    }
    

}