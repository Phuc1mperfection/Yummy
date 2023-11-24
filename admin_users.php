<?php
require_once("connection.php");
$sql = "SELECT * FROM thanhvien";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php
if ($result->num_rows > 0) {
?>
    <table width = 100%>
        <tr>
            <th>Mã thành viên</th>
            <th>Tên đăng nhập</th>
            <th>Email</th>
            <th>Họ tên</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row["MaThanhVien"]; ?></td>
            <td><?php echo $row["TenDangNhap"]; ?></td>
            <td><?php echo $row["Email"]; ?></td>
            <td><?php echo $row["HoTen"]; ?></td>
            <td><?php echo $row["DiaChi"]; ?></td>
            <td><?php echo $row["SDT"]; ?></td>   
            <td>
            <button class="btn btn-primary btn-lg" onclick="window.location.href='admin_users_edit.php?MaThanhVien=<?php echo $row['MaThanhVien']; ?>'">Chỉnh sửa</button>            <button class='delete-btn'>Xóa</button>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    
<?php
} else {
    echo "Không có thành viên nào.";
}
$conn->close();
?>
</body>
</html>