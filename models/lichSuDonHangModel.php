<?php
class DonHang {
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
    public function getAllDonHang($tai_khoan_id) {
        try {
            $sql = 'SELECT don_hangs.*, don_hangs.id AS don_hang_id, trang_thai_don_hangs.ten_trang_thai, phuong_thuc_thanh_toans.ten_phuong_thuc
                FROM don_hangs
                    INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
                    INNER JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id WHERE tai_khoan_id=:tai_khoan_id
                    ORDER BY ngay_dat DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':tai_khoan_id'=>$tai_khoan_id]);
            return $stmt->fetchAll();
        } catch(PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
}
?>