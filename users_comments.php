<?php

require_once("connection.php");

$tendangnhap = $_SESSION['tendangnhap'];

// Lấy MaThanhVien từ tên đăng nhập
$sql = "SELECT * FROM thanhvien WHERE TenDangNhap = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $tendangnhap);
$stmt->execute();
$result = $stmt->get_result();
$thanhvien = $result->fetch_assoc();

if ($thanhvien) {
    $mathanhvien = $thanhvien['MaThanhVien'];
    $stmt->close();

    // Thêm góp ý vào cơ sở dữ liệu
    if (isset($_POST['chude']) && isset($_POST['noidung'])) {
        $chude = $_POST['chude'];
        $noidung = $_POST['noidung'];

        $sql = "INSERT INTO gopy (MaThanhVien, ChuDe, NoiDung) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $mathanhvien, $chude, $noidung);
        $stmt->execute();

        $stmt->close();
    }
} else {
    echo "Không tìm thấy thành viên";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/main.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<section id="contact" class="contact">
      <form  method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
    <h2>Góp ý</h2>
    <div class="row">
        <div class="col-xl-6 form-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="<?php echo $thanhvien['HoTen']; ?>" required>
        </div>
        <div class="col-xl-6 form-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="<?php echo $thanhvien['Email']; ?>" required>
        </div>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="chude" id="chude" placeholder="Chủ đề" required>
    </div>
    <div class="form-group">
        <textarea class="form-control" name="noidung" rows="5" placeholder="Nội dung" required></textarea>
    </div>
    <div class="my-3">
        <div class="loading">Loading</div>
        <div class="error-message"></div>
        <div class="sent-message">Lời nhắn đã được gửi. Cảm ơn bạn</div>
    </div>
    <div class="text-center" style="padding-bottom: 10px;"><button type="submit">Gửi lời yêu thương</button></div>
</form>
    </section>
</body>
</html>