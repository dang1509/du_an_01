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
        $sql_one="DELETE FROM danh_mucs where id=$id";
        $result=$this->conn->prepare($sql_one);
        return $result->execute();

    }
    function insert($tenDanhMuc,$mota){
        $sql_one="INSERT INTO danh_mucs (ten_danh_muc,mo_ta) VALUES ('$tenDanhMuc' ,'$mota') " ;
        $result=$this->conn->prepare($sql_one);
        return $result->execute();
    }
    function update($id,$tenDanhMuc,$mota){
        $sql="update danh_mucs set ten_danh_muc='$tenDanhMuc',mo_ta='$mota' where id='$id'";
        return $this->conn->prepare($sql)->execute();

    }
    function getOneDanhMuc($id){
        try{
            $sql = "SELECT * FROM danh_mucs WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id'=>$id]);
            return $stmt->fetch();
        }catch(PDOException $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }


}

?>
 