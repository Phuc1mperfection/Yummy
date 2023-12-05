<?php
session_start();

$matv = $_GET["matv"];
$loaiban = $_POST["slloaiban"];
$thoigianhenden = $_POST["thoigianhenden"];
$thoigiandat = date("Y-m-d H:i:s");

require_once("../components/connection.php");

$sql = "INSERT INTO `datban` (`Maban`, `Mathanhvien`, `Thoigiandat`, `Thoigianhenden`, `Trangthai`)
VALUES ('$loaiban', '$matv', '$thoigianhenden', '$thoigiandat', 1)";

$conn->query($sql) or die($conn->error);

if ($conn->connect_error == "") {
    $_SESSION["book_table"] = "Đặt bàn thành công";
    header("Location:users_book_table.php");
} else {
    $_SESSION["book_table"] = "Đặt bàn không thành công";
    header("Location:users_book_table.php");
}
        
?>

