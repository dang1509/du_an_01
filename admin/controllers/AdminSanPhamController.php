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
                
                $san_pham_id=$this->modelSanPham->ThemSanPham($ten_san_pham, $chat_lieu, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $file_thumb);
                if(!empty($img_array['name'])){
                    foreach($img_array['name'] as $key=>$value){
                        $file = [
                            'name' => $img_array['name'][$key],
                            'type' => $img_array['type'][$key],
                            'tmp_name' => $img_array['tmp_name'][$key],
                            'error' => $img_array['error'][$key],
                            'size' => $img_array['size'][$key]

                        ];
                        $link_hinh_anh = uploadFile($file,'./uploads/');
                        $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id,$link_hinh_anh);
                    }
                }
                header("location:" . BASE_URL_ADMIN . '?act=san-pham');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("location:" . BASE_URL_ADMIN . '?act=form-them-san-pham');
                exit();
            }
        }
    }
    public function formEditSanPham(){
        $id = $_GET['id_san_pham'];
        $SanPham = $this->modelSanPham->getOneSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getAlbumAnhSanPham($id);
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        if($SanPham){
            require_once "./views/sanpham/formEditSanPham.php";
            deleteSessionError();
        }else{
            header("location:".BASE_URL_ADMIN.'?act=san-pham');
            exit();
        }
    }
    public function postEditSanPham(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $san_pham_id = $_POST['san_pham_id'] ?? "";
            $sanPhamOld = $this->modelSanPham->getOneSanPham($san_pham_id);
            $old_file = $sanPhamOld['hinh_anh'];
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

            if(isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK){
                $new_file = uploadFile($hinh_anh,'./uploads/');
                if(!empty($old_file)){
                    deleteFile($old_file);
                }
            }else{
                $new_file = $old_file;
            }

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
            
            $_SESSION['error'] = $error;
            if (empty($error)) {
                
                $san_pham_id=$this->modelSanPham->EditSanPham($san_pham_id,$ten_san_pham, $chat_lieu, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $new_file);               
                header("location:" . BASE_URL_ADMIN . '?act=san-pham');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("location:" . BASE_URL_ADMIN . '?act=form-edit-san-pham&id_san_pham='.$san_pham_id);
                exit();
            }
        }
    }
    public function postEditAnhSanPham(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            $listAnhSanPham = $this->modelSanPham->getAlbumAnhSanPham($san_pham_id);

            $img_array  = $_FILES['img_array'];
            $img_delete = isset($_POST['img_delete']) ? explode(',',$_POST['img_delete']) : []; 
            $current_img_ids = $_POST['current_img_ids'] ?? [];
            $upload_file = [];

            foreach($img_array['name']as $key=>$value){
                if($img_array['error'][$key]== UPLOAD_ERR_OK){
                    $new_file = uploadFileAlbum($img_array,'./uploads/',$key);
                    if($new_file){
                        $upload_file[] = [
                            'id' => $current_img_ids[$key] ?? null,
                            'file' =>$new_file
                        ];
                    }
                }
            }
            foreach($upload_file as $file_info){
                if($file_info['id']){
                    $old_file = $this-> modelSanPham-> getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];
                    $this->modelSanPham->updateAnhSanPham($file_info['id'],$file_info['file']);
                    deleteFile($old_file);
                } else {
                    $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id,$file_info['file']);
                }
            }
            foreach($listAnhSanPham as $anhSP){
                $anh_id = $anhSP['id'];
                if(in_array($anh_id,$img_delete)){
                    $this->modelSanPham->destroyAnhSanPham($anh_id);
                    deleteFile($anhSP['link_hinh_anh']);
                }

            }
            header("location:" . BASE_URL_ADMIN . '?act=form-edit-san-pham&id_san_pham='.$san_pham_id);
            exit();
        }
    }
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