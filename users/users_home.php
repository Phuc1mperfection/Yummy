<?php
session_start();
require_once("../components/connection.php");
if (!isset($_SESSION['tendangnhap'])) {
    header('Location: ../auth/login.php');
    exit();
}
?>
<?php include '../components/header_users.php';?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="../assets/css/main.css" rel="stylesheet">
    </head>
<body>
<title>Trang user</title>
<section id="hero" class="hero d-flex align-items-center section-bg" style="background-color: #E56F6B; ">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up" style="color: white; ">Nơi hội tụ của những món ăn ngon miệng cho một<br> ngày trọn vẹn!"</h2>
          <p data-aos="fade-up" data-aos-delay="100" style="color: white; "> Đến thăm website của chúng tôi để biết thêm về nhà hàng và có thể đặt bàn cho trải nghiệm ẩm thực đặc sắc của bạn."</p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="../assets/img/hero_users.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section>
  <section id="menu" class="menu">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h2>Menu của nhà hàng </h2>
            <p>Menu đa dạng <span>Món ăn</span></p>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <?php
            
            $sql1 = "SELECT * FROM danhmuc";
            $result1 = $conn->query($sql1) or die($conn->error);
            while ($row1 = $result1->fetch_assoc()) {
                $categoryId = $row1["MaDanhMuc"];
                $categoryName = $row1["TenDanhMuc"];
                echo '<li class="nav-item">';
                echo '<a class="nav-link" data-bs-toggle="tab" onclick="showCategory(' . $categoryId . ')">';
                echo '<h4>' . $categoryName . '</h4>';
                echo '</a>';
                echo '</li>';
            }
            ?>
        </ul><br>

        <?php
        $result1->data_seek(0); // Reset the result set pointer

        while ($row1 = $result1->fetch_assoc()) {
            $categoryId = $row1["MaDanhMuc"];

            $sqlMonAn = "SELECT * FROM monan WHERE MaDanhMuc = $categoryId";
            $resultMonAn = $conn->query($sqlMonAn);

            echo '<div class="tab-content" id="menu-' . $categoryId . '" data-aos="fade-up" data-aos-delay="300">';
            echo '<div class="row gy-5">';

            while ($rowMonAn = $resultMonAn->fetch_assoc()) {
                echo '<div class="col-lg-4 menu-item">';
                echo '<a href="../assets/img/menu/' . $rowMonAn['Anh'] . '" class="glightbox"><img style="width: 400px; height: 300px;" src="../assets/img/menu/' . $rowMonAn['Anh'] . '" class="menu-img img-fluid" alt=""></a>';
                echo '<h4>' . $rowMonAn['TenMonAn'] . '</h4>';
                echo '<p class="ingredients">' . $rowMonAn['ThongTinMonAn'] . '</p>';
                echo '<p class="price">' . $rowMonAn['Gia'] . ' đ</p>';
                echo '</div>';
            }

            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</section>

<script>
    function showCategory(categoryId) {
        document.querySelectorAll('.tab-content').forEach(function (category) {
            category.style.display = 'none';
        });
        document.getElementById('menu-' + categoryId).style.display = 'block';
    }
</script>
</body>
   
</html>
 <?php include '../components/footer.php'?>