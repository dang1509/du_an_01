<?php 

class TrangChuController
{
    public $modelTrangChu;
    public $modelSanPham;
    public function __construct()
    {
        $this->modelTrangchu = new TrangChu();   
        $this->modelSanPham = new SanPham();
    }
    public function trangChu(){
        $DanhMuc = $this->modelTrangchu->getAllDanhMuc();      
        $Top4SanPham = $this->modelSanPham->get4SanPham();
        $SanPhamKhuyenMai = $this->modelSanPham->getSale();
        $SanPhamMoi = $this->modelSanPham->getSanPhamMoi();
        require_once "./views/TrangChu.php";
    }
    

}