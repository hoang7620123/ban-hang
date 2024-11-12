<?php
session_start(); // Bắt đầu session
include('../../admincp/config/connect.php'); // Kết nối đến cơ sở dữ liệu

// Tăng số lượng sản phẩm trong giỏ hàng
if (isset($_GET['cong'])) {
    $id = $_GET['cong']; // Lấy ID sản phẩm cần tăng số lượng
    foreach ($_SESSION['cart'] as $cart_item) { // Duyệt qua từng sản phẩm trong giỏ hàng
        if ($cart_item['id'] != $id) { // Nếu ID sản phẩm không trùng với ID cần tăng
            // Giữ nguyên thông tin sản phẩm
            $product[] = array(
                'tensanpham' => $cart_item['tensanpham'], 
                'id' => $cart_item['id'], 
                'soluong' => $cart_item['soluong'], 
                'giasp' => $cart_item['giasp'], 
                'hinhanh' => $cart_item['hinhanh'], 
                'masp' => $cart_item['masp']
            );
            $_SESSION['cart'] = $product; 
 // Cập nhật lại giỏ hàng
        } else { // Nếu ID sản phẩm trùng với ID cần tăng
            $tangsoluong = $cart_item['soluong'] + 1; // Tăng số lượng lên 1
            if ($cart_item['soluong'] < 9) { // Kiểm tra số lượng sản phẩm có nhỏ hơn 9 không
                // Cập nhật số lượng sản phẩm
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'], 
                    'id' => $cart_item['id'], 
                    'soluong' => $tangsoluong, // Số lượng mới
                    'giasp' => $cart_item['giasp'], 
                    'hinhanh' => $cart_item['hinhanh'], 
                    'masp' => $cart_item['masp']
                );
            } else { // Nếu số lượng sản phẩm đã đạt giới hạn (9)
                // Giữ nguyên thông tin sản phẩm
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'], 
                    'id' => $cart_item['id'], 
                    'soluong' => $cart_item['soluong'], 
                    'giasp' => $cart_item['giasp'], 
                    'hinhanh' => $cart_item['hinhanh'], 
                    'masp' => $cart_item['masp']
                );
            }
            $_SESSION['cart'] = $product;
 // Cập nhật lại giỏ hàng
        }
    }
    header('Location:../../index.php?quanly=giohang'); // Chuyển hướng đến trang giỏ hàng
}

// Giảm số lượng sản phẩm trong giỏ hàng
if (isset($_GET['tru'])) {
    $id = $_GET['tru']; // Lấy ID sản phẩm cần giảm số lượng
    foreach ($_SESSION['cart'] as $cart_item) { // Duyệt qua từng sản phẩm trong giỏ hàng
        if ($cart_item['id'] != $id) { // Nếu ID sản phẩm không trùng với ID cần giảm
            // Giữ nguyên thông tin sản phẩm
            $product[] = array(
                'tensanpham' => $cart_item['tensanpham'], 
                'id' => $cart_item['id'], 
                'soluong' => $cart_item['soluong'], 
                'giasp' => $cart_item['giasp'], 
                'hinhanh' => $cart_item['hinhanh'], 
                'masp' => $cart_item['masp']
            );
            $_SESSION['cart'] = $product;
 // Cập nhật lại giỏ hàng
        } else { // Nếu ID sản phẩm trùng với ID cần giảm
            $tangsoluong = $cart_item['soluong'] - 1; // Giảm số lượng đi 1
            if ($cart_item['soluong'] > 1) { // Kiểm tra số lượng sản phẩm có lớn hơn 1 không
                // Cập nhật số lượng sản phẩm
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'], 
                    'id' => $cart_item['id'], 
                    'soluong' => $tangsoluong, // Số lượng mới
                    'giasp' => $cart_item['giasp'], 
                    'hinhanh' => $cart_item['hinhanh'], 
                    'masp' => $cart_item['masp']
                );
            } else { // Nếu số lượng sản phẩm đã đạt giới hạn (1)
                // Giữ nguyên thông tin sản phẩm
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'], 
                    'id' => $cart_item['id'], 
                    'soluong' => $cart_item['soluong'], 
                    'giasp' => $cart_item['giasp'], 
                    'hinhanh' => $cart_item['hinhanh'], 
                    'masp' => $cart_item['masp']
                );
            }
            $_SESSION['cart'] = $product;
 // Cập nhật lại giỏ hàng
        }
    }
    header('Location:../../index.php?quanly=giohang'); // Chuyển hướng đến trang giỏ hàng
}

// Xóa sản phẩm khỏi giỏ hàng
if (isset($_SESSION['cart']) && isset($_GET['xoa'])) {
    $id = $_GET['xoa']; // Lấy ID sản phẩm cần xóa
    foreach ($_SESSION['cart'] as $cart_item) { // Duyệt qua từng sản phẩm trong giỏ hàng
        if ($cart_item['id'] != $id) { // Nếu ID sản phẩm không trùng với ID cần xóa
            // Giữ nguyên thông tin sản phẩm
            $product[] = array(
                'tensanpham' => $cart_item['tensanpham'], 
                'id' => $cart_item['id'], 
                'soluong' => $cart_item['soluong'], 
                'giasp' => $cart_item['giasp'], 
                'hinhanh' => $cart_item['hinhanh'], 
                'masp' => $cart_item['masp']
            );
        }
        $_SESSION['cart'] = $product;
 // Cập nhật lại giỏ hàng
        header('Location:../../index.php?quanly=giohang'); // Chuyển hướng đến trang giỏ hàng
    }
}

// Xóa tất cả sản phẩm khỏi giỏ hàng
if (isset($_GET['xoatatca']) && $_GET['xoatatca'] == 1) {
    unset($_SESSION['cart']); // Xóa session giỏ hàng
    header('Location:../../index.php?quanly=giohang'); // Chuyển hướng đến trang giỏ hàng
}

// Thêm sản phẩm vào giỏ hàng
if (isset($_POST['themgiohang'])) { 
    // Nếu người dùng bấm nút Thêm vào giỏ hàng
    $id = $_GET['idsanpham']; // Lấy ID sản phẩm từ URL
    $soluong = 1; // Thiết lập số lượng sản phẩm ban đầu là 1

    // Truy vấn cơ sở dữ liệu để lấy thông tin sản phẩm
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='" . $id . "' LIMIT 1"; // Câu truy vấn SQL
    $query = mysqli_query($mysqli, $sql); // Thực thi truy vấn
    $row = mysqli_fetch_array($query); // Lấy kết quả truy vấn

    if ($row) { // Kiểm tra xem có sản phẩm nào được tìm thấy hay không
        // Tạo mảng chứa thông tin sản phẩm mới
        $new_product = array(array(
            'tensanpham' => $row['tensanpham'], // Tên sản phẩm
            'id' => $id, // ID sản phẩm
            'soluong' => $soluong, // Số lượng
            'giasp' => $row['giasp'], // Giá sản phẩm
            'hinhanh' => $row['hinhanh'], // Hình ảnh sản phẩm
            'masp' => $row['masp'] // Mã sản phẩm
        ));

        // Kiểm tra session giỏ hàng
        if (isset($_SESSION['cart'])) { // Nếu đã có session giỏ hàng
            $found = false; // Khởi tạo biến kiểm tra xem sản phẩm đã có trong giỏ hàng hay chưa
            foreach ($_SESSION['cart'] as $cart_item) { // Duyệt qua từng sản phẩm trong giỏ hàng
                // Nếu sản phẩm đã tồn tại trong giỏ hàng
                if ($cart_item['id'] == $id) { 
                    $product[] = array(
                        'tensanpham' => $cart_item['tensanpham'],
                        'id' => $cart_item['id'],
                        'soluong' => $soluong + 1, // Tăng số lượng lên 1
                        'giasp' => $cart_item['giasp'],
                        'hinhanh' => $cart_item['hinhanh'],
                        'masp' => $cart_item['masp']
                    );
                    $found = true; // Đánh dấu là đã tìm thấy sản phẩm
                } else { 
                    // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm sản phẩm vào mảng $product
                    $product[] = array(
                        'tensanpham' => $cart_item['tensanpham'],
                        'id' => $cart_item['id'],
                        'soluong' => $soluong,
                        'giasp' => $cart_item['giasp'],
                        'hinhanh' => $cart_item['hinhanh'],
                        'masp' => $cart_item['masp']
                    );
                }
            }

            if ($found == false) { // Nếu sản phẩm chưa có trong giỏ hàng
                // Gộp mảng sản phẩm mới vào giỏ hàng
                $_SESSION['cart'] = array_merge($product, $new_product); 
            } else { // Nếu sản phẩm đã có trong giỏ hàng
                // Cập nhật giỏ hàng với mảng $product đã được cập nhật số lượng
                $_SESSION['cart'] = $product; 
            }
        } else { // Nếu chưa có session giỏ hàng
            // Tạo session giỏ hàng và gán giá trị là mảng sản phẩm mới
            $_SESSION['cart'] = $new_product; 
        }
    }

    // Chuyển hướng đến trang giỏ hàng
    header('Location:../../index.php?quanly=giohang'); 
}
