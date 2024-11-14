<?php
class AdminSanPhamController
{
    public $modelSanPham;
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelDanhMuc = new DanhMuc();
    }
    public function danhSachSanPham()
    {
        $listSanPham = $this->modelSanPham->AllSanPham();
        require_once './views/sanpham/listSanPham.php';
    }
    public function formThemSanPham()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once "./views/sanpham/formThemSanPham.php";
        deleteSessionError();
    }
    public function postThemSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $ten_san_pham = $_POST['ten_san_pham'] ?? "";
            $chat_lieu = $_POST['chat_lieu'] ?? "";
            $gia_san_pham = $_POST['gia_san_pham'] ?? "";
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? "";
            $so_luong = $_POST['so_luong'] ?? "";
            $ngay_nhap = $_POST['ngay_nhap'] ?? "";
            $danh_muc_id = $_POST['danh_muc_id'] ?? "";
            $trang_thai = $_POST['trang_thai'] ?? "";
            $mo_ta = $_POST['mo_ta'] ?? "";
            $error = [];
            $hinh_anh = $_FILES['hinh_anh'] ?? NULL;

            $file_thumb = uploadFile($hinh_anh, './uploads/');


            $img_array = $_FILES['img_array'] ?? NULL;

            if (empty($ten_san_pham)) {
                $error['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($chat_lieu)) {
                $error['chat_lieu'] = 'Chất liệu không được để trống';
            }
            if (empty($gia_san_pham)) {
                $error['gia_san_pham'] = 'Giá sản phẩm không được để trống';
            }
            if (empty($gia_khuyen_mai)) {
                $error['gia_khuyen_mai'] = 'Giá khuyến mãi không được để trống';
            }
            if (empty($so_luong)) {
                $error['so_luong'] = 'Số lượng không được để trống';
            }
            if (empty($ngay_nhap)) {
                $error['ngay_nhap'] = 'Ngày nhập không được để trống';
            }
            if (empty($danh_muc_id)) {
                $error['danh_muc_id'] = 'Danh mục phải được chọn';
            }
            if (empty($trang_thai)) {
                $error['trang_thai'] = 'Trạng thái phải được chọn';
            }
            if ($hinh_anh['error'] !== 0) {
                $error['hinh_anh'] = 'Phải chọn ảnh sản phẩm';
            }
            $_SESSION['error'] = $error;
            if (empty($error)) {
                $this->modelSanPham->ThemSanPham($ten_san_pham, $chat_lieu, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $file_thumb);
                header("location:" . BASE_URL_ADMIN . '?act=san-pham');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("location:" . BASE_URL_ADMIN . '?act=form-them-san-pham');
                exit();
            }
        }
    }
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