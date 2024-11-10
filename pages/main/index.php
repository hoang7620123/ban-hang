<?php
if (isset($_GET['trang'])) {
    $page = $_GET['trang'];
} else {
    $page = '';
}
if ($page == '' || $page == 1) {
    $begin = 0;
} else {
    $begin = ($page * 3) - 3;
}
$sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin,3";
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
<style type="text/css">
ul.list_trang {
    padding: 0;
    margin: 0;
    list-style: none;
}

ul.list_trang li {
    float: left;
    padding: 5px 13px;
    margin: 5px;
    background: burlywood;
    display: block;
}

ul.list_trang li a {
    color: #000;
    text-align: center;
    text-decoration: none;
}
</style>
<?php
$sql_trang = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham");
$row_count = mysqli_num_rows($sql_trang);
$trang = ceil($row_count / 3);
?>
<ul class="list_trang">
    <?php
    for ($i = 1; $i <= $trang; $i++) {
    ?>
    <li <?php if ($i == $page) {
                echo 'style="background: brown;"';
            } else {
                echo '';
            } ?>><a href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a></li>
    <?php
    }
    ?>
</ul>