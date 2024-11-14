<?php
class SanPham
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function AllSanPham()
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams INNER JOIN danh_mucs ON san_phams.danh_muc_id= danh_mucs.id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }

    }
    public function ThemSanPham($ten_san_pham, $chat_lieu, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $hinh_anh)
    {
        try {
            $sql = "INSERT INTO san_phams(ten_san_pham,chat_lieu,gia_san_pham,gia_khuyen_mai,so_luong,ngay_nhap,danh_muc_id,trang_thai,mo_ta,hinh_anh) VALUES (:ten_san_pham,:chat_lieu,:gia_san_pham,:gia_khuyen_mai,:so_luong,:ngay_nhap,:danh_muc_id,:trang_thai,:mo_ta,:hinh_anh)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_san_pham' => $ten_san_pham,
                ':gia_san_pham' => $gia_san_pham,
                ':chat_lieu' => $chat_lieu,
                ':gia_khuyen_mai' => $gia_khuyen_mai,
                ':so_luong' => $so_luong,
                ':ngay_nhap' => $ngay_nhap,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai,
                ':mo_ta' => $mo_ta,
                ':hinh_anh' => $hinh_anh
            ]);
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh)
    {
        try {
            $sql = "INSERT INTO hinh_anh_san_phams(san_pham_id,link_hinh_anh) VALUES (:san_pham_id,:link_hinh_anh)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':san_pham_id' => $san_pham_id,
                ':link_hinh_anh' => $link_hinh_anh,

            ]);
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function getOneSanPham($id)
    {
        try {
            $sql = 'SELECT san_phams.* FROM san_phams WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function getAlbumAnhSanPham($id)
    {
        try {
            $sql = 'SELECT hinh_anh_san_phams.* FROM hinh_anh_san_phams WHERE san_pham_id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function EditSanPham($san_pham_id, $ten_san_pham, $chat_lieu, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $hinh_anh)
    {
        try {
            $sql = "UPDATE san_phams SET ten_san_pham = :ten_san_pham,
                chat_lieu = :chat_lieu,
                gia_san_pham = :gia_san_pham,
                gia_khuyen_mai = :gia_khuyen_mai,
                so_luong=:so_luong,
                ngay_nhap=:ngay_nhap,
                danh_muc_id=:danh_muc_id,
                trang_thai = :trang_thai,
                mo_ta=:mo_ta,
                hinh_anh = :hinh_anh WHERE id=:id ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_san_pham' => $ten_san_pham,
                ':gia_san_pham' => $gia_san_pham,
                ':chat_lieu' => $chat_lieu,
                ':gia_khuyen_mai' => $gia_khuyen_mai,
                ':so_luong' => $so_luong,
                ':ngay_nhap' => $ngay_nhap,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai,
                ':mo_ta' => $mo_ta,
                ':hinh_anh' => $hinh_anh,
                ':id' => $san_pham_id
            ]);
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function getDetailAnhSanPham($id)
    {
        try {
            $sql = 'SELECT hinh_anh_san_phams.* FROM hinh_anh_san_phams WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function updateAnhSanPham($id, $new_file)
    {
        try {
            $sql = "UPDATE hinh_anh_san_phams SET link_hinh_anh = :link_hinh_anh,
                 WHERE id=:id ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':link_hinh_anh' => $new_file,
                ':id' => $id

            ]);
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function destroyAnhSanPham($id)
    {
        try {
            $sql = 'DELETE FROM hinh_anh_san_phams WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id'=>$id]);
            return true;

        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
}
?>