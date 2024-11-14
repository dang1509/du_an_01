<style>
  .table-striped td{
  max-width:650px;}
</style>

<?php include './views/layout/header.php'; ?>
  <!-- Navbar -->
  <?php include './views/layout/navbar.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include './views/layout/sidebar.php'; ?>
     <!-- Main content -->
      <div class="content-wrapper">
      <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin Danh Mục</h1>
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
       
            <!-- /.card -->
            <div class="card">
            <div class="card-header">
                <a href="<?= BASE_URL_ADMIN.'?act=form-them-danh-muc';?>">
            
              </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">   
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Mã Voucher</th>
                    <th>Giảm giá</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th>Số lượng</th>
                    <th>Trạng thái</th>
                 
                   
                  </tr>
                  </thead>    
                  <tbody>
                        <?php foreach($vouchers as $key=>$item): ?>
                            <tr>
                            <td><?= $key+1;?></td>
                            <td><?= $item['ma_voucher']?></td>
                            <td><?= $item['giam_gia']?></td>
                            <td><?= $item['ngay_bat_dau']?></td>
                            <td><?= $item['ngay_ket_thuc']?></td>
                            <td><?= $item['so_luong']?></td>
                            <td><?= $item['trang_thai'] == 1 ? 'Có hiệu lực' : 'Vô hiệu hóa' ?></td>
                            <td>   
                                <a href="?act=update_voucher&id=<?php echo htmlspecialchars($item['id']) ?>">
                                <button class="btn btn-warning">
                                <?php echo $item['trang_thai'] ? 'Vô hiệu hóa' : 'Có hiệu lực' ?></button>

                                </a>        
                            </td>
                          </tr>  
                        <?php endforeach;?>
                  </tbody>
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
      </div>
    
    <!-- /.content -->
 


  <?php include './views/layout/footer.php';?>
  <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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