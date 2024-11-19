<?php
ob_start();
?>
<div class="sidebar">
    <ul class="list_sidebar">
        <?php
        $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
        $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
        while ($row = mysqli_fetch_array($query_danhmuc)) {
        ?>
            <li>
                <button id="sidebar-btn"
                    onclick="location.href='index.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc'] ?>'">
                    <?php echo $row['tendanhmuc'] ?>
                </button>
            </li>
        <?php
        }
        ?>
    </ul>
</div>