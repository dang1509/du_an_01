<?php
class ThongKe
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getDoanhThu($ngay_bat_dau, $ngay_ket_thuc)
    {
        try {
            // Kết nối đến cơ sở dữ liệu
            $sql = " SELECT  SUM(don_hangs.tong_tien) AS tong_doanh_thu,COUNT(don_hangs.id) AS so_don_hang, SUM(chi_tiet_don_hangs.so_luong) AS so_san_pham_ban_duoc 
                    FROM don_hangs INNER JOIN chi_tiet_don_hangs ON don_hangs.id = chi_tiet_don_hangs.don_hang_id WHERE  don_hangs.ngay_dat BETWEEN :ngay_bat_dau AND :ngay_ket_thuc 
                      AND don_hangs.trang_thai_id = 7; ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ngay_bat_dau', $ngay_bat_dau);
            $stmt->bindParam(':ngay_ket_thuc', $ngay_ket_thuc);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result; // Trả về kết quả
        } catch (PDOException $e) {
            // Bắt lỗi và in thông báo lỗi
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
    public function getTop5($ngay_bat_dau,$ngay_ket_thuc)
    {
        try {
            $sql = "SELECT 
                    sp.id AS san_pham_id, 
                    sp.ten_san_pham, 
                    SUM(ctdh.so_luong) AS tong_so_luong_ban,
                    dm.ten_danh_muc
                FROM 
                    chi_tiet_don_hangs ctdh
                JOIN 
                    san_phams sp 
                ON 
                    ctdh.san_pham_id = sp.id
                JOIN 
                    don_hangs dh
                ON 
                    ctdh.don_hang_id = dh.id
                JOIN 
                    danh_mucs dm
                ON
                    sp.danh_muc_id = dm.id
                WHERE 
                    dh.trang_thai_id = 7
                    AND dh.ngay_dat BETWEEN :ngay_bat_dau AND :ngay_ket_thuc 
                GROUP BY 
                    sp.id, sp.ten_san_pham
                ORDER BY 
                    tong_so_luong_ban DESC
                LIMIT 5";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ngay_bat_dau', $ngay_bat_dau);
        $stmt->bindParam(':ngay_ket_thuc', $ngay_ket_thuc);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function getTopKhachHang($ngay_bat_dau, $ngay_ket_thuc) {
        try {
            $sql = "SELECT 
                        tk.id AS id_tai_khoan,
                        tk.ho_ten AS ten_khach_hang,
                        COUNT(dh.id) AS so_don_hang,
                        SUM(ctdh.so_luong) AS tong_san_pham,
                        SUM(dh.tong_tien) AS tong_tien_chi_tieu
                    FROM 
                        tai_khoans tk
                    JOIN 
                        don_hangs dh ON tk.id = dh.tai_khoan_id
                    JOIN 
                        chi_tiet_don_hangs ctdh ON dh.id = ctdh.don_hang_id
                    WHERE 
                        dh.trang_thai_id = 7 -- Chỉ tính đơn hàng đã hoàn thành
                        AND dh.ngay_dat BETWEEN :ngay_bat_dau AND :ngay_ket_thuc
                    GROUP BY 
                        tk.id, tk.ho_ten
                    ORDER BY 
                        tong_tien_chi_tieu DESC
                    LIMIT 3";
    
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ngay_bat_dau', $ngay_bat_dau);
            $stmt->bindParam(':ngay_ket_thuc', $ngay_ket_thuc);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    

}
?>