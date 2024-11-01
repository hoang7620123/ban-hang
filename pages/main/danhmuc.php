<?php
$sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$_GET[id]' ORDER BY tbl_sanpham.id_sanpham DESC";
$query_pro = mysqli_query($mysqli, $sql_pro);

//get ten danh muc
$sql_cate = "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc='$_GET[id]' LIMIT 1";
$query_cate = mysqli_query($mysqli, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);
?>

<h3>Danh mục sản phẩm: <?php echo $row_title['tendanhmuc'] ?></h3>
<?php
while ($row_pro = mysqli_fetch_array($query_pro)) {
?>
    <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>">
        <div class="product_card">

            <div class="product_card_image">
                <img src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>">
            </div>
            <h3 class="product_card_name"><?php echo $row_pro['tensanpham'] ?></h3>
            <div class="product_card_price"><?php echo number_format($row_pro['giasp']) . 'VND' ?></div>
        </div>
    </a>
<?php
}
?>