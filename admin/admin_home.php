<?php
session_start();
require_once("../components/connection.php");
$result = $conn->query("SELECT COUNT(*) AS total1 FROM thanhvien");
$row = $result->fetch_assoc();
$totalUsers = $row['total1'];

$result = $conn->query("SELECT COUNT(*) AS total2 FROM gopy");
$row = $result->fetch_assoc();
$totalBlogs = $row['total2'];

$result = $conn->query("SELECT COUNT(*) AS total3 FROM blog");
$row = $result->fetch_assoc();
$totalComments = $row['total3'];

if (!isset($_SESSION['tendangnhap'])) {
    header('Location: login.php');
    exit();

}
?>
<?php include '../components/header_login.php'?>


<!DOCTYPE html>

<link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="../assets/css/main.css" rel="stylesheet">
<html>
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap">
    <title>Admin Home</title>
    <style>
body {
    font-family: Poppins, sans-serif;
    display: flex;
    background-color: whitesmoke;
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
    width: 90%;
    height: 90%; 
    overflow-y: auto; 
    position: fixed;
background-image: linear-gradient(326deg, black 0%, #7b403b 74%);
    color: #fff;
}
.dashboard {
    display: flex;
    justify-content: space-around;
    padding: 20px;
    background-color: #A67C52; /* a shade of brown */
    border-radius: 5px;
    margin-bottom: 20px;
}

.stat {
    text-align: center;
    padding: 20px;
    border: 1px solid #8B4513; /* a darker shade of brown */
    border-radius: 5px;
    background-color: #D2B48C; /* a lighter shade of brown */
    width: 30%;
}

.stat h2 {
    color: #A67B5B;
    margin-bottom: 10px;
}

.stat p {
    font-size: 24px;
    font-weight: bold;
    color: #7b403b;
}

    </style>
</head>
<body>
    <div class="sidebar">
    <a href="admin_home.php?page=admin_users">Quản lý Thành viên</a>
    <a href="admin_home.php?page=admin_comments">Quản lý Góp ý</a>
    <a href="admin_home.php?page=admin_book_table">Quản lý Đặt bàn</a>
    <a href="admin_home.php?page=admin_blogs">Quản lý Blog</a>
    <a href="admin_home.php?page=admin_foods">Quản lý Món ăn</a>
    <a href="admin_home.php?page=admin_categories">Quản lý Danh mục</a>
    <a href="admin_home.php?page=admin_orders">Quản lý Đơn hàng</a>
    <a href="admin_home.php?page=admin_stats">Thống kê</a>
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