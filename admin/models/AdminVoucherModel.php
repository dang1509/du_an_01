<?php
class Voucher {
    public $conn;
    public function __construct(){
        $this->conn = connectDB();

    }
    public function getAllVoucher(){  
            $sql = "SELECT * FROM vouchers";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
    }
    public function findId($id){
        $sql = "SELECT * FROM vouchers where id=$id";
        return $this->conn->query($sql)->fetch();
    }
    
    public function updateTrangThai($id, $trangThai) {
        $sql = "UPDATE vouchers SET trang_thai = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$trangThai, $id]);
        return $stmt->rowCount() > 0;
    }
    function insert($ma_voucher,$giam_gia,$ngay_bat_dau,$ngay_ket_thuc,$so_luong,$trang_thai,$GiaToiThieuDeGiam,$GiaToiDaCoTheGiam){
        $sql_one="INSERT INTO vouchers (ma_voucher, giam_gia, ngay_bat_dau, ngay_ket_thuc, so_luong,trang_thai) VALUES ( '$ma_voucher','$giam_gia','$ngay_bat_dau','$ngay_ket_thuc','$so_luong','$trang_thai','$GiaToiThieuDeGiam','$GiaToiDaCoTheGiam') " ;
        $result=$this->conn->prepare($sql_one);
        return $result->execute();
    }
    function update($id,$ma_voucher,$giam_gia,$ngay_bat_dau,$ngay_ket_thuc,$so_luong,$trang_thai,$GiaToiThieuDeGiam,$GiaToiDaCoTheGiam){
        $sql="UPDATE vouchers SET ma_voucher='$ma_voucher',
        giam_gia=$giam_gia, 
        ngay_bat_dau='$ngay_bat_dau',
        ngay_ket_thuc = '$ngay_ket_thuc',
        so_luong=$so_luong ,
        trang_thai=$trang_thai,
        gia_toi_thieu_de_giam=$GiaToiThieuDeGiam,
        gia_toi_da_co_the_giam=$GiaToiDaCoTheGiam  where id=$id";
        return $this->conn->prepare($sql)->execute();

    }
    function getOneVoucher($id){
        try{
            $sql = "SELECT * FROM vouchers WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id'=>$id]);
            return $stmt->fetch();
        }catch(PDOException $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }

}
?>