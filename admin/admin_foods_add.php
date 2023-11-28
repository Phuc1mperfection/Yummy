<?php
    require_once("../components/connection.php");
    if(!isset($_SESSION["admin_foods_add_error"])){
        $_SESSION["admin_foods_add_error"] ="";
    }
?>

<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1 align=center>Thêm mới món ăn</h1>
        <center>
            <font color=red>
                <?php echo $_SESSION["admin_foods_add_error"]?>
            </font>
        </center>
        <form action="admin_foods_add_action.php" method="POST">
            <table border="0" cellspacing=5 cellpadding=5 align="center">
                <tr>
                    <td><input type=hidden name="txtMaMonAn"></td>
                </tr>

                <tr>
                    <td>Tên món ăn:</td>
                    <td><input type=text name="txtTenMonAn"></td>
                </tr>

                <tr>
                    <td>Giá:</td>
                    <td><input type="txt" name="txtGia"></td>
                </tr>

                <tr>
                    <td>Thông tin món ăn:</td>
                    <td><textarea cols=20 rows=6 name=taThongTinMonAn></textarea></td>
                </tr>

                <tr>
                    <td>Trạng thái:</td>
                    <td>
                        <input type="radio" name="rdTrangThai" value="1" checked>Hoạt động
                        <input type="radio" name="rdTrangThai" value="0">Không hoạt động
                    </td>
                </tr>

                <tr>
                    <td>Ảnh:</td>
                    <td><input type="txt" name="txtAnh"></td>
                </tr>

                <tr>
    <td>Mã danh mục:</td>
    <td>
        <select name="txtMaDanhMuc">
            <?php
            $sql = "SELECT * FROM danhmuc";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row["MaDanhMuc"] . '">' . $row["TenDanhMuc"] . '</option>';
            }
            ?>
            </select>
        </td>
    </tr>

                <tr>
                    <td align="right"><input type="submit" value="Gửi đi"></td>
                    <td><input type="reset" value="Hủy bỏ"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php
    $_SESSION["admin_foods_add_error"] = "";  
?>



