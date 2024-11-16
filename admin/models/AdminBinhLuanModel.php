<?php
    class BinhLuan{
        public $conn;
        public function __construct(){
            $this->conn = connectDB();
        }
        public function getAllBinhLuan(){
            try{
                $sql = 'SELECT binh_luans.*,san_phams.ten_san_pham,tai_khoans.ho_ten FROM binh_luans 
                INNER JOIN san_phams ON binh_luans.san_pham_id= san_phams.id 
                INNER JOIN tai_khoans ON binh_luans.tai_khoan_id=tai_khoans.id';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
            }catch(PDOException $e){
                echo 'Lỗi: '. $e->getMessage();
            }
            
        }
        public function getBinhLuanFromKhachHang($id){
            try{
                $sql = 'SELECT binh_luans.*,san_phams.ten_san_pham,tai_khoans.ho_ten FROM binh_luans 
                INNER JOIN san_phams ON binh_luans.san_pham_id= san_phams.id 
                INNER JOIN tai_khoans ON binh_luans.tai_khoan_id=tai_khoans.id
                WHERE tai_khoan_id=:id';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':id'=>$id]);
                return $stmt->fetchAll();
            }catch(PDOException $e){
                echo 'Lỗi: '. $e->getMessage();
            }
        }
        public function getBinhLuanFromSanPham($id){
            try{
                $sql = 'SELECT binh_luans.*,san_phams.ten_san_pham,tai_khoans.ho_ten FROM binh_luans 
                INNER JOIN san_phams ON binh_luans.san_pham_id= san_phams.id 
                INNER JOIN tai_khoans ON binh_luans.tai_khoan_id=tai_khoans.id
                WHERE san_pham_id=:id';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':id'=>$id]);
                return $stmt->fetchAll();
            }catch(PDOException $e){
                echo 'Lỗi: '. $e->getMessage();
            }
        }
       public function getOneBinhLuan($id){
        try{
            $sql = "SELECT * FROM binh_luans WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id'=>$id]);
            return $stmt->fetch();
        }catch(PDOException $e){
            echo 'Lỗi: '. $e->getMessage();
        }
       }
       public function updateBinhLuan($id,$trang_thai){
        try{
            $sql = "UPDATE binh_luans SET trang_thai=:trang_thai WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['trang_thai'=>$trang_thai,':id'=>$id]);
            return true;
        }catch(PDOException $e){
            echo 'Lỗi: '. $e->getMessage();
        }
       }
    }
?>