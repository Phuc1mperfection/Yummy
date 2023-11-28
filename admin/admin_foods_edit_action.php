<?php
	session_start();
	require_once("../components/connection.php");
	$MaMonAn = $_GET["MaMonAn"];
	$TenMonAn = mysqli_real_escape_string($conn, $_POST["txtTenMonAn"]);
	$Gia = $_POST["txtGia"];
	$ThongTinMonAn = mysqli_real_escape_string($conn, $_POST["taThongTinMonAn"]);
	$TrangThai = $_POST["rdTrangThai"];
	$Anh = $_POST["txtAnh"];
	$MaDanhMuc = $_POST["txtMaDanhMuc"];

	$sql = "SELECT * FROM monan WHERE TenMonAn = '$TenMonAn' AND MaMonAn <> $MaMonAn";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$_SESSION["foods_edit_error"] = "$TenMonAn already exists!";
		header("Location: admin_home.php?page=admin_foods_edit");
	} else {
		$sql = "UPDATE monan SET
				TenMonAn='$TenMonAn',
				Gia='$Gia',
				ThongTinMonAn='$ThongTinMonAn',
				TrangThai=$TrangThai,
				Anh='$Anh',
				MaDanhMuc='$MaDanhMuc'
				WHERE MaMonAn=$MaMonAn";

		$conn->query($sql) or die($conn->error);

		if (empty($conn->error)) {
			$_SESSION["foods_error"] = "Sửa thông tin sản phẩm thành công!";
			header("Location: admin_home.php?page=admin_foods");
		} else {
			$_SESSION["foods_edit_error"] = "Xảy ra lỗi, vui lòng thử lại!";
			header("Location: admin_home.php?page=admin_foods");
		}
		$conn->close();
	}
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Tiêu đề trang web</title>
	</head>
	<body>
	</body>
</html>
