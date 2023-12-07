<?php
session_start();
require_once("../components/connection.php");
$MaDatBan = $_POST["MaDatBan"];
$trangthai = $_GET["trangthai"];

$sql = "update datban set
				 TrangThai= $trangthai
			where MaDatBan=$MaDatBan";




$conn->query($sql) or die($conn->error);
if ($conn->error == "") {
	echo "<script>
				alert('Xác nhận đơn đặt thành công!');
				setTimeout(function() {
					window.location.replace('admin_home.php?page=admin_book_table');
				}, 2000);
			 </script>";
} else {
	echo "<script>
				alert('Xác nhận đơn đặt không thành công!');
				setTimeout(function() {
					window.location.replace('admin_home.php?page=admin_book_table');
				}, 2000);
			 </script>";
}
