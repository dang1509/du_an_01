<?php
    class SanPham {
        public $conn;
        public function __construct(){
            $this->conn = connectDB();
        }
        public function AllSanPham(){
              try{
                    $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams INNER JOIN danh_mucs ON san_phams.danh_muc_id= danh_mucs.id';
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute();
                    return $stmt->fetchAll();
                }catch(PDOException $e){
                    echo 'Lỗi: '. $e->getMessage();
                }  
            
        }
        public function ThemSanPham($ten_san_pham,$chat_lieu,$gia_san_pham,$gia_khuyen_mai,$so_luong,$ngay_nhap,$danh_muc_id,$trang_thai,$mo_ta,$hinh_anh){
            try{
                $sql = "INSERT INTO san_phams(ten_san_pham,chat_lieu,gia_san_pham,gia_khuyen_mai,so_luong,ngay_nhap,danh_muc_id,trang_thai,mo_ta,hinh_anh) VALUES (:ten_san_pham,:chat_lieu,:gia_san_pham,:gia_khuyen_mai,:so_luong,:ngay_nhap,:danh_muc_id,:trang_thai,:mo_ta,:hinh_anh)";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':ten_san_pham'=>$ten_san_pham,':gia_san_pham'=>$gia_san_pham,
                                ':chat_lieu'=>$chat_lieu,
                                ':gia_khuyen_mai'=>$gia_khuyen_mai,':so_luong'=>$so_luong,
                                ':ngay_nhap'=>$ngay_nhap,
                                ':danh_muc_id'=>$danh_muc_id,
                                ':trang_thai'=>$trang_thai,
                                ':mo_ta'=>$mo_ta,':hinh_anh'=>$hinh_anh
            ]);
                return true;
            }catch(PDOException $e){
                echo 'Lỗi: '. $e->getMessage();
            }
        }
    }
?>