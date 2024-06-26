<?php
require_once("../components/connection.php");
if (!isset($_SESSION["blogs_edit_error"])){
    $_SESSION["blogs_edit_error"]="";
}
$mablog = $_GET["mablog"];
$sql = "SELECT * FROM blog JOIN loaiblog ON blog.MaLoaiBlog = loaiblog.MaLoaiBlog WHERE blog.MaBlog = $mablog";$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Fetch categories from the database
$sqlCategories = "SELECT * FROM loaiblog";
$resultCategories = $conn->query($sqlCategories);
$categories = $resultCategories->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="../assets/css/main.css" rel="stylesheet">
    <title>Document</title>
</head>
<style>
    a{
        text-decoration: none;
        }
        table{
            width: 100%;
            border-collapse: collapse;
            padding-left: 100px;
            margin-left: 500px;
        }
        .form-control{
            width: 500px;
            margin-right: 600px;
        }
</style>
<body>
<h1 align=center>Cập nhật Blogs</h1>
<br>
<center><font color=red><?php echo $_SESSION["blogs_edit_error"];?></font></center>
<form method=POST action="admin_blogs_edit_action.php?MaBlog=<?php echo $mablog; ?>">
    <table  border=0  width=100%>
        <tr>
            <td>Tên Blog:</td>
            <td><input  class="form-control" type=text value="<?php echo $row["TenBlog"];?>" name=txtTenBlog></td>
        </tr>
        <tr>
            <td>Thời gian đăng:</td>
            <td><input style="width: 500px;" type=datetime-local  style="width:320px" class="form-control" value="<?php echo $row["ThoiGianDang"];?>" name=txtThoiGianDang></td>
        </tr>
        <tr>
            <td>Loại Blog:</td>
            <td>
                <select style="width: 500px;" name="slLoaiBlog" style="width:320px">
                    <?php foreach ($categories as $category): ?>
                        <option c value="<?php echo $category['MaLoaiBlog']; ?>">
                            <?php echo $category['TenLoaiBlog']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nội dung:</td>
            <td><textarea cols=20 class="form-control" rows=6 name=taNoiDung value= ><?php echo $row["NoiDung"];?></textarea></td>
        </tr>
        <tr>
            <td align=right><input type=submit value="Update"></td>
            <td><input type=reset value="Reset">
        </tr>
    </table>
</form>
</body>
</html>