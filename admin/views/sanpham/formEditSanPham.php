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
                    <h1>Sửa thông tin sản phẩm: <?= $SanPham['ten_san_pham'] ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin sản phẩm</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <form action="<?= BASE_URL_ADMIN . '?act=post-edit-san-pham' ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" name="san_pham_id" value="<?= $SanPham['id'] ?>">
                                <label for="tenSanPham">Tên sản phẩm</label>
                                <input type="text" id="ten_san_pham" name="ten_san_pham" class="form-control"
                                    value="<?= $SanPham['ten_san_pham'] ?>">
                                <?php if (isset($_SESSION['error']['ten_san_pham'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="giaSanPham">Giá sản phẩm</label>
                                <input type="number" id="gia_san_pham" name="gia_san_pham" class="form-control"
                                    value="<?= $SanPham['gia_san_pham'] ?>">
                                <?php if (isset($_SESSION['error']['gia_san_pham'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['error']['gia_san_pham'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="giaKhuyenMai">Giá Khuyến Mãi</label>
                                <input type="number" id="gia_khuyen_mai" name="gia_khuyen_mai" class="form-control"
                                    value="<?= $SanPham['gia_khuyen_mai'] ?>">
                                <?php if (isset($_SESSION['error']['gia_khuyen_mai'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['error']['gia_khuyen_mai'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="hinhAnh">Hình ảnh</label>
                                <input type="file" id="hinh_anh" name="hinh_anh" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="soLuong">Số lượng</label>
                                <input type="number" id="so_luong" name="so_luong" class="form-control"
                                    value="<?= $SanPham['so_luong'] ?>">
                                <?php if (isset($_SESSION['error']['so_luong'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="chatLieu">Chất liệu</label>
                                <input type="text" id="chat_lieu" name="chat_lieu" class="form-control"
                                    value="<?= $SanPham['chat_lieu'] ?>">
                                <?php if (isset($_SESSION['error']['chat_lieu'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['error']['chat_lieu'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="ngayNhap">Ngày nhập</label>
                                <input type="date" id="ngay_nhap" name="ngay_nhap" class="form-control"
                                    value="<?= $SanPham['ngay_nhap'] ?>">
                                <?php if (isset($_SESSION['error']['ngay_nhap'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="danhMuc">Danh Mục</label>
                                <select id="danh_muc_id" name="danh_muc_id" class="form-control custom-select">
                                    <?php foreach ($listDanhMuc as $danhMuc): ?>
                                        <option selected disabled>Chọn danh mục sản phẩm</option>
                                        <option <?= $danhMuc['id'] == $SanPham['danh_muc_id'] ? 'selected' : "" ?>
                                            value="<?php echo $danhMuc['id']; ?>"><?php echo $danhMuc['ten_danh_muc'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset($_SESSION['error']['danh_muc_id'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['error']['danh_muc_id'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group ">
                                <label for="">Trạng thái</label>
                                <select name="trang_thai" class='form-control' id="exampleFormControlSelect1">
                                    <option selected disabled>Chọn trạng thái sản phẩm</option>
                                    <option <?= $SanPham['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Còn hàng
                                    </option>
                                    <option <?= $SanPham['trang_thai'] == 2 ? 'selected' : '' ?> value="2">Hết hàng
                                    </option>
                                    <?php if (isset($_SESSION['error']['trang_thai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                                    <?php }
                                    ?>
                                </select>
                                <?php if (isset($_SESSION['error']['trang_thai'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                                <?php }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="moTa">Mô tả</label>
                                <textarea id="mo_ta" name="mo_ta" class="form-control"
                                    rows="4"><?= $SanPham['mo_ta'] ?></textarea>
                            </div>
                            <div class="cart-footer text-center">
                                <button type="submit" class="btn btn-primary">Sửa thông tin</button>
                            </div>
                        </div>
                    </form>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-4">
                <!-- /.card -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Album ảnh sản phẩm</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <form action="<?= BASE_URL_ADMIN.'?act=sua-album-anh-san-pham' ?>" method="post" enctype="multipart/form-data">
                            <div class="table-responsive">
                                <table id="faqs" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Ảnh</th>
                                            <th>File</th>
                                            <th>
                                                <div class="text-center"><button onclick="addfaqs();"
                                                        class="badge badge-success" type="button"><i class="fa fa-plus"></i> ADD
                                                        NEW</button></div>

                            </div>
                            </th>

                            </tr>
                            </thead>
                            <tbody>
                                     <input type="hidden" name="san_pham_id" value="<?= $SanPham['id']?>">
                                    <input type="hidden" id="img_delete" name="img_delete">
                                    <?php foreach($listAnhSanPham as $key=>$value ) :?>                                  
                                <tr id="faqs-row-<?= $key?>">   
                                    <input type="hidden" name="current_img_ids[]" value="<?= $value['id'] ?>">                               
                                    <td><img src="<?= BASE_URL.$value['link_hinh_anh'] ?>" alt="" style="width:50px"></td>
                                    <td><input type="file" name="img_array[]" class="form-control"></td>    
                                    <td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow(<?=$key?>,<?= $value['id'] ?>)"><i class="fa fa-trash"></i>
                                            Delete</button></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            </table>
                                <div class="card-footer text-center">
                                <button class="btn btn-warning" type="submit">Sửa thông tin</button>
                                </div>

                            
                        </form>

                    </div>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
<script>
    var faqs_row = <?= count($listAnhSanPham) ?>;
    function addfaqs() {
        html = '<tr id="faqs-row' + faqs_row + '">';
        html += '<td><img src="" alt="" style="width:50px"></td>';
        html += '<td><input type="file" name="img_array[]" class="form-control"></td>';
        html += '<td class="mt-10"><button type="button" class="badge badge-danger" onclick="$.removeRow('+ faqs_row + ',null);"><i class="fa fa-trash"></i> Delete</button></td>';

        html += '</tr>';

        $('#faqs tbody').append(html);

        faqs_row++;
    }
    function removeRow(rowId,imgId){
        $('#faqs-row-'+rowId).remove();
        if(imgId !== null){
            var imgDeleteInput = document.getElementById('img_delete');
            var currentValue = imgDeleteInput.value;
            imgDeleteInput.value = currentValue ? currentValue + ',' + imgId : imgId; 
        }
    }
</script>
</body>

</html>