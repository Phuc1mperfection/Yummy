<?php
require_once("../components/connection.php");
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM gopy WHERE MaGopY = $id";
    $conn->query($sql);
    header("Location: admin_home.php?page=admin_comments");
    exit;
}

$sql = "SELECT gopy.*, thanhvien.hoten FROM gopy INNER JOIN thanhvien ON gopy.MaThanhVien = thanhvien.MaThanhVien";
$result = $conn->query($sql);
$comments = $result->fetch_all(MYSQLI_ASSOC);

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
    <style>
    table {
  width: 80%;
  margin: 20px auto;
  font-size:20px;
    text-align: center;}

      th, td {
        border: 2px solid #ddd;
        padding: 10px;
        text-align: center;
      }

      th {
        background-color: #af634c;
        color: white;
        font-size: 22px;
      }

      img {
        max-width: 100%;
        height: auto;
      }
      body{
        background-color: #f2f2f2;
      }
      /* Để làm cho ảnh có góc bo tròn */
      img {
        border-radius: 5px;
      }
    </style>
<h2>Admin Comments</h2>

<table width = 100%>
    <thead align="center">
        <tr>
            <th>Họ tên</th>
            <th>Chủ đề</th>
            <th>Nội dung</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($comments as $comment): ?>
            <tr align="center">
                <td><?php echo $comment['hoten']; ?></td>
                <td><?php echo $comment['ChuDe']; ?></td>
                <td><?php echo $comment['NoiDung']; ?></td>
                <td><button onclick="if(confirm('Bạn chắc chưa?')) { window.location.href='admin_comments.php?delete=<?php echo $comment['MaGopY']; ?>' }" class="btn btn-danger">Xóa</button></td>             </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
