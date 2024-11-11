<?php
class AdminDanhMucController{
    public $modelDanhMuc;
    public function __construct(){  
        $this->modelDanhMuc = new DanhMuc();

    }
    public function danhSachDanhMuc(){
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/danhmuc/listDanhMuc.php';
    }
    public function deleteDanhMuc($id){
        $this->modelDanhMuc->delete($id);
        header('Location: /admin/danh-muc');
    }


    public function themDanhMuc(){
        require_once './views/danhmuc/AddDanhMuc.php';
    }
}

?>
 