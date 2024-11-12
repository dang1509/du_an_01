<?php
class BinhLuan{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();

    }
    public function getAllBinhLuan(){
        try{
            $sql = "SELECT * FROM binh_luans";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(PDOException $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }
    function findId($id){
        $sql = "SELECT * FROM binh_luans where id=$id";
        return $this->conn->query($sql)->fetch();
    }
    public function updateTrangThai($id, $trangThai) {
        $sql = "UPDATE binh_luans SET trang_thai = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$trangThai, $id]);
        return $stmt->rowCount() > 0;
    }
}

?>