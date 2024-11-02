<?php
$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);

?>
<div class="frame-menu">
<div class="container-menu">
    <div class="container-logo">
        <img src="../pages/hình/Va_no_la.png" alt="Logo" class="logo" usemap="#logo" width="200px" height="50px">
        <map name="logo">
            <area shape="default" coords="" href="index.php" alt="Logo">
        </map>
    </div>
    <ul class="list_menu">
        <li><a href="index.php">Trang chủ</a></li>
        <?php while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) { ?>
            <!-- <li><a
                href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a>
        </li> -->
        <?php } ?>
        <li><a href="index.php?quanly=tintuc">Tin tức</a></li>
        <li><a href="index.php?quanly=lienhe">Liên hệ</a></li>
        <li><a href="index.php?quanly=giohang">Giỏ hàng</a></li>
        <li><a href="index.php?quanly=dangky">Đăng kí</a></li>
    </ul>
</div>
</div>