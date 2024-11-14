<?php
class AdminQuanTriTaiKhoanController{
    public $modelQuanTri;
    public function __construct(){  
        $this->modelQuanTri = new QuanTri();

    }
    public function danhSachQuanTri(){
        $listQuanTri = $this->modelQuanTri->getAllQuanTri();
        require_once './views/quantri/listTaiKhoanQuanTri.php';

    }
    public function danhSachKhach(){
        $listKhach = $this->modelQuanTri->getAllKhach();
        require_once './views/quantri/listTaiKhoanKhanhHang.php';

    }
 
}
?>