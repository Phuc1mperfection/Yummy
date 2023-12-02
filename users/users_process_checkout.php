<?php
session_start();
require_once("../components/connection.php");
$cart = $_SESSION['cart_item'];
$user = $_SESSION['tendangnhap'];
$MaDonHang = $_POST['MaDonHang'];
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

    $sql = "INSERT INTO ctdonhang (MaDonHang, SoLuong, Gia) VALUES ('$oid', '$totalQuantity', '$totalPrice')";

    if (!$conn->query($sql)) {
        echo "Error inserting order detail: " . $conn->error;
        exit;
    }else {
        $_SESSION['success_message'] = "Order placed successfully!";
        unset($_SESSION['cart_item']);
        header("Location:users_cart.php");
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
    <!-- Optional: Add any HTML content or messages here -->
</body>
</html>
