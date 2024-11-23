<?php
    class BinhLuan{
        public $conn;
        public function __construct(){
            $this->conn = connectDB();
        }
        public function getBinhLuanFromSanPham($id_san_pham){
            try{
                $sql = 'SELECT binh_luans.*,san_phams.ten_san_pham,tai_khoans.ho_ten FROM binh_luans 
                INNER JOIN san_phams ON binh_luans.san_pham_id= san_phams.id 
                INNER JOIN tai_khoans ON binh_luans.tai_khoan_id=tai_khoans.id
                WHERE san_pham_id=:id AND binh_luans.trang_thai = 1';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':id'=>$id_san_pham]);
                return $stmt->fetchAll();
            }catch(PDOException $e){
                echo 'Lỗi: '. $e->getMessage();
            }
        }
        public function ThemBinhLuan($san_pham_id,$tai_khoan_id,$noi_dung,$ngay_dang,$trang_thai){
            try{
                $sql = 'INSERT INTO binh_luans(san_pham_id,tai_khoan_id,noi_dung,ngay_dang,trang_thai) VALUES (:san_pham_id,:tai_khoan_id,:noi_dung,:ngay_dang,:trang_thai)';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':san_pham_id'=>$san_pham_id,':tai_khoan_id'=>$tai_khoan_id,':noi_dung'=>$noi_dung,':ngay_dang'=>$ngay_dang,':trang_thai'=>$trang_thai]);
                return true;
            }catch(PDOException $e){
                echo 'Lỗi: '. $e->getMessage();
            }
        }
    }
?>