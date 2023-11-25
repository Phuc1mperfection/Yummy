<?php
session_start();
require_once("connection.php");
if (!isset($_SESSION['tendangnhap'])) {
    header('Location: login.php');
    exit();
}
?>
<?php include 'header_login.php';?>

<!DOCTYPE html>

<link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/main.css" rel="stylesheet">
<html>
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap">
    <title>Admin Home</title>
    <style>
body {
    font-family: Poppins, sans-serif;
    display: flex;
    background-color: #dee4ea;
    margin: 0;
}

.sidebar {
    width: 200px;
    height: 100vh;
    background-color: #7b403b;
    color: #fff;
    padding: 20px;
    overflow: auto;
    margin-top: 90px;
    position: fixed;
}

.sidebar h2 {
    text-align: center;
    color: #f9a825;
    margin-bottom: 20px;
}

.sidebar a {
    display: block;
    color: #fff;
    text-decoration: none;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.sidebar a:hover {
    background-color: #210d10;
}

.admin-panel {
    margin-left: 205px; 
    padding: 10px;
    margin-top: 90px;
    width: 100%;
    display: block;
    overflow: auto;
    position: fixed;
background-image: linear-gradient(326deg, #861657 0%, #7b403b 74%);
    color: #fff;
}
    </style>
</head>
<body>
    <div class="sidebar">
    <a href="admin_home.php?page=admin_users">Quản lý Thành viên</a>
    <a href="admin_home.php?page=admin_comments">Quản lý Góp ý</a>
    <a href="admin_book_table.php">Quản lý Đặt bàn</a>
    <a href="admin_blogs.php">Quản lý Blog</a>
    <a href="admin_foods.php">Quản lý Món ăn</a>
    <a href="admin_categories.php">Quản lý Danh mục</a>
    <a href="admin_orders.php">Quản lý Đơn hàng</a>
    </div>

    <div class="admin-panel">
    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        include($page . ".php");
    }
    ?>
    </div>
</body>
</html>