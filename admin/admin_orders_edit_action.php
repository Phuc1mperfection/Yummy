<?php
	session_start();
	require_once("connection.php"); //kết nối CSDL
    $madh = $_GET["madh"];
	$matv=$_POST["txtMaThanhVien"];
	$thoigiandathang=$_POST["txtThoiGianDatHang"];
	$thoigianthanhtoan = $_POST["txtThoiGianThanhToan"];
    $diachi = $_POST["taDiaChiNhanHang"];
    


	$sql ="update dondathang set MaThanhVien='$matv',ThoiGianDatHang='$thoigiandathang',ThoiGianThanhToan='$thoigianthanhtoan',DiaChiNhanHang = '$diachi' where MaDonHang=$madh";
			
			$conn->query($sql) or die($conn->error);
			if ($conn->error == ""){
				$_SESSION["order_error"] = "Update Successful!";
				header("Location:admin_home.php?page=admin_orders");
			} else {
				$_SESSION["order_error"]="Error update data!";
				header("Location:admin_home.php?page=admin_orders");
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