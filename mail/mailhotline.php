<?php
include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/Exception.php";
include "PHPMailer/src/OAuthTokenProvider.php";
include "PHPMailer/src/POP3.php";
include "PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $sdt = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Cấu hình SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Máy chủ SMTP (vd: Gmail)
        $mail->SMTPAuth = true;
        $mail->Username = 'hoang7620456@gmail.com'; // Địa chỉ email gửi
        $mail->Password = 'gjjl japf dbiz lbzo'; // Mật khẩu ứng dụng
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Thông tin người gửi và người nhận
        $mail->setFrom($email, $name);
        $mail->addAddress('hoang7620456@gmail.com'); // Email admin

        // Nội dung email
        $mail->isHTML(true);
        $mail->Body = "
            <h2>Bạn nhận được một liên hệ mới</h2>
            <p><strong>Họ và tên:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Nội dung:</strong></p>
            <p>$message</p>
        ";

        // Gửi email
        $mail->send();
        header('Location:../index.php?quanly=lienhe');
        echo "Cảm ơn bạn đã liên hệ. Chúng tôi sẽ sớm phản hồi.";
    } catch (Exception $e) {
        echo "Không thể gửi email. Lỗi: {$mail->ErrorInfo}";
    }
} else {
    echo "Phương thức gửi không hợp lệ.";
}
header('Location:../pages/main/camon.php ');
