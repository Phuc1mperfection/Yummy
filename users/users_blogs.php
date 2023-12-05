<meta charset="UTF-8">

<?php
session_start();
include_once("../components/header_users.php");
	if (!isset($_SESSION["blogs_post_error"]))
	{
    	$_SESSION["blogs_post_error"]=" ";
	}

    if(!isset( $_SESSION["blogs_error"]))
{
    $_SESSION["blogs_error"]="";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
    a{
        text-decoration: none;
    }
    body{
        margin-top: 100px;
        padding-left: 30px;
    }
</style>
	<body>
		<h1 align=center>Viết Blog</h1>
        <center><font color=red><?php echo isset($_SESSION["blogs_error"]) ? $_SESSION["blogs_error"] : ''; ?></font></center> 
            <form action="users_blogs_post.php" method="post" enctype="multipart/form-data">        
            <table border=0 align=left width=600 >

<tr>
    <th>Tên Blog:</th>
    <th>Thời gian đăng:</th>
</tr>

<tr>
<td><input style="width:1300px" type=text name=txtTenBlog></td>
    
    <td>
        <?php
        
        $ngayGioHienTai = date("Y-m-d\TH:i", strtotime("+6 hours")); 

        ?>
        <input type="datetime-local" style="width:220px" value="<?php echo $ngayGioHienTai; ?>" name="txtThoiGianDang" readonly>
    </td>

   
</tr>
<tr>
    <th>Chủ đề:</th>
     <td>
     <select name="txtMaLoaiBlog">
    <?php
        $sql1 = "select * from loaiblog";
        $result1 = $conn->query($sql1);
        while($row1 = $result1->fetch_assoc())
        {
    ?>
        <option value="<?php echo $row1["MaLoaiBlog"]; ?>"><?php echo $row1["TenLoaiBlog"]; ?></option>
    <?php
        }
    ?>
</select>
    </td>
</tr>
<tr>
    
    <th>Nội dung:</th>
</tr>
<tr>
    <td colspan="3">
    <textarea cols=60 style="width:1650px" rows=6 name=taNoiDung value= ></textarea></td>
</tr>

<tr>
			<td>Ảnh Blog:</td>
			<td><input type="file" name="AnhBlog" accept="image/*"></td>
		</tr>


<tr>
    <td align=CENTER><input type=submit value="Đăng"> <input type=reset value="Làm lại"></td>
    
</tr>
</table>
		</form>
	</body>
</html>
<?php 
	$_SESSION["blogs_post_error"]="";
    $_SESSION["blogs_error"]="";
?>