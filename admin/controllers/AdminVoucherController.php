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

   
}