<?php
	session_start();
	require_once("../components/connection.php");
	$MaBan = $_GET["MaBan"];
	$sql = "delete from ban where MaBan = $MaBan";
	$conn->query($sql) or die($conn->error);
	if ($conn->error==""){
		echo "<script>
    alert('Xóa thành công!');
    setTimeout(function() {
        window.location.replace('admin_home.php?page=admin_table');
    }, 1);
 </script>";
	} else {
		echo "<script>
    alert('Xóa không thành công!');
    setTimeout(function() {
        window.location.replace('admin_home.php?page=admin_table');
    }, 1);
 </script>";
	}
    $conn->close();
	
?>