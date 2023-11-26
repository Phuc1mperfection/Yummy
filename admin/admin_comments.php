<?php
require_once("../components/connection.php");
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM gopy WHERE MaGopY = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: admin_home.php?page=admin_comments");
    exit;
    $stmt->close();

}

$sql = "SELECT gopy.*, thanhvien.hoten FROM gopy INNER JOIN thanhvien ON gopy.MaThanhVien = thanhvien.MaThanhVien";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$comments = $result->fetch_all(MYSQLI_ASSOC);

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Admin Comments</h1>

<table width = 100%>
    <thead align="center">
        <tr>
            <th>HoTen</th>
            <th>ChuDe</th>
            <th>NoiDung</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($comments as $comment): ?>
            <tr align="center">
                <td><?php echo $comment['hoten']; ?></td>
                <td><?php echo $comment['ChuDe']; ?></td>
                <td><?php echo $comment['NoiDung']; ?></td>
                <td><button onclick="if(confirm('Bạn chắc chưa?')) { window.location.href='admin_comments.php?delete=<?php echo $comment['MaGopY']; ?>' }" class="btn btn-danger">Delete</button></td>             </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
