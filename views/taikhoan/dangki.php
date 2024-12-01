<?php
// PHP code can be added here for dynamic handling if needed.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/dangki.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <h2>Đăng Kí </h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
           
        </div>
        <div class="form-container sign-in-container">
        <form action="?act=sign-up"  method="POST">
                <h1>Tạo tài khoản</h1>
                <div class="social-container">
                   
                </div>
                <span>hoặc sử dụng email của bạn để đăng ký</span>
                <input type="text" name="name" placeholder="Họ Và Tên" value="<?php echo isset($name) ? $name : ''; ?>" />
                <input type="email" name="email" placeholder="Email" value="<?php echo isset($email) ? $email : ''; ?>" />
                <input type="password" name="pass" placeholder="Mật khẩu" />
                <input type="password" name="so_dien_thoai" placeholder="Số điện thoại" />
                <input type="text" name="dia_chi" placeholder="Địa chỉ" value="<?php echo isset($dia_chi) ? $dia_chi : ''; ?>" />
                <a href="?act=dangnhap">Đã có tài khoản</a>
                <button type="submit" name="signup">Đăng Kí</button>
                
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                
                <div class="overlay-panel overlay-right">
                    <h1>Chào bạn!</h1>
                    <p>Nhập thông tin cá nhân của bạn và bắt đầu hành trình với chúng tôi</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add('right-panel-active');
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove('right-panel-active');
        });
    </script>
</body>
</html>
