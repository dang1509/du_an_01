<?php 
class taiKhoan{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
    public function getAlltaiKhoan(){
        try{
            $sql = "SELECT * FROM tai_khoans WHERE id != 0";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(PDOException $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }
    function insert_taikhoan($name, $email, $pass, $diachi) {
        $sql = "INSERT INTO tai_khoans VALUES (null, '$name', null, null,'$email', null, null, '$diachi', '$pass',null,'1')";
        return $this->conn->prepare($sql)->execute();
    }
    function login($user, $pass)
    {
        $sql = "SELECT * FROM tai_khoans WHERE email='$user' AND mat_khau='$pass'";
        return $this->conn->query($sql)->fetch();
    }

}

?>
