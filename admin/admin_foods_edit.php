<?php
require_once("../components/connection.php");
if (!isset($_SESSION["foods_edit_erorr"])) {
    $_SESSION["foods_edit_erorr"] = "";
}
if (isset($_GET["MaMonAn"])) {
    $MaMonAn = $_GET["MaMonAn"];
} else {
    header("Location:admin_home.php?page=admin_foods");
    exit;
}
$sql = "select * from monan where MaMonAn=$MaMonAn;";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    $_SESSION["foods_error"] = "Món ăn không tồn tại";
    header("Location:admin_home.php?page=admin_foods");
} else {
    $row = $result->fetch_assoc();
}
?>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <h1 align=center>Sửa thông tin món ăn</h1>
    <center>
        <font color=red>
            <?php echo $_SESSION["foods_edit_erorr"] ?>
        </font>
    </center>
    <form method="POST" action="admin_foods_edit_action.php?MaMonAn=<?php echo $MaMonAn; ?>">
        <table border="0" align="center" width=400>
            <tr>
                <td>Tên món ăn:</td>
                <td><input type="text" name=txtTenMonAn value=<?php echo $row["TenMonAn"] ?>></td>
            </tr>

            <tr>
                <td>Giá:</td>
                <td><input type="text" name="txtGia" value=<?php echo $row["Gia"] ?>></td>
            </tr>


            <tr>
                <td>Thông tin món ăn:</td>
                <td><textarea cols="30" rows="10" name="taThongTinMonAn" value=> <?php echo $row["ThongTinMonAn"] ?></textarea></td>
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
                <td><input type=text name="txtAnh" value=<?php echo $row["Anh"] ?>></td>
            </tr>


            <tr>
                <td>Mã danh mục:</td>
                <td><input type="text" name="txtMaDanhMuc" value=<?php echo $row["MaDanhMuc"] ?>></td>
            </tr>


            <tr>
                <td align="right"><input type=submit value="Cập nhật"></td>
                <td><input type="reset" value="Reset"></td>
            </tr>
        </table>

    </form>
</body>

</html>
<?php
$conn->close();

?>