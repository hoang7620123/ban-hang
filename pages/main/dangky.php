<?php
if (isset($_POST['register'])) {
    $tenkhachhang = $_POST['username'];
    $matkhau = md5($_POST['password']);
    $email = $_POST['email'];
    $diachi = $_POST['address'];
    $sdt = $_POST['phone'];
    $sql_dangky = mysqli_query($mysqli, "INSERT INTO tbl_dangky(tenkhachhang,matkhau,email,diachi,dienthoai) VALUE('" . $tenkhachhang . "','" . $matkhau . "','" . $email . "','" . $diachi . "','" . $sdt . "')");
    if ($sql_dangky) {
        $_SESSION['dangky'] = $tenkhachhang;
        $_SESSION['email'] = $email;
        $_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);

        header('Location:index.php?quanly=giohang');
    }
    // Kiểm tra reCAPTCHA
    $captcha = $_POST['g-recaptcha-response'];
    $secretKey = "6Lezq2wqAAAAAP7ARMFS5Ny6OrCta4sT7v0GOplD"; // Secret Key từ Google reCAPTCHA
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha");
    $responseKeys = json_decode($response, true);

    if (intval($responseKeys["success"]) !== 1) {
        echo 'Vui lòng xác nhận CAPTCHA!';
    } else {
        // Nếu CAPTCHA hợp lệ, thêm người dùng vào cơ sở dữ liệu
        $sql_dangky = mysqli_query($mysqli, "INSERT INTO tbl_dangky(tenkhachhang,matkhau,email,diachi,dienthoai) 
                                             VALUE('" . $tenkhachhang . "','" . $matkhau . "','" . $email . "','" . $diachi . "','" . $sdt . "')");
        if ($sql_dangky) {
            echo 'Bạn đã đăng kí thành công';
        } else {
            echo 'Đăng ký thất bại. Vui lòng thử lại.';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Montserrat', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f0f2f5;
    }

    .register-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        padding: 20px;
        margin-bottom: 50px;
    }

    .register-box {
        background-color: #ffffff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        width: 100%;
        text-align: center;
    }

    .register-box h2 {
        color: #333333;
        margin-bottom: 20px;
        font-size: 24px;
    }

    .input-group {
        margin-bottom: 20px;
        text-align: left;
    }

    .input-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: 600;
        color: #333333;
    }

    .input-group input {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        background-color: #f8f9fa;
        transition: border-color 0.3s;
    }

    .input-group input:focus {
        border-color: #3333ff;
        outline: none;
    }

    .register-button {
        width: 100%;
        padding: 12px;
        background-color: #3333ff;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-top: 10px;
    }

    .register-button:hover {
        background-color: #2626b2;
    }
    </style>
</head>

<body>
    <div class="register-container">
        <div class="register-box">
            <h2>Đăng Ký</h2>
            <form action="" method="POST">
                <div class="input-group">
                    <label for="username">Tên Khách Hàng</label>
                    <input type="text" name="username">
                </div>
                <div class="input-group">
                    <label for="password">Mật Khẩu</label>
                    <input type="password" name="password">
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email">
                </div>
                <div class="input-group">
                    <label for="address">Địa Chỉ</label>
                    <input type="text" name="address">
                </div>
                <div class="input-group">
                    <label for="phone">Số Điện Thoại</label>
                    <input type="text" name="phone">
                </div>

                <div class="g-recaptcha" data-sitekey="6Lezq2wqAAAAAHGlOECVzocBRFPuKBggrpVuS1qj"></div>

                <button type="submit" name="register" class="register-button">Đăng Ký</button>
                <p><a href="index.php?quanly=dangnhap">Đăng nhập nếu có tài khoản</a></p>
            </form>
        </div>
    </div>
</body>

</html>