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
            <h1>Quản lí thông tin đơn hàng</h1>
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
                <h3 class="card-title">Chỉnh sửa đơn hàng- Đơn hàng: <?= $DonHang['ma_don_hang']?></h3>
              </div>
              
              <form action="<?= BASE_URL_ADMIN.'?act=sua-don-hang' ?>" method="post" >
                <input type="hidden" name="don_hang_id" value="<?= $DonHang['id']?>" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Tên người nhận</label>
                    <input type="text" class="form-control" name="ten_nguoi_nhan" placeholder="Nhập tên danh mục" value="<?= $DonHang['ten_nguoi_nhan'] ;?>">
                    <?php if(isset($error['ten_nguoi_nhan'])){ ?>
                        <p class="text-danger"><?= $error['ten_nguoi_nhan'] ?></p>
                 <?php   }
                     ?>
                  </div>
                  <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control" name="sdt_nguoi_nhan" placeholder="Nhập tên danh mục" value="<?= $DonHang['sdt_nguoi_nhan'] ;?>">
                    <?php if(isset($error['sdt_nguoi_nhan'])){ ?>
                        <p class="text-danger"><?= $error['sdt_nguoi_nhan'] ?></p>
                 <?php   }
                     ?>
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email_nguoi_nhan" placeholder="Nhập tên danh mục" value="<?= $DonHang['email_nguoi_nhan'] ;?>">
                    <?php if(isset($error['email_nguoi_nhan'])){ ?>
                        <p class="text-danger"><?= $error['email_nguoi_nhan'] ?></p>
                 <?php   }
                     ?>
                  </div>
                  <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" class="form-control" name="dia_chi_nguoi_nhan" placeholder="Nhập tên danh mục" value="<?= $DonHang['dia_chi_nguoi_nhan'] ;?>">
                    <?php if(isset($error['dia_chi_nguoi_nhan'])){ ?>
                        <p class="text-danger"><?= $error['dia_chi_nguoi_nhan'] ?></p>
                 <?php   }
                     ?>
                  </div>
                  <div class="form-group">
                    <label for="">Ghi chú</label>
                    <textarea name="ghi_chu" id="" class='form-control' ><?= $DonHang['ghi_chu'] ;?></textarea>
                  </div>    
                  <hr>
                  <div class="form-group " >
                    <label for="">Trạng thái đơn hàng</label>
                    <select name="trang_thai_id" class='form-control' id="exampleFormControlSelect1" >
                      <option selected disabled>Chọn trạng thái đơn hàng</option>
                      <?php                     
                      foreach ($listTrangThaiDonHang as $TrangThai):   
                        ?>
                        <option
                        <?php if($DonHang['trang_thai_id']>$TrangThai['id'] ){
                            echo 'disabled';
                        }elseif($DonHang['trang_thai_id']>=8&&$DonHang['trang_thai_id']<=10){
                            echo 'disabled';
                        }
                            ?>
                         <?= $TrangThai['id'] == $DonHang['trang_thai_id']?'selected':''?> value="<?= $TrangThai['id']; ?>" ><?= $TrangThai['ten_trang_thai']; ?></option>                       
                        <?php endforeach;                   
                      ?>
                      <?php if(isset($_SESSION['error']['trang_thai_id'])){ ?>
                        <p class="text-danger"><?= $_SESSION['error']['trang_thai_id'] ?></p>
                 <?php   }
                     ?>
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