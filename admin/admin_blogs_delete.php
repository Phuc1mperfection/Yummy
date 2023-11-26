<?php
	session_start();
	require_once("../components/connection.php");
	$mablog = $_GET["MaBlog"];
	$sql = "delete from blog where MaBlog = $mablog";
	$conn->query($sql) or die($conn->error);
	if ($conn->error==""){
		$_SESSION["blogs_error"]="Xóa được rồi!";
	} else {
		$_SESSION["blogs_error"]="Delete fail!";
	}
    $conn->close();
	header("Location:admin_home.php?page=admin_blogs");
?>