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
              <!-- /.card-header -->
              <div class="card-body">
               
              <form action="<?php echo BASE_URL_ADMIN.'?act=add' ?>" method="post">
  <div class="mb-3">
    <label for="tenDanhMuc" class="form-label">Tên Danh Mục</label>
    <input type="text" class="form-control" id="tenDanhMuc" name="ten_danh_muc">
    <?php if(isset($_SESSION['error']['ten_danh_muc'])){ ?>
          <p class="text-danger"><?= $_SESSION['error']['ten_danh_muc'] ?></p>
     <?php   }  ?>
  </div>
  <div class="mb-3">
    <label for="moTa" class="form-label">Mô Tả</label>
    <input type="text" class="form-control" id="moTa" name="mo_ta">
   
  </div>
  <button type="submit" class="btn btn-primary" name="btn_insert">Submit</button>
</form>

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