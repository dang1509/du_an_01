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
            <h1>Admin Bình Luận</h1>
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
                        <?php foreach($listBinhLuan as $key=>$item): ?>
                            <tr>
                            <td><?= $key+1 ?></td>
                            <td><?= $item['san_pham_id'] ?></td>
                            <td><?= $item['tai_khoan_id'] ?></td>
                            <td><?= $item['noi_dung'] ?></td>
                            <td><?= $item['ngay_dang'] ?></td>
                            <td><?= $item['trang_thai'] === 1 ? 'hiện' : 'ẩn'    ?></td>
                            <td>
                                <button class="btn btn-warning">
                                <a href="?act=trang-thai&id=<?php echo htmlspecialchars($item['id']) ?>">
                                <?php echo $item['trang_thai'] ? 'Ẩn' : 'Hiện' ?>
                                </a>
                                </button>
                            </td>
                            </tr>
                        <?php endforeach;?>
                      
                  </tbody>
                        </table>
                       
                 


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