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
    function insert_taikhoan($name, $email, $pass,$so_dien_thoai, $diachi,$chuc_vu_id) {
        try{
            $sql = "INSERT INTO tai_khoans(ho_ten,email,mat_khau,so_dien_thoai,dia_chi,chuc_vu_id) VALUES (:ho_ten,:email,:mat_khau,:so_dien_thoai,:dia_chi,:chuc_vu_id)";
            $stmt = $this->conn->prepare($sql);;
            $stmt->execute([':ho_ten'=>$name,':email'=>$email,':mat_khau'=>$pass,':so_dien_thoai'=>$so_dien_thoai,'dia_chi'=>$diachi,'chuc_vu_id'=>$chuc_vu_id]);
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
    function getThongTin($id){
        try{
            $sql = "SELECT * FROM tai_khoans WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id'=>$id]);
            return $stmt->fetch();
        }catch(PDOException $e){
            echo "Lỗi: ".$e->getMessage();
        }
        ;
    }
    public function updateThongTin($id, $ho_ten, $email, $so_dien_thoai, $dia_chi, $anh_dai_dien = null){
        try{
            // If avatar is uploaded, add it to the update statement
            if ($anh_dai_dien) {
                $sql = "UPDATE tai_khoans SET ho_ten=:ho_ten, email=:email, so_dien_thoai=:so_dien_thoai, dia_chi=:dia_chi, anh_dai_dien=:anh_dai_dien WHERE id=:id";
            } else {
                $sql = "UPDATE tai_khoans SET ho_ten=:ho_ten, email=:email, so_dien_thoai=:so_dien_thoai, dia_chi=:dia_chi WHERE id=:id";
            }

            $stmt = $this->conn->prepare($sql);

            // If avatar is uploaded, bind the file path
            if ($anh_dai_dien) {
                $stmt->execute([
                    ':ho_ten' => $ho_ten,
                    ':email' => $email,
                    ':so_dien_thoai' => $so_dien_thoai,
                    ':dia_chi' => $dia_chi,
                    ':anh_dai_dien' => $anh_dai_dien,
                    ':id' => $id
                ]);
            } else {
                $stmt->execute([
                    ':ho_ten' => $ho_ten,
                    ':email' => $email,
                    ':so_dien_thoai' => $so_dien_thoai,
                    ':dia_chi' => $dia_chi,
                    ':id' => $id
                ]);
            }

            return true;
        } catch(PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}

?>
