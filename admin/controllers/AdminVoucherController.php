<?php
class AdminVoucherController {
    public $modelVoucher;
    public function __construct(){  
        $this->modelVoucher = new Voucher();

    }
    public function danhSachVoucher(){
        $listVoucher = $this->modelVoucher->getAllVoucher();
        require_once './views/voucher/listVoucher.php';
    }

   public function updateVoucher(){
    $id = $_GET['id'];
    $data = $this->modelVoucher->findId($id);
    $trangThai = $data['trang_thai'];
    if($trangThai == 1){
        $trangThai = 0;
    } else{
        $trangThai = 1;
    }
    $this->modelVoucher->updateTrangThai($id, $trangThai);
    header('Location: ?act=voucher');
   }
   public function setVoucher(){
    $currentDate = date('Y-m-d');  
    $vouchers = $this->modelVoucher->getAllVoucher(); 

    foreach ($vouchers as $voucher) {
        $id = $voucher['id'];
        $trangThai = $voucher['trang_thai'];
        $startDate = $voucher['ngay_bat_dau'];
        $endDate = $voucher['ngay_ket_thuc'];
        if ($currentDate < $startDate || $currentDate > $endDate) {
            $this->modelVoucher->updateTrangThai($id, 0);
        } else{
            $this->modelVoucher->updateTrangThai($id, 1);
        }
        }
        require_once './views/voucher/listVoucher.php';
        }

        public function formThemVoucher(){
            require_once './views/voucher/AddVoucher.php';
            deleteSessionError();
        }
        public function insertVoucher(){
            
            if(isset($_POST['btn_insert'])){
                $maVoucher = $_POST['ma_voucher'];
                $giamGia = $_POST['giam_gia'];
                $batdau = $_POST['ngay_bat_dau'];
                $ketthuc = $_POST['ngay_ket_thuc'];
                $soLuong = $_POST['so_luong'];
                $trangThai = $_POST['trang_thai'];
    
                $error = [];
    
                if (empty($maVoucher)) {
                    $error[] = "Mã voucher không được để trống.";
                }
                if (!is_numeric($giamGia) || $giamGia <= 0 || $giamGia > 100) {
                    $error[] = "Giảm giá phải là một số trong khoảng từ 0 đến 100.";
                }
                if (empty($batdau)) {
                    $error[] = "Ngày bắt đầu không được để trống.";
                } else {
                    $batdau = date('Y-m-d', strtotime($batdau));  
                    if (!$batdau) {
                        $error[] = "Ngày bắt đầu không hợp lệ.";
                    }
                }
                if (empty($ketthuc)) {
                    $error[] = "Ngày kết thúc không được để trống.";
                } else {
                    $ketthuc = date('Y-m-d', strtotime($ketthuc)); 
                    if (!$ketthuc) {
                        $error[] = "Ngày kết thúc không hợp lệ.";
                    } elseif ($ketthuc < $batdau) {
                        $error[] = "Ngày kết thúc phải sau ngày bắt đầu.";
                    }
                }
                if (!is_numeric($soLuong) || $soLuong <= 0) {
                    $error[] = "Số lượng phải là một số nguyên lớn hơn 0.";
                }
                if ($trangThai !== '0' && $trangThai !== '1') {
                    $error['trang_thai'] = "Trạng thái không hợp lệ. Chỉ chấp nhận 0 hoặc 1.";
                }
 
                if (empty($error)) {
                    $this->modelVoucher->insert($maVoucher, $giamGia, $batdau, $ketthuc, $soLuong, $trangThai);
                    header('Location: ?act=voucher');
                    exit;
                } else {
                    foreach ($error as $err) {
                        echo "<p class='error'>$err</p>";
                    }
                }
            }
        }
        public function formSuaVoucher(){
            $id = $_GET['id'];
            $voucher = $this->modelVoucher->getOneVoucher($id);
            if($voucher){
                require_once "./views/voucher/EditVoucher.php";
            }else{
                header("location:".BASE_URL_ADMIN.'?act=voucher');
                exit();
            }
        }
        public function editVoucher(){
  
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $id = $_POST['id'];
                $maVoucher = $_POST['ma_voucher'];
                $giamGia = $_POST['giam_gia'];
                $batdau = $_POST['ngay_bat_dau'];
                $ketthuc = $_POST['ngay_ket_thuc'];
                $soLuong = $_POST['so_luong'];
                $trangThai = $_POST['trang_thai'];
    
                $error = [];
    
                if (empty($maVoucher)) {
                    $error[] = "Mã voucher không được để trống.";
                }
                if (!is_numeric($giamGia) || $giamGia <= 0 || $giamGia > 100) {
                    $error[] = "Giảm giá phải là một số trong khoảng từ 0 đến 100.";
                }
                if (empty($batdau)) {
                    $error[] = "Ngày bắt đầu không được để trống.";
                } else {
                    $batdau = date('Y-m-d', strtotime($batdau));  
                    if (!$batdau) {
                        $error[] = "Ngày bắt đầu không hợp lệ.";
                    }
                }
                if (empty($ketthuc)) {
                    $error[] = "Ngày kết thúc không được để trống.";
                } else {
                    $ketthuc = date('Y-m-d', strtotime($ketthuc)); 
                    if (!$ketthuc) {
                        $error[] = "Ngày kết thúc không hợp lệ.";
                    } elseif ($ketthuc < $batdau) {
                        $error[] = "Ngày kết thúc phải sau ngày bắt đầu.";
                    }
                }
                if (!is_numeric($soLuong) || $soLuong <= 0) {
                    $error[] = "Số lượng phải là một số nguyên lớn hơn 0.";
                }
                if ($trangThai !== '0' && $trangThai !== '1') {
                    $error['trang_thai'] = "Trạng thái không hợp lệ. Chỉ chấp nhận 0 hoặc 1.";
                }
 
                if (empty($error)) {
                    $this->modelVoucher->update($id,$maVoucher, $giamGia, $batdau, $ketthuc, $soLuong, $trangThai);
                    header('Location: ?act=voucher');
                    exit;
                } else {
                    foreach ($error as $err) {
                        echo "<p class='error'>$err</p>";
                    }
                }
            }
        }
}
