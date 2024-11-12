<?php
class AdminBinhLuanController{
    public $modelBinhLuan;
    public function __construct(){  
        $this->modelBinhLuan = new BinhLuan();

    }
    public function danhSachBinhLuan(){
        $listBinhLuan = $this->modelBinhLuan->getAllBinhLuan();
        require_once './views/binhluan/listBinhLuan.php';
    }
    public function updateTrangThai(){
        $id = $_GET['id'];
        $data = $this->modelBinhLuan->findId($id);
        $trangThai = $data['trang_thai'];
       
        if($trangThai == 1){
            $trangThai = 0;
        }else{
            $trangThai = 1;
        }
        $this->modelBinhLuan->updateTrangThai($id, $trangThai);
        header('Location: ?act=binh-luan');
    }
    
    }
?>