<?php
	session_start();
	require_once("connection.php"); //kết nối CSDL
	$madh = $_GET["madh"];
	$sql = "delete from dondathang where MaDonHang = $madh";
	$conn->query($sql) or die($conn->error);
	if ($conn->error==""){
		$_SESSION["order_error"]="Delete successful!";
	} else {
		$_SESSION["order_error"]="Delete fail!";
	}
    $conn->close();
	header("Location:admin_home.php?page=admin_orders");
?>