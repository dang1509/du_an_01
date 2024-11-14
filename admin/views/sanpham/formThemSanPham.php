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
                        <!-- /.card-header -->


                        <form action="<?php echo BASE_URL_ADMIN . '?act=post-them-san-pham' ?>" method="post"
                            enctype="multipart/form-data">
                            <div class="card-body row">
                                <div class="form-group col-12">
                                    <label for="tenSanPham" class="form-label">Tên Sản Phẩm</label>
                                    <input type="text" class="form-control" id="ten_san_pham" name="ten_san_pham"
                                        placeholder="Nhập tên sản phẩm">
                                    <?php if (isset($_SESSION['error']['ten_san_pham'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-12">
                                    <label for="tenSanPham" class="form-label">Chất liệu</label>
                                    <input type="text" class="form-control" id="chat_lieu" name="chat_lieu"
                                        placeholder="Nhập chất liệu">
                                    <?php if (isset($_SESSION['error']['chat_lieu'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['chat_lieu'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label for="giaSanPham" class="form-label">Giá Sản Phẩm</label>
                                    <input type="number" class="form-control" id="gia_san_pham" name="gia_san_pham"
                                        placeholder="Nhập giá sản phẩm">
                                    <?php if (isset($_SESSION['error']['gia_san_pham'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['gia_san_pham'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label for="giaKhuyenMai" class="form-label">Giá Khuyến Mãi</label>
                                    <input type="number" class="form-control" id="gia_khuyen_mai" name="gia_khuyen_mai"
                                        placeholder="Nhập giá khuyến mãi">
                                    <?php if (isset($_SESSION['error']['gia_khuyen_mai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['gia_khuyen_mai'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label for="hinhAnh" class="form-label">Hình ảnh</label>
                                    <input type="file" class="form-control" id="hinh_anh" name="hinh_anh"
                                        placeholder="Nhập Hình ảnh">
                                    <?php if (isset($_SESSION['error']['hinh_anh'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['hinh_anh'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label for="hinhAnh" class="form-label">Album ảnh</label>
                                    <input type="file" class="form-control"  name="img_array[]" multiple>
                                    
                                </div>
                                <div class="form-group col-6">
                                    <label for="soLuong" class="form-label">Số lượng</label>
                                    <input type="number" class="form-control" id="so_luong" name="so_luong"
                                        placeholder="Nhập số lượng">
                                    <?php if (isset($_SESSION['error']['so_luong'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label for="ngayNhap" class="form-label">Ngày nhập</label>
                                    <input type="date" class="form-control" id="ngay_nhap" name="ngay_nhap"
                                        placeholder="Nhập Ngày nhập">
                                    <?php if (isset($_SESSION['error']['ngay_nhap'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label for="danhMuc" class="form-label">Danh mục</label>
                                    <select name="danh_muc_id" class='form-control' id="exampleFormControlSelect1">
                                        <option selected disabled>Chọn danh mục sản phẩm</option>
                                        <?php
                                        foreach ($listDanhMuc as $danhmuc):
                                            ?>
                                            <option value="<?= $danhmuc['id']; ?>"><?= $danhmuc['ten_danh_muc']; ?></option>
                                        <?php endforeach;
                                        ?>
                                    </select>
                                    <?php if (isset($_SESSION['error']['danh_muc_id'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['danh_muc_id'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Trạng thái</label>
                                    <select name="trang_thai" class='form-control' id="exampleFormControlSelect1">
                                        <option selected disabled>Chọn trạng thái sản phẩm</option>
                                        <option value="1">Còn hàng</option>
                                        <option value="2">Hết hàng</option>
                                    </select>
                                    <?php if (isset($_SESSION['error']['trang_thai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                                    <?php }
                                    ?>
                                </div>

                                <div class="form-group col-12">
                                    <label for="">Mô tả</label>
                                    <textarea name="mo_ta" id="" class='form-control'
                                        placeholder="Nhập mô tả"></textarea>
                                </div>

                                
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div>
<?php include './views/layout/footer.php'; ?>
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