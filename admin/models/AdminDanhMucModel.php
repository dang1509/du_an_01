<?php
class DanhMuc{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();

    }
    public function getAllDanhMuc(){
        try{
            $sql = "SELECT * FROM danhmuc";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(PDOException $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }

    function delete($id){
        $sql_one="DELETE FROM danhmuc where id=$id";
        $result=$this->conn->prepare($sql_one);
        return $result->execute();

    }

}

?>
 