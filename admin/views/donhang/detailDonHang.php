
<?php include './views/layout/header.php'; ?>
  <!-- Navbar -->
  <?php include './views/layout/navbar.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include './views/layout/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Quản lí danh sách đơn hàng- Đơn hàng: <?php echo $donHang['ma_don_hang'] ?></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <?php
            if($donHang['trang_thai_id']==1){
                $colorAlert = 'primary';
            }elseif($donHang['trang_thai_id']>=2 &&$donHang['trang_thai_id']<=4){
                $colorAlert = 'warning';
            }elseif($donHang['trang_thai_id']>=5 &&$donHang['trang_thai_id']<=6){
                $colorAlert = 'success';
            }else{
                $colorAlert = 'danger';
            }
             ?>
            <div class="alert alert-<?= $colorAlert;?>" role="alert">
              Đơn hàng: <?php echo $donHang['ten_trang_thai'] ?>
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Jewelry
                    <small class="float-right">Ngày đặt: <?= $donHang['ngay_dat']?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Thông tin người nhận 
                  <address>
                    <strong><?= $donHang['ho_ten']?></strong><br>
                    Địa chỉ: <?= $donHang['dia_chi']?><br>
                    Số điện thoại: <?= $donHang['so_dien_thoai']?><br>
                    Email: <?= $donHang['email']?>
                  </address>
                </div>
                <!-- /.col -->
                
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Thông tin đơn hàng  
                  <address>
                    <strong>Mã đơn hàng: <?= $donHang['ma_don_hang']?></strong><br>
                    Phương thức thanh toán: <?= $donHang['ten_phuong_thuc']?><br>
                    Ghi chú: <?= $donHang['ghi_chu']?>
                  </address>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Thứ tự</th>
                      <th>Tên sản phẩm</th>
                      <th>Đơn giá </th>
                      <th>Số lượng</th>
                      <th>Thành tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $tong_tien = 0; ?>
                    <?php foreach($sanPhamDonHang as $key=>$sanPham) :?>
                        <tr>
                            <td><?=$key +1?></td>
                            <td><?=$sanPham['ten_san_pham']?></td>
                            <td><?=$sanPham['don_gia']?></td>
                            <td><?=$sanPham['so_luong']?></td>
                            <td><?=$sanPham['don_gia']*$sanPham['so_luong']?></td> 
                        </tr>
                        <?php $tong_tien +=  $sanPham['thanh_tien'];?>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Hóa đơn</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Thành tiền:</th>
                        <td><?php echo $tong_tien;?> VND</td>
                      </tr>                   
                      <tr>
                        <th>Phí ship:</th>
                        <td><?php $phiShip = ''; if($donHang['dia_chi']==="Hà Nội"){ $phiShip = 0 ;} else {$phiShip = 20 ;}  ?><?= $phiShip ?></td>
                      </tr>
                      <tr>
                        <th>Tổng tiền:</th>
                        <td><?php echo $tong_tien+ $phiShip; ?> VND</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <?php include './views/layout/footer.php';?>
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
</body>
</html>
