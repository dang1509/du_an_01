<?php 

class TrangChu
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    
    public function getAllDanhMuc(){
        try{
            $sql = "SELECT * FROM danh_mucs WHERE id != 0";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(PDOException $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }
   

   
    
}