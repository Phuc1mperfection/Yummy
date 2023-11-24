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
        echo "<table>";
        echo "<tr><th>Tên đăng nhập</th><th>Email</th><th>Họ tên</th><th>Actions</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["TenDangNhap"] . "</td>";
            echo "<td>" . $row["Email"] . "</td>";
            echo "<td>" . $row["HoTen"] . "</td>";
            echo "<td><button class='edit-btn'>Chỉnh sửa</button><button class='delete-btn'>Xóa</button></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Không có thành viên nào.";
    }
    $conn->close();
    ?>
</body>
</html>