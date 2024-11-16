
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
          <div class="col-sm-6">
            <h1>Quản lí bình luận</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Sản phẩm được bình luận</th>
                    <th>Người bình luận</th>
                    <th>Nội dung</th>
                    <th>Ngày đăng</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($listBinhLuan as $key=>$item):?>
                      <tr>
                      <td><?= $key+1 ?></td>
                      <td><?= $item['ten_san_pham']?></td>
                      <td><?= $item['ho_ten']?></td>
                      <td><?= $item['noi_dung']?></td>
                      <td><?= $item['ngay_dang']?></td>
                      <td><?= $item['trang_thai'] == 1 ?'Hiện' :'Ẩn';?></td>
                      <td>
                        <a href="<?= BASE_URL_ADMIN.'?act=update-binh-luan&id_binh_luan='.$item['id']?>"><button class="btn btn-warning" onclick="confirm('Bạn có muốn ẩn bình luận không?')">
                            <?php echo $item['trang_thai']==1?"Ẩn":"Bỏ ẩn" ?>
                        </button></a>
                      </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Sản phẩm được bình luận</th>
                    <th>Người bình luận</th>
                    <th>Nội dung</th>
                    <th>Ngày đăng</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
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
   
  });
</script>
</body>
</html>
