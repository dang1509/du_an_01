<?php 

class TrangChu
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    
    public function getAllDanhMuc(){
        try{
            $sql = "SELECT * FROM danh_mucs WHERE id != 0";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(PDOException $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }
    public function getOneDonHang($id){
        try{
            $sql = 'SELECT don_hangs.*,don_hangs.id as don_hang_id, trang_thai_don_hangs.ten_trang_thai,tai_khoans.*,phuong_thuc_thanh_toans.ten_phuong_thuc
            FROM don_hangs INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id= trang_thai_don_hangs.id
            INNER JOIN tai_khoans ON don_hangs.tai_khoan_id= tai_khoans.id
            INNER JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id= phuong_thuc_thanh_toans.id
            WHERE don_hangs.id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id'=>$id]);
            return $stmt->fetch();
        }catch(PDOException $e){
            echo 'Lỗi: '. $e->getMessage();
        }  
    }
    public function getListSpDonHang($id){
        try{
            $sql = 'SELECT chi_tiet_don_hangs.*,san_phams.ten_san_pham
             FROM chi_tiet_don_hangs INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
            WHERE don_hang_id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id'=>$id]);
            return $stmt->fetchAll();
        }catch(PDOException $e){
            echo 'Lỗi: '. $e->getMessage();
        }  
    }

   
    
}