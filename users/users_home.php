<?php
session_start();
require_once("../components/connection.php");
if (!isset($_SESSION['tendangnhap'])) {
    header('Location: login.php');
    exit();
}
?>
<?php include '../components/header_login.php';?>

<!DOCTYPE html>

<link href="../assets/img/favicon.png" rel="icon">
<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="../assets/css/main.css" rel="stylesheet">

<html>
<head>

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Admin Home</title>
    <style>
body {
    font-family: Poppins, sans-serif;
    display: flex;
    margin: 0;
    background-color: #4d4855;
    background-image: linear-gradient(147deg, #4d4855 0%, #000000 74%);


}

.sidebar {
    width: 200px;
    height: 100vh;
    background-color: #e0455f;
    background-image: linear-gradient(147deg, #e0455f 0%, #44000b 74%);
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
    transition: background-color  0.3s ease;
}

.sidebar a:hover {
    background-color: #210d10;
}

.admin-panel {
    margin-left: 205px; 
    padding: 10px;
    margin-top: 90px;
    width: 100%;
    height: 90%; /* Set a specific height */
    overflow-y: auto; /* Show vertical scrollbar when the content overflows */
    position: fixed;
    background-color: #e0455f;  
}

    </style>
    </head>
<body>
    <div class="sidebar">
        <a href="users_home.php?page=users_book_table">Đặt bàn</a>
        <a href="users_home.php?page=users_blog">Viết blog</a>
        <a href="users_home.php?page=users_comments">Gửi lời yêu thương</a>
        <a href="users_home.php?page=users_cart"><i class="fas fa-shopping-cart"></i> Giỏ hàng</a>
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