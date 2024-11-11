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

<table style="width:100%; text-align: center;">
    <tr>
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
    if (isset($_SESSION['cart'])) {
        $i = 0;
        $tongtien = 0;
        foreach ($_SESSION['cart'] as $cart_item) {
            $thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
            $tongtien += $thanhtien;
            $i++;


    ?>

            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $cart_item['masp']; ?></td>
                <td><?php echo $cart_item['tensanpham']; ?></td>
                <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" width="150px"></td>
                <td>
                    <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><button
                            type="button">+</button></a>
                    <?php echo $cart_item['soluong']; ?>
                    <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><button type="button">-</button></a>
                </td>
                <td><?php echo number_format($cart_item['giasp'], 0, ',', '.') . 'VNĐ'; ?></td>
                <td><?php echo number_format($thanhtien, 0, ',', '.') . 'VNĐ'; ?></td>
                <td><a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>">Xóa</a></td>
            </tr>

        <?php
        }
        ?>

        <tr>
            <td colspan="8">
                <p>Tổng tiền: <?php echo number_format($tongtien, 0, ',', '.') . 'VNĐ' ?></p>
                <br />
                <p><a href="pages/main/themgiohang.php?xoatatca=1">Xóa tất cả</a></p>

                <?php
                if (isset($_SESSION['dangky'])) {
                ?>
                    <p><a href="pages/main/thanhtoan.php">Đặt hàng</a></p>
                <?php
                } else {
                ?>
                    <p><a href="index.php?quanly=dangky">Đăng ký đặt hàng</a></p>
                <?php
                }
                ?>


            </td>
        </tr>

    <?php
    } else {
    ?>

        <tr>
            <td colspan="8">
                <p>Hiện tại giỏ hàng trống</p>
            </td>
        </tr>

    <?php
    }
    ?>
</table>