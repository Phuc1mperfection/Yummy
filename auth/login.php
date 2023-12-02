<?php
require_once("../components/connection.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tendangnhap = $_POST['TenDangNhap']; 
    $matkhau = $_POST['MatKhau'];

	$sql = "SELECT * FROM admin WHERE TenDangNhap = '$tendangnhap' AND MatKhau = '$matkhau'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		session_start();
		$_SESSION['tendangnhap'] = $tendangnhap;
		header('Location: ../admin/admin_home.php');
		exit(); 
	} else {
		$sql = "SELECT * FROM thanhvien WHERE TenDangNhap = '$tendangnhap' AND MatKhau = '$matkhau'";
		$result = $conn->query($sql);
	}

        if ($result->num_rows > 0) {
            session_start();
            $_SESSION['tendangnhap'] = $tendangnhap;
		header('Location: ../users/users_home.php');
        exit(); 
        } else {
            session_start();
            $_SESSION['Error'] = "Sai tên đăng nhập hoặc mật khẩu";
        }
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng nhập </title>
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
<link rel="stylesheet" type="text/css" href="/Yummy/assets/css/login.css">
</head>
<body style="background-color: #001f3f;">
<?php
if (isset($_SESSION['Error'])) {
    echo '<p class="error">' . $_SESSION['Error'] . '</p>';
    unset($_SESSION['Error']);
}
?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-43">
						Đăng nhập để tiếp tục
					</span>
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="TenDangNhap">
						<span class="focus-input100"></span>
						<span class="label-input100">Email/Tên đăng nhập</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="MatKhau">
						<span class="focus-input100"></span>
						<span class="label-input100">Mật khẩu</span>
					</div>
					
					

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Ghi nhớ tôi
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Quên mật khẩu?
							</a>
						</div>
					</div>
			
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Đăng nhập
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
				<div class="login100-more" style="background-image: url('/Yummy/assets/img/login.jpg');">
				</div>
			</div>
		</div>
		<?php if (isset($error_message)) : ?>
            <p><?php echo $error_message; ?></p>
        <?php endif; ?>
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
