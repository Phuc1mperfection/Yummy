<?php
require_once("../components/connection.php");
$sql = "SELECT * from donhang";
$result = $conn->query($sql);

if(!isset( $_SESSION["order_error"]))
{
    $_SESSION["order_error"]="";
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
    <h1>Đơn hàng </h1>
    <center><a href="admin_home.php?page=admin_blogs_add" style="
        display: inline-block;
        padding: 10px 20px;
        color: white;
        background-color: #4CAF50;
        text-decoration: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
    ">
        Thêm một blog mới
    </a></center>
    <?php
    if ($result->num_rows > 0) {
        ?>
	<center><font color=aqua><?php echo $_SESSION["order_error"];?></font></center>
    <table width = 85%>
        <tr>
            <th>Mã đơn hàng</th>
            <th>Mã thành viên</th>
            <th>Thời gian đặt hàng</th>
            <th>Thời gian thanh toán</th>
            <th>Địa chỉ nhận hàng</th>
            <th>Cập nhật</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row["MaDonHang"]; ?></td>
            <td><?php echo $row["MaThanhVien"]; ?></td>
            <td><?php echo $row["ThoiGianDatHang"]; ?></td>
            <td><?php echo $row["ThoiGianThanhToan"]; ?></td>
            <td><?php echo $row["DiaChiNhanHang"]; ?></td>
            <td><button type="button" class="btn btn-primary" onclick="window.location.href='admin_home.php?page=admin_orders_edit&madh=<?php echo $row['MaDonHang']; ?>'">Cập nhật</button> </td>
            <td><button type="button" class="btn btn-danger" onclick="if(confirm('Are you sure?')) window.location.href='admin_orders_delete.php?madh=<?php echo $row['MaDonHang']; ?>'">Xóa</button>            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    
<?php
} else {
    echo " <tr> <h1> Không có Đơn hàng nào. </h1> </tr>";
}
$conn->close();
?>
</body>
</html>
<?php
    $_SESSION["order_error"]="";
    $_SESSION["order_add_error"]=" ";
    $_SESSION["order_edit_error"]=" ";
    $_SESSION["order_delete_error"]=" ";
?>