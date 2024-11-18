<!-- <?php
        $sql_lh = "SELECT * FROM tbl_lienhe WHERE id=1 ";
        $query_lh = mysqli_query($mysqli, $sql_lh);
        ?>

<?php
while ($dong = mysqli_fetch_array($query_lh)) {
?>
    <p><?php echo $dong['thongtinlienhe'] ?></p>
<?php
}
?> -->


<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Liên Hệ</title>
    <style>
        form {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="lienhe">
        <h1>Liên Hệ Với Chúng Tôi</h1>

        <form action="../../mail/mailhotline.php" method="POST">
            <label for="name">Tên của bạn</label><br>
            <input type="text" id="name" name="name"><br><br>

            <label for="email">Email</label><br>
            <input type="email" id="email" name="email"><br><br>

            <label for="email">Số điện thoại</label><br>
            <input type="phone" id="phone" name="phone"><br><br>

            <label for="message">Nội dung</label><br>
            <textarea id="message" name="message" rows="5"></textarea><br><br>

            <button type="submit">Gửi Liên Hệ</button>
        </form>
    </div>
</body>

</html>