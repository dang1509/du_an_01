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
            <h1>Quản lí tài khoản quản trị</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm tài khoản quản trị</h3>
              </div>
              
              <form action="<?= BASE_URL_ADMIN.'?act=them-quan-tri' ?>" method="post" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Họ tên</label>
                    <input type="text" class="form-control" name="ho_ten" placeholder="Nhập họ tên">
                    <?php if(isset($_SESSION['error']['ho_ten'])){ ?>
                        <p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
                 <?php   }
                     ?>
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Nhập email">
                    <?php if(isset($_SESSION['error']['email'])){ ?>
                        <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                 <?php   }
                     ?>
                  </div>     
                  <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control" name="so_dien_thoai" placeholder="Nhập số điện thoại">
                    <?php if(isset($_SESSION['error']['so_dien_thoai'])){ ?>
                        <p class="text-danger"><?= $_SESSION['error']['so_dien_thoai'] ?></p>
                 <?php   }
                     ?>
                  </div>  
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
<?php
require_once './views/layout/footer.php';
 ?>