<?php
require_once("../components/connection.php");
$sql = "SELECT blog.*, loaiblog.TenLoaiBlog 
FROM blog 
JOIN loaiblog ON blog.MaLoaiBlog = loaiblog.MaLoaiBlog";

$result = $conn->query($sql);
if (isset($_SESSION['blogs_error']) && $_SESSION['blogs_error'] != "") {
  echo '<div class="alert alert-success" role="alert">
            ' . $_SESSION["blogs_error"] . '
          </div>';
  $_SESSION['blogs_error'] = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
 table {
            width: 80%;
            margin: 20px auto;
            font-size: 20px;
            text-align: center;
        }

        th,
        td {
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

        body {
            background-color: #f2f2f2;
        }

        /* Để làm cho ảnh có góc bo tròn */
        img {
            border-radius: 5px;
        }

        tr:hover {
            background-color: grey;
        }

        tr {
            transition: background-color 0.3s ease;
        }
</style>

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
    ">Thêm một blog mới</a>
    </center>
    <center>
    </center>
    <table width=85%>
      <tr>
        <th>Mã Blog</th>
        <th>Tên Blog</th>
        <th>Thời gian đăng</th>
        <th width=10%>Loại(Chủ đề)</th>
        <th align="center">Cập nhật</th>
        <th align="center">Xóa</th>
      </tr>
      <?php while ($row = $result->fetch_assoc()) : ?>
        <tr>
          <td><?php echo $row["MaBlog"]; ?></td>
          <td><?php echo $row["TenBlog"]; ?></td>
          <td><?php echo $row["ThoiGianDang"]; ?></td>
          <td><?php echo $row["TenLoaiBlog"]; ?></td>


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
$_SESSION["blogs_add_error"] = "";
$_SESSION["blogs_error"] = "";
$_SESSION["blogs_edit_error"] = "";

?>