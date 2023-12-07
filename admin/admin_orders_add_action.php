<?php
session_start();
require_once("../components/connection.php");
$matv = $_POST["txtMaThanhVien"];
$thoigiandathang = $_POST["txtThoiGianDatHang"];
$thoigianthanhtoan = $_POST["txtThoiGianThanhToan"];
$diachi = $_POST["taDiaChiNhanHang"];


$sql = "insert into donhang(MaThanhVien,ThoiGianDatHang,ThoiGianThanhToan,DiaChiNhanHang) values ('$matv','$thoigiandathang','$thoigianthanhtoan','$diachi')";


$conn->query($sql) or die($conn->error);
if ($conn->connect_error == "") {
	$_SESSION["order_error"] = "Thêm mới thành công";
	header("Location:admin_home.php?page=admin_orders");
} else {
	$_SESSION["order_add_error"] = "Lỗi khi thêm dữ liệu";
	header("Location:admin_orders_add.php");
}
$conn->close();

?>
<html>

<head>
	<meta charset="utf-8">
	<title>Tiêu đề trang web</title>
</head>

<body>

</body>

</html>