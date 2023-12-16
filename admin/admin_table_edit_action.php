<?php
session_start();
require_once("../components/connection.php");
$MaBan = $_GET["MaBan"];
$loaiban=$_POST["txtloaiban"];
$ghichu=$_POST["txtghichu"];
$anhban = $_POST["txtanhban"];
$soluong = $_POST["txtsoluong"];
$soluongconlai = $_POST["txtsoluongconlai"];

// Include MaLoaiBlog in your SQL update query
$sql ="update ban set LoaiBan='$loaiban',GhiChu='$ghichu',AnhBan='$anhban',SoLuong = $soluong,SoLuongConLai=$soluongconlai where MaBan=$MaBan";

$conn->query($sql) or die($conn->error);
if ($conn->error == ""){
    echo "<script>
    alert('Cập nhật thành công!');
    setTimeout(function() {
        window.location.replace('admin_home.php?page=admin_table');
    }, 1);
 </script>";
} else {
    echo "<script>
    alert('Cập nhật không thành công!');
    setTimeout(function() {
        window.location.replace('admin_home.php?page=admin_table');
    }, 1);
 </script>";
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