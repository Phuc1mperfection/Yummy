<?php
session_start();
      require_once("../components/connection.php");
    $MaDatBan = $_POST["MaDatBan"];
    $trangthai = $_GET["trangthai"];

    $sql ="update datban set
				 Trangthai= $trangthai
			where MaDatBan=$MaDatBan";
			
			
			

                $conn->query($sql) or die($conn->error);
			if ($conn->error == ""){
				$_SESSION["admin_book_table"]="Xác nhận thành công";
				header("Location:admin_home.php?page=admin_book_table");
			} else {
				$_SESSION["admin_book_table"]="Xác nhận thất bại";
				header("Location:admin_home.php?page=admin_book_table");
			}

?>