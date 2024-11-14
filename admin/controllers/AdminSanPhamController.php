<?php
    class AdminSanPhamController{
        public $modelSanPham;
        public $modelDanhMuc;
        public function __construct(){
            $this->modelSanPham = new SanPham();
            $this->modelDanhMuc = new DanhMuc();
        }
        public function danhSachSanPham(){
            $listSanPham = $this->modelSanPham->getAllSanPham();
            require_once './views/sanpham/listSanPham.php';
        }
        public function formThemSanPham(){
            $this->modelDanhMuc->getAllDanhMuc();
            require_once "./views/sanpham/formThemSanPham.php";
            deleteSessionError();
        }
        // public function ThemDanhMuc(){
        //     if($_SERVER['REQUEST_METHOD']=="POST"){
        //         $ten_danh_muc = $_POST['ten_danh_muc']?? "";
        //         $mo_ta = $_POST['mo_ta'] ?? "";
        //         $error = [];
                
        //         if(empty($ten_danh_muc)){
        //             $error['ten_danh_muc']='Tên danh mục không được để trống';
        //         }
        //         $_SESSION['error']= $error;
        //         if(empty($error)){
        //             $this->modelDanhmuc->addDanhmuc($ten_danh_muc,$mo_ta);
        //             header("location:".BASE_URL_ADMIN.'?act=danh-muc');
        //             exit();
        //         }else{
        //             $_SESSION['flash'] = true;
        //             header("location:".BASE_URL_ADMIN.'?act=form-them-danh-muc');
        //             exit();
        //         }
        //     }
        // }
        // public function formSuaDanhMuc(){
        //     $id = $_GET['id_danh_muc'];
        //     $danhmuc = $this->modelDanhmuc->getOneDanhmuc($id);
        //     if($danhmuc){
        //         require_once "./views/danhmuc/formSuaDanhmuc.php";
        //     }else{
        //         header("location:".BASE_URL_ADMIN.'?act=danh-muc');
        //         exit();
        //     }
            
        // }
        // public function SuaDanhMuc(){
        //     if($_SERVER['REQUEST_METHOD']=="POST"){
        //         $ten_danh_muc = $_POST['ten_danh_muc'];
        //         $mo_ta = $_POST['mo_ta'];
        //         $id = $_POST['id'];
        //         $error = [];
        //         if(empty($ten_danh_muc)){
        //             $error['ten_danh_muc']='Tên danh mục không được để trống';
        //         }
        //         if(empty($error)){
        //             $this->modelDanhmuc->SuaDanhmuc($id,$ten_danh_muc,$mo_ta);
        //             header("location:".BASE_URL_ADMIN.'?act=danh-muc');
        //             exit();
        //         }else{
        //             $danhmuc = ['id'=>$id,'ten_danh_muc'=>$ten_danh_muc,'mo_ta'=>$mo_ta];
                    
        //             require_once "./views/danhmuc/formSuaDanhmuc.php";
        //         }
        //     }
        // }
        // public function XoaDanhMuc(){
        //     $id = $_GET['id_danh_muc'];
        //     $danhmuc = $this->modelDanhmuc->getOneDanhmuc($id);
        //     if($danhmuc){
        //         $this->modelDanhmuc->DeleteDanhmuc($id);
        //         header("location:".BASE_URL_ADMIN.'?act=danh-muc');
        //     }else{
        //         header("location:".BASE_URL_ADMIN.'?act=danh-muc');
        //         exit();
        //     }
        // }
    }

?>