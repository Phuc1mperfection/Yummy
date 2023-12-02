<?php
session_start();
require_once("../components/connection.php");
$cart = $_SESSION['cart_item'];
$user = $_SESSION['tendangnhap'];

$MaMonAn = isset($_POST['MaMonAn']) ? $_POST['MaMonAn'] : '';
$MaDonHang = isset($_POST['MaDonHang']) ? $_POST['MaDonHang'] : '';

$MaThanhVien = $_POST['MaThanhVien'];
$MaPhuongThuc = $_POST['phuongthucthanhtoan'];
$TenNguoiNhan = $_POST['HoTen'];
$DiaChiNhanHang = $_POST['DiaChi'];
$email = $_POST['email'];
$SDT = $_POST['SDT'];
$TrangThai = 0;

$sql = "INSERT INTO donhang (MaDonHang, MaThanhVien, MaPhuongThuc, TenNguoiNhan, DiaChiNhanHang, email, SDT, TrangThai) 
        VALUES ('$MaDonHang', '$MaThanhVien', '$MaPhuongThuc', '$TenNguoiNhan', '$DiaChiNhanHang', '$email', '$SDT', '$TrangThai')";

if (!$conn->query($sql)) {
    echo "Error inserting order: " . $conn->error;
    exit;
}
$oid = $conn->insert_id;
$totalQuantity = 0;
$totalPrice = 0;
foreach ($_SESSION['cart_item'] as $item) {
    $totalQuantity += $item['SoLuong'];
    $totalPrice += $item['SoLuong'] * $item['Gia'];
}

foreach ($_SESSION['cart_item'] as $item) {
    $MaMonAn = $item['MaMonAn'];
    $SoLuong = $item['SoLuong'];
    $Gia = $item['SoLuong'] * $item['Gia'];

    $sql = "INSERT INTO ctdonhang (MaDonHang, MaMonAn, SoLuong, Gia) VALUES ('$oid', '$MaMonAn', '$SoLuong', '$Gia')";
    unset($_SESSION['cart_item']);

    if (!$conn->query($sql)) {
        echo "Error inserting order detail: " . $conn->error;
        exit;
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p><?php echo $_SESSION['success_message']; ?></p>
        <hr>
        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
    </div>
</body>
  <script>
        setTimeout(function(){
            window.location.href = "users_cart.php";
        }, 5000);
    </script>
</html>
