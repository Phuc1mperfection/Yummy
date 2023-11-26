<?php
require_once("../components/connection.php");
if (!isset($_SESSION["blogs_edit_error"])){
    $_SESSION["blogs_edit_error"]="";
}
	$mablog = $_GET["mablog"];
	$sql = "SELECT * FROM blog where MaBlog=$mablog";
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
<h1 align=center>Cập nhập Blogs</h1>
		<br>
		<center><font color=red><?php echo $_SESSION["blogs_edit_error"];?></font></center>
        <form method=POST action="admin_blogs_edit_action.php?MaBlog=<?php echo $mablog; ?>">
			<table border=0 align=center width=400>

				<tr>
					<td>Tên Blog:</td>
					<td><input style="width:220px" type=text value="<?php echo $row["TenBlog"];?>" name=txtTenBlog></td>
				</tr>
				<tr>
					<td>Thời gian đăng:</td>
                    <td><input type=datetime-local  style="width:220px" value="<?php echo $row["ThoiGianDang"];?>" name=txtThoiGianDang></td>

					
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
								<option value=<?php echo $row1["TenLoaiBlog"];?>
								<?php
									if($row1["TenLoaiBlog"]==$row["ChuDe"])
									{
										echo " selected ";
									}
								?>
								 > <?php echo $row1["TenLoaiBlog"]; ?> </option>
							<?php
								}
							?>
						</select>
					</td>
				</tr>

				<tr>
					<td>Nội dung:</td>
					<td><textarea cols=20 style="width:220px" rows=6 name=taNoiDung value= ><?php echo $row["NoiDung"];?></textarea></td>
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