<p>Thêm sản phẩm</p>
<table border="1" width="80%" style="border-collapse:collapse">
  <form method="POST" action="modules/quanlysp/xuly.php" enctype="multipart/form-data">
    <tr>
      <td>Tên sản phẩm</td>
      <td><input type="text" name="tensanpham"></td>
    </tr>
    <tr>
      <td>Mã sản phẩm</td>
      <td><input type="text" name="masp"></td>
    </tr>
    <tr>
      <td>Giá</td>
      <td><input type="text" name="giasp"></td>
    </tr>
    <tr>
      <td>Số lượng</td>
      <td><input type="text" name="soluong"></td>
    </tr>
    <tr>
      <td>Hình ảnh</td>
      <td>
        <input type="file" name="hinhanh" id="imageInput" accept="image/*">
        <img id="imagePreview" src="#" alt="" style="max-width: 200px; max-height: 200px;"> 
      </td>
    </tr>
    <tr>
      <td>Tóm tắt</td>
      <td><textarea rows="5" name="tomtat"></textarea></td>
    </tr>
    <tr>
      <td>Nội dung</td>
      <td><textarea rows="5" name="noidung"></textarea></td>
    </tr>
    <tr>
      <td>Danh mục sản phẩm</td>
      <td>
        <select name="danhmuc">
          <?php
          $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
          $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
          while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
          ?>
            <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
          <?php
          }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>Tình trạng</td>
      <td>
        <select name="tinhtrang">
          <option value="1">Kích hoạt</option>
          <option value="0">Ẩn</option>
        </select>
      </td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="themsanpham" value="Thêm sản phẩm"></td>
    </tr>
  </form>
</table>

<script>
  const imageInput = document.getElementById('imageInput');
  const imagePreview = document.getElementById('imagePreview');

  imageInput.addEventListener('change', function() {
    if (this.files && this.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        imagePreview.src = e.target.result;
      }
      reader.readAsDataURL(this.files[0]);
    }
  });
</script>