<?php include "./views/layout/header.php" ?>
<?php include "./views/layout/navbar.php" ?>
<div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Thanh Toán</h1>
            <div class="d-inline-flex">
                <p class="m-0">Trang chủ</p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Thanh Toán</p>
            </div>
        </div>
</div>
    <form action="?act=post-thanh-toan" method="post">
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-6">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Thông tin người nhận hàng</h4>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label>Họ và tên người nhận</label>
                            <input class="form-control" type="text" value="<?= $taiKhoan['ho_ten'] ?>" name="ten_nguoi_nhan">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" value="<?= $taiKhoan['email'] ?>" name="email_nguoi_nhan">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control" type="text" value="<?= $taiKhoan['so_dien_thoai'] ?>" name="sdt_nguoi_nhan">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Địa chỉ người nhận</label>
                            <input class="form-control" type="text" value="<?= $taiKhoan['dia_chi'] ?>" name="dia_chi_nguoi_nhan">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Ghi chú</label>
                            <textarea name="ghi_chu" class="form-control" style="height:200px" placeholder="Ghi chú" ></textarea>
                        </div>
                        
                        
                        
                    </div>
                </div>
               
            </div>
            <div class="col-lg-6">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Hóa đơn</h4>
                    </div>
                    
                    
                    <div class="card-body">
                    <?php $tong_tien = 0 ?>
                        <h5 class="font-weight-medium mb-3">Sản Phẩm</h5>
                        <?php foreach($gioHang as $key=>$item): ?>
                        <div class="d-flex justify-content-between">
                            <p><?= $item['ten_san_pham'] ?></p> <p>x <?= $item['so_luong'] ?></p>
                            <input type="hidden" value="<?= $item['ten_san_pham'] ?>" name="ten_san_pham">
                            <input type="hidden" value="<?= $item['so_luong'] ?>" name="so_luong">
                            <?php if($item['gia_khuyen_mai'] != 0){ echo 
                                 number_format($item['so_luong']*$item['gia_khuyen_mai'],0,',','.');}
                                 else{ echo number_format($item['so_luong']*$item['gia_san_pham'],0,',','.');} ?> VND
                        </div>
                        <input type="hidden" value="<?php if($item['gia_khuyen_mai'] != 0){ echo 
                                 $item['so_luong']*$item['gia_khuyen_mai'];}
                                 else{ echo $item['so_luong']*$item['gia_san_pham'];} ?>" name="tien_san_pham">
                        <?php if($item['gia_khuyen_mai'] != 0){ $tong_tien += 
                                 $item['so_luong']*$item['gia_khuyen_mai'];}
                                 else{ $tong_tien+= $item['so_luong']*$item['gia_san_pham'];} ?> 
                        <?php endforeach; ?>
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Tổng tiền</h6>
                            <h6 class="font-weight-medium"><?php echo number_format($tong_tien,0,',','.') ?> VND</h6>
                            <input type="hidden" value="<?= $tong_tien ?>" name="tong_tien">
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Giảm giá</h6>
                            <h6 class="font-weight-medium"></h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Thành tiền</h5>
                            <h5 class="font-weight-bold"></h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Phương thức thanh toán</h4>
                    </div>
                    <div class="card-body">
                        <?php foreach($phuongThucThanhToan as $key=>$item): ?>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="ten_phuong_thuc" id="<?= $item['ten_phuong_thuc'] ?>" value="<?= $item['id'] ?>">
                                <label class="custom-control-label" for="<?= $item['ten_phuong_thuc'] ?>"><?= $item['ten_phuong_thuc'] ?></label>
                            </div>
                        </div>
                       <?php endforeach;?>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">ĐẶT HÀNG</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->

    </form>


<script>
    // Hàm cập nhật tổng tiền
function tinhTongTien() {
    let tongTien = 0;

    // Lấy tất cả các ô tổng tiền
    document.querySelectorAll('.tong-tien').forEach(function (element) {
        // Lấy giá trị và loại bỏ dấu "."
        let tien = parseInt(element.innerText.replace(/\./g, '').replace(' VND', ''), 10);
        tongTien += tien;
    });

    // Hiển thị tổng tiền
    document.getElementById('thanh-tien').innerText = tongTien.toLocaleString('vi-VN') + ' VND';
}

// Gọi hàm để tính tổng tiền ban đầu
tinhTongTien();

// Xử lý khi thay đổi số lượng
document.querySelectorAll('.so-luong').forEach(function (input) {
    input.addEventListener('input', function () {
        let index = this.getAttribute('data-index');
        let donGiaElement = document.querySelectorAll('.don-gia')[index];
        let tongTienElement = document.getElementById(`tong-tien-${index}`);

        // Lấy đơn giá và số lượng
        let donGia = parseInt(donGiaElement.innerText.replace(/\./g, '').replace(' VND', ''), 10);
        let soLuong = parseInt(this.value, 10) || 0;

        // Cập nhật tổng tiền cho sản phẩm đó
        let tongTien = donGia * soLuong;
        tongTienElement.innerText = tongTien.toLocaleString('vi-VN') + ' VND';

        // Cập nhật tổng tiền toàn bộ giỏ hàng
        tinhTongTien();
    });
});

</script>


<?php include "./views/layout/footer.php" ?>