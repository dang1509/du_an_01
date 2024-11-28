<?php
    class GioHang{
        public $conn;
        public function __construct(){
            $this->conn = connectDB();
        }
        public function getAllGioHang($tai_khoan_id){
            try{
                $sql = 'SELECT gio_hangs.*, chi_tiet_gio_hangs.*,chi_tiet_gio_hangs.id as id_chi_tiet_gio_hang, san_phams.ten_san_pham, san_phams.hinh_anh,san_phams.gia_san_pham,san_phams.gia_khuyen_mai
                FROM gio_hangs INNER JOIN chi_tiet_gio_hangs ON gio_hangs.id = chi_tiet_gio_hangs.gio_hang_id 
                INNER JOIN san_phams ON chi_tiet_gio_hangs.san_pham_id = san_phams.id
                WHERE tai_khoan_id = :tai_khoan_id
                ';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':tai_khoan_id'=>$tai_khoan_id]);
                return $stmt->fetchAll();
            }catch(PDOException $e){
                echo 'Lỗi: '.$e->getMessage();
            }
        }
        public function giam($san_pham_id){
            try{
                $sql = 'UPDATE chi_tiet_gio_hangs SET so_luong = so_luong - 1 WHERE san_pham_id=:id';
                $stmt = $this->conn->prepare($sql);
                $stmt ->execute([':id'=>$san_pham_id]);
                return true;
            }catch(PDOException $e){
                echo 'Lỗi: '.$e->getMessage();
            }
        }
        public function tang($san_pham_id){
            try{
                $sql = 'UPDATE chi_tiet_gio_hangs SET so_luong = so_luong + 1 WHERE san_pham_id=:id';
                $stmt = $this->conn->prepare($sql);
                $stmt ->execute([':id'=>$san_pham_id]);
                return true;
            }catch(PDOException $e){
                echo 'Lỗi: '.$e->getMessage();
            }
        }
        public function checkGioHang($tai_khoan_id){
            try{
                $sql = 'SELECT gio_hangs.* FROM gio_hangs WHERE tai_khoan_id=:tai_khoan_id';
                $stmt = $this->conn->prepare($sql);
                $stmt ->execute([':tai_khoan_id'=>$tai_khoan_id]);
                return $stmt->fetch();
            }catch(PDOException $e){
                echo 'Lỗi: '.$e->getMessage();
            }
        }
        public function checkChiTiet($gio_hang_id){
            try{
                $sql = 'SELECT chi_tiet_gio_hangs.* FROM chi_tiet_gio_hangs WHERE gio_hang_id=:gio_hang_id';
                $stmt = $this->conn->prepare($sql);
                $stmt ->execute([':gio_hang_id'=>$gio_hang_id]);
                return $stmt->fetch();
            }catch(PDOException $e){
                echo 'Lỗi: '.$e->getMessage();
            }
        }
        public function checkSanPham($san_pham_id){
            try{
                $sql = 'SELECT chi_tiet_gio_hangs.* FROM chi_tiet_gio_hangs WHERE san_pham_id=:san_pham_id';
                $stmt = $this->conn->prepare($sql);
                $stmt ->execute([':san_pham_id'=>$san_pham_id]);
                return $stmt->fetch();
            }catch(PDOException $e){
                echo 'Lỗi: '.$e->getMessage();
            }
        }   
        public function addGioHang($tai_khoan_id){
            try{
                $sql = 'INSERT INTO gio_hangs(tai_khoan_id) VALUES (:tai_khoan_id)';
                $stmt = $this->conn->prepare($sql);
                $stmt ->execute([':tai_khoan_id'=>$tai_khoan_id]);
                return true;
            }catch(PDOException $e){
                echo 'Lỗi: '.$e->getMessage();
            }
        }
        public function addChiTietGioHang($gio_hang_id,$san_pham_id,$so_luong){
            try{
                $sql = 'INSERT INTO chi_tiet_gio_hangs(gio_hang_id,san_pham_id,so_luong) VALUES (:gio_hang_id,:san_pham_id,:so_luong)';
                $stmt = $this->conn->prepare($sql);
                $stmt ->execute([':gio_hang_id'=>$gio_hang_id,':san_pham_id'=>$san_pham_id,':so_luong'=>$so_luong]);
                return true;
            }catch(PDOException $e){
                echo 'Lỗi: '.$e->getMessage();
            }
        }
        public function deleteSanPham($id_gio_hang){
            try{
                $sql = 'DELETE FROM chi_tiet_gio_hangs WHERE id=:id';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':id'=>$id_gio_hang]);
                return true;
            }catch(PDOException $e){
                echo 'Lỗi: '.$e->getMessage();
            }
        }
        public function deleteGioHang($id_tai_khoan){
            try{
                $sql = 'DELETE FROM gio_hangs WHERE tai_khoan_id=:tai_khoan_id';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':tai_khoan_id'=>$id_tai_khoan]);
                return true;
            }catch(PDOException $e){
                echo 'Lỗi: '.$e->getMessage();
            }
        }
        public function deleteChiTietGioHang($id){
            try{
                $sql = 'DELETE FROM chi_tiet_gio_hangs WHERE gio_hang_id=:id';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':id'=>$id]);
                return true;
            }catch(PDOException $e){
                echo 'Lỗi: '.$e->getMessage();
            }
        }
        
    }
 ?>