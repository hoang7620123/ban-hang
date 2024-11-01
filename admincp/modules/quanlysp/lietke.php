<?php
$sql_lietke_sp = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc ORDER BY id_sanpham DESC";
$query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
?>

<p>Liệt kê sản phẩm</p>

<table border="1" width="80%" style="border-collapse:collapse">

    <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Giá sp</th>
        <th>Số lượng</th>
        <th>Danh mục</th>
        <th>Mã sp</th>
        <th>Tóm tắt</th>
        <th>Trạng thái </th>
        <th>Quản lý</th>

    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_sp)) {
        $i++;
    ?>
    <tr>
        <td align="center"><?php echo $i ?></td>
        <td align="center"><?php echo $row['tensanpham']  ?></td>
        <td align="center"><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh']  ?>" width="150px"></td>
        <td align="center"><?php echo $row['giasp']  ?></td>
        <td align="center"><?php echo $row['soluong']  ?></td>
        <td align="center"><?php echo $row['tendanhmuc']  ?></td>
        <td align="center"><?php echo $row['masp']  ?></td>
        <td align="center"><?php echo $row['tomtat']  ?></td>
        <td align="center"><?php if ($row['tinhtrang'] == 1) {
                    echo 'Kích hoạt';
                } else {
                    echo 'Ẩn';
                }
                ?>
        </td>
        <td>
            <a href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>">Xóa</a> | <a
                href="?action=quanlysp&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>">Sửa</a>
        </td>
    </tr>
    <?php
    }
    ?>
</table>