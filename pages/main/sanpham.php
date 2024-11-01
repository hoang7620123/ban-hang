<p>chi tiết sản phẩm</p>
<?php
$sql_chitiet = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
$query_chitiet = mysqli_query($mysqli, $sql_chitiet);
while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
?>
<div class="wrapper_detail">
    <div class="hinhanh_sanpham">
        <img width="50%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
    </div>
    <form method="POST" action="#">
        <div class="chitiet_sanpham">
            <h3 style="text-align:left"> <?php echo $row_chitiet['tensanpham'] ?></h3>
            <p> <?php echo number_format($row_chitiet['giasp']) . 'VND' ?></p>
            <!-- Voucher -->
            <div class="voucher">
                <button class="voucher_button">Voucher của Levents</button>
            </div>

            <!-- Chọn màu -->
            <div class="color_selector">
                <legend>Color</legend>
                <div>Tan</div>
            </div>

            <!-- Phần chọn size -->
            <div class="size_selector">
                <label>Size</label>
                <div class="size_options">
                    <button class="size_button">Size 0</button>
                    <button class="size_button">Size 1</button>
                    <button class="size_button">Size 2</button>
                    <button class="size_button">Size 3</button>
                    <button class="size_button">Size 4</button>
                </div>
            </div>

            <!-- Phần chọn số lượng -->
            <div class="quantity_selector">
                <label>Số lượng</label>
                <button type="button" onclick="decrementQuantity()">-</button>
                <input type="text" id="quantity" value="1" readonly>
                <button type="button" onclick="incrementQuantity()">+</button>
            </div>

            <!-- Nút thêm vào giỏ hàng và mua ngay -->
            <div class="action_buttons">
                <button class="add_to_cart_button">Thêm vào giỏ hàng</button>
                <button class="buy_now_button">Mua ngay</button>
            </div>
        </div>
    </form>

</div>
<?php
}
?>
<script>
// Tăng số lượng
function incrementQuantity() {
    let quantityInput = document.getElementById("quantity");
    quantityInput.value = parseInt(quantityInput.value) + 1;
}

// Giảm số lượng
function decrementQuantity() {
    let quantityInput = document.getElementById("quantity");
    if (parseInt(quantityInput.value) > 1) {
        quantityInput.value = parseInt(quantityInput.value) - 1;
    }
}

// Chọn size
document.querySelectorAll(".size_button").forEach(button => {
    button.addEventListener("click", function() {
        document.querySelectorAll(".size_button").forEach(btn => btn.classList.remove("active"));
        this.classList.add("active");
    });
});
</script>