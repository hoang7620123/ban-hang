<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <script src="https://kit.fontawesome.com/8ae1e04fc1.js" crossorigin="anonymous"></script>
    <style>
        #giohang {
            width: 100%;
            text-align: center;
            border-collapse: collapse;
        }
        #giohang th, #giohang td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        #giohang th {
            background-color: #f2f2f2;
            color: black;
        }
        #giohang tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        #giohang img {
            width: 150px;
        }
        #giohang button {
            padding: 5px 10px;
            margin: 0 5px;
        }
        #thongtin-02 {
            position: relative;
            height: 100px;
        }
        #thongtin-02 p {
            margin: 10px 0;
        }
        #thongtin-02 a {
            text-decoration: none;
            color: blue;
        }
        #deleteall-btn {
            background-color: #817c7c;
            color: white;
            margin: 0 auto;
        }
        #dathang-btn {
            background-color: #1ebe33;
            color: white;
            border-radius: 15px;
            margin: 0 auto;
            width: 300px;
            height: 50px;
        }
        #dathang-btn:hover  {
            background-color: #fef6c7;
            color: black;
        }
        #dkdathang-btn {
            background-color: #1ebe33;
            color: white;
            border-radius: 15px;
            margin: 0 auto;
            width: 300px;
            height: 50px;
        }
        #dkdathang-btn:hover  {
            background-color: #fef6c7;
            color: black;
        }

    </style>
</head>
<body>
    <p>Xin chào
        <?php
        if (isset($_SESSION['dangky'])) {
            echo $_SESSION['dangky'];
        }
        ?>
    </p>
    <?php
    if (isset($_SESSION['cart'])) {
    }
    ?>

<table id="giohang"> 
    <tr id="danhmuc"> 
        <th>ID</th>
        <th>Mã sp</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Số lượng</th>
        <th>Giá sản phẩm</th>
        <th>Thành tiền</th>
        <th>Quản lý</th>
    </tr>

    <?php
    if (isset($_SESSION['cart'])) { // Kiểm tra xem giỏ hàng có sản phẩm không
        $i = 0; // Khởi tạo biến đếm số thứ tự
        $tongtien = 0; // Khởi tạo biến tổng tiền
        foreach ($_SESSION['cart'] as $cart_item) { // Duyệt qua từng sản phẩm trong giỏ hàng
            $thanhtien = $cart_item['soluong'] * $cart_item['giasp']; // Tính thành tiền của mỗi sản phẩm
            $tongtien += $thanhtien; // Cộng dồn vào tổng tiền
            $i++;
    ?>

            <tr id="thongtin-01">
                <td><?php echo $i; ?></td> 
                <td><?php echo $cart_item['masp']; ?></td> 
                <td><?php echo $cart_item['tensanpham']; ?></td> 
                <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>"></td> 
                <td>
                    <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><button type="button">+</button></a> 
                    <?php echo $cart_item['soluong']; ?> 
                    <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><button type="button">-</button></a> 
                </td>
                <td><?php echo number_format($cart_item['giasp'], 0, ',', '.') . 'VNĐ'; ?></td> 
                <td><?php echo number_format($thanhtien, 0, ',', '.') . 'VNĐ'; ?></td> 
                <td><a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>
                "><button id="del">Xoá</button></a></td> 
            </tr>

    <?php
        } 
    ?>

        <tr id="thongtin-02">
            <td id="dathang-frame" colspan="6"> 
                <?php
                if (isset($_SESSION['dangky'])) { // Kiểm tra xem người dùng đã đăng ký chưa
                ?>
                    <p><a href="index.php?quanly=kiemtra"><button id="dathang-btn" type="button">Đặt hàng</button></a></p> 
                <?php
                } else {
                ?>
                    <p><a href="index.php?quanly=dangky"><button id="dkdathang-btn" type="button">Đăng ký đặt hàng</button></a></p>
                <?php
                }
                ?>
            </td>
            <td colspan="1"> 
                <p>Tổng tiền: <?php echo number_format($tongtien, 0, ',', '.') . 'VNĐ' ?></p> 
            </td>
            <td id="deleteall-frame" colspan="1"> 
                <p><a href="pages/main/themgiohang.php?xoatatca=1"><button id="deleteall-btn" type="button">Xóa tất cả</button></a></p> 
            </td>
        </tr>

    <?php
    } else { // Nếu giỏ hàng trống
    ?>

        <tr>
            <td colspan="8"> 
                <p>Hiện tại giỏ hàng trống</p> 
            </td>
        </tr>

    <?php
    } // Kết thúc điều kiện if
    ?>
</table>
</body>
</html>