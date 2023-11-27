<?php
require_once("../components/connection.php");


if (!isset($_GET["MaDanhMuc"]) || !isset($_GET["action"])) {
    die("No user ID or action provided");
}

$id = $_GET["MaDanhMuc"];
$action = $_GET["action"];

$sql = "SELECT * FROM danhmuc WHERE MaDanhMuc = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($action == "edit") {
        $TenDanhMuc = $_POST["tendanhmuc"];
        $sql = "UPDATE danhmuc SET TenDanhMuc = ? WHERE MaDanhMuc = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $TenDanhMuc,$id);
        $stmt->execute();
        header("Location: admin_home.php?page=admin_categories");
        exit;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if ($action == "delete") {
    $sql = "DELETE FROM danhmuc WHERE MaDanhMuc = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: admin_home.php?page=admin_categories");
    exit;
}
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if ($action == "insert") {

    $TenDanhMuc = isset($_POST["tendanhmuc"]) ? $_POST["tendanhmuc"] : "";
    $HinhAnh = isset($_POST["hinhanh"]) ? $_POST["hinhanh"] : "";
    $TrangThai = isset($_POST["trangthai"]) ? $_POST["trangthai"] : "";

    
    $sql = "INSERT INTO danhmuc (TenDanhMuc) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $TenDanhMuc);
    $stmt->execute();

    header("Location: admin_home.php?page=admin_categories");
    exit;
}
}

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
<?php

 
?>	
<form  method="POST" class="form-horizontal" act>  
      
    <div class="form-group">
        <label for="matkhau" class="col-sm-2 control-label">Tên danh mục:</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="tendanhmuc" name="tendanhmuc" value="<?php echo ($action == 'insert') ? '' : $row['TenDanhMuc']; ?>">

        </div>
    </div>
    
    
    
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="hidden" name="madanhmuc" value="<?php echo $row['MaDanhMuc']; ?>">
            <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
    </div>
</form>
</body>
</html>
