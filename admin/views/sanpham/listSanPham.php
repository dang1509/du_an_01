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
            <h1>Quản lí sản phẩm</h1>
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
                <a href="<?= BASE_URL_ADMIN.'?act=form-them-san-pham';?>">
              <button class="btn btn-success">Thêm sản phẩm</button>
              </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">   
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Giá tiền</th>
                    <th>Trạng thái</th> 
                    <th>Thao tác</th>
                  </tr>
                  </thead>    
                  <tbody>
                        <?php foreach($listSanPham as $key=>$item): ?>
                            <tr>
                            <td><?= $key+1 ?></td>
                            <td><?= $item['ten_san_pham'] ?></td>
                            <td><img src="<?= BASE_URL.$item['hinh_anh'] ?>" alt="" style="width:100px; height: 100px;"></td>
                            <td><?= $item['ten_danh_muc']?></td>
                            <td><?= $item['gia_san_pham'] ?></td>
                            <td><?= $item['trang_thai']==1 ?'Còn hàng':'Hết hàng' ?></td>
                            <td>
                             <a href="<?= BASE_URL_ADMIN.'?act=form-edit-san-pham&id_san_pham='.$item['id']?>"><button class="btn btn-warning">Sửa</button></a> 
                            <a href="<?= BASE_URL_ADMIN.'?act=xoa-san-pham&id_san_pham='.$item['id']?>" onclick="confirm('Bạn chắc chắn muốn xóa sản phẩm này?')"><button class="btn btn-danger">Xóa</button></a> 
                           <a href="<?= BASE_URL_ADMIN.'?act=chi-tiet-san-pham&id_san_pham='.$item['id']?>"><button class="btn btn-info">Chi tiết</button></a></td>
                            </tr>
                        <?php endforeach;?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Giá tiền</th>
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
      </div>
    
    <!-- /.content -->
 
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  
  


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