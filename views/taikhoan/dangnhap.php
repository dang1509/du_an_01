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
    <h2> Đăng Nhập</h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
         
        </div>
        <div class="form-container sign-in-container">
            <form method="post">
                <h1>Đăng Nhập</h1>
                <div class="social-container">
                    <a href="https://www.facebook.com/yourprofile" class="social" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://plus.google.com/yourprofile" class="social" target="_blank">
                        <i class="fab fa-google-plus-g"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/yourprofile" class="social" target="_blank">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
                <span>hoặc sử dụng tài khoản của bạn</span>
                <input type="text" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Mật khẩu" required />
                <a href="#">Bạn quên mật khẩu ? </a>
                <button type="submit" name="login">Đăng Nhập</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                </div>
                <div class="overlay-panel overlay-right">
                <h1>Chào mừng trở lại!</h1>
                <p>Để duy trì kết nối với chúng tôi vui lòng đăng nhập bằng thông tin cá nhân của bạn</p>
                    
                </div>
            </div>
        </div>
    </div>
</body>
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
</html>

