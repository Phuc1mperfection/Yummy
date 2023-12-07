<?php
session_start();

$matv = $_GET["matv"];
$loaiban = $_POST["slloaiban"];
$thoigianhenden = $_POST["thoigianhenden"];
$thoigiandat = date("Y-m-d H:i:s");

require_once("../components/connection.php");

$sql = "INSERT INTO `datban` (`Maban`, `Mathanhvien`, `Thoigiandat`, `Thoigianhenden`, `Trangthai`) VALUES ('$loaiban', '$matv', '$thoigiandat', '$thoigianhenden', '1')";

$conn->query($sql) or die($conn->error);

if ($conn->connect_error == "") {
    echo "<script>
    alert('Đặt bàn thành công, Cảm ơn Quý khách đã sử dụng dịch vụ!');
    setTimeout(function() {
        window.location.replace('users_book_table.php');
    }, 2000);
 </script>";
} else {
    echo "<script>
    alert('Đặt bàn không thành công');
    setTimeout(function() {
        window.location.replace('users_book_table.php');
    }, 2000);
 </script>";
}
