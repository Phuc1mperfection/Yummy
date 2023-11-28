<?php
    session_start();
    require_once("../components/connection.php");
    $MaMonAn=$_POST["txtMaMonAn"];
    $TenMonAn=$_POST["txtTenMonAn"];
    $Gia=$_POST["txtGia"];
    $ThongTinMonAn=$_POST["taThongTinMonAn"];
    $TrangThai=$_POST["rdTrangThai"];
	$Anh=$_POST["txtAnh"];
	$MaDanhMuc=$_POST["txtMaDanhMuc"];
    $sql = "select * from monan where MaMonAn like '$MaMonAn'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        $_SESSION["admin_foods_add_error"] = "$MaMonAn already exitst!";
        header("Location:admin_home.php?page=admin_foods_add");
    } else{
        $sql = "insert into monan(MaMonAn, TenMonAn, Gia, ThongTinMonAn, TrangThai, Anh, MaDanhMuc) values ('$MaMonAn',' $TenMonAn','$Gia', '$ThongTinMonAn','$TrangThai','$Anh','$MaDanhMuc')";
        $conn->query($sql) or die($conn->error);
        if($conn->error==""){
            $_SESSION["foods_error"] = "Thêm mới món ăn thành công!";
            header("Location:admin_home.php?page=admin_foods");
        } else {
            $_SESSION["admin_foods_add_error"]="Thêm mới món ăn thất bại! Vui lòng thử lại !";
            header("Location:admin_home.php?page=admin_foods_add");
        }

    }
?>