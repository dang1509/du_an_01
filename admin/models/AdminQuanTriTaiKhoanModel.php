<?php
    class QuanTri{
        public $conn;

        public function __construct(){
            $this->conn = connectDB();
        }
        public function getAllQuanTri(){
            try{
                $sql = "SELECT tai_khoans.* FROM tai_khoans ";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
            }catch(PDOException $e){
                echo "Lỗi: ".$e->getMessage();
            }
        }
    }
?>