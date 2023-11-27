<?php
require_once("../components/connection.php");
if (!isset($_GET["MaThanhVien"]) || !isset($_GET["action"])) {
    die("No user ID or action provided");
}

$id = $_GET["MaThanhVien"];
$action = $_GET["action"];

$sql = "SELECT * FROM thanhvien WHERE MaThanhVien = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($action == "edit") {
        // Get the form data
        $TenDangNhap = $_POST["tendangnhap"];
        $MatKhau = $_POST["matkhau"];
        $HoTen = $_POST["hoten"];
        $DiaChi = $_POST["diachi"];
        $SDT = $_POST["sdt"];
        $Email = $_POST["email"];
        $sql = "UPDATE thanhvien SET TenDangNhap = ?, MatKhau = ?, HoTen = ?, DiaChi = ?, SDT = ?, Email = ? WHERE MaThanhVien = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $TenDangNhap, $MatKhau, $HoTen, $DiaChi, $SDT, $Email, $id);
        $stmt->execute();
        header("Location: admin_home.php?page=admin_users");
        exit;
    }
}

if ($action == "delete") {
    $sql = "DELETE FROM thanhvien WHERE MaThanhVien = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: admin_home.php?page=admin_users");
    exit;
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
<form  method="POST" class="form-horizontal" >  
      <div class="form-group">
        <label for="tendangnhap" class="col-sm-2 control-label">Tên đăng nhập:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="tendangnhap" name="tendangnhap" value="<?php echo $row['TenDangNhap']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="matkhau" class="col-sm-2 control-label">Mật khẩu:</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="matkhau" name="matkhau" value="<?php echo $row['MatKhau']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="hoten" class="col-sm-2 control-label">Họ tên:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="hoten" name="hoten" value="<?php echo $row['HoTen']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="diachi" class="col-sm-2 control-label">Địa chỉ:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="diachi" name="diachi" value="<?php echo $row['DiaChi']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="sdt" class="col-sm-2 control-label">Số điện thoại:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="sdt" name="sdt" value="<?php echo $row['SDT']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email:</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['Email']; ?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="hidden" name="mathanhvien" value="<?php echo $row['MaThanhVien']; ?>">
            <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
    </div>
</form>
</body>
</html>