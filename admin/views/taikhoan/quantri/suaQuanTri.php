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
                <h3 class="card-title">Sửa tài khoản quản trị: <?php echo $quanTri['ho_ten'] ?></h3>
              </div>
              
              <form action="<?= BASE_URL_ADMIN.'?act=sua-quan-tri' ?>" method="post" enctype="multipart/form-data" >
                <input type="hidden" name="quan_tri_id" value="<?= $quanTri['id'] ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Họ tên</label>
                    <input type="text" class="form-control" name="ho_ten" placeholder="Nhập họ tên" value="<?= $quanTri['ho_ten']?>">
                    <?php if(isset($_SESSION['error']['ho_ten'])){ ?>
                        <p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
                 <?php   }
                     ?>
                  </div>
                  <div class="form-group">
                <label for="inputName">Hình ảnh</label>
                <input type="file"  name="anh_dai_dien" class="form-control" >
              </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" value="<?= $quanTri['email']?>" placeholder="Nhập email">
                    <?php if(isset($_SESSION['error']['email'])){ ?>
                        <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                 <?php   }
                     ?>
                  </div>     
                  <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control" name="so_dien_thoai" value="<?= $quanTri['so_dien_thoai']?>" placeholder="Nhập số điện thoại">
                    <?php if(isset($_SESSION['error']['so_dien_thoai'])){ ?>
                        <p class="text-danger"><?= $_SESSION['error']['so_dien_thoai'] ?></p>
                 <?php   }
                     ?>
                  </div>  
                  <div class="form-group">
                    <label for="">Ngày sinh</label>
                    <input type="date" class="form-control" name="ngay_sinh" value="<?= $quanTri['ngay_sinh']?>" placeholder="Nhập ngày sinh">
                    <?php if(isset($_SESSION['error']['ngay_sinh'])){ ?>
                        <p class="text-danger"><?= $_SESSION['error']['ngay_sinh'] ?></p>
                 <?php   }
                     ?>
                  </div> 
                  <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" class="form-control" name="dia_chi" value="<?= $quanTri['dia_chi']?>" placeholder="Nhập địa chỉ">

                  </div>
                  <div class="form-group " >
                    <label for="">Giới tính</label>
                    <select name="gioi_tinh" class='form-control' id="exampleFormControlSelect1" >
                      <option <?php $quanTri['gioi_tinh']==1?'selected':'' ?> value="1">Nam</option>
                      <option <?php $quanTri['gioi_tinh']!==1?'selected':'' ?> value="2">Nữ</option>
                    </select>   
                
              </div>
              <div class="form-group">
                    <label for="">Mật khẩu</label>
                    <input type="text" class="form-control" name="mat_khau" value="<?= $quanTri['mat_khau']?>" placeholder="Nhập mật khẩu">
                    <?php if(isset($_SESSION['error']['mat_khau'])){ ?>
                        <p class="text-danger"><?= $_SESSION['error']['mat_khau'] ?></p>
                 <?php   }
                     ?>
                  </div>
              <div class="form-group " >
                    <label for="">Trạng thái tài khoản</label>
                    <select name="trang_thai" class='form-control' id="exampleFormControlSelect1" >
                      <option <?php $quanTri['trang_thai']==1?'selected':'' ?> value="1">Hoạt động</option>
                      <option <?php $quanTri['trang_thai']!==1?'selected':'' ?> value="2">Vô hiệu hóa</option>
                    </select>                      
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