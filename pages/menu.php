<?php

$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);

?>

<?php
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['dangky']);
}
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
        </ul>
        <div class="right-menu">
            <div class="left-part">
            <form action="index.php?quanly=timkiem" method="POST" class="search-form">
                    <div class="input-holder">
                        <input type="text" class="search-input" placeholder="Type to search" name="tukhoa" />
                        <button type="submit" class="search-icon" name="timkiem"><i class="fa-solid fa-magnifying-glass"></i></button>
                    
                    <span class="close" onclick="searchToggle(this, event);"></span>
                </div>
            </form>
            </div>
            <div class="right-part">
            <?php
            if (isset($_SESSION['dangky'])) {
            ?>
                <button onclick="window.location.href='index.php?dangxuat=1'" class="btn-logout btn">Đăng xuất</button>
            <?php
            } else {
            ?>
                <button onclick="window.location.href='index.php?quanly=dangky'" class="btn-register btn">Đăng kí</button>
            <?php
            }
            ?>
            </div>
        </div>
    </div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
