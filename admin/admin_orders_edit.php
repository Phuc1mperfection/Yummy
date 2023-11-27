<?php
require_once("../components/connection.php");
if (!isset($_SESSION["order_edit_error"])){
    $_SESSION["order_edit_error"]="";
}
	$madh = $_GET["madh"];
	$sql = "SELECT * FROM donhang 
	JOIN thanhvien ON donhang.MaThanhVien = thanhvien.MaThanhVien 
	WHERE MaDonHang = $madh";
	$result = $conn->query($sql);

	$row = $result->fetch_assoc();
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<h1 align=center>Cập nhập order</h1>
		<br>
		<center><font color=red><?php echo $_SESSION["order_edit_error"];?></font></center>
        <form method=POST action="admin_orders_edit_action.php?madh=<?php echo $madh; ?>">
			<table border=0 align=center width=400>

				<tr>
					<td>Ma Thanh Vien (Có nhể nhập Ten KH):</td>
					<td><input style="width:220px" type=text value="<?php echo $row["MaThanhVien"];?>" name=txtMaThanhVien></td>
				</tr>
				<tr>
					<td>Thời gian đặt hàng:</td>
                    <td><input type=datetime-local  style="width:220px" value="<?php echo $row["ThoiGianDatHang"];?>" name=txtThoiGianDatHang></td>
				</tr>

                <tr>
					<td>Thời gian thanh toán:</td>
                    <td><input type=datetime-local  style="width:220px" value="<?php echo $row["ThoiGianThanhToan"];?>" name=txtThoiGianThanhToan></td>
				</tr>
				<tr>
					<td>Địa chỉ nhận hàng:</td>
					<td><textarea cols=20 style="width:220px" rows=6 name=taDiaChiNhanHang value= ><?php echo $row["DiaChiNhanHang"];?></textarea></td>
				</tr>


				<tr>
					<td align=right><input type=submit value="Update"></td>
					<td><input type=reset value="Reset">
				</tr>
			</table>
		</form>
</body>

    <?php
	
    ?>
</html>