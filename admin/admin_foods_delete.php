<?php
    session_start();
    require_once("../components/connection.php");
    if(isset($_GET['MaMonAn'])){
        $MaMonAn = $_GET['MaMonAn'];

        // Xóa sản phẩm từ database
        $sql = "DELETE FROM monan WHERE MaMonAn = $MaMonAn";
        if ($conn->query($sql) === TRUE) {
            $_SESSION["foods_error"] = "Món ăn đã được xóa thành công!";
        } else {
            $_SESSION["foods_error"] = "Lỗi không xóa được sản phẩm: " . $conn->error;
        }

        // Chuyển hướng người dùng về trang danh sách sản phẩm
        header("Location: admin_home.php?page=admin_foods");
        exit();
    } else {
        $_SESSION["foods_error"] = "Mã món ăn không hợp lệ";
        header("Location: admin_home.php?page=admin_foods");
        exit();
    }

    $conn->close();
?>