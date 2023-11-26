<?php
session_start();
require_once("../components/connection.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $tendangNhap = $_POST['TenDangNhap'];
    $hoTen = $_POST['HoTen'];
    $diaChi = $_POST['DiaChi'];
    $matKhau = $_POST['MatKhau'];
    $sdt = $_POST['SDT'];

    $sql = "INSERT INTO thanhvien (Email, TenDangNhap, HoTen, DiaChi, MatKhau, SDT) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $email, $tendangNhap, $hoTen, $diaChi, $matKhau, $sdt);

    if ($stmt->execute()) {
        $_SESSION['Success'] = "Đăng ký thành công";
        header('Location: ../index.php'); 
        exit();
    } else {
        $_SESSION['Error'] = "Đăng ký không thành công. Vui lòng thử lại.";
        echo "Error: " . $sql . "<br>" . $conn->error; 
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng ký</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="img/png" href="/Yummy/img/icons/favicon.ico"/>
<link rel="stylesheet" type="text/css" href="/Yummy/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/Yummy/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/Yummy/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="/Yummy/vendor/animate/animate.css">
<link rel="stylesheet" type="text/css" href="/Yummy/vendor/css-hamburgers/hamburgers.min.css">
<link rel="stylesheet" type="text/css" href="/Yummy/vendor/animsition/css/animsition.min.css">
<link rel="stylesheet" type="text/css" href="/Yummy/vendor/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="/Yummy/vendor/daterangepicker/daterangepicker.css">
<link rel="stylesheet" type="text/css" href="/Yummy/assets/css/util.css">
<link rel="stylesheet" type="text/css" href="/Yummy/assets/css/signup.css">
</head>
<body style="background-color: #666666;">
<?php
if (isset($_SESSION['Success'])) {
    echo "<div class='alert alert-success'>" . $_SESSION['Success'] . "</div>";
    unset($_SESSION['Success']);
}
?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-43">
						Đăng ký 
					</span>
					
					<div class="wrap-input100 validate-input"  data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="TenDangNhap">
						<span class="focus-input100"></span>
						<span class="label-input100">Tên đăng nhập</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="HoTen">
						<span class="focus-input100"></span>
						<span class="label-input100">Họ Tên</span>

					</div><div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="DiaChi">
						<span class="focus-input100"></span>
						<span class="label-input100">Địa chỉ</span>
					</div>				
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="MatKhau">
						<span class="focus-input100"></span>
						<span class="label-input100">Mật khẩu</span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="text" name="SDT">
						<span class="focus-input100"></span>
						<span class="label-input100">Số điện  thoại</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Đăng ký
						</button>
					</div>
					
					<!-- <div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or sign up using
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div> -->
				</form>
				<div class="login100-more" style="background-image: url('/Yummy/assets/img/signup.jpg');">
				</div>
			</div>
		</div>
	</div>
	<script src="Yummy/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="Yummy/vendor/animsition/js/animsition.min.js"></script>
<script src="Yummy/vendor/bootstrap/js/popper.js"></script>
<script src="Yummy/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="Yummy/vendor/select2/select2.min.js"></script>
<script src="Yummy/vendor/daterangepicker/moment.min.js"></script>
<script src="Yummy/vendor/daterangepicker/daterangepicker.js"></script>
<script src="Yummy/vendor/countdowntime/countdowntime.js"></script>
<script src="Yummy/js/main.js"></script>

</body>
</html>