<?php
class DonHang {
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }

    public function getAllDonHang() {
        try {
            $sql = 'SELECT*FROM don_hangs 
                    INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
                    INNER JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch(PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
}
?>
