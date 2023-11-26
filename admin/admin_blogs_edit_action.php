<?php
	session_start();
	require_once("../components/connection.php");
	$mablog = $_GET["MaBlog"];
	$tenblog=$_POST["txtTenBlog"];
	$thoigiandang=$_POST["txtThoiGianDang"];
	$chude = $_POST["slChuDe"];
    $noidung = $_POST["taNoiDung"];
    


	$sql ="update blog set TenBlog='$tenblog',ThoiGianDang='$thoigiandang',ChuDe='$chude',NoiDung = '$noidung' where MaBlog=$mablog";
			
			$conn->query($sql) or die($conn->error);
			if ($conn->error == ""){
				$_SESSION["blogs_error"] = "Update Successful!";
				header("Location:admin_home.php?page=admin_blogs");
			} else {
				$_SESSION["blogs_edit_error"]="Error update data!";
				header("Location:admin_home.php?page=admin_blogs");
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