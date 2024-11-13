<?php

$cart = $_SESSION['cart'] ?? [];

$user = $_SESSION['user'] ?? null;


// Tính tổng tiền
$total = 0;
foreach ($cart as $item) {
    $total += $item['giasp'];
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kiểm tra thông tin</title>
    <style>
    .container-infor {
        display: flex;
    }
    .infor-sp {
        flex: 7; /* Tăng độ rộng của phần thông tin sản phẩm */
        border: 1px solid black;
        margin: 10px;
        padding: 10px;
        width: 1000px;
        height: auto;
    }
    .cap {
        text-align: center;
    }
    .ndung-sp {
        border: 1px solid black; /* Add border to ndung-sp */
        width: 100%;
        border-collapse: collapse;
    }
    .ndung-sp th, .ndung-sp td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }
    .infor-payment {
        flex: 5; /* Tăng độ rộng của phần thông tin thanh toán */
        border: 1px solid black;
        margin: 10px;
        padding: 10px;
        height: 800px;
    }
    #cap-pay {
        text-align: center;
    }
    .checkbox-wrapper-39 * {
        box-sizing: border-box;
        margin: 10px 0;
    }

    .checkbox-wrapper-39 label {
        display: flex;
        align-items: center;
        cursor: pointer;
        margin-bottom: 10px;
    }

    .checkbox-wrapper-39 input {
        visibility: hidden;
        display: none;
    }

    .checkbox-wrapper-39 input:checked ~ .checkbox {
        transform: rotate(45deg);
        width: 14px;
        margin-left: 12px;
        border-color: #24c78e;
        border-top-color: transparent;
        border-left-color: transparent;
        border-radius: 0;
    }

    .checkbox-wrapper-39 .checkbox {
        display: block;
        width: 35px;
        height: 35px;
        border: 3px solid #434343;
        border-radius: 6px;
        transition: all 0.375s;
        margin-right: 10px;
    }
    #submit{
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }
    #submit:hover {
        background-color: white;
        color: #4CAF50;
        opacity: 0.8;
            border: 1px solid #4CAF50;
        }
</style>

</head>
<body>
<div class="container-infor">
    <div class="infor-sp">
        <div class="cap"> <h2>Thông tin sản phẩm</h2></div>
       
        <table class="ndung-sp">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá sản phẩm</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($cart as $item): ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td> 
                                        <td><?php echo htmlspecialchars($item['tensanpham']); ?></td>
                                        <td><?php echo $item['giasp']; ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="infor-payment">
        <h2 id="cap-pay">Thông tin thanh toán</h2>
        <p id="cap-pay">Tổng tiền: <?php echo $total; ?> VND</p>
        <h3 id="cap-pay">Phương thức thanh toán</h3>
        <form action="thanhtoan.php" method="post">
            <label for="payment-method">Chọn phương thức thanh toán:</label><br>
            <div class="checkbox-wrapper-39">

            <label>
                <input type="radio" name="payment-method" value="credit-card"/>
                <span class="checkbox"></span> Thanh toán thẻ
            </label>

            <label>
                <input type="radio" name="payment-method" value="momo"/>
                <span class="checkbox"></span>Thanh toán qua momo
            </label>            
            <label>
                <input type="radio" name="payment-method" value="cash-on-delivery"/>
                <span class="checkbox"></span> Thanh toán khi nhận hàng
            </label>
                </div>
            <br><br>
            <?php
                if (isset($_SESSION['dangky'])) {
                ?>
                    <button id="submit" type="submit" formaction="pages/main/thanhtoan.php">Xác nhận</button>
                <?php
                } else {
                ?>
                    <button type="button" onclick="window.location.href='index.php?quanly=dangky'">Đăng ký đặt hàng</button>
                <?php
                }
                ?>
        </form>
    </div>
</div>
</body>
</html>