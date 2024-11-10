<?php
if (isset($_POST['timkiem'])) {
    $tukhoa = $_POST['tukhoa'];
}
$sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.tensanpham LIKE '%" . $tukhoa . "%'";
$query_pro = mysqli_query($mysqli, $sql_pro);


?>

<h3>Từ khóa tìm kiếm: <?php $_POST['tukhoa'] ?></h3>
<?php
while ($row = mysqli_fetch_array($query_pro)) {
?>
    <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
        <div class="product_card">

            <div class="product_card_image">
                <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
            </div>
            <h3 class="product_card_name"><?php echo $row['tensanpham'] ?></h3>
            <div class="product_card_price"><?php echo number_format($row['giasp']) . 'VND' ?></div>
        </div>
    </a>
<?php
}
?>