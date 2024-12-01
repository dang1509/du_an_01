<?php include "./views/layout/header.php" ?>
<?php include "./views/layout/navbar_trangchu.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
    <section class="about-us">
    <div class="container">
        <h1 style="color:#007BFF" >Giới Thiệu về JShopper</h1>
        <div class="about-content">
            <div class="about-text">
                <p>Chào mừng đến với <strong>JShopper</strong> – cửa hàng trang sức cao cấp, nơi bạn có thể tìm thấy những món quà tuyệt vời cho bản thân và người thân yêu. Chúng tôi chuyên cung cấp các sản phẩm trang sức được thiết kế tinh tế, chế tác từ những nguyên liệu cao cấp như vàng, bạc, kim cương và các đá quý tự nhiên, mang lại vẻ đẹp và sự sang trọng cho mỗi khoảnh khắc trong cuộc sống.</p>
                <p>Tại JShopper, chúng tôi luôn cam kết mang đến cho khách hàng những sản phẩm chất lượng, giá trị lâu dài và dịch vụ khách hàng xuất sắc. Mỗi món trang sức đều được chăm chút tỉ mỉ, từ thiết kế cho đến quá trình sản xuất, nhằm tạo ra những món đồ hoàn hảo, phù hợp với phong cách và nhu cầu của bạn.</p>
            </div>
            <div class="about-image">
                <img src="https://lili.vn/wp-content/uploads/2021/02/Bo-trang-suc-bac-ma-vang-dinh-da-Citrine-hinh-chu-ong-vang-LILI_379148-16.jpg" alt="Trang sức JShopper" width="600px" height="280px"/>
            </div>
        </div>

        <div class="mission">
            <h2>Sứ mệnh & Tầm nhìn</h2>
            <p>Chúng tôi tại JShopper cam kết mang lại những sản phẩm trang sức đẹp, sang trọng và chất lượng cao cho mọi khách hàng. Với tầm nhìn trở thành thương hiệu hàng đầu về trang sức, chúng tôi không ngừng cải tiến và sáng tạo để đáp ứng nhu cầu và sự kỳ vọng của bạn.</p>
        </div>
    </div>
</section>

<!-- CSS -->
<style>
    .about-us {
        background-color: #f4f4f4;
        padding: 60px 20px;
        text-align: center;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .section-title {
        font-size: 36px;
        color: #007BFF;
        margin-bottom: 30px;
    }

    .about-content {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        flex-wrap: wrap;
        margin-bottom: 40px;
    }

    .about-text {
        width: 60%;
        font-size: 18px;
        color: #555;
        line-height: 1.6;
    }

    .about-image img {
        width: 100%;
        max-width: 500px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .mission {
        background-color: #ffffff;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        margin-top: 40px;
    }

    .mission h2 {
        font-size: 28px;
        color: #007BFF;
        margin-bottom: 20px;
    }

    .mission p {
        font-size: 18px;
        color: #555;
        line-height: 1.6;
    }

    /* Responsive Design */
    @media screen and (max-width: 768px) {
        .about-content {
            flex-direction: column;
            text-align: left;
        }

        .about-text {
            width: 100%;
        }

        .about-image img {
            width: 100%;
            max-width: none;
        }
    }
</style>

    </main>


</body>
</html>
<?php include "./views/layout/footer.php" ?>