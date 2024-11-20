<?php 
class SanPham{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
    // public function getAllSanPham(){
    //     try {
    //         $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams INNER JOIN danh_mucs ON san_phams.danh_muc_id= danh_mucs.id';
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute();
    //         return $stmt->fetchAll();
    //     } catch (PDOException $e) {
    //         echo 'Lỗi: ' . $e->getMessage();
    //     }

    // }
    public function get4SanPham(){
        try{
            $sql = "SELECT * FROM san_phams ORDER BY luot_xem DESC LIMIT 4";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(PDOException $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }
    public function getSale(){
        try{
            $sql = "SELECT * FROM san_phams WHERE gia_khuyen_mai != 0";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(PDOException $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }
    public function getSanPhamMoi(){
        try{
            $sql = "SELECT * FROM san_phams ORDER BY ngay_nhap DESC LIMIT 8";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(PDOException $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }
}