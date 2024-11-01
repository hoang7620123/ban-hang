<?php
$sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT 25";
$query_pro = mysqli_query($mysqli, $sql_pro);
?>

<h3>New Arrival</h3>
<?php
while ($row = mysqli_fetch_array($query_pro)) {
?>
    <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>" class="product_link">
        <div class="product_card">

            <div class="product_card_image">
                <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
            </div>
            <h3 class="product_card_name"><?php echo $row['tensanpham'] ?></h3>
            <div class="product_card_price"><?php echo number_format($row['giasp']) . 'VND' ?></div>
            <div style="color: #d1d1d1;"><?php echo $row['tendanhmuc'] ?></div>
        </div>
    </a>

<?php
}
?>