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
    function insert_taikhoan($name, $email, $pass, $diachi,$chuc_vu_id) {
        try{
            $sql = "INSERT INTO tai_khoans(ho_ten,email,mat_khau,dia_chi,chuc_vu_id) VALUES (:ho_ten,:email,:mat_khau,:dia_chi,:chuc_vu_id)";
            $stmt = $this->conn->prepare($sql);;
            $stmt->execute([':ho_ten'=>$name,':email'=>$email,':mat_khau'=>$pass,'dia_chi'=>$diachi,'chuc_vu_id'=>$chuc_vu_id]);
            return true;
        }
        catch(PDOException $e){
            echo "Lỗi: ".$e->getMessage();
        }
        ;
       
    }
    function login($user, $pass)
    {
        $sql = "SELECT * FROM tai_khoans WHERE email='$user' AND mat_khau='$pass'";
        return $this->conn->query($sql)->fetch();
    }

    public function getOneTaiKhoan($id){
        try{
            $sql = 'SELECT * FROM tai_khoans WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id'=>$id]);
            return $stmt->fetch();
        }catch(PDOException $e){
            echo 'Lỗi: '.$e->getMessage();
        }
    }
}

?>
