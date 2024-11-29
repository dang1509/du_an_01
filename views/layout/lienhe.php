<?php include "./views/layout/header.php" ?>
<?php include "./views/layout/navbar_trangchu.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://kit.fontawesome.com/bb7fdf5ca5.js" crossorigin="anonymous"></script>
</head>

<body>
    <main>
    <section class="row">
            <div class="column">
                <h3>Liên hệ với chúng tôi:</h3>
                <form action="" class="form">
                    <label for="name">Tên</label>
                    <input type="text" id="name" name="name" required>

                    <label for="name">SĐT</label>
                    <input type="text" id="sdt" name="sdt" required>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>

                    <label for="message">Nội dung</label>
                    <textarea id="message" name="message" rows="4" required></textarea>

                    <button type="submit">Gửi</button>
                </form>
            </div>
        </section>
        
        <section class="container" id="hihi">
            <h2>Liên hệ</h2>
            <div class="row">
                <div class="column">
                    <h3>Thông tin liên hệ</h3>
                    <div class="contact-info">
                        <p>Địa chỉ: Cổng số 1, Tòa nhà FPT Polytechnic, 13 phố Trịnh Văn Bô, phường Phương Canh, quận Nam Từ Liêm, TP Hà Nội</p>
                        <p>Điện thoại: (024) 7300 1955 </p>
                        <p>Email: caodang@fpt.edu.vn</p>
                        <p>Giờ làm việc: 8:15 - 12:00, 13:30 - 17:30</p>
                    </div>
                </div>
                <div class="column">
                    <h3>Vị trí</h3>
                    <div class="map">
                      
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.863806019031!2d105.74468687379749!3d21.038134787459352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455e940879933%3A0xcf10b34e9f1a03df!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1717410296887!5m2!1svi!2s" width="450" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
        </section>
    
       
    </main>
 
</body>

</html>
<?php include "./views/layout/footer.php" ?>