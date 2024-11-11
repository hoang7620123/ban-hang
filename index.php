<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lập trình web</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/8ae1e04fc1.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    session_start();
    include("admincp/config/connect.php");
    include("pages/menu.php"); // Di chuyển menu.php lên đây
    ?>

    <div class="wrapper">
        <?php

        include("pages/main.php");
        include("pages/footer.php");
        ?>
    </div>



</body>

</html>