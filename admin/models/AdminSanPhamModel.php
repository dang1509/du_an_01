<?php
    class SanPham{
        public $conn;

        public function __construct(){
            $this->conn = connectDB();
        }
        public function getAllSanPham(){
            try{
                $sql = "SELECT san_phams.* FROM san_phams ";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
            }catch(PDOException $e){
                echo "Lỗi: ".$e->getMessage();
            }
        }
    }
?>