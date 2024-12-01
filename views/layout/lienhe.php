<?php include "./views/layout/header.php" ?>
<?php include "./views/layout/navbar_trangchu.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ</title>
  

  
</head>

<body>
    <main>
    <section class="contact-form-row" style="
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    background-color: #f4f4f4;
">
    <div class="contact-column" style="
        width: 100%;
        max-width: 600px;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    ">
        <h3 style="text-align: center; font-size: 24px; color: #333; margin-bottom: 20px;">Liên hệ với chúng tôi:</h3>
        <form action="" class="contact-form">
            <label for="name" style="font-size: 16px; color: #333; margin-bottom: 8px; display: block;">Tên</label>
            <input type="text" id="name" name="name" required style="
                width: 100%;
                padding: 10px;
                font-size: 16px;
                border: 1px solid #ccc;
                border-radius: 4px;
                margin-bottom: 15px;
                box-sizing: border-box;
                transition: all 0.3s ease;
            ">
            
            <label for="sdt" style="font-size: 16px; color: #333; margin-bottom: 8px; display: block;">SĐT</label>
            <input type="text" id="sdt" name="sdt" required style="
                width: 100%;
                padding: 10px;
                font-size: 16px;
                border: 1px solid #ccc;
                border-radius: 4px;
                margin-bottom: 15px;
                box-sizing: border-box;
                transition: all 0.3s ease;
            ">
            
            <label for="email" style="font-size: 16px; color: #333; margin-bottom: 8px; display: block;">Email</label>
            <input type="email" id="email" name="email" required style="
                width: 100%;
                padding: 10px;
                font-size: 16px;
                border: 1px solid #ccc;
                border-radius: 4px;
                margin-bottom: 15px;
                box-sizing: border-box;
                transition: all 0.3s ease;
            ">
            
            <label for="message" style="font-size: 16px; color: #333; margin-bottom: 8px; display: block;">Nội dung</label>
            <textarea id="message" name="message" rows="4" required style="
                width: 100%;
                padding: 10px;
                font-size: 16px;
                border: 1px solid #ccc;
                border-radius: 4px;
                margin-bottom: 15px;
                box-sizing: border-box;
                transition: all 0.3s ease;
            "></textarea>
            
            <button type="submit" style="
                background-color: #007BFF;
                color: white;
                font-size: 16px;
                padding: 10px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                width: 100%;
                transition: background-color 0.3s ease;
            ">Gửi</button>
        </form>
    </div>
</section>




<section class="contact-container" id="contact-info-section">
    <h2>Liên hệ</h2>
    <div class="contact-row">
        <div class="contact-column-info">
            <h3>Thông tin liên hệ</h3>
            <div class="contact-details">
                <p>Địa chỉ: Cổng số 1, Tòa nhà FPT Polytechnic, 13 phố Trịnh Văn Bô, phường Phương Canh, quận Nam Từ Liêm, TP Hà Nội</p>
                <p>Điện thoại: (024) 7300 1955 </p>
                <p>Email: caodang@fpt.edu.vn</p>
                <p>Giờ làm việc: 8:15 - 12:00, 13:30 - 17:30</p>
            </div>
        </div>
        <div class="contact-column-map">
            <h3>Vị trí</h3>
            <div class="google-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.863806019031!2d105.74468687379749!3d21.038134787459352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455e940879933%3A0xcf10b34e9f1a03df!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1717410296887!5m2!1svi!2s" width="450" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

<style>
/* Phần tử container chính */
.contact-container {
    padding: 40px;
    background-color: #f9f9f9;
}

/* Căn chỉnh tiêu đề */
.contact-container h2 {
    text-align: center;
    font-size: 28px;
    margin-bottom: 30px;
    color: #333;
}

/* Cấu trúc dòng chứa các cột */
.contact-row {
    display: flex;
    justify-content: space-between;
    gap: 30px;
}

/* Cột chứa thông tin liên hệ */
.contact-column-info {
    flex: 1;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

/* Tiêu đề cho cột thông tin */
.contact-column-info h3 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #007BFF;
}

/* Chi tiết thông tin liên hệ */
.contact-details p {
    font-size: 16px;
    margin-bottom: 12px;
    color: #555;
}

/* Cột chứa bản đồ */
.contact-column-map {
    flex: 1;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

/* Tiêu đề cho cột bản đồ */
.contact-column-map h3 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #007BFF;
}

/* Khung chứa bản đồ */
.google-map iframe {
    width: 100%;
    border-radius: 8px;
}

/* Đảm bảo hiển thị đẹp trên các màn hình nhỏ */
@media (max-width: 768px) {
    .contact-row {
        flex-direction: column;
        align-items: center;
    }
    .contact-column-info, .contact-column-map {
        width: 100%;
        margin-bottom: 20px;
    }
}
</style>

       
    </main>
 
</body>
<script>
    // Để tạo hiệu ứng focus cho các input và textarea, bạn có thể thêm một đoạn script nhỏ như sau:
    document.querySelectorAll('.contact-form input, .contact-form textarea').forEach(function(element) {
        element.addEventListener('focus', function() {
            element.style.borderColor = '#007BFF';
        });
        element.addEventListener('blur', function() {
            element.style.borderColor = '#ccc';
        });
    });
</script>
</html>
<?php include "./views/layout/footer.php" ?>