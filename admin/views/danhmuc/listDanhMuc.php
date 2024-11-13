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
            <a href="?act=add"  class="btn btn-primary" >Thêm</a></td>
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
                    <th>Tên Danh Mục</th>
                    <th>Mô Tả</th>
                    <th>Hành Động</th>
                   
                  </tr>
                  </thead>    
                  <tbody>
                        <?php foreach($listDanhMuc as $key=>$item): ?>
                            <tr>
                            <td><?= $key+1 ?></td>
                            <td><?= $item['ten_danh_muc'] ?></td>
                            <td><?= $item['mo_ta'] ?></td>
                          
                            <td> <button class="btn btn-warning"> <a href="?act=update&id=<?php echo $item['id'] ?>">Sửa</a></button>
                            <button class="btn btn-danger"><a onclick="return confirm('ban muon xoa k ') "href="?act=delete&id=<?php echo $item['id'] ?>">Xóa</a></button>
                          
                            </tr>
                        <?php endforeach;?>
                      
                  </tbody>
                        </table>
                        <!-- <a href="?act=add"  class="btn btn-primary" >Thêm</a></td> -->
                 


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