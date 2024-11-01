<?php
session_start();
include('config/connect.php');
if (isset($_POST['dangnhap'])) {
    $taikhoan = $_POST['username'];
    $matkhau = md5($_POST['password']);
    $sql = "SELECT * FROM tbl_admin WHERE username = '" . $taikhoan . "'AND password = '" . $matkhau . "' LIMIT 1";
    $row = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($row);
    if ($count > 0) {
        $_SESSION['dangnhap'] = $taikhoan;
        header('Location:index.php');
    } else {
        echo 'Tài khoản hoặc Mật khẩu không đúng!';
        header('Location:login.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin</title>
    <style>
        /* CSS reset để đảm bảo bố cục hiển thị đúng */
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

        /* Container tổng cho form đăng nhập */
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 20px;
        }

        /* Box form đăng nhập */
        .login-box {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .login-box h2 {
            color: #333333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        /* Nhóm ô nhập liệu */
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

        /* Nút đăng nhập */
        .login-button {
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

        .login-button:hover {
            background-color: #2626b2;
        }

        /* Liên kết đăng ký */
        .signup-link {
            margin-top: 15px;
            font-size: 14px;
            color: #333333;
        }

        .signup-link a {
            color: #3333ff;
            text-decoration: none;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Đăng Nhập</h2>
            <form action="" autocomplete="off" method="POST">
                <div class="input-group">
                    <label for="username">Tên Đăng Nhập</label>
                    <input type="text" id="username" name="username">
                </div>
                <div class="input-group">
                    <label for="password">Mật Khẩu</label>
                    <input type="password" id="password" name="password">
                </div>
                <button type="submit" name="dangnhap" class="login-button">Đăng Nhập</button>
                <p class="signup-link">Chưa có tài khoản? <a href="register.php">Đăng ký ngay</a></p>
            </form>
        </div>
    </div>
</body>

</html>