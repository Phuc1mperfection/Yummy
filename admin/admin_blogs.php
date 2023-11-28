<?php
require_once("../components/connection.php");
$sql = "SELECT blog.*, loaiblog.TenLoaiBlog FROM blog JOIN loaiblog ON blog.MaLoaiBlog = loaiblog.MaLoaiBlog";
$result = $conn->query($sql);
if(!isset( $_SESSION["blogs_error"]))
{
    $_SESSION["blogs_error"]="";
}
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
    <h1> Blogs </h1>
    <center>
    <a href="admin_home.php?page=admin_blogs_add" style="
        display: inline-block;
        padding: 10px 20px;
        color: white;
        background-color: #4CAF50;
        text-decoration: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
    ">Thêm một blog mới</a></center>	
<center><font color=aqua><?php echo $_SESSION["blogs_error"];?></font></center>
    <table width = 85%>
        <tr>
            <th>Mã Blog</th>
            <th>Tên Blog</th>
            <th>Thời gian đăng</th>
            <th width = 10%>Loại(Chủ đề)</th>
            <th>Nội dung</th>
            <th>Cập nhật</th>
            <th>Xóa</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row["MaBlog"]; ?></td>
            <td><?php echo $row["TenBlog"]; ?></td>
            <td><?php echo $row["ThoiGianDang"]; ?></td>
            <td><?php echo $row["TenLoaiBlog"]; ?></td>
            <td><?php echo $row["NoiDung"]; ?></td>
            <td><button type="button" class="btn btn-primary" onclick="window.location.href='admin_home.php?page=admin_blogs_edit&mablog=<?php echo $row['MaBlog']; ?>'">Cập nhật</button> </td>
            <td><button type="button" class="btn btn-danger" onclick="if(confirm('Bạn chắc chưa?')) window.location.href='admin_blogs_delete.php?MaBlog=<?php echo $row['MaBlog']; ?>'">Xóa</button>     
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    
<?php
} else {
    echo " <tr> <h1> Không có blog nào. </h1> </tr>";
}
$conn->close();
?>
</body>
</html>
<?php
	$_SESSION["blogs_add_error"]="";
    $_SESSION["blogs_error"]="";
    $_SESSION["blogs_edit_error"]="";

?>