<?php 

class TrangChuController
{
    public $modelTrangChu;
    public $modelSanPham;
    public function __construct()
    {
        $this->modelTrangChu = new TrangChu();   
        $this->modelSanPham = new SanPham();
    }
    public function trangChu(){
        $DanhMuc = $this->modelTrangChu->getAllDanhMuc();      
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
    

}