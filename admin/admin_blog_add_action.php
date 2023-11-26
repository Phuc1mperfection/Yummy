<?php
    session_start();
    require_once("../components/connection.php");
	$tenblog=$_POST["txtTenBlog"];
	$thoigiandang=$_POST["txtThoiGianDang"];
	$chude = $_POST["slChuDe"];
    $noidung = $_POST["taNoiDung"];

	$sql="select * From blog where TenBlog like '$tenblog'";
    $result = $conn->query($sql);
	if ($result->num_rows>0){
		$_SESSION["blogs_add_error"]="Tên blog: $tenblog đã có rồi";
        header("Location:admin_blogs_add.php");
    }
    else {
		$sql = "insert into blog(TenBlog,ThoiGianDang,ChuDe,NoiDung) values ('$tenblog','$thoigiandang','$chude','$noidung')";
     
        
        $conn->query($sql) or die($conn->error);
        if($conn->connect_error=="")
        {
            $_SESSION["blogs_error"] = "Them moi thanh cong";
            header("Location:admin_home.php?page=admin_blogs");
        }

        else{
		    $_SESSION["blogs_add_error"] = "Lỗi khi thêm dữ liệu";
		    header("Location:admin_blog_add.php");
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