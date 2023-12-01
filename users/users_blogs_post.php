<?php
session_start();
require_once("../components/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tenBlog = $_POST["txtTenBlog"];
    $thoiGianDang = $_POST["txtThoiGianDang"];
    $maLoaiBlog = $_POST["txtMaLoaiBlog"];
    $noiDung = $_POST["taNoiDung"];
    
    if (isset($_FILES["AnhBlog"]) && $_FILES["AnhBlog"]["error"] == 0) {
        $target_dir = "assets/img/blog/";
        $target_file = $target_dir . basename($_FILES["AnhBlog"]["name"]);
        move_uploaded_file($_FILES["AnhBlog"]["tmp_name"], $target_file);
    } else {
        $target_file = null;
    }

    $sqlInsert = "INSERT INTO blog (TenBlog, ThoiGianDang, MaLoaiBlog, NoiDung, AnhBlog) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sqlInsert);
    $stmt->bind_param("ssiss", $tenBlog, $thoiGianDang, $maLoaiBlog, $noiDung, $target_file);

} 


if ($stmt->execute()) {
    $_SESSION["blogs_error"] = "Them moi thanh cong";
    header("Location:users_blogs.php");
} else {
    $_SESSION["blogs_add_error"] = "Lỗi khi thêm dữ liệu";
    header("Location:users_blogs.php");
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