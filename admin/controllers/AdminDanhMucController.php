<?php
ob_start();
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
    public function formThemDanhMuc(){
        require_once './views/danhmuc/AddDanhMuc.php';
        deleteSessionError();
    }
    public function insertDanhMuc(){
        
        if(isset($_POST['btn_insert'])){
            $tenDanhMuc = $_POST['ten_danh_muc'];
            $moTa = $_POST['mo_ta'];

            $error = [];

            if(empty($tenDanhMuc)){
                $error['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }
            $_SESSION['error'] = $error;

            if(empty($error)){
                $this->modelDanhMuc->insert($tenDanhMuc,$moTa);
                header("location:".BASE_URL_ADMIN.'?act=danh-muc');
                exit();
            }else{
                $_SESSION['flash'] = true;
                header("location:".BASE_URL_ADMIN.'?act=form-them-danh-muc');
                exit();
            }

           
        }
    }

    public function formSuaDanhMuc(){
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getOneDanhMuc($id);
        if($danhMuc){
            require_once "./views/danhmuc/EditDanhMuc.php";
        }else{
            header("location:".BASE_URL_ADMIN.'?act=danh-muc');
            exit();
        }
    }
    public function updateDanhMuc(){
        
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            $id = $_POST['id'];
            $error = [];
            if(empty($ten_danh_muc)){
                $error['ten_danh_muc']='Tên danh mục không được để trống';
            }
            if(empty($error)){
                $this->modelDanhMuc->update($id,$ten_danh_muc,$mo_ta);
                header("location:".BASE_URL_ADMIN.'?act=danh-muc');
                exit();
            }else{
                $danhMuc = ['id'=>$id,'ten_danh_muc'=>$ten_danh_muc,'mo_ta'=>$mo_ta];
                require_once "./views/danhmuc/EditDanhmuc.php";
            }
        }
    }
}

?>
 