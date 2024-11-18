<style>
    .sidebar {
        height: auto;
        width: 20%;
        margin-top: 5px;
        margin-left: 5px;
        float: left;
        background-color: #fff;
    }

    ul.list_sidebar {
        padding: 0;
        list-style: none;
        margin: 0;
        line-height: 30px;
    }

    ul.list_sidebar li {
        margin: 10px;
        padding: 0;
        background-color: #f1f1f1;
        border: 1px solid black;
    }

    ul.list_sidebar li:hover {
        background: cadetblue;
        border: 1px solid cadetblue;
    }

    ul.list_sidebar li a {
        text-decoration: none;
        color: #000000;
        font-weight: bold;
    }

    #sidebar-btn {
        width: 100%;
        height: auto;
        border: none;
        background-color: #fff;
        padding: 10px;
        text-align: center;
        /* Center align text */
        font-weight: bold;
    }

    #sidebar-btn:hover {
        background-color: cadetblue;
        color: white;
        border: 1px solid cadetblue;
    }
</style>
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