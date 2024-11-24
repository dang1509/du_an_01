<?php include "./views/layout/header.php" ?>
<?php include "./views/layout/navbar.php" ?>
<div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Giỏ Hàng</h1>
            <div class="d-inline-flex">
                <p class="m-0">Trang chủ</p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Giỏ Hàng</p>
            </div>
        </div>
</div>
<!-- Cart Start -->
<div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php foreach($gioHang as $key=>$item): ?>
                        <tr>
                            <td class="align-middle"><img src="<?= $item['hinh_anh'] ?>" alt="" style="width: 50px;"> <?= $item['ten_san_pham'] ?></td>
                            <td class="align-middle don-gia"><?php if($item['gia_khuyen_mai'] != 0){ echo number_format($item['gia_khuyen_mai'],0,',','.');}else{ echo number_format($item['gia_san_pham'],0,',','.');} ?> VND</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <a href="?act=giam-so-luong&id_gio_hang=<?= $item['id_chi_tiet_gio_hang']?>">
                                        <button class="btn btn-sm btn-primary btn-minus" <?php if($item['so_luong'] === 1){echo 'disabled';} ?>>
                                        <i class="fa fa-minus"></i>
                                        </button>
                                        </a>
                                    </div>
                                    <input type="number" class="form-control form-control-sm bg-secondary text-center so-luong" value="<?= $item['so_luong'] ?>" name="so_luong">
                                    <div class="input-group-btn">
                                        <a href="?act=tang-so-luong&id_gio_hang=<?= $item['id']?>">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                        </a>       
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle tong-tien" id="tong-tien-<?= $key ?>"><?php if($item['gia_khuyen_mai'] != 0){ echo 
                                 number_format($item['so_luong']*$item['gia_khuyen_mai'],0,',','.');}
                                 else{ echo number_format($item['so_luong']*$item['gia_san_pham'],0,',','.');} ?> VND</td>
                            <td class="align-middle"><button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
                            
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Mã voucher">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Áp dụng voucher</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Hóa đơn</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Tổng tiền</h6>
                            <h6 class="font-weight-medium" id="thanh-tien"></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Giảm giá</h6>
                            <h6 class="font-weight-medium">0</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Thành tiền</h5>
                            <h5 class="font-weight-bold"></h5>
                        </div>
                        <button class="btn btn-block btn-primary my-3 py-3">Thanh Toán</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

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