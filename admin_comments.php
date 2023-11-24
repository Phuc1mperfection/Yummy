<?php
require_once("connection.php");

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

<!-- HTML -->
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
                <td><button onclick="if(confirm('Are you sure you want to delete this comment?')) { window.location.href='admin_comments.php?delete=<?php echo $comment['MaGopY']; ?>' }" class="btn btn-danger">Delete</button></td>             </tr>
        <?php endforeach; ?>
    </tbody>
</table>