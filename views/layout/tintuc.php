<?php include "./views/layout/header.php" ?>
<?php include "./views/layout/navbar_trangchu.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin Tức</title>
  
</head>

<body>
    <main>
    <section class="voucher-news">
    <h2>VOUCHER GIẢM GIÁ HOT</h2>
    <div class="voucher-container">
        <!-- Voucher 1 -->
        <div class="voucher-item">
            <div class="voucher-info">
                <h3 class="voucher-title">Voucher Giảm Giá 10%</h3>
                <p class="voucher-description">Giảm 10% cho mọi đơn hàng, tối đa 200.000 VND.</p>
                <p class="voucher-condition">Áp dụng cho đơn hàng từ 500.000 VND trở lên.</p>
                <p class="voucher-period">Thời gian áp dụng: Từ 1/12/2024 đến 31/12/2024.</p>
            </div>
            <div class="voucher-code">
                <input type="text" id="voucher-code-10" value="10OFF200K" readonly>
                <button onclick="copyVoucherCode('voucher-code-10')">Sao chép mã</button>
            </div>
            <a href="#" class="voucher-link">Xem chi tiết</a>
        </div>
        <!-- Voucher 2 -->
        <div class="voucher-item">
            <div class="voucher-info">
                <h3 class="voucher-title">Voucher Giảm Giá 20%</h3>
                <p class="voucher-description">Giảm 20% cho mọi đơn hàng, tối đa 300.000 VND.</p>
                <p class="voucher-condition">Áp dụng cho đơn hàng từ 1.000.000 VND trở lên.</p>
                <p class="voucher-period">Thời gian áp dụng: Từ 1/12/2024 đến 31/12/2024.</p>
            </div>
            <div class="voucher-code">
                <input type="text" id="voucher-code-20" value="20OFF300K" readonly>
                <button onclick="copyVoucherCode('voucher-code-20')">Sao chép mã</button>
            </div>
            <a href="#" class="voucher-link">Xem chi tiết</a>
        </div>
    </div>
</section>

<!-- CSS -->
<style>
    .voucher-news {
        background-color: #f9f9f9;
        padding: 40px 20px;
        text-align: center;
    }

    .voucher-news h2 {
        font-size: 32px;
        color: #007BFF;
        margin-bottom: 30px;
    }

    .voucher-container {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        flex-wrap: wrap;
    }

    .voucher-item {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        width: 48%;
        overflow: hidden;
        text-align: left;
        padding: 20px;
        transition: transform 0.3s ease;
    }

    .voucher-item:hover {
        transform: translateY(-10px);
    }

    .voucher-info {
        margin-bottom: 15px;
    }

    .voucher-title {
        font-size: 22px;
        color: #333;
        margin-bottom: 10px;
    }

    .voucher-description {
        font-size: 16px;
        color: #555;
        margin-bottom: 15px;
    }

    .voucher-condition,
    .voucher-period {
        font-size: 14px;
        color: #777;
        margin-bottom: 10px;
    }

    .voucher-code {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 10px;
    }

    .voucher-code input {
        padding: 10px;
        font-size: 18px;
        border: 1px solid #ccc;
        border-radius: 4px;
        width: 150px;
        text-align: center;
        margin-right: 10px;
        background-color: #f9f9f9;
    }

    .voucher-code button {
        padding: 10px 20px;
        font-size: 16px;
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .voucher-code button:hover {
        background-color: #0056b3;
    }

    .voucher-link {
        display: block;
        margin-top: 15px;
        font-size: 16px;
        color: #007BFF;
        text-decoration: none;
        text-align: center;
        transition: color 0.3s ease;
    }

    .voucher-link:hover {
        color: #0056b3;
    }

    /* Responsive design adjustments */
    @media screen and (max-width: 768px) {
        .voucher-item {
            width: 100%;
        }
    }
</style>



<section class="jewelry-news">
  <h2>TRANG SỨC HOT </h2>
    <div class="jewelry-container">
        <!-- Tin tức 1 -->
        <div class="jewelry-item">
            <img src="https://cdn.vuahanghieu.com/unsafe/0x900/left/top/smart/filters:quality(90)/https://admin.vuahanghieu.com/upload/product/2023/09/day-chuyen-nu-lili-jewelry-vang-18k-dinh-da-moissanite-co-4-la-lili_155877-mau-bac-650e5fddbdf61-23092023104741.jpg" alt="Sản phẩm 1" class="jewelry-image">
            <div class="jewelry-details">
                <h3 class="jewelry-name">Dây Chuyền Vàng 18K</h3>
                <p class="jewelry-description">Dây chuyền vàng 18K với thiết kế thanh lịch, phù hợp cho mọi dịp.</p>
                <a href="#" class="jewelry-link">Xem chi tiết</a>
            </div>
        </div>
        <!-- Tin tức 2 -->
        <div class="jewelry-item">
            <img src="https://i.pinimg.com/736x/8f/19/64/8f19642f3d423d6da73ae0e4f5f3e1f6.jpg" alt="Sản phẩm 2" class="jewelry-image">
            <div class="jewelry-details">
                <h3 class="jewelry-name">Nhẫn Kim Cương</h3>
                <p class="jewelry-description">Nhẫn kim cương cao cấp, thể hiện sự sang trọng và đẳng cấp.</p>
                <a href="#" class="jewelry-link">Xem chi tiết</a>
            </div>
        </div>
        <!-- Tin tức 3 -->
        <div class="jewelry-item">
            <img src="https://lili.vn/wp-content/uploads/2022/07/Lac-tay-bac-nu-ca-tinh-dang-chuoi-Happy-Every-Day-LILI_887869_1.jpg" alt="Sản phẩm 3" class="jewelry-image">
            <div class="jewelry-details">
                <h3 class="jewelry-name">Lắc Tay Bạc</h3>
                <p class="jewelry-description">Lắc tay bạc tinh xảo, tạo điểm nhấn cho bộ trang phục của bạn.</p>
                <a href="#" class="jewelry-link">Xem chi tiết</a>
            </div>
        </div>
    </div>
</section>

<!-- CSS -->
<style>
    .jewelry-news {
        background-color: #f9f9f9;
        padding: 40px 20px;
        text-align: center;
    }

    .section-title {
        font-size: 32px;
        color: #007BFF;
        margin-bottom: 30px;
    }

    .jewelry-container {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        flex-wrap: wrap;
    }

    .jewelry-item {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        width: 30%;
        overflow: hidden;
        text-align: left;
        padding: 20px;
    }

    .jewelry-item img {
        width: 100%;
        height: auto;
        border-radius: 8px;
    }

    .jewelry-details {
        margin-top: 15px;
    }

    .jewelry-name {
        font-size: 20px;
        color: #333;
        margin-bottom: 10px;
    }

    .jewelry-description {
        font-size: 16px;
        color: #555;
        margin-bottom: 15px;
    }

    .jewelry-link {
        font-size: 16px;
        color: #007BFF;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .jewelry-link:hover {
        color: #0056b3;
    }

    /* Điều chỉnh cho màn hình nhỏ */
    @media screen and (max-width: 768px) {
        .jewelry-item {
            width: 45%;
        }
    }

    @media screen and (max-width: 480px) {
        .jewelry-item {
            width: 100%;
        }
    }
</style>


</main>

</body>

<!-- JS để sao chép mã -->
<script>
    function copyVoucherCode(voucherId) {
        var copyText = document.getElementById(voucherId);
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */
        document.execCommand("copy");
        alert("Đã sao chép mã: " + copyText.value);
    }
</script>


</html>
<?php include "./views/layout/footer.php" ?>