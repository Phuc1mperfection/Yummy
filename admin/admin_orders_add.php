<meta charset="UTF-8">
<?php
    session_start();
	if (!isset($_SESSION["order_add_error"]))
	{
    	$_SESSION["order_add_error"]=" ";
	}

	require_once 'connection.php';
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Tiêu đề trang web</title>


	</head>
	<body>
		<h1 align=center>Thêm mới một Đơn Hàng</h1>
		<center><font color=red><?php echo $_SESSION["order_add_error"];?></font></center>
		<form method=POST action="admin_orders_add_action.php">
        <table border=0 align=center width=400>

<tr>
    <td>Mã thành viên (Nếu k có thì có thể nhập tên KH):</td>
    <td><input style="width:220px" type=text name=txtMaThanhVien></td>
</tr>
<tr>
    <td>Thời gian đặt hàng:</td>
    <td><input type=datetime-local  style="width:220px" value="<?php $ngayGioHienTai = date("Y-m-d H:i:s"); echo $ngayGioHienTai; ?>" name=txtThoiGianDatHang></td>

    
</tr>

<tr>
    <td>Thời gian thanh toán:</td>
    <td><input type=datetime-local  style="width:220px" value="<?php $ngayGioHienTai = date("Y-m-d H:i:s"); echo $ngayGioHienTai; ?>" name=txtThoiGianThanhToan></td>

    
</tr>

<tr>
    <td>Địa chỉ nhận hàng:</td>
    <td><textarea cols=20 style="width:220px" rows=6 name=taDiaChiNhanHang value= ></textarea></td>
</tr>


<tr>
    <td align=right><input type=submit value="Thêm mới"></td>
    <td><input type=reset value="Reset">
</tr>
</table>
		</form>
	</body>
</html>

<?php 
	$_SESSION["order_add_error"]="";
?>