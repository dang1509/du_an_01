<?php
    class QuanTri{
        public $conn;

        public function __construct(){
            $this->conn = connectDB();
        }
        public function getAllQuanTri(){
            try{
                $sql = "SELECT * FROM tai_khoans WHERE tai_khoans.chuc_vu_id = 1 ";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
            }catch(PDOException $e){
                echo "Lỗi: ".$e->getMessage();
            }
        }
        public function getAllKhach(){
            try{
                $sql = "SELECT * FROM tai_khoans WHERE tai_khoans.chuc_vu_id = 0 ";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
            }catch(PDOException $e){
                echo "Lỗi: ".$e->getMessage();
            }
        }

    }
?>