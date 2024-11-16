<?php
require_once './views/layout/header.php';
require_once './views/layout/navbar.php';
require_once './views/layout/sidebar.php';
?>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lí tài khoản khách hàng</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-6">
            <img src="<?php echo BASE_URL.$khachHang['anh_dai_dien'] ?>" style="width:70%" alt="" >
          </div>
          <div class="col-6">
            <table class="table table-borderless">
                <tbody style="font-size:large">
                    <tr>
                        <th>Họ tên</th>
                        <td><?= $khachHang['ho_ten']??''?></td>
                    </tr>
                    <tr>
                        <th>Ngày sinh</th>
                        <td><?= $khachHang['ngay_sinh']??''?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?= $khachHang['email']??''?></td>
                    </tr>
                    <tr>
                        <th>Số điện thoại</th>
                        <td><?= $khachHang['so_dien_thoai']??''?></td>
                    </tr>
                    <tr>
                        <th>Giới tính</th>
                        <td><?= $khachHang['gioi_tinh']==1?'Nam':'Nữ'?></td>
                    </tr>
                    <tr>
                        <th>Địa chỉ</th>
                        <td><?= $khachHang['dia_chi']??''?></td>
                    </tr>
                    <tr>
                        <th>Trạng thái</th>
                        <td><?= $khachHang['trang_thai']==1?'Hoạt động':'Vô hiệu hóa'?></td>
                    </tr>
                </tbody>
            </table>
          </div>
          <div class="col-12">
            <hr>
            <h2>
                Lịch sử mua hàng
            </h2>
            <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Tên người nhận</th>
                    <th>Số điện thoại</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($listDonHang as $key=>$item):?>
                      <tr>
                      <td><?= $key+1 ?></td>
                      <td><?= $item['ma_don_hang']?></td>  
                      <td><?= $item['ten_nguoi_nhan']?></td>
                      <td><?= $item['sdt_nguoi_nhan']?></td>
                      <td><?= $item['ngay_dat']?></td>
                      <td><?= $item['tong_tien']?></td>
                      <td><?= $item['ten_trang_thai'] ;?></td>
                      <td>
                        <a href="<?= BASE_URL_ADMIN.'?act=chi-tiet-don-hang&id_don_hang='.$item['id']?>"><button class="btn btn-warning">Chi tiết</button></a>
                        <a href="<?= BASE_URL_ADMIN.'?act=form-sua-don-hang&id_don_hang='.$item['id']?>"><button class="btn btn-danger" >Sửa</button></a>
                      </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                  
                </table>
          </div>
          <div class="col-12">
            <hr>
            <h2>
                Bình luận
            </h2>
            <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Sản phẩm được bình luận</th>
                    <th>Nội dung</th>
                    <th>Ngày đăng</th>
                    <th>Trạng thái</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($listBinhLuan as $key=>$item):?>
                      <tr>
                      <td><?= $key+1 ?></td>
                      <td><?= $item['ten_san_pham']?></td>
                      <td><?= $item['noi_dung']?></td>
                      <td><?= $item['ngay_dang']?></td>
                      <td><?= $item['trang_thai'] == 1 ?'Hiện' :'Ẩn';?></td>
                      
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                  
                </table>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php
require_once './views/layout/footer.php';
 ?>
 <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    }); 
  });
</script>