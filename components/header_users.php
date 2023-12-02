<?php require_once("../components/connection.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="../assets/css/main.css" rel="stylesheet">
</head>
<body>
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="" class="logo d-flex align-items-center me-auto me-lg-0">

        <h1>Yummy<span>.</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero">Trang chủ</a></li>
          <li><a href="../users/users_blogs.php">Viết blog</a></li>
          <li><a href="../users/users_cart.php">Giỏ hàng</a></li>
          <li><a href="../users/users_book_table.php">Đặt bàn</a></li>

          <li><a href="../users/users_comments.php">Gửi lời yêu thương</a></li>
          <li><a href="">Welcome, <?php echo $_SESSION['tendangnhap']; ?></a></li>
        </ul>
      </nav>
      <a href="../auth/logout.php" class="btn-book-a-table" style="background-color: #252A34 ";>Đăng xuất</a>
      <a class="btn-book-a-table" href="#book-a-table" style="background-color: #FF2E63 ">Đặt bàn</a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
  </header>
</body>
</html>