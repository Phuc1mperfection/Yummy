<?php
require_once("components/connection.php");
include 'components/header.php';
// Đếm số lượng thành viên
$sql = "SELECT COUNT(*) as count FROM thanhvien";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$countMembers = $row['count'];
// Đếm số lượng admin
$sqlAdmin = "SELECT COUNT(*) as count FROM `admin`";
$stmt = $conn->prepare($sqlAdmin);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$countAdmins = $row['count'];
//Đếm số lượng món ăn
$sqlMonAn = "SELECT COUNT(*) as count FROM monan";
$stmt = $conn->prepare($sqlMonAn);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$countMonAn = $row['count'];
// Lấy danh sách blog
$sqlBlog = "SELECT blog.*, loaiblog.TenLoaiBlog FROM blog JOIN loaiblog ON blog.MaLoaiBlog = loaiblog.MaLoaiBlog";
$resultBlog = $conn->query($sqlBlog);
$blogs = $resultBlog->fetch_all(MYSQLI_ASSOC);
// Thực hiện truy vấn
$sqlmonan = "SELECT * FROM monan";
$sql1 = "SELECT * FROM danhmuc";
$result = $conn->query($sqlmonan);

$categoryId = isset($_GET['category']) ? $_GET['category'] : 1;
$sql2 = "SELECT * FROM danhmuc";
$result = $conn->query($sql2);

// Fetch the menu items from the database
$sql22 = "SELECT * FROM monan WHERE MaDanhMuc = $categoryId";
$result2 = $conn->query($sql2);

$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Yummy</title>

  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body>
  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up">Thưởng thức bữa ăn lành<br>mạnh và ngon miệng!"</h2>
          <p data-aos="fade-up" data-aos-delay="100"> Đến thăm website của chúng tôi để biết thêm về nhà hàng và có thể đặt bàn cho trải nghiệm ẩm thực đặc sắc của bạn."</p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="auth/login.php" class="btn-book-a-table">Đặt bàn</a>
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="assets/img/bun.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section>

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Khám phá</h2>
          <p>Tìm hiểu <span>thêm về chúng tôi</span></p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-7 position-relative about-img" style="background-image: url(assets/img/about.jpg) ;" data-aos="fade-up" data-aos-delay="150">
            <div class="call-us position-absolute">
              <h4>Đặt bàn thôi nào</h4>
              <p>+84 123 456 789</p>
            </div>
          </div>
          <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                Tại đây, chúng tôi không chỉ là những người yêu ẩm thực mà còn là những người đam mê sáng tạo
              </p>
              <ul>
                <li><i class="bi bi-check2-all"></i>"Chào mừng đến với thế giới của chúng tôi.
                <li><i class="bi bi-check2-all"></i>Tại đây, chúng tôi không chỉ là những người yêu ẩm thực mà còn là những người đam mê sáng tạo. </li>
                <li><i class="bi bi-check2-all"></i> Khám phá hương vị mới, cảm nhận sự sáng tạo và thư giãn trong không gian ấm cúng của chúng tôi. </li>
              </ul>
              <p>
                Hãy đồng hành cùng chúng tôi trên hành trình ẩm thực đầy màu sắc, nơi mỗi suất ăn là một câu chuyện kể về sự đam mê và sự sáng tạo. 
              </p>

              <div class="position-relative mt-4">
                <img src="assets/img/about-2.jpg" class="img-fluid" alt="">
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
    <section id="stats-counter" class="stats-counter">
      <div class="container" data-aos="zoom-out">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $countMembers; ?>" data-purecounter-duration="1" class="purecounter"></span>          
              <p>Thành viên</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $countMonAn; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Món ăn</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
              <p>Đơn đặt hàng</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $countAdmins; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Admin</p>
            </div>
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

        <ul class="nav nav-tabs d-flex justify-content-center"  data-aos-delay="200">
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

            echo '<div class="tab-content" id="menu-' . $categoryId . '" data-aos-delay="300">';
            echo '<div class="row gy-5">';

            while ($rowMonAn = $resultMonAn->fetch_assoc()) {
                echo '<div class="col-lg-4 menu-item">';
                echo '<a href="assets/img/menu/' . $rowMonAn['Anh'] . '" class="glightbox"><img style="width: 400px; height: 300px;" src="assets/img/menu/' . $rowMonAn['Anh'] . '" class="menu-img img-fluid" alt=""></a>';
                echo '<h4>' . $rowMonAn['TenMonAn'] . '</h4>';
                echo '<p class="ingredients">' . $rowMonAn['ThongTinMonAn'] . '</p>';
                echo '<p class="price">' . number_format($rowMonAn['Gia']) . ' đ</p>';
                echo '</div><!-- Menu Item -->';
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
    <section id="gallery" class="gallery section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>gallery</h2>
          <p>Check <span>Our Gallery</span></p>
        </div>
        <div class="gallery-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-1.jpg"><img src="assets/img/gallery/gallery-1.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-2.jpg"><img src="assets/img/gallery/gallery-2.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-3.jpg"><img src="assets/img/gallery/gallery-3.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-4.jpg"><img src="assets/img/gallery/gallery-4.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-5.jpg"><img src="assets/img/gallery/gallery-5.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-6.jpg"><img src="assets/img/gallery/gallery-6.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-7.jpg"><img src="assets/img/gallery/gallery-7.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-8.jpg"><img src="assets/img/gallery/gallery-8.jpg" class="img-fluid" alt=""></a></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>

    <section id="blogs" class="blogs">
    <div class="container-fluid" data-aos="fade-up">
        <div class="section-header">
            <h2>Blog</h2>
            <p>Blog <span>được các</span> Thành viên viết</p>
        </div>
        <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
                <?php foreach ($blogs as $blog): ?>
                    <div class="swiper-slide blog-item d-flex flex-column justify-content-end" style="background-image: url(<?php echo $blog['AnhBlog']; ?>)">
                    <a href="blog.php?MaBlog=<?php echo $blog['MaBlog']; ?>">
                                        <h3><?php echo $blog['TenBlog']; ?></h3>
                        <p class="description">
                            <?php echo $blog['TenLoaiBlog']; ?>
                        </p>
                      </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Liên hệ</h2>
          <p>Cần sự trợ giúp? <span>Hãy liên hệ với chúng tôi</span></p>
        </div>

        <div class="mb-3">
          <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.7335946191274!2d105.84074577607383!3d21.003313480639648!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac773026b415%3A0x499b8b613889f78a!2zVHLGsOG7nW5nIMSQ4bqhaSBI4buNYyBYw6J5IEThu7FuZyBIw6AgTuG7mWkgLSBIVUNF!5e0!3m2!1svi!2s!4v1700539540903!5m2!1svi!2s"frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="row gy-4">

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-map flex-shrink-0"></i>
              <div>
                <h3>Địa chỉ</h3>
                <p>55 Giải Phóng, Phường Đồng Tâm, Hai Bà Trưng Hà Nội</p>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email </h3>
                <p>phuc0200366@huce.edu.vn</p>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>SDT</h3>
                <p>+84 123 456 789</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-share flex-shrink-0"></i>
              <div>
                <h3>Giờ mở cửa</h3>
                <div><strong>T2-CN:</strong> 11AM - 23PM;
                  <strong>Sunday:</strong> Nghỉ để đi chợ</div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php include 'components/footer.php'?>
  </main>
  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>
</body>
</html>
<?php
$conn->close();
?>