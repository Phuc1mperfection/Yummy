<?php
require_once("../components/connection.php");
$sql = "SELECT * FROM danhmuc";
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
<h1>Danh mục</h1>
<?php

if ($result->num_rows > 0) {
?>
    <table width="100%">
        <tr>
            <th >Mã Danh mục</th>
            <th>Tên Danh mục</th>
            <th>Cập nhật</th>
            <th>Xóa</th>
        </tr>
        <?php
        $firstRow = true; 
        while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row["MaDanhMuc"]; ?></td>
                <td><?php echo $row["TenDanhMuc"]; ?></td>
                <td><button type="button" class="btn btn-primary"  onclick="window.location.href='admin_categories_edit.php?action=edit&MaDanhMuc=<?php echo $row["MaDanhMuc"]; ?>'">Cập nhật</button></td>
                <td><button type="button" class="btn btn-danger" onclick="if(confirm('Are you sure?')) window.location.href='admin_categories_edit.php?action=delete&MaDanhMuc=<?php echo $row["MaDanhMuc"]; ?>'">Xóa</button></td>
            </tr>
            <?php
            if ($firstRow) {
                echo "<center><a href='admin_categories_edit.php?action=insert&MaDanhMuc={$row["MaDanhMuc"]}' style='background-color: #4CAF50;' class='btn btn-success'>Thêm một danh mục</a></center>";                $firstRow = false; 
            }
        endwhile;
        ?>
    </table>
<?php
} else {
    echo "Không có thành viên nào.";
}
$conn->close();
?>
</body>
</html>
