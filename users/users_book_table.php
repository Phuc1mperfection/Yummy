<?php

session_start();
include '../components/header_users.php';
if(!isset($_SESSION["book_table"]))
{
  $_SESSION["book_table"]="";
}
require_once("../components/connection.php");
$tendangnhap = $_SESSION['tendangnhap'];
$sql = "SELECT * FROM thanhvien WHERE TenDangNhap like '$tendangnhap'";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();
$matv = $rows['MaThanhVien'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../assets/css/main.css" rel="stylesheet">
    <title>Document</title>
    <style>
      table {
  width: 80%;
  margin: 20px auto;
  font-size:20px;
    text-align: center;}

      th, td {
        border: 2px solid black;
        padding: 10px;
        text-align: center;
      }

      th {
        background-color: #af634c;
        color: white;
      }

      img {
        max-width: 100%;
        height: auto;
      }
      body{
        background-color: #f2f2f2;
      }
      /* Để làm cho ảnh có góc bo tròn */
      img {
        border-radius: 5px;
      }
    </style>

    <script>
    // Kiểm tra nếu URL chứa tham số 'success' (có thể điều chỉnh tùy theo cách bạn xử lý redirection)
    if (window.location.search.includes('success')) {
        // Hiển thị thông báo alert khi trang được tải
        window.onload = function () {
            alert("Đặt bàn thành công!");
        };
    }
</script>
</head>
<body>
  <div style="margin-right:170px; color:black;">
  <br> <br> <br> <br> <br>
     <center> <h2 style="font-weight:bold; ">MỜI QUÝ KHÁCH ĐẶT BÀN</h2> </center>
     <center> <a href="users_book_table_history.php"> <p>Lịch sử đặt bàn</p> </a> </center>
     <center> <font color:pink> <?php echo $_SESSION["book_table"] ?> </font></center>
     <br>
     <center>
     <div style="width:70%; padding:10px;">
     <form method=POST action="users_book_table_action.php?matv=<?php echo $matv ?>">
       <h5>Loại bàn: 
          <select name="slloaiban" id="">
            <?php
              $sql1 = "select * from ban";
              $result = $conn->query($sql1);
              while($rows = $result->fetch_assoc())
              {
            ?>
              <option value="<?php echo $rows['MaBan']; ?>"> <?php echo $rows['LoaiBan']; ?> </option>
              <?php
              }
              ?>
          </select>
        
          &nbsp &nbsp

        Thời gian hẹn đến:
          <input type="datetime-local" name="thoigianhenden">
          &nbsp &nbsp
          <input type="submit" style="margin-top:10px;background-color:#FF2E63;color:white; border:none; border-radius:10px; width:150px; height:35px;" value="Xác nhận đặt">
            </h5>
     </form>
      </div>
            </center>

     <br>
     <br>

     <center><h4>Danh sách các bàn ở cửa hàng chúng tôi</h4></center>
     <table align=center border=2>
      <tr>
        <th>Loại bàn</th>
        <th>Ảnh</th>
        <th>Số lượng trống</th>
      </tr>

      <?php
         $result = $conn->query($sql1);
         while($rows = $result->fetch_assoc())
         {
      ?>
        <tr>
          <td> <?php echo $rows["LoaiBan"]; ?> </td>
          <td> <img src='../assets/img/bannh/<?php echo $rows["AnhBan"] ?>' width=500px alt=""> </td>
          <td> <?php echo $rows["SoLuongConLai"] ?> </td>
        </tr>
        <?php
         }
        ?>

        </table>

        </div>
  
</body>
</html>

<?php
  unset($_SESSION["book_table"]);
?>