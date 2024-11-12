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
        header('Location: ?act=danh-muc');
    }
    public function insertDanhMuc(){
        require_once './views/danhmuc/AddDanhMuc.php';
        if(isset($_POST['btn_insert'])){
            $tenDanhMuc = $_POST['tenDanhMuc'];
            $moTa = $_POST['moTa'];
            if($this->modelDanhMuc->insert($tenDanhMuc,$moTa)){
                header("Location: ?act=danh-muc");
            }
        }
    }
    public function updateDanhMuc($id){
        $update=$this->modelDanhMuc->findId($id);
        require_once './views/danhmuc/EditDanhMuc.php';
        if(isset($_POST['btn_update'])){

            $tenDanhMuc = $_POST['ten_danh_muc'];
            $moTa = $_POST['mo_ta'];
            if($this->modelDanhMuc->update($id,$tenDanhMuc,$moTa)){
                header("Location: ?act=danh-muc");
            }
        }
    }
}

?>
 