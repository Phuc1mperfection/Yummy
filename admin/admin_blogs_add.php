<meta charset="UTF-8">
<?php
	if (!isset($_SESSION["blogs_add_error"]))
	{
    	$_SESSION["blogs_add_error"]=" ";
	}

	require_once("../components/connection.php");
    $sql = "select * from blog";
    $result = $conn->query($sql);
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Tiêu đề trang web</title>


	
	</head>
	<body>
		<h1 align=center>Thêm mới một sản phẩm</h1>
		<center><font color=red><?php echo $_SESSION["blogs_add_error"];?></font></center>
		<form method=POST action="admin_blog_add_action.php">
        <table border=0 align=center width=400>

<tr>
    <td>Tên Blog:</td>
    <td><input style="width:220px" type=text name=txtTenBlog></td>
</tr>
<tr>
    <td>Thời gian đăng:</td>
    <td><input type=datetime-local  style="width:220px" value="
    <?php
    $ngayGioHienTai = date("Y-m-d H:i:s");
    echo $ngayGioHienTai; 
    ?>" name=txtThoiGianDang></td>

    
</tr>

<tr>
    <td>Chủ đề:</td>
    <td>
        <select name=slChuDe>
            <?php
                $sql1 = "select * from loaiblog";
                $result1 = $conn->query($sql1);
                while($row1 = $result1->fetch_assoc())
                {
            ?>
                <option value=<?php echo $row1["TenLoaiBlog"];?>><?php echo $row1["TenLoaiBlog"]; ?> </option>
            <?php
                }
            ?>
        </select>
    </td>
</tr>

<tr>
    <td>Nội dung:</td>
    <td><textarea cols=20 style="width:220px" rows=6 name=taNoiDung value= ></textarea></td>
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
	$_SESSION["blogs_add_error"]="";
?>