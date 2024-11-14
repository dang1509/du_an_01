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
        }
        }
        require_once './views/voucher/listVoucher.php';
        }

   
}
