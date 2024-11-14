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

<!-- Default box -->
<div class="card card-solid">
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-sm-6">
        <h3 class="d-inline-block d-sm-none">Chi tiết sản phẩm</h3>
        <div class="col-12">
          <img style="width:500px; height:400px" src="<?= BASE_URL.$SanPham['hinh_anh'] ?>" class="product-image" alt="Product Image">
        </div>
        <div class="col-12 product-image-thumbs">
            <?php foreach($listAnhSanPham as $key=>$anhSP): ?>
          <div class="product-image-thumb <?= $anhSP[$key] == 0 ? 'active' : '' ?>"  ><img src="<?= BASE_URL.$anhSP['link_hinh_anh']?>" alt="Product Image"></div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="col-12 col-sm-6">
        <h3 class="my-3"><?= $SanPham['ten_san_pham'] ?></h3>
        <p><?= $SanPham['mo_ta'] ?></p>

        <hr>
        <h5 class="mb-3">Danh mục: <small><?= $SanPham['ten_danh_muc']?></small></h5>
        <h5 class="mb-3">Số lượng: <small><?= $SanPham['so_luong']?></small></h5>
        <h5 class="mb-3">Lượt xem: <small><?= $SanPham['luot_xem']?></small></h5>
        <h5 class="mb-3">Ngày nhập hàng: <small><?= $SanPham['ngay_nhap']?></small></h5>
        <h5 class="mb-3">Chất liệu: <small><?= $SanPham['chat_lieu']?></small> <</h5>
        <h5 class="mb-3 <?= $item['trang_thai'] == 1 ?'text-danger':'text-success' ?>">Trạng thái: <?= $SanPham['trang_thai']== 1 ?'Còn hàng':'Hết hàng' ?></h5>

        <div class="bg-gray py-1 px-1 mt-1">
          <h2 class="mb-0">
            Giá tiền: <?= $SanPham['gia_san_pham'] ?>
          </h2>
          <h4 class="mt-0">
            <small>Giá khuyến mãi: <?= $SanPham['gia_san_pham'] ?> </small>
          </h4>
        </div>
    </div>
    </div>
    <div class="row mt-4">
      <nav class="w-100">
        <div class="nav nav-tabs" id="product-tab" role="tablist">
          <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Bình luận của sản phẩm  </a>
          
        </div>
      </nav>
      <div class="tab-content p-3" id="nav-tabContent">
        <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> 
            <table class="table table-striped table-hover">
                <thead>
                    <th>STT</th>
                    <th>Tên người bình luận</th>
                    <th>Nội dung</th>
                    <th>Ngày đăng</th>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
    </div>
      </div>
    </div>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

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

<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })

</script>
</body>
</html>