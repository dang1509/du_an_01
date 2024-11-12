<?php
class DanhMuc{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();

    }
    public function getAllDanhMuc(){
        try{
            $sql = "SELECT * FROM danh_mucs";
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
    function insert($tenDanhMuc,$mota){
        $sql_one="INSERT INTO danhmuc (ten_danh_muc,mo_ta) VALUES ('$tenDanhMuc' ,'$mota') " ;
        $result=$this->conn->prepare($sql_one);
        return $result->execute();
    }
    function update($id,$tenDanhMuc,$mota){
        $sql="update danhmuc set ten_danh_muc='$tenDanhMuc',mo_ta='$mota' where id='$id'";
        return $this->conn->prepare($sql)->execute();

    }
    function findId($id){
        $sql = "SELECT * FROM danhmuc where id=$id";
        return $this->conn->query($sql)->fetch();
    }


}

?>
 