<?php
    class TaiKhoan{
        public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
    public function getAllTaiKhoan($chuc_vu_id){
        try{
            $sql = 'SELECT * FROM tai_khoans WHERE chuc_vu_id=:chuc_vu_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['chuc_vu_id'=>$chuc_vu_id]);
            return $stmt->fetchAll();
        }catch(PDOException $e){
            echo 'Lỗi: '. $e->getMessage();
        }  
    }
    public function addTaiKhoan($ho_ten,$email,$so_dien_thoai,$password,$chuc_vu_id){
        try{
            $sql = "INSERT INTO tai_khoans(ho_ten,email,so_dien_thoai,mat_khau,chuc_vu_id) VALUES (:ho_ten,:email,:so_dien_thoai,:mat_khau,:chuc_vu_id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':ho_ten'=>$ho_ten,':email'=>$email,':so_dien_thoai'=>$so_dien_thoai,':mat_khau'=>$password,':chuc_vu_id'=>$chuc_vu_id]);
            return true;
        }catch(PDOException $e){
            echo 'Lỗi: '. $e->getMessage();
        }
    }
    public function getOneQuanTri($id){
        try{
            $sql = "SELECT * FROM tai_khoans WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id'=>$id]);
            return $stmt->fetch();
        }catch(PDOException $e){
            echo 'Lỗi: '. $e->getMessage();
        }
    }
    public function updateQuanTri($id,$ho_ten,$email,$so_dien_thoai,$ngay_sinh,$gioi_tinh,$mat_khau,$trang_thai,$dia_chi,$anh_dai_dien){
        try{
            $sql = "UPDATE tai_khoans SET ho_ten =:ho_ten 
            ,email=:email
            ,so_dien_thoai=:so_dien_thoai,
            ngay_sinh=:ngay_sinh,
            gioi_tinh=:gioi_tinh,
            mat_khau=:mat_khau,
            trang_thai=:trang_thai,
            dia_chi=:dia_chi,
            anh_dai_dien=:anh_dai_dien
             
            WHERE id=:id";
             
            $stmt = $this->conn->prepare($sql);   
            $stmt->execute([':ho_ten'=>$ho_ten,':email'=>$email,
                            ':so_dien_thoai'=>$so_dien_thoai,':ngay_sinh'=>$ngay_sinh,
                            ':gioi_tinh'=>$gioi_tinh,
                            ':mat_khau'=>$mat_khau,
                            ':trang_thai'=>$trang_thai,
                            ':dia_chi'=>$dia_chi,
                            ':anh_dai_dien'=>$anh_dai_dien,
                            ':id'=>$id
        ]);
            
            return true;
        }catch(PDOException $e){
            echo 'Lỗi: '. $e->getMessage();
        }
    }
    public function getOneKhachHang($id){
        try{
            $sql = "SELECT * FROM tai_khoans WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id'=>$id]);
            return $stmt->fetch();
        }catch(PDOException $e){
            echo 'Lỗi: '. $e->getMessage();
        }
    }
    public function updateKhachHang($id,$ho_ten,$email,$so_dien_thoai,$ngay_sinh,$gioi_tinh,$mat_khau,$trang_thai,$dia_chi,$anh_dai_dien){
        try{
            $sql = "UPDATE tai_khoans SET ho_ten =:ho_ten 
            ,email=:email
            ,so_dien_thoai=:so_dien_thoai
            ,ngay_sinh=:ngay_sinh,
            gioi_tinh=:gioi_tinh,
            mat_khau=:mat_khau,
            trang_thai=:trang_thai,
            dia_chi=:dia_chi,
            anh_dai_dien=:anh_dai_dien
             
            WHERE id=:id";
            //  var_dump($anh_dai_dien);die();
            $stmt = $this->conn->prepare($sql);   
            $stmt->execute([':ho_ten'=>$ho_ten,':email'=>$email,
                            ':so_dien_thoai'=>$so_dien_thoai,':ngay_sinh'=>$ngay_sinh,
                            ':gioi_tinh'=>$gioi_tinh,
                            ':mat_khau'=>$mat_khau,
                            ':trang_thai'=>$trang_thai,
                            ':dia_chi'=>$dia_chi,
                            ':anh_dai_dien'=>$anh_dai_dien,
                            ':id'=>$id
        ]);
            
            return true;
        }catch(PDOException $e){
            echo 'Lỗi: '. $e->getMessage();
        }
    }
    
    }
?>