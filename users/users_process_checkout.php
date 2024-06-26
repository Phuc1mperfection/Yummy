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
$NgayDatHang = $_POST['NgayDatHang']; 

$sql = "INSERT INTO donhang (MaDonHang, MaThanhVien, MaPhuongThuc, TenNguoiNhan, DiaChiNhanHang, email, SDT, NgayDatHang, TrangThai) 
        VALUES ('$MaDonHang', '$MaThanhVien', '$MaPhuongThuc', '$TenNguoiNhan', '$DiaChiNhanHang', '$email', '$SDT', '$NgayDatHang', '$TrangThai')";

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Bạn đặt thành công òi!</h4>
        <hr>
        <p class="mb-0">Đơn hàng của bạn sẽ được chuyển về trang giỏ hàng sau 5 giây.</p>
    </div>
</body>
  <script>
        setTimeout(function(){
            window.location.href = "users_cart.php";
        }, 5000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
