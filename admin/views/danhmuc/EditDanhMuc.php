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
            <h1>Quản lí Danh Mục</h1>
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
               
              <form action="<?= BASE_URL_ADMIN.'?act=update' ?>" method="post">
              <input type="hidden" name="id" value="<?= $danhMuc['id']?>" >

  <div class="mb-3">
    <label for="tenDanhMuc" class="form-label">Tên Danh Mục</label>
    <input type="text" class="form-control" id="tenDanhMuc" name="ten_danh_muc" value="<?= $danhMuc['ten_danh_muc']?>">
    <?php if(isset($error['ten_danh_muc'])){ ?>
                        <p class="text-danger"><?= $error['ten_danh_muc'] ?></p>
                 <?php   }
                     ?>
  </div>
  <div class="mb-3">
    <label for="moTa" class="form-label">Mô Tả</label>
    <input type="text" class="form-control" id="moTa" name="mo_ta" value="<?= $danhMuc['mo_ta']?>">
   
  </div>
  <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
</form>
</div>        
          </div>
        </div>
      </div>
    </section>
  </div>
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